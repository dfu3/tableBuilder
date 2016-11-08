<?php

function foo1($arg1 = '', $arg2 = '') {
 
    echo "arg1: $arg1\n";
    echo "arg2: $arg2\n";
 
}
foo1('hello','world');
foo1();

echo "<br>----------------------------------------<br>";

function foo2() {

    $args = func_get_args();
 
    foreach ($args as $k => $v) {
        echo "arg".($k+1).": $v\n";
    }
 
}
 
foo2();
foo2('hello');
foo2('hello', 'world', 'again');
echo "<br>----------------------------------------<br>";
//-------------------------------------

$files = glob('*.php');
print_r($files);
echo "<br>----------------------------------------<br>";
//-------------------------------------

$files = glob('*.{php,txt}', GLOB_BRACE);
print_r($files);
echo "<br>----------------------------------------<br>";
//------------------------------------------

echo "Initial: ".memory_get_usage()." bytes \n";

for ($i = 0; $i < 100000; $i++) {
    $array []= md5($i);
}
 
for ($i = 0; $i < 100000; $i++) {
    unset($array[$i]);
}
 
echo "Final: ".memory_get_usage()." bytes \n"; 
echo "Peak: ".memory_get_peak_usage()." bytes \n";
echo "<br>----------------------------------------<br>";
//------------------------------------------------------------

print_r(getrusage());
echo "<br>----------------------------------------<br>";
//------------------------------------------------

for($i=0;$i<10000000;$i++) {
 
}
 
$data = getrusage();
echo "User time: ".
    ($data['ru_utime.tv_sec'] +
    $data['ru_utime.tv_usec'] / 1000000);
echo "System time: ".
    ($data['ru_stime.tv_sec'] +
    $data['ru_stime.tv_usec'] / 1000000);
echo "<br>----------------------------------------<br>";
//----------------------------------------------------------

$start = microtime(true);
while(microtime(true) - $start < 3) {
 
}
 
$data = getrusage();
echo "User time: ".
    ($data['ru_utime.tv_sec'] +
    $data['ru_utime.tv_usec'] / 1000000);
echo "System time: ".
    ($data['ru_stime.tv_sec'] +
    $data['ru_stime.tv_usec'] / 1000000);
echo "<br>----------------------------------------<br>";
//---------------------------------------------------------------------

echo md5(time() . mt_rand(1,1000000));
echo uniqid();
echo uniqid();
echo uniqid('bar_',true);
echo "<br>----------------------------------------<br>";
//---------------------------------------------------------------------

$myvar = array(
    'hello',
    42,
    array(1,'two'),
    'apple'
);

$string = serialize($myvar);
 
echo $string;
$newvar = unserialize($string);
 
print_r($newvar);
//--------------------------------------------
echo "<br>----------------------------------------<br>";
$myvar = array(
    'hello',
    42,
    array(1,'two'),
    'apple'
);
 
$string = json_encode($myvar);
 
echo $string;
$newvar = json_decode($string);
 
print_r($newvar);
echo "<br>----------------------------------------<br>";
//-----------------------------------------

$string =
"Lorem ipsum dolor sit amet, consectetur
adipiscing elit. Nunc ut elit id mi ultricies
adipiscing.";
 
$compressed = gzcompress($string);
 
echo "Original size: ". strlen($string)."\n";
 
 
echo "Compressed size: ". strlen($compressed)."\n";
$original = gzuncompress($compressed);
echo "<br>----------------------------------------<br>";
//-----------------------------------------------

$start_time = microtime(true);
echo "execution took: ".
        (microtime(true) - $start_time).
        " seconds.";
//-------------------------------------------
echo "<br>----------------------------------------<br>";
$start_time = microtime(true);
 
register_shutdown_function('my_shutdown');
 
function my_shutdown() {
    global $start_time;
 
    echo "execution took: ".
            (microtime(true) - $start_time).
            " seconds.";
}
//------------------------------------------------------




?>