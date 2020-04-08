<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include '../../database/config.php';
include '../../includes/uniques.php';

$lesson_id = 'EX-'.get_rand_numbers(6).'';

$title = ucwords(mysqli_real_escape_string($conn, $_POST['title']));

$subject = mysqli_real_escape_string($conn, $_POST['subject']);

$category = mysqli_real_escape_string($conn, $_POST['category']);

$section = ucwords(mysqli_real_escape_string($conn, $_POST['section']));

$date = mysqli_real_escape_string($conn, $_POST['date']);

$type_file = mysqli_real_escape_string($conn, $_POST['type']);


            $target_dir = "uploads/";
		    $target_file = $target_dir  . basename($_FILES["file"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
			
			if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg" || $imageFileType != "gif" || $imageFileType != "docs" || $imageFileType != "mp4") {
				 if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    



        $sql = "SELECT * FROM tbl_lesson WHERE LessonTitle = '$title' AND FileLocation = '$target_file'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
        header("location:../lessons.php?rp=1185");
            }
        } else {

        $sql = "INSERT INTO tbl_lesson (Lesson_id, LessonTitle, LessonChapter, Category, section, date, type_file, FileLocation)
        VALUES ('$lesson_id', '$title', '$subject', '$category', '$section', '$date', '$type_file', '$target_file')";

        if ($conn->query($sql) === TRUE) {
        header("location:../lessons.php?rp=2932");
        } else {
        header("location:../lessons.php?rp=7788");
        }


        }
    } 
}
        
    
$conn->close();
?>
