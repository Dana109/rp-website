<?php    

	include ('database.php');
    session_start();
    if (empty($_POST['rp_id'])) {
            $error = "No RP ID";
    }
    else
    {
        $message=$_POST['rp_id'];
        $_SESSION['user_rp']=$message;
    }
	
	$login_user=$_SESSION['login_user'];
	$rp_id=$_SESSION['user_rp'];
	$connection = mysqli_connect($svr, $uname, $pass, $dbname);
	$query = mysqli_query($connection, "SELECT C.Name AS CharName FROM Characters C, Users U WHERE C.RP_ID='$rp_id' AND U.Name='$login_user' AND C.User_ID=U.User_ID");
	$rows = mysqli_num_rows($query);
	if ($rows == 1) {
		while($row = mysqli_fetch_array($query)) {
			$_SESSION['user_char']=$row['CharName'];
		}
		$charnam=$_SESSION['user_char'];
		echo "You are now logged in as  $charnam";
	} else {
		echo 'You have no character yet. Please create one through character creation';
	}
	mysqli_close($connection); // Closing Connection
?>