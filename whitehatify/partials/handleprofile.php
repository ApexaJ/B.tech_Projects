<?php

    require 'dbconnect.php';
    session_start();
   echo $fname = $_POST['fname'];
   echo $lname = $_POST['lname'];
   echo $address= $_POST['address'];
   echo $city = $_POST['city'];
   echo $state = $_POST['state'];
   echo $pincode = $_POST['pincode'];
   echo $sno = $_SESSION['sno'];
    $sql = "UPDATE `user` SET `fname`='$fname',`lname`='$lname',`address`='$address',`city`='$city',`state`='$state',`pincode`='$pincode' WHERE `sno` = '$sno' ";
    $result = mysqli_query($con, $sql);

    if($result){
        header('location:../user_editprofile.php?update=true');
    }
    else{
        header('location:../user_editprofile.php?update=false');

    }
?>