<?php

session_start();
$_SESSION['error']= "null";
require "db.php";
$db = get_db();
$user_id = $_GET["username"];
$statement1 = $db->prepare("SELECT id, username, password FROM public.users");
$statement1->execute();
$match = false;
while ($row = $statement1->fetch(PDO::FETCH_ASSOC))
{
    $username =$row['username'];
    
    if ($username === $user_id) {
        $match = true;
    }
    $user_id = $row['id'];
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
<input type="submit" value="Login"></button>
</form>





<?php

#$str = "SELECT jobDesc, DueDate, jobCheck FROM public.job WHERE id=". $user_id;
echo $str;
$statement = $db->prepare("SELECT jobDesc, DueDate, jobCheck FROM public.job");
$statement->execute();

while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	
	$jobD = $row['jobdesc'];
	$duedate = $row['duedate'];
	$jobC = $row['jobcheck'];
	

    echo "<p><strong> $jobD $duedate $jobC </strong> </p><br>";
    echo "<input type='checkbox'> " . $jobD . "</input>";
}


?>
</body>

</html>