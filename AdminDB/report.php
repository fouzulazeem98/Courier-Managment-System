<title>Report</title>
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
                    <h5 class="py-2">Reports</h5>
                    <input id="searchReport" style="width: 20vw!important;" type="text" class="form-control" placeholder="Search By Report Type...">
                </div>
                <div class="d-flex gap-3 flex-wrap align-items-center gap-2">
                    <form action="../connection.php" method="post">
                        <Button type="submit" class="btn btn-dark" name="DelAllReports">Delete All</Button>
                    </form>
                </div>
            </div>

            <table class="table text-nowrap align-middle mb-0" id="showReports">
                <thead>
                    <tr class="border-2 border-bottom border-dark border-0">
                        <th scope="col" class="ps-0">Id</th>
                        <th scope="col">Report Type</th>
                        <th scope="col">User</th>
                        <th class="col">Report ID</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                    $query = SelectTable("report");
                    foreach ($query as $data) {
                    ?>
                        <tr>
                            <th scope="row" class="ps-0 fw-medium">
                                <span class="table-link1 text-truncate d-block">
                                    <?php echo $data["Id"] ?>
                                </span>
                            </th>

                            <td>
                                <?php echo $data["report_status"] ?>
                            </td>
                            <td>
                                <?php echo $data["user"] ?>
                            </td>
                            <td>
                                <?php echo $data["o_Id"] ?>
                            </td>

                            <!-- <td class="fw-medium">
                                
                            </td> -->
                            <td class="fw-medium px-2">
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#delRep<?php echo $data["Id"] ?>">Delete</button>
                                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#updRep<?php echo $data["Id"] ?>">Update</button>
                            </td>
                        </tr>








                        <!-- Delete Modal starts -->
                        <!-- Modal -->
                        <form action="../connection.php" method="post">
                            <input type="hidden" name="Id" value="<?php echo $data["Id"] ?>">
                            <div class="modal fade" id="delRep<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Parcel</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-danger fw-bold text-center">Are you sure you want to delete this data?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger" name="delReport">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Delete Modal ends -->





                        <!-- Update Modal starts -->
                        <form action="../connection.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="Id" value="<?php echo $data["Id"] ?>">
                            <div class="modal fade" id="updRep<?php echo $data["Id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Report</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div>
                                                <label class="mx-2 mb-3 fw-bold">Report Type ::</label>
                                                <input name="repStatus" type="text" class="form-control mb-3" value="<?php echo $data["report_status"] ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary" name="updateReport">Update</button>
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
    <div class="modal fade" id="addRep" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Report</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input class="form-control mb-3" type="text" name="repTyp" placeholder="Report Type">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                    <button name="addReport" type="submit" class="btn btn-primary">Add Report</button>
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