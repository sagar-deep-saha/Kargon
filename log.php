<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){

require "connector.php";
    
    $username = $_POST["roll"];
    $password = $_POST["pass"];

    $sql_query = "SELECT * FROM users WHERE roll='$username';";

    $ultimate_query= mysqli_query($connection,$sql_query);

    $conditional_query = mysqli_num_rows($ultimate_query);
    if($conditional_query==1){
        while($conditional_query=mysqli_fetch_assoc($ultimate_query)){
            if(password_verify($password,$conditional_query['pass'])){

                session_start();
                $_SESSION["new_session"]=true;
                $_SESSION["username"]=$username;
                header('location:blog.php');
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KARGON</title>
    <link rel="shortcut icon" href="fold/logo.png" type="image/x-icon">
    <style>
        body{
    background-color: aliceblue;
}
.box0{
    border: 1px green solid;
    margin:11% 2% 5% 2%;
    border-radius:12px;
    display: flex;
}
#log_form{
    /* border: 1px red solid; */
    margin: 2%;
    padding: 2%;
    width: 407px;
    border-radius: 10px;
    background-color: rgb(164, 180, 245);
    border-top: 4px solid #0d0d4d;
    display: flexbox;
    margin: 2% 2% 2% 65%;
}
#log_form label{
    width: 456px;
    font-size: 18px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
}
#log_form input{
    width: 399px;
    font-size: 20px;
    height: 27px;
    border-radius: 4px;
}
#log_button{
    background-color: blueviolet;
    cursor: pointer;
    padding: 1.5%;
    /* float: right; */
    margin: -8% 0% 0% 84%;
    color: whitesmoke;
    font-size: 16px;
    font-weight: 600;
    font-family:Arial, Helvetica, sans-serif;
    border-radius: 4px;
}
#log_head{
    font-family:'Courier New', Courier, monospace;
    margin: 10% 0% -10% 0%;
    color: navy;
    text-align: center;
}
#log_img{
    display: flexbox;
    margin: 3% 0% 0% -84%;
    height: 400px;
}
span{
    margin: 2% 0% -6% 0%;
}
    </style>
</head>
<body>
    <h2 id="log_head">Log In Form</h2>
    <div class="box0">
            <form action="" method="post" id="log_form">
                <br>
                <label for="roll">University Roll No.</label><br>
                <input type="text" name="roll" id="log_roll"><br><br>
                <br>
                <label for="pass">Password</label><br>
                <input type="password" name="pass" id="log_pass"><br><br>
                <br>
                <span>Not Yet Signed-Up, <a href="reg.php">Sign Up</a></span>
                <button type="submit" id="log_button">Log In</button>
            </form>
            <img src="fold/log.png" alt="" id="log_img">
    </div>
</body>
</html>