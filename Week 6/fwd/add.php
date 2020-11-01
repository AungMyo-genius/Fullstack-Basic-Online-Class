<?php

require 'config.php';

if (!empty($_POST)) {

  $targetFile = 'images/'.($_FILES['image']['name']);
  $imageType = pathinfo($targetFile,PATHINFO_EXTENSION);

  if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg') {
    echo "<script>alert('Image must be png or jpg,jpeg');</script>";
  }else{
    move_uploaded_file($_FILES['image']['tmp_name'],$targetFile);

    $sql = "INSERT INTO posts(title,description,image,created_at) VALUES (:title,:description,:image,:created_at)";

    $pdo_statement = $pdo->prepare($sql);

    $result = $pdo_statement->execute(
        array(':title'=>$_POST['title'],':description'=>$_POST['description'],
        ':image'=>$_FILES['image']['name'],
        ':created_at'=>$_POST['created_at'])
    );
    if ($result) {
      echo "<script>alert('record is added');window.location.href='index.php';</script>";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <h1>Add New Record</h1>
        <form class="" action="add.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="username">Title</label>
            <input class="form-control" type="text" name="title" value="" required>
          </div>

          <div class="form-group">
            <label for="username">Description</label>
            <textarea class="form-control" name="description" rows="8" cols="80"></textarea>
          </div>

          <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="image" value="" required>
          </div>

          <div class="form-group">
            <label for="username">Date</label>
            <input class="form-control" type="date" name="created_at" value="" required>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="" value="ADD">
            <a class="btn btn-warning" href="index.php">Back</a>
          </div>
        </form>
      </div>
  </body>
</html>
