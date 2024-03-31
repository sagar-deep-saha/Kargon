<?php
error_reporting(0);
session_start();
if ($_SESSION["new_session"] == false) {
    header('location:log.php');
    exit;
}

$df = $_SESSION['username'];


if (isset($_SERVER['REQUEST_METHOD'])) {


    require "connector.php";

    $sql_query = "SELECT * FROM blog LEFT JOIN users ON blog.writer=users.userid WHERE writer='$df' ORDER BY id DESC ";
    $sql_query_x = "SELECT userid,roll FROM users WHERE roll='$df' ";

    $last_query = mysqli_query($connection, $sql_query);
    $last_query_x = mysqli_query($connection, $sql_query_x);

    $connection->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogging Website</title>
    <link rel="shortcut icon" href="fold/logo.png" type="image/x-icon">
    <style>
        body {
            background-color: aliceblue;
        }

        #blog_tail {
            font-family: 'Courier New', Courier, monospace;
            color: antiquewhite;
            margin-left: 8px;
        }

        a {
            text-decoration: none;

        }

        #head_box {
            border: navy 1px solid;
            border-radius: 12px;
            padding: 2%;
            font-family: 'Courier New', Courier, monospace;
            color: navy;
            display: flexbox;
        }

        #head_box h2 {
            margin: 1% 0% -1.5% 0%;
            display: flexbox;
        }

        #head_box marquee {
            width: 74%;
            margin: 0% 0% 0% 25%;
            display: flexbox;
        }

        #blog_box_1 {
            border: navy 1px solid;
            border-radius: 12px;
            padding: 2%;
        }

        #blog_box_2 {
            border: navy 1px solid;
            border-radius: 9px;
            padding: 2%;
        }

        #blog_form {
            margin: 9% 0% -43.15% 33%;
            border: navy 1px solid;
            border-radius: 12px;
            padding: 2%;
            width: 390px;
            height: 450px;
            opacity: 0.6;
            background-color: antiquewhite;
            position: fixed;
            display: none;
        }

        #blog_form label {
            font-family: 'Courier New', Courier, monospace;
            font-size: 18px;
            color: blue;
            font-weight: 700;
        }

        #blog_form input {
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            font-weight: 200;
            width: 380px;
            border-radius: 7px;
            height: 30px;
            border: 0.2px solid black;
        }

        #blog_form textarea {
            font-family: 'Courier New', Courier, monospace;
            font-size: 16px;
            font-weight: 200;
            width: 380px;
            border-radius: 7px;
            height: 120px;
        }

        #blog_form_button {
            background-color: skyblue;
            border-radius: 4px;
            padding: 1.5%;
            font-family: 'Courier New', Courier, monospace;
            color: navy;
            border: 0.4px solid navy;
            font-size: 20px;
            font-weight: 600;
            cursor: pointer;
            width: 385px;
        }

        #blog_form h4 {
            font-family: Arial, Helvetica, sans-serif;
            margin: -5% 0% 0% 95%;
            font-weight: 50;
            cursor: pointer;
        }

        .dom_x {
            color: brown;
        }

        .dom_z {
            color: green;
        }

        buttom {
            padding: 4%;
            background-color: #bfc0c8;
            color: black;
            font-family: 'Courier New', Courier, monospace;
            border: 0.5px solid navy;
            cursor: pointer;
            margin: 0% 0% 0% 17%;
            font-weight: 560;
            border-radius: 4px;
        }

        #side_box {
            padding: 2%;
            padding-top: 0%;
            background-color: brown;
            color: whitesmoke;
            margin-bottom: -10%;
            margin-left: 86%;
            height: 158px;
            position: fixed;
            border-top-left-radius: 12px;
            border-bottom-left-radius: 12px;
            width: 10%;
            border: 0.5px solid navy;
        }

        #reset_button {
            border: none;
            background-color: inherit;
            padding: 0;
            margin: 0% 0% 0% 0%;
            cursor: pointer;
        }

        #welcome_user {
            color: green;
            font-weight: 200;
            font-family: 'Courier New', Courier, monospace;
        }

        details {
            color: brown;
        }

        summary {
            font-family: 'Courier New', Courier, monospace;
        }

        summary:hover {
            cursor: pointer;
            /* color: #bfc0c8; */
        }

        summary::after {
            color: #bfc0c8;
        }

        #s_bold {
            font-size: 12px;
            font-weight: bolder;
            font-family: Arial, Helvetica, sans-serif;
        }

        .mfg {
            margin-left: 25px;
            color: bisque;
            font-family: 'Courier New', Courier, monospace;
        }
        #blog_edit input{
            height: 30px;
            width: 340px;
            border-radius: 12px;
            border:0.3px solid navy;
        }
        #xc2{
            border-radius: 12px;
            /* height: 30px; */
            width: 340px;
            border:0.3px solid navy;
            height: 200px;
        }
        #blog_edit button{
            padding: 0.5% 1%;
            border-radius: 4px;
            border: 0.5px solid navy;
            cursor: pointer;
            background-color: #bfc0c8;
            font-weight: 600;
            font-family: Arial, Helvetica, sans-serif;
        }
        .v18{
            display: none;
        }
        .v19{
            font-weight: 600;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    </style>
</head>


<body>



    <form action="my_blog_load.php" method="POST" id="blog_form">
        <button type="reset" id="reset_button">
            <img src="fold/r.svg" alt="reset">
        </button>
        <h4 onclick="blog_form_hide();">X</h4>
        <br><br>
        <div style="display: none;">

            <?php
            if (mysqli_num_rows($last_query_x) > 0) {
                $r = 0;
                while ($look = mysqli_fetch_array($last_query_x)) {
            ?>

                    <input type="text" name="writer" id="" required="required" class="mrx" value="<?php echo $look["userid"]; ?> "><br><br>

            <?php
                    $r++;
                }
            } else {
                echo "No result found";
            }
            ?>
        </div>
        <label for="title">Title</label><br>
        <input type="text" name="title" id="" required="required" id="blog_title" class="mrx"><br><br>
        <label for="blog">Blog</label><br>
        <textarea type="text" name="blog" id="" required="required" id="blog_blog" class="mrx"></textarea><br><br><br><br>
        <button type="submit" id="blog_form_button">Submit</button>
    </form>

    <div id="head_box">
        <h2>My Blogs</h2>
        <marquee behavior="scroll" direction="left">
            This website is Developed By Sagar D Saha
        </marquee>
        <br>

        <a href="index.php">
            <p id="welcome_user">Welcome
                <?php
                echo $_SESSION['username'];
                ?>
            </p>
        </a>

    </div>

    <div id="side_box">
        <h3>Create A Blog</h3>
        <buttom onclick="blog_form_show();">Create</buttom>
        <br>
        <br>
        <hr>
        <a href="blog.php" class="mfg">All Blogs</a>
        <hr>
        <a href="out.php">
            <h4 id="blog_tail">&nbsp;Do Log Out</h4>
        </a>
        <br>
    </div>
    <div id="blog_box_1">

        <?php
        if (mysqli_num_rows($last_query) > 0) {
            $s = 0;
            while ($loop = mysqli_fetch_array($last_query)) {
        ?>

                <div id="blog_box_2">
                    <p class="dom_z">
                        Blog No.
                        <?php echo $loop["id"]; ?>
                    </p>
                    <h3>
                        <?php echo $loop["type"]; ?>
                    </h3>
                    <p>
                        <?php echo $loop["blog"]; ?>
                    </p>

                    <h5>Written By : <?php echo $loop["name"]; ?></h5>

<details>
<summary>Edit</summary>
<br>
    <form action="my_blog_update.php" method="POST" id="blog_edit">
        <input type="text" name="id" placeholder="ID" required="required" value="<?php echo $loop["id"]; ?>" class="v18">
        <input type="text" name="writer" placeholder="ID" required="required" value="<?php echo $loop["writer"]; ?>" class="v18">
        <label for="title" class="v19">New Title</label>
        <br>
        <input type="text" name="title" placeholder="Input New Title" id="xc1" required="required">
        <br>
        <br>
        <label for="blog" class="v19">Changing Blog</label>
        <br>
        <textarea type="text" name="blog" placeholder="Input New Blog" id="xc2" required="required"></textarea>
        <span>&nbsp;&nbsp;</span>
        <button type="submit">UPDATE</button>
        <br>
    </form>
    <br>
</details>

                    <br>

                    <details>
                        <summary>Comments :</summary>

                        <?php
                        if (isset($_SERVER['REQUEST_METHOD'])) {


                            require "connector.php";

                            $cf = $loop['id'];

                            $sql_query_2 = "SELECT * FROM comment  LEFT JOIN users ON comment.writer=users.roll WHERE blogid='$cf' ORDER BY id DESC LIMIT 10";

                            $last_query_2 = mysqli_query($connection, $sql_query_2);

                            $connection->close();
                        }


                        if (mysqli_num_rows($last_query_2) > 0) {
                            $t = 0;
                            while ($pool = mysqli_fetch_array($last_query_2)) {
                        ?>
                                <p class="dom_x"><?php echo $pool["comment"]; ?></p>
                                <p class="dom_x" id="s_bold">Comment By <?php echo $pool["name"]; ?></p>
                                <hr>
                        <?php
                                $t++;
                            }
                        } else {
                            echo "No result found";
                        }
                        ?>

                    </details>



                    <br>
                    <form action="mb_comment_load.php" method="POST">
                        <div style="display: none;">
                            <input type="text" name="blogid" id="" value="<?php echo $loop["id"]; ?>">
                            <input type="text" name="writer" id="" value="<?php echo $_SESSION['username']; ?>">
                        </div>
                        <input type="text" name="comment" placeholder="Enter Your Comment" required="required">
                        <button type="submit" onclick="blog_form_hide();">Comment</button>
                    </form>

                </div>



        <?php
                $s++;
            }
        } else {
            echo "No Blogs found";
        }
        ?>

    </div>

    <script src="script.js"></script>
</body>

</html>