 
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
 
