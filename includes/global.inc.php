<link rel="stylesheet" href="../resources/css/common.css" type="text/css"></link>
<script src="../resources/js/jquery.min.js" type="text/javascript"></script>
<script src="../resources/js/jquery.maskedinput.js.js" type="text/javascript"></script>
<script src="../resources/js/script.js" type="text/javascript"></script>



<?php
ob_start();
require_once '../classes/User.class.php';
require_once '../classes/UserTools.class.php';
require_once '../classes/DB.class.php';


//connect to the database
$db = new DB();
$db->connect();

//initialize UserTools object
$userTools = new UserTools();

//start the session
session_start();

//refresh session variables if logged in
if(isset($_SESSION['logged_in'])) {
	$user = unserialize($_SESSION['user']);
	$_SESSION['user'] = serialize($userTools->get($user->id));
}
?>