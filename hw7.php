<?php

//An associative array containing references to all variables which are currently defined in the global scope of the script. The variable names are the keys of the array.
function test() {
    $foo = "local variable";

    echo '$foo in global scope: ' . $GLOBALS["foo"] . "\n";
    echo '$foo in current scope: ' . $foo . "\n";
}

$foo = "Example content";
test();
echo "<br> ---------------------------- <br>";

//$_SERVER is an array containing information such as headers, paths, and script locations. The entries in this array are created by the web server.
echo $_SERVER['SERVER_NAME'];
echo "<br> ---------------------------- <br>";

//An associative array of variables passed to the current script via the URL parameters.
echo 'Hello ' . htmlspecialchars($_GET["name"]) . '!';
echo "<br> ---------------------------- <br>";
//An associative array of variables passed to the current script via the HTTP POST method when using application/x-www-form-urlencoded or multipart/form-data as the HTTP Content-Type in the request.
echo 'Hello ' . htmlspecialchars($_POST["name"]) . '!';
echo "<br> ---------------------------- <br>";

//An associative array of items uploaded to the current script via the HTTP POST method. The structure of this array is outlined in the POST method uploads section.
echo ($_FILES); // if files are uploaded to the script, their meteadata will be desplayed here
echo "<br> ---------------------------- <br>";

//An associative array of variables passed to the current script via HTTP Cookies.
echo 'Hello ' . htmlspecialchars($_COOKIE["name"]) . '!';
echo "<br> ---------------------------- <br>";
//An associative array containing session variables available to the current script. See the Session functions documentation for more information on how this is used.
session_start();
$_SESSION["newsession"]=$value;
echo $_SESSION["newsession"];
echo "<br> ---------------------------- <br>";
//An associative array that by default contains the contents of $_GET, $_POST and $_COOKIE.
echo $_REQUEST[“fname”]; //will display fname if exists in current context
echo "<br> ---------------------------- <br>";
//An associative array of variables passed to the current script via the environment method.
echo 'My username is ' .$_ENV["USER"] . '!'; //will display USER if exists in script context

?>