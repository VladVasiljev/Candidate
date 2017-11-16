<?php
session_start();
include '../dbh.php';
$name = $_POST ['name'];
$username = $_POST ['username'];
$pwd = $_POST ['pwd'];
$industry = $_POST['industry'];
$position = $_POST['position'];


if(empty($name)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($username)){
    header("Location: ../signup.php?error=empty");
    exit();
}

if(empty($pwd)){
    header("Location: ../signup.php?error=empty");
    exit();
}


if(empty($industry)){
    header("Location: ../signup.php?error=empty");
    exit();
}
    else{
        $sql = "SELECT username FROM company WHERE username='$username'";
        $result = $conn->query($sql);
        $uidcheck = mysqli_num_rows($result);
        if($uidcheck > 0){
           
          header("Location: ../companysignup.php?error=username");
            
    exit();  
        } else{
               
               $sql = "INSERT INTO company (name, username, pwd, industry, position) 
VALUES ('$name', '$username',  '$pwd', '$industry', '$position')";
$result = mysqli_query($conn, $sql);

header("Location: ../home.php"); 
        }
        
     
     
    }

