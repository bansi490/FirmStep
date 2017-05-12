<?php

class firmstep_class{
	
	/* ------------------------------------------ " customer " --------------------------------*/
	
	function insert_customer($cust_type,$title,$firstname,$lastname,$org_name,$anonymous,$service){
		$sql = "insert into `customer`(`cust_type`,`title`,`firstname`,`lastname`,`org_name`,`anonymous`,`service`,`que_time`) value ('$cust_type','$title','$firstname','$lastname','$org_name','$anonymous','$service',NOW())";
		$result = mysql_query($sql);
		
		if($result){
			$message = "New customer added..!";
			echo "<script type='text/javascript'>alert('$message');</script>";
			header("location:index.php");
		}
	}
	
	function select_customer(){
		
		$sql = "SELECT * FROM `customer` WHERE `que_date` >= CURDATE()";
		$result = mysql_query($sql);
		
		if($result){
			return $result;
		}
		
	}
	
	/* ------------------------------------------ " services " --------------------------------*/
	
	function select_services(){
		
		$sql = "SELECT * FROM `services`";
		$result = mysql_query($sql);
		
		if($result){
			return $result;
		}
		
	}
	
}
?>