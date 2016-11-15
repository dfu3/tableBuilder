<?php

class WriteCSV
{
  private $fileLoc;
  private $fileCont;

  function __construct($file_in)
  {
    $this->fileLoc = $file_in;
  }

  private function open()
  {
    if(!file_exists($this->fileLoc))
    {
      die("File not found <br>");
    }
    else
    {
      $this->fileCont = fopen($this->fileLoc, 'w');
      echo "Opend file sucessfully <br>";
    }
  }
  
  function write($lineToAdd)
  {
    try{
      $this->open();

      fwrite($this->fileCont, $lineToAdd);
      fclose($this->fileCOnt);
      echo "succesfully wrote to file <br>";
    }
    catch(Exception $e) {
      echo 'Caught exception: ' . $e->getMessage() . "<br>";
    }
  }
}

$test = new WriteCSV("test.csv");
$line = array("1", "Test", "Testerson");
$test->write($line); 

?>