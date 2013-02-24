<?php
require_once '../includes/global.inc.php';
include( "doctorSession.php");

if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form

 	include( "header.php");
 ?>
<script type="text/javascript">
jQuery(function($){   
   $("#cell").mask("(999) 999-9999");
   $("#work").mask("(999) 999-9999? x99999");   
    var tech = GetURLParameter('msg');
    if(tech=='update'){
        $('#notifications').show();
        $('#notifications').slideUp(4000).delay(25000);
    }   
});
</script>


<script type="text/javascript">
        $(document).ready(function() {
            
              $('#fsubmit').click(function() {
                
                
                if ($('#firstname').val() == ""){ jAlert("Please Insert Firstname"  , 'Error Message'); $("#firstname").css("border","1px solid red"); return false; }
                if ($('#lastname').val() == ""){ jAlert("Please Insert Lastname"  , 'Error Message'); $("#lastname").css("border","1px solid red"); return false; }                
                if ($('#email').val() == ""){ jAlert("Please Insert Email id"  , 'Error Message'); $("#email").css("border","1px solid red"); return false; }            
                
                
                if ($('#cell').val().length <= 13 ){ jAlert('Invalid Cellphone Number' , 'Error Message'); $("#cell").css("border","1px solid red"); return false; }                
                if ($('#firstname').val().length <= 3 ){ jAlert("Firstname Must Be 4 Character"  , 'Error Message'); $("#firstname").css("border","1px solid red"); return false; }
                });
                
              $("#email").keyup(function(){
                var username = $('#email').val();
                var u=username.length;		
                if (u >= 2 ){
                    $.post("checkEmailExist.php?email="+username+'&method=checkmail', function(data) { 
        			
                         if (data==0){
                            $("#resultt" ).empty().append("Email not Registered");
                            $("#resultt").css("color","green");
                            $('input[type="submit"]').removeAttr('disabled');
                        } else {
                            $("#resultt" ).empty().append("Email Already Register");
                            $("#resultt").css("color","red");        					 
                            $('input[type="submit"]').attr('disabled','disabled');        					
                        }   			
                    });
                }
        			
            }); 
                
      });
    </script>
<span class="notifications" id="notifications" style="display: none;" >		
		<p>Your settings have been updated successfully.</p>
		</span>


<tr>
<td style="background-color:white;width:300px;vertical-align:middle; height: 500px;">
	<?php
 	include( "navigationd.php");
 	 $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
 	if (!$con)
 	{
 		die('Could not connect: ' . mysql_error());
 	}

 	mysql_select_db($_SESSION['databaseName'], $con);
 //	$account_id=$_SESSION['account_id'];
 	$account_id=$_SESSION['staff_account_id'];
 	$result = mysql_query("SELECT spclty_type_cd,last_name,first_name,email_address,work_phone,cell_phone, org_name , middle_name ,gender , NOTIFICATION_PRE
 		FROM  org_staff WHERE account_id = '$account_id'");
 	$row = mysql_fetch_assoc($result);
 	
        
        $specialties = $row['spclty_type_cd'];
        
        
 	$lastname = $row['last_name'];
 	$firstname =  $row['first_name'];
 	//$gender= $row['gender'];
 	$email= $row['email_address'];
 	$work=$row['work_phone'];
        $cell=$row['cell_phone'];
 	$org_name = $row['org_name'];
        $nPrefrence = $row['NOTIFICATION_PRE'];
        
        
 	//echo "Org name is ---  $org_name";


 ?>
</td>
<td style="background-color:white;width:900px;text-align:top;">
<table style="margin: 0 40px 30px;width:800px" cellpadding="0px" cellspacing="0px;" >
<tr><td>

                        <table style="float: left;    margin-left: -3px;    width: 104%;">
                            <tr><td >

                                    <span class="left-box"></span><span class="cent-box" style="width:786px;">Doctor Profile Information</span><span class="right-box"></span>

                                </td></tr>
                        </table>
                    </td>
                </tr>
<tr><td>
<input type="hidden" name="account_id" value="<?php echo $_SESSION['staff_account_id'];?>"/>
<table class="main" style="width:100%">
<tr>
<td colspan="4" style="width:100%">

Organization/Practice:
<?php
//$con = mysql_connect("localhost","root");
//mysql_select_db("prijal_healthmd", $con);
//$q1=mysql_query("SELECT org_name FROM organization");
?>
<select name="org_name">
<?php
/*while($row=mysql_fetch_array($q1))
{
?>
<option value="<?php echo $row['org_name'];?>">
<?php
echo $row['org_name'];
?>
</option>
*/
echo $db->getListDescr('organization','org_id','org_name',$org_name);
echo "New org name is $org_name";
?>
}
?>
</select>
</td>

 <!--  <td colspan="3" style="width:90%"> <input type="text" name="organization"
size="50" maxlength="50" />
</td>
-->
</tr>
<tr><td style="width:10%">
Last Name:</td><td style="width:40%;"> <input type="text" name="lastname" id="lastname"  value="<?php echo $lastname;?>"
size="35" maxlength="35" />
</td>

<td style="width:10%">
First Name:
</td> <td style="width:40%"><input type="text" name="firstname" id="firstname" value="<?php echo $firstname;?>"
size="35" maxlength="35"/>
</td>

</tr>

<tr><td style="width:13%">
Middle Name:</td><td style="width:40%;"> <input type="text" name="middlename" value="<?php echo $row['middle_name'];?>"
size="35" maxlength="35" />
</td>
</tr>
<tr>

<td style="width:10%">

Gender: </td>

<td colspan="3" style="width:90%">
    <?php
    if($row['gender']=='M'){
        echo 'Female&nbsp;&nbsp;&nbsp;<input  type="radio" style="width:0px;" name="gender" id="gender" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';        
        echo 'Male<input type="radio" checked="true" style="width:0px;" name="gender" id="gender" value="M">';       
    } elseif ($row['gender']=='F') {
         echo 'Female&nbsp;&nbsp;&nbsp;<input  type="radio" style="width:0px;" name="gender" id="gender" checked="true" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';        
        echo 'Male<input type="radio" style="width:0px;"  name="gender" id="gender" value="M">';     
    }else{
         echo 'Female&nbsp;&nbsp;&nbsp;<input  type="radio" style="width:0px;" name="gender" id="gender" value="F">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';        
        echo 'Male<input type="radio"  name="gender" style="width:0px;" id="gender" value="M">';     
    }
    ?>
    
</td>

</tr>



<tr>

<td colspan="4" style="width:100%">
Specialties (Select up to 5):

<select name="specialties">
<!--
<option value="orthopedic">Orthopedic</option>
<option value="pediatrics">Pediatrics</option>
<option value="opthomology">Opthomology</option>
-->
<?php
echo $db->getList('rf_spclty_type','spclty_type_cd','description',$specialties);

?>
</select>

</td>
</tr>


<tr>
<td colspan="4" style="width:100%">
<p class="bold">
Phone Number(s)
</p>
</td>
</tr>
<tr>
<td colspan="4">

<table style="width:70%">
<tr>
<td style="width:10% ">
    Work:</td> <td style="width:40%; padding: 0 0 0 12px;"><input type="text" id="work" name="work" style="width: 150px;"    value="<?php echo $work;?>"
size="30" maxlength="30" />
</td>
<td style="width:10%">
Cell:</td><td style="width:40%"><input type="text" id="cell" name="cell" style="width: 150px;" value="<?php echo $cell;?>"
size="15" maxlength="15"/>
</td>
</tr>
<tr><td  style="width:10%">
<p>
Email:</p></td> <td colspan="3" style="width:90%"><p><input type="text" name="email" id="email"  size="75" maxlength="75" value="<?php echo $email;?>"/>
           <span id="resultt" style="font-weight:bold;"></span>     
        </p>
</td>

</tr>
<tr>

<td colspan="4">
Notification Preference:

	 <?php
    if($row['NOTIFICATION_PRE']=='E'){
        echo '&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;<input type="radio" id="notifypref" checked="true" name="notifypref" value="E">';        
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" id="notifypref" name="notifypref" value="T">';       
    } elseif ($row['NOTIFICATION_PRE']=='T') {
        echo '&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;<input type="radio" id="notifypref" name="notifypref" value="E">';        
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" checked="true" id="notifypref" name="notifypref" value="T">';       
    }else{
        echo '&nbsp;&nbsp;&nbsp;Email&nbsp;&nbsp;&nbsp;<input type="radio" id="notifypref"  name="notifypref" value="E">';        
        echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Text<input type="radio" id="notifypref" name="notifypref" value="T">';       
    }
    ?>

</td>
</tr>
</table>
</td>
</tr>

<tr>

<td colspan="4" style="width:100%;">
<table style="width:60%;" align="center"><tr>

<td style="width:33%;">
<p> &nbsp; &nbsp; &nbsp;<input type="submit" id="fsubmit" name="action" value="Save" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>
</p>
</td>
<td style="width:33%;">
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
mysql_close($con);
} else {

	if(isset($_POST['action']))
	{
		if( $_POST['action']=='Change Password')
			$nextpage='maind.php';
		if( $_POST['action']=='Save'){
			$lastname = $_POST['lastname'];
			$firstname =  $_POST['firstname'];
                        $middleName =  $_POST['middlename'];
                        
			//$account_id= $_POST['account_id'];
		//	$account_id= $_REQUEST['account_id'];
		//	$account_id= $_SESSION['account_id'];
			$account_id=$_SESSION['staff_account_id'];
			$specialties=intval($_POST['specialties']);
			//$organization=$_POST['organization'];
			$email=$_POST['email'];
			$work=$_POST['work'];
			$cell=$_POST['cell'];
			$org_name = $_POST['org_name'];
                        $gender = $_POST['gender'];
                        $notify = $_POST['notifypref'];
                        

                        $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
			if (!$con)
			{
				die('Could not connect: ' . mysql_error());
			}

			mysql_select_db($_SESSION['databaseName'], $con);

			echo "Org name is $org_name";
			$org_result = mysql_query("SELECT org_name FROM organization WHERE org_id='$org_name'");
			$org_row = mysql_fetch_assoc($org_result);
			$neworg_name=$org_row['org_name'];
			echo "Org name new updated is $neworg_name";

			$result = mysql_query("SELECT * FROM  org_staff WHERE account_id = '$account_id'");
			$num_rows = mysql_num_rows($result);


			if($num_rows==0){

				mysql_query("INSERT INTO org_staff (staff_id,account_id,org_name,spclty_type_cd,last_name,
					first_name,email_address,work_phone,cell_phone , middle_name , NOTIFICATION_PRE )
					VALUES (0,'$account_id','$neworg_name',$specialties,'$lastname','$firstname','$email','$work','$cell','$middleName' , '$notify')");


			}else	{

				mysql_query("UPDATE org_staff SET spclty_type_cd='$specialties', org_name='$neworg_name',
				last_name='$lastname',first_name='$firstname',email_address='$email',
				work_phone='$work',cell_phone='$cell', gender='$gender' , middle_name='$middleName',NOTIFICATION_PRE='$notify'  WHERE account_id = '$account_id'");

			}
			$result = mysql_query("SELECT staff_id FROM  org_staff WHERE account_id = '$account_id'");
			$row = mysql_fetch_assoc($result);
			$staff_id=$row['staff_id'];
			$_SESSION['staff_id'] =$staff_id;
			mysql_close($con);
			$nextpage='doctorprofile.php?msg=update';
		}else if( $_POST['action']=='Close')
			$nextpage='maind.php';
	}
	header("location:".$nextpage);
	exit;
}
?>