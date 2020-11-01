<?php

require 'config.php';

if(!empty($_POST)) {

  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if($username=='' || $email=='' || $password=='') {
    echo "<script>alert('Fill the form data')</script>";
  }else{
    $sql = "SELECT COUNT(email) as num FROM users WHERE email= :email";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':email',$email);

    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  } if($row['num'] > 0) {
    echo '<script>alert("This user email already exit");
    window.location.replace("login.php")</script>';
   
  } else {
    $passwordHash = password_hash($password,PASSWORD_BCRYPT);
    $sql = "INSERT INTO users (name, email,password) VALUES(:username,:email,:password)";

    $stmt = $pdo->prepare($sql);

    $stmt->bindValue(':username',$username);
    $stmt->bindValue(':email',$email);
    $stmt->bindValue(':password',$passwordHash);

    $result = $stmt->execute();

    if($result) {
      echo "Thanks for your registration!".'<a href="login.php">Login</a>';
    }


  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="card">
    <div class="card-body">
      <div class="card-title"><h1>Register</h1></div>
        <form action="register.php" method="post">
          <div class="form-group">
            <label for="username">Name</label>
            <input class="form-control" type="text" name="username" value="" required>
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" type="email" name="email" value="" required>
          </div>
          
          <div class="form-group">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" value="" required>
          </div>

          <div class="form-group">
            <input class="btn btn-primary" type="submit" name="" value="Register">
            <a href="login.php" class="btn btn-light">Login</a>
          </div>
        </form>
    </div>
  </div>
  
</body>
</html>