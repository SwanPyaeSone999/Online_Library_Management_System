<?php 
 require_once 'header.php';
require_once 'config/dbconnect.php';

		
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
	<link rel="stylesheet" href="css/member_info.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>

	<section class="tables">
		<div class="row">
			<div class="col-lg-10 col-md-9 ml-auto ml-4">
				<h3 class="text-center text-muted mt-5">Issue List</h3>
					
			<table id="table" class="table table-striped table-hover mt-5 w-85 col-lg-12 col-sm-6 animated slideup">
			<thead class="text-dark ">
					<tr>
						
						<th>Book Name</th>
						<th>Issue To</th>
						<th>Issued Date</th>
						<th>Issued Return date</th>						
						<th>Fine</th>
						
					</tr>
			</thead>
			<tbody>

			<?php
					
						
					
				$sql = "SELECT issues.book_id , issues.member_id , issues.book_issue_date,issues.book_return_date,  
						issues.fine,members.member_name,
				books.book_name FROM issues 
				LEFT OUTER JOIN members
				ON members.member_id = issues.member_id
				LEFT OUTER JOIN books
				ON books.book_id = issues.book_id ";
		 		$res = mysqli_query($conn,$sql);
				while ($row = mysqli_fetch_assoc($res)) {
						
					?>
						
							<tr>
								<!-- <th><?php  echo "$book_id";?></th>
								<th><?php echo "$member_id"; ?></th> -->
								<th><?php echo  $row['book_name']; ?></th>
								<th><?php echo  $row['member_name']; ?></th>
								<th><?php echo  $row['book_issue_date'];  ?></th>
								<th><?php echo 	$row['book_return_date'];  ?></th>
								<th><?php echo  $row['fine']; ?></th>
							</tr>
				<?php }
					 ?>
			</tbody>
		</table>	
			</div>
		</div>
</section>			
			


<!-- <link rel="stylesheet" href="css/dataTables.bootstrap.css"> -->
<!-- <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">    -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<!-- <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script> -->
<script src="library/bootstrap/jquery.dataTables.js"></script>

</body>
</html>
<script>
$(document).ready(function(){
    $('#table').dataTable();
});
</script>

</body>
</html>