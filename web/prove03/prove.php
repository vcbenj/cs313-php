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
 
 
  
<table>
  <tr>
  <th> Buy Now 
  <th> Item Name 
  <th> Price 
  <th> Description  
  </tr>
  <tr>
    <?php
      function addList($str, $i) {
        $list[$i] = $str
      }
    ?>
  <td>  <input type="button" name="item_0" value="Add to Cart" id ="item_0" onclick="addList('Dell')"> 
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


<br>

  <input type = "button" id="validate" value="Submit"> 
  <input type="button" value="Reset" id="reset">

<script type="text/javascript">
var total;
var List;
var i = 0;
window.onload = function() {
    document.forms[0].elements[0].focus();
    List = [];
   document.getElementById("validate").onclick = validate;
   document.getElementById("reset").onclick = clear;
   
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
  setList(str, i);
  List = getShopingList();
  var j;
for (j = 0; j < List.length; j++) {
    console.log("Message: "+ List[j] );
}
console.log("List is this long: "+ List.length );
  
}

  function clear() {

  }
  
  function submit() {
  document.forms[0].elements[0].focus();
  document.forms[0].submit();
  console.log("WORKED");
  }
  
var colors = [ "black", "blue","red","green", "yellow"];

var colorIndex = 0;


</script>  
  
  
  
</html>
