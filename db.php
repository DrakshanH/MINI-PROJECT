<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "courses";


// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($connection->query($sql) === FALSE) 
{
    die("Error creating database: " . $connection->error);
}


// Check connection
if(!$connection) 
{
	echo "Sorry You are not connected";
}

  
// Create 'courses' table
$sql = "CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL,
    course_cost DECIMAL(10, 2) NOT NULL,
    course_duration INT NOT NULL,
    course_code VARCHAR(10) NOT NULL UNIQUE,
    course_description VARCHAR(500)NOT NULL)";

if ($connection->query($sql) === FALSE) 
{
    die("Error creating table 'courses': " . $connection->error);
}


// Create 'users' table
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    course_code VARCHAR(10) NOT NULL,
    FOREIGN KEY (course_code) REFERENCES courses(course_code)
)";

if ($connection->query($sql) === FALSE) 
{
    die("Error creating table 'users': " . $connection->error);
}

// Create 'queries' table
$sql = "CREATE TABLE IF NOT EXISTS queries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    query TEXT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id))";

if ($connection->query($sql) === FALSE) 
{
    die("Error creating table 'queries': " . $connection->error);
}


?>
