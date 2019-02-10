<?php    

    session_start();
    if (empty($_POST['post_id'])) {
            $error = "No Post ID";
    }
    else
    {
        $message=$_POST['post_id'];
        $_SESSION['user_post']=$message;
    }
	
	
?>