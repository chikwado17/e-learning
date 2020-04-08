<?php
include '../../database/config.php';
include '../../includes/uniques.php';
$examid = mysqli_real_escape_string($conn, $_POST['exam_id']);


$question = mysqli_real_escape_string($conn, $_POST['question']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);

if (isset($_GET['type'])) {
$question_type = $_GET['type'];	
if ($question_type == "mc") {	
$opt1 = mysqli_real_escape_string($conn, $_POST['opt1']);
$opt2 = mysqli_real_escape_string($conn, $_POST['opt2']);
$opt3 = mysqli_real_escape_string($conn, $_POST['opt3']);
$opt4 = mysqli_real_escape_string($conn, $_POST['opt4']);
$opt5 = mysqli_real_escape_string($conn, $_POST['opt5']);
$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

$sql = "SELECT * FROM tbl_senior_questions WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
 header("location:../add_senior_exam.php?rp=1185&eid=$examid");
    }
} else {

    $sql = "INSERT INTO tbl_senior_questions (exam_id, type, question, option1, option2, option3, option4, option5, answer,avatar)
    VALUES ('$examid', 'MC', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$opt5', '$answer','$image')";
    

if ($conn->query($sql) === TRUE) {
    header("location:../add_senior_exam.php?rp=0357&eid=$examid");	
} else {
 header("location:../add_senior_exam.php?rp=3903&eid=$examid");	
}

}


}else if($question_type == "fib") {
$sql = "SELECT * FROM tbl_senior_questions WHERE exam_id = '$examid' AND question = '$question'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
header("location:../add_senior_exam.php?rp=1185&eid=$examid");
    }
} else {

$sql = "INSERT INTO tbl_senior_questions (exam_id, type, question, answer)
VALUES ('$examid', 'FB', '$question', '$answer')";

if ($conn->query($sql) === TRUE) {
  header("location:../add_senior_exam.php?rp=0357&eid=$examid");  	
} else {
 header("location:../add_senior_exam.php?rp=3903&eid=$examid");
}


}


}else{
	
}
	
}else{
	
header("location:../");	
	
}


?>