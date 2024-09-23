<title>Index</title>
<!-- else if (isset($_SESSION["agent"])) { -->


<?php
if (isset($_SESSION["admin"])) {
?>

    <!-- COL---1 -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Count_Admins_PHP -->
                <div class="row">
                    <div class="col-4">
                        <i class="fa-solid fa-user-lock" style="color: #000000;"></i>
                        <span class="fs-11 mt-2 d-block text-nowrap">Admin</span>
                        <h4 class="mb-0 mt-1">
                            <?php
                            $query = mysqli_query(Connection(), "select Count(Id) from administrator where position = 'admin' OR position = 'main_admin' OR position = 'super_admin'");
                            $converted = mysqli_fetch_array($query);
                            echo $converted["Count(Id)"];
                            ?>
                        </h4>
                    </div>
                    <div class="col-4">
                        <i class="fa-solid fa-user-shield" style="color: #000000;"></i> Agents</span>
                        <span class="fs-11 mt-2 d-block text-nowrap">Agent</span>
                        <h4 class="mb-0 mt-1">
                            <?php
                            $query = mysqli_query(Connection(), "select Count(Id) from administrator where position = 'agent'");
                            $converted = mysqli_fetch_array($query);
                            echo $converted["Count(Id)"];
                            ?>
                        </h4>
                    </div>
                    <div class="col-4">
                        <i class="fa-solid fa-user" style="color: #000000;"></i>
                        <span class="fs-11 mt-2 d-block text-nowrap">Users</span>
                        <h4 class="mb-0 mt-1">
                            <?php
                            $query = mysqli_query(Connection(), "select Count(Id) from administrator where position = 'user'");
                            $converted = mysqli_fetch_array($query);
                            echo $converted["Count(Id)"];
                            ?>
                        </h4>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- COL---1 -->

    <!-- COL---2 -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Admins</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0">
                        <thead>
                            <tr class="border-2 border-bottom border-dark border-0">
                                <th scope="col" class="ps-0">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Position</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $query = SelectTable("administrator");
                            foreach ($query as $data) {
                            ?>
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">
                                            <?php echo $data["Id"] ?>
                                        </span>
                                    </th>
                                    <td>
                                        <?php echo $data["name"] ?>
                                    </td>
                                    <td class="fw-medium"><?php echo $data["email"] ?></td>
                                    <td class="fw-medium"><?php echo $data["position"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <!-- COL---2 -->

    <!-- COL---3 -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex align-items-center gap-2 mb-4">
                    Visitors Traffic Overview
                    <span>
                        <iconify-icon icon="solar:question-circle-bold" class="fs-7 d-flex text-muted"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success"
                            data-bs-title="Traffic Overview"></iconify-icon>
                    </span>
                </h5>
                <div id="traffic-overview">
                </div>
            </div>
        </div>
    </div>
<?php




} else if (isset($_SESSION["agent"])) {
?>
    <!-- COL---1 -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">

                <!-- Count_Admins_PHP -->
                <div class="row">
                    <div class="agent-container d-flex justify-content-around">
                        <div class="col-4" style="padding: 0 10%;">
                            <i class="fa-solid fa-user-shield" style="color: #000000;"></i></span>
                            <span class="fs-11 mt-2 d-block text-nowrap">Agent</span>
                            <h4 class="mb-0 mt-1">
                                <?php
                                $query = mysqli_query(Connection(), "select Count(Id) from administrator where position = 'agent'");
                                $converted = mysqli_fetch_array($query);
                                echo $converted["Count(Id)"];
                                ?>
                            </h4>
                        </div>
                        <div class="col-4" style="padding: 0 10%;">
                            <i class="fa-solid fa-user" style="color: #000000;"></i>
                            <span class="fs-11 mt-2 d-block text-nowrap">Users</span>
                            <h4 class="mb-0 mt-1">
                                <?php
                                $query = mysqli_query(Connection(), "select Count(Id) from administrator where position = 'user'");
                                $converted = mysqli_fetch_array($query);
                                echo $converted["Count(Id)"];
                                ?>
                            </h4>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- COL---1 -->

    <!-- COL---2 -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title pb-3">Users</h5>
                <div class="table-responsive">
                    <table class="table text-nowrap align-middle mb-0">
                        <thead>
                            <tr class="border-2 border-bottom border-dark border-0">
                                <th scope="col" class="ps-0">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Position</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <?php
                            $query = mysqli_query($con, "select * from administrator where position = 'user'");
                            foreach ($query as $data) {
                            ?>
                                <tr>
                                    <th scope="row" class="ps-0 fw-medium">
                                        <span class="table-link1 text-truncate d-block">
                                            <?php echo $data["Id"] ?>
                                        </span>
                                    </th>
                                    <td>
                                        <?php echo $data["name"] ?>
                                    </td>
                                    <td class="fw-medium"><?php echo $data["email"] ?></td>
                                    <td class="fw-medium"><?php echo $data["position"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    </div>
    <!-- COL---2 -->

    <!-- COL---3 -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title d-flex align-items-center gap-2 mb-4">
                    Visitors Traffic Overview
                    <span>
                        <iconify-icon icon="solar:question-circle-bold" class="fs-7 d-flex text-muted"
                            data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="tooltip-success"
                            data-bs-title="Traffic Overview"></iconify-icon>
                    </span>
                </h5>
                <div id="traffic-overview">
                </div>
            </div>
        </div>
    </div>
    <!-- COL---3 -->
<?php

}
?>