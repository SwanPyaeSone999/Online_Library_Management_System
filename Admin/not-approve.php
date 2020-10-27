<?php 

require_once 'config/dbconnect.php';
	$id = $_GET['id'];
	if (mysqli_query($conn,"update members set approve='no' where member_id=$id")) {
		// alert("Not Approve success!");
	}else{
		echo "Not approve fail".mysqli_error($conn);
	}

	header("location:member_info.php");

 ?>