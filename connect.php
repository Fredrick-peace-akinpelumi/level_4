<?php
$server = 'localhost';
$username = 'root';
$password = '';
$databaseName = 'test_db';

$connect = mysqli_connect($server, $username, $password, $databaseName);
if (!$connect) {
    echo "Connection failed";
}