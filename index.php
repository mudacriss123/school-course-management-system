<?php

session_start();

$user = isset($_POST['user']) ? $_POST['user'] : '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit']) && (isset($_POST['user']) & $_POST['user'] == '')) {
        echo "Username is empty!";
} 
	  elseif (isset($_POST['submit']) && (isset($_POST['pass']) & $_POST['pass'] == '')) {
        echo "Password is empty!";
}
	else {
		$mysqli = new mysqli("localhost", "root", "root", "database_initial");

	if(mysqli_connect_error()){

		echo"Cannot connect to the database";
	}


$query = "SELECT * FROM `users` WHERE `name` = 'Mahmoud'";
if ($result = $mysqli->query($query)) {

    /* fetch object array */
    while ($row = $result->fetch_row()) {
        printf ("%s (%s)\n", $row[0], $row[1]);
    }

    /* free result set */
    $result->close();
}

/* close connection */
$mysqli->close();
	}
	
}
?>
<html>
<head>
<title>Home</title>
</head>
<body>

<h1>Student Management center</h1>

<form action="" method="post">
  login:<br>
   <input type="text" name="user" id="user" value="<?php echo $user; ?>" /><br><br>
  <br>
  password:<br>
  <input type="password" name="pass" id="pass" value="" /><br><br>
  <br><br>
 <input type="submit" value="Login" name="submit" id="submit" /><br /><br />
   <input type="submit" value="register">

</form>


</body>
</html>
