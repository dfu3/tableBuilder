<?php

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
$name = $_GET['name'];
$age = $_GET['age'];
$email = $_GET['email'];

$name = Sanitation::genFields($name);
$age = Sanitation::numFields($age);
$email = Sanitation::emailFields($email);

echo "Input after Sanitation: <br>";
echo $name . "<br>";
echo $age . "<br>";
echo $email . "<br><br>";

if(Validation::numFields($age))
  {
    echo "age is valid<br>";
  }
else
  {
    echo "age is NOT valid<br>";
  }

if(Validation::emailFields($email))
  {
    echo "email is valid<br>";
  }
else
  {
    echo "email is NOT valid";
  }


?>