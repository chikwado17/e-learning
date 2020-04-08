<?php
    include 'includes/check_user.php'; 
    include 'includes/check_reply.php';
    include '../database/config.php';

    
    $output = '';

if(isset($_POST["download_result"])){


        $sql = "SELECT * FROM tbl_assessment_records ORDER BY exam_id DESC";
        $result = $conn->query($sql);

    if(mysqli_num_rows($result) > 0){

        $output .= '
        
        <table border="1">
        <thead>
            <tr>
                <th>Student Name</th>
                <th>Class</th>
                <th>Exam Name</th>
                <th>Score</th>
                <th>Date</th>
            </tr>
    
        
        ';

        while($row = $result->fetch_assoc()) {

            $output .= '
        
            <tr>
                <td>'.$row['student_name'].'</td>
                <td>'.$row['category'].'</td>
                <td>'.$row['exam_name'].'</td>
                <td>'.$row['score'].'/'.$row['passmark'].' </td>
                <td>'.$row['date'].'</td>
            <tr/>
            ';


        }


        $output .= '</thead>';
        header("Content-Type:application/xls");
        header("Content-Disposition:attachment; filename=Exam Result.xls");
        echo $output;

    }

}



?>