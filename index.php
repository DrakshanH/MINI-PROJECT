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
    color: #333; /*blac text color*/
}

h1 
{
    font-size: 2.5em;
    text-align:center; /*text alignment as center */
}

.textbox 
{
    width: 60%;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #333;
    background-color: #8DEEF9; /*sea blue color of the box*/
    box-shadow: 0 0 10px #ccc;
    margin-left:center;
}

button
{
    margin-left:10px;
}

.btn
{
    text-align:center;
}

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Information</title>
</head>
<body>
    <h1 style="margin-left:20px">Available Courses</h1>

    <!-- buttons to navigate to the different webpages -->
    <div class="btn">
        <button><a href="user_registration.php">Register Now</a></button>
        <button><a href="queries.php">Send Query</a></button>
        <button><a href="show_users.php">Show Users</a></button>
        <button><a href="show_queries.php">Show Queries</a></button>
    </div>

    <br>

    <?php
    // Retrieve course data from the database
    $query = "SELECT * FROM courses";
    
    $result = $connection->query($query);
    // Display course information in HTML
    
    $select_all_courses_query=mysqli_query($connection,$query);
    while($row=mysqli_fetch_assoc($select_all_courses_query)) 
    {
        $course_id = $row['id'];
        $course_name = $row['course_name'];
        $course_code = $row['course_code'];
        $course_cost = $row['course_cost'];
        $course_duration = $row['course_duration'];
        $course_description = $row['course_description'];
    ?>
    
    <div class="textbox">
        <h2><?php echo $course_name; ?></h2>

        <p class="lead">Course Code : <?php echo $course_code; ?></p>
                
        <p><span class="glyphicon glyphicon-time"></span> Cost : Rs.<?php echo $course_cost; ?></p>

        <p> Course Duration : <?php echo $course_duration." hours"; ?></p>
                            
        <p> Course Description : <?php echo $course_description; ?></p>
    </div>

    <br>
    <?php
    }        
    ?>
    
</body>
</html>
