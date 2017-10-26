<?php
session_start();
include '../dbh.php';

$uid = $_POST ['uid'];
$pwd = $_POST ['pwd'];



$sql = "SELECT * FROM newuser WHERE uid ='$uid'";
$result = mysqli_query($conn, $sql);




$sql = "SELECT * FROM newuser WHERE uid='$uid' AND pwd='$pwd'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc();
$pwd = $row['pwd'];
//$hash = password_verify($pwd, $hash_pwd);


    if(!$row = mysqli_fetch_assoc($result)){
    
   echo "Your username or password is incorrect!" ;
    
    }

else{
    
     $_SESSION['id'] = $row['id']; 
     header("Location: ../userprofile.php");
}

//header("Location: ../userprofile.php");



