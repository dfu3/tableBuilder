<html>
<head></head>
<body>

<?php 
 include_once("../model/Model.php");

echo "<h2>User Profile: " . $_REQUEST['username'] . "</h2>";
$mod = new Model();

$img = 'model/uploads/' . $mod->getImg();
echo "<img src='$img' style='width:304px;height:228px;'><br><br>";
 echo $mod->getAccount();
?>

<br><hr>
<h3>Edit Profile</h3>
<form action="view/edit.php" autocomplete="off">
Enter New Display Name: <input type="text" name="edit"><br>
Confirm Password: <input type="password" name="pass"><br>
<button type='submit'><span> Submit Change</span></button> <br>
</form>

<form action="view/picUp.php" method="post" enctype="multipart/form-data" autocomplete="off">
   Upload Profile Picture:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    Confirm Password: <input type="password" name="pass2"><br>
    <input type="submit" value="Upload Image" name="upload">
</form>

<br><a href='index.php'>Logout</a>

</body>
</html>