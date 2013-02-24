<?php

require_once '../classes/DB.class.php';

$dbConf = new DB();
$con = mysql_connect($dbConf->get_db_host(), $dbConf->get_db_user(), $dbConf->get_db_pass());
if (!$con) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbConf->get_db_name(), $con);
$id = $_REQUEST['email'];
$method = $_REQUEST['method'];



if($method=='checkmail'){
       $quer = mysql_query("select * from org_staff where EMAIL_ADDRESS = '$id'");
$cc = mysql_num_rows($quer);
echo $cc;
}  elseif($method=='checkmailPatient') {    
     $quer = mysql_query("select * from patient where EMAIL_ADDRESS = '$id'");
$cc = mysql_num_rows($quer);
    echo $cc;
}else {
      echo 'done';    
}


?>
