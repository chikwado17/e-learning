<?php 
date_default_timezone_set('Africa/Dar_es_salaam');
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
include '../includes/uniques.php';
if (isset($_SESSION['current_examid'])) {
include '../database/config.php';
$exam_id = $_SESSION['current_examid'];	
$retake_status = $_SESSION['student_retake'];


$sql = "SELECT * FROM tbl_bank_exams WHERE exam_id = '$exam_id' AND category = '$mycategory' AND status = 'Active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $exam_name =$row['exam_name'];
	$subject = $row['subject'];
	$deadline = $row['date'];
    $duration = $row['duration'];
    $mycategory = $row['category'];
	$passmark = $row['passmark'];
	$reexam = $row['re_exam'];
	$terms = $row['terms'];
	$status = $row['status'];
	$today_date = date('Y/m/d');
    $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));
	
	$today_date = date('m/d/Y');
    }
} else {
header("location:./");	
}
}else{
header("location:./");	
}



$sql = "SELECT * FROM tbl_bank WHERE question_id = '$question_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    // header("location:./take-bank.php?id=$exam_id");
    }
} 

// else {
// $myname = "$myfname $mylname";
// $recid = 'RS'.get_rand_numbers(14).'';

// $sql = "INSERT INTO tbl_bank_records (record_id, student_id, student_name, category, subject, passmark,exam_name, exam_id, score, status, next_retake, date)
// VALUES ('$recid', '$myid', '$myname', '$mycategory', '$subject', '$passmark', '$exam_name', '$exam_id', '0', 'FAIL', '$next_retake', '$today_date')";

// if ($conn->query($sql) === TRUE) {

// } else {

// }

// }

?>
<!DOCTYPE html>
<html>
    
<head>
        
    
        <title>PSIS | Examination</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/snack.css" rel="stylesheet" type="text/css"/>
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
    </head>
	<body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>   class="page-header-fixed page-horizontal-bar" >
        <div class="overlay"></div>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile">
				<?php 
				if ($myavatar == NULL) {
				print' <img width="60" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
				}else{
				echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" width="60" alt="'.$myfname.'"/>';	
				}
						
				?>
				<span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span></div>
                <div class="profile-menu-list">
                    <a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
                    <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>

        <main class="page-content content-wrap container">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="sidebar-pusher">
                        <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                    <div class="logo-box">
                        <a class="logo-text"><span><div id="quiz-time-left"></div></span></a>
                    </div>

                    <div class="topmenu-outer">
                        <div class="top-menu">
						 <ul class="nav navbar-nav navbar-left">


                            </ul>
                            <ul class="nav navbar-nav navbar-right">


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic" data-toggle="dropdown">
                                        <span class="user-name"><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><i class="fa fa-angle-down"></i></span>
										<?php 
						                if ($myavatar == NULL) {
						                print' <img class="img-circle avatar"  width="40" height="40" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
						                }else{
						                echo '<img width="40" height="40" src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle avatar"  alt="'.$myfname.'"/>';	
						                }
						
						                ?>
                                    </a>
                                    <ul class="dropdown-menu dropdown-list" role="menu">
                                        <li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                                        <li role="presentation"><a href="logout.php"><i class="fa fa-sign-out m-r-xs"></i>Log out</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="logout.php" class="log-out waves-effect waves-button waves-classic">
                                        <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                                    </a>
                                </li>
                                <li>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="horizontal-bar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <a href="javascript:void(0);" id="profile-menu-link">
                                <div class="sidebar-profile-image">
								<?php 
						        if ($myavatar == NULL) {
						        print' <img class="img-circle img-responsive" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
						        }else{
						        echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" class="img-circle img-responsive"  alt="'.$myfname.'"/>';	
						        }
						
						        ?>
                       
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><br><small>PSIS Student</small></span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        <li><a href="./" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                        <li><a href="lessons.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Lessons</p></a></li>
                        <li><a href="send-to-teacher.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Send To Teacher</p></a></li>
                        <li><a href="examinations-bank.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Class Work</p></a></li>
                        <li><a href="results-bank.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Class Work Results</p></a></li>
                    </ul>
                </div>
            </div>
            <div class="page-inner">
                <div class="page-title">
                    <h3>Question Review </h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="./">Home</a></li>
                            <li><a href="examinations.php">Examinations</a></li>
                            <li class="active"><?php echo "$exam_name"; ?></li>
                        </ol>
                    </div>
                </div>
                <div class="page-inner">
                <div class="page-title">
                    <h3 style="text-align:center;color:green">Go Through For The Correct Answers!</h3> 
                </div>
                <div id="main-wrapper">
                    <div class="row">
                                <div class="panel panel-white">
                                    <div class="panel-body">
                                        <div class="tabs-below" role="tabpanel">
                                       <form action="" method="POST" name="quiz" id="quiz_form" >
                                            <div class="tab-content">
											<?php 
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_bank WHERE exam_id = '$exam_id'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                            $qno = 1;
                                            while($row = $result->fetch_assoc()) {
												$qsid = $row['question_id'];
												$qs = $row['question'];
												$type = $row['type'];
												$op1 = $row['option1'];
												$op2 = $row['option2'];
												$op3 = $row['option3'];
                                                $op4 = $row['option4'];
                                                $op5 = $row['option5'];
												$ans = $row['answer'];
                                               

                                                
 
                                    
 
                
                                            if ($type == "FB") {
											if ($qno == "1") {
                                        
											print '
                                            <div role="tabpanel" class="tab-pane active fade in" id="tab'.$qno.'">
                                            
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="text" name="an'.$qno.'"  class="form-control" placeholder="Enter your answer" autocomplete="off">
										
                                             </div>
                                            ';	
                                           
											}else{
											print '
											<div role="tabpanel" class="tab-pane fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p><input type="text" name="an'.$qno.'"  class="form-control" placeholder="Enter your answer" autocomplete="off">
					                        
                                             </div>
											';		
											}
                                           
											$qno = $qno + 1;	
											}else{
											
											if ($qno == "1") {

                                            print '
                                            
                                            <div role="tabpanel" class="tab-pane active fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p>A <input type="radio"'; if($ans == "option1") { print 'checked'; } print ' value="'.$op1.'"> '.$op1.'</p>
											 <p>B <input type="radio"'; if($ans == "option2") { print 'checked'; } print ' value="'.$op2.'"> '.$op2.'</p>
											 <p>C <input type="radio"'; if($ans == "option3") { print 'checked'; } print ' value="'.$op3.'"> '.$op3.'</p>
                                             <p>D <input type="radio"'; if($ans == "option4") { print 'checked'; } print ' value="'.$op4.'"> '.$op4.'</p>
                                             <p>E <input type="radio"'; if($ans == "option5") { print 'checked'; } print ' value="'.$op5.'"> '.$op5.'</p>
											
                                             </div>
                                            ';	
                                           
											}else{
											print '
                                            <div role="tabpanel" class="tab-pane fade in" id="tab'.$qno.'">
                                             <p><b>'.$qno.'.</b> '.$qs.'</p>
											 <p>A <input type="radio"'; if($ans == "option1") { print 'checked'; } print ' value="'.$op1.'"> '.$op1.'</p>
											 <p>B <input type="radio"'; if($ans == "option2") { print 'checked'; } print ' value="'.$op2.'"> '.$op2.'</p>
											 <p>C <input type="radio"'; if($ans == "option3") { print 'checked'; } print ' value="'.$op3.'"> '.$op3.'</p>
                                             <p>D <input type="radio"'; if($ans == "option4") { print 'checked'; } print ' value="'.$op4.'"> '.$op4.'</p>
                                             <p>E <input type="radio"'; if($ans == "option5") { print 'checked'; } print ' value="'.$op5.'"> '.$op5.'</p>
											
                                          
                                             </div>
                                            ';
                                           
											}

											$qno = $qno + 1;	

											
											}

                                            }

                                            
                                    
                                            } else {

                                               
 
                                            }
											
											?>




                                            </div>			
                                            <ul class="nav nav-tabs" role="tablist">
											<?php 
											include '../database/config.php';
											$sql = "SELECT * FROM tbl_bank WHERE exam_id = '$exam_id'";
                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                            $qno = 1;
											$total_questions = 0;
                                            while($row = $result->fetch_assoc()) {
											$total_questions++;
											if ($qno == "1") {
											print '<li role="presentation" class="active"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">'.$qno.'</a></li>';	
											}else{
											print '<li role="presentation"><a href="#tab'.$qno.'" role="tab" data-toggle="tab">'.$qno.'</a></li>';		
											}

											$qno = $qno + 1;
                                            }
                                            } else {
 
                                            }
											
											?>
                                            
											
                                            </ul>
											

                                        </div>
								<br></form>

                               </div>
                                </div>  
                    </div>
                </div>
                    
            </div>
        </main>
		<?php if ($ms == "1") {
?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php	
}else{
	
}
?>
        <div class="cd-overlay"></div>
	

        <script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="../assets/plugins/pace-master/pace.min.js"></script>
        <script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="../assets/js/modern.min.js"></script>
     

    </body>

</html>


