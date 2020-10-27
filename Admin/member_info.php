<?php 

		// require_once 'bootstrap.html'; 
		
		require_once 'config/dbconnect.php';
 ?>
  <!DOCTYPE html>
<html lang="en">
<head>
	
 	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">	
	<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/member_info.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>

<?php require_once 'header.php'; ?>

<section class="mt-1">
	<div class="row">
		<div class="col-lg-10 col-md-9 ml-auto ml-4">
			<h3 class="text-center text-muted mt-5">Member Infomation</h3>
			<i class="fas fa-search fa-2x ml-5 "></i>
			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names/phone/email" title="Type in a name/phone/email"
			style="
			background-image: url('/css/searchicon.png');
		  	background-position: 10px 10px;
			background-repeat: no-repeat;
			width: 70%;
			font-size: 16px;
			padding: 12px 20px 12px 40px;
			border: 1px solid #ddd;
			margin-bottom: 12px;" class=" mt-4">
			<table class="table   table-hover   mt-5 w-85 col-md-12 col-sm-6 table-striped  ">
				<thead class="text-dark">
						<tr>						
							<th>Member Name</th>
							<th>Member Email</th>
							<th>Member Phone</th>
							<th>Status</th>
							<th>Approve</th>
							<th>Not Approve</th>
							
						</tr>
				</thead>
				<tbody id="myTable">
					<?php
							
							$res = mysqli_query($conn,"select * from  members");
							while ($row = mysqli_fetch_array($res)) {  ?>
							<tr>
								<th><?php  echo $row['member_name'];?></th>
								<th><?php  echo $row['member_email'];?></th>
								<th><?php  echo $row['member_phone'];?></th>
								<th><?php  echo $row['approve'];?></th>
								<th><a href="approve.php?id=<?php echo $row["member_id"];?>"><button class="btn btn-outline-success">
								 Approve</button></a></th>
								<th><a href="not-approve.php?id=<?php echo $row["member_id"];?>"><button class="btn btn-outline-warning">
								Not Approve</button></a></th>
								<th></th>
							</tr>
					<?php 
						}  	
					?>
				</tbody>
			</table>
		</div>
	</div>
</section>
			
			
 		


<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
<script src="library/bootstrap/popper.min.js"></script>
<script src="library/bootstrap/bootstrap.min.js"></script>
<script src="js/script.js"></script>

</body>
</html>
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

