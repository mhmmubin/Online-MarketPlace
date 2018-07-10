 
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
