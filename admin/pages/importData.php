<?php
// Load the database configuration file
// include_once 'dbConfig.php';

include '../../database/config.php';
include '../../includes/uniques.php';
$examid = mysqli_real_escape_string($conn, $_POST['exam_id']);

$question = mysqli_real_escape_string($conn, $_POST['question']);
$answer = mysqli_real_escape_string($conn, $_POST['answer']);





if(isset($_POST['importSubmit'])){

        $opt1 = mysqli_real_escape_string($conn, $_POST['opt1']);
        $opt2 = mysqli_real_escape_string($conn, $_POST['opt2']);
        $opt3 = mysqli_real_escape_string($conn, $_POST['opt3']);
        $opt4 = mysqli_real_escape_string($conn, $_POST['opt4']);
        $opt5 = mysqli_real_escape_string($conn, $_POST['opt5']);
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));



    
    // Allowed mime types
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
    
    // Validate whether selected file is a CSV file
    if(!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)){
        
        // If the file is uploaded
        if(is_uploaded_file($_FILES['file']['tmp_name'])){
            
            // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
            
            // Skip the first line
            fgetcsv($csvFile);
            
            // Parse data from CSV file line by line
            while(($line = fgetcsv($csvFile)) !== FALSE){
                // Get row data
                $examid   = $line[0];
                $question  = $line[2];
                $opt1 = $line[3];
                $opt2 = $line[4];
                $opt3 = $line[5];
                $opt4 = $line[6];
                $opt5 = $line[7];
                $answer = $line[8];
                $image = $line[9];
                
                // Check whether member already exists in the database with the same email
                $prevQuery = "SELECT question_id FROM tbl_senior_questions WHERE examid = '".$line[0]."'";
                $prevResult = $conn->query($prevQuery);
                
                if($prevResult->num_rows > 0){
                    // Update member data in the database
                    $conn->query("UPDATE tbl_senior_questions SET question='$question', option1='$opt1', option2='$opt2', option3='$opt3', option4='$opt4', option5='$opt5', answer='$answer' WHERE question_id='$question_id'");
                }else{
                    // Insert member data in the database
                    $conn->query("INSERT INTO tbl_senior_questions (exam_id, type, question, option1, option2, option3, option4, option5, answer,avatar) VALUES ('$examid', 'MC', '$question', '$opt1', '$opt2', '$opt3', '$opt4', '$opt5', '$answer','$image')");
                }
            }
            
            // Close opened CSV file
            fclose($csvFile);
            
            $qstring = '?status=succ';
        }else{
            $qstring = '?status=err';
        }
    }else{
        $qstring = '?status=invalid_file';
    }

    
}

// Redirect to the listing page
header("location:../senior_exam.php");	

?>