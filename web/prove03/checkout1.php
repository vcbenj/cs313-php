<?php
// Start the session
session_start();


    $List = $_GET["myList"];
    $item_2 = $_GET["item_2"];
    $list = explode(",", $List);
    echo "<br>";
    echo $_SESSION['index'];
    
?>