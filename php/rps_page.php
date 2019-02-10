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
                    document.getElementById("RPs").innerHTML = ""
                    for(i = 0; i < obj.length; i++)
                    {
                        document.getElementById("RPs").innerHTML += "<button type='button' onclick='getPosts(" + obj[i].RP_ID + ")'>" + obj[i].RPName + " Admin : " + obj[i].Admin + "</button>"  + "<br><br>";
                    }
                    
                }
            };
            xmlhttp.open("GET", "https://rp-website.000webhostapp.com/PHP/get_rps.php", true);
            xmlhttp.send();
        }, 1000);
            
		function getPosts(x) {
		    
			var xmlhttp = new XMLHttpRequest(); // simplified for clarity
			var url = "https://rp-website.000webhostapp.com/PHP/session.php";
			xmlhttp.open("POST", url, true); // sending as POST

			xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			xmlhttp.setRequestHeader("Content-Length", x.length); // POST request MUST have a Content-Length header (as per HTTP/1.1)
			xmlhttp.onreadystatechange = function() { //Call a function when the state changes.
            if(xmlhttp.readyState == 4 && xmlhttp.status == 200) { // complete and no errors
                    alert(xmlhttp.responseText); // some processing here, or whatever you want to do with the response
                }
            };
			xmlhttp.send("rp_id=" + x);
			window.location.href = 'https://rp-website.000webhostapp.com/PHP/posts_page.php';
			
		}
		</script>
    </head>
    <body>
        
        <h2>RP Posts</h2>
        <form action="" method="post">
         <div  id="RPs"></div>
        </form>
        </div>
        </div>
    </body>
</html>