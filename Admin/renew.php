<?php 

require_once 'config/dbconnect.php';
$issue_id = $_GET['id'];

$book_issue_date = $_GET['book_issue_date'];
echo "$book_issue_date<br>";			
$date1 = strtotime($book_issue_date);
$date2 = strtotime(date("d-m-Y"));
$diff = $date2 - $date1 ;
$days = abs($diff/(60*60*24)); 
echo "$days<br>";
$fine = 0 ;
if ($days > 7){
$d = $days  -  7;
$fine   = $d * 200;
}
echo "$fine";
$date = mysqli_real_escape_string($conn,date("d-m-Y"));

 $sql = "UPDATE issues SET book_issue_date='$date' ,  fine = '$fine' WHERE issue_id = '$issue_id';";
			if (mysqli_query($conn,$sql)) {
					echo "<script>alert('Renew  successfully!');</script>";
			}else{
					echo "Udate faiel".mysqli_error($conn);
			}
			header("location:Return-Renew.php");
 ?>

