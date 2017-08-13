<?php
  
  $search_path = 'search.php'; 
  include_once 'search-form.php';
  include_once 'includes/dbh.inc.php';
  
    $per_page = 8;   
    $count_pages_query = "SELECT count(m.id) FROM movies m, movies_genres mg, genres g 
            WHERE m.id=mg.movies_id AND g.id = mg.genres_id group by m.id";
    $page_count = $conn->query($count_pages_query); 
    $page_num_row = mysqli_num_rows($page_count);
    $pages = ceil($page_num_row / $per_page);

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $start = ($page - 1) * $per_page;
    $sql = "SELECT m.id, title, year, GROUP_CONCAT(g.name) as genre_name, image_url, imdb_rating
            FROM movies m, movies_genres mg, genres g 
            WHERE m.id=mg.movies_id AND g.id = mg.genres_id
            group by m.id LIMIT $start, $per_page";
    $result = $conn->query($sql);
?>

<div class="container">
    <div class="row">
 
    
<?php
if(mysqli_num_rows($result) > 0){
    
while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="form-group">
    <div class="col-md-3" style="padding: 0px 20px">
        <a href="movie.php?id=<?php echo $row['id']; ?>"><img class="thumbnail" src="<?php echo $row['image_url']; ?>" style="width:90%"></a> 
    </div>
      
    <div class="col-md-3" style="padding: 20px 0;">
      <div class="form-group">
        <label>Title: </label>
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
        <label>
        <br>
        <br>
        <br>
          <br>
        <br>
        <br>
        <br>
        </label>
      </div>
        </div>
      
      </div>
      

<?php
 }
}
$conn->close();
?>
  </div> 
<div class = "pagination">
<?php
$prev = $page - 1;
$next = $page + 1;

if($page!=1){
echo "<a href ='index.php?page=$prev'>Prev </a>";
}
if($pages >= 1){
	for($x=1; $x<= $pages; $x++){
		echo ($x == $page) ? '<b><a href ="?page='.$x.'">'.$x . ' </a></b>' : '<a href ="?page='.$x.'">'.$x . ' </a>';
	}
}
if($page!=$pages){
echo "<a href ='index.php?page=$next'> Next</a>";
}
?>  
  </div>
</div>
