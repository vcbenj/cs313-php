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
<!DOCTYPE html>
<html>
<head>
	<title>Scripture List</title>
</head>

<body>

<div>

<h1>Scripture Resources</h1>

<?php
$book = _POST['book'];
$chapter = _POST['chapter'];
$verse = _POST['verse'];
$content = _POST['content'];

$statement = $db->prepare("INSERT INTO public.scripture (book) VALUES(". $book . ")");
$statement->execute();

// // Go through each result
//while ($row = $statement->fetch(PDO::FETCH_ASSOC))
// {
// 	// The variable "row" now holds the complete record for that
// 	// row, and we can access the different values based on their
// 	// name
// 	$book = $row['book'];
// 	$chapter = $row['chapter'];
// 	$verse = $row['verse'];
// 	$content = $row['content'];

// 	echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
// }

?>


</div>


</body>
</html>