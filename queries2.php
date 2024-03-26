<?php
if(isset($_POST['submit'])) 
{
	$user_id = $_POST['user_id'];
	$qu = $_POST['query'];
	
	$connection = mysqli_connect('localhost','root','','courses');

    //inserting the values into the table
	$q = "INSERT INTO queries(user_id,query) VALUES ('$user_id','$qu') ";
	$result = mysqli_query($connection,$q);
	if(!$result) 
    {
		echo "Query Failed";
	}
	else 
    {
		echo "Inserting into table succeeded";
	}
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Queries</title>
	<link rel="stylesheet" href="./style.css">
	<style>
		body 
		{
			background-color: #f2e6ff ; /* blue background color */
			margin: 0;
			font-family: Arial, sans-serif; /* Specify a preferred font */
		}

		.textbox 
		{
			width: 50%;
			margin: 0 auto;
			padding: 20px;
			border: 1px solid #333;
			background-color: #fff;
			box-shadow: 0 0 10px #ccc;
		}

		.btn
		{
			margin-left:10px;
			text-align:center;
		}
	</style>
</head>
<body>
	<h1 style="text-align:center"> Send Query </h1>

    <!-- buttons to navigate to the different webpages -->
	<div class="btn">
		<button><a href="index.php">Course Information</a></button>
		<button><a href="user_registration.php">Register Now</a></button>
		<button><a href="show_users.php">Show Users</a></button>
		<button><a href="show_queries.php">Show Queries</a></button>
	</div>
	<br>

	<div class="textbox">
		<div class="col-xs-6">
			<form action="queries2.php" method="post" style="font-size:20px">
				<div class="form-group">
					<label for="user_id">User ID</label>
					<br><input type="text" style="font-size:20px" name="user_id" class="form-control">
				</div>

                <div class="form-group">
					<label for="query">Query</label><br>
					<textarea rows="5" cols="50" style="font-size:20px" name="query" class="form-control"></textarea>
				</div>
				<br>

				<input type="submit" style="font-size:20px" class="btn btn-primary" name="submit" value="Submit">

			</form>
		</div>
	</div>
</body>
</html>
