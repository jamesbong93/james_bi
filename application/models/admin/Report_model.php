<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Report_model extends CI_Model
{	
	function __construct(){
		 parent::__construct();
	}

	public function getAllUsers($pagenum, $pagesize){

		$start = $pagenum * $pagesize;
		log_message('error', 'pagenum:' .$pagenum);
		log_message('error', 'pagesize:' .$pagesize);
		log_message('error', 'start:' .$start);
		$query = $this->db->query("SELECT * FROM dili_loginlog_temp LIMIT ".$start.",". $pagesize);
		// $query = $this->db->query("SELECT fusercode FROM dili_customer LIMIT ".$start.",". $pagesize);
		return $query->result_array();	
	}

	public function getUsersCount(){

		$query_all = $this->db->query('SELECT COUNT(*)
                FROM dili_loginlog_temp');
		$rowcount = $query_all->row_array();
		$count = $rowcount['COUNT(*)'];
		return $count;
	}
}

?>