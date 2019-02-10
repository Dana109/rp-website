<?php

	include('database.php');
	session_start();
	$conn = mysqli_connect($svr, $uname, $pass, $dbname);
	
	if($conn->connect_error)
	{
		die("Connection Failed" . $conn->connect_error);
	}
	$error=''; // Variable To Store Error Message
	$rp_id = $_SESSION['user_rp'];
	$query = "SELECT U.Name AS Username, Body, Posts_ID FROM Posts P, Users U WHERE RP_ID='$rp_id' AND U.User_ID=P.User_ID";
	
    $result = mysqli_query($conn, $query);  
    $numResults = mysqli_num_rows($result);
    $counter = 0;
    echo "[";
    while($row = mysqli_fetch_array($result)) {
        $counter++;
        echo "{";
      echo "\"Author\" :  \"{$row['Username']}\" , ".
        "\"Posts_ID\" :  \"{$row['Posts_ID']}\" , ".
         "\"Body\" : \"{$row['Body']}\" ";
         echo "}";
        if($counter < $numResults)
        {
            echo ",";
        }
   }
   echo "]";
    mysqli_close($conn);
?>