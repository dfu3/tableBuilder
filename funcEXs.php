<?php

//ARRAYS===>
echo "ARRAYS";
echo "<br>";

//array_keys
$a=array("Volvo"=>"XC90","BMW"=>"X5","Toyota"=>"Highlander");
print_r(array_keys($a));

//array_search
$a=array("a"=>"red","b"=>"green","c"=>"blue");
echo array_search("red",$a);

//array_walk
function myfunction($value,$key)
{
  echo "The key $key has the value $value<br>";
}
$a=array("a"=>"red","b"=>"green","c"=>"blue");
array_walk($a,"myfunction");

//array_pop
$a=array("red","green","blue");
array_pop($a);
print_r($a);

//array_push
$a=array("red","green");
array_push($a,"blue","yellow");
print_r($a);

//array_combine
$fname=array("Peter","Ben","Joe");
$age=array("35","37","43");

$c=array_combine($fname,$age);
print_r($c);

//array_chunk
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 2));
print_r(array_chunk($input_array, 2, true));

//implode
$array = array('lastname', 'email', 'phone');
$comma_separated = implode(",", $array);
echo $comma_separated;
var_dump(implode('hello', array()));

//explode
$pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
$pieces = explode(" ", $pizza);
echo $pieces[0]; // piece1
echo $pieces[1]; // piece2

//array_diff
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");
$result=array_diff($a1,$a2);
print_r($result);
echo "<br>";

//array_intersect
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");
$result=array_intersect($a1,$a2);
print_r($result);
echo "<br>";

//array_filter
function test_odd($var)
{
  return($var & 1);
}
echo "<br>";

$a1=array("a","b",2,3,4);
print_r(array_filter($a1,"test_odd"));
echo "<br>";

//array_flip
$a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
$result=array_flip($a1);
print_r($result);
echo "<br>";

//array_merge
$a1=array("red","green");
$a2=array("blue","yellow");
print_r(array_merge($a1,$a2));
echo "<br>";

//array_reduce
function myfunction1($v1,$v2)
{
  return $v1 . "-" . $v2;
}
$a=array("Dog","Cat","Horse");
print_r(array_reduce($a,"myfunction1"));
echo "<br>";

//array_replace
$a1=array("red","green");
$a2=array("blue","yellow");
print_r(array_replace($a1,$a2));
echo "<br>";
echo "<br><br>";
//STRINGS===>
echo "STRINGS";
echo "<br>";
echo strlen("sdjnksjdv");
//------------------------------------------------------------------->

echo strip_tags("<h1> header one </h1>");
//------------------------------------------------------------------->

$count = count_chars("sadjbfs");
echo $count;
//------------------------------------------------------------------->

$str = "A 'quote' is <b>bold</b>";
echo htmlentities($str);
//------------------------------------------------------------------->

$new = htmlspecialchars("<a href='test'>Test</a>", ENT_QUOTES);
echo $new; // &lt;a href=&#039;test&#039;&gt;Test&lt;/a&gt;
//------------------------------------------------------------------->

$str = "<p>this -&gt; &quot;</p>\n";

echo htmlspecialchars_decode($str);

// note that here the quotes aren't converted
echo htmlspecialchars_decode($str, ENT_NOQUOTES);
//------------------------------------------------------------------->

$new_string = chunk_split(base64_encode($data));
//------------------------------------------------------------------->

$text = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello  = "Hello World";
var_dump($text, $binary, $hello);

print "\n";


$trimmed = ltrim($text);
var_dump($trimmed);
//------------------------------------------------------------------->

$str = 'apple';

if (md5($str) === '1f3870be274f6c49b3e31a0c6728957f') {
  echo "Would you like a green or red apple?";
}
//------------------------------------------------------------------->

$text = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello  = "Hello World";
var_dump($text, $binary, $hello);

print "\n";

$trimmed = rtrim($text);
var_dump($trimmed);
//------------------------------------------------------------------->

$bodytag = str_replace("%body%", "black", "<body text='%body%'>");

// Provides: Hll Wrld f PHP
$vowels = array("a", "e", "i", "o", "u", "A", "E", "I", "O", "U");
$onlyconsonants = str_replace($vowels, "", "Hello World of PHP");

// Provides: You should eat pizza, beer, and ice cream every day
$phrase  = "You should eat fruits, vegetables, and fiber every day.";
$healthy = array("fruits", "vegetables", "fiber");
$yummy   = array("pizza", "beer", "ice cream");

$newphrase = str_replace($healthy, $yummy, $phrase);
echo $newphrase;
//------------------------------------------------------------------->

$str = "Hello Friend";

$arr1 = str_split($str);
$arr2 = str_split($str, 3);

print_r($arr1);
print_r($arr2);
//------------------------------------------------------------------->

$mystring = 'abc';
$findme   = 'a';
$pos = strpos($mystring, $findme);

// Note our use of ===.  Simply == would not work as expected
// because the position of 'a' was the 0th (first) character.
if ($pos === false) {
  echo "The string '$findme' was not found in the string '$mystring'";
} else {
  echo "The string '$findme' was found in the string '$mystring'";
  echo " and exists at position $pos";
}
//------------------------------------------------------------------->

$str = "Mary Had A Little Lamb and She LOVED It So";
$str = strtolower($str);
echo $str;
//------------------------------------------------------------------->

$text   = "\t\tThese are a few words :) ...  ";
$binary = "\x09Example string\x0A";
$hello  = "Hello World";
var_dump($text, $binary, $hello);

print "\n";

$trimmed = trim($text);
var_dump($trimmed);
//------------------------------------------------------------------->

$text = "The quick brown fox jumped over the lazy dog.";
$newtext = wordwrap($text, 20, "<br />\n");

echo $newtext;
//------------------------------------------------------------------->

$rest = substr("abcdef", -1);    // returns "f"
$rest = substr("abcdef", -2);    // returns "ef"
$rest = substr("abcdef", -3, 1); // returns "d"
//------------------------------------------------------------------->

$email  = 'name@example.com';
$domain = strstr($email, '@');
echo $domain; // prints @example.com

$user = strstr($email, '@', true); // As of PHP 5.3.0
echo $user; // prints name
//------------------------------------------------------------------->

?>