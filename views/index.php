<?php

require_once("header.php");

?>
  <div class="hero-img">
    <img src="branch-4.jpg" alt="A nice hotel">
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

require_once("footer.php");

?>