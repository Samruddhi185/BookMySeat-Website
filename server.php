<?php
session_start();
 $db = mysqli_connect('localhost','root','','registration');
 if (!$db) {
   die("connection failed :" .mysql_error());
 }

 $username = $email = $psw1 = $psw2 = "";
 $errors = array();

if (isset($_POST['register'])) 
{
  if (empty($_POST["username"])) 
  {
    array_push( $errors, "*Name is required") ;
  } else 
  {
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $sql = "SELECT * FROM users WHERE USERNAME = '$username'";
     $res = mysqli_query($db, $sql);
     if(mysqli_num_rows($res)>0)
     {
       array_push( $errors, "*Username already exists.");
     }  
  }
  
  if (empty($_POST["email"])) 
  {
  array_push( $errors, "*Email is required.");
  } else 
  {
    $email = mysqli_real_escape_string($db, $_POST["email"]);
  }
    
  if (empty($_POST["psw1"])) {
    array_push( $errors, "*Password is required.");
  } else {
    $psw1 = mysqli_real_escape_string($db, $_POST["psw1"]);
  }
 
  $psw2 = mysqli_real_escape_string($db, $_POST["psw2"]);

  if ($psw1 != $psw2) {
    array_push( $errors, "*The two passwords do not match.");
      }
    if(count($errors)==0)
    {
     $psw = md5($psw1);
     $sql = "INSERT INTO users (USERNAME, EMAIL, PASSWORD) VALUES ('$username', '$email', '$psw')";
    mysqli_query($db, $sql);
    header('location: home1.php');
    }
}
if (isset($_POST['login'])) 
{
  if (empty($_POST["username"])) 
  {
    array_push( $errors, "*Name is required") ;
  } else 
  {
    $username = mysqli_real_escape_string($db, $_POST["username"]);
  }
  if (empty($_POST["psw1"])) {
    array_push( $errors, "*Password is required");
  } else {
    $psw1 = mysqli_real_escape_string($db, $_POST["psw1"]);
  }
  
      if(count($errors)==0)
    {
     $psw = md5($psw1);
     $sql = "SELECT * FROM users WHERE USERNAME = '$username' AND PASSWORD = '$psw'";
     $res = mysqli_query($db, $sql);
     if(mysqli_num_rows($res)== 1)
     {
       $_SESSION['Name'] = $username;
       header('location: home1.php');
     } else  
     {
      array_push( $errors, "*Combiation of username and password is wrong");
     }
    }
}

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['Name']);
  header('location: login.php');
  
}
?>