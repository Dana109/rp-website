<?php
    include ('database.php');
    session_start(); // Starting Session
    $error=''; // Variable To Store Error Message
    if (isset($_POST['submit'])) {
        if (empty($_POST['Name']) || empty($_POST['Backstory'])) {
            $error = "Fill up all required fields";
    }
    else
    {
        $Name=$_POST['Name'];
		$Backstory=$_POST['Backstory'];
        $user=$_SESSION['login_user'];
        $rp_id=$_SESSION['user_rp'];
        $post_id=$_SESSION['user_post'];
        $connection = mysqli_connect($svr, $uname, $pass, $dbname);       
        $Name = stripslashes($Name);
        $Name = mysqli_real_escape_string($connection, $Name);
        $Backstory = stripslashes($Backstory);
        $Backstory = mysqli_real_escape_string($connection, $Backstory);
        $idquery = mysqli_query($connection, "SELECT * FROM Users WHERE Name='$user'");
		$rows = mysqli_num_rows($idquery);
		$user_id="";
		while($row = mysqli_fetch_array($idquery)) {
			  $user_id=$row['User_ID'];
			  
		 }

        $query = mysqli_query($connection, "INSERT INTO Characters (RP_ID, User_ID, Name, Backstory) VALUES ('$rp_id', '$user_id', '$Name', '$Backstory')");
        if ($query) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($connection);
        }

        mysqli_close($connection); // Closing Connection
        }
    }
?>