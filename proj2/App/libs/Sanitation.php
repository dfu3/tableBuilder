<?php

  //namespace App\libs;

class Sanitation
{
  public static function genFields($raw)
  {
    return strip_tags($raw);
  }
  public static function numFields($raw)
  {
    return filter_var($raw, FILTER_SANITIZE_NUMBER_FLOAT);
  }
  public static function emailFields($raw)
  {
    return filter_var($raw, FILTER_SANITIZE_EMAIL);
  }

}

?>