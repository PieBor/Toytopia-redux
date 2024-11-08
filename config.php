<?php
//Sets time for timeout
$lifetime = 600;
ini_set('session.gc_maxlifetime', $lifetime);
session_set_cookie_params($lifetime);

session_start();
$_SESSION['last_activity'] = time();
/* // Update last activity time
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > $lifetime)) {
// Session expired, redirect to login page
header('Location: login.php');
exit;
} */





//Sets the values of the database
define('SERVER', 'localhost');
define('USERNAME', 'user1');
define('PASSWORD', 'password');
define('DATABASE', 'toytopia');