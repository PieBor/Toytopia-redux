<?php
require_once "functions.php";
automatedLogout();

$_SESSION['email'] = "tomb@gmail.com";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['toyName']) && isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
    $toyName = $_POST['toyName'];
    $brandName = $_POST['brandName'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $email = $_SESSION['email'];
    $ageRange = $_POST['ageRange'];
    $condition = $_POST['condition'];
    $toyStatus = "Available";
    $image = $_FILES['picture'];


    // Check if the file was uploaded without errors
    $fileName = $_FILES["picture"]["name"];
    $fileSize = $_FILES["picture"]["size"];
    $temp = $_FILES["picture"]["tmp_name"];
    $fileType = $_FILES["picture"]["type"];

    // Set the upload directory and file path
    $directory = "images/";
    $filePath = $directory . $fileName;

    // Move the uploaded file to the upload directory
    move_uploaded_file($temp, $filePath);



    echo "$toyName $brandName $description $category $ageRange";
    error_log("$toyName $brandName $description $category $ageRange");

    $results = registerToy(
        $toyName,
        $filePath,
        $category,
        $description,
        $email,
        $ageRange,
        $toyStatus,
        $condition,
        $brandName
    );

    if ($results == "Success") {
        echo "<script>alert('Everything uploaded correctly');</script>";
        echo "Everything uploaded correctly";
    } else
        echo "<script>alert('Error: " . $results . "');</script>";
    echo "Error--: " . $results;
    error_log($results);


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
                <?php
                createLoginOrLogoutButton();
                ?>
                <i class="far fa-user"></i>
            </div>
        </div>
    </nav>
    <!--END OF NAVBAR-->


    <section class="upload">
        <h2>Choose a file to upload</h2>
        <form action="#" method="post" class="container upload__container" enctype="multipart/form-data">
            <div class="upload__left">
                <input type="file" id="myfileId" name="picture" class="img__id"> <br>
                <button type="submit" href="#" class="btn"> Submit</button>
            </div>

            <div class="upload__right">
                <label for="Name">Toy Name: <input type="text" placeholder="Enter text" name="toyName" value="mario"
                        class="txtbox"></label><br>
                <!-- <label for="Name">Brand Name: <input type="text" placeholder="Enter text" name="brandName"
                        value="nintendo" class="txtbox"></label><br> -->
                <label for="Name">Brand: <select name="brandName" class="selectcatt">
                        <option value="i" selected>Select an Option</option>
                        <option value="1">Lego </option>
                        <option value="2">Barbie </option>
                        <option value="3">Hasbro</option>
                        <option value="4">Fisher Price</option>
                        <option value="5">Melissa & Doug</option>
                    </select></label><br>
                <label for="Name">Description: <input type="textarea" placeholder="Enter text" name="description"
                        value="A plumber who jumps good" class="txtboxx"></label><br>
                <label for="Name">Category: <select name="category" class="selectcat">
                        <option value="i" selected>Select an Option</option>
                        <option value="1">Dolls</option>
                        <option value="2">Cars</option>
                        <option value="3">Educational games</option>
                        <option value="4">Pretend play </option>
                        <option value="5">Puzzles and board games</option>
                        <option value="6">Other</option>
                    </select></label><br>
                <label for="Name">Age: <select name="ageRange" class="selectcatt">
                        <option value="i" selected>Select an Option</option>
                        <option value="1">0 - 18 Months </option>
                        <option value="2">18 - 36 Months </option>
                        <option value="3">3 - 5 Years</option>
                        <option value="4">6 - 8 Years</option>
                        <option value="5">9+ Years</option>
                    </select></label><br>
                <label for="Name">Condition: <select name="condition" class="selectcatt">
                        <option value="i" selected>Select an Option</option>
                        <option value="1">New </option>
                        <option value="2">Like New </option>
                        <option value="3">Good</option>
                        <option value="4">Fair</option>
                        <option value="5">Poor</option>
                    </select></label><br>
                <!-- <label for="Name">Condition: <input type="text" placeholder="Enter text" name="condition"
                        value="acceptable" class="txtbox"></label><br> -->
            </div>
        </form>
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