<?php session_start(); ?>
<?php include 'functions.php'; ?>
<?php include 'db.php'; ?>
<?php login(); ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login | Asset Inventory</title>
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>

  <div class="login-container">
    <h2>Login</h2>
    <form action="login.php" method="post">
      <div class="form-group">
        <label for="username">Username or Email</label>
        <input type="text" id="username" name="username" required>
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" name="login">Login</button>
      <div class="forgot-password">
        <a href="forgot-password.php">Forgot Password?</a>
      </div>
    </form>
  </div>

</body>
</html>
