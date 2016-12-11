<html>
<head></head>

<body>

<?php 
 //echo $result;

?>
<form>
  <p>
   <label>Username</label>
   <input id="username" value="" name="username" type="text" required="required" /><br>
  </p>

  <p>
   <label>Password</label>
   <input id="password" name="password" type="password" required="required" />
  </p>
   <br />
  <p>

      <button type="submit" class="green big" name="submit"><span>Login</span></button> <button type="reset" class="grey big"><span>Cancel</span></button>
  </p>
 </form>

</body>
</html>

<?php

include '../model/Model.php';

$user = $_GET['username'];
$pass = $_GET['password'];
$mod = new Model();

if($user != "" and $pass != "")
  {
    print_r($mod->getLogin($user, $pass));
  }

?>