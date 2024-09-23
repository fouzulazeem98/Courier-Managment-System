<title>Track Parcel</title>
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
                    <h5 class="py-2">Parcel</h5>
                    <input id="searchParcel" style="width: 20vw!important;" type="text" class="form-control" placeholder="Search By Parcel Info | Weight | Value...">

                </div>
                
            </div>

            <table class="table text-nowrap align-middle mb-0" id="showParcels">
                <thead>
                    <tr class="border-2 border-bottom border-dark border-0">
                        <th scope="col" class="ps-0">Id</th>
                        <th scope="col" class="ps-0">User</th>
                        <th scope="col">Parcel Info</th>
                        <th scope="col">Parcel Weight</th>
                        <th scope="col">Parcel Qty</th>
                        <th scope="col">Parcel Status</th>
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
                                <?php echo $data["u_email"] ?>
                            </td>
                            <td class="fw-medium"><?php echo $data["parcel_info"] ?></td>
                            <td class="fw-medium"><?php echo $data["parcel_weight"] ?></td>
                            <td class="fw-medium"><?php echo $data["parcel_qty"] ?></td>
                            <td class="fw-medium">
                                <?php
                                if ($data['parce_status'] == "Pending") {
                                ?>
                                    <span style="background-color: #f4e5e5; color:red; padding:4px 8px; ; border-radius:4px"><?php echo $data["parce_status"] ?></span>
                                <?php
                                } else if ($data['parce_status'] == "Accepted By Courier") {
                                ?>
                                    <span style="background-color: #e1ffe1; color:green; padding:4px 8px; ; border-radius:4px"><?php echo $data["parce_status"] ?></span>
                                <?php
                                } else if ($data['parce_status'] == "In Progress") {
                                ?>
                                    <span style="background-color: #fff3c8; color:#ff9b00; padding:4px 8px; ; border-radius:4px"><?php echo $data["parce_status"] ?></span>
                                <?php
                                }
                                ?>
                            </td>
                            <td class="fw-medium px-2">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updParcel<?php echo $data["Id"] ?>">Update</button>
                            </td>
                        </tr>








                        <!-- Delete Modal starts -->


                        <!-- Update Modal starts -->
                        <form action="../connection.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $data["Id"] ?>">
                            <div class="modal fade" id="updParcel<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Parcel</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">Parcel Info ::</label>
                                                <input name="pInfo" type="text" class="form-control mb-3" value="<?php echo $data["parcel_info"] ?>">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">Parcel Weight ::</label>
                                                <input name="pWeight" type="text" class="form-control mb-3" value="<?php echo $data["parcel_weight"] ?>">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">Parcel Qty ::</label>
                                                <input name="pQty" type="text" class="form-control mb-3" value="<?php echo $data["parcel_qty"] ?>">
                                            </div>
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">Parcel Status ::</label>
                                                <input name="pStatus" type="text" class="form-control mb-3" value="<?php echo $data["parce_status"] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="updateParcel">Update</button>
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