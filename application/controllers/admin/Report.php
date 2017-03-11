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

        $pagenum = $this->input->get('pagenum');
        $pagesize = $this->input->get('pagesize');
        
        // Get sortdata info
        if (($this->input->get('sortdatafield') == '') && ($this->input->get('sortorder') == '')){
            $sortdatafield = NULL;
            $sortorder = NULL;
        } else{
            $sortdatafield = $this->input->get('sortdatafield');
            $sortorder = $this->input->get('sortorder');
        }

        // Get filterdata info
        if($this->input->get('filterChanged')){
            $filterslength = $this->input->get('filterslength');
            $filterData = $this->input->get('filterData');
            $filterCondition = $this->input->get('filterCondition');
            $filterOperator = $this->input->get('filterOperator');
            $filterParam = $this->input->get('filterParam');
        }

        $users = $this->report_model->getAllUsers($pagenum, $pagesize, $sortdatafield, $sortorder, $filterslength, $filterData, $filterCondition, $filterOperator, $filterParam);
       
        $data[] = array(
           'TotalRows' => $users['rowCount'],
           'Rows' => $users['queryData']
        );

       // log_message('error', 'data: ' .json_encode($data));
       echo json_encode($data);
    }

}
?>