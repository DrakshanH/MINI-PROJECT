<?php
if(isset($_POST['submit'])) 
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$course_code = $_POST['course_code'];

	$connection = mysqli_connect('localhost','root','','courses');

    //discouraging sql-injection
    $name = mysqli_real_escape_string($connection, $name);
    $password = mysqli_real_escape_string($connection, $password);

    //encrypting our password
    $hashFormat="$2y$10$";
    $salt = "randomshitwrittenhere2";

    $hash_and_salt = $hashFormat . $salt;

    $password = crypt($password,$hash_and_salt);

    //inserting the values into the table
	$query = "INSERT INTO users(name,email,password,course_code) VALUES ('$name','$email','$password','$course_code') ";
	$result = mysqli_query($connection,$query);
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
	<title>User Registration</title>
	<link rel="stylesheet" href="./style.css">
	<style>

		body 
		{
			background-color: #f2f2f2; /* light gray background color */
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

		input
		{
			width: 300px;
		}

		.btn
		{
			margin-left:10px;
			text-align:center;
		}
	</style>
</head>
<body>
	<h1 style="text-align:center"> User Registration </h1>

    <!-- buttons to navigate to the different webpages -->
	<div class="btn">
		<button><a href="index.php">Course Information</a></button>
		<button><a href="queries.php">Send Query</a></button>
		<button><a href="show_users.php">Show Users</a></button>
		<button><a href="show_queries.php">Show Queries</a></button>
	</div>
	<br>

	<div class="textbox">
		<div class="col-xs-6">
			<form action="user_registration2.php" method="post" style="font-size:20px">
				<div class="form-group">
					<label for="name">Name</label>
					<br><input type="text" style="font-size:20px" name="name" class="form-control" required>
				</div>

                <div class="form-group">
					<label for="email">Email</label><br>
					<input type="email" style="font-size:20px" name="email" class="form-control" required>
				</div>

				<div class="form-group">
					<label for="password">Password</label><br>
					<input type="password" style="font-size:20px" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
				</div>

                <div class="form-group">
					<label for="course_code">Course Code</label><br>
					<input type="text" style="font-size:20px" name="course_code" class="form-control" required>
				</div>
				<br>
				<input type="submit" style="font-size:20px" class="btn btn-primary" name="submit" value="Submit">

			</form>
		</div>
	</div>
</body>
</html>
