<title>Shipping</title>
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
                    <h5 class="py-2">Shipping</h5>
                    <input id="searchShipping" style="width: 20vw!important;" type="text" class="form-control" placeholder="Search By Cost | Date | Type ...">
                </div>
                <div class="d-flex gap-3 flex-wrap align-items-center gap-2">
                    <form action="../connection.php" method="post">
                        <Button type="submit" class="btn btn-dark" name="DelAllShip">Delete All</Button>
                    </form>

                    <Button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#AddShpping">Insert Data</Button>
                </div>
            </div>

            <table class="table text-nowrap align-middle mb-0 mt-3" id="showShipping">
                <thead>
                    <tr class="border-2 border-bottom border-dark border-0">
                        <th scope="col" class="ps-0">Id</th>
                        <th scope="col">Ship Cost</th>
                        <th scope="col">User</th>
                        <th scope="col">Ship Date</th>
                        <th scope="col">Ship Type</th>
                        <th scope="col">Ship Location</th>
                        <th scope="col">Ship Do</th>
                        <th scope="col">Order ID</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $query = SelectTable("shipping");
                    foreach ($query as $data) {
                    ?>
                        <tr>
                            <th scope="row" class="ps-0 fw-medium">
                                <span class="table-link1 text-truncate d-block">
                                    <?php echo $data["Id"] ?>
                                </span>
                            </th>
                            <td>
                                <?php echo "$ " . $data["shipping_cost"] ?>
                            </td>
                            <td>
                                <?php echo $data["u_email"] ?>
                            </td>
                            <td class="fw-medium"><?php echo $data["shipping_date"] ?></td>
                            <td class="fw-medium"><?php echo $data["shipping_type"] ?></td>
                            <td class="fw-medium"><?php echo $data["shipping_location"] ?></td>
                            <td class="fw-medium"><?php echo $data["shipping_details"] ?></td>
                            <td class="fw-medium"><?php echo $data["order_Id"] ?></td>


                            <td class="fw-medium py-5">
                                <button class="border-0 bg-light mx-2" data-bs-toggle="modal" data-bs-target="#delShip<?php echo $data["Id"] ?>"><i class="fa-solid fa-circle-xmark"></i></button>
                                <button class="border-0 bg-light" data-bs-toggle="modal" data-bs-target="#updShip<?php echo $data["Id"] ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                            </td>
                        </tr>








                        <!-- Delete Modal starts -->
                        <!-- Modal -->
                        <form action="../connection.php" method="post">
                            <input type="hidden" name="Id" value="<?php echo $data["Id"] ?>">
                            <div class="modal fade" id="delShip<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Shipping</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-danger fw-bold text-center">Are you sure you want to delete this data?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" name="deleteShpping">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Delete Modal ends -->





                        <!-- Update Modal starts -->
                        <form action="../connection.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $data["Id"] ?>">
                            <div class="modal fade" id="updShip<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Ship</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">shipping_cost ::</label>
                                                <input name="sCost" type="text" class="form-control mb-3" value="<?php echo $data["shipping_cost"] ?>">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">User ::</label>
                                                <input name="user" type="text" class="form-control mb-3" value="<?php echo $data["u_email"] ?>">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">shipping_date ::</label>
                                                <input name="sDate" type="date" class="form-control mb-3" value="<?php echo $data["shipping_date"] ?>">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">shipping_type ::</label>
                                                <input name="sTyp" type="text" class="form-control mb-3" value="<?php echo $data["shipping_type"] ?>">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">shipping_location ::</label>
                                                <input name="sLoc" type="text" class="form-control mb-3" value="<?php echo $data["shipping_location"] ?>">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">shipping_details ::</label>
                                                <input name="sDo" type="text" class="form-control mb-3" value="<?php echo $data["shipping_details"] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="UpdateShip">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <!-- Update Modal ends -->
                    <?php
                    }
                    ?>
                </tbody>
            </table>


        </div>
    </div>
</div>
</div>


<!-- Add Data Modal starts -->
<!-- Modal -->
<form action="../connection.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="AddShpping" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Shipping</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control mb-3" type="text" name="sCost" placeholder="Ship Cost">
                    <input class="form-control mb-3" type="date" name="sDate" placeholder="Ship Date">
                    <input class="form-control mb-3" type="text" name="sType" placeholder="Ship Type">
                    <input class="form-control mb-3" type="text" name="sLoc" placeholder="Ship Location">
                    <input class="form-control mb-3" type="text" name="sDo" placeholder="Ship Detail">
                    <input class="form-control mb-3" type="text" name="OID" placeholder="Order ID">
                    <input class="form-control mb-3" type="text" name="user" placeholder="User">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button name="addShip" type="submit" class="btn btn-primary">Add Shipping</button>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Add Data Modal ends-->

<script>
    const closeAlert = () => {
        const a = document.getElementById("successAlert");
        a.style.display = "none"
    }
</script>