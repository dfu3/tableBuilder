<?php

  //namespace App\libs;

Class ReadCSV
{

  public function read($file)
  {
    $row = 1;
    if (($handle = fopen($file, "r")) !== FALSE) 
      {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
	{
	  $num = count($data);
	  $row++;
	  for ($c=0; $c < $num; $c++) {
	    echo $data[$c] . "<br />\n";
	  }
	}
      fclose($handle);
      }
  }

}

?>