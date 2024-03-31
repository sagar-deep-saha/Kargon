<?php
session_start();
if($_SESSION["new_session"]==false){
    header('location:log.php');
    exit;
}

$df = $_SESSION['username'];


if (isset($_SERVER['REQUEST_METHOD'])) {

    $server = "localhost";
    $user = "root";
    $port = "3306";
    $password = "";
    $database = "kargon";

    $connection = mysqli_connect($server,$user,$password,$database,$port);
    if($connection == false){
        die(mysqli_connect_error());
    }

    // require "connector.php";

    $blogid = $_POST['blogid'];
    $writer = $_POST['writer'];
    $comment = $_POST['comment'];



    $sql_query = "INSERT INTO `comment`(`blogid`,`writer`,`comment`) VALUES ('$blogid','$writer','$comment');";
    $last_query= mysqli_query($connection,$sql_query);

    header('location:my_blog.php');
}


?>