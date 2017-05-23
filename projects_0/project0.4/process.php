<?php

	// Get values passed from login page
	$username = $_POST['user'];
	$password = $_POST['pass'];

	// To prevent mysql injection
	$username = stripcslashes($username);
	$username = mysql_real_escape_string($username);
	$password = stripcslashes($password);
	$password = mysql_real_escape_string($password);

	// Connect to server and database
	mysql_connect("localhost", "root", "");
	mysql_select_db("test");

	// Query database for user
	$result = mysql_query("select * from test where username = '$username' and password = '$password'")
						or die("Failed to query database. ".mysql_error());
	$row = mysql_fetch_array($result);
	if ($row['username'] == $username && $row['password'] == $password) {
		header('Location: http://localhost/webpages/projects_0/project0.3/html/index.html');

	} else {
		echo "Failed to log in.";
	}
	

?>