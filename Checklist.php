<?php

session_start();
require "db.php";
$db = get_db();
$_SESSION['error']= "null";
//$user_id = $_SESSION
if (isset($_SESSION['username']))
{
	$username = $_SESSION['username'];
}
if (isset($_SESSION['aptNumber']))
{
	$aptnumber = $_SESSION['aptNumber'];
}
if (isset($_SESSION['complex']))
{
	$complex = $_SESSION['complex'];;
}

if (isset($_GET['jobs']))
{
    $jobs = $_GET['jobs'];
    foreach ($jobs as $i){ 
        $statement1 = $db->prepare("UPDATE job SET jobCheck = TRUE WHERE jobid = $i;");
        $statement1->execute();
    }
}




//$id = $_SESSION['userid'];
//$aptid = $_SESSION['aptid'];

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
        $_SESSION['username'] = $user_name;
        $_SESSION['password'] = $password;
    }
    elseif ($_SESSION['username'] == $username1 and $_SESSION['password'] == $password1) {
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
    <title>Cleanado</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <form action = "Checklist.php" method = "GET">>
        <div id="signUp">
    <img src="Cleanado_name_and_logo.png" alt="Cleanado Logo">
    <br>
    <h1> Your Checklist</h1>


<?php

$statement = $db->prepare("SELECT aptid, userid FROM apt_users");
$statement->execute();

$apt_id = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	$aptid = $row['aptid'];
    $userid = $row['userid'];
    if ($user_id == $userid) {
        $apt_id = $aptid;
    }
    else {
    }

	
}

//get the apt jobs
$statement = $db->prepare("SELECT jobid, aptid FROM from_jobs");
$statement->execute();
$job_id = 0;
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	$aptid = $row['aptid'];
    $jobid = $row['jobid'];
    if ($apt_id == $aptid) {
        $job_id = $jobid;
    }
  	
}
$statement = $db->prepare("SELECT jobid, jobDesc, DueDate, jobCheck FROM public.job WHERE aptid = :apt_id");
$statement->bindValue(':apt_id', $apt_id);
$statement->execute();
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
    $jobid = $row['jobid'];
	
	$jobD = $row['jobdesc'];
	$duedate = $row['duedate'];
    $jobC = $row['jobcheck'];
	echo "<ul>";
    if ($jobC === false) {
        echo "<li><input type='checkbox' name='jobs[]' value='". $jobid. "'>" . $jobD ."  DUE DATE:". $duedate . "</input></li>";
    }
    else {
        echo "<li><input type='checkbox'checked name='jobs[]' value='". $jobid . "'>" . $jobD ."  DUE DATE:". $duedate . "</input></li>";
    }
    echo "</ul>";
    
    
}


?>
</body>
</div>
<input type="submit" value="Submit"></button>
</form>
</html>