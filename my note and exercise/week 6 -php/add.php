<?php

require 'config.php';




if(!empty($_POST)) {
    $targetFile = 'images/'.($_FILES['image']['name']);
    $imageType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    if($imageType != 'jpg' && $imageType != 'png' && $imageType != 'jpeg') {
        echo "<script>alert('Image must be jpg, png and jpeg')</script>";
    } else {
        move_uploaded_file($_FILES['image']['tmp_name'],$targetFile);

        $sql = "INSERT INTO posts (title, description,Image, created_at) VALUES(:title,:description,:image,:created_at)";

    $pdo_statement = $pdo->prepare($sql);

    $result = $pdo_statement->execute(
        array(':title'=>$_POST['title'], ':description'=>$_POST['description'],':image'=>$_FILES['image']['name'],
         ':created_at'=>$_POST['created_at'])
    );

    
    

    if($result) {
        echo "<script>alert('record id added');window.location.href='index.php';</script>";
    }

    }

    


}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <h2>Add your new Posts</h2>
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="">Image</label>
                <input type="file" name="image" value="" required>
            </div>

            <div class="form-group">
                <label for="date">Created_at</label>
                <input type="date" class="form-control" name="created_at" value="">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Create">
                <a href="index.php" class="btn btn-warning">Back</a>
            </div>
            </form>         

            
        
        </div>
    
    </div>
</body>
</html>