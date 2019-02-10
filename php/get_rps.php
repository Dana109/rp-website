<?php

	include('database.php');
	
	$conn = mysqli_connect($svr, $uname, $pass, $dbname);
	
	if($conn->connect_error)
	{
		die("Connection Failed" . $conn->connect_error);
	}
	
	
	$query = "SELECT R.Name AS RPName, U.Name AS Username, R.RP_ID FROM RP R, Users U WHERE U.User_ID=R.Admin_ID";
	
    $result = mysqli_query($conn, $query);  
    $numResults = mysqli_num_rows($result);
    $counter = 0;
    echo "[";
    while($row = mysqli_fetch_array($result)) {
        $counter++;
        echo "{";
      echo "\"RPName\" :  \"{$row['RPName']}\" , ".
        "\"RP_ID\" :  \"{$row['RP_ID']}\" , ".
         "\"Admin\" : \"{$row['Username']}\" ";
         echo "}";
        if($counter < $numResults)
        {
            echo ",";
        }
   }
   echo "]";
    mysqli_close($conn);
?>