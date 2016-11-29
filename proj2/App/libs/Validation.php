<?php

  //namespace App\libs;

class Validation
{
  public static function numFields($raw)
  {
    if(filter_var($raw, FILTER_VALIDATE_FLOAT) or filter_var($raw, FILTER_VALIDATE_INT))
      {
	return true;
      }
    else { return false; }
    
  }
  public static function emailFields($raw)
  {
    if(filter_var($raw, FILTER_VALIDATE_EMAIL))
      {
        return true;
      }
    else { return false; }
  }

}

?>