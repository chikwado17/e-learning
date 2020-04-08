<?php
include '../../database/config.php';
$exid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tbl_teacher WHERE Lesson_id='$exid'";

if ($conn->query($sql) === TRUE) {

$sql = "DELETE FROM tbl_teacher WHERE Lesson_id='$exid'";
if ($conn->query($sql) === TRUE) {
} else {
}

    header("location:../recieved.php?rp=7823");
} else {
    header("location:../recieved.php?rp=1298");
}

$conn->close();
?>
