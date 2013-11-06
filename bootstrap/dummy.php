<html>
<head>PHP
	<link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css" />
</head>
<body>

<form action"dummy.php" method=POST>
Username:<input type="text" name="user"><br />
Password:<input type="password" name="pass"><br />
<input type="submit" value="GO!"><p>

<form>
	

<?php
$user=$_POST['user'];
$pass=$_POST['pass'];

if(($user=="Kaizer")&&($pass=="kaizer09"))
	echo "Access is granted";
else
	echo "Access is denied";

?>



</body>
</html>