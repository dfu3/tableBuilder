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

function buildTable($array){
 
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

$obj = new Table();
echo $obj->buildTable($array);

?>