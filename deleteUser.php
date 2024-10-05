<?php
	require_once'class.php';
	session_start();
	
	if(ISSET($_REQUEST['user_id'])){
		$user_id = $_REQUEST['user_id'];
		$db = new db_class();
		$db->delete_user($user_id);
		header('location:user.php');
	}
?>	