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
     <body class ="kids_body">
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

</table>
		 
		 
         
      </div>
      <!--Create Footer-->
      <div class="footer">
          <div class="container">
              <p>&copy; All Rights Reserved by MHM MUBIN.</p>
          </div>
      </div>
        
     </body>
</html>