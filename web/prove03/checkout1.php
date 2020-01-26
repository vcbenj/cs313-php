<?php
// Start the session
session_start();
   
    echo "<br>";
    echo $_SESSION['index'];
    echo $_SESSION['shp'][3];
    $List = $_GET["0"];
    $places = $_GET["places"];
    
    foreach($list as $value){
        echo $value;
        $index++;
        $_SESSION['index']=$index;
    }
    foreach ($places as $place)
{
	//$place_clean = htmlspecialchars($place);
	echo $place . "<br>";
}
echo "NEW STUFF <br>";
foreach($list as $value) {
    foreach($places as $place) {
        if ($value == $place) {
            $ind = array_search($value);
            array_splice($list, 1, $ind);
            echo $value . "<br>";
        }
    }
}
    
?>