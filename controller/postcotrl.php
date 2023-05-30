<?php

require_once("../models/posts.class.php");


class Postcotrl
{
  public function showPost()
  {

    $post = new Posts();

    $post->id = $_GET["id"];

    $post->read_post();

    echo "<div class=\"post-title\"> {$post->title} </div>
        <div class=\"post-content\">{$post->body}</div>";

  }
  public function showPosts()
  {
  
    $post = new Posts();

    $result_set = $post->read_posts();

    foreach($result_set as $result){

      echo "<div class=\"post-box\">
      <div class=\"content\">
      <div class=\"title\">{$result["title"]}</div>
      <div class=\"description\">{$result["description"]}</div>
      </div>
      <a href=\"post.php?id={$result["id"]}\" class=\"btn\">Read more</a>
      </div>";

    }

  }
}