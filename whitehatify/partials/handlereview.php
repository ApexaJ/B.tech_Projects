<?php
   echo $name = $_POST['name'];
   echo $email = $_POST['email'];
   echo $review = $_POST['review'];
   echo $sno = $_POST['sno'];

    include 'dbconnect.php';

    $sql = "INSERT INTO `review`(`sno`, `name`, `email`, `review`) VALUES ('$sno','$name','$email','$review')";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:../review.php?add=true');
    }
    else{
        header('location:../review.php?add=false');

    }

?>