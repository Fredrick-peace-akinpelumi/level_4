<?php
require('connect.php');
session_start();
if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    if (empty($email) || empty($password)) {
        $_SESSION['message'] = "All input must be filled";
        header("location:login.php");
    }else {
        $sql = "SELECT * FROM users_tb WHERE email = '$email'";
        $result = mysqli_query($connect, $sql);
        $user = mysqli_fetch_assoc($result);
        if($user){
            $check = password_verify($password, $user['password']);
            if (!$check) {
                $_SESSION['password'] = "Invalid password";
                header("location:login.php");
            }else{
                $_SESSION['id'] = $user['user_id'];
                header('location: dashboard.php');
            }

        }else{
            header("location:login.php");
            $_SESSION['not'] = "Email does not exist";
        }
        
    }
}
    if(isset($_POST['upload'])){
        $allowed_extensions = ["png", "jpg", "jpeg"];
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = explode('.', $file_name);
        $ext =strtolower(end($file_ext));
        if (in_array($ext, $allowed_extensions)) {
            if ($file_size < 10000000) {
                $newFileName = time().'.'.$ext;
                $target_dir = "upload/".$newFileName;
                $upload = move_uploaded_file($file_tmp, $target_dir);
                if($upload){
                    $query = "UPDATE `users_tb` SET `profile_pic`= '$newFileName' WHERE user_id='".$_SESSION['id']."'";
                    $result = mysqli_query($connect, $query);
                    if(!$result){
                        $_SESSION['errorMessage']= "Error occurred please try again";
                        header("location:dashboard.php");  
                    }else{

                        header("location:dashboard.php");  
                    }
                }else{
                    $_SESSION['errorMessage']= "Error occurred please try again";
                    header("location:dashboard.php");
                }
            }else{
                $_SESSION['errorMessage']= "File size must not be more than 10mb";
                header("location:dashboard.php");
            }
        }else{
            $_SESSION['errorMessage'] = "File type is not allowed";
            header("location:dashboard.php");

        }
    }
?>