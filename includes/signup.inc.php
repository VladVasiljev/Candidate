<?php
session_start();
include '../dbh.php';
$first = $_POST ['first'];
$last = $_POST ['last'];
$uid = $_POST ['uid'];
$pwd = $_POST ['pwd'];
$email = $_POST['email'];
$years = $_POST['years'];
$industry = $_POST['industry'];
<<<<<<< HEAD
$bio = $_POST['bio'];
$userPicture =$_POST['userPic'];
=======

>>>>>>> 4a3ac5032956ef1d0c33fd7e32a0b7b3ac5807dd

if(empty($first)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($last)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($uid)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($pwd)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($email)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($years)){
    header("Location: ../signup.php?error=empty");
    exit();
}
if(empty($industry)){
    header("Location: ../signup.php?error=empty");
    exit();
}
    else{
        $sql = "SELECT uid FROM newuser WHERE uid='$uid'";
        $result = $conn->query($sql);
        $uidcheck = mysqli_num_rows($result);
        if($uidcheck > 0){
          header("Location: ../signup.php?error=username");
    exit();  
        } else{
               
<<<<<<< HEAD
               $sql = "INSERT INTO newuser (first, last, uid, pwd, email, years, industry, bio, userPic) 
VALUES ('$first', '$last', '$uid', '$pwd', '$email','$years','$industry', '$bio','$userPicture')";
=======
               $sql = "INSERT INTO newuser (first, last, uid, pwd, email, years, industry) 
VALUES ('$first', '$last', '$uid', '$pwd', '$email','$years','$industry')";
>>>>>>> 4a3ac5032956ef1d0c33fd7e32a0b7b3ac5807dd
$result = mysqli_query($conn, $sql);

header("Location: ../index3.php"); 
        }
        
     
     
    }

