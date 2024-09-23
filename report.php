<style>
    table th,
    td {
        padding: 60px 30px !important;
    }

    .shipping_heading {
        margin-bottom: 3rem;
        color: white !important;
        padding: 20px 30px;
        background-color: black;
        text-transform: uppercase;
        font-weight: 900;
    }
</style>

<div>
    <?php
    include("./Components/Header.php")
    ?>
</div>
<!-- Page Title -->
<div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/srv/2.jpeg)" ;>
    <div class="container position-relative">
        <h1 style="color: white !important;">Report Details</h1>
        <p>we believe that every shipment tells a story. Let us be a part of yours. Contact us today to learn how we can support your logistics needs!</p>
        <nav class="breadcrumbs">
            <ol>
                <li><a href="index.php">Home</a></li>
                <li class="current">Report Details</li>
            </ol>
        </nav>
    </div>
</div><!-- End Page Title -->


<div class="container-Fluid px-5" style="margin-top: 10rem; margin-bottom:100vh">
    <h2 class="shipping_heading"><i class="fa-brands fa-researchgate px-2"></i> Report Details</h2>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Report_Status</th>
            <th>User</th>
            <th>View Detail</th>
            <th>Download Report</th>
        </tr>


        <?php

        $query = mysqli_query(Connection(), "select * from report where user = '" . $_SESSION["user_email"] . "'");
        foreach ($query as $data) {
        ?>
            <tr>
                <td><?php echo $data["Id"] ?></td>
                <td><?php echo $data["report_status"] ?></td>
                <td><?php echo $data["user"] ?></td>
                <td>
                    <button data-bs-toggle="modal" data-bs-target="#view" type="buttom" name="view" class="btn">
                        <i class="fa-solid fa-eye"></i>
                    </button>
                </td>
                <td>
                    <a target="_blank" href="./Components/invoice.php" class="text-dark">
                        Download Report <i class="fa-solid fa-circle-down"></i>
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</div>



<!-- View_Modal -->
<?php
$query = mysqli_query($con, "select * from shipping where u_id = '" . $_SESSION["user_Id"] . "'");
$data2 = mysqli_fetch_array($query);
?>
<!-- View Modal starts -->

<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-center fw-bold text-uppercase" id="exampleModalLabel">Shipp Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-12 w-100 d-flex align-items-start border-0">
                    <div class="card border-0" style="width: 29rem;">
                        <div class="card-body px-5 border-0 d-flex flex-column gap-4">
                            <h5 class="card-title">
                                <span class="text-uppercase fw-bold ">Ship Type ::</span>
                                <?php echo $data2["shipping_type"] ?>
                            </h5>
                            <p class="card-text">
                                <span class="text-uppercase fw-bold ">Ship Cost ::</span>
                                <?php echo "$" . $data2["shipping_cost"] ?>
                            </p>
                            <p class="card-text">
                                <span class="text-uppercase fw-bold ">Ship Date ::</span>
                                <?php echo $data2["shipping_date"] ?>
                            </p>
                            <p class="card-text">
                                <span class="text-uppercase fw-bold ">Ship Location ::</span>
                                <?php echo $data2["shipping_location"] ?>
                            </p>
                            <p class="card-text">
                                <span class="text-uppercase fw-bold ">Order ID ::</span>
                                <?php echo $data2["order_Id"] ?>
                            </p>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button data-bs-dismiss="modal" type="button" class="btn">
                    <i class="fa-solid fa-circle-xmark"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<!-- View Modal starts -->
<!-- View_Modal -->


<div style="width:100%">
    <?php
    include("./Components/Footer.php")
    ?>
</div>