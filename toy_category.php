<?php
require_once "functions.php";
automatedLogout();
$connection = connect();
$category = $_GET['category'];
$maxCategoryLength = 60;
$category = validateText($category, $maxCategoryLength);
if ($category[1] == "Success") {
    $category = $category[0];
} else
    echo $category[1];

$sql = "SELECT toy.*
FROM toy
JOIN category ON toy.ToyId = category.CategoryId
WHERE category.CategoryName = '$category';";


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
    <!--End of navbar-->


    <section class="toys">
        <h2>
            <?php echo $category; ?>
        </h2>
        <div class="container toys__container">
            <?PHP
            $results = queryDatabase($connection, $sql);
            print_r($results);
            populateToys($sql);
            ?>
            <article class="toy">
                <div class="toy__image">
                    <img src="./images/two.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> TOY 1 </h4>
                    <p></p>
                    <a href="view.php" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/three.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toy 2</h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/four.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toy 3 </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/five.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/six.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/seven.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/eight.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/nine.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/ten.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/eleven.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/twelve.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/thirteen.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/two.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/three.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/four.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/five.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/six.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>

            <article class="toy">
                <div class="toy__image">
                    <img src="./images/seven.png" alt="Example"
                        style="width: 100%; height: 300px; display: block; margin: 0 auto;">
                </div>
                <div class="toy__info">
                    <h4> Toys </h4>
                    <p></p>
                    <a href="view.html" class="btn"> LEARN MORE</a>
                </div>
            </article>
        </div>
    </section>
    <!--END OF TOYS-->

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