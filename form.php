<?php
require('connect.php');
$message = "";
if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(empty($name) || empty($email) || empty($password)){
        $message = "All fields must be filled";
    }else if(strlen($password) < 8){
        $message = "password must be at least 8 character";
    }else{
        $sql = "SELECT * FROM `users_tb` WHERE email=?";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = mysqli_stmt_get_result($stmt);
        $found = mysqli_num_rows($result);
        if ($found > 0) {
            $message = "Email already exist";
        }else{
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $query = "INSERT INTO `users_tb`(`name`, `email`, `password`) VALUES ('?','?','?',)";
            $data = $connect->prepare($query);
            $data->bind_param('sss', $name, $email, $hashedPassword);
            $response = $data->execute();
            // $hashedPassword 
            if ($response) {
                header("location:login.php");
            }else{
                $message =  "Details not saved";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container col-lg-4 rounded-5 p-5 mt-5 shadow">
        <form <?php echo $_SERVER["PHP_SELF"] ?> method="POST">
        <h2 class="p-3 text-danger">PHP FORM</h2>
        <small class="text-danger"><?php echo $message?></small>
        <div class="form-floating">
        <input type="text" placeholder="Full name" name="name" class="form-control mb-3 shadow-sm border-0">
        <label for="">Full name</label>
        </div>
        <div class="form-floating">
        <input type="email" placeholder="Example@gmail.com" name="email" class="form-control mb-3 shadow-sm border-0">
        <label for="">Example@gmail.com</label>
        </div>
        <div class="form-floating">
        <input type="password" placeholder="password" name="password" class="form-control mb-3 shadow-sm border-0">
        <label for="">password</label>
        </div>
        <button class="btn form-control" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>