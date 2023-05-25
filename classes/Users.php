<?php
require_once("Config.php");
class User extends Config{
    public function __construct()
    {
        parent::__construct();
    }
    public function createUser($name, $email, $password)
    {
        $query = "INSERT INTO `users_tb`(`name`, `email`, `password`) VALUES (?, ?, ?)";
        $stmt = $this->connectToDb->prepare($query);
        $binder = array('sss', $name, $email, $password);
        $result = $this->create($query, $binder);
        return $result;
    }

    public function getUsers($id){
        $query = "SELECT * FROM users_tb WHERE user_id= ? ";
        $binder = array('i', $id);
        $result = $this->read($query, $binder);
        print_r($result);
    }
    public function update($id, $email)
    {
        $query = "UPDATE `users_tb` SET `email`=? WHERE `user_id`=?";
        $binder = array('si', $email, $id);
        $result = $this->update($query, $binder);
        return $result;

    }
}