<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'dbconnect.php';

    $sno = $_POST['sno'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if($password == $cpassword){
        $sql = "DELETE FROM `user` WHERE sno = $sno";
        $result = mysqli_query($con,$sql);
            if($result){
                header("location:logout.php");
            }
        }
        else{
            header("location:../user_closeaccount.php?closeaccount=false");
        }
}

?>