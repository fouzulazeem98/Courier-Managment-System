<?php
include("../connection.php");
$query = mysqli_query($con, "select * from shipping where u_email = '" . $_SESSION["user_email"] . "'");
$converted = mysqli_fetch_array($query);
require("./fpdf/fpdf.php");

$pdf = new FPDF("p", "mm", "A3");
$pdf->AddPage();
$pdf->SetFont("Arial", "B", 30);

$pdf->Cell("120", 10, '', 0, 0);
$pdf->Cell("130", 10, "INVOICE", 0, 0);
$pdf->Cell("90", 10, "", 0, 1);

$pdf->SetFont("Arial", "B", 15);
$pdf->Cell(71, 5, "Express Courier", 0, 0);
$pdf->Cell(185, 20, "", 0, 0);
$pdf->Cell(150, 5, "DETAILS", 0, 1);


$pdf->SetFont("Arial", "", 10);
$pdf->Cell(251, 5, "Kingdom Of Saudi Arbia", 0, 0);
$pdf->Cell(15, 5, "Order ID: ", 0, 0);
$pdf->Cell(34, 5, " " . $converted["order_Id"], 0, 1);

$pdf->Cell(120, 5, "Riyadh, RY0123", 0, 0);
$pdf->Cell(25, 1, "Invoice Date : ", 0, 0);
$pdf->Cell(34, 1, $converted["shipping_date"], 0, 1);

$pdf->Cell(130, 5, "", 0, 0);


$pdf->SetFont("Arial", "B", 15);
// $pdf->Cell(59, 5, "", 0, 0);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(189, 10, "", 0, 1);

$pdf->Cell(50, 10, "", 0, 1);

$pdf->SetFont("Arial", "B", 10);


$pdf->Cell(20, 8, "Id", 1, 0, "C");
$pdf->Cell(30, 8, "Email", 1, 0, "C");
$pdf->Cell(40, 8, "Cost", 1, 0, "C");
$pdf->Cell(50, 8, "Date", 1, 0, "C");
$pdf->Cell(60, 8, "Ship  Name", 1, 0, "C");
$pdf->Cell(80, 8, "Location", 1, 1, "C");

$pdf->SetFont("Arial", "", 10);
foreach ($query as $data) {
    $pdf->Cell(20, 12, $data["Id"], 1, 0);
    $pdf->Cell(30, 12, $_SESSION["user_email"], 1, 0);
    $pdf->Cell(40, 12, $data["shipping_cost"], 1, 0, "R");
    $pdf->Cell(50, 12, $data["shipping_date"], 1, 0, "R");
    $pdf->Cell(60, 12, $data["shipping_type"], 1, 0, "R");
    $pdf->Cell(80, 12, $data["shipping_location"], 1, 1, "R");
}

$pdf->Cell(50, 40, "", 0, 1);

$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(20, 8, "Id", 1, 0, "C");
$pdf->Cell(30, 8, "Parcel Weight", 1, 0, "C");
$pdf->Cell(40, 8, "Parcel Info", 1, 0, "C");
$pdf->Cell(50, 8, "Parcel Qty", 1, 0, "C");
$pdf->Cell(60, 8, "Parcel Status", 1, 0, "C");
$pdf->Cell(80, 8, "Order ID", 1, 1, "C");


$queryy = mysqli_query($con, "select * from shipping where u_id = '" . $_SESSION["user_Id"] . "' AND order_Id != '" . $_SESSION["ord_Id"] . "'");
$convt = mysqli_fetch_array($queryy);

$pdf->SetFont("Arial", "", 10);
$query2 = mysqli_query($con, "Select * from shipping where u_email = '" . $_SESSION["user_email"] . "' ");
if (mysqli_num_rows($query2) > 0) {
    foreach ($query as $data2) {
        $pdf->Cell(20, 12, $data2["Id"], 1, 0);
        $pdf->Cell(30, 12, $data2["parcel_weight"], 1, 0);
        $pdf->Cell(40, 12, $data2["parcel_info"], 1, 0, "R");
        $pdf->Cell(50, 12, $data2["parcel_qty"], 1, 0, "R");
        $pdf->Cell(60, 12, $data2["parce_status"], 1, 0, "R");
        $pdf->Cell(80, 12, $data2["order_Id"], 1, 1, "R");
        $value = $_SESSION["new_cost"] + $convt["shipping_cost"];
    }
    $pdf->Cell(280, 12, "Total :: $ " . $value, 1, 1, "R");
}
$pdf->Output();
