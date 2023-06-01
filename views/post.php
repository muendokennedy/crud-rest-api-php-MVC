  <?php
  
  require_once("header.php");
  
  ?>
  <div class="hero-img">
    <img src="branch-4.jpg" alt="A nice hotel">
  </div>
  <hr>
  
  <?php

   $post = new Postcotrl();

   $post->show_success_delete();

    $post->showPost();

    $post->id = $_GET["id"];

    require_once("footer.php");

?>