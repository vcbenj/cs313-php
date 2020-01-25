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
  <td>  <input type="button" name="item_0" value="Add to Cart" id ="item_0" onclick="<?php addList(); ?>"> 
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
<br>

  <input type = "button" id="validate" value="Submit"> 
  <input type="button" value="Reset" id="reset">

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
  setList(str, i);
  hello = true;
  document.write("<a href='prove.php?hello=true?'>Run PHP Function</a>");
}

  function clear() {

  }
  
  function submit() {

  }

</script>  
  
  
  
</html>
