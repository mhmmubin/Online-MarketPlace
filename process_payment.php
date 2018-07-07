

<?php
session_start();
require_once('phpcreditcard.php');
//Read the values from the form
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$card_no = $_POST['card_no'];
$code = $_POST['code'];
$exp_date = $_POST['exp_date'];
$card_type = $_POST['card_type'];
//Validate text fields and the credit card
if (($name == "") or ($email == "")
  or ($address == "")or ($card_no == "")
  or ($code == "")or ($exp_date == ""))
{
    echo"<p>Required Field(s) missing...!!!! Go back and Try again...!!!!.</p>";
}
elseif  (!(strstr($email, "@")) or !(strstr($email, ".")))
{
        echo"<p>Invalid Email...!!!! Go back and Try again...!!!!.</p>";
}
//Call checkCreditCard() function from phpcreditcard.php
elseif (checkCreditCard($card_no, $card_type, $ccerror,$ccerrortext)!= true)
{
echo $ccerrortext;
}
else{
//If there are no errors
include('cart.php');
require_once('con_furnituredb.php');
require_once('gen_id.php');
$cart = new Cart();
$counter= $_SESSION['counter'];
$total_price = 0;   	
if ($counter==0){
echo"<br><br><p><b> Your Shopping Cart is empty !!! </b></p>";
}
else {
		//Convert the cart string to a cart object
		$cart = unserialize($_SESSION['cart']);
		$depth = $cart->get_depth();
		//Generate the order id
		$order_id = gen_id(8);
		for ($i=0; $i < $depth; $i++)
		{
			$item = $cart->get_item($i);
			$deleted = $item->deleted;
			if (!$deleted){
				$item_id = $item->get_item_id();
				$qty = $item->get_qty();
				$price = $item->get_price();
				$total_price = $total_price + $qty*$price;
				//Add the record to order_line table
    			$query = "INSERT INTO order_line 
				VALUES('$order_id', '$item_id', $qty)";
				// echo $query;
				$result= mysqli_query($link, $query) 
				or die( "Database Error - Order Line");
    			}
		}
		//Add the record to order table
		$status = "pending";
        $query = "INSERT INTO orders
		VALUES('$order_id', '$email',$total_price,'$status')";
		// echo $query;
		 $result= mysqli_query($link, $query) or die( "Database Error - Orders");
		$msg = "Thank you for the order.<br/> Your order number is 
		$order_id.<br/> Shortly you will receive a confirmation mail in your $email ";
		echo $msg;
		//Email the invoice
		mail($email,"Order Confirmation",$msg);
		mysqli_close($link);
		//Empty the cart
		unset($_SESSION['counter']);
		unset($_SESSION['cart']);
		echo"<p><b> <a href=home.html>Go back to Home Page </a> </b></p>";
	}
}
?>
