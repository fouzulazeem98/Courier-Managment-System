<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "admindb4");

function Connection()
{
    return mysqli_connect("localhost", "root", "", "admindb4");
}


function SelectTable($Table)
{
    return mysqli_query(Connection(), "select * from $Table");
}

if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);
    $dp = $_FILES["dp"]["tmp_name"];
    $content = file_get_contents($dp);
    $profile = base64_encode($content);
    $query = mysqli_query($con, "select * from administrator where email = '$email' AND name = '$name'");
    if (mysqli_num_rows($query) > 0) {
        $_SESSION["dataTaken"] = "Email is already taken!";
        header("location: register.php");
    } else {
        $query = mysqli_query($con, "INSERT INTO administrator (name,email,password,dp,position)
        VALUES
    ('$name', '$email', '$password', '$profile', 'agent')
    ");
        if ($query) {
            $_SESSION["pass"] = "Account Created Sucessfully!";
            header("location: register.php");
        }
    }
}

if (isset($_POST["login"])) {
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);
    $query = mysqli_query($con, "select * from administrator where email = '$email' AND password = '$password'");
    if (mysqli_num_rows($query) > 0) {
        $converted = mysqli_fetch_array($query);
        if ($converted["position"] == "admin" || $converted["position"] == "main_admin" || $converted["position"] == "super_admin") {
            $_SESSION["pass"] = "Account Login Sucessfull!";
            $_SESSION["admin"] = $converted["name"];
            $_SESSION["admin_em"] = $converted["email"];
            $_SESSION["profile"] = $converted["dp"];
            header("location: ./AdminDB/public.php?index");
        } else if ($converted["position"] == "agent") {
            $_SESSION["agent"] = $converted["name"];
            $_SESSION["profile"] = $converted["dp"];
            $_SESSION["pass"] = "Agent Login Sucessfull!";
            header("location: ./AdminDB/public.php?index");
        } else if ($converted["position"] == "user") {
            $_SESSION["user_Id"] = $converted["Id"];
            $_SESSION["user_email"] = $converted["email"];
            $_SESSION["user_name"] = $converted["name"];
            $_SESSION["pass"] = "User Login Sucessfull!";
            if (isset($_SESSION["courier_Id"])) {
                header("location: service-details.php?crId='" . $_SESSION["courier_Id"] . "'");
            } else {
                header("location: index.php");
            }
        }
    } else {
        $_SESSION["fail"] = "Login Failed!";
        header("location: login.php");
    }
}

if (isset($_POST["addD"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);
    $imgFile = $_FILES["dp"]["tmp_name"];
    $position = $_POST["position"];
    $cont = file_get_contents($imgFile);
    $dp = base64_encode($cont);
    $query = mysqli_query($con, "Insert into administrator (name,email,password,dp,position) VALUES ('$name', '$email', '$password', '$dp', '$position')
    ");
    if ($query) {
        $_SESSION["success"] = "Data Added Sucessfully!";
        header("location: ./AdminDB/public.php?data");
    }
}

// Delete Data 
if (isset($_POST["deleteData"])) {
    $query = mysqli_query($con, "DELETE FROM administrator where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?data");
    }
}
// Delete Data 



// Update Data
if (isset($_POST["UpdateData"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = sha1($_POST["password"]);
    $pro = $_FILES["profile"]["tmp_name"];
    $cont = file_get_contents($pro);
    $profile = base64_encode($cont);
    $position = $_POST["position"];
    $query = mysqli_query($con, "UPDATE administrator set name = '$name', email = '$email', password = '$password', dp = '$profile', position = '$position' where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Updated Sucessfully!";
        header("location: ./AdminDB/public.php?data");
    }
}
// Update Data 


// search Users
if (isset($_POST["searchBtn"])) {
    $search = $_POST["searchBtn"];
    $query = mysqli_query($con, "select * from administrator where name like '%$search%' OR email like '%$search%' OR position like '%$search%'");
    if ($query) {
        echo '
                 <table class="table text-nowrap align-middle mb-0">
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
            ';
        foreach ($query as $data) {
            echo '
                    <tbody class="table">
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">
                                        ' . $data["Id"] . '
                                    </span>
                                </th>
                                <td><img src="data:image/;base64,' . $data["dp"] . '" alt="" width="70"></td>
                                <td>
                                   ' . $data["name"] . '
                                </td>
                                <td class="fw-medium">' . $data["email"] . '</td>
                                <td class="fw-medium">' . $data["position"] . '</td>
                                <td class="fw-medium px-2">
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none"  data-bs-toggle="modal" data-bs-target="#delData' . $data["Id"] . '">Delete</button>
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none"  data-bs-toggle="modal" data-bs-target="#updData' . $data["Id"] . '">Update</button>
                                </td>
                            </tr>








                            <!-- Delete Modal starts -->
                            <!-- Modal -->
                            <form action="../connection.php" method="post">
                                <input type="hidden" name="Id" value=' . $data["Id"] . '>
                                <div class="modal fade" id="delData' . $data["Id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <input type="hidden" name="Id" value=' . $data["Id"] . '>
                                <div class="modal fade" id="updData' . $data["Id"] . '" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Name ::</label>
                                                    <input name="name" type="text" class="form-control mb-3" value=' . $data["name"] . '>
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Email ::</label>
                                                    <input name="email" type="email" class="form-control mb-3" value=' . $data["email"] . '>
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Password ::</label>
                                                    <input name="password" type="password" class="form-control mb-3" value=' . $data["password"] . '>
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Profile ::</label>
                                                    <input type="file" class="form-control mb-3" name="profile">
                                                </div>
                                                <div>
                                                    <label class="mx-2 mb-3 fw-bold">Position ::</label>
                                                    <input name="position" type="text" class="form-control mb-3" value=' . $data["position"] . '>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="UpdateData">Update</button>
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


             ';
        }
    }
}
// search Users



// For Couriers
if (isset($_POST["DelAllCourier"])) {
    $query = mysqli_query($con, "truncate table freights_detail");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?courier");
    }
}

if (isset($_POST["UpdateCourier"])) {
    $fimg = $_FILES["fImg"]["tmp_name"];
    $cont = file_get_contents($fimg);
    $Freight_Img = base64_encode($cont);
    $query = mysqli_query($con, "UPDATE freights_detail set freight_cost = '" . $_POST["fCost"] . "', freight_name = '" . $_POST["fName"] . "', freight_img = '$Freight_Img', do = '" . $_POST["fDo"] . "' where Id = '" . $_POST["Id"] . "' ");
    if ($query) {
        $_SESSION["success"] = "Data Updated Sucessfully!";
        header("location: ./AdminDB/public.php?courier");
    }
}

if (isset($_POST["deleteCourier"])) {
    $query = mysqli_query($con, "DELETE FROM freights_detail where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?courier");
    }
}

// For Shipping



// For Shipping
if (isset($_POST["addShip"])) {
    $Ship_Location = $_POST["sLoc"];
    $Do = $_POST["sDo"];
    $O_ID = rand(1, 1000000);
    $Order_IDD = "#" . $O_ID;
    $query = mysqli_query($con, "INSERT into shipping (shipping_cost,shipping_date,shipping_type,shipping_location,shipping_details,order_Id,u_email)
        VALUES
    ('" . $_POST["sCost"] . "', '" . $_POST["sDate"] . "', '" . $_POST["sType"] . "', '$Ship_Location', '$Do', '$Order_IDD', '" . $_POST["user"] . "')
    ");
    if ($query) {
        $_SESSION["success"] = "Data Inserted Sucessfully!";
        header("location: ./AdminDB/public.php?shipping");
    }
}

if (isset($_POST["DelAllShip"])) {
    $query = mysqli_query($con, "truncate table shipping");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?shipping");
    }
}

if (isset($_POST["UpdateShip"])) {
    $Ship_Cost = $_POST["sCost"];
    $Ship_Date = $_POST["sDate"];
    $Ship_Type = $_POST["sTyp"];
    $query = mysqli_query($con, "UPDATE shipping set shipping_cost = '$Ship_Cost', u_email = '" . $_POST["user"] . "', shipping_date = '$Ship_Date', shipping_type = '$Ship_Type', shipping_location = '" . $_POST["sLoc"] . "' , shipping_details = '" . $_POST["sDo"] . "' where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Updated Sucessfully!";
        header("location: ./AdminDB/public.php?shipping");
    }
}

if (isset($_POST["deleteShpping"])) {
    $query = mysqli_query($con, "DELETE FROM shipping where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?shipping");
    }
}

if (isset($_POST["searchShip"])) {
    $searchShipping = $_POST["searchShip"];
    $query = mysqli_query($con, "SELECT * from shipping where shipping_cost like '%$searchShipping%' OR shipping_date like '%$searchShipping%' OR shipping_type like '%$searchShipping%'");
    if ($query) {
        echo '
                 <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-2 border-bottom border-dark border-0">
                            <th scope="col" class="ps-0">Id</th>
                            <th scope="col">shipping_cost</th>
                            <th scope="col">shipping_date</th>
                            <th scope="col">shipping_type</th>
                        </tr>
                    </thead>
            ';
        foreach ($query as $data) {
            echo '
                    <tbody class="table">
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">
                                        ' . $data["Id"] . '
                                    </span>
                                </th>
                                <td>
                                   ' . $data["shipping_cost"] . '
                                </td>
                                <td class="fw-medium">' . $data["shipping_date"] . '</td>
                                <td class="fw-medium">' . $data["shipping_type"] . '</td>
                                <td class="fw-medium px-2">
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none"  data-bs-toggle="modal" data-bs-target="#delData' . $data["Id"] . '">Delete</button>
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none"  data-bs-toggle="modal" data-bs-target="#updData' . $data["Id"] . '">Update</button>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
             ';
        }
    }
}
// For Shipping



// For branches

if (isset($_POST["addBranch"])) {
    $query = mysqli_query($con, "INSERT into branch (branch_name,branch_code)
        VALUES
    ('" . $_POST["bName"] . "', '" . $_POST["bCode"] . "')
    ");
    if ($query) {
        $_SESSION["success"] = "Data Inserted Sucessfully!";
        header("location: ./AdminDB/public.php?branch");
    }
}


if (isset($_POST["DelAllBranchStaff"])) {
    $query = mysqli_query($con, "truncate table branch_staff");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?branch_staff");
    }
}

if (isset($_POST["delBranch"])) {
    $query = mysqli_query($con, "DELETE FROM branch where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?branch");
    }
}

if (isset($_POST["UpdateBranch"])) {
    $branch_name = $_POST["bName"];
    $branch_code = $_POST["bCode"];
    $query = mysqli_query($con, "UPDATE branch set branch_name = '$branch_name', branch_code = '$branch_code' where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Updated Sucessfully!";
        header("location: ./AdminDB/public.php?branch");
    }
}

if (isset($_POST["searchBranc"])) {
    $searchBranch = $_POST["searchBranc"];
    $query = mysqli_query($con, "SELECT * from branch where branch_name like '%$searchBranch%' OR branch_code like '%$searchBranch%'");
    if ($query) {
        echo '
                 <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-2 border-bottom border-dark border-0">
                            <th scope="col" class="ps-0">Id</th>
                            <th scope="col">branch_name</th>
                            <th scope="col">branch_code</th>
                        </tr>
                    </thead>
            ';
        foreach ($query as $data) {
            echo '
                    <tbody class="table">
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">
                                        ' . $data["Id"] . '
                                    </span>
                                </th>
                                <td>
                                   ' . $data["branch_name"] . '
                                </td>
                                <td class="fw-medium">' . $data["branch_code"] . '</td>
                                <td class="fw-medium px-2">
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none">Delete</button>
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none">Update</button>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
             ';
        }
    }
}
// For branches



// For branchStaff
if (isset($_POST["addBranchStaff"])) {
    $query = mysqli_query($con, "INSERT into branch_staff (physical_staff,remote_staff)
        VALUES
    ('" . $_POST["pStaff"] . "', '" . $_POST["rStaff"] . "')
    ");
    if ($query) {
        $_SESSION["success"] = "Data Inserted Sucessfully!";
        header("location: ./AdminDB/public.php?branch_staff");
    }
}


if (isset($_POST["DelAllBranchStaff"])) {
    $query = mysqli_query($con, "truncate table branch_staff");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?branch_staff");
    }
}

if (isset($_POST["delBranchStaff"])) {
    $query = mysqli_query($con, "DELETE FROM branch_staff where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?branch_staff");
    }
}

if (isset($_POST["updateBranchStaff"])) {
    $Physical_Staff = $_POST["pStaff"];
    $Physical_Remote = $_POST["rStaff"];
    $query = mysqli_query($con, "UPDATE branch_staff set physical_staff = '$Physical_Staff', remote_staff = '$Physical_Remote' where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Updated Sucessfully!";
        header("location: ./AdminDB/public.php?branch_staff");
    }
}

if (isset($_POST["searchBranchstf"])) {
    $searchStaff = $_POST["searchBranchstf"];
    $query = mysqli_query($con, "SELECT * from branch_staff where physical_staff like '%$searchStaff%' OR remote_staff like '%$searchStaff'");
    if ($query) {
        echo '
                 <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-2 border-bottom border-dark border-0">
                            <th scope="col" class="ps-0">Id</th>
                            <th scope="col">branch_name</th>
                            <th scope="col">branch_code</th>
                        </tr>
                    </thead>
            ';
        foreach ($query as $data) {
            echo '
                    <tbody class="table">
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">
                                        ' . $data["Id"] . '
                                    </span>
                                </th>
                                <td>
                                   ' . $data["physical_staff"] . '
                                </td>
                                <td class="fw-medium">' . $data["remote_staff"] . '</td>
                                <td class="fw-medium px-2">
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none">Delete</button>
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none">Update</button>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
             ';
        }
    }
}
// For branchStaff



if (isset($_POST["updateParcel"])) {
    $Parcel_Info = $_POST["pInfo"];
    $Parcel_Weight = $_POST["pWeight"];
    $Parcel_Qty = $_POST["pQty"];
    $Parcel_Status = $_POST["pStatus"];
    $query = mysqli_query($con, "UPDATE shipping set parcel_info = '$Parcel_Info', parcel_weight = '$Parcel_Weight', parcel_qty = '$Parcel_Qty' , parce_status = '$Parcel_Status' where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Updated Sucessfully!";
        header("location: ./AdminDB/public.php?trackParcel");
    }
}

if (isset($_POST["searchParc"])) {
    $searchParcel = $_POST["searchParc"];
    $query = mysqli_query($con, "SELECT * from shipping where parcel_info like '%$searchParcel%' OR parcel_weight like '%$searchParcel' OR parcel_qty like '%$searchParcel%' OR parce_status like '%$searchParcel%' OR u_email like  '%$searchParcel%' ");
    if ($query) {
        echo '
                 <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-2 border-bottom border-dark border-0">
                            <th scope="col" class="ps-0">Id</th>
                            <th scope="col">Parcel Info</th>
                            <th scope="col">Parcel Weight</th>
                            <th scope="col">Parcel Status</th>
                            <th scope="col">Parcel Status</th>
                        </tr>
                    </thead>
            ';
        foreach ($query as $data) {
            echo '
                    <tbody class="table">
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">
                                        ' . $data["Id"] . '
                                    </span>
                                </th>
                                <td>
                                   ' . $data["parcel_info"] . '
                                </td>
                                <td class="fw-medium">' . $data["parcel_weight"] . '</td>
                                <td class="fw-medium">' . $data["parcel_qty"] . '</td>
                                <td class="fw-medium">' . $data["parce_status"] . '</td>
                                <td class="fw-medium">' . $data["u_email"] . '</td>
                                
                                <td class="fw-medium px-2">
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none">Delete</button>
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none">Update</button>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
             ';
        }
    }
}
// For Parcel



// For Reports
if (isset($_POST["DelAllReports"])) {
    $query = mysqli_query($con, "truncate table report");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?report");
    }
}

if (isset($_POST["addReport"])) {
    $query = mysqli_query($con, "INSERT into report (report_type)
    VALUES
('" . $_POST["repTyp"] . "')
");
    if ($query) {
        $_SESSION["success"] = "Data Inserted Sucessfully!";
        header("location: ./AdminDB/public.php?report");
    }
}

if (isset($_POST["delReport"])) {
    $query = mysqli_query($con, "DELETE FROM report where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Deleted Sucessfully!";
        header("location: ./AdminDB/public.php?report");
    }
}


if (isset($_POST["updateReport"])) {
    $Rep_Typ = $_POST["repTyp"];
    $query = mysqli_query($con, "UPDATE report set report_type = '$Rep_Typ' where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Updated Sucessfully!";
        header("location: ./AdminDB/public.php?report");
    }
}


if (isset($_POST["searchRep"])) {
    $searchReport = $_POST["searchRep"];
    $query = mysqli_query($con, "SELECT * from report where report_status like '%$searchReport%' OR user like '%$searchReport%' OR o_Id like '%$searchReport%'");
    if ($query) {
        echo '
                 <table class="table text-nowrap align-middle mb-0">
                    <thead>
                        <tr class="border-2 border-bottom border-dark border-0">
                            <th scope="col" class="ps-0">Id</th>
                            <th scope="col">User</th>
                            <th scope="col">Report Type</th>
                            <th scope="col">Report ID</th>
                        </tr>
                    </thead>
            ';
        foreach ($query as $data) {
            echo '
                    <tbody class="table">
                            <tr>
                                <th scope="row" class="ps-0 fw-medium">
                                    <span class="table-link1 text-truncate d-block">
                                        ' . $data["Id"] . '
                                    </span>
                                </th>
                                <td>
                                   ' . $data["report_status"] . '
                                </td>
                            <td>
                                 ' . $data["user"] . '
                             </td>
                                <td>
                                   ' . $data["o_Id"] . '
                                </td>
                                <td class="fw-medium px-2">
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none">Delete</button>
                                    <button style="background-color:rgb(0,0,0,0.8); color:white; padding:8px 16px; border-radius:30px; border:none">Update</button>
                                </td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
             ';
        }
    }
}
// For Reports






// For Agent
if (isset($_POST["addDD"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $dp = $_FILES["dp"]["tmp_name"];
    $content = file_get_contents($dp);
    $profile = base64_encode($content);
    $query = mysqli_query(Connection(), "INSERT INTO administrator (name,email,password,dp,position)
    VALUES
    ('$name', '$email', '$password', '$profile', 'user')
");
    if ($query) {
        $_SESSION["success"] = "Data Insert Sucessfully!";
        header("location: ./AdminDB/public.php?data");
    }
}


if (isset($_POST["UpdateDataa"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["email"];
    $dp = $_FILES["profile"]["tmp_name"];
    $content = file_get_contents($dp);
    $profile = base64_encode($content);
    $query = mysqli_query($con, "UPDATE administrator set name = '$name', email = '$email', password = '$Parpassword' , dp = '$profile', position = 'user' where Id = '" . $_POST["Id"] . "'");
    if ($query) {
        $_SESSION["success"] = "Data Updated Sucessfully!";
        header("location: ./AdminDB/public.php?data");
    }
}
// For Agent


// Now Managing Website
if (isset($_POST["book"])) {
    $fName = $_POST["fName"];
    $fDo = $_POST["fDo"];
    $fCost = $_POST["fCost"];
    $Branch_Name = $_POST["bName"];
    $o_Id = rand(1, 1000000);
    $order_ID = "#" . $o_Id;
    $_SESSION["ord_Id"] = $order_ID;
    $query = mysqli_query($con, "INSERT INTO shipping (shipping_cost,shipping_type,shipping_location,shipping_details,u_id,order_Id,u_email)
        VALUES
    ('$fCost', '$fName', '$Branch_Name','$fDo', '" . $_SESSION["user_Id"] . "', '$order_ID' , '" . $_SESSION["user_email"] . "')
    ");
    if ($query) {
        $_SESSION["new_cost"] = $_POST["fCost"];
        header("location: index.php");
    }
}



// $Order_Count = 0;
// $Order_Count++;
// $old_order_count = mysqli_query()



// track_shipping and finalizing
if (isset($_POST["finalizeData"])) {
    $Parcel_Info = $_POST["pInfo"];
    $Parcel_Weight = $_POST["pWgh"];
    $Parcel_Qty = $_POST["pQty"];
    // Id
    $query = mysqli_query(Connection(), "UPDATE shipping set parcel_info = '$Parcel_Info', parcel_weight = '$Parcel_Weight', parcel_qty = '$Parcel_Qty', order_count = 1 where Id = '" . $_POST["Id"] . "' AND u_id = '" . $_SESSION["user_Id"] . "'");
    if ($query) {
        $_SESSION["report_Id"] = "set";
        $query3 = mysqli_query($con, "Select * from report where user = '" . $_SESSION["user_email"] . "'");
        if (mysqli_num_rows($query3) > 0) {
            echo "
                    <script>
                        location.assign('report.php')
                    </script>
                ";
        } else {
            $query5 = mysqli_query($con, "select * from shipping where u_email = '" . $_SESSION["user_email"] . "' ");
            if (mysqli_num_rows($query5) > 0) {
                $converted3 = mysqli_fetch_array($query5);
                $_SESSION["ORD_ID"] = $converted3["order_Id"];

                $query2 = mysqli_query($con, "INSERT INTO report (user,o_Id) VALUES 
            ('" . $_SESSION["user_email"] . "', '" . $_SESSION["ORD_ID"] . "')
            ");
                if ($query2) {
                    echo "query sucess!";
                    header("location: index.php");
                }
            }
        }
    }
}
// track_shipping and finalizing


// Now Managing Website
