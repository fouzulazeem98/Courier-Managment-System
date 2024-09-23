<?php
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index</title>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->
    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center fixed-top">

        <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.php" class="logo d-flex align-items-center">
                <h1 class="sitename" style="color: white !important;">
                    Express
                </h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="index.php" class="active">Home<br></a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="services.php">Services</a></li>
                    <li><a href="pricing.php">Pricing</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>



            <div class="navmenu d-flex">
                <?php
                if (isset($_SESSION["user_Id"])) {
                    $query = mysqli_query($con, "select * from shipping where u_id = '" . $_SESSION["user_Id"] . "'");
                    if (mysqli_num_rows($query) > 0) {
                        $converted = mysqli_fetch_array($query);
                        // echo $converted["Id"];
                ?>
                        <a href="track_shipping.php" style="color: #fff; "><i class="fa-solid fa-truck fs-5 mx-2"></i></i>
                            Track Shipping
                        </a>
                <?php
                    }
                }
                ?>




                <?php
                if (isset($_SESSION["user_Id"])) {
                ?>
                    <a href="signOut.php" style="color: #fff; "><i class="fa-solid fa-right-to-bracket fs-5 mx-2"></i></i>
                        Sign Out
                    </a>
                    <?php
                } else {
                    if (isset($_SESSION["user_Id"]) == false) {
                    ?>
                        <a href="./login.php" style="color: #fff; "><i class="fa-solid fa-right-to-bracket fs-5 mx-2"></i></i>
                            Sign In
                        </a>
                <?php
                    } else {
                        echo "";
                    }
                }
                ?>
            </div>

        </div>
    </header>