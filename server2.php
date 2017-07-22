<?php
session_start();
$dbServername="localhost";
$dbUsername="root";
$dbPass="";
$dbName="trains";
$errors=array();
//include (home_give.php);
 $db2 = mysqli_connect($dbServername, $dbUsername, $dbPass, $dbName);
 if (!$db2) {
   die("connection failed :" .mysql_error());
 }
 
 if(isset($_POST['submit2']))
 {
 
 $trainno=mysqli_real_escape_string($db2, $_POST['trainno']);
  $stn=mysqli_real_escape_string($db2, $_POST['stn']);
 $comp=mysqli_real_escape_string($db2, $_POST['comp']);
 $seatno=mysqli_real_escape_string($db2, $_POST['seatno']);
 


 if(empty($trainno) || empty($stn) || empty($comp) || empty($seatno))
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
  array_push( $errors, "Station invalid");
 }
 
 
 if(count($errors)==0)
 {
$sql5= "UPDATE `TIMETABLE` SET `$seatno` = 'YES' WHERE `TIMETABLE`.`TRAIN_NO` = '$trainno' AND `TIMETABLE`.`STATION` = '$stn'; ";


 mysqli_query($db2, $sql5);
  header('location: reward.php');
 exit(); 

 }
 
 }
 else
 {
 header('location: home1.php');
 exit();
 }
 ?>