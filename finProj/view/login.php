<html>
<head></head>

<body>

<?php 
 //echo $result;

?>
<form action="" method="POST" autocomplete="off">
  <p>
   <label>Username</label>
   <input id="username" value="" name="username" type="text" required="required" /><br>
  </p>

  <p>
   <label>Password</label>
   <input id="password" name="password" type="password" required="required" />
  </p>
  <p>
      <button type="submit" class="green big" name="submit"><span>Login</span></button> 
  </p>
 </form>

<form action="view/register.php">
<button type="submit" name="reg"> <span> Register </span> </button>
</form>

</body>
</html>