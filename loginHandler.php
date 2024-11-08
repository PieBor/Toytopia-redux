<?PHP
require_once "functions.php";
if (isset($_POST['email'])) {
    echo $_POST['email'];

    $response = loginUser($_POST['email'], $_POST['password']);
    echo $response;
    if ($response == "Success") {
        header('Location: toys.php');
        exit();
    } else {
        $loginFailed = $response;
        header("Location: login.php?error=$response");
    }

}

?>