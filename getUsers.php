<?php
require ("./classes/Users.php");
    $id = 4;
    $users = new User();
    $result = $users->getUsers($id);
    print_r($result)
?>