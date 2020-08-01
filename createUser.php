<?php
session_start();
// get the data from the POST
$username = $_GET['username'];
$password = $_GET['password'];
$complex = $_GET['complex'];
$aptnumber = $_GET['aptnumber'];


require("db.php");
$db = get_db();
echo "HI";
$valid = true;
//YOU SHOULD NOT BE ABLE TO CREATE A NEW COMPLEX

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
$statement1 = $db->prepare("SELECT aptnumber, aptid FROM public.apartments");
$statement1->execute();
$match = false;
$aptid = '';
while ($row = $statement1->fetch(PDO::FETCH_ASSOC))
{
    $aptnumber1 =$row['aptnumber'];
    echo "<br> Apartment1 number is ". $aptnumber1;
    echo "<br> Apartment number is ". $aptnumber;
    if ($aptnumber == $aptnumber1) { //should be === but I can't get the type. 
        $match = true;
        $aptid = $row['aptid'];
        echo "<br> Apartment id is : " . $aptid . "<br>";

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

    

    
if ($valid === true) {

    $statement = $db->prepare("SELECT id, username FROM public.users");
    $statement->execute();
    $id = 0;
    $newUser = true;
    while ($row = $statement->fetch(PDO::FETCH_ASSOC))
    {
        $name =$row['username'];
        
        if ($name === $username) {
            $newUser = false;
            echo "User exists";
        }//The user doesn't exist
    
    }
    if ($newUser === true) {
        $query = 'INSERT INTO public.users(username, password, aptid) VALUES(:username, :password, :aptid)';
	    $statement = $db->prepare($query);
	
	    $statement->bindValue(':username', $username);
	    $statement->bindValue(':password', $password);
	    $statement->bindValue(':aptid', $aptid);


        $statement->execute();
        $statement = $db->prepare("SELECT id, username FROM public.users");
        $statement->execute();
        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
        {
            $name =$row['username'];
            echo "<br> name is : " . $name . "<br> and username is " . $username;
            if ($name == $username) {
                $id = $row['id'];
                echo "<br> user id is " . $id . "<br>";
            }
            else {
                echo "Didn't work<br>";
            }
           
        
        }

        $query = 'INSERT INTO apt_users(aptid, userid) VALUES( :aptid, :id)';
	    $statement = $db->prepare($query);	
        $statement->bindValue(':aptid', $aptid);
        $statement->bindValue(':id', $id);

        $statement->execute();
    }
     
    $_SESSION['username']= $username;
    $_SESSION['aptNumber']= $aptnumber;
    $_SESSION['complex']= $complex;
    $_SESSION['userid']= $id;
    $_SESSION['password'] = $password;
    $_SESSION['aptid']= $aptid;
    echo $id . "<br>";
    
    //Todo get the relationships down and now populate user_apt and apt_compl tables.  
}
    
    else {
        die();
    }
}

catch (Exception $ex)
{

	echo "Error with DB. Details: $ex";
	die();
}


header("Location: Checklist.php");
die(); 

?>