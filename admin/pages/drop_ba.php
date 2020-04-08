<?php
include '../../database/config.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tbl_bank_exams WHERE exam_id='$exid'";

if ($conn->query($sql) === TRUE) {

$sql = "DELETE FROM tbl_bank WHERE exam_id='$exid'";
if ($conn->query($sql) === TRUE) {
} else {
}

    header("location:../bank_examinations.php?rp=7823");
} else {
    header("location:../bank_examinations.php?rp=1298");
}

$conn->close();
?>
