<?php
require("configs/dbh.php");

//function getUsersData($id){
    $array = array();
   $query = mysqli_query("SELECT * FROM newuser WHERE id='$id") ;
    while($row = mysqli_fetch_assoc($query)){
        $array['id'] = $row['id'];
        $array['first'] = $row['first']; 
        $array['last'] = $row['last']; 
        $array['uid'] = $row['uid']; 
        $array['email'] = $row['email']; 
        $array['years'] = $row['years']; 
        $array['industry'] = $row['industry']; 
    }
    return $array;
}

function getId($uid){
     $q = mysqli_query("SELECT id FROM newuser WHERE uid='$uid'") ;
    while($r = mysqli_fetch_assoc($q)){
        return $r['id'];
    }
}

?>