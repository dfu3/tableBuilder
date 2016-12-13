<?php
  include_once("../model/Upload.php");
  include_once("../model/Sanitation.php");

$pass = Sanitation::genFields($_POST['pass2']);

Upload::up($pass);

header('Location: ../index.php');

?>