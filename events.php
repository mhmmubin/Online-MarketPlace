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
     <body class = "events_body">
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
                 
					  <li><a href="events.html">Events</a></li>
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
//Start the session
session_start();
?>        
   <table class="events_table table-condensed">
<?php
//Connect to the database
include_once("con_furnituredb.php");
$query = "SELECT event_name, location, description, event_date, venue_name, Image FROM events";
$result=mysqli_query($link, $query);

//Display events
echo"<tr>
		
		<td><b> Event Name</b></td>
		<td><b> Location</b></td>
		<td><b>Description</b></td>
		<td><b>Event Date</b></td>
		<td><b>Venue Name</b></td>
		<td><b>Image</b></td>
	</tr>";
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
{
	$event_name = $row['event_name'];
	$location = $row['location'];
	$description = $row['description'];
	$event_date = $row['event_date'];
	$venue_name = $row['venue_name'];
	$Image = $row['Image'];
   
    echo "<td> $event_name</td>";
	
	echo "<td> $location</td>";
	
	echo "<td> $description</td>";
	
	echo "<td> $event_date</td>";
	
	echo "<td> $venue_name</td>";
	
	echo "<td> <img src = '$Image' height=200 width=300/> </td>";
	
	echo "</tr>";
}
mysqli_close($link);
?>   

</table>
</div>
   
      <div class="footer">
          <div class="container">
              <p>&copy; All Rights Reserved by MHM MUBIN.</p>
          </div>
      </div>
        
     </body>
</html>
