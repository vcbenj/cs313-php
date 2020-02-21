<?php

// get the data from the POST
$username = $_GET['username'];
$password = $_GET['password'];
$complex = $_GET['complex'];
$aptnumber = $_GET['aptnumber'];
#$topicIds = $_GET['chkTopics'];

require("db.php");
$db = get_db();
echo "HI";
$valid = true;
//YOU SHOULD NOT BE ABLE TO CREATE A NEW COMPLEX
// function newComplex() {
//     $query = 'INSERT INTO public.complex(complexName) VALUES(:complex)';
// 	$statement = $db->prepare($query);
    
// 	$statement->bindValue(':complex', $complex);
//     $statement->execute();
// }

// function newApartment() {
//     $query = 'INSERT INTO public.apartments(aptnumber) VALUES(:aptnumber)';
// 	$statement = $db->prepare($query);
    
// 	$statement->bindValue(':aptnumber', $aptnumber);

//     $statement->execute();
// }
try
{
$statement1 = $db->prepare("SELECT complexname FROM public.complex");
$statement1->execute();
$match = false;
while ($row = $statement1->fetch(PDO::FETCH_ASSOC))
{
    $complex1 =$row['complexname'];
    
    if ($complex1 === $complex) {
        $match = true;
    }
    #$user_id = $row['id'];
}

if ($match === false) {
    echo "THIS COMPLEX DOES NOT EXIST <br>";
    //newComplex();
    $valid = false;

}
else 
{
    echo "Not doing nothing";
}

///This is for the apartment check
$statement1 = $db->prepare("SELECT aptnumber FROM public.apartments");
$statement1->execute();
$match = false;
while ($row = $statement1->fetch(PDO::FETCH_ASSOC))
{
    $aptnumber1 =$row['aptnumber'];
    
    if ($aptnumber === $aptnumber) {
        $match = true;
        $aptid = $row['aptid'];

    }
    #$user_id = $row['id'];
}

if ($match === false) {
    echo "Apartment doesn't exist";
    $valid = false;

}
else 
{
    echo "Not doing nothing";
}

    

    
if $valid === true {
	$query = 'INSERT INTO public.users(username, password, aptid) VALUES(:username, :password, :aptid)';
	$statement = $db->prepare($query);
    
    
    


	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':username', $username);
	$statement->bindValue(':password', $password);
	$statement->bindValue(':aptid', $aptid);
	#$statement->bindValue(':content', $content);

    $statement->execute();
    

    $statement = $db->prepare("SELECT id, username FROM public.users");
    $statement->execute();
    $id = 0;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $name =$row['username'];
        
        if ($name === $username) {
            $id = $row['id'];
            echo $id . "<br>";
        }
        #$user_id = $row['id'];
    }

    echo $id . "<br>";
    




    //$query = 'INSERT INTO public.apt_users(aptid, userid) VALUES( :aptid, :userid)';
	//$statement = $db->prepare($query);
    
    
    


	// Now we bind the values to the placeholders. This does some nice things
	// including sanitizing the input with regard to sql commands.
	$statement->bindValue(':username', $username);
	$statement->bindValue(':password', $password);
	$statement->bindValue(':aptid', $aptid);
	#$statement->bindValue(':content', $content);

	$statement->execute();

	// get the new id for complex apt
	//$complexId = $db->lastInsertId("complex_id_seq");

	// Now go through each topic id in the list from the user's checkboxes
	 //foreach ($topicIds as $topicId)
	// {
	// 	echo "ScriptureId: $scriptureId, topicId: $topicId";

	// 	// Again, first prepare the statement
	//$statement = $db->prepare('INSERT INTO complex_apt(compid, aptid) VALUES(:scriptureId, :aptid)');

	// 	// Then, bind the values
	// 	$statement->bindValue(':scriptureId', $scriptureId);
	// 	$statement->bindValue(':topicId', $topicId);

	// 	$statement->execute();
    //}
    }
    else {
        die();
    }
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
//header("Location: Checklist.php");

die(); // we always include a die after redirects. In this case, there would be no
       // harm if the user got the rest of the page, because there is nothing else
       // but in general, there could be things after here that we don't want them
       // to see.

?>