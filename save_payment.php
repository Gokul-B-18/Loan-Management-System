<?php
	date_default_timezone_set("Etc/GMT+8");
	require_once'class.php';
	if(ISSET($_POST['save'])){
		$db=new db_class();
		$loan_id=$_POST['loan_id'];
		$payee=$_POST['payee'];
		$penalty=$_POST['penalty'];
		$payable=str_replace(",", "", $_POST['payable']);
		$payment=$_POST['payment'];
		$month=$_POST['month'];
		
		if($penalty == 0){
			$overdue=0;
		}else{
			$overdue=1;
		}
		
		
	
		if($payable != $payment){
			echo "<script>alert('Please enter a correct amount to pay!')</script>";
			echo "<script>window.location='payment.php'</script>";	
		}else{
			$db->save_payment($loan_id, $payee, $payment, $penalty, $overdue);
			$count_pay = $db->conn->query("SELECT * FROM `payment` WHERE `loan_id`='$loan_id'")->num_rows;
			
			if($count_pay===$month){
				$db->conn->query("UPDATE `loan` SET `status`='3' WHERE `loan_id`='$loan_id'") or die($db->conn->error);
			}
			
			
			header("location: payment.php");
		}
		
	}
?>