<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>repl.it</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <h1> ERROR YOUR PASSWORD AND USERNAME DO NOT MATCH </h1>
    <form action = "Checklist.php" method = "GET">
        <div id="signUp">
    <script src="script.js"></script>
    <img src="Cleanado_name_and_logo.png" alt="Cleanado Logo">
    <br>
    <input  name='username' placeholder="Username"></input>
    <br>
    <input  name='password' placeholder="Password"></input>
    <br>
    <input type='checkbox' value='Are you a new user?' onclick='newUser()'>New User? Click Here </input>
    <br>
    
</div>
<input type="submit" value="Login"></button>
</form>
</body>

</html>

<script type="text/javascript">
var isNew = true;
function newUser() {
    if (isNew) {
    var com = "<input  name='AptNumber'placeholder='Apartment Number' ></input><br>";
    var com1 = "<input  name='Complex'placeholder='Apartment Complex' ></input><br>";
  document.getElementById('signUp').innerHTML += com;
  document.getElementById('signUp').innerHTML += com1;
  isNew=false;
    }
}


</script>  