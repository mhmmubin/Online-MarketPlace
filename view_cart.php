  <!DOCTYPE html>
 
 <html lang="en">
 <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
     <title>Wood-Lore</title>
		<link rel="shortcut icon" href="images/tree.ico" />
	 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link href="css/ecomm.css" rel="stylesheet"/>
		
		
		
		<link href="css/animate.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	 
</head>
     <body>
     <nav role="navigation" class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
					<a class="navbar-brand" href="home.html"><img src="images/wood.png" class="logo"></a>
					<button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse" >  
						   <span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
					</button>
                </div>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                      <li><a  href="home.html">Home</a></li>
					 
                      <li class = "dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">About Us<span class="caret"></span></a>
						<ul class="dropdown-menu" >
							<li><a href="founder.html">Who Dreamt</a></li>
							<li><a href="company.html">Company Profile</a></li>
					    </ul>
		             </li>
					  
                      <li class = "dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown">Visit Our Shop<span class="caret"></span></a>
						<ul class="dropdown-menu" >
							<li><a href="bedroom_products.php">Bedroom</a></li>
							<li><a href="living_products.php">Living</a></li>
							<li><a href="kids_products.php">Kids</a></li>
							<li><a href="gallery.html">Gallery</a></li>
					    </ul>
		            </li>
					
                      <li><a href="contact.html">Contact</a></li>
					  
					  <li><a class = "animated shake" href="events.html">Events</a></li>
                 </ul>
				 
				 <ul class="nav navbar-nav navbar-right">
				   <li><a href="view_cart.php"><img class = "cart_image" src= "images/cart.jpg"/>Cart</a></li>
				   <li><a href="member_register.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
				   <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                 </ul>
             </div>
				<ul class="nav navbar-nav navbar-right">
					<li><input type="text" class="form-control" placeholder="I am shopping for..." name="search"></li>
					<li><button type="submit" class="form-control">Search</button></li>
				</ul>
            </div>  
         </nav>
         
   <div class="jumbotron">
   
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
      </div>  
      </div>
      <!--Create Footer-->
      <div class="cart_footer">
          <div class="container">
              <p>&copy; All Rights Reserved by MHM MUBIN.</p>
          </div>
      </div>
        
     </body>
</html>