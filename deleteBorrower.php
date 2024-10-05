<?php
	require_once'class.php';
	session_start();
	
	if(ISSET($_REQUEST['borrower_id'])){
		$borrower_id = $_REQUEST['borrower_id'];
		$db = new db_class();
		$db->delete_borrower($borrower_id);
		header('location:borrower.php');
	}
?>	