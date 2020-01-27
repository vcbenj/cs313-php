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
$j = 0;
foreach($newList as $value) {
    
    $newList1[$j] = $value;
    echo "------------------";
    var_dump($newList1);
    echo '<br>----------<br><br>';
    
    foreach($places as $place) {
        if ($value == $place) {
            echo "Hello <br>";
            
            $j++;
            $ind = array_search($value, $newList);
            echo $value ." Is the value at ". $ind . "<br>";
            $i = $ind++;
           
            array_splice($newList, $ind, $i);
            echo "New List   -- ";
            var_dump($newList);
            //$j--;
            echo "<br> <br>";
            
            
        }
       
        
    }
    $j++;
    
}
echo "__________________________________________<br>";

foreach($newList1 as $value) {
    echo $value . "<br>";
}
    
?>