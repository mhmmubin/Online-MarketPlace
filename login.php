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
     <body class="loginphp_body">
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
//start the new session
session_start();

$password=$_POST['password'];
$email = $_POST['email'];
if (($email=="") || ($password=="")) {
    header("Location: login.html");
    exit;
}
else
 {
    //connect to server and select database
    require_once('con_furnituredb.php');
    //create and issue the query
    //$password = md5($password);
    $query = "SELECT first_name, last_name, mobile, password, email, street_number, street_name, suburb, postcode, state_name
	from customers WHERE (email = '$email') AND (password = '$password')";
    $result = mysqli_query($link, $query) or die("Invalid Customer ID or Password");

    //get the number of rows in the result set; should be 1 if a match
    if (mysqli_num_rows($result) == 1) {
        //if authorized, get the values of firstname lastname, phone and email
        $row = $result->fetch_array();
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $mobile = $row['mobile'];
        $email = $row['email'];
		$street_number = $row['street_number'];
		$street_name = $row['street_name'];
		$suburb = $row['suburb'];
		$postcode = $row['postcode'];
		$state_name = $row['state_name'];
        mysqli_close($link);
        //save the values in session variables
        $_SESSION['first_name'] = $first_name;
        $_SESSION['last_name'] = $last_name;
        $_SESSION['mobile'] = $mobile;
        $_SESSION['email'] = $email;
		$_SESSION['street_number'] = $street_number;
		$_SESSION['street_name'] = $street_name;
		$_SESSION['suburb'] = $suburb;
		$_SESSION['postcode'] = $postcode;
		$_SESSION['state_name'] = $state_name;
		?>
		<div class ="authentication"> 
		<?php
        echo"<h2> Authentication Succeed !!! </h2>";?><div>
		<div class="authentication_next">
		<?php
        echo"<a href=member_page.php> Click Here to see your Profile </a>";
		echo"<a href=payments.php> Proceed to Payment </a>";?><div>

   <?php } else {
        echo'<script type="text/javascript">alert("Login Failed! Please try again");</script>';
		//echo"<input type="button" value="Go to Login page" onclick="openLogin()" />"
        
		echo"<a href=login.html>Go to Login page</a>";
		
		exit;
    }
    }
    ?>   
       
	  
	  
     </body>
</html>
