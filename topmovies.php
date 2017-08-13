<?php
include_once 'includes/dbh.inc.php';
include_once 'header.php';

$sql = "SELECT id, title, imdb_rating FROM movies order by  imdb_rating DESC limit 20";
$result = $conn->query($sql);
?>

  <div class="container">
    <div class= "raw">
      <div class = "col-md-8 col-md-offset-2">
  <table class="table thead-inverse">
  <thead class="">
    <tr>
      <th>Nr</ht>
      <th>Movie</th>
      <th>Imdb rating</th>
    </tr>
  </thead>
  <?php
    $i = 1;
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
   ?>
<tbody>
<tr>
  <td><?php echo $i++; ?></td>
  <td> <a id="top-title"  href="movie.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></td>  
  <td><?php echo $row['imdb_rating']; ?></td>
</tr>

<?php
}}
?>
</tbody>
</table>
</div>
</div>
</div>