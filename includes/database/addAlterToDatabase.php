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

//create connection
$conn = mysqli_connect($servername, $username, $password, $db);

//check connection
if (!$conn){
  die ("Connection failed" . mysqli_connect_error());
}

// sql to create director table
$sql = "ALTER TABLE movies_directors
  ADD PRIMARY KEY (movies_id,directors_id),
  ADD KEY fk_movies_has_directors_directors1_idx (directors_id),
  ADD KEY fk_movies_has_directors_movies_idx (movies_id)";

if (mysqli_query($conn, $sql)) {
    echo "ALTER TABLE movies_directors successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}


$sql = "ALTER TABLE movies_genres
  ADD PRIMARY KEY (movies_id,genres_id)";

if (mysqli_query($conn, $sql)) {
    echo "ALTER TABLE movies_genres successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}


$sql = "ALTER TABLE movies_stars
  ADD PRIMARY KEY (movies_id,stars_id)";

if (mysqli_query($conn, $sql)) {
    echo "ALTER TABLE movies_stars successfully <br>";
} else {
    echo "<br> Error creating table: " . mysqli_error($conn);
}