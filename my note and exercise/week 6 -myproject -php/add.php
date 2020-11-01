<?php

require 'config.php';
session_start();
$imageErr= "";

if(!empty($_POST)) {
    $targetFile = 'images/'.($_FILES['image']['name']);
    $imageType = pathinfo($targetFile,PATHINFO_EXTENSION);

    if($imageType != "jpg" && $imageType != "jpeg" && $imageType != "png") {
      $imageType ="Photo type must be JPG, JPEG or PNG.";
    } else {
      move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);

      $sql = "INSERT INTO images(image_path,Title) VALUES (:image_path,:title)";

      $stmt = $pdo->prepare($sql);

      $result = $stmt->execute(
        array(
          ":image_path"=>$_FILES['image']['name'], ":title"=>$_POST['title']
        )
        );

      if($result) {
        echo "<script>window.location.href='index.php'</script>";
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
            <a class="btn btn-outline-secondary my-2 my-sm-0" href="Logout.php">Logout</a>
        </nav>
    </div>
    <br>
    <div class="container">
    <div class="card">
        <div class="card-body">
          <div class="card-title"><h1>Add Your Memories</h1></div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <input class="form-control-file" type="file" name="image" value="">
                <span><?php echo $imageErr;?></span>
              </div>

              <div class="form-group">
                <label for="Title">Photo Title</label>
                <input class="form-control" name="title" id="form-text" type="Text">
              </div>
    
              <div class="form-group">
                <input class="btn btn-primary" type="submit" name="" value="Add">
                <a href="index.php" class="btn btn-secondary">Back</a>
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