<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

//use App\libs;
//use App\libs\Validation;
//use App\libs\Table;
//use App\libs\WriteCSV;
//use App\libs\ReadCSV;
//use App\libs\Curl;

// autoload function
function myLoad($className) 
{
  $PATH = 'App/libs/';
  $filename = $PATH . $className . ".php";
  //print $filename . PHP_EOL;
  include $filename;  
  return true;
}
spl_autoload_register('myLoad');
//---

//Sanitation
$name = 'dante';
$age = '21';
$email = 'dfu3@njit.edu';

$name = Sanitation::genFields($name);
$age = Sanitation::numFields($age);
$email = Sanitation::emailFields($email);

echo "Input after Sanitation: <br>";
echo $name . "<br>";
echo $age . "<br>";
echo $email . "<br><br>";
//---

//Validation
if(Validation::numFields($age))
  {
    echo "age is valid<br>";
  }
else
  {
    echo "age is NOT valid<br>";
  }

if(Validation::emailFields($email))
  {
    echo "email is valid<br>";
  }
else
  {
    echo "email is NOT valid";
  }
//---

//Table
$array = array(
               array('First Name'=>'Tom', 'Last Name'=>'Riddle', 'Email'=>'tom@gmail.com'),
               array('First Name'=>'Rob', 'Last Name'=>'Zombie', 'Email'=>'rob@gmail.com'),
               array('First Name'=>'Bob', 'Last Name'=>'Dylan', 'Email'=>'bob@gmail.com')
               );

$obj = new Table();
echo $obj->buildTable($array);
//---

//WriteCSV
$test = new WriteCSV("App/libs/test.csv");
$line = array("1", "Test", "Testerson");
$test->write($line);
//---

//ReadCSV
$reader = new ReadCSV();
$reader->read("App/libs/test.csv"); 
//---

//CURL
$curlOBJ = new Curl();

$params = array(
                "name" => "Ravishanker Kusuma",
                "age" => "32",
                "location" => "India"
                );

echo "POST example: " . $curlOBJ->post("http://hayageek.com/examples/php/curl-examples/post.php",$params) . "<hr>";
echo "GET example: " . $curlOBJ->get("http://hayageek.com");
//---


?>