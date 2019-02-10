<?php

	include('database.php');
	session_start();
	$conn = mysqli_connect($svr, $uname, $pass, $dbname);
	
	if($conn->connect_error)
	{
		die("Connection Failed" . $conn->connect_error);
	}
	
	$posts_id = $_SESSION['user_post'];
	$query = "SELECT * FROM Comments WHERE Posts_ID='$posts_id'";
	
    $result = mysqli_query($conn, $query);  
    $numResults = mysqli_num_rows($result);
    $counter = 0;
    echo "[";
    while($row = mysqli_fetch_array($result)) {
        $counter++;
        echo "{";
      echo "\"Author\" :  \"{$row['Name']}\" , ".
         "\"Description\" : \"{$row['Description']}\" ";
         echo "}";
        if($counter < $numResults)
        {
            echo ",";
        }
   }
   echo "]";
    mysqli_close($conn);
?>