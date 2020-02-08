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
    <script src="script.js"></script>
    <img src="Cleanado_name_and_logo.png" alt="Cleanado Logo">
    <br>
    <h1> Your Checklist</h1>
    
</div>
<input type="submit" value="Login"></button>
</form>
</body>

</html>

<?php
/**********************************************************
* File: viewScriptures.php
* Author: Br. Burton
* 
* Description: This file shows an example of how to query a
*   PostgreSQL database from PHP.
***********************************************************/

require "dbConnect.php";
$db = get_db();

?>


<?php

// In this example, for simplicity, the query is executed
// right here and the data echoed out as we iterate the query.

// You could imagine that in a more involved application, we
// would likely query the database in a completely separate file / function
// and build a list of objects that held the components of each
// scripture. Then, here on the page, we could simply call that 
// function, and iterate through the list that was returned and
// print each component.



// First, prepare the statement

// Notice that we avoid using "SELECT *" here. This is considered
// good practice so we don't inadvertently bring back data we don't
// want, especially if the database changes later.
$statement = $db->prepare("SELECT jobDesc, DueDate, jobCheck FROM public.job");
$statement->execute();

// Go through each result
while ($row = $statement->fetch(PDO::FETCH_ASSOC))
{
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	$book = $row['jobDesc'];
	$chapter = $row['DueDate'];
	$verse = $row['jobCheck'];
	

	echo "<p><strong>$book $chapter:$verse</strong> <p>";
}

echo "WASSUP";

?>
