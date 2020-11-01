<?php
$emailErr= $passErr = $email='';
require 'config.php';
session_start();

if(isset($_POST['submit'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $stmt = $pdo->prepare("SELECT * from users WHERE email=:email");

    $stmt->bindValue(":email",$email);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(empty($user)) {
        if(empty($POST['email'])) {
          $emailErr = "Plz Enter your email to continue";
        } else {
          $emailErr ="Your email is not registerd! Please register to continue";
        }
        
    } else {
        if(empty($_POST['password'])){
          $passErr = "Plz fill the password to continue";
        } else {
          $passwordVerify = password_verify($password,$user['password']);
        if($passwordVerify) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['logged_in'] = time();

            header("Location: index.php");

        } else {
          $passErr = "Your Password is wrong <span><a href='forget.php'> Forget Passsword?</a></span>";
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
                
              <div class="form-group">
                <label for="email" class="col-sm-3">Email</label>
                <input class="form-control" type="email" id="form-text"  name="email" value="">
                <span><?php echo $emailErr?></span>
              </div>
              
              <div class="form-group">
                <label for="password" class="col-sm-3">Password</label>
                <input class="form-control" type="password" name="password" value="">
                <span><?php echo $passErr?></span>
              </div>
    
              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="submit" value="Login">
                <a href="Register.php" class="btn btn-secondary">Register</a>
                
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