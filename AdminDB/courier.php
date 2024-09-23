<title>Couriers</title>
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
                    <h5 class="py-2">Couriers</h5>
                </div>
                <div class="d-flex gap-3 flex-wrap align-items-center gap-2">
                    <form action="../connection.php" method="post">
                        <Button type="submit" class="btn btn-dark" name="DelAllCourier">Delete All</Button>
                    </form>
                </div>
            </div>

            <table class="table text-nowrap align-middle mb-0 mt-3" id="showShipping">
                <thead>
                    <tr class="border-2 border-bottom border-dark border-0">
                        <th scope="col" class="ps-0">Id</th>
                        <th class="col">Freight Cost</th>
                        <th class="col">Freight Name</th>
                        <th class="col">Freight Image</th>
                        <th class="col">Freight Do</th>
                        <th class="col">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $query = SelectTable("freights_detail");
                    foreach ($query as $data) {
                    ?>
                        <tr>
                            <th scope="row" class="ps-0 fw-medium">
                                <span class="table-link1 text-truncate d-block">
                                    <?php echo $data["Id"] ?>
                                </span>
                            </th>
                            <td>
                                <?php echo "$ " . $data["freight_cost"] ?>
                            </td>
                            <!-- <td>
                                <?php echo $data["u_email"] ?>
                            </td> -->
                            <td class="fw-medium"><?php echo $data["freight_name"] ?></td>
                            <td class="fw-medium">
                                <img width="100" src="data:image/;base64,<?php echo $data["freight_img"] ?>" alt="">
                            </td>
                            <td class="fw-medium"><?php echo $data["do"] ?></td>


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
                                                <label class="mx-2 mb-3 fw-bold">Freight_Name ::</label>
                                                <input value="<?php echo $data["freight_name"] ?>" class="form-control mb-3" type="text" name="fName" placeholder="Freight Name">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">Freight_Cost ::</label>
                                                <input value="<?php echo $data["freight_cost"] ?>" class="form-control mb-3" type="text" name="fCost" placeholder="Freight Cost">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">Freight_Image ::</label>
                                                <input class="form-control mb-3" type="file" name="fImg">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">Freight_Do ::</label>
                                                <input value="<?php echo $data["do"] ?>" class="form-control mb-3" type="text" name="fDo" placeholder="Freight Details">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="UpdateCourier">Update</button>
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




<script>
    const closeAlert = () => {
        const a = document.getElementById("successAlert");
        a.style.display = "none"
    }
</script>