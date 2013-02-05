<?php

require_once '../includes/global.inc.php';
include( "../includes/connection.php");

if (isset($_POST['action'])) {

    if (isset($_REQUEST["password"])) {
        $password = $_REQUEST["password"];
    }

    if (isset($_REQUEST["login_id"])) {
        $login = $_REQUEST["login_id"];
    }

    $con = mysql_connect($_SESSION['databaseURL'], $_SESSION['databaseUName'], $_SESSION['databasePWord']);
    if (!$con) {
        die('Could not connect: ' . mysql_error());
    }
    mysql_select_db($_SESSION['databaseName'], $con);


    $result = mysql_query("SELECT ACCOUNT_ID ,ACCOUNT_TYPE , PASSWORD , login_id FROM  user_account WHERE login_id = '$login'");


    $count = mysql_num_rows($result);

    $account_id = $row['ACCOUNT_ID'];
    $account_type = $row['ACCOUNT_TYPE'];
    $user_password = $row['PASSWORD'];
    $user_login_id = $row['login_id'];

    echo ($count);

    if ($count == 1) {
        while ($row = mysql_fetch_array($result)) {
            if ($login == $user_login_id && md5($password) == $user_password) {

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
            } else {

                header("Location:../phps/login.php?error=invalid");
            }
        }
    } else {

        header("Location:../phps/login.php?error=invalid");
    }
}
?>
