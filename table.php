<?php

class Table{

  private $html = "";

  function setupTable($array){
    
    $this->html .= '<table>';
    $this->html .= '<tr>';
    foreach($array[0] as $key=>$value){
      $this->html .= '<th>' . $key . '</th>';
    }
    $this->html .= '</tr>';
  }

  function buildAll($array){

    if(is_string($array[0]))
      {
	$this->buildTable1($array);
      }
    else
      {
	$this->buildTable2($array);
      }
    
  }

  function buildTable1($array){

    $this->html .= '<table>';
    $this->html .= '<tr>';
    foreach($array[0] as $value){
      $this->html .= '<th>' . $value . '</th>';
    }
    $this->html .= '</tr>';


    foreach( $array as $value){
      $this->html .= '<tr>';
      foreach($value as $value2){
	$this->html .= '<td>' . $value2 . '</td>';
      }
      $this->html .= '</tr>';
    }

    $this->html .= '</table>';
    return $this->html;
  }


function buildTable2($array){
 
  $this->setupTable($array);

  foreach( $array as $key=>$value){
    $this->html .= '<tr>';
    foreach($value as $key2=>$value2){
      $this->html .= '<td>' . $value2 . '</td>';
    }
    $this->html .= '</tr>';
  }

  $this->html .= '</table>';
  return $this->html;
}

}
$array = array(
	       array('First Name'=>'Tom', 'Last Name'=>'Riddle', 'Email'=>'tom@gmail.com'),
	       array('First Name'=>'Rob', 'Last Name'=>'Zombie', 'Email'=>'rob@gmail.com'),
	       array('First Name'=>'Bob', 'Last Name'=>'Dylan', 'Email'=>'bob@gmail.com')
	       );

$_array = array(
	       array('First Name', 'Last Name', 'Email'),
               array('Tom', 'Riddle', 'rob@gmail.com'),
               array('Bob', 'Dylan', 'bob@gmail.com'),
	       array('Rob', 'Zombie', 'rob@gmail.com'),
               );


$obj = new Table();
echo $obj->buildTable($_array);

?>