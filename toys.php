<?php
require_once "functions.php";
automatedLogout();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // process form data

    // redirect to target page
    header('Location: view.php');
    exit();
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <link rel="stylesheet" href="./css/style.css">
    <style>
        .courses {
            margin-top: 1rem;
        }
    </style>
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
                <?php
                createLoginOrLogoutButton();
                ?>
                <i class="far fa-user"></i>
            </div>
        </div>
    </nav>
    <!--END OF NAVBAR-->


    <section class="toys">
        <h2>Our Featured Categories </h2>
        <div class="container toys__container">
            <article class="toy">
                <div class="toy__image">
                    <img src="./images/piq8y7p4T-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Dolls </h4>
                    <p></p>
                    <a href="toy_category.php?category=Dolls" class="btn"> EXPLORE MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/urban_racing_3-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Cars </h4>
                    <p></p>
                    <a href="toy_category.php?category=Cars" class="btn"> EXPLORE MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/rTjdARxTR-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Educational Games </h4>
                    <p></p>
                    <a href="toy_category.php?category=Educational Games" class="btn"> EXPLORE MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/76irpyycK-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Pretend Play </h4>
                    <p></p>
                    <a href="toy_category.php?category=Pretend Play" class="btn"> EXPLORE MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/di9K7Gri7-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Puzzles </h4>
                    <p></p>
                    <a href="toy_category.php?category=Puzzles" class="btn"> EXPLORE MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/k8ixbrecp-removebg-preview.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Others </h4>
                    <p></p>
                    <a href="toy_category.php?category=Others" class="btn"> EXPLORE MORE</a>
                </div>
            </article>
        </div>
    </section>
    <!--END OF TOYS-->

    <section class="categories">
        <div class="container categories__container">
            <h2>By Age</h2>
            <div class="categories__right">
                <a href="toy_ageRange.php?age=0-18 months">
                    <article class="category">
                        <span class="category__icon"><i class="uil uil-baby-carriage"></i></span>
                        <h5>0 - 18 Months</h5>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> -->
                    </article>
                </a>

                <a href="toy_ageRange.php?age=18-36 months">
                    <article class="category">
                        <span class="category__icon"><i class="uil uil-kid"></i></span>
                        <h5>18 - 36 Months</h5>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p> -->
                    </article>
                </a>

                <a href="toy_ageRange.php?age=3-5 Years">
                    <article class="category">
                        <span class="category__icon"><i class="uil uil-car-sideview"></i></span>
                        <h5>3 - 5 Years</h5>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nam.</p> -->
                    </article>
                </a>

                <a href="toy_ageRange.php?age=6-8 Years">
                    <article class="category">
                        <span class="category__icon"><i class="uil uil-basketball"></i></span>
                        <h5>6 - 8 Years</h5>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nam.</p> -->
                    </article>
                </a>

                <a href="toy_ageRange.php?age=9+ Years">
                    <article class="category">
                        <span class="category__icon"><i class="uil uil-hourglass"></i></span>
                        <h5>9+ Years</h5>
                        <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, nam.</p> -->
                    </article>
                </a>
            </div>
        </div>
    </section>
    <!--END OF CATEGORIES-->

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