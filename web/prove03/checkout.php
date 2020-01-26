<?php
// Start the session
session_start();


    $List = $_GET["stuff"];
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
 
  


<?php
      function add_List() {
        $list[0] = "Dell";
        echo $list[0];
      }

     # if (isset($_GET['hello'])) {
      #  add_List();
     # }
    ?>
<div id="stuff">
     </div>
<br>
     </form>
  <input type = "button" id="validate" value="Submit"> 
  <input type="button" value="Reset" id="reset">
  <button onclick="window.location.href = 'checkout.php';">CheckOut</button>
<script type="text/javascript">


</script>  
  
  
  
</html>
