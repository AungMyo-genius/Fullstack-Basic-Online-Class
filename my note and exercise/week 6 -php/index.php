<?php

require 'config.php';
session_start();

if(empty($_SESSION['user_id']) || empty($_SESSION['loggedin'])) {
    echo "<script>
        alert('PLease logged in to containuce');
        window.location.href='login.php';
    </script>";
}

?>





<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <?php 
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <h2>Post Management</h2>
                <div>
                    <a href="add.php" class="btn btn-primary">Create</a>
                    <a style="float:right" href="logout.php" class="btn btn-success">Logout</a>
                </div>

            <thead>
                <tr>
              <th width="20%">Title</th>
              <th width="40%">Description</th>
              <th width="20%">Created At</th>
              <th width="10%">Action</th>
                </tr>
            </thead>

            <tbody>
                
                    <?php 
                    if ($result) {
                        foreach($result as $value) { ?>
                        <tr>
                        <td><?php echo $value['title'];?></td>
                        <td><?php echo $value['description'];?></td>
                        <td><?php echo date('d-m-Y', strtotime($value['created_at']));?></td>
                        <td>
                        <a href="edit.php?id=<?php echo $value['id'];?>">Edit</a>
                        <a href="delete.php?id=<?php echo $value['id'];?>">Delete</a>
                        </td>
                        </tr>
                    
                    <?php } }?>
                
            </tbody>
            
          
            </table>
        </div>
    </div>
   
          
  </body>
</html>
