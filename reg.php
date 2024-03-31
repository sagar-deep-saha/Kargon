<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){

    require "connector.php";
    
    $username = $_POST["roll"];
    $password = $_POST["pass"];
    $cpassword = $_POST["cpass"];

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];


    if($password == $cpassword){
        $hash = password_hash($password , PASSWORD_DEFAULT);
        $sql_query = "INSERT INTO `users`(`roll`,`pass`, `name`, `phone`,`email`,`addr`) VALUES ('$username','$hash','$name','$phone','$email','$address')";
        // $query_2 = "INSERT INTO `details`(`roll`, `name`, `phone`,`email`,`addr`) VALUES ('$username','$name','$phone','$email','$address')";

        $final_query = mysqli_query($connection,$sql_query);
        // $ultimate_query = mysqli_query($connection,$query_2);

        if($final_query){
            // if($ultimate_query){
                header('location:log.php');
            // }
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
    <title>Registration</title>
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
#reg_form{
    /* border: 1px red solid; */
    margin: 2%;
    padding: 2%;
    width: 470px;
    border-radius: 10px;
    background-color: rgb(164, 180, 245);
    border-top: 4px solid #0d0d4d;
    display: flexbox;
}
#reg_form label{
    width: 456px;
    font-size: 18px;
    font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif ;
}
#reg_form input{
    width: 456px;
    font-size: 20px;
    height: 27px;
    border-radius: 4px;
}
#reg_button{
    background-color: blueviolet;
    cursor: pointer;
    padding: 1.5%;
    /* float: right; */
    margin: -8% 0% 0% 82%;
    color: whitesmoke;
    font-size: 16px;
    font-weight: 600;
    font-family:Arial, Helvetica, sans-serif;
    border-radius: 4px;
}
#reg_head{
    font-family:'Courier New', Courier, monospace;
    margin: 10% 0% -10% 0%;
    color: navy;
    text-align: center;
}
#reg_img{
    display: flexbox;
    margin: 11% 0% -2% 14%;
    height: 400px;
}
span{
    margin: 2% 0% -6% 0%;
}
    </style>
</head>
<body>
    <h2 id="reg_head">Registration Form</h2>
    <div class="box0">
            <form action="" method="post" id="reg_form">
                <br>
                <label for="roll">University Roll No.</label><br>
                <input type="text" name="roll" id="reg_roll" required="required"><br><br>
                <label for="name">Name</label><br>
                <input type="text" name="name" id="" required="required"><br><br>
                <label for="phone">Phone</label><br>
                <input type="text" name="phone" id="" required="required"><br><br>
                <label for="email">Email</label><br>
                <input type="email" name="email" id="" required="required"><br><br>
                <label for="address">Address</label><br>
                <input type="text" name="address" id="" required="required"><br><br>
                <label for="pass">Password</label><br>
                <input type="password" name="pass" id="reg_pass" required="required"><br><br>
                <label for="cpass">Confirm Password</label><br>
                <input type="password" name="cpass" id="reg_cpass" required="required"><br><br>
                <br>
                <span>Already Signed-Up, <a href="log.php">Log In</a></span>
                <button type="submit" id="reg_button">Sign Up</button>
            </form>
            <img src="fold/reg.png" alt="" id="reg_img">
    </div>
</body>
</html>