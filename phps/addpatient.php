<?php

require_once '../includes/global.inc.php';

if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form



 	include( "header.php");

 ?>

<tr>

<td style="background-color:white;height:600px;width:300px;vertical-align:middle;">

	<?php

 	include( "navigationd.php");



 	$con = mysql_connect("localhost","linuxwin_testing","LeV%pxVhK~d@");

	 	if (!$con)

	 	{

	 		die('Could not connect: ' . mysql_error());

	 	}



	 	mysql_select_db("prijal_healthmd", $con);

		$staff_id=$_SESSION['staff_id'];

		$result = mysql_query("SELECT org_name,last_name,first_name

	 		FROM  org_staff WHERE staff_id = '$staff_id'");

	 	$row = mysql_fetch_assoc($result);

	 	$dr_lastname = $row['last_name'];

	 	$dr_firstname =  $row['first_name'];

	 	$org_name = $row['org_name'];

	 	//echo "Org name is ---  $org_name";

	 	//echo "dr firstnm is - $dr_firstname";

	 	//echo "dr lname $dr_lastname";







 ?>

</td>

<td style="background-color:white;height:600px;width:900px;text-align:top;">

<table style="margin:40px;width:800px;position: absolute;
top: 30px;" cellpadding="0px" cellspacing="0px;" >

<tr><td>



<table class="header" style="width:100%">

<tr><td >



Patient Information



</td></tr>

</table>

</td>

</tr>

<tr><td>



<table class="main" style="width:100%">

<tr>

<td style="width:10%">



Organization/Practice: </td><td colspan="3" style="width:90%"> <input type="text" name="organization"

value = "<?php echo $org_name;?>"

size="50" maxlength="50" readonly style="border:none;"/>

</td></tr>

<tr>

<td style="width:10%">



Doctor/Practitioner: </td><td colspan="3" style="width:90%"> <input type="text" name="doctor"

value = "<?php echo $dr_firstname.' '.$dr_lastname;?>"

size="50" maxlength="50" readonly style="border:none;" />

</td></tr>

<tr><td style="width:10%">

Last Name:</td><td style="width:40%;"> <input type="text" name="lastname"

size="35" maxlength="35" />

</td>



<td style="width:10%">

First Name:

</td> <td style="width:40%"><input type="text" name="firstname"

size="35" maxlength="35"/>

</td>



</tr>



<tr><td style="width:10%">

Middle Name:</td><td style="width:40%;"> <input type="text" name="middlename"

size="35" maxlength="35" />

</td>

</tr>

<tr>



<td style="width:10%">

Gender: </td><td colspan="3" style="width:90%">Female&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="f">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male<input type="radio" name="gender" value="m">

</td>

</tr>







<tr><td  style="width:20%">

<p>

Email:</p></td> <td colspan="3" style="width:80%"><p><input type="text" name="email" size="75" maxlength="75"

/>(login id)

</p>

</td>



</tr>

<tr><td  style="width:20%">

<p>

Initial Password:</p></td> <td colspan="3" style="width:90%"><p><input type="text" name="password" size="75" maxlength="75"

/>

</p>

</td>



</tr>

<tr>



<td colspan="4">

Notification Preference:&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;<input type="radio" name="notifypref" value="email">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" name="notifypref" value="text">

</td>

</tr>



<tr>



<td colspan="4" style="width:100%;">

<table style="width:40%;" align="center"><tr>

<td style="width:50%;">

<p> <input type="submit" name="action" value="Save" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>

</p>

</td>

<td style="width:50%;">

<p>

<input type="submit" name="action" value="Close" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>

</p>

</td>



</tr>

</table>

</td></tr>





</table>



</td></tr></table>



</td>

</tr>



	<?php

 	include( "footer.php");

 ?>



</table>



</form>

</body>

</html>

<?php

} else {



	if(isset($_POST['action']))

	{

		if( $_POST['action']=='Save'){

			$login_id = $_POST['email'];

			$password =  md5($_POST['password']);

			$account_type = "patient";



			$con = mysql_connect("localhost","root");

			if (!$con)

			{

				die('Could not connect: ' . mysql_error());

			}



			mysql_select_db("prijal_healthmd", $con);



			mysql_query("INSERT INTO user_account (account_id,account_type,login_id, password,challenge_q1,answer_1,challenge_q2,answer_2,challenge_q3,answer_3)

					VALUES (0,'$account_type','$login_id','$password','','','','','','')");





			$result = mysql_query("SELECT account_id FROM  user_account WHERE login_id = '$login_id'");

			$row = mysql_fetch_assoc($result);

			$lastname = $_POST['lastname'];

			$firstname =  $_POST['firstname'];

			//$gender= $_POST['gender'];

			$email= $_POST['email'];

			$account_id=$row['account_id'];

			$staff_id=$_SESSION['staff_id'];



			mysql_query("INSERT INTO patient (patient_id,account_id,last_name,first_name,email_address)

					VALUES (0,'$account_id','$lastname','$firstname','$email')");





			$result = mysql_query("SELECT patient_id FROM  patient WHERE account_id = '$account_id'");

			$row = mysql_fetch_assoc($result);

			$patient_id=$row['patient_id'];;



			mysql_query("INSERT INTO doctor_patient (staff_id,patient_id)

					VALUES ('$staff_id','$patient_id')");



			mysql_close($con);



			$nextpage='maind.php';

		}

		else if( $_POST['action']=='Close')

			$nextpage='maind.php';



	}

	header("location:".$nextpage);

	exit;

}

?>