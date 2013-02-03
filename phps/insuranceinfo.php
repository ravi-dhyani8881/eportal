<?php

require_once '../includes/global.inc.php';

if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form



 	include( "header.php");

 ?>

<tr>

<td style="background-color:#F7F7F7;height:600px;width:300px;vertical-align:top; border: 1px solid #C3CFD9; box-shadow: 0 1px 0 rgba(0, 0, 0, 0.05);">

	<?php

 	include( "navigationp.php");

 ?>

</td>

<td style="background-color:white;height:600px;width:900px;text-align:top;">

<table style="margin:40px;width:800px;position: absolute;
top: 30px;" cellpadding="0px" cellspacing="0px;" >

<tr><td>



<table  style="float: left;    margin-left: -3px;    width: 104%;">

<tr><td >



<span class="left-box"></span><span class="cent-box" style="width:786px;">Insurance Information</span><span class="right-box"></span>



</td></tr>

</table>

</td>

</tr>

<tr><td>



<table class="main" style="width:100%">

<tr>



<td style="width:25%;  padding-left: 22px; ">



Insurance Holder: </td><td colspan="3" style="width:75%;">Self&nbsp;&nbsp;&nbsp;<input type="radio" name="insuranceholder" value="self">

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other<input type="radio" name="insuranceholder" value="other">

</td>

</tr>

<tr>

<tr><td style="width:18%;  padding-left: 22px; ">

Last Name:</td><td style="width:40%;"> <input type="text" name="lastname"

size="35" maxlength="35" />

</td>



<td style="width:10%">

First Name:

</td> <td style="width:40%"><input type="text" name="firstname"

size="35" maxlength="35"/>

</td>



</tr>

<tr><td style="width:18%;  padding-left: 22px; ">

Relationship:</td><td style="width:40%;"> <input type="text" name="relationship"

size="35" maxlength="35" />

</td>

</tr>

<tr>

<td colspan="4">

<h1>

Primary Insurance:

</h1>

</td>

</tr>



<tr>

<td style="width:25%;  padding-left: 22px;">

Employer Name:</td> <td colspan="3" style="width:75%"><input type="text" name="employername" size="75" maxlength="75"

/>

</td>

</tr>

<tr>



<td style="width:25%;  padding-left: 22px;">

Insurance Company Name:</td>

<td colspan="3" style="width:75%"><input type="text" name="insurancename" size="75" maxlength="75"/>



</td>

</tr>

<tr>

<td style="width:25%;  padding-left: 22px;">

Group Id:</td>

<td colspan="3" style="width:75%"><input type="text" name="groupid" size="75" maxlength="75"/>



</td>

</tr>

<tr>

<td style="width:25%;  padding-left: 22px;">

Insurance Id:</td>

<td colspan="3" style="width:75%"><input type="text" name="insuranceid" size="75" maxlength="75"/>



</td>

</tr>

<tr>

<td style="width:25%;  padding-left: 22px;">

Zip:</td>

<td style="width:75%" colspan="3"> <input type="text" name="zip"

/>

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

<input type="submit" name="action" value="Cancel" style="background-color:  #3a6a8e;border-radius:5px;height: 35px; width: 100px"/>

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

		if( $_POST['action']=='Save')

			$nextpage='mainp.php';

		else if( $_POST['action']=='Cancel')

			$nextpage='mainp.php';



	}

	header("location:".$nextpage);

	exit;

}

?>