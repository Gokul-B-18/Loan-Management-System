<?php
	require_once'class.php';
	session_start();
	
	if(ISSET($_REQUEST['lplan_id'])){
		$lplan_id = $_REQUEST['lplan_id'];
		$db = new db_class();
		$db->delete_lplan($lplan_id);
		header('location:loan_plan.php');
	}
?>	