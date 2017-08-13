<?php
include_once 'includes/dbh.inc.php';
include_once 'header.php';
$search_path = 'search.php'; 
include_once 'search-form.php';
include_once 'footer.php';

if(isset($_POST['search'])){	
		$searchq = $_POST['valueToSearch'];
		if($searchq == NULL){
			
			header("Location: index.php");
		
	
} else {
		$searchq = preg_replace("#[^0-9a-z]#i","", $searchq);
		$sql = "SELECT m.id, title, year, GROUP_CONCAT(g.name) as genre_name, image_url, imdb_rating
            FROM movies m, movies_genres mg, genres g 
            WHERE m.id=mg.movies_id AND g.id = mg.genres_id AND title like '%".$searchq."%'
            group by m.id";
		$result = $conn->query($sql);
	
	
}}
  ?>

<div class="container">	
  <div class="row">
    
<?php    
if(mysqli_num_rows($result) > 0){    
while($row = mysqli_fetch_assoc($result)){
?>
    <div class="col-md-3" style="padding: 0px 10px">
        <a href="movie.php?id=<?php echo $row['id']; ?>"><img class="thumbnail" src="<?php echo $row['image_url']; ?>" style="width:80%"></a> 
    </div>
      
    <div class="col-md-3" style="padding: 10px 0px;">
      <div class="form-group">
        <label>Title:</label>
        <a  href="movie.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
      </div>
      <div class="form-group">
       <label>Genre:</label>
       <div class= "values"><?php echo $row['genre_name']; ?> </div>
    </div>
    
    <div class="form-group">
      <label>Year:</label>
      <div class="values"><?php echo $row['year']; ?></div>
    </div>
    <div class="form-group">
      <label>Imdb rating:</label>
      <div class="values"><?php echo $row['imdb_rating']; ?></div>
    </div>
      <div class="form-group">
        <br>
        <br>
        <br>
        <br>
        <br> 
        <br>
      </div>
        </div>

<?php
 } 
}else
{
	 echo " no found records.";
	 }
$conn->close();
?>
</div>
</div>