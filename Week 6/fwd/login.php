<?php

session_start();
require 'config.php';

if (!empty($_POST)) {

  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM users WHERE email = :email";
  $stmt = $pdo->prepare($sql);

  $stmt->bindValue(':email',$email);

  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);

  if (empty($user)) {
    echo "<script>alert('Incorrect credentials, Try Again')</script>";
  }else{
    $validPassword = password_verify($password,$user['password']);
    if ($validPassword) {

      $_SESSION['user_id'] = $user['id'];
      $_SESSION['logged_in'] = time();

      header('Location: index.php');
      exit();
    }else{
      echo "<script>alert('Incorrect credentials, Try Again')</script>";
    }
  }

}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <h1>Login</h1>
        <form class="" action="login.php" method="post">
          <div class="form-group">
            <label for="username">Email</label>
            <input class="form-control" type="email" name="email" value="" required>
          </div>

          <div class="form-group">
            <label for="username">Password</label>
            <input class="form-control" type="password" name="password" value="" required>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="" value="Login">
            <a href="register.php">Register</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
