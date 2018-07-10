   
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
    $password = md5($password);
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
  
