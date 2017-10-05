<?php
session_start();
include '../dbh.php';

$username = $_POST ['username'];
$pwd = $_POST ['pwd'];

$sql = "SELECT * FROM company WHERE username ='$username'";
$result = mysqli_query($conn, $sql);



$sql = "SELECT * FROM company WHERE username='$username' AND pwd='$pwd'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc();
$pwd = $row['pwd'];
//$hash = password_verify($pwd, $hash_pwd);


    if(!$row = mysqli_fetch_assoc($result)){
    
   echo "Your username or password is incorrect!" ;
        
    }

else{
    
     $_SESSION['cid'] = $row['cid']; 
     echo  $_SESSION['cid'];
    
}

header("Location: ../companyprofile.php");



