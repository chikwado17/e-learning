<?php
include '../../database/config.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE tbl_senior_examinations SET status='Inactive' WHERE exam_id='$exid'";

if ($conn->query($sql) === TRUE) {
    header("location:../senior_exam.php?rp=7823");
} else {
    header("location:../senior_exam.php?rp=1298");
}

$conn->close();
?>
