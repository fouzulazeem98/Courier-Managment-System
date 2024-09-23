<title>Data</title>



<?php
if (isset($_SESSION["admin"])) {
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div class="col-lg-12" style="height: 100vh;">
        <?php
        if (isset($_SESSION["success"])) {
        ?>
            <div id="successAlert" class="alert alert border-0 fw-bold text-white text-center fs-5 text-uppercase" style="background: #3a4752; transition: 0.3s ease-out" role="alert">
                <div class="d-flex justify-content-between align-items-center px-5">
                    <p style="transform: translateY(30%);">
                        <?php
                        echo $_SESSION["success"];
                        ?>
                    </p>
                    <button class="border-0 outline-none text-white fw-bold" style="background: none; display:inline-block" type="button" onclick="closeAlert()">X</button>
                </div>
            </div>
        <?php
        }
        unset($_SESSION["success"]);
        ?>

        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex gap-3 flex-wrap align-items-center gap-5">
                        <h5 class="py-2">Admins</h5>
                        <input id="searchUsers" style="width: 20vw!important;" type="text" class="form-control" placeholder="Search By Name Email OR position ...">
                    </div>
                    <div class="d-flex gap-3 flex-wrap align-items-center gap-2">
                        <Button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#DelAll">Delete All</Button>
                        <Button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddData">Insert Data</Button>
                    </div>
                </div>

                <table class="table text-nowrap align-middle mb-0" id="showSearchUsers">
                    <thead>
                        <tr class="border-2 border-bottom border-dark border-0">
                            <th scope="col" class="ps-0">Id</th>
                            <th scope="col">Profile</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Position</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $query = SelectTable("administrator");
                        foreach ($query as $data) {
                            $_SESSION["Truncate_Id"] = $data["Id"];
                        ?>
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">
                                        <?php echo $data["Id"] ?>
                                    </span>
                                </th>
                                <td><img src="data:image/;base64,<?php echo $data["dp"] ?>" alt="" width="40"></td>
                                <td>
                                    <?php echo $data["name"] ?>
                                </td>
                                <td class="fw-medium"><?php echo $data["email"] ?></td>
                                <td class="fw-medium"><?php echo $data["position"] ?></td>
                                <td class="fw-medium px-2">
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#delData<?php echo $data["Id"] ?>">Delete</button>
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updData<?php echo $data["Id"] ?>">Update</button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data["Id"] ?>">
                                        View
                                    </button>



                                </td>
                            </tr>






                            <!-- View Modal starts -->

                            <div class="modal fade" id="exampleModal<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Show Details</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12 w-100 text-center d-flex align-items-center">
                                                <div class="card" style="width: 29rem;">
                                                    <div class="card-body">
                                                        <img src="data:image/;base64,<?php echo $data["dp"] ?>" class="card-img-top" style="width:30%; marging:0 auto">
                                                        <h5 class="card-title"><?php echo $data["name"] ?></h5>
                                                        <p class="card-text"><?php echo $data["email"] ?></p>
                                                        <p class="card-text"><?php echo $data["password"] ?></p>
                                                        <p class="card-text"><?php echo $data["position"] ?></p>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button data-bs-dismiss="modal" type="button" class="btn btn-dark">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- View Modal starts -->







                            <!-- Delete Modal starts -->
                            <!-- Modal -->
                            <form action="../connection.php" method="post">
                                <input type="hidden" name="Id" value="<?php echo $data["Id"] ?>">
                                <div class="modal fade" id="delData<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-danger fw-bold text-center">Are you sure you want to delete this data?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger" name="deleteData">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Delete Modal ends -->





                            <!-- Update Modal starts -->
                            <form action="../connection.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="Id" value="<?php echo $data["Id"] ?>">
                                <div class="modal fade" id="updData<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Name ::</label>
                                                    <input name="name" type="text" class="form-control mb-3" value="<?php echo $data["name"] ?>">
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Email ::</label>
                                                    <input name="email" type="email" class="form-control mb-3" value="<?php echo $data["email"] ?>">
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Password ::</label>
                                                    <input name="password" type="password" class="form-control mb-3" value="<?php echo $data["password"] ?>">
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Profile ::</label>
                                                    <input type="file" class="form-control mb-3" name="profile">
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Position ::</label>
                                                    <input name="position" type="text" class="form-control mb-3" value="<?php echo $data["position"] ?>">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="UpdateData">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            <!-- Update Modal ends -->






                            <!-- Modal -->

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>


    <!-- agent data -->
    <div class="d-flex container justify-content-between flex-wrap" style="margin: 30% 0; padding-top: 10%;">
        <div class="col-lg-5" style="height: 100vh;">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Agent</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap align-middle mb-0">
                            <thead>
                                <tr class="border-2 border-bottom border-dark border-0">
                                    <th scope="col" class="ps-0">Id</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Position</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $query = mysqli_query($con, "select * from administrator where position = 'agent'");
                                foreach ($query as $data) {
                                    $_SESSION["Truncate_Id"] = $data["Id"];
                                ?>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">
                                                <?php echo $data["Id"] ?>
                                            </span>
                                        </th>
                                        <td><img src="data:image/;base64,<?php echo $data["dp"] ?>" alt="" width="40"></td>
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
        <!-- agent data -->


        <!-- User Data -->
        <div class="col-lg-5" style="height: 100vh;">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">User</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap align-middle mb-0">
                            <thead>
                                <tr class="border-2 border-bottom border-dark border-0">
                                    <th scope="col" class="ps-0">Id</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Position</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $query = mysqli_query($con, "select * from administrator where position = 'user'");
                                foreach ($query as $data) {
                                    $_SESSION["Truncate_Id"] = $data["Id"];
                                ?>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">
                                                <?php echo $data["Id"] ?>
                                            </span>
                                        </th>
                                        <td><img src="data:image/;base64,<?php echo $data["dp"] ?>" alt="" width="40"></td>
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
    </div>
    <!-- User Data -->




    <!-- Add Data Modal starts -->
    <!-- Modal -->
    <form action="../connection.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="AddData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control mb-3" type="text" name="name" placeholder="Enter Name">
                        <input class="form-control mb-3" type="email" name="email" placeholder="Enter Email">
                        <input class="form-control mb-3" type="password" name="password" placeholder="Enter Password">
                        <input class="form-control mb-3" type="file" name="dp">
                        <input class="form-control mb-3" type="text" name="position" placeholder="Enter Position">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button name="addD" type="submit" class="btn btn-primary">Add Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Add Data Modal ends-->


<?php
} else if (isset($_SESSION["agent"])) {

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <div class="col-lg-12" style="height: 100vh;">
        <?php
        if (isset($_SESSION["success"])) {
        ?>
            <div id="successAlert" class="alert alert border-0 fw-bold text-white text-center fs-5 text-uppercase" style="background: #3a4752; transition: 0.3s ease-out" role="alert">
                <div class="d-flex justify-content-between align-items-center px-5">
                    <p style="transform: translateY(30%);">
                        <?php
                        echo $_SESSION["success"];
                        ?>
                    </p>
                    <button class="border-0 outline-none text-white fw-bold" style="background: none; display:inline-block" type="button" onclick="closeAlert()">X</button>
                </div>
            </div>
        <?php
        }
        unset($_SESSION["success"]);
        ?>

        <!-- <div class="col-6"></div> -->
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex gap-3 flex-wrap align-items-center gap-5">
                        <h5 class="py-2">Users</h5>
                        <input id="searchUsers" style="width: 20vw!important;" type="text" class="form-control" placeholder="Search By User Name | Email ...">
                    </div>
                    <div class="d-flex gap-3 flex-wrap align-items-center gap-2">
                        <Button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddData">Insert Data</Button>
                    </div>
                </div>

                <table class="table text-nowrap align-middle mb-0" id="showSearchUsers">
                    <thead>
                        <tr class="border-2 border-bottom border-dark border-0">
                            <th scope="col" class="ps-0">Id</th>
                            <!-- <th scope="col">Profile</th> -->
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Position</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                        $query = mysqli_query($con, "SELECT * from administrator where position = 'user'");
                        foreach ($query as $data) {
                        ?>
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">
                                        <?php echo $data["Id"] ?>
                                    </span>
                                </th>
                                <!-- <td><img src="data:image/;base64,<?php echo $data["dp"] ?>" alt="" width="40"></td> -->
                                <td>
                                    <?php echo $data["name"] ?>
                                </td>
                                <td class="fw-medium"><?php echo $data["email"] ?></td>
                                <td class="fw-medium"><?php echo $data["position"] ?></td>
                                <td class="fw-medium px-2">
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#delData<?php echo $data["Id"] ?>">Delete</button>
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updData<?php echo $data["Id"] ?>">Update</button>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $data["Id"] ?>">
                                        View
                                    </button>



                                </td>
                            </tr>






                            <!-- View Modal starts -->

                            <div class="modal fade" id="exampleModal<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Show Details</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12 w-100 text-center d-flex align-items-center">
                                                <div class="card" style="width: 29rem;">
                                                    <div class="card-body">
                                                        <img src="data:image/;base64,<?php echo $data["dp"] ?>" class="card-img-top" style="width:30%; marging:0 auto">
                                                        <h5 class="card-title"><?php echo $data["name"] ?></h5>
                                                        <p class="card-text"><?php echo $data["email"] ?></p>
                                                        <p class="card-text"><?php echo $data["password"] ?></p>
                                                        <p class="card-text"><?php echo $data["position"] ?></p>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button data-bs-dismiss="modal" type="button" class="btn btn-dark">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- View Modal starts -->







                            <!-- Delete Modal starts -->
                            <!-- Modal -->
                            <form action="../connection.php" method="post">
                                <input type="hidden" name="Id" value="<?php echo $data["Id"] ?>">
                                <div class="modal fade" id="delData<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-danger fw-bold text-center">Are you sure you want to delete this data?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger" name="deleteData">Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- Delete Modal ends -->





                            <!-- Update Modal starts -->
                            <form action="../connection.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="Id" value="<?php echo $data["Id"] ?>">
                                <div class="modal fade" id="updData<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Name ::</label>
                                                    <input name="name" type="text" class="form-control mb-3" value="<?php echo $data["name"] ?>">
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Email ::</label>
                                                    <input name="email" type="email" class="form-control mb-3" value="<?php echo $data["email"] ?>">
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Password ::</label>
                                                    <input name="password" type="password" class="form-control mb-3" value="<?php echo $data["password"] ?>">
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Profile ::</label>
                                                    <input type="file" class="form-control mb-3" name="profile">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="UpdateDataa">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            <!-- Update Modal ends -->






                            <!-- Modal -->

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>
    <!-- agent data -->
    <div class="d-flex container justify-content-between flex-wrap" style="margin: 100px 0">
        <div class="col-lg-5" style="height: 100vh;">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">Agent</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap align-middle mb-0">
                            <thead>
                                <tr class="border-2 border-bottom border-dark border-0">
                                    <th scope="col" class="ps-0">Id</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $query = mysqli_query($con, "select * from administrator where position = 'agent'");
                                foreach ($query as $data) {
                                    $_SESSION["Truncate_Id"] = $data["Id"];
                                ?>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">
                                                <?php echo $data["Id"] ?>
                                            </span>
                                        </th>
                                        <td><img src="data:image/;base64,<?php echo $data["dp"] ?>" alt="" width="40"></td>
                                        <td>
                                            <?php echo $data["name"] ?>
                                        </td>
                                        <td class="fw-medium"><?php echo $data["email"] ?></td>
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
        <!-- agent data -->


        <!-- User Data -->
        <div class="col-lg-5" style="height: 100vh;">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="card-title">User</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-nowrap align-middle mb-0">
                            <thead>
                                <tr class="border-2 border-bottom border-dark border-0">
                                    <th scope="col" class="ps-0">Id</th>
                                    <th scope="col">Profile</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Position</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php
                                $query = mysqli_query($con, "select * from administrator where position = 'user'");
                                foreach ($query as $data) {
                                    $_SESSION["Truncate_Id"] = $data["Id"];
                                ?>
                                    <tr>
                                        <th scope="row" class="ps-0 fw-medium">
                                            <span class="table-link1 text-truncate d-block">
                                                <?php echo $data["Id"] ?>
                                            </span>
                                        </th>
                                        <td><img src="data:image/;base64,<?php echo $data["dp"] ?>" alt="" width="40"></td>
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
    </div>
    <!-- User Data -->




    <!-- Add Data Modal starts -->
    <!-- Modal -->
    <form action="../connection.php" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="AddData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input class="form-control mb-3" type="text" name="name" placeholder="Enter Name">
                        <input class="form-control mb-3" type="email" name="email" placeholder="Enter Email">
                        <input class="form-control mb-3" type="password" name="password" placeholder="Enter Password">
                        <input class="form-control mb-3" type="file" name="dp">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                        <button name="addDD" type="submit" class="btn btn-primary">Add Data</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Add Data Modal ends-->
<?php
}
?>

<script>
    const closeAlert = () => {
        const a = document.getElementById("successAlert");
        a.style.display = "none"
    }
</script>