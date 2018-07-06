<!DOCTYPE html>
 
 <html lang="en">
 <head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     
     <title>Wood-Lore:Customer-Login</title>
		<link rel="shortcut icon" href="images/tree.ico" />
	 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		
		<link href="css/ecomm.css" rel="stylesheet"/>
		
		<link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
		
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	 
</head>
<body class = "member_register_php_body">
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
 session_start();
//Check for a valid session
if (isset($_SESSION['email']))
 //get the values from html page
    $first_name=trim($_POST['first_name']);
    $last_name=trim($_POST['last_name']);
    $mobile=trim($_POST['mobile']);
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    $repassword=trim($_POST['repassword']);
    $street_number=$_POST['street_number'];
    $street_name=$_POST['street_name'];
    $suburb=$_POST['suburb'];
    $postcode=$_POST['postcode'];
    $state_name=$_POST['state_name'];
	
	// field validation
	if (   ($first_name == "") 
		or ($last_name == "")
		or ($mobile == "")
		or ($email == "")
		or ($password == "")
		or ($street_number == "")
		or ($street_name == "")
		or ($suburb == "")
		or ($postcode == "")
		or ($state_name == ""))
    {
    echo"<p>Required Field(s) missing...!!!! Go back and Try again...!!!!.</p>";
    }
    elseif  (!(strstr($email, "@")) or !(strstr($email, ".")))
    {
        echo"<p>Invalid Email...!!!! Go back and Try again...!!!!.</p>";
    }
    elseif ($password != $repassword)
    {
    echo"<p>Password Miss Match...!!!! Go back and Try again...!!!!.</p>";
    }
	elseif(!preg_match('/^[0-9]*$/', $mobile))
	{
	echo"<p>Phone Number can be numeric only!</p>";
	}
	else
	{
		require_once('con_furnituredb.php'); //connect to server.
		$query = "INSERT INTO customers VALUES ('$first_name','$last_name','$mobile','$password','$email','$street_number','$street_name','$suburb','$postcode','$state_name')"; //add new record.
		mysqli_query($link,$query) or die ("Server not available this time. Please try again later");
		mysqli_close($link);
		echo "<p> <b>Record Added Successfully......!!!! </p>";
		echo"<p> <a href=login.html>Click Here to Login to the Member Page </a></p>";
		
	}
 ?>

</body>		 
</html>
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
		 
