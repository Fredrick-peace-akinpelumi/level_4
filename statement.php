<?php
 require ('connect.php');
 $name = "Akinpelumi";
 $email = "hmmmmmm416@gmail.com";
 $password = "055pisco";
$query = "INSERT INTO `users_tb`(`name`, `email`, `password`) VALUES(?, ?, ?)";
$stmt = $connect->prepare($query);
$stmt->bind_param('sss', $name, $email, $password);
$check = $stmt->execute();

if ($check) {
    echo "Prepared statement works";
}else{
    echo "Not working";
}
?>