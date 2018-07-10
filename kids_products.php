  
<?php
//Start the session
session_start();
?>        
   <table class="products_table table-condensed">
<?php
//Connect to the database
include_once("con_furnituredb.php");
$query = "SELECT item_id, item_name, price,images FROM products WHERE  item_id >= 1004 and item_id<= 1006";
$result=mysqli_query($link, $query);
//Display products
echo"<tr>
		<td><b> Item Name</b></td>
		<td><b> Image</b></td>
		<td><b>Price</b></td>
		<td><b>Quantity</b></td>
	</tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$item_id = $row['item_id'];
	$item_name = $row['item_name'];
	$price = $row['price'];
	$images = $row['images'];
    echo "<tr><form  action=add_to_cart.php method=POST>";
    echo "<input name= item_id type=hidden id=$item_id value=$item_id>";
    echo "<td> $item_name</td>";
	
	echo "<td> <img src = '$images' height=200 width=400/> </td>";
	
	echo "<td> $price</td>";
    echo"<td><input name=qty type=text id=qty value=1 size=4 maxlength=2></td>";
	echo"<td><INPUT  name=add TYPE=submit id=add value=Add></td>";
    echo "</tr></form>";
}
mysqli_close($link);
?>   


