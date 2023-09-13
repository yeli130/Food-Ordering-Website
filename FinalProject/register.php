<!DOCTYPE html>
<html>
  <head>
    <title>Sign Up</title>
    <script src="https://kit.fontawesome.com/153a47b5e6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
      }

      #register-container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        margin: 0 auto;
        max-width: 500px;
        padding: 20px;
      }

      h1 {
        text-align: center;
      }

      label {
        display: block;
        font-size: 16px;
        font-weight: bold;
        margin-bottom: 10px;
      }

      input[type="text"],
      input[type="email"],
      input[type="password"] {
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 10px;
        width: 100%;
      }

      input[type="submit"] {
        background-color: #4CAF50;
        border: none;
        border-radius: 5px;
        color: #ffffff;
        cursor: pointer;
        font-size: 16px;
        margin-top: 20px;
        padding: 10px;
        width: 100%;
      }

      span {
        color: red;
      }
    </style>
    <script>
      function clearErrs() {
        var errorSpans = document.querySelectorAll('[name="error"]');
        for (var i = 0; i < errorSpans.length; i++) {
          errorSpans[i].innerHTML = "";
  }
}
    </script>
  </head>

  <body>
  <?php
include('header.html');
$username = $email = $password = $firstname = $lastname = "";
$usernameErr = $emailErr = $passwordErr = $password_confirmErr = $firstnameErr = $lastnameErr = "";

require('./mysqli_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $username = $_POST['username'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password_confirm = $_POST['password-confirm'];
  
  if (empty($username)) {
    $usernameErr = 'Please enter a username.';
  }

  if (empty($firstname)) {
    $firstnameErr = 'Please enter a first name.';
  }

  if (empty($lastname)) {
    $lastnameErr = 'Please enter a last name.';
  }

  if (empty($email)) {
    $emailErr = 'Please enter an email address.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = 'Please enter a valid email address.';
  }

  if (empty($password)) {
    $passwordErr = 'Please enter a password.';
  } elseif (strlen($password) < 8) {
    $passwordErr = 'Your password must be at least 8 characters long.';
  }

  if (empty($password_confirm)) {
    $password_confirmErr = 'Please confirm your password.';
  } elseif ($password_confirm !== $password) {
    $password_confirmErr = 'Your password confirmation does not match your password.';
  }

  if (!($usernameErr || $emailErr || $password_confirmErr || $passwordErr || $firstnameErr || $lastnameErr)) {
    // save to database
    $q = "INSERT INTO users (email, username, first_name, last_name, password, registration_date) VALUES ('$email', '$username', '$firstname', '$lastname', '$password', now());";
    if (mysqli_query($dbc, $q)) {
      echo <<<EOL
<script>
// Display alert message
var alertBox = alert("New user created successfully!");
window.location.href = "login.php";
</script>
EOL;
      // header('Location: index.php');
    } else {
      echo "Error: " . $q . "<br>" . mysqli_error($dbc);
    }
    
    exit;
  }
}
?>
    <br>
    <div id="register-container">
      <h1>Register</h1>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" onchange="clearErrs()">
        <span name = "error"><?php echo $usernameErr?></span>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" onchange="clearErrs()">        
        <span name = "error"><?php echo $emailErr?></span>

        <label for="firstname">First Name</label>
        <input type="text" id="firstname" name="firstname" onchange="clearErrs()">        
        <span name = "error"><?php echo $firstnameErr?></span>

        <label for="lastname">Last Name</label>
        <input type="text" id="lastname" name="lastname" onchange="clearErrs()">        
        <span name = "error"><?php echo $lastnameErr?></span>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" onchange="clearErrs()">
        <span name = "error"><?php echo $passwordErr?></span>

        <label for="password-confirm">Confirm Password</label>
        <input type="password" id="password-confirm" name="password-confirm" onchange="clearErrs()">
        <span name = "error"><?php echo $password_confirmErr?></span>

        <input type="submit" value="Register">
      </form>
    </div>
    <?php include('footer.html'); ?>
  </body>
</html>
