<?php
// Start the session
session_start();


    $List = $_GET["myList"];
    $add = $_GET["add"];
    $list = explode(",", $List);
    $_SESSION['shp']=$list;
    $_SESSION['add']=$add;
    
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
<form action = "checkout1.php" method = "GET">
<div>

<table>
  <tr>
  <th> Remove Item 
  <th> Shopping Items
</tr>
<?php
$index = 0;
$t = false;
foreach($list as $value){ //name was the index
        echo "<td> <input type='checkbox' value='". $value . "' name='places[]'>Remove<th> ".$value . "<br><tr>";
        $index++;
        $_SESSION['index']=$index;
    }
?>
</table>
<input type="submit" value="Submit">CheckOut</button>
     </form>
<script type="text/javascript">

</script>  
  
  
  
</html>
