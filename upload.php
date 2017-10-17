
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

        //  $sql = "INSERT INTO  newuser (image)
        //  VALUES ('uploads\\".$fileName."')" ;
        //header("location:userprofile.php?upload=success");
          
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