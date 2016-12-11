<?php

include_once("../model/Model.php");

echo "<h2>User Profile</h2>";

$mode = new Model();
print $mod->getAccount();

?>