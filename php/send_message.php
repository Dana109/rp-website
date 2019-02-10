<?php
    include ('database.php');
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['message'])) {
            $error = "No Message Contents";
    }
    else
    {
        $message=$_POST['message'];
        $user=$_SESSION['user_char'];
        $post_id=$_SESSION['user_post'];
        // Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysqli_connect($svr, $uname, $pass, $dbname);
        // To protect MySQL injection for Security purpose
        $message = stripslashes($message);
        $message = mysqli_real_escape_string($connection, $message);
        // SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($connection, "INSERT INTO `Comments` (`Posts_ID`, `Name`, `Description`, `Image`) VALUES ('$post_id', '$user', '$message', '')");

        mysqli_close($connection); // Closing Connection
        }
    }
?>