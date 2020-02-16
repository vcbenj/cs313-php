<?php


// get the data from the POST
$book = $_GET['username'];
$password = $_GET['password'];
$verse = $_GET['Complex'];
$content = $_GET['AptNumber'];
$topicIds = $_GET['chkTopics'];

// For debugging purposes, you might include some echo statements like this
// and then not automatically redirect until you have everything working.

// echo "book=$book\n";
// echo "chapter=$chapter\n";
// echo "verse=$verse\n";
// echo "content=$content\n";

// we could (and should!) put additional checks here to verify that all this data is actually provided


require("db.php");
$db = get_db();

try
{
	// Add the Scripture
    $statement1 = $db->prepare("SELECT aptid, aptnumber FROM public.apartments");
    $statement1->execute();
    $match = false;
    while ($row = $statement1->fetch(PDO::FETCH_ASSOC))
    {
        $username =$row['aptnumber'];
    
    if ($username === $user_id) {
        $match = true;
    }
    $user_id = $row['id'];
	// We do this by preparing the query with placeholder values
	$query = 'INSERT INTO public.users(username, password) VALUES(:username, :password)';
	$statement = $db->prepare($query);
    
    
    


	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':username', $username);
	$statement->bindValue(':password', $password);
	#$statement->bindValue(':verse', $verse);
	#$statement->bindValue(':content', $content);

	$statement->execute();

	// get the new id
	#$scriptureId = $db->lastInsertId("scripture_id_seq");

	// Now go through each topic id in the list from the user's checkboxes
	// foreach ($topicIds as $topicId)
	// {
	// 	echo "ScriptureId: $scriptureId, topicId: $topicId";

	// 	// Again, first prepare the statement
	// 	$statement = $db->prepare('INSERT INTO scripture_topic(scriptureId, topicId) VALUES(:scriptureId, :topicId)');

	// 	// Then, bind the values
	// 	$statement->bindValue(':scriptureId', $scriptureId);
	// 	$statement->bindValue(':topicId', $topicId);

	// 	$statement->execute();
	}
}
catch (Exception $ex)
{
	// Please be aware that you don't want to output the Exception message in
	// a production environment
	echo "Error with DB. Details: $ex";
	die();
}

// finally, redirect them to a new page to actually show the topics
header("Location: Checklist.php");

die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.

?>