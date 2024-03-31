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
    $password = "";
    $database = "kargon";

    $connection = mysqli_connect($server,$user,$password,$database);
    if($connection == false){
        die(mysqli_connect_error());
    }

    // require "connector.php";

    $id = $_POST['id'];
    $bid = (int)$id;
    $writer = $_POST['writer'];
    $bwriter = (int)$writer;
    $type = $_POST['title'];
    $blog = $_POST['blog'];
    // $writer = $_POST['writer'];
    // $df=$_SESSION['username'];

    // UPDATE Fruit
    // SET UnitId = 2
    // WHERE FruitId = 1;

    // $sql_query = "INSERT INTO `kargon`.`blog`(`blog`,`type`,`writer`) VALUES ('$blog','$type','$writer') ";
    $sql_query = " UPDATE `blog` SET  `type` = '$type' , `blog` = '$blog' WHERE `id` = $bid AND `writer`= $bwriter " ;
    $last_query= mysqli_query($connection, $sql_query);

    // $connection->close();
    
}
header('location:my_blog.php');


?>