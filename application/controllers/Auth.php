<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    
class Auth extends MY_Controller {

    public $goolgeRecSiteKey = '6Le8sRcUAAAAAKzjZPQdMIEfLZjX2-Uc_iLZ9EgN';
    public $goolgeRecsecret = '6Le8sRcUAAAAADY7xPOzxQPMS4atPV9_DQZo0gzo';
    public $goolgeReclang = 'en';
	function __construct()
	{
		parent::__construct();

		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
	}


	function index()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            if($this->ion_auth->is_admin())
            {
                redirect('admin/dashboard', 'refresh');
            }
            elseif($this->ion_auth->is_member())
            {
                redirect('member/dashboard', 'refresh');
            }
            elseif($this->ion_auth->is_senior())
            {
                redirect('senior/dashboard', 'refresh');
            }
        }
	}


    function login($group='is_admin')
	{
        if ( ! $this->ion_auth->logged_in() OR  !$this->ion_auth->$group())
        {
            /* Load */
            $this->load->config('admin/dp_config');
            $this->load->config('common/dp_config');

            /* Valid form */
            $this->form_validation->set_rules('identity', 'Identity', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('g-recaptcha-response','Captcha','callback_recaptcha');

            /* Data */
            $this->data['title']               = $this->config->item('title');
            $this->data['title_lg']            = $this->config->item('title_lg');
            $this->data['auth_social_network'] = $this->config->item('auth_social_network');
            $this->data['forgot_password']     = $this->config->item('forgot_password');
            $this->data['new_membership']      = $this->config->item('new_membership');

            if ($this->form_validation->run() == TRUE)
            {
                $remember = (bool) $this->input->post('remember');

                if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
                {
                    
                        if($this->ion_auth->is_admin())
                        {
                            redirect('admin/dashboard', 'refresh');
                        }
                        elseif($this->ion_auth->is_member())
                        {
                            redirect('member/dashboard', 'refresh');
                        }
                        elseif($this->ion_auth->is_senior())
                        {
                            redirect('senior/dashboard', 'refresh');
                        }
                }
                else
                {
                    $this->session->set_flashdata('message', $this->ion_auth->errors());
				    redirect('auth/login', 'refresh');
                }
            }
            else
            {

                $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                $this->data['identity'] = array(
                    'name'        => 'identity',
                    'id'          => 'identity',
                    'type'        => 'email',
                    'value'       => $this->form_validation->set_value('identity'),
                    'class'       => 'form-control',
                    'placeholder' => lang('auth_your_email')
                );
                $this->data['password'] = array(
                    'name'        => 'password',
                    'id'          => 'password',
                    'type'        => 'password',
                    'class'       => 'form-control',
                    'placeholder' => lang('auth_your_password')
                );

                $this->data['goolgeRecSiteKey'] = $this->goolgeRecSiteKey;
                $this->data['goolgeRecsecret'] = $this->goolgeRecsecret;
                $this->data['goolgeReclang'] = $this->goolgeReclang;

                /* Load Template */
                $this->template->auth_render('auth/login', $this->data);
            }
        }
        else
        {
            redirect('/', 'refresh');
        }
   }

   function recaptcha($str='')
    {
    $google_url="https://www.google.com/recaptcha/api/siteverify";
    $secret=$this->goolgeRecsecret;
    log_message('error', 'secret: '.$secret);
    $ip=$_SERVER['REMOTE_ADDR'];
    $url=$google_url."?secret=".$secret."&response=".$str."&remoteip=".$ip;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_TIMEOUT, 10);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.16) Gecko/20110319 Firefox/3.6.16");
    $res = curl_exec($curl);
    curl_close($curl);
    $res= json_decode($res, true);
    //reCaptcha success check
    if($res['success'])
    {
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('recaptcha', 'The reCAPTCHA field is telling me that you are a robot. Shall we give it another try?');
      return FALSE;
    }
  }


    function logout($src = NULL)
	{
        $logout = $this->ion_auth->logout();

        $this->session->set_flashdata('message', $this->ion_auth->messages());

        if ($src == 'admin' || $src == 'senior' || $src == 'member')
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            redirect('/', 'refresh');
        }
	}

}
