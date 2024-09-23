<?php
include("./Components/Header.php");
?>
<style>
  #hero {
    background: linear-gradient(to right, #000000d1, #000000c2), url(assets/srv/2.jpeg) no-repeat center center / cover !important;
  }
</style>

<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section dark-background">
    <figure>
      <!-- <img src="" alt="" class="hero-bg" data-aos="fade-in"> -->
    </figure>
    <div class="container">
      <div class="row gy-4 d-flex justify-content-between">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 data-aos="fade-up" style="color: white !important;">Your Lightning Fast Delivery Partner</h2>
          <p data-aos="fade-up" data-aos-delay="100">We specialize in lightning-fast delivery, ensuring your goods reach their destination quickly and efficiently through our streamlined logistics and transportation solutions.</p>

          <form action="#" class="form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
            <input type="text" class="form-control" placeholder="Your Shipping Id or Refrence No. e.g. #9464424">
            <!-- <button type="submit" class="btn btn-primary">Track</button> -->
          </form>

          <div class="row gy-4" data-aos="fade-up" data-aos-delay="300">

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="0" class="purecounter">232</span>
                <p>Clients</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="0" class="purecounter">521</span>
                <p>Projects</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="0" class="purecounter">1453</span>
                <p>Support</p>
              </div>
            </div><!-- End Stats Item -->

            <div class="col-lg-3 col-6">
              <div class="stats-item text-center w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="0" class="purecounter">32</span>
                <p>Workers</p>
              </div>
            </div><!-- End Stats Item -->

          </div>

        </div>

        <div class="col-lg-5 order-1 order-lg-2 hero-img" data-aos="zoom-out">
          <img src="assets/img/hero-img.svg" class="img-fluid mb-3 mb-lg-0" alt="">
        </div>

      </div>
    </div>

  </section><!-- /Hero Section -->

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

  <!-- About Section -->
  <section id="about" class="about section">

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-6 position-relative align-self-start order-lg-last order-first" data-aos="fade-up" data-aos-delay="200">
          <img src="assets/srv/free-photo-of-oil-train-carriages-near-petrol-refinery-in-trzebinia-poland.jpeg" class="img-fluid" class="img-fluid" alt="">
          <a href="#" class="glightbox pulsating-play-btn"></a>
        </div>

        <div class="col-lg-6 content order-last  order-lg-first" data-aos="fade-up" data-aos-delay="100">
          <h3>About Us</h3>
          <p>
            Businesses specializing in the transportation of goods, offering various services like freight forwarding, logistics, and warehousing. They manage the entire supply chain process, ensuring efficient and secure delivery through air, truck, or train freight, while often providing tracking and customs support.
          </p>
          <ul>
            <li>
              <i class="bi bi-diagram-3 text-dark"></i>
              <div>
                <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                <p>Spreaded Network</p>
              </div>
            </li>
            <li>
              <i class="bi bi-fullscreen-exit text-dark"></i>
              <div>
                <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                <p>easy way of sending things</p>
              </div>
            </li>
            <li>
              <i class="bi bi-broadcast text-dark"></i>
              <div>
                <h5>Voluptatem et qui exercitationem</h5>
                <p>Our remote Connectivity solution</p>
              </div>
            </li>
          </ul>
        </div>

      </div>

    </div>

  </section><!-- /About Section -->

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

  <!-- Call To Action Section -->
  <section id="call-to-action" class="call-to-action section dark-background">

    <img src="assets/img/cta-bg.jpg" alt="">

    <div class="container">
      <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
        <div class="col-xl-10">
          <div class="text-center">
            <h3 style="color: white !important;">Call To Action</h3>
            <p>Contact us today to discuss your logistics needs and discover how our comprehensive services can streamline your supply chain for efficient, reliable delivery!.</p>
            <a class="cta-btn" href="#">Call To Action</a>
          </div>
        </div>
      </div>
    </div>

  </section><!-- /Call To Action Section -->

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

  <!-- Pricing Section -->
  <section id="pricing" class="pricing section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
      <span>Pricing</span>
      <h2>Pricing</h2>
      <p>When it comes to shipping, pricing can vary widely based on several factors.</p>
    </div><!-- End Section Title -->

    <div class="container">

      <div class="row gy-4">

        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="100">
          <div class="pricing-item">
            <h3>Free Plan</h3>
            <h4><sup>$</sup>0<span> / month</span></h4>
            <ul>
              <li><i class="bi bi-check"></i> <span>Access to instant quotes for standard shipping options.</span></li>
              <li><i class="bi bi-check"></i> <span>Real-time tracking for up to 5 shipments.</span></li>
              <li><i class="bi bi-check"></i> <span>Limited support via email and access to our knowledge base.</span></li>
              <li class="na"><i class="bi bi-x"></i> <span> A user-friendly dashboard to manage your shipments.</span></li>
              <li class="na"><i class="bi bi-x"></i> <span>View shipment history and basic analytics.</span></li>
            </ul>
            <a href="#" class="buy-btn">Buy Now</a>
          </div>
        </div><!-- End Pricing Item -->

        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
          <div class="pricing-item featured">
            <h3>Business Plan</h3>
            <h4><sup>$</sup>29<span> / month</span></h4>
            <ul>
              <li><i class="bi bi-check"></i> <span>Access to multiple carriers with real-time pricing.</span></li>
              <li><i class="bi bi-check"></i> <span>Track as many shipments as needed with advanced tracking features.</span></li>
              <li><i class="bi bi-check"></i> <span>24/7 support via chat, email, and phone.</span></li>
              <li><i class="bi bi-check"></i> <span>Detailed analytics and reporting tools to monitor shipping performance.</span></li>
              <li><i class="bi bi-check"></i> <span>Access to reduced shipping rates with selected carriers.</span></li>
            </ul>
            <a href="#" class="buy-btn">Buy Now</a>
          </div>
        </div><!-- End Pricing Item -->

        <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="300">
          <div class="pricing-item">
            <h3>Developer Plan</h3>
            <h4><sup>$</sup>49<span> / month</span></h4>
            <ul>
              <li><i class="bi bi-check"></i> <span>Custom shipping solutions tailored to your business needs.</span></li>
              <li><i class="bi bi-check"></i> <span>Personalized support from an account manager</span></li>
              <li><i class="bi bi-check"></i> <span>Seamless integration with your existing systems and platforms.</span></li>
              <li><i class="bi bi-check"></i> <span>In-depth reporting and analytics.</span></li>
              <li><i class="bi bi-check"></i> <span>Special pricing and discounts based on shipping volume.</span></li>
            </ul>
            <a href="#" class="buy-btn">Buy Now</a>
          </div>
        </div><!-- End Pricing Item -->

      </div>

    </div>

  </section><!-- /Pricing Section -->

  <?php
  include("faq_testimonial.php");
  ?>

</main>
<?php
include("./Components/Footer.php");
?>