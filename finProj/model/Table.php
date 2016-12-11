<?php

class Table{

  private $html = "";

  function setupTable($array){
    
    $this->html .= '<table>';
    $this->html .= '<tr>';
    foreach($array as $hdr){
      $this->html .= '<th>' . $hdr . '</th>';
    }
    $this->html .= '</tr>';
  }

  function buildTable($hdr_arr, $dat_arr){
 
  $this->setupTable($hdr_arr);

  foreach( $dat_arr as $row){
    $this->html .= '<tr>';
    foreach($row as $key=>$val){ //foreach($row as $elem){
      if(is_numeric($key)){
	  $this->html .= '<td>' . $val . '</td>';
	}
    }
    $this->html .= '</tr>';
  }

  $this->html .= '</table>';
  return $this->html;
  }

}

?>