<?php
	require_once'class.php';
	session_start();
	
	if(ISSET($_REQUEST['loan_id'])){
		$loan_id = $_REQUEST['loan_id'];
		$db = new db_class();
		$db->delete_loan($loan_id);
		header('location:loan.php');
	}
?>	