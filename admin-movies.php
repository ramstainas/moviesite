<?php
if(!isset($_SESSION['u_id'])){
  session_start();
}

include_once 'admin-header.php';
include_once 'includes/dbh.inc.php';


$id = $_SESSION['u_id'];  
$sql = "SELECT * FROM user WHERE id='$id'";
$result = $conn->query($sql);

if(isset($_POST[''])){
    $username = $_POST['name1'];
    $firstname = $_POST['name2'];
    $lastname = $_POST['name3'];
    $email = $_POST['name4'];
    
    
    $query = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', uid='$username' WHERE id='$id'";
    $result = $conn->query($query);
    $_SESSION['u_name']= $firstname;  
    header("Location: ");

    
}
?>

  <div class="container">
    <div class="row">
    <div class="col-md-3">
      <?php include_once 'sidebar.php'; ?>
    </div>
    <div class="col-md-9">
      <div class="raw">
        <div class="col-md-8 col-md-offset-2">
          <form class="form" role="form" action="#" method="post">
            <div class="form-group">
              <input type="text" name="title" placeholder="title" /> 
            </div>
            <div class="form-group"> 
              <input type="text" name="year" placeholder="year" />
            </div>
            <div class="form-group">
              <input type="text" name="runtime" placeholder="runtime" />
            </div>
            <div class="form-group">
              <input type="text" name="imdb_rating" placeholder="imdb rating" />
            </div>
            <div class="form-group">
              <input type="text" name="Genre" placeholder="genre" />
              <form action="list.php" method="post">
              <button type="submit" name="genre-button">Add</button>
              </form>
            </div>
            <div class="form-group">
              <textarea placeholder="description"></textarea>
            </div>  
            <div class="form-group">
              <button name ="submit" class="btn btn-success">Save</button>

            </div>
          </form>  
      </div>    
      </div>
    </div>
  </div>
</div>

<script>
  function editName(number) {
  document.getElementById('name' + number).readOnly=false;
  document.getElementById('name'+ number).focus();
};
</script>
