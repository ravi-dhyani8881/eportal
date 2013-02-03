<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form

 	include( "header.php");
 ?>
<tr>
<td style="background-color:#F7F7F7;height:600px;width:300px;vertical-align:top; border: 1px solid #C3CFD9; box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);">
	<?php
	if($_SESSION['login_type'] == 'staff')
		include( "navigationd.php");
	else if ($_SESSION['login_type'] == 'patient')
 		include( "navigationp.php");
 	$con = mysql_connect("localhost","linuxwin_testing","LeV%pxVhK~d@");
 	if (!$con)
 	{
 		die('Could not connect: ' . mysql_error());
 	}

 	mysql_select_db("prijal_healthmd", $con);
 //	$account_id=$_SESSION['account_id'];
 //	if( isset($_SESSION['doctor_view_patients']) && $_SESSION['doctor_view_patients']=="Y" && isset($_SESSION['dv_account_id'])){
 //		$account_id=$_SESSION['dv_account_id'];
 //	}
 	$account_id=$_SESSION['patient_account_id'];
 	$result = mysql_query("SELECT last_name,first_name,email_address FROM  patient WHERE account_id = '$account_id'");
 	$row = mysql_fetch_assoc($result);
 	$lastname = $row['last_name'];
 	$firstname =  $row['first_name'];
 	//$gender= $row['gender'];
 	$email= $row['email_address'];

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
<table style="margin:40px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td>

<table style="float: left;    margin-left: -3px;    width: 104%;">
<tr><td >

<span class="left-box"></span><span class="cent-box" style="width:786px;">Profile</span><span class="right-box"></span>

</td></tr>
</table>
</td>
</tr>
<tr><td>
<?php /*?><div style="hidden"><input type="hidden" name="account_id" value="<?php echo $_REQUEST['account_id']; ?>" /></div>
<?php */?>
<table class="main" style="width:100%">
<tr>
<td colspan="4">
<h1>
General Information
</h1>
</td>
</tr>
<tr><td style="width:18%;  padding-left: 22px;">
Last Name:</td><td style="width:40%;"> <input type="text" name="lastname" value="<?php echo $lastname;?>"
size="35" maxlength="35" />
</td>

<td style="width:10%">
First Name:
</td> <td style="width:40%"><input type="text" name="firstname" value="<?php echo $firstname;?>"
size="35" maxlength="35"/>
</td>

</tr>

<tr><td style="width:18%;  padding-left: 22px;">
Middle Name:</td><td style="width:40%;"> <input type="text" name="middlename"
size="35" maxlength="35" />
</td>
</tr>
<tr>

<td style="width:18%;  padding-left: 22px;">
Gender: </td><td colspan="3" style="width:90%">Female&nbsp;&nbsp;&nbsp;<input type="radio" name="gender" value="f">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Male<input type="radio" name="gender" value="m">
</td>
</tr>


<tr>
<td colspan="4">
<h1>
Address
</h1>
</td>
</tr>

<tr><td colspan="4">

<table style="width:70%">
<tr>
<td style="width:18%;  padding-left: 22px;">
Street:</td> <td colspan="3" style="width:90%"><input type="text" name="street" size="75" maxlength="75"
value="<?php echo $street;?>"/>
</td>
</tr>
<tr>

<td style="width:18%;  padding-left: 22px;">
City:</td>
<td style="width:40%">
<input type="text" name="city" size="25" maxlength="25" value="<?php echo $city;?>"
</td>
<td style="width:18%;  padding-left: 22px;">
State</td>
<td style="width:40%">
<select name="state">
<!-- <option value="md">MD</option>
<option value="va">VA</option>
<option value="wv">WV</option> -->
<?php
echo $db->getList('rf_state','state_cd','state_descr',$state);

?>
</select>
</td>
</tr>

<tr>
<td style="width:18%;  padding-left: 22px;">
Zip:</td>
<td style="width:90%" colspan="3"> <input type="text" name="zip" value="<?php echo $zip;?>"
/>
</td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="4" style="width:100%">
<h1>
Phone Number(s)
</h1>
</td>
</tr>
<tr>
<td colspan="4">

<table style="width:70%">
<tr>
<td style="width:18%;  padding-left: 22px;">
Work:</td> <td style="width:40%"><input type="text" name="work" value="<?php echo $work;?>"
size="15" maxlength="15" />
</td>
<td style="width:10%">
Cell:</td><td style="width:40%"><input type="text" name="cell" value="<?php echo $cell;?>"
size="15" maxlength="15"/>
</td>
</tr>
<tr><td  style="width:18%;  padding-left: 22px;">

Email:</td> <td colspan="3" style="width:90%"><p><input type="text" name="email" size="75" maxlength="75"
value="<?php echo $email;?>"
/>
</p>
</td>

</tr>
<tr>

<td colspan="4" style="width:18%;  padding-left: 22px;">
Notification Preference:&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;<input type="radio" name="notifypref" value="email">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" name="notifypref" value="text">
</td>
</tr>
</table>
</td>
</tr>

<tr>

<td colspan="4" style="width:100%;">
<table style="width:40%;" align="center"><tr>
<td style="width:50%;">
<p> <input type="submit" name="action" value="Save" style="background-color:  #3a6a8e;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>
<td style="width:50%;">
<p>
<input type="submit" name="action" value="Close" style="background-color: #3a6a8e;border-radius:5px;height: 35px; width: 100px"/>
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
mysql_close($con);
} else {

	if(isset($_POST['action']))
	{
		if( $_POST['action']=='Save'){
			$lastname = $_POST['lastname'];
			$firstname =  $_POST['firstname'];
			//$account_id= $_POST['account_id'];
			//$account_id= $_REQUEST['account_id'];
		//	$account_id= $_SESSION['account_id'];
		//	if( isset($_SESSION['doctor_view_patients']) && $_SESSION['doctor_view_patients']=="Y" && isset($_SESSION['dv_account_id'])){
		//		$account_id=$_SESSION['dv_account_id'];
		//	}
			$account_id=$_SESSION['patient_account_id'];
			$gender= $_POST['gender'];
			$email= $_POST['email'];

		 	$con = mysql_connect("localhost","linuxwin_testing","LeV%pxVhK~d@");
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db("prijal_healthmd", $con);

			$result = mysql_query("SELECT * FROM  patient WHERE account_id = '$account_id'");
			$num_rows = mysql_num_rows($result);

			if( $num_rows ==0){

				mysql_query("INSERT INTO patient (patient_id,account_id,last_name,first_name,email_address)
					VALUES (0,'$account_id','$lastname','$firstname','$email')");

				}else{
					mysql_query("update patient set last_name='$lastname',first_name='$firstname',email_address='$email'
							WHERE account_id = '$account_id' ");

				}

			$street=$_POST['street'];
			$city=$_POST['city'];
			$state=$_POST['state'];
			$zip=$_POST['zip'];
			$work=$_POST['work'];
			$cell=$_POST['cell'];

			$result = mysql_query("SELECT * FROM  address WHERE address_id = '$account_id'");
			$num_rows = mysql_num_rows($result);

			if($num_rows==0){
				mysql_query("INSERT INTO address (address_id,addr_street1,addr_street2,addr_street3,addr_city,addr_state,zip_cd,work_phone,cell_phone)
					VALUES ('$account_id','$street','','','$city','$state','$zip','$work','$cell')");
			}else{
				mysql_query("UPDATE  address SET addr_street1='$street',addr_street2='',addr_street3='',
						addr_city='$city',addr_state='$state',zip_cd='$zip',work_phone='$work',cell_phone='$cell'
						WHERE address_id = '$account_id'");
			}

			mysql_close($con);

			$nextpage='mainp.php';
		}else if( $_POST['action']=='Close')
			$nextpage='mainp.php';
	}
	if($_SESSION['login_type'] == 'staff')
		$nextpage='maind.php';
	else if ($_SESSION['login_type'] == 'patient')
 		$nextpage='mainp.php';
	header("location:".$nextpage);
	exit;
}
?>