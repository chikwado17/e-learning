<?php


$q = mysqli_query($con, "SELECT * FROM user_answer WHERE qid='$qid' AND username='$_SESSION[username]' AND eid='$_GET[eid]'") or die("Error222");
if (mysqli_num_rows($q) > 0) {
$row = mysqli_fetch_array($q);
$ans = $row['ans'];
$correctans = $row['correctans'];

if($correctans == $ans){

echo "<h1 style=\"color:green;font-size:20px;text-align:center;font-weight:bold\">Correct Answer</h1>";
}else{
echo "<h1 style=\"color:red;font-size:20px;text-align:center;font-weight:bold\">Incorrect Answer</h1>";
}
}




if status is finished


if (@$_GET['q'] == 'result' && @$_GET['eid']) {
$eid = @$_GET['eid'];
$q = mysqli_query($con, "SELECT * FROM quiz WHERE eid='$eid' ") or die('Error157');
while ($row = mysqli_fetch_array($q)) {
$total = $row['total'];
}
$q = mysqli_query($con, "SELECT * FROM history WHERE eid='$eid' AND username='$username' ") or die('Error157');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
$w = $row['wrong'];
$r = $row['correct'];
$status = $row['status'];
}
if ($status == "finished") {
echo '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';
echo '<tr style="color:darkblue"><td style="vertical-align:middle">Total Questions</td><td style="vertical-align:middle">' . $total . '</td></tr>
<tr style="color:darkgreen"><td style="vertical-align:middle">Correct Answer&nbsp;<span class="glyphicon glyphicon-ok-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $r . '</td></tr> 
<tr style="color:red"><td style="vertical-align:middle">Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $w . '</td></tr>
<tr style="color:orange"><td style="vertical-align:middle">Unattempted&nbsp;<span class="glyphicon glyphicon-ban-arrow" aria-hidden="true"></span></td><td style="vertical-align:middle">' . ($total - $r - $w) . '</td></tr>
<tr style="color:darkblue"><td style="vertical-align:middle">Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td style="vertical-align:middle">' . $s . '</td></tr>';
$q = mysqli_query($con, "SELECT * FROM rank WHERE username='$username' ") or die('Error157');
while ($row = mysqli_fetch_array($q)) {
$s = $row['score'];
echo '<tr style="color:#990000"><td style="vertical-align:middle">&nbsp;</td><td style="vertical-align:middle">' . '</td></tr>';
}
echo '<tr></tr></table></div><div class="panel"><br /><h3 align="center" style="font-family:calibri">:: Detailed Analysis ::</h3><br /><ol style="font-size:20px;font-weight:bold;font-family:calibri;margin-top:20px">';
$q = mysqli_query($con, "SELECT * FROM questions WHERE eid='$_GET[eid]'") or die('Error197');
while ($row = mysqli_fetch_array($q)) {
$question = $row['qns'];
$qid = $row['qid'];
$q2 = mysqli_query($con, "SELECT * FROM user_answer WHERE eid='$_GET[eid]' AND qid='$qid' AND username='$_SESSION[username]'") or die('Error197');
if (mysqli_num_rows($q2) > 0) {
$row1 = mysqli_fetch_array($q2);
$ansid = $row1['ans'];
$correctansid = $row1['correctans'];

$q3 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$ansid'") or die('Error197');
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row2 = mysqli_fetch_array($q3);
$row3 = mysqli_fetch_array($q4);
$ans = $row2['option'];
$correctans = $row3['option'];
} else {
$q3 = mysqli_query($con, "SELECT * FROM answer WHERE qid='$qid'") or die('Error197');
$row1 = mysqli_fetch_array($q3);
$correctansid = $row1['ansid'];
$q4 = mysqli_query($con, "SELECT * FROM options WHERE optionid='$correctansid'") or die('Error197');
$row2 = mysqli_fetch_array($q4);
$correctans = $row2['option'];
$ans = "Unanswered";
}



if ($correctans == $ans && $ans != "Unanswered") {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:lightgreen;padding:10px;word-wrap:break-word;border:2px solid darkgreen;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-ok" style="color:darkgreen"></span></div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
} 
else if ($ans == "Unanswered") {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f7f576;padding:10px;word-wrap:break-word;border:2px solid #b75a0e;border-radius:10px;">' . $question . ' </div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
} 
else {
echo '<li><div style="font-size:16px;font-weight:bold;font-family:calibri;margin-top:20px;background-color:#f99595;padding:10px;word-wrap:break-word;border:2px solid darkred;border-radius:10px;">' . $question . ' <span class="glyphicon glyphicon-remove" style="color:red"></span></div><br />';
echo '<font style="font-size:14px;color:darkgreen"><b>Your Answer: </b></font><font style="font-size:14px;">' . $ans . '</font><br />';
echo '<font style="font-size:14px;color:red"><b>Correct Answer: </b></font><font style="font-size:14px;">' . $correctans . '</font><br />';
}
echo "<br /></li>";
}
echo '</ol>';
echo "</div>";
} else {
die("Thats a 404 Error bro. You are trying to access a wrong page");
}
}

?>