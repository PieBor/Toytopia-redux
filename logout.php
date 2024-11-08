<?php
require_once "functions.php";

if (isset($_POST['action']) && $_POST['action'] === 'logout') {
    // destroy session and redirect to login page
    logOutUser();

}

?>