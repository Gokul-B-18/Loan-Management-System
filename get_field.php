<?php
	date_default_timezone_set("Etc/GMT+8");
	require_once'session.php';
	require_once'class.php';
	$db=new db_class(); 
	if(ISSET($_REQUEST['loan_id'])){
		$loan_id=$_REQUEST['loan_id'];
	}else{
		header("location: payment.php");
	}
	
	$tbl_loan=$db->conn->query("SELECT * FROM `loan` INNER JOIN `borrower` ON loan.borrower_id=borrower.borrower_id INNER JOIN `loan_plan` ON loan.lplan_id=loan_plan.lplan_id WHERE `loan_id`='$loan_id'");
	$fetch=$tbl_loan->fetch_array();
	$monthly =($fetch['amount'] + ($fetch['amount'] * ($fetch['lplan_interest']/100))) / $fetch['lplan_month'];
	$penalty=$monthly * ($fetch['lplan_penalty']/100);
	$totalAmount=$fetch['amount']+$monthly;
	$payment=$db->conn->query("SELECT * FROM `payment` WHERE `loan_id`='$loan_id'") or die($db->conn->error);
	$paid = $payment->num_rows;
	$offset = $paid > 0 ? " offset $paid ": "";
	$next = $db->conn->query("SELECT * FROM `loan_schedule` WHERE `loan_id`='$loan_id' ORDER BY date(due_date) ASC limit 1 $offset ")->fetch_assoc()['due_date'];
	$add = (date('Ymd',strtotime($next)) < date("Ymd") ) ?  $penalty : 0;
?>
<hr />
<div class="form-row">
	<div class="form-group col-xl-6 col-md-6">
		<label>Payee<label>
		<input type="text" value="<?php echo $fetch['lastname'].", ".$fetch['firstname']." ".substr($fetch['middlename'], 0, 1)?>." name="payee" class="form-control" readonly="readonly"/>
		<input type="hidden" value="<?php echo number_format($add, 2)?>" name="penalty"/>
		<input type="hidden" value="<?php echo number_format($monthly+$add, 2)?>" name="payable"/>
		<input type="hidden" value="<?php echo $fetch['lplan_month'];?>" name="month"/>
	</div>
</div>

<hr />

<div class="form-row">
	<div class="form-group col-xl-6 col-md-6">
		<p>Montly Amount: <strong>&#8369; <?php echo number_format($monthly, 2)?></strong></p>
		<p>Penalty: <strong>&#8369; <?php echo number_format($add, 2)?></strong></p>
		<p>Payable Amount: <strong>&#8369; <?php echo number_format($monthly+$add, 2)?></strong></p>
	</div>
	<div class="form-group col-xl-6 col-md-6">
		<label>Amount<label>
		<input type="text" class="form-control" name="payment" vrequired onkeyup="this.value=this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1')" required="required"/>
	</div>
</div>