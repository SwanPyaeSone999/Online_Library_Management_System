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
  <link rel="stylesheet" href="css/view_book.css">
  <link rel="shortcut icon" href= "images/booklogo.png">
</head>
<body>


<?php require_once 'header.php'; ?>
<section class="tables">
        <div class="row">
          <div class="col-lg-10 col-md-9 ml-auto ml-4">
            <h3 class="text-center text-muted mt-5">Display Book Info</h3>
            
          
            <table  id="table" class="table table-striped  table-hover mt-3 w-85 col-lg-12 col-sm-6">
                <thead>
                <tr>                
                  <th>Book Image</th>
                  <th>Book Name</th>
                  <th>Book Author</th>
                  <th>Book Publisher</th>
                  <th>Book Purchase Date</th>                   
                  <th>Book Category</th>                    
                  <th>Status</th>                     
                  <th>Edit OR Delete</th>             
                </
                tr>
                </thead>
                <tbody id="myTable">
                 <?php $res = mysqli_query($conn,"SELECT * from  books where flag = 'yes' order by created_at desc");
              while ($row = mysqli_fetch_array($res)) {  ?>
                        <tr>
                 
                                        <!-- show iamge -->
                    <th><img src="<?php echo $row['book_img']; ?>" height="50" width="50"></th>
                    <th><?php echo $row['book_name'] ?></th>
                                        <th class="text-center"><?php  echo $row['book_author'];?></th>
                                        <th class="text-center"><?php  echo $row['book_publisher'];?></th>
                                        <th class="text-center"><?php  echo $row['book_published_date'];?></th>
                                        <th class="text-center"><?php  echo $row['book_category'];?></th>
                                        <th class="text-center"><?php  echo $row['status'];?></th>
                                    <th>
                                      <a href="book_edit.php?id=<?php echo    $row['book_id']; ?>" class="btn btn-outline-success"><i class="fas fa-edit"></i></a>
                                      <a href="delete_book.php?id=<?php echo  $row['book_id']; ?>" class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                                    </th>
                                  
                        </tr>
                
                    <?php } ?>
                
                     </tbody>
              </table>
           
          </div>
        </div>
      </section>

<script src="library/bootstrap/jquery-3.4.1.slim.min.js"></script>
  <script src="library/bootstrap/popper.min.js"></script>
  <script src="library/bootstrap/bootstrap.min.js"></script>
<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"></style>
<script src="library/bootstrap/jquery.dataTables.js"></script>

</body>
</html>
<script>
$(document).ready(function(){
    $('#table').dataTable();
});
</script>

