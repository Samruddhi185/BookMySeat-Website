<?php
session_start();
$errors=array();
//include (home_give.php);
  $db2 = mysqli_connect('localhost','root','','bms1');
 if (!$db2) {
   die("connection failed :" .mysql_error());
 }

 if(isset($_POST['submit2']))
 {

 $trainno=mysqli_real_escape_string($db2, $_POST['train_id']);
 $stn=mysqli_real_escape_string($db2, $_POST['stations']);
 $comp=mysqli_real_escape_string($db2, $_POST['compnos']);
 $seatno=mysqli_real_escape_string($db2, $_POST['seatnos']);
  $leave_time=mysqli_real_escape_string($db2, $_POST['leave_time']);



 if(empty($trainno) || empty($stn) || empty($comp) || empty($seatno) )
 {
 array_push( $errors, "Filling all fields is mandatory.");
 }
 /*if(!pregmatch("/^[1-6]*$/",$trainno))
 {
  array_push( $errors, "Train number invalid");
 }
 if(!pregmatch("/^[1-6]*$",$trainno))
 {
  array_push( $errors, "Seat number invalid");
 }
 */
 if( ($stn!="BORIVALI") && ($stn!="ANDHERI") && ($stn!="BANDRA") && ($stn!="DADAR") && ($stn!="CHURCHGATE") && ($stn!="VIRAR") && ($stn!="VASAI ROAD") && ($stn!="BHAYANDER") && ($stn!="BOMBAY CENTRAL"))
 {
  array_push( $errors, "Station invalid.");
 }


 if(count($errors)==0)
 {
//$sql4 = "SELECT `user_id` FROM `users` WHERE `user_name` = $_SESSION['Name'];";
 //mysqli_query($db2, $sql4);

 $sql4 = "SELECT * FROM `train_schedule` WHERE `station_name`='$stn'";
 $res4 = mysqli_query($db2, $sql4);
 //$stn_id = 0;
 if((mysqli_num_rows($res4)) > 0)
 {

   while($row4 = $res4->fetch_assoc()) {
     $stn_id=$row4["station_id"];
     echo $stn_id;
}
}

/*$name1 = $_SESSION['Name'];
$sql6 = "SELECT * FROM `users` WHERE `user_name` = '$name1'";
$res6 = mysqli_query($db2, $sql6);
if((mysqli_num_rows($res6)) > 0)
{

  while($row6 = $res6->fetch_assoc()) {
    $usrid=$row6["user_id"];
}}*/
$id =  $_SESSION['id_user'];
echo $id;
echo ",";
echo $stn_id;
echo ",";
echo $leave_time;
echo ",";
echo $comp;

$sql7 = "SELECT * FROM `users` WHERE `user_id`='$id'";
 $res7 = mysqli_query($db2, $sql7);
 //$stn_id = 0;
 if((mysqli_num_rows($res7)) > 0)
 {

   while($row7 = $res7->fetch_assoc()) {
     $rpts=$row7["reward_pts"];
     //echo $stn_id;
}
}
$rpts = $rpts +1;

$sql5= "INSERT INTO `train_1001` (`user_id`, `train_id`, `station_id`, `leave_time`, `compartment`, `seat_avail`) VALUES ('$id', '1001', '$stn_id', '$leave_time', '$comp', '$seatno');";
$sql6="UPDATE `users` SET `reward_pts`='$rpts' WHERE `user_id` ='$id'";

 mysqli_query($db2, $sql5);
 mysqli_query($db2, $sql6);
  header('location: home1.php');
 exit();
 }

 }
 else
 {
 header('location: home1.php');
 exit();
 }
 ?>
