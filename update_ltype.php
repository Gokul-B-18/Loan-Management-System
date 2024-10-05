<?php
	require_once'class.php';
	if(ISSET($_POST['update'])){
		$db=new db_class();
		$ltype_id=$_POST['ltype_id'];
		$ltype_name=$_POST['ltype_name'];
		$ltype_desc=$_POST['ltype_desc'];
		$db->update_ltype($ltype_id,$ltype_name,$ltype_desc);
		echo"<script>alert('Update loan type successfully')</script>";
		echo"<script>window.location='loan_type.php'</script>";
	}
?>