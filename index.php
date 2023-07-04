<?php 

require_once __DIR__ . "/controller/postcotrl.class.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Creating and manipulating posts API</title>
  <link rel="stylesheet" href="../style.css?v=<?php echo time(); ?>">
</head>

<body>
  <nav>
    <div class="nav-bar">
      <a href="index.php">Home</a>
      <a href="#">About us</a>
      <a href="#">Contact</a>
      <a href="/views/create.php">Write</a>
    </div>
  </nav>
  <div class="hero-img">
    <img src="views/branch-4.jpg" alt="A nice hotel">
    <h2>Postarata writers</h2>
  </div>
  <hr>
  <div class="search-input">
    <input type="search" placeholder="Search for a post...">
  </div>
  <div class="post-view">
    <?php
          $post = new Postcotrl();

          $post->showPosts();
      ?>
  </div>
  <?php

require_once("./views/footer.php");

?>