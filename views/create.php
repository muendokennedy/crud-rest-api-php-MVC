<?php

require_once("header.php");

?>
  <div class="create-post-box">
    <h1>create a new post</h1>
    <form action="#">
      <div class="input-box">
        <label for="title">Title</label>
        <input type="text" name="title" id="title">
      </div>
      <div class="input-box">
        <label for="desc">Description</label>
        <textarea name="desc" id="desc"></textarea>
      </div>
      <div class="input-box">
        <label for="content">Content</label>
        <textarea name="content" id="content"></textarea>
      </div>
      <div class="input-box">
        <button type="submit" class="btn" name="submit">Publish</button>
      </div>
    </form>
  </div>
<?php

require_once("footer.php");

?>