<?php
	require_once'class.php';
	if(ISSET($_POST['update'])){
		$db=new db_class();
		$lplan_id=$_POST['lplan_id'];
		$lplan_month=$_POST['lplan_month'];
		$lplan_interest=$_POST['lplan_interest'];
		$lplan_penalty=$_POST['lplan_penalty'];
		$db->update_lplan($lplan_id,$lplan_month,$lplan_interest,$lplan_penalty);
		echo"<script>alert('Update loan Plan successfully')</script>";
		echo"<script>window.location='loan_plan.php'</script>";
	}
?>