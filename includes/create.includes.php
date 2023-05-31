<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $name = $_POST["category_name"];

  $title = $_POST["title"];
  
  $description = $_POST["desc"];

  $body = $_POST["content"];


  require_once("../models/database.class.php");
  require_once("../models/posts.class.php");
  require_once("../controller/postcotrl.class.php");

  $created_post = new Postcotrl();

  $created_post->create_post($name, $title, $description, $body);

  header("Location: ../views/create.php?error=none");

exit();

} else {

header("Location: ../views/create.php");

exit();

}


