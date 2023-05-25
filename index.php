<?php
$name = "pisco";
$var = 10;


echo $name;
echo "<br>";
echo "<h1>shey you dey whine me ni $name is $var years old</h1>";
print $var * 5;

$students = ["peace", "akinpelu", "prosper"];
$students = array("peace", "akinpelu", "prosper");

for ($i=0; $i < count($students); $i++) { 
    echo $students[$i];
} 
echo gettype($students);

$obj = ["name"=> "jesus", "location"=>"Heaven"];
 echo "<br>";
 echo $obj["name"];
 echo $obj["location"];
 echo "<br>";

echo strlen($name);
echo strrev($name)

?>