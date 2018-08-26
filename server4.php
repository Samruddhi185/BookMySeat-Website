<?php
session_start();
$dbServername="localhost";
$dbUsername="root";
$dbPass="";
$dbName="bms1";
$errors=array();
//include (home_give.php);
 $db2 = mysqli_connect($dbServername, $dbUsername, $dbPass, $dbName);
 if (!$db2) {
   die("connection failed :" .mysql_error());
 }

 if(isset($_POST['submit4']))
 {

 $trainno=mysqli_real_escape_string($db2, $_POST['trainnos']);
  $stn=mysqli_real_escape_string($db2, $_POST['stations']);
 //$comp=mysqli_real_escape_string($db2, $_POST['comp']);
 $seatno=mysqli_real_escape_string($db2, $_POST['seatnos']);

 if(empty($trainno) || empty($stn) || empty($seatno))
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

 $sql8 = "SELECT * FROM `train_schedule` WHERE `station_name` = '$stn'";
 $result8 = mysqli_query($db2, $sql8);

 if((mysqli_num_rows($result8)) > 0)
 {

   while($row6 = $result8->fetch_assoc()) {
     $stn_id=$row6["station_id"];
}}
echo($stn_id);
echo($seatno);

$sql12 = "DELETE FROM `train_1001` WHERE `seat_avail` = '$seatno' AND `station_id`= '$stn_id'";

/*$sql12= "UPDATE `train_1001`  SET `$seatno` = 'NIL' WHERE `train_1001`.`station_id` = '$stn_id'";

*/
 $ch =mysqli_query($db2, $sql12);
 if(! $ch)
 {
 	//die('could not del : '.mysql_error());

 }
 else
 {
  header('location: home_give.php');
}
 exit();

 }

 }
 else
 {
 header('location: home1.php');
 exit();
 }
 ?>
