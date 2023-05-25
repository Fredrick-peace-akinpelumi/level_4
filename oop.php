<?php
 
    class User{
        public $name = 'Peace akinpelu';
        private $email = 'piscoakinpely416@gmail.com';
        protected $school = 'SQI college of ict';

        public function __construct($name){
            echo "Welcome to my youtube channel $name";
            echo "</br>";
        }
        public function getName($user){
            // echo $this->name;
            echo $user;
            
        }

        public function __destruct()
        {
            echo " please leave my youtube channel";
            echo "</br>";
        }
    }

    class Inheritance extends User{
        public function getUser(){
            echo $this->school;
            echo "</br>";
        }
        public function __destruct()
        {
            echo " please leave my youtube channel seh watin happen nah";
            echo "</br>";
        }
    }

    $newName = new User("kunle");
    $inheritance = new Inheritance("adedayo");
    $inheritance->getUser();
    // $newName->getName("Pisco")
?>