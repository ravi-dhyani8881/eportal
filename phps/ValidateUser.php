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


    $result = mysql_query("SELECT ACCOUNT_ID ,ACCOUNT_TYPE , PASSWORD FROM  user_account WHERE login_id = '$login'");
   
    
    $count=mysql_num_rows($result);
    
    $account_id = $row['ACCOUNT_ID'];
    $account_type = $row['ACCOUNT_TYPE'];
    $user_password= $row['PASSWORD'];
    
     echo ($count);
    
    if ($count==1) {

        while ($row = mysql_fetch_array($result)) {
            
            
            
            
            
        }
    } else {
        
        header("Location:../phps/login.php?error=invalid"); 
        
    }
    
}
?>
