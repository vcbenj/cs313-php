<?php
// Start the session
session_start();
    $_SESSION['shp'][3];
    $List = $_GET["0"];
    $places = $_GET["places"];
    
$newList = $_SESSION['shp'];

if ($newList[0] === $places[0]) {
    array_splice($newList, 0, 1);
}

foreach ($places as $place) {
    $ind = array_search($place, $newList);
    array_splice($newList, $ind, $ind++);
}
   
?>

<!DOCTYPE html>
<html>
<head>
<title> buyer's store </title>
<style>
header {
background-color: red;
}
table, th, td {
  border: 1px solid;
} 
body {
  background-color: #DDDDDD;
} 
</style>
</head>
<header>

<h1> BUY YOUR STUFF </h1>
</header>

<table>
  <tr>
  <th> Shopping Items
</tr>
<?php
$index = 0;
$t = false;
foreach($newList as $value){ //name was the index
        echo "<td> ".$value . "<br><tr>";
        //$index++;
        //$_SESSION['index']=$index;
    }
?>
</table>
<input type="submit" value="Submit">Confirm Purchace</button>