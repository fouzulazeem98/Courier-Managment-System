<?php
include("./Components/Header.php");
?>

<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/img/page-title-bg.jpg);">
    <div class="container position-relative">
      <h1 style="color: white !important;">Service Details</h1>
      <p>We offer freight forwarding, logistics solutions, customs clearance, secure warehousing, real-time tracking, cargo insurance, and expert consultation to ensure efficient and reliable transportation of goods.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li class="current">Service Details</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->

  <!-- Service Details Section -->
  <section id="service-details" class="service-details section">
    <div class="container">

      <div class="row gy-4">
        <?php
        $Id = $_GET["crId"];
        $query = mysqli_query(Connection(), "select * from freights_detail where Id = '$Id' ");
        $converted = mysqli_fetch_array($query);
        ?>
        <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
          <div class="services-list">
            <a href="#" class="active"><?php echo $converted["freight_name"] ?></a>
          </div>
          <img src="data:image/;base64,<?php echo $converted["freight_img"] ?>" alt="" class="img-fluid services-img" width="420">
        </div>

        <div class="col-lg-8 d-flex flex-column justify-content-start align-items-stretch gap-2"
          data-aos="fade-up" data-aos-delay="200">
          <h3 style="color: gray; font-weight:bold; font-size:20px"><?php echo  $converted["freight_details"] ?></h3>

          <form action="connection.php" method="post" class="d-flex flex-column gap-2">
            <input type="hidden" name="Id" value="<?php echo $converted["Id"] ?>">
            <input name="fName" type="text" class="d-block mb-3 border-0" style="outline: none; cursor:pointer" value="<?php echo $converted["freight_name"] ?>">
            <input type="text" class="d-block mb-3 border-0" style="outline: none; cursor:pointer" value="<?php echo $converted["freight_intro"] ?>">
            <input type="text" class="d-block mb-3 border-0" style="outline: none; cursor:pointer" value="<?php echo $converted["freight_details"] ?>">
            <input name="fDo" type="text" class="d-block mb-3 border-0" style="outline: none; cursor:pointer" width="100" value="<?php echo $converted["do"] ?>">
            <input name="fCost" type="text" class="d-block mb-3 border-0" style="outline: none; cursor:pointer" value="<?php echo $converted["freight_cost"] ?>">

            <select value="<?php echo $converted["Id"] ?>" name="bName" style="border:none; box-shadow:0px 0px 8px #8080806e; color:black; padding:6px 20px; text-transform:uppercase; font-size:15px !important; border-radius:8px; font-size:18px; width:50%!important; font-weight:bold; outline:none;background-color:black;color:white">
              <option value="--Select Option--">--Select City--</option>
              <?php
              $query = mysqli_query(Connection(), "SELECT * FROM `branch`");
              foreach ($query as $data) {
              ?>
                <option><?php echo $data["branch_name"] . " (" . $data["branch_code"] . " )" ?></option>
              <?php
              }
              ?>
            </select>
            <br>

            <?php
            if (isset($_SESSION["user_Id"])) {
            ?>
              <button name="book" type="submit" style="border:none; box-shadow:0px 0px 8px #8080806e; color:black; padding:8px 30px; text-align:center; text-transform:uppercase; font-size:15px !important; border-radius:8px; font-size:18px; width:20%!important; font-weight:bold; background-color:black;color:white">Book Service!</button>
            <?php
            } else {
              $_SESSION["courier_Id"] = $_GET["crId"];
            ?>
              <a href="login.php" style="border:none; box-shadow:0px 0px 8px #8080806e; color:black; padding:8px 30px; text-align:center; text-transform:uppercase; font-size:15px !important; border-radius:8px; font-size:18px; width:20%!important; font-weight:bold; background-color:black;color:white">Sign In</a>
            <?php
            }
            ?>

          </form>

        </div>
        <?php
        ?>
      </div>

    </div>

  </section><!-- /Service Details Section -->

</main>

<div style="margin-bottom: 100px;"></div>

<?php
include("./Components/Footer.php");
?>