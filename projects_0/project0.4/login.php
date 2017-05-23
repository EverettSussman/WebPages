<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div id="frm">
    <!-- Log In -->
  	<form action="process.php" method="POST">
  	<p>
  	  <label>Username: </label>
  	  <input type="text" id="user" name="user">
  	</p>
  	<p>
  	  <label>Password: </label>
  	  <input type="Password" id="pass" name="pass">
  	</p>
  	<p>
  	  <input type="submit" class="btn" name="Login">
  	</p>
    </form>

    <!-- Register -->
    <form action="" method="POST">
    <p>
      <label>Add New Username: </label>
      <input type="text" name="user1">
    </p>
    <p>
      <label>Retype Username: </label>
      <input type="text" name="user2">
    </p>
    <p>
      <label>Add New Password: </label>
      <input type="Password" name="pass1">
    </p>
    <p>
      <label>Retype Password: </label>
      <input type="Password" name="pass2">
    </p>
    <p>
      <input type="submit" class="btn" name="Register">
    </p>
    </form>
  	
  </div>
  <!-- Process new registration -->
  <div>
    <?php

      // Get values passed from login page
      if (isset($_POST['user1']) && isset($_POST['user2'])
          && isset($_POST['pass1']) && isset($_POST['pass2']) 
          && $_POST['user1'] != "" && $_POST['user2'] != "" && $_POST['pass1'] != "" 
          && $_POST['pass2'] != "") {

        // Assign variables
        $u = $_POST['user1'];
        $u2 = $_POST['user2'];
        $p = $_POST['pass1'];
        $p2 = $_POST['pass2'];

        if ($u != $u2 || $p != $p2) {
          // Mismatched inputs
          echo "<p>Make sure you have repeated your new username and passwords correctly!</p>";
          $_POST = array();
        } else {

          // To prevent mysql injection
          $u = mysql_real_escape_string(stripcslashes($u));
          $u2 = mysql_real_escape_string(stripcslashes($u2));
          $p = mysql_real_escape_string(stripcslashes($p));
          $p2 = mysql_real_escape_string(stripcslashes($p2));

          // Connect to server and database
          mysql_connect("localhost", "root", "") or die("Failed to connect.".mysql_error());
          mysql_select_db("test") or die("Failed to find database.".mysql_error());

          // Insert new user
          mysql_query("Insert into test (username, password) Value ('$u', '$p')")
                      or die("Failed to insert information.".mysql_error());
          echo "Success!  You have now registered for our site!  Try logging in :).";
        }
        
      } else {
        echo "
        <div class='register'>
          <p>Please enter all fields.</p> 
        </div>";
      }

    ?>
  </div>
</body>
</html>