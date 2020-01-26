<?php
// Start the session
session_start();
   
    echo "<br>";
    echo $_SESSION['index'];
    $_SESSION['shp'][3];
    $List = $_GET["0"];
    $places = $_GET["places"];
    
    foreach ($places as $place)
{
	//$place_clean = htmlspecialchars($place);
	echo $place . "<br>";
}
echo "NEW STUFF <br>";
$newList = [];
foreach($_SESSION['shp'] as $value) {
    $j = 0;
    $newList[$j] = $value;
    $j++;
    foreach($places as $place) {
        if ($value == $place) {
            echo "Hello <br>";
            $ind = array_search($value);
            //$ind -= 1;
            array_splice($newList, 0, $ind);
            
        }
    }
}


foreach($newList as $value) {
    echo $value . "<br>";
}
    
?>