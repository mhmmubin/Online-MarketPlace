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
    
<div class = "payment">	
   <h1>Payment Details</h1>
<p>Please enter your credit card and shipping details</p>
<?php
session_start();

?>
<form action="process_payment.php" method="post" name="process_payment">
	<table style="width: 61%; height: 313px">
		<tr>
			<td  style="width: 173px">Name</td>
			<td >
			<input name="name"  style="width: 240px" type="text" /></td>
		</tr>
		<tr>
			<td  style="width: 173px">Email Address</td>
			<td ><input name="email"  type="text" /></td>
		</tr>
		<tr>
			<td style="width: 173px">Shipping Address</td>
			<td >
			<textarea name="address" style="width: 205px; height: 91px"></textarea></td>
		</tr>
		<tr style="height: 50px">
			<td  style="width: 173px">Card Type</td>
			<td ><select name="card_type">
			<option value="Visa">Visa</option>
			<option value="Master Card">Master Card</option>
			<option value="American Express">American Express</option>
			<option value="Carte Blanche">Carte Blanche</option>
			<option value="Discover">Discover</option>
			<option value="Diner's Club">Diner's Club</option>
			<option value="enRoute">enRoute</option>
			<option value="JCB">JCB</option>
			<option value="Solo">Solo</option>
			<option value="Switch">Switch</option>
			</select></td>
		</tr>
		<tr>
			<td  style="width: 173px">Card Number</td>
			<td ><input name="card_no" type="text" value="4111 1111 1111 1111" /></td>
		</tr>
		<tr>
			<td  style="width: 200px">Verification Code</td>
			<td ><input name="code" type="text" /></td>
		</tr>
		<tr>
			<td  style="width: 173px">Exp. Date</td>
			<td ><input name="exp_date" type="text" /></td>
		</tr>
		<tr style="height: 50px">
			<td style="width: 173px">
			<input name="Submit1" type="submit" value="submit" /></td>
			<td >
			<input name="Reset1" type="reset" value="reset" /></td>
		</tr>
	</table>
</form>
  </div>       
     
    
     </body>
</html>