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

        if ($value == $places[$j]) {
            echo "Hello <br>";
            $ind = array_search($value);
            array_splice($shp, 1, $ind);
            echo $value . "  was the new list<br>";
        }
    $j++;
}
    
?>