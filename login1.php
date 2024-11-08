<?php
require_once "functions.php";

$loginFailed = "";

if (isset($_POST['email'])) {
    // $response = loginUser($_POST['email'], $_POST['password']);
    $response = loginUser($_POST['email'], $_POST['password']);

    if ($response == "Success") {
        header('Location: toys.php');
        exit();
    } else
        $loginFailed = $response;

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
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

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
                <div class="row">
                    <div class="col-lg-10">
                        <div class="login_page_logo text-center pt120">
                            <img src="images/" alt="">
                        </div>
                        <div class="login_form inner_page style3 mb50">
                            <form action="#">
                                <div class="heading">
                                    <h3 class="text-center">Login to your account</h3>
                                    <p>
                                        <?php if ($loginFailed != "")
                                            echo $loginFailed; ?>
                                    </p>

                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail3"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="exampleInputPassword4"
                                        placeholder="Password">
                                </div>

                                <div class="form-group custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="exampleCheck3">
                                    <a class="tdu btn-fpswd float-right" href="#">Forgot Password?</a>
                                </div>
                                <button type="submit" class=" btn-log btn-block btn-thm2">Login</button>
                                <p class="text-center">Don't have an account? <a class="text-thm"
                                        href="register.html">Sign Up!</a></p>


                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </section>
        <a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>
    </div>

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