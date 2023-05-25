<?php
class Config{
    protected $host = 'localhost';
    protected $username = 'root';
    protected $password = '';
    protected $dbName = 'test_db';
    public $connectToDb;
    public $response;
    public function __construct(){
        $this->connectToDb =new mysqli($this->host, $this->username,$this->password, $this->dbName);
        if ($this->connectToDb->connect_error) {
            die("Error occurred".$this->connectToDb->connect_error);
        }
    }
    public function create($query, $binder){
        $stmt = $this->connectToDb->prepare($query);
        $stmt->bind_param(...$binder);
        $check =$stmt->execute();
        if ($check) {
            $this->response = "Successfully executed";
        }else{
            $this->response = "Failed to execute";
        }
        return $this->response;
    }
    public function read($query, $binder){
        $stmt = $this->connectToDb->prepare($query);
        if($binder){
            $stmt->bind_param(...$binder);
        }
        $check = $stmt->execute();

        if ($check) {
            $this->response['sucess=']=true;
            $this->response['success']= mysqli_fetch_all(mysqli_stmt_get_result($stmt));
        }else{
            $this->response['sucess']=false;
        }
        return $this->response;
    }
    public function update($query, $binder)
    {
        $stmt = $this->connectToDb->prepare($query);
        $stmt->bind_param(...$binder);
        $check = $stmt->execute();
        if($check){
            $this->response = "Successful";
        }else{
            $this->response = "Failed";
        }
        return $this->response;
    }
    public function delete(){

    }
}
?>