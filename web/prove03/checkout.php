<?php
// Start the session
session_start();


    $List = $_GET["myList"];
    $list = explode(",", $List);
    echo "<br>";
    
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

<div>
<form action = "assign11.php" method = "get">

<table>
  <tr>
  <th> Remove Item 
  <th> Shopping Items
</tr>
<td>
<?php
foreach($list as $value){
        echo "<td> <input type='checkbox'><th> ".$value . "<br><tr>";
    }
?>
</table>
     </form>
  <input type = "button" id="validate" value="Submit"> 
  <input type="button" value="Reset" id="reset">
  <button onclick="window.location.href = 'checkout.php';">CheckOut</button>
<script type="text/javascript">


</script>  
  
  
  
</html>
