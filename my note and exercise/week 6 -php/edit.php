<?php

require 'config.php';

if(!empty($_POST)) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $created_at = $_POST['created_at'];
    $id = $_POST['id'];

    if($_FILES) {
        $targetFile = 'images/'.$_FILES['image']['name'];
        $imageName = $_FILES['image']['name'];
        $imageType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

        if($imageType != jpg && $imageType != png && $imageType != jpeg) {
            echo "<script>Image must be jpg or png, jpeg</script>";
        } else {
            move_uploaded_file($targetFile,$_FILES['image']['tmp_name']);

            $sql ="UPDATE posts SET title='$title',description='$desc',Image='$imageName',created_at='$created_at' WHERE id='$id'";
            $stmt = $pdo->prepare($sql);

            $fileUpdate = $stmt->execute();
        }
    } else {
        $sql ="UPDATE `posts` SET `title`='$title',`description`='$desc',`created_at`='$created_at' WHERE 'id'='$id'";
            $stmt = $pdo->prepare($sql);

            $fileUpdate = $stmt->execute();

    } if($fileUpdate) {
        header("Location: index.php");
    }
} 




$pdo_statement = $pdo->prepare("SELECT * FROM posts WHERE id=".$_GET['id']);
$pdo_statement->execute();

$result = $pdo_statement->fetchAll();




?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="card">
        <div class="card-body">
            <form action="edit.php?id=<?php echo $_GET['id'];?>" method="post">
            <input type="hidden" name="id" value=<?php echo $result['0']['id']?>>
            <div class="form-group">
                <h2>Add your new Posts</h2>
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="<?php echo $result['0']['title']?>">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10"><?php echo $result['0']['description']?>
                </textarea>
            </div>
            
            <div class="form-group">
                <img src="images/<?php echo $result['0']['Image']?>" alt="" width=100 height=100><br><br>
                <input type="file" name="image" value="">
            </div>


            <div class="form-group">
            <label for="date">Created_at</label>
            <input type="date" class="form-control" name="created_at" value="<?php echo date('d-m-Y',strtotime($result['0']['created_at']))?>">
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Edit">
                <a href="index.php" class="btn btn-warning">Back</a>
            </div>
            </form>


            
        
        </div>
    
    </div>
</body>
</html>