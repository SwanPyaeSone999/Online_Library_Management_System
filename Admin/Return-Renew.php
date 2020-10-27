<?php 

		
		
		require_once 'config/dbconnect.php';
		// if (isset($_POST['return-book'])) {
		// 	$bookid = mysqli_real_escape_string($conn,$_POST['bookid']);
		// 	echo "";
		// 	$sql = "DELETE From issues where book_id = '$bookid'";
		// 	mysqli_query($conn,$sql);
		// 	$sql2 = "UPDATE  books  set status = 'available' where book_id='$bookid'";
		// 	mysqli_query($conn,$sql2);
		// }

		// if (isset($_POST['renew-book'])) {
		// 	$bookid = mysqli_real_escape_string($conn,$_POST['bookid']);
		// 	$date = mysqli_real_escape_string($conn,date("d-m-Y"));
		// 	$sql = "UPDATE issues SET book_issue_date='$date' , renew_count = renew_count + 1 
		// 			WHERE book_id = '$bookid';";
		// 	if (mysqli_query($conn,$sql)) {
		// 			echo "<script>alert('Renew  successfully!');</script>";
		// 	}else{
		// 			echo "Udate faiel".mysqli_error($conn);
		// 	}
			
		// }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>bootstrap template</title>
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">	
	<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/add_book.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>
	<?php require_once 'header.php'; ?>
		
	<section class="tables">
		<div class="row">
			<div class="col-lg-10 col-md-9 ml-auto ml-4">
				<h3 class="text-center text-muted mt-5">Return book</h3>
				<i class="fas fa-search fa-2x ml-5 mt-3"></i>
				<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name"
				style="
				  background-image: url('/css/searchicon.png');
				  background-position: 10px 10px;
				  background-repeat: no-repeat;
				  width: 70%;
				  font-size: 16px;
				  padding: 12px 20px 12px 40px;
				  border: 1px solid #ddd;
				  margin-bottom: 12px;" class=" mt-4">
				<table class="table   table-hover   mt-5 w-85 col-md-12 col-sm-6 table-striped ">
						<thead  class="text-dark">
								<tr>
									<!-- <th>Book ID</th>
									<th>Member ID</th> -->
									<th>Book Name</th>
									<th>Issue To</th>
									<th>Issued Date</th>
									<th>Days</th>
									<th>Fine</th>
									<th>Return</th>						
								</tr>
						</thead>
			<tbody id="myTable">

			<?php	
				$sql = "SELECT  issues.issue_id, issues.book_id , issues.member_id , issues.book_issue_date , members.member_name,
					 	members.approve , books.book_name , books.status FROM issues 
						LEFT OUTER JOIN members
						ON members.member_id = issues.member_id
						LEFT OUTER JOIN books
						ON books.book_id = issues.book_id where book_return_date= '' ORDER BY book_issue_date asc ";
		 				$res = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_assoc($res)) {
						$book_id = $row['book_id'];	
						// echo "$book_id";
						$member_id = $row['member_id'];
						// echo "$member_id";	
						$book_issue_date = $row['book_issue_date'];	
						// echo "$book_issue_date";
						$member_name = $row['member_name'];	
						// echo "$member_name";
						$book_name = $row['book_name'];
						// echo "$book_name";
						$approve = $row['approve'];
						// echo "$approve";
						$status = $row['status'];
						// echo "$status";
						
					?>
							
						<tr>
								<!-- <th><?php  echo "$book_id";?></th>
								<th><?php echo "$member_id"; ?></th> -->
								<th><?php echo "$book_name"; ?></th>
								<th><?php  echo "$member_name" ?></th>
								<th><?php echo "$book_issue_date"; ?></th>
	
							<?php 
									$date1 = strtotime($book_issue_date);
									$date2 = strtotime(date("d-m-Y"));
									$diff = $date2-$date1;
									$day = abs($diff/(60*60*24));
									// echo "$day";
									$fine = 0 ;
									if ($day > 7){
									$d = $day  -  7;
									// echo "$d";
									$fine   = $d * 200;
									}else{
										$fine = 0;
									}		
									
							  ?>
									<th><?php echo $day; ?></th>
									<th><?php echo $fine; ?></th>
							

								<th>
								<a href="return.php?id=<?php echo $row["issue_id"];?>&book_id=<?php echo $row["book_id"];?>&book_issue_date=<?php echo $row['book_issue_date'] ?>"><button class="btn btn-outline-success">
								 Return</button></a>	
								<a href="renew.php?id=<?php echo $row["issue_id"];?>&book_issue_date=<?php echo $row['book_issue_date'] ?>"><button class="btn btn-outline-warning">
								 Renew</button></a>
								</th>
					
				<?php 
						}
					
					?>	
				</tr>
			</tbody>
			</div>
		</div>
	</section>

			
			


	

<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
	<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
</body>
</html>
