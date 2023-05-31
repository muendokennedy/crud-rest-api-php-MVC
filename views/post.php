  <?php
  
  require_once("header.php");
  
  ?>
  <div class="hero-img">
    <img src="branch-4.jpg" alt="A nice hotel">
  </div>

  <form>
    <input type="hidden" name="">
  </form>
  <hr>
  <div class="post-container">
    <?php 

    $post = new Postcotrl();

    $post->showPost();

    $post->id = $_GET["id"];



    ?>
    <div class="button-container">
      <button class="btn"><a href="create.php?id=<?php echo $post->id; ?>">EDIT</a></button>
      <button class="btn">DELETE</button>
    </div>
  </div>
<?php

require_once("footer.php");

?>