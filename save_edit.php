<?php
    session_start();
    if (!isset($_SESSION['loggedin'])) {
    header("location: login.php");
    } 
?>
<html>
<meta charset="UTF-8">
    <?php
    // connect database 
    require_once('connection.php');

    $mysqli = new mysqli($db_host, $db_user, $db_password, $db_name);
    $mysqli->set_charset("utf8");

    // echo "<pre>";
    // print_r($_POST);
    // echo"</pre>";
    $username = $_POST['username'];
    $name = $_POST['name'];
    $penname = $_POST['penname'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    $sql = "UPDATE authors
            SET 
            username = ?,     
            name =?,
            penname =?,
            email =?
         WHERE id  = ?";
    
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("sssss", $username , $name, $penname , $email, $id );
    $stmt->execute();

        // echo $stmt->error;  //ไว้ดู error
        // echo $stmt->affected_rows . " row inserted.";
        // echo $id;
    $_SESSION['username'] = $_POST['username'];
    header("location: index2.php");
?>
