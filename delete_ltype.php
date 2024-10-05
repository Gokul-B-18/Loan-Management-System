<?php
	require_once'class.php';
	session_start();
	
	if(ISSET($_REQUEST['ltype_id'])){
		$ltype_id = $_REQUEST['ltype_id'];
		$db = new db_class();
		$db->delete_ltype($ltype_id);
		header('location:loan_type.php');
	}
?>	