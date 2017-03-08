<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Report extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
        $this->load->model('admin/report_model', 'report_model');

        // $this->load->model('admin/report_model');
        /* load JavaScript library */
		$this->load->library('javascript');

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Reports', 'admin/report');
	}

	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Load Template */
            $this->template->admin_render('admin/report/index', $this->data);
        }
	}

    public function getUsers(){

        $pagenum = $_GET['pagenum'];
        $pagesize = $_GET['pagesize'];
        
        $users = $this->report_model->getAllUsers($pagenum, $pagesize);
        $usersCount = $this->report_model->getUsersCount();
        log_message('error', 'rowcount:' .$usersCount);
        $data[] = array(
           'TotalRows' => $usersCount,
           'Rows' => $users
        );
        echo json_encode($data);
    }

}
?>