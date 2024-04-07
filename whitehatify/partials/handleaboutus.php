<?php
    // error_reporting (0);
    include 'dbconnect.php';

  echo  $subject = $_POST['subject'];
  echo  $email = $_POST['email'];
  echo  $message = $_POST['message'];

    $sql = "INSERT INTO `contactus`( `subject`, `email`, `message`) VALUES ('$subject','$email','$message')";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:../aboutus.php');
    }
    else{
        header('location:../aboutus.php');
    }

?>