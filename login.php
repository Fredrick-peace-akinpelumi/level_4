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
<body class="bg-dark">
   <h1 class="text-center bg-dark text-light p-3"> Welcome to login page brr 😎😋</h1>

   <div class="container col-lg-4 mt-5 shadow p-5">
    <div class="row">
        <h2 class="text-danger text-end"> Login Now!!</h2>
        <form action="process.php" method="POST">
        <small class="text-danger"><?php
        session_start();
        if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
        } 
        if (isset($_SESSION['password'])) {
            echo $_SESSION['password'];
        } 
        if (isset($_SESSION['not'])) {
            echo $_SESSION['not'];
        }
        session_unset();
         ?></small>
        <div class="form-floating">
        <input type="email" placeholder="Example@gmail.com" name="email" class="form-control mb-3 bg-dark text-white   shadow-sm border-0">
        <label class="text-white" for="">Example@gmail.com</label>
        </div>
        <div class="form-floating">
        <input type="password" placeholder="password" name="password" class="form-control mb-3 bg-dark text-white   shadow-sm border-0">
        <label class="text-white" for="">password</label>
        </div>
        <button class="btn form-control btn-outline-info p-2" name="submit">Submit</button>
        </form>
    </div>
   </div>


</body>
</html>