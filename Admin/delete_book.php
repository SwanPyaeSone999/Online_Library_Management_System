<?php 

		


	require_once 'config/dbconnect.php';
	$id = $_GET['id'];
	if (!mysqli_query($conn,"UPDATE books SET flag = 'no'  where book_id=$id")) {
		echo "mysqli_error".mysqli_error($conn);
	}

	header("location:view_book.php");

	// alert("Successfully delete book!");




 ?>