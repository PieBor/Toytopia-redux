<?php
require_once "functions.php";
automatedLogout();
if (isset($_SESSION['email'])) {
    $connection = connect();
    $email = $_SESSION['email'];
    $name = null;
    $lastName = null;
    $DOB = null;
    $houseNo = null;
    $street = null;
    $city = null;
    $mobile = null;
    $country = null;

    if ($connection == false) {
        die("Cannot connect to the database");
    }

    $sql = "SELECT * FROM user WHERE Email='" . $email . "'";

    $userResults = queryDatabase($connection, $sql);

    $sql = "SELECT * FROM toy WHERE Email='" . $email . "'";
    $toyResults = queryDatabase($connection, $sql);

    foreach ($userResults as $row) {
        //echo "User: " . $key . ": " . $value;
        // print_r($row);
        $name = $row['FirstName'];
        $lastName = $row['LastName'];
        $DOB = $row['DateOfBirth'];
        $houseNo = $row['HouseNumberOrName'];
        $street = $row['StreetName'];
        $city = $row['City'];
        $mobile = $row['MobileNumber'];
        $country = $row['Country'];
    }

    foreach ($toyResults as $row) {
        //echo "Toy: " . $key . ": " . $value;
        //print_r($row);
    }


}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toytopia </title>

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/about.css">

</head>

<body>
    <nav>
        <div class="container nav__container">
            <a href="index.php"><img src="./images/toylog.png" alt="Logo" width="300" height="300"></a>
            <ul class="nav__menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="toys.php">Toys</a></li>
                <?php createAccountButton(); ?>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>

            <div id="login-btn">
                <a href="login.php"><button class="btn">Login/Register</button></a>
                <?php
                createLoginOrLogoutButton();
                ?>
                <i class="far fa-user"></i>
            </div>
        </div>
    </nav>
    <!--END OF NAVBAR-->


    <section class="toys">
        <h2>My Account </h2>
        <div class="container toys__containers">
            <div class="form-group">
                <label for="name">Name:</label>
                <span id="name">
                    <?php echo $name ?>
                </span>
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <span id="surname">
                    <?php echo $lastName ?>
                </span>
            </div>
            <div class="form-group">
                <label for="mobile">Mobile Number:</label>
                <span id="mobile">
                    <?php echo $mobile ?>
                </span>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <span id="email">
                    <?php echo $email ?>
                </span>
            </div>
            <div class="form-group">
                <label for="houseNo">House Name/No:</label>
                <span id="houseNo">
                    <?php echo $houseNo ?>
                </span>
            </div>
            <div class="form-group">
                <label for="street">Street Name:</label>
                <span id="street">
                    <?php echo $street ?>
                </span>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <span id="city">
                    <?php echo $city ?>
                </span>
            </div>
            <div class="form-group">
                <label for="country">Country:</label>
                <span id="country">
                    <?php echo $country ?>
                </span>
            </div>



            <button type="submit" class="btn" hidden>Close Account</button>
            <button type="submit" class="btn" hidden>Update Details</button>
            <a href="upload.php"><button type="submit" class="btn">Upload</button></a>
        </div>
    </section>
    <!--END OF ACCOUNT-->

    <section class="toys">
        <h2>Uploads </h2>
        <div class="container toys__container">
            <?php
            //$sql="SELECT * FROM toy WHERE Email='".$email."';";
            populateToys($sql, ToyMode::AccountPage);

            ?>
            <article class="toy">
                <div class="toy__image">
                    <img src="./images/piq8y7p4T-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Dolls </h4>
                    <p>Lorem ipsum hdjfbfjd ahhsjsj</p>
                    <a href="#" class="btnn"> Delete</a><br>
                    <a href="#" class="btnn"> Exchanged</a><br>
                    <a href="#" class="btnn"> Update</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/urban_racing_3-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Cars </h4>
                    <p>Lorem ipsum hdjfbfjd ahhsjsj</p>
                    <a href="#" class="btnn"> Delete</a><br>
                    <a href="#" class="btnn"> Exchanged</a><br>
                    <a href="#" class="btnn"> Update</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/rTjdARxTR-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Educational Games </h4>
                    <p>Lorem ipsum hdjfbfjd ahhsjsj</p>
                    <a href="#" class="btnn"> Delete</a><br>
                    <a href="#" class="btnn"> Exchanged</a><br>
                    <a href="#" class="btnn"> Update</a>
                </div>
            </article>
            <article class="toy">
                <div class="toy__image">
                    <img src="./images/rTjdARxTR-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Educational Games </h4>
                    <p>Lorem ipsum hdjfbfjd ahhsjsj</p>
                    <a href="#" class="btnn"> Delete</a><br>
                    <a href="#" class="btnn"> Exchanged</a><br>
                    <a href="#" class="btnn"> Update</a>
                </div>
            </article>
            <article class="toy">
                <div class="toy__image">
                    <img src="./images/rTjdARxTR-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Educational Games </h4>
                    <p>Lorem ipsum hdjfbfjd ahhsjsj</p>
                    <a href="#" class="btnn"> Delete</a><br>
                    <a href="#" class="btnn"> Exchanged</a><br>
                    <a href="#" class="btnn"> Update</a>
                </div>
            </article>
            <article class="toy">
                <div class="toy__image">
                    <img src="./images/rTjdARxTR-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Educational Games </h4>
                    <p>Lorem ipsum hdjfbfjd ahhsjsj</p>
                    <a href="#" class="btnn"> Delete</a><br>
                    <a href="#" class="btnn"> Exchanged</a><br>
                    <a href="#" class="btnn"> Update</a>
                </div>
            </article>
        </div>
    </section>








    <footer>
        <div class="container footer__container">
            <div class="footer__1">
                <a href="index.html" class="footer__logo">
                    <h4>T O Y T O P I A</h4>
                </a>
                <p>
                    Toytopia is a platform designed to facilitate the exchange or donation of toys.
                </p>
            </div>

            <div class="footer__2">
                <h4>Links</h4>
                <ul class="permalinks">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="toys.html">Toys</a></li>
                </ul>
            </div>

            <div class="footer__3">
                <h4>Legal</h4>
                <ul class="privacy">
                    <li><a href="privacy.html">Privacy Policy</a></li>
                    <li><a href="terms.html">Terms and Conditions</a></li>
                    <li><a href="faqs.html">FAQs</a></li>
                </ul>
            </div>

            <div class="footer__4">
                <h4>Contact Us</h4>
                <div>
                    <p>+356 77 000 000</p>
                    <p>info@toytopia.com</p>
                </div>

                <ul class="footer__socials">
                    <li>
                        <a href="#"><i class="uil uil-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-instagram-alt"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="uil uil-linkedin-alt"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="footer__copyright">
            <small>Copyright &copy; T O Y T O P I A</small>
        </div>
    </footer>
    <!--END OF FOOTER-->













    <script src="./main.js"></script>
</body>

</html>