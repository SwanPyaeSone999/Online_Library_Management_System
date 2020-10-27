<?php 

require_once 'config/dbconnect.php';
$issueid = $_GET['id'];
$book_id = $_GET['book_id'];
$book_issue_date = $_GET['book_issue_date'];
$date1 = strtotime($book_issue_date);
$date2 = strtotime(date("d-m-Y"));
$diff = $date2 - $date1 ;
$days = abs($diff/(60*60*24)); 
echo "$days";
$fine = 0 ;
if ($days > 7)	
$d = $days  -  7;
$fine   = $d * 200;
$returndate = date("d-m-Y");
$sql = "UPDATE issues SET book_return_date = '$returndate' ,  fine = '$fine' WHERE issue_id=$issueid";
mysqli_query($conn,$sql);
$sql2 = "UPDATE  books  set status = 'available' where book_id=$book_id ";
mysqli_query($conn,$sql2);
header("location:Return-Renew.php");

 ?>