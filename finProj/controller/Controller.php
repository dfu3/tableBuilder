<?php
include_once("model/Model.php");

function myLoad($className) 
{
  $PATH = 'model/';
  $filename = $PATH . $className . ".php";
  include $filename;  
  return true;
}
spl_autoload_register('myLoad');

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