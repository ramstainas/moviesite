<?php
  function get_genres(){
  include_once 'includes/dbh.inc.php';        
  $sql = "SELECT name FROM genres";
  $result = $conn->query($sql);
    if(mysqli_num_rows($result) > 0){   
      while($row = mysqli_fetch_assoc($result)){
        echo '<option value = "'.$row['name'].' ">'.$row['name'].'</option>';
      }}else{
        echo "no rows found";  
      }  
    }
?>
<form method="post" action ="list.php">
  <select name ="genres[]" style="width:300px; height: 300px;" multiple>
    <?php get_genres(); ?>
  </select>
<br>
<button name ="btn">Click</button>
</form>


<?php

  if(isset($_POST['btn'])){
    if(isset($_POST['genres'])){
    $genresArray = $_POST['genres'];
      $i=0;
      foreach($genresArray as $key => $value){
        $i++;
        echo "<br>" .$value;
      }
  } }
?>