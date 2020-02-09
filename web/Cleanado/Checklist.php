<?php
/**********************************************************
* File: viewScriptures.php
* Author: Br. Burton
* 
* Description: This file shows an example of how to query a
*   PostgreSQL database from PHP.
***********************************************************/

require "db.php";
$db = get_db();
$user_id = $_GET["username"];
$statement1 = $db->prepare("SELECT username, password FROM public.users");
$statement1->execute();
$match = false;
while ($row = $statement1->fetch(PDO::FETCH_ASSOC))
{
    $username =$row['username'];
    if ($username === $user_id) {
        $match = true;
    }
}

if ($match === false) {
    echo "YOUR USER NAME DID NOT MATCH";
    header ("location: LoginView.php");

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

$str = "SELECT jobDesc, DueDate, jobCheck FROM public.job WHERE id=". $user_id;
echo $str;
$statement = $db->prepare("SELECT jobDesc, DueDate, jobCheck FROM public.job");
$statement->execute();

// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	$book = $row['jobdesc'];
	$chapter = $row['duedate'];
	$verse = $row['jobcheck'];
	

	echo "<p><strong>STUFF - $book $chapter $verse</strong> <p>";
}

echo "WASSUP";

?>
</body>

</html>