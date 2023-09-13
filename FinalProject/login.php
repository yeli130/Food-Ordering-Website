<!DOCTYPE html>
<html>
  <head>
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/153a47b5e6.js" crossorigin="anonymous"></script>
    <style>
      body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
      }

      #login-container {
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
      input[type="password"] {
        border: none;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 10px;
        width: 100%;
      }

      input[type="submit"] {
        background-color: #24a0ed;
        border: none;
        border-radius: 5px;
        color: #ffffff;
        cursor: pointer;
        font-size: 16px;
        margin-top: 20px;
        padding: 10px;
        width: 100%;
      }

      .register-link {
        text-align: center;
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <?php

    include('header.html');
    require('./mysqli_connect.php');
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
      $username = $_POST['username'];
      $password = $_POST['password'];

      if (empty($username) || empty($password)) {
        echo '<script>alert("ERROR: username and password cannot be empty")</script>';
        return;
      }

      $q = "SELECT user_id, email, username, first_name, last_name FROM users WHERE username = '$username' AND password = '$password'";
      $result = mysqli_query($dbc, $q);
      $num_result = mysqli_num_rows($result);

      if ($num_result <= 0) {
        echo <<<EOL
<script>
// Display alert message
var alertBox = alert("ERROR: invalid username or password!");
</script>
EOL;
      } else {
        $row = mysqli_fetch_row($result);
        $firstname = $row[3];

        setcookie("firstname", $firstname, time() + (86400 * 30), "/");
        echo <<<EOL
<script>
// Display alert message
var alertBox = alert("Login successfully! Welcome back, $firstname!");
window.location.href = "index.php";
</script>
EOL;
      }

    }
    ?>
    <br>
    <div id="login-container">
      <h1>Login</h1>
      <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Login">
      </form>

      <div class="register-link">
        Don't have an account? <a href="register.php">Register now</a>
      </div>
    </div>
    <?php include('footer.html'); ?>
  </body>
</html>
