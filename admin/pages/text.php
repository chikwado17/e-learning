                    // $sql = "INSERT INTO tbl_lesson (Lesson_id, LessonTitle, LessonChapter, Category, section, date, type, FileLocation)
                    // VALUES ('$lesson_id', '$title', '$subject', '$category', '$section', '$date', '$type', '$target_file')";
        
                // if ($conn->query($sql) === TRUE) {
                // header("location:../lessons.php?rp=2932");
                // } else {
                // header("location:../lessons.php?rp=7788");
                // }

			
      
// $targetDir = "uploads/";
// $fileName = basename($_FILES["file"]["name"]);
// $targetFilePath = $targetDir . $fileName;
// $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

// if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){

//     $allowTypes = array('jpg','png','jpeg','gif','pdf','docs','mp4');


//     if(in_array($fileType, $allowTypes)){
//         // Upload file to server
//         if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){


//             $sql = "INSERT INTO tbl_lesson (Lesson_id, LessonTitle, LessonChapter, Category, section, date, type, FileLocation)
//             VALUES ('$lesson_id', '$title', '$subject', '$category', '$section', '$date', '$type', '$fileName')";

//         if ($conn->query($sql) === TRUE) {
//         header("location:../lessons.php?rp=2932");
//         } else {
//         header("location:../lessons.php?rp=7788");
//         }



//         } 

//     }


// }
            // Insert image file name into database
            // $insert = $db->query("INSERT into images (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
//             if($insert){
//                 $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
//             }else{
//                 $statusMsg = "File upload failed, please try again.";
//             } 
//         }else{
//             $statusMsg = "Sorry, there was an error uploading your file.";
//         }
//     }else{
//         $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
//     }
// }else{
//     $statusMsg = 'Please select a file to upload.';
// }