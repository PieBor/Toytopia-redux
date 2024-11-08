<?php
require "functions.php";

$submitted = false;
$result = null;

if (validateDate("1-6-2000") == "Success") {
    echo "<script>alert('1-6-2000');</script>";
}

if (validateDate("2000-6-2") == "Success") {
    echo "<script>alert('2000-6-2');</script>";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // When the submit button is clicked, try to register the user and show the result message
    // echo "<script>alert('email: " . $_POST['email'] . ", name: " . $_POST['name'] . ", surname: " . $_POST['surname'] . ", DOB: " . $_POST['DOB'] . ", " .
    //   "houseno: " . $_POST['houseNo'] . ", street: " . $_POST['street'] . ", city: " . $_POST['city'] . ", country: " . $_POST['country'] . ", mobile: " . $_POST['mobile'] . ", " .
    //   "password: " . $_POST['password'] . ", confirm password: " . $_POST['confirm_password'] . "');</script>";

    $result = registerUser(
        $_POST['email'], $_POST['name'], $_POST['surname'], $_POST['DOB'], $_POST['houseNo'], $_POST['street'],
        $_POST['city'], $_POST['country'], $_POST['mobile'], $_POST['password'], $_POST['confirm_password']
    );
    $submitted = true;

}

if ($submitted == true) {
    echo "<script>alert('$result');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Title -->
    <title>Toytopia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <link rel="stylesheet" href="./css/style.css">
    <!-- Favicon -->
    <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="images/favicon.ico" sizes="128x128" rel="shortcut icon" />
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        a {
            color: var(--color-black);
        }

        .text-thm {
            color: var(--color-primary);
            font-weight: 500;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <nav>
        <div class="container nav__container">
            <a href="index.html"><img src="./images/toylog.png" alt="Logo" width="300" height="300"></a>
            <ul class="nav__menu">
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="toys.html">Toys</a></li>
                <li><a href="account.html">Account</a></li>
            </ul>
            <button id="open-menu-btn"><i class="uil uil-bars"></i></button>
            <button id="close-menu-btn"><i class="uil uil-multiply"></i></button>

            <div id="login-btn">
                <a href="login.html"><button class="btn">Login/Register</button></a>
                <i class="far fa-user"></i>
            </div>
        </div>
    </nav>
    <!--End of navbar-->
    <div class="wrapper">
        <div class="preloader"></div>
        <!-- Our LogIn Register -->
        <section class="our-log style3">
            <div class="container-fluid">
                <div class="col-lg-10">
                    <div class="login_page_logo text-center pt120">
                        <img src="images/" alt="">
                    </div>
                    <div class="login_form inner_page style3 mb50">
                        <form action="register.php" method="post">
                            <div class="heading">
                                <h3 class="text-center">Create an account</h3>
                                <p class="text-center">Already have an account? <a class="text-thm"
                                        href="login.html">Sign In!</a></p>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="surname" placeholder="Surname" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="DOB" placeholder="Date of birth" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" placeholder="Email Address"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="houseNo" placeholder="House No" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="street" placeholder="Street" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="city" placeholder="City" required>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="mobile" placeholder="Mobile Number"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="country" placeholder="Country" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="confirm_password"
                                    placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="exampleCheck2" required>
                                <label class="custom-control-label" for="exampleCheck2"><a href="terms.html">Accept
                                        Terms and Condition</a></label>
                            </div>
                            <div class="form-group custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="exampleCheck3" required>
                                <label class="custom-control-label" for="exampleCheck3"><a href="privacy.html">Accept
                                        Cookie/Privacy Notice</a></label>
                            </div>
                            <button type="submit" class="btn-log btn-block btn-thm2" name="submit">Register</button>

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>
    </div>
    <!-- Wrapper End -->


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