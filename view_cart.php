     
<?php
session_start();
include 'cart.php';
$cart = new Cart();
if (!isset($_SESSION['counter']))
	$_SESSION['counter']=0;
$counter= $_SESSION['counter'];
    
?>


<?php

include_once("con_furnituredb.php");
$query = "SELECT images FROM products WHERE  item_id = 1010";
$result=mysqli_query($link, $query);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$images = $row['images'];

//check whether the cart is empty or not
if ($counter == 0) {
    echo"<h1><img src = '$images' height=150 width=200/></h1>";
    echo"<br><br><p><b> Your Shopping Cart is empty !!! </b></p>";
    echo"<p><b> <a href=home.html>Start Shopping now... </a> </b></p>";
} else {
    $cart = unserialize($_SESSION['cart']);
    //$cart = $_SESSION['cart'];
    $depth = $cart->get_depth();
    echo"<h1>Your Cart</h1>";
    echo "<table border=1>";
    echo"<tr><td><b>Item Name</b></td><td><b>Quantity</b></td><td><b> Price</b></td></tr>";
    for ($i = 0; $i < $depth; $i++) {
        $item = $cart->get_item($i);
        $deleted = $item->deleted;
        //display if the item is not marked for deletion
        if (!$deleted) {
            $item_id = $item->get_item_id();
            $item_name = $item->get_item_name();
            $qty = $item->get_qty();
            $price = $item->get_price();
            echo "<tr><form  action=remove_from_cart.php method=POST>";
            echo"<td>$item_name</td><td>$qty </td><td>$price</td>";
            echo "<input name= item_no type=hidden id= item_no value=$i>";
            echo"<td><INPUT  name=remove TYPE=submit id=remove value=Remove></td>";
            echo "</tr></form>";
        }
    }

    echo "</table>";
    echo"<p><b> <a href=checkout.php>Checkout </a> </b></p>";
   
}
	?>
    
