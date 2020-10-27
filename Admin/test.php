<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<form method="post">
		<input type="text" name="ttt">
		<input type="submit" name="ccc">
	</form>

	<?php 
		if (isset($_POST['ccc'])) {
			$ttt = password_hash($_POST['ttt'], PASSWORD_DEFAULT);
			echo "$ttt";
		}

		
	 ?>
	
</body>
</html>