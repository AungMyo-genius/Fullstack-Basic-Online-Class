<?php 

require 'config.php';

$pdo_statement = $pdo->prepare("DELETE FROM posts where id=".$_GET['id']);

$pdo_statement->execute();

header('Location: index.php');