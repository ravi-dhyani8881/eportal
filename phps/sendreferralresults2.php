<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form

 	include( "header.php");
 ?>
<tr>
<td style="background-color:white;height:600px;width:300px;vertical-align:middle;">
	<?php
 	include( "navigationd.php");
 ?>
    <script>
$(function() {
$( "#datepicker" ).datepicker();
});
</script>
    
</td>
<td style="background-color:white;height:600px;width:900px;text-align:top;">
<table style="margin:40px;width:800px" cellpadding="0px" cellspacing="0px;" >

    
    <tr><td >

                                    <span class="left-box"></span><span class="cent-box" style="width:786px;">Send Referral Results </span><span class="right-box"></span>

                                </td></tr>

<tr><td>

<table class="main" style="width:100%">


<tr>
<td  style="width:20%">
<p class="bold">
Select Referral:</p> </td>
<td colspan="3" style="width:80%; padding: 10px 0 5px 13px;">
<select name="doctorsname">
<option value="John Doe">John smith</option>
<option value="Jane Doe">Jane smith</option>
</select>
</td>
</tr>

<tr>
<td  style="width:20%">
<p class="bold">
Provider Information:</p> </td>
<td colspan="3" style="width:80%">
Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" size="50" maxlength="50" />
</td>
</tr>
<tr>
<td style="width:20%">
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td colspan="3" style="width:80%">
Organization: <input type="text" name="organization" size="50" maxlength="50" />
</td>
</tr>

<tr>
<td  style="width:20%">
<p class="bold">
Patient Information:</p> </td>
<td colspan="3" style="width:80%">
Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" size="50" maxlength="50" />
</td>
</tr>
<tr>
<td style="width:20%">
&nbsp;&nbsp;&nbsp;&nbsp;
</td>
<td style="width:30%">
Gender:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="gender" size="10" maxlength="10" />
</td>
<td style="width:50%">
Date of Birth: <input type="text" name="dob" id="datepicker"  />
</td>
</tr>
<tr>
<td style="width:20%;  vertical-align:top">
<p class="bold">
Test(s) to Perform:</p> </td><td colspan="3" style="width:80%">
<textarea rows="4" cols="50" name="testtoperform">

</textarea>
</tr>


<tr>
<td colspan="4" style="width:20%">
<p class="bold">
Generic Information:</p> </td>
</tr>

<tr>
<td style="width:20%;  vertical-align:top">
<p class="bold">
Test Results:</p> </td><td colspan="3" style="width:80%">
<textarea rows="4" cols="50" name="testresults">

</textarea>
</tr>

<tr>
<td  style="width:20%; vertical-align:top">
<p class="bold">
Interpretations & Comments:</p> </td>
<td colspan="3" style="width:80%">
<textarea rows="4" cols="50" name="comments">

</textarea>
</td>
</tr>
<tr>
<td  style="width:20%;  vertical-align:top">
<p class="bold">
Recommended Treatment:</p> </td>
<td colspan="3" style="width:80%">
<textarea rows="4" cols="50" name="treatment">

</textarea>
</td>
</tr>

<tr>
<td  style="width:20%;  vertical-align:top">
<p class="bold">
Attached files:</p> </td>
<td colspan="3" style="width:80%">
<input type="file" name="fuplod" value="" />
</textarea>
</td>
</tr>

<tr>

<td colspan="4" style="width:100%; padding: 10px 0 5px;">
<table style="width:80%;" align="center"><tr>

<td style="width:25%;">
<p> <input type="submit" name="action" value="Send Now" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>
<td style="width:25%;">
<p> <input type="submit" name="action" value="Send Later" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>
<td style="width:25%;">
<p>
<input type="submit" name="action" value="Cancel" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
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
		if( $_POST['action']=='Send Now')
			$nextpage='maind.php';
		else if( $_POST['action']=='Send Later')
			$nextpage='maind.php';
		else if( $_POST['action']=='Cancel')
			$nextpage='maind.php';
		else if( $_POST['action']=='Attach Files')
			$nextpage='maind.php';
	}
	header("location:".$nextpage);
	exit;
}
?>