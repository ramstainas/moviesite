<?php

include_once "dbh.php";

if(isset($_POST['insertbutton'])){
    $name = $_POST['name'];
    $descript = $_POST['descript'];
    $insert = "INSERT INTO colors(name, descript) VALUES ('$name','$descript')";
    $insertquery = mysqli_query($conn, $insert);
    if(!$insertquery){
        echo "Klaida" . mysql_error();
    }
    else
    {
        header("Location: indexa.php");
        }
        }
?>

<form method = "POST">
    <input type="text" name="name" placeholder = "name">
    <input type="text" name="descript" placeholder = "description">
    <input type="submit" name="insertbutton">
</form>
</body>
</html>






<form method = "POST">
    <input type="text" name="name" placeholder = "name">
    <input type="text" name="descript" placeholder = "description">
    <input type="submit" name="done">
</form>




?>