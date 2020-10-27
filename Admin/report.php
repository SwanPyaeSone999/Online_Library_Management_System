<?php 		
	
		require_once 'config/dbconnect.php';
	



 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">	
	<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	<!-- <link rel="stylesheet" href="css/bootstrap.min_1.css"> -->
	<link rel="stylesheet" href="css/tableexport.min.css">
	<link rel="stylesheet" href="css/">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>

		<?php 	require_once 'header.php'; ?>

		
		<section class="">
			<div class="row mt-2">
				<div class="col-lg-10 col-md-9 ml-auto">
					<h3 class="text-center text-muted mt-5">Generate Report</h3>
					<!-- <h5 class="text-center">Date</h5> -->
			<form action="" method="get" class="" class="justify-content-center">
						
			<div class="d-flex justify-content-center mt-3">
			<p class="mt-1 mr-4 text-dark font-weight-bold"> Date From</p><input type="date"  name="datefrom"  placeholder="DD-MM-YYY">
			<p class="mt-1 mr-4 text-dark font-weight-bold ml-3">To</p> <input type="date"  name="dateto" placeholder="DD-MM-YYY">
			<button class="btn btn-secondary ml-3" name="submit">Search</button>							
			</div>
			</form>
			<div class="container mt-3" id="table1">
				<table   class="table table-hover">

			<thead class="text-dark">
					<tr>
						<!-- <th>Book ID</th> -->
						<!-- <th>Member ID</th> -->
						<th>Book Name</th>
						<th>Issue To</th>
						<th>Issued Date</th>
						<th>Issued Return date</th>						
						<th>Fine</th>
						
					</tr>
			<tbody  >
				<?php		
					if (isset($_GET['submit'])) {	
						 $dateF = date('d-m-Y', strtotime($_GET['datefrom']));
    					$dateT = date('d-m-Y', strtotime($_GET['dateto']));
				$sql = "SELECT issues.book_id , issues.member_id , issues.book_issue_date,
						issues.book_return_date,  
						issues.fine,members.member_name,
						books.book_name FROM issues 
						LEFT OUTER JOIN members
						ON members.member_id = issues.member_id
						LEFT OUTER JOIN books
						ON books.book_id = issues.book_id   WHERE `book_issue_date`
						BETWEEN '$dateF' AND '$dateT'  ORDER BY `book_issue_date` ASC";
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
						$book_return_date = $row['book_return_date'];

						$fine = $row['fine'];
						// echo "$fine";

					?>
						
						<tr>
								
								<th><?php echo "$book_name"; ?></th>
			

			
								<th><?php  echo "$member_name" ?></th>
								<th><?php echo "$book_issue_date";  ?></th>
								<th><?php echo "$book_return_date";  ?></th>
								<th><?php echo "$fine";  ?></th>
							</tr>
				<?php }
						}
					 ?>
			</tbody>
				
			
			</thead>
			
		</table>
			</div>
				
				
				</div>
			</div>
		</section>



<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min_1.js"></script>
<script src="js/FileSaver.min.js"></script>
<script src="js/tableexport.min.js"></script>
<script src="js/script.js"></script>

<script>
	$('#table1').tableExport();
</script>

</body>
</html>