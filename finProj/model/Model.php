<?php

include_once("dbConn.php");
include_once("Table.php");
include_once("Sanitation.php");

class Model {

  public function editAccount($newName, $pass)
  {
    //$user = $_REQUEST['username'];
    $pass = sha1($pass);
    try{
      $db = dbConn::getConnection();
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $state = $db->prepare("update account set name=:name where pass=:pass");
      $state->bindParam(':pass', $pass);
      $state->bindParam(':name', $newName);
      $state->execute();
    }
    catch(Exception $e) { return 'DB_FAIL_' . $e; }

    return 'SUCC';

  }

  public function getAccount()
  {
    $user = Sanitation::genFields($_REQUEST['username']);
    
    try{
      $db = dbConn::getConnection();
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      if($user == 'admin')
	{
	  $state = $db->prepare("select name, user, pass from account");
	}
      else
	{
	  $state = $db->prepare("select name, user, pass from account where user=:user");
          $state->bindParam(':user', $user);
	}

      $state->execute();
    }
    catch(Exception $e) { return 'DB_FAIL_' . $e; }
    
    $arr = $state->fetchAll();
    $hdr_arr = [' Display Name ', ' User Name ', ' Password Hash ']; 
    
    try{
      $ref = new Table();
      $tab = $ref->buildTable($hdr_arr, $arr); 
    }
    catch(Exception $e) { return 'TB_FAIL_' . $e; }
   
    return $tab;
  }

  public function getlogin()
  {
    
    if(isset($_REQUEST['username']) && isset($_REQUEST['password']))
      {

	$user = Sanitation::genFields($_REQUEST['username']);
	$pass = Sanitation::genFields($_REQUEST['password']);
	$pass = sha1($pass);
	
	try{
	$db = dbConn::getConnection();
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$state = $db->prepare("select count(*) from account where user=:user and pass=:pass");
	$state->bindParam(':user', $user);
	$state->bindParam(':pass', $pass);
	$state->execute();
	}
	catch(Exception $e) { return 'DB_FAIL_' . $e; }
	
	if($state->fetchAll()[0][0] == 1) { return 'SUCC'; }
	else { return 'FAIL'; }
      }
  }

  public function register($user, $pass, $name)
  {
    
    $pass = sha1($pass);
    
    try{
    $db = dbConn::getConnection();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $state = $db->prepare("insert into account(user, pass, name) values(:user, :pass, :name)");
    $state->bindParam(':user', $user);
    $state->bindParam(':pass', $pass);
    $state->bindParam(':name', $name);
    $state->execute();
    }
    catch(Exception $e) { return 'DB_FAIL_' . $e; }
    return 'SUCC';
  }
 
}

?>