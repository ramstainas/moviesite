<?php
$servername = "localhost";
$username = "ramunas";
$password =  "mazojifeja";
$db = "bigmovies";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE $db";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully <br>";
} else {
    echo "Error creating database: " . $conn->error;
}
//create connection
$conn = mysqli_connect($servername, $username, $password, $db);

//check connection
if (!$conn){
  die ("Connection failed" . mysqli_connect_error());
}

// sql to create director table
$sql = "CREATE TABLE directors (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(45) NOT NULL,
  about text)";

if (mysqli_query($conn, $sql)) {
    echo "Table Directors created successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}


// sql to create genres table
$sql = "CREATE TABLE genres (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(45) NOT NULL)";


if (mysqli_query($conn, $sql)) {
    echo "Table genres created successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}

// sql to create movies table
$sql = "CREATE TABLE movies (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  title varchar(45) NOT NULL,
  year int(11) NOT NULL,
  image_url varchar(255) NOT NULL,
  certificate varchar(45) DEFAULT NULL,
  runtime int(11) DEFAULT NULL,
  imdb_rating float DEFAULT NULL,
  description text,
  metascore int(11) DEFAULT NULL,
  votes int(11) DEFAULT NULL,
  gross int(11) DEFAULT NULL)";


if (mysqli_query($conn, $sql)) {
    echo "Table movies created successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}

// sql to create movies_directors table
$sql = "CREATE TABLE movies_directors (
  movies_id int(11) NOT NULL,
  directors_id int(11) NOT NULL)";


if (mysqli_query($conn, $sql)) {
    echo "Table movies_directors created successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}


// sql to create movies_directors table
$sql = "CREATE TABLE movies_genres (
  movies_id int(11) NOT NULL,
  genres_id int(11) NOT NULL
)";


if (mysqli_query($conn, $sql)) {
    echo "Table movies_genres created successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}


// sql to create movies_stars table
$sql = "CREATE TABLE movies_stars (
  movies_id int(11) NOT NULL,
  stars_id int(11) NOT NULL
)";


if (mysqli_query($conn, $sql)) {
    echo "Table movies_stars created successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}

// sql to create stars table
$sql = "CREATE TABLE stars (
  id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name varchar(45) NOT NULL,
  about text
)";


if (mysqli_query($conn, $sql)) {
    echo "Table stars created successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}

// sql to create table
$sql = "CREATE TABLE user (
id INT(11) not null AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(128) NOT NULL,
lastname VARCHAR(128) NOT NULL,
email VARCHAR(128) NOT NULL,
uid VARCHAR(128) NOT NULL,
pwd VARCHAR(1000) NOT NULL);";

if (mysqli_query($conn, $sql)) {
    echo "Table User created successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}


mysqli_close($conn);
?>

