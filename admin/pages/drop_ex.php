<?php
include '../../database/config.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tbl_lesson WHERE Lesson_id='$exid'";

if ($conn->query($sql) === TRUE) {

$sql = "DELETE FROM tbl_lesson WHERE Lesson_id='$exid'";
if ($conn->query($sql) === TRUE) {
} else {
}

    header("location:../lessons.php?rp=7823");
} else {
    header("location:../lessons.php?rp=1298");
}

$conn->close();
?>
