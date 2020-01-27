<?php
// Start the session
session_start();
$my_array=array();
$i = 0;
$_SESSION['list']=$my_array;
$_SESSION['i']=$i;
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
<form action = "checkout.php" method = "GET">
 
  
<table>
  <tr>
  <th> Buy Now 
  <th> Item Name 
  <th> Price 
  <th> Description  
  </tr>
  <tr>
  <td>  <input type="button" name="item_0" value="Add to Cart" id ="item_0" onclick="addList('Dell') "> 
  <th> Laptop Dell 
  <th> $499
  <th> Dell XPS
  <tr>
  <td>  <input type="button" name="item_1" value="Add to Cart" id="item_1" onclick="addList('HP')">
  <th> Laptop HP
  <th> $599
  <th> HP Pavilion
  <tr>
  <td>  <input type="button" name="item_2" value="Add to Cart" id="item_2" onclick="addList('Samsung')">
  <th> Samsung
  <th> $299
  <th> Chromebook
  <tr>
  <td>  <input type="button" name="item_3" value="Add to Cart" id="item_3" onclick="addList('Mac')">
  <th> Mac
  <th> $999
  <th> Macbook Pro  
</table>

<?php
      function add_List() {
        $list[0] = "Dell";
        echo $list[0];
      }

     # if (isset($_GET['hello'])) {
      #  add_List();
     # }
    ?>

<input  name='add' placeholder="Enter your Address"></input>
<div id="stuff" name="stuff">

     </div>
<br>
<input type="submit" value="Submit">CheckOut</button>
     </form>
  
<script type="text/javascript">
var total;
var List;
var hello;
var i = 0;
window.onload = function() {
    List = [];
   
  };
  
  function validate()
{
  
} 
window.onchange = function()
  {
  document.getElementById("validate").onsubmit = validate;
    getTotal();
}
function getShopingList() {
    return List;
}

function setList(item, index) {
    List[index] = item;
}
function addList(str) {
  document.getElementById('stuff').innerHTML = " ";
  setList(str, i);
  i++;
  console.log("My list is " + List);
  var com = "<input type='hidden' name='myList' value='" + List + "'></input>";
  document.getElementById('stuff').innerHTML += com;
  //document.getElementById('stuff').innerHTML += List;
  //document.getElementById('stuff').innerHTML += "'></input>";

}

  function clear() {

  }
  
  function submit() {

  }

</script>  
  
  
  
</html>
