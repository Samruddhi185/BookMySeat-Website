<?php
//session_start();
$dbServername="localhost";
$dbUsername="root";
$dbPass="";
$dbName="bms1";
//$errors=array();
//include (home_give.php);
 $db2 = mysqli_connect($dbServername, $dbUsername, $dbPass, $dbName);
 if (!$db2) {
   die("connection failed :" .mysql_error());
 }

if(isset($_POST['submit']))
{
$file = $_FILES['file'];
$fileName = $_FILES['file']['name'];
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$fileError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

$fileExt = explode('.',$fileName);
$fileActExt = strtolower(end($fileExt));

$allowed = array('jpg','jpeg','png');

if(in_array($fileActExt, $allowed))
{
  if($fileError == 0)
  {
    if($fileSize < 1000000)
    {
    $fileNameNew = uniqid('', true).".".$fileActExt;
    $fileDestination = "C:\\xampp\htdocs\bms1\uploadss".$fileNameNew; //add the full path location here eg.in htdocs if you have BMS folder in that create a pictures folder for this
    if(move_uploaded_file($fileTmpName, $fileDestination))
    {
      echo "yes";
      $id = $_SESSION['id_user'];
      $sql = "UPDATE `users` SET `profile_pic`='$fileDestination' WHERE `user_id`='$id'";
      mysqli_query($db2, $sql);
      header("Location:home1.php");

    }
    header("Location:home1.php");
    }
    else
    {
    echo "Your file is too big.";
    }
  }
  else
  {
  echo "There was an error uploading your file.";
  }
}
else
{
echo "You cannot upload of this type!";
}
}
 ?>
