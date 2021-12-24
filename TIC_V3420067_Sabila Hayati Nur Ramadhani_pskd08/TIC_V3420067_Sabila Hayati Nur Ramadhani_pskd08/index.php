<form method="POST" action="">
<style type="text/css">
    body{
	background-image: url("Blue.jpg"); 
    }
</style>
<input type="text" name="password_hash"><br><br>
Masukan password :<input type="submit" name="proses" value="Proses">
</form>
<?php
error_reporting(0);
if(isset($_POST['proses'])){
	$password = $_POST['password_hash'];
	$hash = password_hash($password, PASSWORD_DEFAULT);
	echo "password : ".$_POST['password_hash'];
	echo "<br>Hasil hash : ".$hash;
}
?>