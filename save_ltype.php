<?php
	require_once'class.php';
	if(ISSET($_POST['save'])){
		$db=new db_class();
		$ltype_name=$_POST['ltype_name'];
		$ltype_desc=$_POST['ltype_desc'];
		
		$db->save_ltype($ltype_name,$ltype_desc);
		
		header("location: loan_type.php");
	}
?>