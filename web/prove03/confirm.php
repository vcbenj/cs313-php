<?php
// Start the session
session_start();
echo $_SESSION['lst'];
echo $_SESSION['add'];
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
<h3> Your purchaces </h3>
<?php
  echo "<ul>";
  foreach($_SESSION['lst'] as $value) {
    echo "<li>". $value . "</li>";
  }
  echo "</ul>";

  echo "<h3>Your Address: " . $_SESSION['add'];

?>

<h4> Thank you please come again. </h4>
</div>