<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/seodashlogo.png" />
  <link rel="stylesheet" href="assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
  <!-- Jquery starts -->
  <script>
    $(document).ready(function() {
      $("#searchUsers").on("keyup", function() {
        const search = $(this).val();
        $.ajax({
          url: "../connection.php",
          type: "post",
          data: {
            "searchBtn": search,
          },
          success: function(res) {
            $("#showSearchUsers").html(res);
          }
        })
      })

      // searchShipping
      $("#searchShipping").keyup(function() {
        let searchShipping = $("#searchShipping").val();
        $.ajax({
          url: "../connection.php",
          type: "post",
          data: {
            "searchShip": searchShipping
          },
          success: function(res) {
            $("#showShipping").html(res);
            $("#showShipping").html(res);
          }
        })
      })
      // searchShipping



      // SearchBranch
      $("#searchBranch").keyup(function() {
        let searchBranch = $("#searchBranch").val();
        $.ajax({
          url: "../connection.php",
          type: "post",
          data: {
            "searchBranc": searchBranch
          },
          success: function(res) {
            $("#showBranches").html(res);
          }
        })
      })
      // SearchBranch




      // SearchBranchStaff
      $("#searchStaff").keyup(function() {
        let searchStaff = $("#searchStaff").val();
        $.ajax({
          url: "../connection.php",
          type: "post",
          data: {
            "searchBranchstf": searchStaff
          },
          success: function(res) {
            $("#showBranchStaff").html(res);
          }
        })
      })
      // SearchBranchStaff


      // SearchParcel
      $("#searchParcel").keyup(function() {
        let searchParcel = $("#searchParcel").val();
        $.ajax({
          url: "../connection.php",
          type: "post",
          data: {
            "searchParc": searchParcel
          },
          success: function(res) {
            $("#showParcels").html(res);
          }
        })
      })
      // SearchParcel




      // SearchReport
      $("#searchReport").keyup(function() {
        let searchReport = $("#searchReport").val();
        $.ajax({
          url: "../connection.php",
          type: "post",
          data: {
            "searchRep": searchReport
          },
          success: function(res) {
            $("#showReports").html(res);
          }
        })
      })
      // SearchReport
    })
  </script>
  <!-- Jquery ends -->
</head>
<?php
include("../connection.php");
if (isset($_SESSION["admin"])) {
?>

  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="public.php?index" class="text-nowrap logo-img">
              <img style="width:60%; margin: 0 auto!important; display:block" src="https://thumbs.dreamstime.com/z/admin-dashboard-icon-thin-line-style-white-background-isolated-eps-admin-dashboard-icon-symbol-white-background-332400090.jpg?w=768" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                <span class="hide-menu">Main</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?index" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?data" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Data</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?courier" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Couriers</span>
                </a>
              </li>

              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                <span class="hide-menu">Shippings And Orders</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?shipping" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:layers-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Shipping</span>
                </a>
              </li>


              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?branch" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:file-text-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Branch</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?branch_staff" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:text-field-focus-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Branch Staff</span>
                </a>
              </li>
              <li class="nav-small-cap">
                <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-6" class="fs-6"></iconify-icon>
                <span class="hide-menu">Shipments</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?trackParcel" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:login-3-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Track Parcel</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?report" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Reports</span>
                </a>
              </li>



            </ul>

          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                  <i class="ti ti-bell-ringing"></i>
                  <div class="notification bg-primary rounded-circle"></div>
                </a>
              </li>
            </ul>
            <div class="ms-auto mx-4 d-flex align-items-center gap-2">
              <img class="img-fluid mt-2 " src="data:image/;base64,<?php echo $_SESSION["profile"] ?>" style="width:60px; height:60px; border-radius:50px">


              <div class="d-flex flex-column align-items-start mt-3">
                <a href="public.php?logout" class="fw-bold text-dark fs-3">
                  Logout
                  <i class="fa-solid fa-right-from-bracket mx-1"></i>
                </a>
                <a href="#" class="fw-bold text-dark fs-2">
                  Active ::
                  <?php
                  echo $_SESSION["admin"]
                  ?>
                </a>
              </div>

            </div>
          </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
          <div class="row">

            <!-- Page_Routes -->
            <?php
            if (isset($_GET["index"])) {
              include("index.php");
            }

            if (isset($_GET["data"])) {
              include("data.php");
            }

            if (isset($_GET["logout"])) {
              include("logout.php");
            }

            if (isset($_GET["shipping"])) {
              include("shipping.php");
            }

            if (isset($_GET["branch"])) {
              include("branch.php");
            }

            if (isset($_GET["branch_staff"])) {
              include("branch_staff.php");
            }

            if (isset($_GET["trackParcel"])) {
              include("trackParcel.php");
            }

            if (isset($_GET["report"])) {
              include("report.php");
            }

            if (isset($_GET["courier"])) {
              include("courier.php");
            }
            ?>


            <div class="py-6 px-6 text-center">
              <p class="mt-4 fs-4">Design and Developed by <span class="fw-bold text-dark d-block">FOUZ UL AZEEM</span><a href="#" target="_blank"
                  class="pe-1 text-primary text-decoration-underline"></a>
            </div>


          </div>
        </div>
      </div>
      <script src="assets/libs/jquery/dist/jquery.min.js"></script>
      <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
      <script src="assets/libs/simplebar/dist/simplebar.js"></script>
      <script src="assets/js/sidebarmenu.js"></script>
      <script src="assets/js/app.min.js"></script>
      <script src="assets/js/dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  </body>
<?php
} else if (isset($_SESSION["agent"])) {
?>

  <body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="public.php?index" class="text-nowrap logo-img">
              <img style="width:60%; margin: 0 auto!important; display:block" src="https://thumbs.dreamstime.com/z/admin-dashboard-icon-thin-line-style-white-background-isolated-eps-admin-dashboard-icon-symbol-white-background-332400090.jpg?w=768" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <li class="nav-small-cap">
                <i class="ti ti-dots nav-small-cap-icon fs-6"></i>
                <span class="hide-menu">Agent</span>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?index" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:home-smile-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?data" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:bookmark-square-minimalistic-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Data</span>
                </a>
              </li>

              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?trackParcel" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:login-3-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Track Parcel</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a class="sidebar-link" href="public.php?report" aria-expanded="false">
                  <span>
                    <iconify-icon icon="solar:user-plus-rounded-bold-duotone" class="fs-6"></iconify-icon>
                  </span>
                  <span class="hide-menu">Reports</span>
                </a>
              </li>



            </ul>

          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>
      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
        <!--  Header Start -->
        <header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav">
              <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                  <i class="ti ti-bell-ringing"></i>
                  <div class="notification bg-primary rounded-circle"></div>
                </a>
              </li>
            </ul>
            <div class="ms-auto mx-4 d-flex align-items-center gap-2">
              <img class="img-fluid mt-4" src="data:image/;base64,<?php echo $_SESSION["profile"] ?>" style="width:40px; height:40px; border-radius:50px">


              <div class="d-flex flex-column align-items-start mt-3">
                <a href="public.php?logout" class="fw-bold text-dark fs-3">
                  Logout
                  <i class="fa-solid fa-right-from-bracket mx-1"></i>
                </a>
                <a href="#" class="fw-bold text-dark fs-2">
                  Active ::
                  <?php
                  echo $_SESSION["agent"]
                  ?>
                </a>
              </div>

            </div>
          </nav>
        </header>
        <!--  Header End -->
        <div class="container-fluid">
          <div class="row">

            <!-- Page_Routes -->
            <?php
            if (isset($_GET["index"])) {
              include("index.php");
            }

            if (isset($_GET["data"])) {
              include("data.php");
            }

            if (isset($_GET["logout"])) {
              include("logout.php");
            }

            if (isset($_GET["trackParcel"])) {
              include("trackParcel.php");
            }

            if (isset($_GET["report"])) {
              include("report.php");
            }
            ?>


            <div class="py-6 px-6 text-center">
              <p class="mt-5 fs-4">Design and Developed by <span class="fw-bold text-dark d-block">FOUZ UL AZEEM</span><a href="#" target="_blank"
                  class="pe-1 text-primary text-decoration-underline"></a>
            </div>


          </div>
        </div>
      </div>
      <script src="assets/libs/jquery/dist/jquery.min.js"></script>
      <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
      <script src="assets/libs/simplebar/dist/simplebar.js"></script>
      <script src="assets/js/sidebarmenu.js"></script>
      <script src="assets/js/app.min.js"></script>
      <script src="assets/js/dashboard.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
  </body>
<?php
} else {
  header("location: ../login.php");
}
?>



</html>