<?php

require_once("../models/posts.class.php");


class Postcotrl
{
  public $id;

  public function showPost()
  {

    $post = new Posts();

    $post->id = (isset($_GET["id"])) ? $_GET["id"] : die();

    $post->read_post();

    echo "<div class=\"post-title\"> {$post->title} </div>
        <div class=\"post-content\">{$post->body}</div>";

  }

  public function show_posts_update_mode()
  {

    if(isset($_GET["id"])){

      $post = new Posts();

      $post->id = $_GET["id"];

      $post->read_post();
      
      echo "<div class=\"create-post-box\">
            <h1>create a new post</h1>
            <form action=\"../includes/update.includes.php\" method=\"POST\">
              <div class=\"input-box\">
                <label for=\"title\">Title</label>
                <input type=\"text\" name=\"title\" id=\"title\" value=\"{$post->title}\">
                <input type=\"hidden\" name=\"uid\" id=\"uid\" value=\"{$post->id}\">
              </div>
              <div class=\"input-box\">
                <label for=\"category_name\">Category</label>
                <select name=\"category_name\" id=\"category_name\">
                  <option value=\"1\" >Technology</option>
                  <option value=\"2\">Computer science</option>
                  <option value=\"3\">Mechanical Engineering</option>
                  <option value=\"4\">Agriculture</option>
                </select>
              </div>
              <div class=\"input-box\">
                <label for=\"desc\">Description</label>
                <textarea name=\"desc\" id=\"desc\">{$post->description}</textarea>
              </div>
              <div class=\"input-box\">
                <label for=\"content\">Content</label>
                <textarea name=\"content\" id=\"content\">{$post->body}</textarea>
              </div>
              <div class=\"input-box\">
                <button type=\"submit\" class=\"btn\" name=\"submit\">Update</button>
              </div>
            </form>
            </div>";

    } else {

      echo "<div class=\"create-post-box\">
            <h1>create a new post</h1>
            <form action=\"../includes/update.includes.php\" method=\"POST\">
              <div class=\"input-box\">
                <label for=\"title\">Title</label>
                <input type=\"text\" name=\"title\" id=\"title\">
              </div>
              <div class=\"input-box\">
                <label for=\"category_name\">Category</label>
                <select name=\"category_name\" id=\"category_name\">
                  <option value=\"1\">Technology</option>
                  <option value=\"2\">Computer science</option>
                  <option value=\"3\">Mechanical Engineering</option>
                  <option value=\"4\">Agriculture</option>
                </select>
              </div>
              <div class=\"input-box\">
                <label for=\"desc\">Description</label>
                <textarea name=\"desc\" id=\"desc\"></textarea>
              </div>
              <div class=\"input-box\">
                <label for=\"content\">Content</label>
                <textarea name=\"content\" id=\"content\"></textarea>
              </div>
              <div class=\"input-box\">
                <button type=\"submit\" class=\"btn\" name=\"submit\">Publish</button>
              </div>
            </form>
            </div>";
    }


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
  public function create_post($category_id, $title, $description, $body)
  {
    $post = new Posts();

    if(!$this->empty_input($category_id, $title, $description, $body)){

      header("Location: ../views/create.php?error=emptyinputs");
      
      exit();
      
    }
    
    $post->create($category_id, $title, $description, $body);
    
  }
  
  public function update_post($category_id, $title, $description, $body)
  {
    $post = new Posts();

    $post->id = $this->id;

    if(!$this->empty_input($category_id, $title, $description, $body)){

      header("Location: ../views/create.php?error=emptyinputs");
      
      exit();
      
    }
    $post->update($category_id, $title, $description, $body);
  }
  
  public function empty_input($category_id, $title, $description, $body)
  {
      $result = "";
  
    if(empty($category_id) || empty($title) || empty($description) || empty($body)){
  
      $result = false;
  
    } else{
  
      $result = true;
  
    }
    return $result;
  
  }
}
