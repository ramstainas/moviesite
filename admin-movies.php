<?php
if(!isset($_SESSION['u_id'])){
  session_start();
}

include_once 'admin-header.php';
include_once 'includes/dbh.inc.php';


$id = $_SESSION['u_id'];  
$sql = "SELECT * FROM user WHERE id='$id'";
$result = $conn->query($sql);

if(isset($_POST['submit'])){
    $username = $_POST['name1'];
    $firstname = $_POST['name2'];
    $lastname = $_POST['name3'];
    $email = $_POST['name4'];
    
    
    $query = "UPDATE user SET firstname='$firstname', lastname='$lastname', email='$email', uid='$username' WHERE id='$id'";
    $result = $conn->query($query);
    $_SESSION['u_name']= $firstname;  
    header("Location: edit-profile.php");

    
}
?>

<div class="container">
  <div class="row">
    <div class="col-md-3">
      <?php include_once 'sidebar.php'?>
    </div>
  
    <div class="col-md-9">
      <div class="container">
        <div class="row">
        
      <?php
        if(mysqli_num_rows($result) > 0){
          while($row = mysqli_fetch_assoc($result)){
      ?>
   
      <form class="form-horizontal" role="form" action="#" method="post">
        <div class="col-md-8 col-md-offset-2 form-group">
          <input type="text" name="title" placeholder="title" /> 
        </div>
        <div class=" col-md-8 col-md-offset-2 form-group"> 
          <input type="text" name="year" placeholder="year" />
        </div>
        <div class="form-group col-md-8 col-md-offset-2">
          <input type="text" name="runtime" placeholder="runtime" />
        </div>
        <div class="form-group col-md-8 col-md-offset-2">
          <input type="text" name="imdb_rating" placeholder="imdb rating" />
        </div>
        <div class="form-group col-md-8 col-md-offset-2">
          <input type="text" name="description" placeholder="description" />
        </div>
        
         <div class="form-group col-md-8 col-md-offset-2">
          <input type="text" name="Genre" placeholder="Genre" />
        </div>
         <div class="form-group col-md-8 col-md-offset-2">
          <input type="text" name="Director" placeholder="Director" />
        </div>
         <div class="form-group col-md-8 col-md-offset-2">
          <input type="text" name="Stars" placeholder="Stars" />
        </div>
        <div class="form-group col-md-8 col-md-offset-2">
          <button name ="submit" class="btn btn-success">Save</button>
        </div>
      </form>  
     
      <?php    
          }
        }
      ?> 
          </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
