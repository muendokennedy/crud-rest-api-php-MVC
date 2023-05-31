  <?php
  
  require_once("header.php");
  
  ?>
  <div class="hero-img">
    <img src="branch-4.jpg" alt="A nice hotel">
  </div>
  <hr>
  <div>
  <?php
    if(isset($_GET["msg"])){

      if(($_GET["msg"] == "deletesuccessfully")){

        echo "<div id=\"error\">The post has been deleted successfully</div>";

         echo "<div class=\"button-container\" id=\"back-home-container\">
                <button class=\"btn\" id=\"back-home\"><a href=\"index.php\">HOME</a></button>
              </div>";
      }

    }
    ?>
    </div>
  <div class="post-container">
    <?php 

    $post = new Postcotrl();

    $post->showPost();

    $post->id = $_GET["id"];

    ?>
   <div class="button-default">
      <button class="btn"><a href="create.php?id=<?php echo $post->id; ?>">EDIT</a></button>
        <button class="btn" id="default">DELETE</button>
    </div>
    <div id="moodle-delete">
      <div>
      <p>Are you sure you want to delete this post? Once deleted it cannot be recovered!</p>
    <div class="button-container">
      <button class="btn" id="cancel">CANCEL</button>
      <form action="../includes/delete.includes.php" method="post">
        <input type="hidden" name="uid" value="<?php echo $post->id; ?>">
        <button class="btn">CONTINUE</button>
      </form>
    </div>
    </div>
    </div>
  </div>

<?php
require_once("footer.php");

?>