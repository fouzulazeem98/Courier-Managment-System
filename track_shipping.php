<style>
    table th,
    td {
        padding: 60px 30px !important;
    }

    #finalizeData {
        background-color: black;
        color: white;
        border: none;
        padding: 4px 14px;
        font-weight: bold;
        border-radius: 4px;
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
<?php

use FTP\Connection;

include("./Components/Header.php")
?>

<script src="app.js"></script>
<div onchange="funct()" class="cover">
    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade" style="background-image: url(assets/srv/2.jpeg)" ;>
        <div class="container position-relative">
            <h1 style="color: white !important;">Shipping Details</h1>
            <p>we believe that every shipment tells a story. Let us be a part of yours. Contact us today to learn how we can support your logistics needs!</p>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li class="current">Shipp Details</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container-Fluid px-5" style="margin-top: 10rem; margin-bottom:100vh">
        <h2 class="shipping_heading"><i class="fa-solid fa-truck-fast px-2"></i> Shipping Details</h2>
        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Shipping Type</th>
                <th>Shipping Cost</th>
                <th>Shipping Location</th>
                <th>Shipping Date</th>
                <th>Order ID</th>
                <th>Parcel Name</th>
                <th>Parcel Weight</th>
                <th>Parcel Quantity</th>
                <th>Action</th>
            </tr>


            <?php

            $query = mysqli_query(Connection(), "select shipping.Id ID,shipping.shipping_type Ship_Type,shipping.shipping_cost Ship_Cost,shipping.shipping_date Ship_Date,shipping.shipping_location Ship_location,shipping.u_id UserId,administrator.name username, administrator.email email, shipping.order_Id Order_ID,shipping.parcel_info P_Info,shipping.parcel_weight P_Wg,shipping.parcel_qty P_Qty,shipping.parce_status P_St from shipping 
        INNER JOIN administrator ON shipping.u_id = administrator.Id
            where u_id = '" . $_SESSION["user_Id"] . "'
            ");

            foreach ($query as $data) {
            ?>
                <tr>
                    <td><?php echo $data["ID"] ?></td>
                    <td><?php echo $data["email"] ?></td>
                    <td><?php echo $data["Ship_Type"] ?></td>
                    <td><?php echo $data["Ship_Cost"] ?></td>
                    <td><?php echo $data["Ship_location"] ?></td>
                    <td><?php echo $data["Ship_Date"] ?></td>
                    <td><?php echo $data["Order_ID"] ?></td>
                    <form action="connection.php" method="post">
                        <input type="hidden" value="<?php echo $data["ID"] ?>" name="Id">
                        <td>
                            <input name="pInfo" id="parinfo" type="text" class="form-control w-100" value="<?php echo $data["P_Info"] ?>">
                        </td>
                        <td>
                            <input name="pWgh" id="parwgh" type="text" class="form-control w-100" value="<?php echo $data["P_Wg"] ?>">
                        </td>
                        <td>
                            <input name="pQty" id="parqty" type="number" class="form-control w-100" value="<?php echo $data["P_Qty"] ?>">
                        </td>
                        <td class="">
                            <div class="d-flex">
                                <button class="btn" name="updShip">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>
                                <button class="btn" name="delShip">
                                    <i class="fa-regular fa-square-minus"></i>
                                </button>
                            </div>
                        </td>
                </tr>


            <?php
            }
            ?>
        </table>
        <button style="display: none;" id="finalizeData" name="finalizeData" type="submit">Finalize</button>

        </form>

        <?php
        $query7 = mysqli_query(Connection(), "SELECT * from report where user = '" . $_SESSION["user_email"] . "'");
        if (mysqli_num_rows($query7) > 0) {
            $converted4 = mysqli_fetch_array($query);
        ?>
            <a href="report.php" class="btn btn-dark fw-bold text-uppercase px-4" style="background-color: black; color:white; margin:0 auto; width:10%; position:absolute; right:3%">View Report</a>
        <?php
        }
        ?>

    </div>


    <div style="width:100%">
        <?php
        include("./Components/Footer.php")
        ?>
    </div>
</div>