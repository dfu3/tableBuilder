<?php

  //namespace App\libs;

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

?>