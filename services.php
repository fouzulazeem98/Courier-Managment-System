<?php
include("./Components/Header.php");
?>


<main class="main">

  <!-- Page Title -->
  <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/srv/free-photo-of-oil-train-carriages-near-petrol-refinery-in-trzebinia-poland.jpeg);">
    <div class="container position-relative">
      <h1 style="color: white !important;">Services</h1>
      <p>Esse dolorum voluptatum ullam est sint nemo et est ipsa porro placeat quibusdam quia assumenda numquam molestias.</p>
      <nav class="breadcrumbs">
        <ol>
          <li><a href="index.php">Home</a></li>
          <li class="current">Services</li>
        </ol>
      </nav>
    </div>
  </div><!-- End Page Title -->


  <!-- Featured Services Section -->
  <section id="featured-services" class="featured-services section">

    <div class="container">

      <div class="row gy-4">
        <?php
        $query = mysqli_query(Connection(), "select * from freights_detail");
        foreach ($query as $data) {
        ?>
          <div class="col-lg-4 col-md-6 service-item d-flex flex-column gap-4" data-aos="fade-up" data-aos-delay="100">
            <div class="icon flex-shrink-0">
              <img src="data:image/;base64,<?php echo $data["freight_img"] ?>" alt="" width="400" height="230" class="rounded-2">
            </div>
            <div>
              <h4 class="title"><?php echo $data["freight_name"] ?></h4>
              <p class="description"><?php echo $data["freight_intro"] ?></p>
              <a href="service-details.php?crId=<?php echo $data["Id"] ?>" class="readmore stretched-link">
                <span>Learn More</span><i class="bi bi-arrow-right"></i>
              </a>
            </div>

          </div>

          <!-- <form action="connection.php" method="post" enctype="multipart/form-data">
    <input type="file" name="img">
    <input type="submit" value="Submit" name="upload">
  </form> -->
        <?php
        }
        ?>
        <!-- End Service Item -->
      </div>

    </div>

  </section><!-- /Featured Services Section -->


  <!-- Services Section -->
  <section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <span>Our Services<br></span>
      <h2>Our ServiceS</h2>
      <p>We offer freight forwarding, logistics solutions, customs clearance, secure warehousing, real-time tracking, cargo insurance, and expert consultation to ensure efficient and reliable transportation of goods.</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <div class="card">
            <div class="card-img">
              <img src="assets/img/service-1.jpg" alt="" class="img-fluid">
            </div>
            <h3>Storage</h3>
            <p>We provide secure and flexible storage solutions, offering safe warehousing and inventory management to accommodate your cargo needs.</p>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <div class="card">
            <div class="card-img">
              <img src="assets/img/service-2.jpg" alt="" class="img-fluid">
            </div>
            <h3><a href="#" class="stretched-link">Logistics</a></h3>
            <p>Our logistics services encompass end-to-end supply chain management, optimizing the flow of goods from origin to destination for maximum efficiency and reliability.</p>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <div class="card">
            <div class="card-img">
              <img src="assets/img/service-3.jpg" alt="" class="img-fluid">
            </div>
            <h3><a href="#" class="stretched-link">Cargo</a></h3>
            <p>We provide comprehensive cargo services, ensuring the safe and efficient transportation of goods across multiple modes for timely delivery and secure handling.</p>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
          <div class="card">
            <div class="card-img">
              <img src="assets/img/service-4.jpg" alt="" class="img-fluid">
            </div>
            <h3><a href="#" class="stretched-link">Trucking</a></h3>
            <p>Our trucking services deliver flexible and reliable transportation, offering door-to-door service for efficient and timely movement of goods across short to medium distances.</p>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
          <div class="card">
            <div class="card-img">
              <img src="assets/img/service-5.jpg" alt="" class="img-fluid">
            </div>
            <h3>Packaging</h3>
            <p>We offer tailored packaging services to protect your products during transit, ensuring safe delivery with materials designed for durability and compliance.</p>
          </div>
        </div><!-- End Card Item -->

        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
          <div class="card">
            <div class="card-img">
              <img src="assets/img/service-6.jpg" alt="" class="img-fluid">
            </div>
            <h3><a href="#" class="stretched-link">Warehousing</a></h3>
            <p>Our warehousing services provide secure, organized storage solutions with efficient inventory management to ensure your goods are easily accessible and well-protected.</p>
          </div>
        </div><!-- End Card Item -->

      </div>

    </div>

  </section><!-- /Services Section -->

  <!-- Features Section -->
  <section id="features" class="features section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <span>Features</span>
      <h2>Features</h2>
      <p>Key features of a cargo company include diverse transportation options, real-time tracking, customs clearance services, warehousing, insurance, flexible pricing, compliance expertise, customer support, sustainability initiatives, and advanced technology integration.</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
          <img src="assets/img/features-1.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7" data-aos="fade-up" data-aos-delay="100">
          <h3>Way of Sending Parcel</h3>
          <p class="fst-italic">
            There are several ways to send a parcel, depending on your needs and budget. Here are some common options:
          </p>
          <ul>
            <li><i class="bi bi-check"></i><span> Services like Pirate Ship or ShipStation can help you compare rates from different carriers and print labels easily.</span></li>
            <li><i class="bi bi-check"></i> <span>For shorter distances, consider local couriers or delivery services like Postmates or DoorDash, which may offer parcel delivery in your area.</span></li>
            <li><i class="bi bi-check"></i> <span>If you're sending large or heavy items, freight services might be a more economical option.</span></li>
          </ul>
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/features-2.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7 order-2 order-md-1" data-aos="fade-up" data-aos-delay="200">
          <h3>Some Key Features</h3>
          <p class="fst-italic">
            Insurance Coverage
          </p>
          <p>
            Provides financial protection for valuable items in case of loss or damage.
            Different carriers offer varying levels of coverage.

          </p>
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 d-flex align-items-center" data-aos="zoom-out">
          <img src="assets/img/features-3.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7" data-aos="fade-up">
          <h3>The concept of a lost or damaged warranty in cargo primarily revolves around the liability of the shipping company.</h3>
          <p>The carrier assumes full responsibility for any loss or damage, regardless of the cause..</p>
          <ul>
            <li><i class="bi bi-check"></i> <span>Inadequate cushioning or protection can lead to breakage or deformation during transit.
              </span></li>
            <li><i class="bi bi-check"></i><span> Rough handling by warehouse staff or during loading and unloading processes.</span></li>
            <li><i class="bi bi-check"></i> <span>Exposure to moisture, extreme temperatures, or other environmental conditions that may affect the product.</li>
          </ul>
        </div>
      </div><!-- Features Item -->

      <div class="row gy-4 align-items-center features-item">
        <div class="col-md-5 order-1 order-md-2 d-flex align-items-center" data-aos="zoom-out">
          <img src="assets/img/features-4.jpg" class="img-fluid" alt="">
        </div>
        <div class="col-md-7 order-2 order-md-1" data-aos="fade-up">
          <h3>streamlined processes that simplify the shipping experience for businesses and consumers.</h3>
          <p class="fst-italic">
            Access to various shipping carriers to choose the best rates and services.
            Delivery Speed: Options for standard, expedited, and same-day delivery based on customer needs.
          </p>
          <p>
            24/7 Assistance: Easily accessible customer service via chat, phone, or email.
            FAQs and Resources: Helpful guides and resources for common shipping questions.
            Easy Return Labels: Prepaid return labels that simplify the return process for customers.
          </p>
        </div>
      </div><!-- Features Item -->

    </div>

  </section><!-- /Features Section -->

  <?php
  include("faq_testimonial.php");
  ?>



</main>

<?php
include("./Components/Footer.php");
?>