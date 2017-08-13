<?php
session_start();
include_once 'header.php';
include_once 'includes/dbh.inc.php';


$id = $_GET['id'];    

$sqlstar = "SELECT GROUP_CONCAT(s.name) as name FROM stars s, movies_stars ms
            WHERE s.id=ms.stars_id AND ms.movies_id = '$id' GROUP BY ms.movies_id"; 
$resultstar = $conn->query($sqlstar);
$row1 = mysqli_fetch_assoc($resultstar);

$sql = "SELECT m.title, m.year, m.image_url, m.description, m.runtime, m.imdb_rating, d.id, COALESCE(d.name, 'unknown') as direct 
        FROM movies m, movies_directors md LEFT JOIN directors d ON md.directors_id = d.id
        WHERE m.id = md.movies_id AND m.id ='$id'  
        GROUP BY m.id";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="container">
  <div class="row">
    <div class="img-block">
        <img src="<?php echo $row['image_url']; ?>" height='250'>
    </div> 
    <div class="movie-title form-group">
        <?php echo $row['title']; ?>
    </div>
    <div class="form-group">
        <div class="names">Director:</div>
        <div class ="values"><?php echo $row['direct']; ?> </div>
    </div>

    <div class="form-group">
        <div class ="names">Stars:</div>
        <div class ="values"><?php echo $row1['name']; ?></div>      
    </div>
    <div class="form-group">
        <div class="names">Year:</div>
        <div class="values"><?php echo $row['year']; ?></div>
    </div>
    <div class="movie-names">
        <div class="names">Runtime: </div>
        <div class="values"><?php echo $row['runtime']; ?> minutes</div>
    </div>
    <div class="form-group">
        <div class="names">Imdb rating:</div>
        <div class="values"><?php echo $row['imdb_rating']; ?></div>
    </div>
    <div class="form-group">
        <div class="names">Description:</div>
        <div class="values"> <?php echo $row['description']; ?></div>
    </div>
    <div class="button-div">
        <form action="index.php">
            <button id="movie-btn" class="btn btn-success">Back</button>
        </form>
    </div>
</div>
</div>
