<?php
	date_default_timezone_set("Etc/GMT+8");
	require_once'class.php';
	if(ISSET($_POST['apply'])){
		$db=new db_class();
		$borrower=$_POST['borrower'];
		$ltype=$_POST['ltype'];
		$lplan=$_POST['lplan'];
		$loan_amount=$_POST['loan_amount'];
		$purpose=$_POST['purpose'];
		$date_created=date("Y-m-d H:i:s");
		
		$db->save_loan($borrower,$ltype,$lplan,$loan_amount,$purpose, $date_created);
		
		header("location: loan.php");
	}
?>