<?php
// Start the session
session_start();
   
    echo "<br>";
    echo $_SESSION['index'];
    $shp = $_SESSION['shp'][3];
    echo $shp[0];
    $List = $_GET["0"];
    $places = $_GET["places"];
    
    foreach ($places as $place)
{
	//$place_clean = htmlspecialchars($place);
	echo $place . "<br>";
}
echo "NEW STUFF <br>";
foreach($shp as $value) {
    echo $value . " <_- <br>";
    foreach($places as $place) {
        echo $place . " <_- place <br>";
        if ($value == $place) {
            echo "Hello <br>";
            $ind = array_search($value);
            array_splice($shp, 1, $ind);
            echo $value . "<br>";
        }
    }
}
    
?>