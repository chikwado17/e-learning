<?php
include '../../database/config.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tbl_senior_examinations WHERE exam_id='$exid'";

if ($conn->query($sql) === TRUE) {

$sql = "DELETE FROM tbl_senior_questions WHERE exam_id='$exid'";
if ($conn->query($sql) === TRUE) {
} else {
}

    header("location:../senior_exam.php?rp=7823");
} else {
    header("location:../senior_exam.php?rp=1298");
}

$conn->close();
?>
