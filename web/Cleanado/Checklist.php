<?php

session_start();
$_SESSION['error']= "null";
//$user_id = $_SESSION
$username = $_SESSION['username'];
$aptnumber = $_SESSION['aptNumber'];
$complex = $_SESSION['complex'];
//$id = $_SESSION['userid'];
//$aptid = $_SESSION['aptid'];
require "db.php";
$db = get_db();
$user_name = $_GET["username"];
$password = $_GET["password"];
//$aptnumber = $_GET['aptnumber']
$statement1 = $db->prepare("SELECT id, username, password FROM public.users");
$statement1->execute();
$match = false;
while ($row = $statement1->fetch(PDO::FETCH_ASSOC))
{
    $username1 =$row['username'];
    $password1 = $row['password'];
    
    if ($username1 === $user_name and $password === $password1) {
        $match = true;
        $user_id = $row['id'];
    }
    
}

if ($match === false) {
    $_SESSION['error'] = 'error';
    header ("location: LoginView1.php");

}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>repl.it</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <form>
        <div id="signUp">
    <img src="Cleanado_name_and_logo.png" alt="Cleanado Logo">
    <br>
    <h1> Your Checklist</h1>
    
</div>
</form>





<?php
//get apt id

//get jobs from apt
//get jobs from user
$statement = $db->prepare("SELECT aptid, userid FROM apt_users");
$statement->execute();
echo "ECHO";

$apt_id = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	$aptid = $row['aptid'];
    $userid = $row['userid'];
    if ($user_id == $userid) {
        $apt_id = $aptid;
        echo "<br> -------------- <br>";
    }
    else {
        echo "<br>ERROR NOT FOUND<br>";
    }

	
}
echo "ECHO";
$statement = $db->prepare("SELECT jobDesc, DueDate, jobCheck FROM public.job where aptid = '$apt_id'");
$statement->execute();
echo "ECHO";
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	$jobD = $row['jobdesc'];
	$duedate = $row['duedate'];
    $jobC = $row['jobcheck'];
   // if 
	

    echo "<p><strong> $jobD $duedate $jobC </strong> </p><br>";
    echo "<input type='checkbox'> " . $jobD . "</input>";
}


?>
</body>

</html>