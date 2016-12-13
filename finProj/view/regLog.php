<?php

include_once("../model/Model.php");
include_once("../model/Sanitation.php");

$user = Sanitation::genFields($_GET['user']);
$pass = Sanitation::genFields($_GET['pass']);
$name = Sanitation::genFields($_GET['name']);


$mod = new Model();

$resp = $mod->register($user, $pass, $name);

if($resp == 'SUCC')
  {
    echo "<h2>Registration Successful, <a href='../index.php'>Please Log In</a></h2>";
  }
else
  {
    echo "<h2>Registration Unsuccessful, <a href='../index.php'>Back To Login</a></h2>";
  }

?>
