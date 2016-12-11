<?php

include_once("../model/Model.php");
include_once("../model/Sanitation.php");
$mod = new Model();

$newName = Sanitation::genFields($_GET['edit']);
$pass = Sanitation::genFields($_GET['pass']);

if($newName !== NULL)
  {
    $mod->editAccount($newName, $pass);
  }

header('Location: ../index.php');
?>
