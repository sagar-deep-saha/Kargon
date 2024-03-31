<?PHP 
    $server = "localhost";
    $user = "root";
    $port = "3306";
    $password = "";
    $database = "kargon";

    $connection = mysqli_connect($server,$user,$password,$database,$port);
    if($connection == false){
        die(mysqli_connect_error());
    }
?>