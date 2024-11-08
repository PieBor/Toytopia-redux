<?php
require_once "config.php";

$maxPasswordLength = 50;
$maxUsernameLength = 50;
$maxEmailLength = 50;
$maxCityLength = 50;
$maxMobileLength = 20;
$maxhouseNumberOrNameLength = 50;
$maxstreetNameLength = 50;
$maxToyDescriptionLength = 50;
$maxToyNameLength = 50;
$maxToyStatusLength = 50;

abstract class ToyMode
{
    const ToyPage = 'ToyPage';
    const AccountPage = 'AccountPage';
}


function automatedLogout()
{
    /*   //Sets time for timeout
    
    ini_set('session.gc_maxlifetime', $lifetime);
    session_set_cookie_params($lifetime);
    session_start(); */
    $lifetime = 600;


    if (checkIfLoggedIn() == "Logged in" && ($_SESSION['last_activity'] - time()) > $lifetime) {
        //subtract new timestamp from the old one
        echo "<script>alert('15 Minutes over!');</script>";
        logOutUser();
        exit;
    } else {
        $_SESSION['last_activity'] = time(); //set new timestamp
    }
}
/**
 * Connects to the database and returns the connection mysqli if successful
 * or false if it is not successful
 */
function connect()
{
    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
    if ($mysqli->connect_errno != 0) {
        echo "Error connecting to database";
        return false;
    } else
        return $mysqli;
}

/**
 * Needs the database connection and the sql query as input. Returns false if there's a problem
 * and returns the results if everything went correctly
 */
function queryDatabase($connection, $sql)
{
    echo "<script>alert('$sql');</script>";
    try {
        if ($connection == false) {
            throw new Exception("Connection failed: " . mysqli_connect_error());
        }

        echo "<script>alert('$sql');</script>";
        $statement = mysqli_query($connection, $sql);
        if ($statement == false) {
            die(mysqli_error($connection));
        }
        $results = mysqli_fetch_all($statement, MYSQLI_ASSOC);
        return $results;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    } catch (Throwable $t) {
        echo "Error: " . $t->getMessage();
        return false;
    }

}



function hashPassword($password, $salt)
{
    return hash("sha256", $password . $salt);
    //return $password;
}

/**
 * registers a user when $email,$name,$surname,$DOB, $houseNumberOrName, $streetName, $city,$country,
 *$mobile,$password,$confirm_password are passed in. Returns "Success" if everything worked correctly
 */
function registerUser(
    $email,
    $name,
    $surname,
    $DOB,
    $houseNumberOrName,
    $streetName,
    $city,
    $country,
    $mobile,
    $password,
    $confirm_password
) {
    global $maxEmailLength, $maxPasswordLength, $maxUsernameLength, $maxCityLength,
    $maxMobileLength, $maxhouseNumberOrNameLength, $maxstreetNameLength;

    $mysqli = connect();

    if ($mysqli == false) {
        return "Error in connecting to the database";
    }

    $email = validateEmail($email, $maxEmailLength);
    $mobile = validateMobile($mobile, $maxMobileLength);
    $city = validateText($city, $maxCityLength);
    $houseNumberOrName = validateText($houseNumberOrName, $maxhouseNumberOrNameLength);
    $streetName = validateText($streetName, $maxstreetNameLength);
    $DOB = validateDate($DOB);
    $password = validatePassword($password);
    $confirm_password = validatePassword($confirm_password);

    //Check the message, if success keep the value otherwise return an error
    if ($email[1] == "Success") {
        $email = $email[0];
    } else
        return $email[1];

    if ($city[1] == "Success") {
        $city = $city[0];
    } else
        return $city[1];

    if ($houseNumberOrName[1] == "Success") {
        $houseNumberOrName = $houseNumberOrName[0];
    } else
        return $houseNumberOrName[1];

    if ($streetName[1] == "Success") {
        $streetName = $streetName[0];
    } else
        return $streetName[1];

    if ($mobile[1] == "Success") {
        $mobile = $mobile[0];
    } else
        return $mobile[1];

    if ($DOB[1] == "Success") {
        $DOB = $DOB[0];
    } else
        return $DOB[1];

    if ($password[1] == "Success") {
        $password = $password[0];
    } else
        return $password[1];

    if ($confirm_password[1] == "Success") {
        $confirm_password = $confirm_password[0];
    } else
        return $confirm_password[1];

    $name = trim($name);
    $surname = trim($surname);


    $name = htmlspecialchars($name);
    $surname = htmlspecialchars($surname);

    if (strlen($name) > $maxUsernameLength) {
        return "name is too long.";
    }

    if (strlen($surname) > $maxUsernameLength) {
        return "surname is too long.";
    }

    if ($password != $confirm_password) {
        return "Passwords don't match";
    }

    if (empty($email) || empty($name) || empty($surname) || empty($password) || empty($confirm_password)) {
        return "All fields are required";
    }

    if (!filter_var($name, FILTER_SANITIZE_STRING)) {
        return "Invalid name";
    }

    if (!filter_var($surname, FILTER_SANITIZE_STRING)) {
        return "Invalid surname";
    }



    //Check if email exists if(email in database) return error if already exists
    $sql = "SELECT * FROM USER WHERE email='" . $email . "'";

    $emailResults = queryDatabase($mysqli, $sql);

    if (is_string($emailResults)) {
        return $emailResults;
    }

    if (count($emailResults) > 0) {
        mysqli_close($mysqli);
        return "Email already exists in the database";
    }

    //Creating a salt by making random bytes and encoding them into a string 
    $bytes = random_bytes(32);
    $salt = base64_encode($bytes);

    $hashedPassword = hashPassword($password, $salt);

    //sql insert user into database, if everything goes well return success

    $sql = "INSERT INTO User (Email, FirstName, LastName, DateOfBirth, HouseNumberOrName, StreetName,
     City, Country, MobileNumber, PasswordHash, Salt) VALUES
    ('$email','$name','$surname','$DOB', '$houseNumberOrName', '$streetName', '$city', '$country',
     '$mobile', '$hashedPassword','$salt')";

    queryDatabase($mysqli, $sql);

    /*   //Send the new password to the user via email
    $to = $email;
    $subject = "Your new password";
    $message = "Your new password is: $password";
    $headers = "From: example@example.com";
    if (mail($to, $subject, $message, $headers)) {
    echo "A new password has been sent to your email address.";
    } else {
    echo "Unable to send new password.";
    } */

    mysqli_close($mysqli);
    return "Success";

}

/**
 * registers a toy in the database when $toyName,$toyImage,$category,$toyDescription,$email,
 *  $ageRange,$toyStatus,$today,$toyCondition, $brand are passed in. Returns "Success" if everything
 * was completed successfully.
 */
function registerToy(
    $toyName,
    $toyImage,
    $category,
    $toyDescription,
    $email,
    $ageRange,
    $toyStatus,
    $toyCondition,
    $brand
) {
    global $maxEmailLength, $maxToyDescriptionLength, $maxToyNameLength, $maxToyStatusLength;

    $today = date('d-m-Y');
    $toyDescription = validateText($toyDescription, $maxToyDescriptionLength);
    $email = validateEmail($email, $maxEmailLength);
    $toyStatus = validateText($toyStatus, $maxToyStatusLength);

    //Check the message, if success keep the value otherwise return an error
    if ($toyDescription[1] == "Success") {
        $toyDescription = $toyDescription[0];
    } else
        return $toyDescription[1];

    if ($email[1] == "Success") {
        $email = $email[0];
    } else
        return $email[1];

    if ($toyStatus[1] == "Success") {
        $toyStatus = $toyStatus[0];
    } else
        return $toyStatus[1];

    if (
        empty($ageRange) || empty($category) || empty($toyDescription) || empty($toyStatus)
        || empty($brand) || empty($toyCondition) || /*empty($toyImage) ||*/empty($toyName) || empty($email)
    ) {
        return "All fields are required";
    }

    $mysqli = connect();

    if ($mysqli == false) {
        return "Error in connecting to the database";
    }

    //Check if email exists if(email in database) return error if it doesn't already exists
    $sql = "SELECT * FROM USER WHERE email='" . $email . "'";
    $emailResults = queryDatabase($mysqli, $sql);

    if (is_string($emailResults)) {
        return $emailResults;
    }

    if (count($emailResults) != 1) {
        mysqli_close($mysqli);
        return "Email doesn't exist in the database";
    }

    //sql insert toy into database, if everything goes well return success

    $sql = "INSERT INTO Toy (ToyName, ToyImage, CategoryID, Description, Email, AgeRangeID,
    Status, DateAddedToCollection, ToyConditionID, ToyBrandID)
   VALUES('$toyName','$toyImage','$category','$toyDescription','$email', '$ageRange','$toyStatus','$today',
    '$toyCondition', '$brand');";
    $result = queryDatabase($mysqli, $sql);

    mysqli_close($mysqli);
    if ($result != false) {
        return "Success";
    } else
        return "Error";

}



/**
 * logs in the user and returns "Success" if everything went well. Returns an error if the email or password
 * entered are too long, invalid,email is not in the database or the email and password don't match
 */
function loginUser($email, $password)
{
    global $maxUsernameLength, $maxPasswordLength, $maxEmailLength;

    $salt = null;
    $email = trim($email);
    $password = trim($password);
    $functionName = "loginUser";

    $email = htmlspecialchars($email);
    $password = htmlspecialchars($password);

    if (strlen($email) > $maxEmailLength) {
        return "Username is too long";
    }

    if (strlen($password) > $maxPasswordLength) {
        return "Password is too long";
    }

    if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
        return "Invalid email";
    }

    if (!filter_var($password, FILTER_SANITIZE_STRING)) {
        return "Invalid password";
    }

    $mysqli = connect();

    if ($mysqli == false) {

        error_log($functionName . "Error in connecting to the database", 3, "/log.txt");
        return "Error in connecting to the database";

    }

    //Query database for username  if not found return error else store
    $databaseEmail = "email";
    $databasehashedPassword = "passwordhash";
    $sql = "SELECT * FROM USER WHERE email='" . $email . "'";
    $userQuery = queryDatabase($mysqli, $sql);

    if (is_string($userQuery)) {
        return $userQuery;
    }
    $noOfResults = count($userQuery);

    if ($noOfResults != 1) {
        mysqli_close($mysqli);
        return "Email not found";
    } else {

        $databaseEmail = $userQuery[0]['Email'];
        $databasehashedPassword = $userQuery[0]['PasswordHash'];
        echo "Database hashed password: $databasehashedPassword.\n";
        $salt = $userQuery[0]['Salt']; //$user['SALT'];
    }

    mysqli_close($mysqli);

    $hashedInputPassword = hashPassword($password, $salt);
    echo "Hashed input password: $hashedInputPassword.\n";

    if ($email == $databaseEmail && $hashedInputPassword == $databasehashedPassword) {
        //Store session data
        $_SESSION['email'] = $email;

        return "Success";
    } else {
        return 'Invalid email or password. ';
    }
}


/**
 * Destroys the session data and redirects to the login page.
 *  Has an optional parameter for where to redirect
 */
function logOutUser($redirection = "login.php")
{
    echo "<script>alert('Signing out!');</script>";


    //Unsets the session,destroys the session and redirects to the login page
    $_SESSION = array();

    session_destroy();

    header("Location: $redirection");
    exit();
}

function createSignInButton()
{
    echo "<a href='login.php'><button class='btn'/>Login</button></a>";

}
function createSignOutButton()
{
    echo "<form action='logout.php' method='post' onsubmit=\"return confirm('Are you sure you want to log out?')\">
    <input type='hidden' name='action' value='logout'>
    <button type='submit' class='btn'>Log out</button>
    </form>";
}



function createLoginOrLogoutButton()
{
    if (checkIfLoggedIn() == "Logged in") {
        createSignOutButton();
    } else
        createSignInButton();
}



/**
 * Creates an account page button if logged in otherwise does nothing
 */
function createAccountButton()
{
    if (checkIfLoggedIn() == "Logged in") {
        echo "<li><a href='account.php'>Account</a></li>";
    }
}
function passwordReset($email)
{
    // Generate a new password
    $newPassword = bin2hex(random_bytes(10));

    // Hash the new password with a new salt
    $salt = bin2hex(random_bytes(50));
    $newPasswordHash = hash('sha256', $newPassword . $salt);


    // Update the user's password in the database
    $conn = mysqli_connect("localhost", "username", "password", "database_name");
    $query = "UPDATE User SET PasswordHash='$newPasswordHash', Salt='$salt' WHERE Email='$email'";
    mysqli_query($conn, $query);
    mysqli_close($conn);
    // Return the new password
    return $newPassword;
}


function deleteUser($email)
{
    $conn = connect();
    $query = "DELETE FROM User WHERE Email='$email'";
    queryDatabase($conn, $query);
    mysqli_close($conn);
}

/**Updates the passwordhash in the database. Returns Success or an error string */
function changePassword($email, $newPassword)
{
    global $maxEmailLength;
    $email = validateEmail($email, $maxEmailLength);
    $newPassword = validatePassword($newPassword);
    if ($email[1] == "Success") {
        $email = $email[0];
    } else
        return "Invalid email.";

    if ($newPassword[1] == "Success") {
        $newPassword = $newPassword[0];
    } else
        return "Invalid email.";

    $connection = connect();
    $sql = "SELECT Salt FROM user WHERE Email='$email';";
    $salt = null;
    $saltResult = queryDatabase($connection, $sql);

    if ($saltResult != false && count($saltResult) == 1) {
        $salt = $saltResult[0]['Salt'];
    } else
        return "Could not retrive salt";
    echo "Salt is $salt";
    $hashedPassword = hashPassword($newPassword, $salt);
    $sql = "UPDATE `user` 
    SET `PasswordHash` = '$hashedPassword' 
    WHERE `user`.`Email` = '$email';";

    $updateResult = queryDatabase($connection, $sql);
    if ($updateResult == false) {
        return "Error in updating the password";
    } else
        return "Success";
}


//Creates the tags for a toy with the information supplied
function createToyHtml($toyName, $toyDescription, $imageSrc, $toyMode = ToyMode::ToyPage)
{
    $url = 'toys.html';

    if ($toyMode == ToyMode::ToyPage) {
        echo '<article class="toy">';
        echo '<div class="toy__image">';
        echo '<img src="' . $imageSrc . '" alt="' . $toyName . '" style="width: 100%; height: 300px; display: block; margin: 0 auto;">';
        echo '</div>';
        echo '<div class="toy__info">';
        echo '<h4>' . $toyName . '</h4>';
        echo '<p>' . $toyDescription . '</p>';
        echo '<form action="view.php" method="post">';
        echo '<input type="hidden" class="form-control" name="toyName" value=' . $toyName . '>';
        echo '<input type="hidden" class="form-control" name="toyDescription" value=' . $toyDescription . '>';
        echo '</div>';
        echo '<button href="view.php" type="submit" class="btn">LEARN MORE</button>';
        echo '</form>';
        echo '</div>';
        echo '</article>';
    }

    if ($toyMode == ToyMode::AccountPage) {

        echo '<article class="toy">';
        echo '<div class="toy__image">';
        echo '<img src="' . $imageSrc . '" alt="Example" style="width: 100%; height: 300px; display: block; margin: 0 auto;">';
        echo '</div>';
        echo '<div class="toy__info">';
        echo '<h4>' . $toyName . '</h4>';
        echo '<p>' . $toyDescription . '</p>';
        echo '<a href="#" class="btnn" onclick="myFunction()"> Delete</a><br>';
        echo '<a href="#" class="btnn"> Exchanged</a><br>';
        echo '</div>';
        echo '</article>';


    }

    echo '<article class="toy">';
    echo '<div class="toy__image">';
    echo '<img src="' . $imageSrc . '" alt="' . $toyName . '" style="width: 100%; height: 300px; display: block; margin: 0 auto;">';
    echo '</div>';
    echo '<div class="toy__info">';
    echo '<h4>' . $toyName . '</h4>';
    echo '<p>' . $toyDescription . '</p>';
    echo '<form action="view.php" method="post">';
    echo '<input type="hidden" class="form-control" name="toyName" value=' . $toyName . '>';
    echo '<input type="hidden" class="form-control" name="toyDescription" value=' . $toyDescription . '>';
    echo '</div>';
    echo '<button href="view.php" type="submit" class="btn">LEARN MORE</button>';
    echo '</form>';
    echo '</div>';
    echo '</article>';

}

/**Creates many toys,has an optional parameter that accepts ToyMode input depending on 
 * where the toys will be created */
function populateToys($sql, $toyMode = ToyMode::ToyPage)
{
    $mysqli = connect();
    $results = queryDatabase($mysqli, $sql);

    if (is_string($results)) {
        return $results;
    }

    foreach ($results as $result) {
        createToyHtml($result['ToyName'], $result['Description'], $result['ToyImage'], $toyMode);
    }
    mysqli_close($mysqli);
}

function validateText($text, $length)
{
    $text = trim($text);

    $text = htmlspecialchars($text);

    if (strlen($text) > $length) {
        return array(null, "Text is too long");
    }

    if (!filter_var($text, FILTER_SANITIZE_STRING)) {
        return array(null, "Invalid text.");
    } else
        return array($text, "Success");
}

function validatePassword($password)
{

    global $maxPasswordLength;

    $password = validateText($password, $maxPasswordLength);

    if ($password[1] == "Success") {
        $password = $password[0];
    }

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if ($uppercase && $lowercase && $number) {
        return array($password, "Success");
    } else {
        return array(null, "Password needs to have at least 1 uppercase,1 lowercase and one number");
    }
}

function validateEmail($email, $length)
{
    $email = trim($email);

    $email = htmlspecialchars($email);

    if (strlen($email) > $length) {
        return array(null, "Email is too long");
    }

    if (!filter_var($email, FILTER_SANITIZE_EMAIL)) {
        return array(null, "Invalid email");
    } else
        return array($email, "Success");
}
function validateDate($inputDate)
{

    $format = 'Y-m-d';

    $date = DateTime::createFromFormat($format, $inputDate);

    if (($date != false) && ($date->format($format) === $inputDate)) {
        return array($inputDate, "Success");
    } else {
        return array(null, "Invalid Date entered");
    }
}

function validateMobile($mobile, $length)
{
    $regex = '/^[6-9]\d{7}$/';
    $mobile = trim($mobile);

    $mobile = htmlspecialchars($mobile);

    if (strlen($mobile) > $length) {
        return array(null, "Mobile number is too long");
    }


    if (!preg_match($regex, $mobile)) {
        return array(null, "Invalid Mobile number.");
    } else {
        return array($mobile, "Success");
    }
}

/**
 * Returns "Logged in" or "Not logged in" accordingly
 */
function checkIfLoggedIn()
{
    if (isset($_SESSION['email']) == true) {
        return "Logged in";
    } else
        return "Not logged in";
}
/* function sendgrid($email,$new_password)
{
global $apiKey;
// Send the new password to the user via email using SendGrid
$sendgrid = new \SendGrid($apiKey);
$from = new \SendGrid\Email("Example User", "example@example.com");
$subject = "Your new password";
$to = new \SendGrid\Email("Example User", $email);
$content = new \SendGrid\Content("text/plain", "Your new password is: $new_password");
$mail = new \SendGrid\Mail($from, $subject, $to, $content);
$response = $sendgrid->client->mail()->send()->post($mail);
if ($response->statusCode() == 202) {
echo "A new password has been sent to your email address.";
} else {
echo "Unable to send new password.";
}
} */

/**
 * Convert an image from a form upload to a blob
 */
function convertToBlob($image)
{
    // Check if the image is valid
    if (!isset($image) || !is_uploaded_file($image['tmp_name'])) {
        return null;
    }

    // Open the image file
    $fileHandle = fopen($image['tmp_name'], "r");

    // Read the image data into a binary string
    $imageData = fread($fileHandle, filesize($image['tmp_name']));

    // Close the file handle
    fclose($fileHandle);

    // Return the image data as a blob
    return $imageData;
}

/**Convert from blob to an image */
function convertBlobToImage($blob)
{
    $imageData = base64_encode($blob);
    $src = 'data: ' . mime_content_type($blob) . ';base64,' . $imageData;
    return $src;
}