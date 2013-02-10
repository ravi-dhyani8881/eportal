<?php
require_once '../includes/global.inc.php';
if (!isset($_POST['action'])) { // if page is not submitted to itself echo the form
    include( "header.php");
    ?>
    <tr>
        <td style="background-color:white;height:600px;width:300px;vertical-align:middle;">
            <?php
            include( "navigationd.php");
            $doctor_account_id = $_SESSION['staff_account_id'];
            $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
            if (!$con) {
                die('Could not connect: ' . mysql_error());
            }
            mysql_select_db($_SESSION['databaseName'], $con);

            $result = mysql_query("select referral_id,staff_id,patient_id, rfrd_staff_id from  dr_patient_refrl where staff_id='$doctor_account_id'");

            $row = mysql_fetch_assoc($result);

            $staff_id = $row['staff_id'];

            $patient_id = $row['patient_id'];

            $rfrd_staff_id = $row['rfrd_staff_id'];
            ?>

        </td>

        <td style="background-color:white;height:600px;width:900px;text-align:top;">

            <table style="margin:40px;width:800px;position: absolute;
                   top: 30px;" cellpadding="0px" cellspacing="0px;" >

                <tr><td>



                        <table class="header" style="width:100%">

                            <tr><td >



                                    Patient Referral



                                </td></tr>

                        </table>

                    </td>

                </tr>

                <tr><td>



                        <table class="main" style="width:100%">



                            <tr>

                                <td style="width:20%">

                                    <p class="bold">

                                        Referral Type:</p> </td><td colspan="3" style="width:80%">Practice&nbsp;&nbsp;&nbsp;<input type="radio" name="type" value="practice">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physician<input type="radio" name="type" value="physician">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Dentist<input type="radio" name="type" value="dentist">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hospital<input type="radio" name="type" value="hospital">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nurse<input type="radio" name="type" value="nurse">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Administrator<input type="radio" name="type" value="administrator">

                                </td>

                            </tr>



                            <tr>

                                <td style="width:20%">

                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                </td>

                                <td colspan="3" style="width:80%">

                                    Laboratory<input type="radio" name="type" value="laboratory">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Radiology<input type="radio" name="type" value="radiology">

                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Other: <input type="text" name="other"

                                                                                      size="50" maxlength="50"/>

                                </td>

                            </tr>



                            <tr>

                                <td  style="width:20%">

                                    <p class="bold">

                                        Select Doctor to refer to:

                                    </p> </td>

                                <td colspan="3" style="width:80%">

                                    Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                    <select name="doctorname">

                                        <!--
                                        
                                        <option value="John Doe">John Smith</option>
                                        
                                        <option value="Jane Doe">Jane Smith</option>
                                        
                                        -->

    <?php
    echo $db->getDoctorsList($doctor_account_id, $rfrd_staff_id);
    ?>

                                    </select>

                                </td>

                            </tr>



                            <tr>

                                <td style="width:20%">

                                    &nbsp;&nbsp;&nbsp;&nbsp;

                                </td>

                                <td colspan="3" style="width:80%">

                                    Specialty:

                                    <select name="specialties">

                                        <!--  option value="orthopedic">Orthopedic</option>
                                        
                                        <option value="pediatrics">Pediatrics</option>
                                        
                                        <option value="opthomology">Opthomology</option>
                                        
                                        -->

    <?php
    echo $db->getList('rf_spclty_type', 'spclty_type_cd', 'description', '9');
    ?>

                                    </select>

                                </td>

                            </tr>



                            <tr>

                                <td  style="width:20%">

                                    <p class="bold">

                                        Location:</p> </td>

                                <td colspan="3" style="width:80%">

                                    City:&nbsp;

                                    <!--
                                    
                                    <select name="city">
                                    
                                    <option value="boyds">Boyds</option>
                                    
                                    <option value="germantown">Germantown</option>
                                    
                                    <option value="baltimore">Baltimore</option></select>
                                    
                                    -->

                                    <input type="text" name="city" size="25" maxlength="25" value=""/>

                                </td>

                            </tr>

                            <tr>

                                <td  style="width:20%">

                                    &nbsp;&nbsp;&nbsp;&nbsp; </td>

                                <td colspan="3"style="width:80%">

                                    State&nbsp;

                                    <select name="state">

                                        <!--
                                        
                                        <option value="md">MD</option>
                                        
                                        <option value="va">VA</option>
                                        
                                        <option value="wv">WV</option>
                                        
                                        -->



    <?php
    echo $db->getList('rf_state', 'state_cd', 'state_descr', '');
    ?>

                                    </select>

                                </td>

                            </tr>





                            <tr>

                                <td  style="width:20%">

                                    <p class="bold">

                                        Select Patient:</p> </td>

                                <td colspan="3" style="width:80%">

                                    Name:&nbsp;

                                    <select name="patientname">

                                        <!--
                                       
                                       <option value="John Doe">Rick Williams</option>
                                       
                                       <option value="Jane Doe">James Williams</option>
                                       
                                        -->

    <?php
    echo $db->getPatientsList($doctor_account_id, $patient_id);
    ?>

                                    </select>

                                </td>

                            </tr>



                            <tr>



                                <td colspan="4" style="width:100%;">

                                    <table style="width:40%;" align="center"><tr>

                                            <td style="width:50%;">



                                                <p> <input type="submit" name="action" value="Next" style="background-color: #4682B4;border-radius:5px;height: 35px; width: 100px"/>

                                                </p>

                                            </td>

                                            <td style="width:50%;">

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
    mysql_close($con);
} else {



    if (isset($_POST['action'])) {

        $doctor_account_id = $_SESSION['staff_account_id'];
        $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
        if (!$con) {

            die('Could not connect: ' . mysql_error());
        }



        mysql_select_db($_SESSION['databaseName'], $con);

        $result = mysql_query("SELECT staff_id FROM  org_staff WHERE account_id = '$doctor_account_id'");

        $row = mysql_fetch_assoc($result);

        $staff_id = $row['staff_id'];

        if ($_POST['action'] == 'Next') {

            $referral_type = $_POST['type'];

            $refer_to = $_POST['doctorname'];

            $patient = $_POST['patientname'];





            mysql_query("INSERT INTO dr_patient_refrl (referral_id,staff_id,patient_id, rfrd_staff_id)

					VALUES (0,'$staff_id','$patient','$refer_to')");



            $result = mysql_query("SELECT max(referral_id) FROM  dr_patient_refrl WHERE staff_id = '$staff_id'");

            $row = mysql_fetch_assoc($result);

            $last_referral_id = $row['max(referral_id)'];

            $_SESSION['last_referral_id'] = $last_referral_id;

            mysql_close($con);

            $nextpage = 'newreferralpage2a.php';
        } else if ($_POST['action'] == 'Cancel')
            $nextpage = 'maind.php';
    }

    header("location:" . $nextpage);

    exit;
}
?>