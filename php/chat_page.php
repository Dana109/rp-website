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
                    document.getElementById("txtResult").innerHTML = ""
                    for(i = 0; i < obj.length; i++)
                    {
                        document.getElementById("txtResult").innerHTML += obj[i].Author + ": " + obj[i].Description + "<br><br>";
                    }
                    
                }
            };
            xmlhttp.open("GET", "https://rp-website.000webhostapp.com/PHP/chatbox.php", true);
            xmlhttp.send();
        }, 1000);
            
            
    </script>
    </head>
    <body>
        <div  id="txtResult"></div>
        <h2>Chat Form</h2>
        <form action="" method="post">
        <label>Message :</label>
        <input id="message" name="message" placeholder="Your Message" type="text">
        <input name="submit" type="submit" value=" Send ">
        <span><?php echo $error; ?></span>
        </form>
        </div>
        </div>
    </body>
</html>