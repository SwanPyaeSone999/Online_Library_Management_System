<?php 
require_once 'config/dbconnect.php';
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM members";
 $result = mysqli_query($conn, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>MemberName</th>  
                         <th>Member Email</th>  
                         <th>Member Phone</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["member_name"].'</td>  
                         <td>'.$row["member_email"].'</td>  
                         <td>'.$row["member_phone"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=downloadaa.xls');
  echo $output;
 }
}
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">	
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Library Management System</title>
	<link rel="stylesheet" href="library/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="library/fontawesome/fontawesome-all.min.css">	
	<link href="https://fonts.googleapis.com/css2?family=Lemonada:wght@300&family=Playfair+Display:wght@500&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/index.css">
	<link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>

<table class="table table-res table-dark table-hover mt-5 w-85 col-lg-12 col-sm-6">
			<thead class="text-white ">
					<tr>
						<th>Member ID</th>
						<th>Member Name</th>
						<th>Member Password</th>
						<th>Member Email</th>
						<th>Member Phone</th>
						<th>Status</th>
						<th>Approve</th>
						<th>Not Approve</th>x
					</tr>
			</thead>
			<tbody>
				<?php
						
							$res = mysqli_query($conn,"SELECT * from members");
							while ($row = mysqli_fetch_array($res)) 
								{  ?>
							<tr>
								<th><?php  echo $row['member_id'];?></th>
								<th><?php  echo $row['member_name'];?></th>
								<th><?php  echo $row['member_password'];?></th>
								<th><?php  echo $row['member_email'];?></th>
								<th><?php  echo $row['member_phone'];?></th>


								<th><?php  echo $row['approve'];?></th>
								<th><a href="approve.php?id=<?php echo $row["member_id"];?>"><button class="btn btn-outline-success">
								 Approve</button></a></th>
								<th><a href="not-approve.php?id=<?php echo $row["member_id"];?>"><button class="btn btn-outline-warning">
								Not Approve</button></a></th>
							</tr>
						<?php 	}  
								
						?>
			</tbody>
		</table>

		 <br />
    <form method="post" action="">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>


	<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
	<script src="library/bootstrap/popper.min.js"></script>
	<script src="library/bootstrap/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
</body>
</html>