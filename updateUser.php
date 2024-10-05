<?php
	require_once'class.php';
	if(ISSET($_POST['update'])){
		$db=new db_class();
		$user_id=$_POST['user_id'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$db->update_user($user_id, $username, $password, $firstname, $lastname);
		echo"<script>alert('Update user successfully')</script>";
		echo"<script>window.location='user.php'</script>";
	}
?>