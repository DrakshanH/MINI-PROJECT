<!DOCTYPE html>
<?php include "db.php"; ?>
<html lang="en">
<style>
    
    body 
    {
     font-family: Arial, sans-serif;
     line-height: 1.6;
     background-color: #FFFFFF; /* white background color */
    }
    
    h1, h2, h3, h4, h5, h6 
    {
     color: #333;
    }
    
    h1 
    {
     font-size: 2.5em;
     margin-left:20px;
    }
    
    .textbox 
    {
        width: 60%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #333;
        background-color: #fff; /*fff*/
        box-shadow: 0 0 10px #ccc;
        margin-left:center;
    }

    .btn
	{
	    margin-left:20px;
        text-align:center;
	}
</style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Users</title>
</head>
<body>
    <h1 style="text-align:center">Queries Registered</h1>

    <!-- buttons to navigate to the different webpages -->
    <div class="btn">
		<button><a href="index.php">Course Information</a></button>
		<button><a href="user_registration.php">Register Now</a></button>
		<button><a href="queries.php">Send Query</a></button>
		<button><a href="show_users.php">Show Users</a></button>
	</div>
    <br>
    
<?php
    // Retrieve queries data from the database
    $query = "SELECT * FROM queries";
    
    $result = $connection->query($query);
    // Display query information in HTML
    
    $select_all_courses_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_all_courses_query)) 
    {
        $user_id = $row['user_id'];
        $Q = $row['query'];
    ?>
    <div class="textbox">
        <h4>User ID : <?php echo $user_id; ?></h4>

        <p class="lead">QUERY : <?php echo $Q; ?></p>

    </div>
        <br>
    <?php
    }        
    ?>


</body>
</html>
