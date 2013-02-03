<?php

require_once '../includes/global.inc.php';

if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form



 	include( "header.php");

 ?>

<tr>

<td style="background-color:white;height:600px;width:300px;vertical-align:middle;">

	<?php

 	include( "navigationp.php");



	$con = mysql_connect("localhost","linuxwin_testing","LeV%pxVhK~d@");

 	if (!$con) 	{

 		die('Could not connect: ' . mysql_error());

 	}



 	mysql_select_db("prijal_healthmd", $con);

 	$account_id=$_SESSION['org_account_id'];



	$result = mysql_query("SELECT addr_street1,addr_city,addr_state,zip_cd,work_phone,cell_phone FROM  address WHERE address_id = '$account_id'");

 	$row = mysql_fetch_assoc($result);

 	$street=$row['addr_street1'];

	$city=$row['addr_city'];

	$state=$row['addr_state'];

	$zip=$row['zip_cd'];

	$work=$row['work_phone'];

	$cell=$row['cell_phone'];









 ?>

</td>

<td style="background-color:white;height:600px;width:900px;text-align:top;">

<table style="margin:40px;width:800px;position: absolute;
top: 30px;" cellpadding="0px" cellspacing="0px;" >

<tr><td>



<table class="header" style="width:100%">

<tr><td >



Organization Profile Information



</td></tr>

</table>

</td>

</tr>

<tr><td>

<!--<input type="hidden" name="account_id" value="<?php echo $_SESSION['org_account_id'];?>"/>

-->



<table class="main" style="width:100%">

<tr><td style="width:10%">

&nbsp;&nbsp;&nbsp;Organization Name:</td><td style="width:40%;"> <input type="text" name="orgname"

size="35" maxlength="35" />

</td>

<!--

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



-->

<tr>

<td colspan="4">

<p class="bold">

Address

</p>

</td>

</tr>



<tr><td colspan="4">



<table style="width:70%">

<tr>

<td style="width:10%">

Street:</td> <td colspan="3" style="width:90%"><input type="text" name="street" size="75" maxlength="75"

/>

</td>

</tr>

<tr>



<td style="width:10%">

City:</td>



<td colspan="2" style="width:90%"><input type="text" name="city" size="75" maxlength="75"/>

</td>

<!--

<td style="width:40%">

<select name="city">

<option value="boyds">Boyds</option>

<option value="germantown">Germantown</option>

<option value="baltimore">Baltimore</option></select>

</td>

-->

<td style="width:10%">

State</td>

<td style="width:40%">

<select name="state">

<option value="md">MD</option>

<option value="va">VA</option>

<option value="wv">WV</option></select>



</td>

</tr>



<tr>

<td style="width:10%">

Zip:</td>

<td style="width:90%" colspan="3"> <input type="text" name="zip"

/>

</td>

</tr>

</table>

</td>

</tr>

<!-- <tr>

<td colspan="4" style="width:100%">

<p class="bold">

Phone Number(s)

</p>

</td>

</tr>

-->

<tr>

<td colspan="4">

<!--

<table style="width:70%">

<tr>

<td style="width:10%">

Work:</td> <td style="width:40%"><input type="text" name="work"

size="15" maxlength="15" />

</td>

<td style="width:10%">

Cell:</td><td style="width:40%"><input type="text" name="cell"

size="15" maxlength="15"/>

</td>

</tr>

<tr><td  style="width:10%">

<p>

Email:</p></td> <td colspan="3" style="width:90%"><p><input type="text" name="email" size="75" maxlength="75"

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

</table>

-->

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



			$account_id=$_SESSION['org_account_id'];

			$orgname = $_POST['orgname'];



		 	$con = mysql_connect("localhost","root");

			if (!$con)

			{

				die('Could not connect: ' . mysql_error());

			}



			mysql_select_db("prijal_healthmd", $con);



			echo "Account is $account_id orgName is $orgname";



			mysql_query("INSERT INTO organization (org_id, account_id, org_name)

					VALUES (0,'$account_id','$orgname')");



			$street=$_POST['street'];

			$city=$_POST['city'];

			$state=$_POST['state'];

			$zip=$_POST['zip'];

			//$work=$_POST['work'];

			//$cell=$_POST['cell'];



			mysql_query("INSERT INTO address (address_id,addr_street1,addr_street2,addr_street3,addr_city,addr_state,zip_cd,work_phone,cell_phone)

					VALUES ('$account_id','$street','','','$city','$state','$zip','00work','00cell')");





			mysql_close($con);



			$nextpage='mainp.php';

		}else if( $_POST['action']=='Close')

			$nextpage='mainp.php';

	}

	header("location:".$nextpage);

	exit;

}

?>