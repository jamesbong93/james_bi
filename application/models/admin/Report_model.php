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
	
	public function getAllUsers($pagenum, $pagesize, $sortdatafield, $sortorder, $filterslength, $filterData, $filterCondition, $filterOperator, $filterParam){

		$start = $pagenum * $pagesize;
		// filter
		if ($filterslength > 0)
		{
				$where = " WHERE (";
				$tmpdatafield = "";
				$tmpfilteroperator = "";
				for ($i=0; $i < $filterslength; $i++)
			    {
			    	
			    	// set filter datafield and value
			    	$filterDataField = $filterData[$i]['dataField'];
			    	$filterValue = $filterData[$i]['dataValue'];

					if ($tmpdatafield == "")
					{
						$tmpdatafield = $filterDataField;			
					}
					else if ($tmpdatafield <> $filterDataField)
					{
						$where .= ")AND(";
					}
					else if ($tmpdatafield == $filterDataField)
					{
						if ($tmpfilteroperator == 0)
						{
							$where .= " AND ";
						}
						else $where .= " OR ";	
					}
					
					// build the "WHERE" clause depending on the filter's condition, value and datafield.
					switch($filterCondition)
					{
						case "CONTAINS":
							$where .= " " . $filterDataField . " LIKE '%" . $filterValue ."%'";
							break;
						case "DOES_NOT_CONTAIN":
							$where .= " " . $filterDataField . " NOT LIKE '%" . $filterValue ."%'";
							break;
						case "EQUAL":
							$where .= " " . $filterDataField . " = '" . $filterValue ."'";
							break;
						case "NOT_EQUAL":
							$where .= " " . $filterDataField . " <> '" . $filterValue ."'";
							break;
						case "GREATER_THAN":
							$where .= " " . $filterDataField . " > '" . $filterValue ."'";
							break;
						case "LESS_THAN":
							$where .= " " . $filterDataField . " < '" . $filterValue ."'";
							break;
						case "GREATER_THAN_OR_EQUAL":
							$where .= " " . $filterDataField . " >= '" . $filterValue ."'";
							break;
						case "LESS_THAN_OR_EQUAL":
							$where .= " " . $filterDataField . " <= '" . $filterValue ."'";
							break;
						case "STARTS_WITH":
							$where .= " " . $filterDataField . " LIKE '" . $filterValue ."%'";
							break;
						case "ENDS_WITH":
							$where .= " " . $filterDataField . " LIKE '%" . $filterValue ."'";
							break;
					}

					if ($i == $filterslength - 1)
					{
						$where .= ")";
					}
					
					$tmpfilteroperator = $filterOperator;
					$tmpdatafield = $filterDataField;			
				}
				log_message('error', '$where: ' .$where);
				$queryCheck = "SELECT * FROM dili_customer $where ORDER BY $filterDataField $sortorder ";
				$total_rows = $this->db->query("SELECT COUNT(*) FROM dili_customer $where");
				$count = $total_rows->row_array();	
				$rowcount = $count['COUNT(*)'];	

				$query = $this->db->query("SELECT * FROM dili_customer $where ORDER BY $filterDataField $sortorder LIMIT $start , $pagesize ");

				return array('queryData' => $query->result_array(), 'rowCount' => $rowcount);		
		}

		// sorting
		if (isset($sortdatafield))
		{
			$allRows = $this->getAllUsersCount();

			if ($sortdatafield != NULL)
			{
				$query = $this->db->query("SELECT * FROM dili_customer ORDER BY $sortdatafield $sortorder LIMIT $start, $pagesize");

				$rowcount = $this->getAllUsersCount();
				return array('queryData' => $query->result_array(), 'rowCount' => $rowcount);
			}
		}
		else 
		{
			$query = $this->db->query("SELECT * FROM dili_customer LIMIT $start ,$pagesize");
			$rowcount = $this->getAllUsersCount();
			return array('queryData' => $query->result_array(), 'rowCount' => $rowcount);	
		}
		
	}

	public function getAllUsersCount(){
		$query_all = $this->db->query('SELECT COUNT(*) FROM dili_customer');
		$rowcount = $query_all->row_array();
		$count = $rowcount['COUNT(*)'];
		return $count;
	}
}

?>