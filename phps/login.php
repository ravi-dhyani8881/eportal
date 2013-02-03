<?php

require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "headerl.php");
    $dbConf = new DB();
    $_SESSION['databaseURL']=$dbConf->get_db_host();
    $_SESSION['databaseUName']=$dbConf->get_db_user();
    $_SESSION['databasePWord']=$dbConf->get_db_pass();
    $_SESSION['databaseName']=$dbConf->get_db_name();
    
    ?>
    <tr>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(function() {
    		
            $('#fsubmit').click(function() {
    			
                var username = $('#username').val();
                if (username == ""){ alert("Please Insert Username"); $("#username").css("border","1px solid red"); return false; }
    			
                var password = $('#password').val();
                if (password == ""){ alert("Please Insert Password"); $("#password").css("border","1px solid red"); return false; }
            })
    		
        });
    </script>
    <td style="background-color:white;height:600px;width:1200px;text-align:top;">
        <table style="  display: block; left: 37%;   position: absolute;    top: 30%;    width: 390px;" cellpadding="0" cellspacing="0" >
            <tr>
                <td >
                    <table  style=" float: left;    margin-left: -3px;    width: 104%;">
                        <tr><td >

                                <span class="left-box"></span><span class="cent-box">Login Information</span><span class="right-box"></span>

                            </td></tr>
                    </table>
                </td>
            </tr>
            <tr><td style="text-align:left;vertical-align:top" >
                    <table class="main" style="width:100%">

                        <tr><td style="width:10%">
                                <p class="label">
                                    Username:</p></td>
                            <td style="width:40%;">
                                <p style="margin:13px 0 6px 12px;"><input type="text" name="login_id"
                                                                          size="35" maxlength="35" id="username" />
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:10%">
                                <p class="label">
                                    Password:
                                </p>
                            </td>
                            <td style="width:40%">
                                <p style="float:right; margin:0 0 5px;" class="forgot-pass"><a href="#">Forgot Password?</a></p>
                                <p>
                                    <input type="password" name="password"
                                           size="35" maxlength="35" id="password"/>
                                </p>
                            </td>
                        </tr>
                        <!--<tr>
                        <td colspan="4">
                        <p class="bold" id="accept">
                        Accept terms and conditions&nbsp;&nbsp;Yes<input type="radio" name="accept" value="Yes">
                        &nbsp;&nbsp;No<input type="radio" name="accept" value="No"></p>
                        </td>
                        </tr>
                        <tr>-->

                        <td colspan="4" style="width:100%;">
                            <div class="new-reg"><a href="register.php">New Registration</a></div>
                            <div style="   float: left;
                                 margin-bottom: 10px;
                                 margin-left: 15px;">
                                <table style="width:100%;text-align:center;">
                                    <tr>
                                        <td style="width:30%" class="sub-bttn">
                                            <input type="submit" name="action" value="Login" style="background-color: #3a6a8e;border-radius:5px;height: 35px; width: 100px" id="fsubmit"/>

                                        </td>
                                        <td style="width:30%" class="sub-bttn">

                                            <input type="submit" name="action" value="Reset" style="background-color: #3a6a8e;border-radius:5px;height: 35px; width: 100px"/>

                                        </td>
    <?php /* ?><td style="width:40%" class="sub-bttn">

      <p> <input type="submit" name="action" value="Forgot Password" style="background-color:#3a6a8e;border-radius:5px;height: 35px; width: 140px"/>
      </p>
      </td><?php */ ?>
                                    </tr>
                                </table></div>

                        </td></tr>


        </table>
        <!--<div align="center" style="margin-top:10px;"><img src="../resources/logo-form.png" alt="logo" border="0"/></div>-->

    </td></tr></table>
    </td>
    </tr>

    <?php
    include("footer.php");
    ?>
    </table>

    </form>
    </body>
    </html>
    <?php
} else {

    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'Login') {
            $login_id = $_POST['login_id'];
            $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }

            mysql_select_db($_SESSION['databaseName'], $con);
            $result = mysql_query("SELECT account_id, account_type FROM  user_account WHERE login_id = '$login_id'");
            $row = mysql_fetch_assoc($result);
            $account_id = $row['account_id'];
            $account_type = $row['account_type'];
            //echo $account_id;
            //	echo $account_type;
            //$_SESSION['account_id'] =$account_id;
            $nextpage = 'login.php';
            if ($account_type == 'staff') {
                $result = mysql_query("SELECT staff_id FROM  org_staff WHERE account_id = '$account_id'");
                $row = mysql_fetch_assoc($result);
                $staff_id = $row['staff_id'];
                $_SESSION['staff_id'] = $staff_id;
                $_SESSION['staff_account_id'] = $account_id;
                $_SESSION['login_type'] = 'staff';
                $nextpage = 'maind.php';
            } else if ($account_type == 'patient') {
                $result = mysql_query("SELECT patient_id FROM  patient WHERE account_id = '$account_id'");
                $row = mysql_fetch_assoc($result);
                $patient_id = $row['patient_id'];
                $_SESSION['patient_id'] = $patient_id;
                $_SESSION['patient_account_id'] = $account_id;
                $_SESSION['login_type'] = 'patient';
                $nextpage = 'mainp.php';
            } else if ($account_type == 'organization') {
                $_SESSION['org_account_id'] = $account_id;
                $_SESSION['login_type'] = 'organization';
                $nextpage = 'organizationprofile.php';
            }
        } else if ($_POST['action'] == 'Reset')
            $nextpage = 'login.php';
        else if ($_POST['action'] == 'Forgot Password')
            $nextpage = 'login.php';
        mysql_close($con);
    }
    header("location:" . $nextpage);
    exit;
}
?>