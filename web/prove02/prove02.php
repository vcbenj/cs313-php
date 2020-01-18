<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>prove02</title>

    <link href="style.css" rel="stylesheet" type="text/css" />
    <script src="script.js"></script>
  </head>
  <body>
    <div id="myHeader">
    <h1> Ben White's Home page </h1>
    <button onclick="window.location.href = 'Assignments.html';">Assignments</button>
    <hr>
    </div>
    <div id="par">
    <img src="Ben_Temple.jpg" alt="Girl in a jacket" width="300" height="400">
   
    <blockquote cite="http://www.worldwildlife.org/who/index.html">
        I love to solve complicated problems and try my best to learn new things. I am a Computer Science major 
        who is intrested in pursing a career in data science. The main reason behind my intrest in data science
        is to work with companies to end human trafficking and child pornography. My intrests include humanity
        work, basketball, rock climbing, and hanging out with friends. 
        </blockquote>
 </div>
 <?php
 echo("<div id = 'php'> <h3> Todays Time is: </h3>");
$t=time();
echo($t . "<br>");
echo(date("Y-m-d",$t));
echo("</div>")
?>
  </body>
</html>