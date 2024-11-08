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
                <?php
                createLoginOrLogoutButton();
                ?>
                <i class="far fa-user"></i>
            </div>
        </div>
    </nav>
    <!--END OF NAVBAR-->


    <section class="about__achievements">
        <div class="container about__achievements-container">
            <div class="about__achievements-left">
                <img src="./images/about achievements.svg">
            </div>
            <div class="about__achievements-right">
                <h1>T O Y T O P I A</h1>
                <p>
                    Toytopia is a platform designed to facilitate the exchange or donation of toys. Users can create a
                    profile and list the toys they have available to exchange or donate, and can also search for toys
                    they would like to receive.
                    The aim of Toytopia is to promote the reuse and redistribution of toys, reducing waste and helping
                    to ensure that children have access to toys they can enjoy. Toytopia can also help connect people
                    with others in their community who share similar interests or needs.
                    It can be useful for individuals and organisations with excess or unused toys, as it allows them to
                    donate those toys to others who may want or need them. Additionally, parents looking to save money
                    on toys or want to reduce their environmental impact can benefit from using a toy exchange website
                    to find toys for their children.
                    Overall, Toytopia is a useful tool for promoting sustainability, community building and providing
                    access to toys for children who may not otherwise have access to them.
                </p>
            </div>
        </div>
    </section>
    <!--END OF ACHIEVEMENTS-->


    <section class="team">
        <h2>Meet Our Team</h2>
        <div class="container team__container">
            <article class="team__member">
                <div class="team__member-image">
                    <img src="./images/tm2.jpg">
                </div>
                <div class="team__member-info">
                    <h4>Rowena</h4>
                    <p>Chairman</p>
                </div>
                <!-- <div class="team__member-socials">
                    <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin-alt"></i></a>
                </div> -->
            </article>

            <article class="team__member">
                <div class="team__member-image">
                    <img src="./images/tm1.jpg">
                </div>
                <div class="team__member-info">
                    <h4>Mustafa</h4>
                    <p>Social Media</p>
                </div>
                <!-- <div class="team__member-socials">
                    <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin-alt"></i></a>
                </div> -->
            </article>

            <article class="team__member">
                <div class="team__member-image">
                    <img src="./images/tm8.jpg">
                </div>
                <div class="team__member-info">
                    <h4>Jonathan</h4>
                    <p>Treasurer</p>
                </div>
                <!-- <div class="team__member-socials">
                    <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin-alt"></i></a>
                </div> -->
            </article>

            <article class="team__member">
                <div class="team__member-image">
                    <img src="./images/tm4.jpg">
                </div>
                <div class="team__member-info">
                    <h4>Jake</h4>
                    <p>Secretary</p>
                </div>
                <!-- <div class="team__member-socials">
                    <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin-alt"></i></a>
                </div> -->
            </article>

            <article class="team__member">
                <div class="team__member-image">
                    <img src="./images/tm8.jpg">
                </div>
                <div class="team__member-info">
                    <h4>Abraham </h4>
                    <p>Social Media</p>
                </div>
                <!-- <div class="team__member-socials">
                    <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin-alt"></i></a>
                </div> -->
            </article>

            <article class="team__member">
                <div class="team__member-image">
                    <img src="./images/tm6.jpg">
                </div>
                <div class="team__member-info">
                    <h4>Pierre</h4>
                    <p>Sponsorships & Event Planning</p>
                </div>
                <!-- <div class="team__member-socials">
                    <a href="https://instagram.com" target="_blank"><i class="uil uil-instagram"></i></a>
                    <a href="https://facebook.com" target="_blank"><i class="uil uil-facebook"></i></a>
                    <a href="https://linkedin.com" target="_blank"><i class="uil uil-linkedin-alt"></i></a>
                </div> -->
            </article>
        </div>
    </section>
    <!--END OF TEAM MEMBERS-->







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