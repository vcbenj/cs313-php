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
$newList = $_SESSION['shp'];
foreach($newList as $value) {
    echo $value . "<br>";
}
echo "NEW STUFF <br>";
foreach($_SESSION['shp'] as $value) {
    $j = 0;
    $newList[$j] = $value;
    
    foreach($places as $place) {
        if ($value == $place) {
            echo "Hello <br>";
            $j++;
            $ind = array_search($value, $newList);
            echo $value ." Is the value at ". $j . "<br>";
            //$ind -= 1;
            unset($newList, $ind);
            var_dump($newList);
            $j--;
            echo "<br> <br>";
            
        }
        $j++;
    }
    
}


foreach($newList as $value) {
    echo $value . "<br>";
}
    
?>