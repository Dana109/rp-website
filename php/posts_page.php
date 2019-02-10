<?php
    include('send_message.php'); // Includes Login Script
    
    

?>
<!DOCTYPE html>

<html>
    <head>
    <title>Login Form in PHP with Session</title>
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
        <script>
        
       window.setInterval(function() {
            
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var obj = JSON.parse(this.responseText)
                    document.getElementById("InputPosts").innerHTML = ""
                    for(i = 0; i < obj.length; i++)
                    {
                        document.getElementById("InputPosts").innerHTML += "<button type='button' onclick=getComments(" + obj[i].Posts_ID + ")>" + obj[i].Author + ": " + obj[i].Body + "</button>"  + "<br><br>";
                    }
                    
                }
            };
            xmlhttp.open("GET", "https://rp-website.000webhostapp.com/PHP/get_posts.php", true);
            xmlhttp.send();
        }, 1000);
            
        function getComments(x) {
		    
			var xmlhttp = new XMLHttpRequest(); // simplified for clarity
			var url = "https://rp-website.000webhostapp.com/PHP/session_comments.php";
			xmlhttp.open("POST", url, true); // sending as POST

			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-Length", x.length); // POST request MUST have a Content-Length header (as per HTTP/1.1)
			xmlhttp.send("post_id=" + x);
			window.location.href = 'https://rp-website.000webhostapp.com/PHP/chat_page.php';
			
		}    
    </script>
    </head>
    <body>
        
        <h2>RP Posts</h2>
        <form action="" method="post">
         <div  id="InputPosts"></div>
        </form>
        <button onclick="location.href='https://rp-website.000webhostapp.com/PHP/create_character_page.php'">Character Creation</button>
        <button onclick="location.href='https://rp-website.000webhostapp.com/PHP/rps_page.php'">Back to RPs Page</button>
    </body>
</html>