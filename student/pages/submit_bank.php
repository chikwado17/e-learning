<?php
error_reporting(0);
$total_questions = $_POST['tq'];
$starting_mark = 1;
$mytotal_marks = 0;
$exam_id = $_POST['eid'];
$record = $_POST['ri'];


while ($starting_mark <= $total_questions) {
if (strtoupper(base64_decode($_POST['ran'.$starting_mark.''])) == strtoupper($_POST['an'.$starting_mark.''])) {
$mytotal_marks = $mytotal_marks + 1;	
}else{
	
}
$starting_mark++;
}

$percent_score = ($mytotal_marks / $total_questions) * $total_questions;
$percent_score = floor($percent_score);
$passmark = $_POST['pm'];

if ($percent_score <= $passmark) {
   $status = "PASS";	
   
}
// if ($percent_score >= $passmark) {
// $status = "PASS";	
// }else{
// $status = "FAIL";	
// }

session_start();
$_SESSION['record_id'] = $record;
include '../../database/config.php';
$sql = "UPDATE tbl_bank_records SET score='$percent_score', status='$status' WHERE record_id='$record'";

if ($conn->query($sql) === TRUE) {

	
   header("location:../bank-info.php");
} else {
   header("location:../bank-info.php");
}

$conn->close();
?>
