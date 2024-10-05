<?php
	require_once'class.php';
	if(ISSET($_POST['update'])){
		$db=new db_class();
		$borrower_id=$_POST['borrower_id'];
		$firstname=$_POST['firstname'];
		$middlename=$_POST['middlename'];
		$lastname=$_POST['lastname'];
		$contact_no=$_POST['contact_no'];
		$address=$_POST['address'];
		$email=$_POST['email'];
		$tax_id=$_POST['tax_id'];
		$db->update_borrower($borrower_id,$firstname,$middlename,$lastname,$contact_no,$address,$email,$tax_id);
		echo"<script>alert('Update Borrower successfully')</script>";
		echo"<script>window.location='borrower.php'</script>";
	}
?>