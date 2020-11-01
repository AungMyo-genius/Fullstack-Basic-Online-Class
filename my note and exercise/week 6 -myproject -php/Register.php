<?php

require 'config.php';
$nameErr = $emailErr= $passErr='';
$name = $email = '';
if(!empty($_POST)) {

    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    if($name == "" || $email=="" || $password="") {
      if (empty($_POST["name"])) {
        $nameErr = "Name is required";
      } else {
        $name = $_POST["name"];
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
  
      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } else {
        $email = $_POST["email"];
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
          $nameErr = "Only letters and white space allowed";
        }
      }
  
      if (empty($_POST["password"])) {
        $passErr = "Password is required";
      } else {
        $password = $_POST["password"];
      }
    } else {
      $sql = "SELECT COUNT(email) AS num FROM users WHERE email=:email";

      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':email',$email);
      $stmt->execute();
  
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
      if ($row['num'] >0) {
        echo "<script>alert('This user already exits');
        window.location.href='login.php';
        </script>";
      } else {
        $passwordHash =password_hash($password,PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password)";
        $stmt = $pdo->prepare($sql);
  
        $stmt->bindValue(':name',$name);
        $stmt->bindValue(':email',$email);
        $stmt->bindValue(':password',$passwordHash);
  
        $result = $stmt->execute();
       
        if($result) {
          header("Location:index.php");
        }
  
  
  
      }

    }
    


  




}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhotoGallery</title>
    <link rel="icon" href="gallery-icon.png" type="image" sizes="16x16">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" 
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <div class="container pt-3">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">PhotosAreOurMemories</a>
            <a class="navbar-brand" href="#">Memory is our life</a>
        </nav>
    </div>
    <br>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <div class="card-title"><h1>Register</h1></div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
              <div class="form-group">
                <label for="username">Name</label>
                <input class="form-control" id="form-text" type="text" name="name" value="<?php echo $name?>">
                 <span><?php echo $nameErr?></span>
              </div>
    
              <div class="form-group">
                <label for="email">Email</label>
                <input class="form-control" type="email" id="form-text"  name="email" value="<?php echo $email?>">
                <span><?php echo $emailErr?></span>
              </div>
              
              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name="password" value="">
                <span><?php echo $passErr?></span>
              </div>
    
              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="" value="Register">
                <a href="login.php" class="btn btn-secondary">Login</a>
                
              </div>
            </form>
        </div>
      </div>
      </div>

    

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>   
</body>
</html>