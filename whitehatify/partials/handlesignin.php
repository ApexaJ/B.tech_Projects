<?php
$login = false;
$showError = false;
    include 'dbconnect.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    // $sql = "Select * from users where email='$username' AND password='$password'";
    $sql = "Select * from user where email='$email'";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    
    if ($num == 1){
        while($row=mysqli_fetch_assoc($result))
        {
            // if ($password == $row['password'])
            if(password_verify($password, $row['password']))
            { 
                
                session_start();
                $login = true;
                $_SESSION['loggedin'] = true;
               echo $_SESSION['username'] = $row['fname'];
               echo $_SESSION['email'] = $row['email'];
               echo $_SESSION['sno'] = $row['sno'];
                header("location:../index.php");
            } 
            else{
                header("location:../singin.php?loginsuccess=false&passnotmatch=true");
            }
        }
        
    } 
    else{
        header("location:../singin.php?loginsuccess=false&regfirst=true");
    }


?>