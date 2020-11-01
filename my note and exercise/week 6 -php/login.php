<?php

require 'config.php';
session_start();
if(!empty($_POST)) {
    $email = $_POST['email'];
    $passsword = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email=:email;";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':email',$email);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(empty($user)) {
        echo "<script>alert('Incorrect credentials, Try Again')</script>";
    } else {
        $vaildPassword = password_verify($passsword, $user['password']);

        if($vaildPassword) {
            $_SESSION['user_id'] =$user['id'];
            $_SESSION['loggedin'] =time();

            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Incorrect credentials, Try Again')</script>";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="card">
    <div class="card-body">
      <div class="card-title"><h1>Register</h1></div>
        <form action="Login.php" method="post">
          
          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="" required>
          </div>
          
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" value="" required>
          </div>

          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="" value="Login">
            <a href="register.php" class="btn btn-light">Register</a>
          </div>
        
        </form>
    
    </div>
  
  </div>
  
</body>
</html>