<?php
include_once("model/Model.php");

class Controller 
{
  public $model;
 
  public function __construct()  
  {  
    $this->model = new Model();

  } 
 
  public function invoke()
  {  
    $result = $this->model->getlogin();
    
    //print($result);

    if($result == 'SUCC')
      {
	include 'view/profile.php';
      }
    else
      {
	include 'view/login.php';
      }
  }
}

?>