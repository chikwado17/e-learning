<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';

$lesson_id = 'EX-'.get_rand_numbers(6).'';

$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$title = ucwords(mysqli_real_escape_string($conn, $_POST['title']));

$subject = mysqli_real_escape_string($conn, $_POST['subject']);

$category = mysqli_real_escape_string($conn, $_POST['category']);

// $section = ucwords(mysqli_real_escape_string($conn, $_POST['section']));

// $date = mysqli_real_escape_string($conn, $_POST['date']);

$type_file = mysqli_real_escape_string($conn, $_POST['type']);


            $target_dir = "../../admin/pages/uploads/";
		    $target_file = $target_dir  . basename($_FILES["file"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			
			if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif" || $imageFileType != "docs" || $imageFileType != "mp4") {
				 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    



        $sql = "SELECT * FROM tbl_teacher WHERE AssessmentTitle = '$title' AND FileLocation = '$target_file'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
        header("location:../lessons.php?rp=1185");
            }
        } else {

        $sql = "INSERT INTO tbl_teacher (Lesson_id, fname, lname, AssessmentTitle, AssessmentChapter, Category, type_file, FileLocation,status)
        VALUES ('$lesson_id', '$fname','$lname','$title', '$subject', '$category', '$type_file', '$target_file', 'Active')";

        if ($conn->query($sql) === TRUE) {
        header("location:../send-to-teacher.php?rp=2932");
        } else {
        header("location:../send-to-teacher.php?rp=7788");
        }


        }
    } 
}
        
    
$conn->close();
?>
