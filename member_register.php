
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
