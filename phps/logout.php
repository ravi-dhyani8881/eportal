<?php

 session_start();
session_destroy();
$nextpage = 'login.php';
header("location:".$nextpage);
exit;
?>
