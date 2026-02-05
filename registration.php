<?php include 'functions.php'; ?>
<?php register(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: url('your-background.jpg') no-repeat center center fixed;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .form-container {
      background-color: rgba(255, 255, 255, 0.9);
      padding: 30px 40px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.3);
      width: 350px;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      font-size: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .form-buttons {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .form-buttons button {
      flex: 1;
      padding: 10px;
      font-size: 16px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .btn-register {
      background-color: #28a745;
      color: white;
    }

    .btn-cancel {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body>

  <div class="form-container">
    <h2>Registration</h2>
    <form action="registration.php" method="POST">
      <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required />
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required />
      </div>

      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required />
      </div>

      <div class="form-group">
        <label for="repassword">Re-enter Password</label>
        <input type="password" name="repassword" id="repassword" required />
      </div>

      <div class="form-buttons">
        <button type="submit" class="btn-register" name="register">Register</button>
        <button type="reset" class="btn-cancel" name="cancel">Cancel</button>
      </div>
    </form>
  </div>

</body>
</html>
