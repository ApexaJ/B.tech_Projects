<?php error_reporting (E_ALL ^ E_NOTICE); ?>
<?php
require 'dbconnect.php';

$showerror = "false";
if($_SERVER['REQUEST_METHOD']=='POST'){

    echo $fname=$_POST['fname'];
    echo $lname=$_POST['lname'];
    echo $address=$_POST['address'];
    echo $city=$_POST['city'];
    echo $country=$_POST['country'];
    echo $state=$_POST['state'];
    echo $pincode=$_POST['pincode'];
    echo $email = $_POST['email'];
    echo $password = $_POST['password'];
    echo $cpassword = $_POST['cpassword'];
    $token = bin2hex(random_bytes(10));
    $hashpass = password_hash($password, PASSWORD_DEFAULT);

    $existsql = "SELECT * FROM `user` WHERE `email`='$email'";
    $result = mysqli_query($con,$existsql);
    echo $noofrow=mysqli_num_rows($result);
    if($noofrow>0){
        $showerror = "Emailareadyinuse";
        header("location:../signup.php?signupsuccess=false&alreadyinuse=true");
        echo $showerror;
    }
    else{
        if($password == $cpassword){
        $sql = "INSERT INTO `user`( `fname`, `lname`, `email`, `password`,`address`, `city`, `country`, `state`, `pincode`,`token`)
        VALUES ('$fname','$lname','$email','$hashpass','$address','$city','India','$state','$pincode','$token')";
        $result = mysqli_query($con,$sql);
            if($result){
            echo "success";
            header("location:../signup.php?signupsuccess=true");
            exit();
            }
        }
        else{
            // header("location:../signup.php");
            header("location:../signup.php?signupsuccess=false&passwordnotmatch=true");
            echo "Password do not match";
        }
    }
}
?>