<?php
session_start();
if ($_SESSION["new_session"] == false) {
    header('location:log.php');
    exit;
}

$df = $_SESSION['username'];


if (isset($_SERVER['REQUEST_METHOD'])) {

    require "connector.php";

    $sql_query = "SELECT * FROM users WHERE roll='$df';";
    $last_query = mysqli_query($connection, $sql_query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iitial Home Page</title>
    <link rel="shortcut icon" href="fold/logo.png" type="image/x-icon">
    <style>
        body {
            background-color: aliceblue;
        }

        #box_a {
            border: green 1px solid;
            margin: 2% 2% 0% 2%;
            border-radius: 8px;
        }

        #ind_head {
            font-family: 'Courier New', Courier, monospace;
            margin: 10% 0% -10% 0%;
            color: navy;
            text-align: center;
        }

        /* #scroll_up{
    display: flexbox;
}
#scroll_down{
    display: flexbox;
} */
        #box_b {
            border: 1px solid navy;
            margin: 12% 2% 2% 2%;
            /* padding: 0% 8%; */
            display: flex;
            border-radius: 6px;
            height: 400px;
        }

        #ind_tail {
            font-family: 'Courier New', Courier, monospace;
            /* margin: 10% 0% -10% 0%; */
            cursor: pointer;
            color: navy;
            text-align: center;
        }

        table {
            border: green 1px solid;
            margin: 2%;
            border-radius: 10px;
            width: 1000px;
        }

        th {
            border: navy 1px solid;
            /* background-color: green; */
            border-radius: 8px;
            padding: 1%;
            font-size: 22px;
        }

        td {
            border: blue 1px solid;
            /* background-color: green; */
            border-radius: 8px;
            padding: 1%;
            width: 380px;
            font-size: 22px;
        }

        a {
            text-decoration: none;
        }

        #ind_blog {
            background-color: brown;
            padding: 0.5%;
            border: 0.5px solid navy;
            border-top-right-radius: 6px;
            border-bottom-right-radius: 6px;
            height: 15px;
            color: whitesmoke;
            font-family: 'Courier New', Courier, monospace;
            width: 150px;
            margin: 3% 0% -3% 0%;
            /* margin-top: 20px; */
        }
    </style>
</head>

<body>
    <div id="box_a">
        <a href="blog.php">
            <h4 id="ind_blog">Return To Blogs</h4>
        </a>
        <h2 id="ind_head">Welcome <?php echo $_SESSION["username"] ?></h2>
        <div id="box_b">
            <marquee behavior="scroll" direction="up" id="scroll_up">
                <img src="fold/up.png" alt="" id="img_up">
                <img src="fold/down.png" alt="" id="img_down">
            </marquee>
            <table>
                <?php
                if (mysqli_num_rows($last_query) == 1) {
                    while ($loop = mysqli_fetch_array($last_query)) {
                ?>
                        <tr>
                            <th>Roll:</th>
                            <td><?php echo $loop["roll"]; ?></td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td><?php echo $loop["name"]; ?></td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td><?php echo $loop["email"]; ?></td>
                        </tr>
                        <tr>
                            <th>Phone:</th>
                            <td><?php echo $loop["phone"]; ?></td>
                        </tr>
                        <tr>
                            <th>Address:</th>
                            <td><?php echo $loop["addr"]; ?></td>
                        </tr>
                <?php
                    }
                } else {
                    echo "No result found";
                }
                ?>
            </table>
        </div>
        <a href="out.php">
            <h4 id="ind_tail">Let's Log Out</h4>
        </a>
    </div>
</body>

</html>