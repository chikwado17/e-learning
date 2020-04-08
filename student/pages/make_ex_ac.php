<?php
include '../../database/config.php';
$lesson_id = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE tbl_lesson SET status='Active' WHERE Lesson_id='$lesson_id'";

if ($conn->query($sql) === TRUE) {
    header("location:../lessons.php?rp=7823");
} else {
    header("location:../lessons.php?rp=1298");
}

$conn->close();
?>
