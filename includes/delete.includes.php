<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){


  $id = $_POST["uid"];


  require_once("../models/database.class.php");
  require_once("../models/posts.class.php");
  require_once("../controller/postcotrl.class.php");

  $deleted_post = new Postcotrl();

  $deleted_post->id = $id;

  $deleted_post->delete_post();

  header("Location: ../views/post.php?msg=deletesuccessfully");

exit();

} else {

header("Location: ../views/create.php");

exit();

}