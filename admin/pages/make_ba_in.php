<?php
include '../../database/config.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE tbl_bank_exams SET status='Inactive' WHERE exam_id='$exid'";

if ($conn->query($sql) === TRUE) {
    header("location:../bank_examinations.php?rp=7823");
} else {
    header("location:../bank_examinations.php?rp=1298");
}

$conn->close();
?>
