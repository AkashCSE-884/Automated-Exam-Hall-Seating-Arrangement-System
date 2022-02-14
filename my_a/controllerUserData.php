<?php 
session_start();
require "connnection.php";
$email ="";

$errors = array();
if (isset($_SESSION['email'] )) {
    header('location: ');
}

//if user signup button
if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $user_type = mysqli_real_escape_string($conn, $_POST['u_type']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    // $gender= mysqli_real_escape_string($conn,$_POST['Gender']);

    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    } 
   
    $email_check = "SELECT * FROM tbprofile WHERE email = '$email' and user_name = '$username'";
    $res = mysqli_query($conn, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "0";
        $now = date('Y-m-d');
        $insert_data = "INSERT INTO tbprofile (user_name,email,encpass,user_type,CODE,STATUS,created_on)
                        values('$username','$email' , '$encpass', '$user_type', '$code', '$status','$now')";
         
       

        $data_check = mysqli_query($conn, $insert_data);
       
       
        if($data_check){
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: lionaks884@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
               
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Failed while sending code!";
            }
        }else{
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }

}
    //if user click verification code submit button
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM tbprofile WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 1;
            $update_otp = "UPDATE tbprofile SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($conn, $update_otp);
            if($update_res){

                $_SESSION['email'] = $email;
                header('location: index.php');
                
                exit();
            }else{
                $errors['otp-error'] = "Failed while updating code!";
            }
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

     //if user click login button
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $check_email = "SELECT * FROM tbprofile WHERE email = '$email'";
      
        $res = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
           
            $_SESSION['email']=$fetch['email'];
            $fetch_pass = $fetch['encpass'];
           
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $_SESSION["name"] = $fetch['firstname'].' '.$fetch['lastname'] ;
                $_SESSION['pic'] == "<i class='fas fa-user'></i>";
                $status = $fetch['status'];
                if($status == 1){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  header('location:home.php');
                //   $_SESSION['id'] =  $
                //   $_SESSION['pic'] == "<i class='fas fa-user'></i>";
                
                //   if($name=="@gmail.com"){
                //     header('location:./admin/dashboard.php');
                // }
                // else{
                   
                //     header('location:./user/home.php');
                // }
        
                  
                }else{
                    $info = "It's look like you haven't still verify your email - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Incorrect email or password!";
            }
        }else{
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    }

    //if user click conntinue button in forgot password form
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $check_email = "SELECT * FROM registration WHERE email='$email'";
        $run_sql = mysqli_query($conn, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE registration SET code = $code WHERE email = '$email'";
            $run_query =  mysqli_query($conn, $insert_code);
            if($run_query){
                $subject = "Password Reset Code";
                $message = "Your password reset code is $code";
                $sender = "From: saymonakram@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "We've sent a passwrod reset otp to your email - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Failed while sending code!";
                }
            }else{
                $errors['db-error'] = "Something went wrong!";
            }
        }else{
            $errors['email'] = "This email address does not exist!";
        }
    }

       //if user click check reset otp button
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($conn, $_POST['otp']);
        $check_code = "SELECT * FROM registration WHERE code = $otp_code";
        $code_res = mysqli_query($conn, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Please create a new password that you don't use on any other site.";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "You've entered incorrect code!";
        }
    }

    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        }else{
            $code = 0;
            $email = $_SESSION['email']; //getting this email using session
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE registration SET code = $code, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($conn, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: signin.php');
    }
?>