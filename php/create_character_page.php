<?php
    include('create_character.php'); // Includes Login Script
    
    
?>
<!DOCTYPE html>
<html>
    <head>
    <title>Login Form in PHP with Session</title>
    </head>
    <body>
        <div id="main">
        <h1>PHP Login Session Example</h1>
        <div id="login">
        <h2>Character Creation</h2>
        <form action="" method="post">
        <label>Name :</label>
        <input id="name" name="Name" placeholder="Name" type="text">
		<br><br>
        <label>Backstory :</label>
        <textarea id="Backstory" name="Backstory" placeholder="Backstory" cols=30 rows=5></textarea>
        <br><br>
        <input name="submit" type="submit" value=" Create ">
        <span><?php echo $error; ?></span>
        </form>
        </div>
        </div>
    </body>
</html>