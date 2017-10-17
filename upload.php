
<?php
include 'dbh.php';
?>
<?php
if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $filePath = "uploads/".$fileName;

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'PNG', 'pdf');

    if(in_array($fileActualExt, $allowed)){
        if($fileError === 0){
           if($fileSize < 10000000) {
            $fileNameNew = uniqid('',true).".".$fileActualExt;
            $fileDestination = 'uploads/'.$fileNameNew;
            move_uploaded_file($fileTmpName, $fileDestination);
            

<<<<<<< HEAD
        //  $sql = "INSERT INTO  newuser (image)
        //  VALUES ('uploads\\".$fileName."')" ;
        //header("location:userprofile.php?upload=success");
=======
                $sql = "UPDATE  newuser SET (image)
                  VALUES ('uploads\\".$fileNameNew."')" ;
                  header("location:userprofile.php?upload=success");
>>>>>>> e63493a1010d1a4cfdec277e0c04035c7953d33e
          
           }else{
               echo "Your file is to big";
           }
        }else{
            echo "There was an error uploading";
        }
    }else{
        echo "You cannot upload files of that type";
    }
}

?>