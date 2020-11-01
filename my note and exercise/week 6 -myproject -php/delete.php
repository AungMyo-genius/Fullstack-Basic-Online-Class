<?php

require 'config.php';

$sql = "DELETE FROM images WHERE id =".$_GET['id'];

$stmt = $pdo->prepare($sql);

$stmt->execute();

header("Location: index.php");

?>


