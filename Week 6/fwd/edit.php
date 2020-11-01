<?php

require 'config.php';

if (!empty($_POST)) {

  $title = $_POST['title'];
  $desc = $_POST['description'];
  $created_at = $_POST['created_at'];
  $id = $_POST['id'];

  if ($_FILES) {
    $targetFile = 'images/'.($_FILES['image']['name']);
    $imageName = $_FILES['image']['name'];
    $imageType = pathinfo($targetFile,PATHINFO_EXTENSION);

    if ($imageType != 'png' && $imageType != 'jpg' && $imageType != 'jpeg') {
      echo "<script>alert('Image must be png or jpg,jpeg');</script>";
    }else{
      move_uploaded_file($_FILES['image']['tmp_name'],$targetFile);

      $pdo_statement = $pdo->prepare("UPDATE posts set title='$title', description='$desc',image='$imageName',
                      created_at='$created_at' WHERE id = '$id'");

      $result = $pdo_statement->execute();
    }
  }else{
    $pdo_statement = $pdo->prepare("UPDATE posts set title='$title', description='$desc',
                    created_at='$created_at' WHERE id = '$id'");

    $result = $pdo_statement->execute();
  }

  if ($result) {
    echo "<script>alert('record is updated');window.location.href='index.php';</script>";
  }
}


$pdo_statement = $pdo->prepare("SELECT * FROM posts WHERE id=".$_GET['id']);
$pdo_statement->execute();

$result = $pdo_statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="card">
      <div class="card-body">
        <h1>Edit Record</h1>
        <form class="" action="" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
          <div class="form-group">
            <label for="username">Title</label>
            <input class="form-control" type="text" name="title" value="<?php echo $result[0]['title']?>" required>
          </div>

          <div class="form-group">
            <label for="username">Description</label>
            <textarea class="form-control" name="description" rows="8" cols="80"><?php echo $result[0]['description']?></textarea>
          </div>

          <div class="form-group">
            <label for="">Image</label><br>
            <img src="images/<?php echo $result[0]['image']?>" width="100" height="100" alt=""><br><br>
            <input type="file" name="image" value="">
          </div>

          <div class="form-group">
            <label for="username">Date</label>
            <input class="form-control" type="date" name="created_at" value="<?php echo date('Y-m-d',strtotime($result[0]['created_at'])); ?>" required>
          </div>

          <div class="form-group">
            <input type="submit" class="btn btn-primary" name="" value="Update">
            <a class="btn btn-warning" href="index.php">Back</a>
          </div>
        </form>
      </div>
  </body>
</html>
