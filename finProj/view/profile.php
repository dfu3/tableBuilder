<html>
<head></head>
<body>

<?php 
 include_once("../model/Model.php");

echo "<h2>User Profile: " . $_REQUEST['username'] . "</h2>";

 $mod = new Model();
 echo $mod->getAccount();
?>

<br><hr>
<h3>Edit Profile</h3>
<form action='view/edit.php'>
Enter New Display Name: <input type="text" name="edit"><br>
Confirm Password: <input type="password" name="pass"><br>
<button type='submit'><span> Submit Change</span></button> <br>
</form>

<br><a href='index.php'>Logout</a>

</body>
</html>