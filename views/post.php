  <?php
  
  require_once("header.php");
  
  ?>
  <div class="hero-img">
    <img src="branch-4.jpg" alt="A nice hotel">
  </div>
  <hr>
  <div class="post-container">
    <?php 

    $post = new Postcotrl();

    $post->showPost();

    ?>
    <div class="button-container">
      <button class="btn">EDIT</button>
      <button class="btn">DELETE</button>
    </div>
  </div>
<?php

require_once("footer.php");

?>