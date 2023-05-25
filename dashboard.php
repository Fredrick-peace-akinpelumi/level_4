<?php
require("connect.php");
session_start();
if (isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    $query = "SELECT * FROM users_tb WHERE user_id=?";
    $stmt = $connect->prepare($query);
    $stmt ->bind_param('s', $id);
    $stmt->execute();
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    $name = $user['name']."  ".$user['email'];

    // $email = $_COOKIE ['user_email'];
    // echo $email;
}else{
    header('location:login.php');
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
    <div class="container  p-4">
        <div class="d-flex justify-content-around">
            <div class="row">
                <div class="col-md-4" style="border-radius: 100%; height:300px; width:300px;
                background-size:contain;
                background-repeat:no-repeat;
                margin-top:40px;
                background-position:center;
                 background:url(<?php echo 'upload/'.$user['profile_pic']?>);
                 background-size:cover;
                background-repeat:no-repeat;">

                </div>
                <form action="process.php" method="POST" enctype="multipart/form-data" style="margin-top: 10px;">
                <?php
                if (isset($_SESSION['errorMessage'])) {
                    echo $_SESSION['errorMessage'];
                }
                unset($_SESSION["errorMessage"]);
                ?> <br>
                    <input type="file"  id=""  name="image">
                    <button class="btn btn-outline-success" name="upload">Upload</button>
                </form>
            </div>

            <div class="col-md-6 mt-5" style=" margin-right:150px;">
                <div class="row">
                    <div class="col-md-12">
                        <h1 class="display-4 text-primary">Dashboard</h1>
                        <p>Welcome, <?php echo $name ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>