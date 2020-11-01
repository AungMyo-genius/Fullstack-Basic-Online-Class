<?php
session_start();

if(empty($_SESSION['user_id']) || empty($_SESSION['logged_in'])) {
  echo "<script>window.location.href='login.php'</script>";
}

require 'config.php';
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
    <link rel="stylesheet" href="index-style.css">
</head>

<?php 
  $sql = "SELECT * from images ORDER BY id DESC";

  $stmt = $pdo->prepare($sql);

  $stmt->execute();

  $result = $stmt->fetchALL();


?>


<body>
    <div class="container pt-3">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">PhotosAreOurMemories</a>
            <form class="form-inline my-2 my-lg-0">
            
            <a class="btn btn-outline-success my-2 my-sm-0" href="add.php">Add Photo</a>
            <a class="btn btn-outline-secondary my-2 my-sm-0" href="Logout.php">Logout</a>
            
    </form>
        </nav>
    </div>
<div class="container">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="default.jpg" alt="First slide">
    </div>
    <?php if($result) { foreach($result as $value) { ?> 
    
    <div class="carousel-item">
    <p id="img-title" class="d-inline p-2 bg text-white"><?php echo $value['Title'];?><span>
         <a class="btn btn-outline-danger my-2 my-sm-0" href="delete.php?id=<?php echo $value['id']?>">Delete</a></span></p>
      <img class="d-block w-100" src="<?php echo "images/".$value['image_path']?>" alt="">
      <div class="carousel-caption">
         -->
         
      </div>
    </div>
    <?php }} ?>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
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