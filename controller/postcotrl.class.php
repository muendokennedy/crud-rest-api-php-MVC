<?php

require_once dirname(__DIR__) . "/models/posts.class.php";


class Postcotrl
{
  public $id;

  public function showPost()
  {

    $post = new Posts();

    $post->id = (isset($_GET["id"])) ? $_GET["id"] : die();

    $post->read_post();

    echo "<div class=\"post-container\">
          <div class=\"post-title\"> {$post->title} </div>
        <div class=\"post-content\">{$post->body}</div>
        <div class=\"button-default\">
        <button class=\"btn\"><a href=\"create.php?id={$post->id}\">EDIT</a></button>
          <button class=\"btn\" id=\"default\">DELETE</button>
      </div>
      <div id=\"moodle-delete\">
        <div>
        <p>Are you sure you want to delete this post? Once deleted it cannot be recovered!</p>
      <div class=\"button-container\">
        <button class=\"btn\" id=\"cancel\">CANCEL</button>
        <form action=\"../includes/delete.includes.php\" method=\"post\">
          <input type=\"hidden\" name=\"uid\" value=\"{$post->id}\">
          <button class=\"btn\">CONTINUE</button>
        </form>
      </div>
      </div>
      </div>
    </div>";

  }

  public function show_posts_update_mode()
  {

    if(isset($_GET["id"])){

      $post = new Posts();

      $post->id = $_GET["id"];

      $post->read_post();

      if(isset($_GET["error"])){

        if(($_GET["error"] == "none")){
  
          echo "<div class=\"create-error\"> 
                  <div id=\"error\" class=\"error delete-success\">The post has been published successfully</div>
                </div>";
        }else if(($_GET["error"] == "emptyinputs")){
          echo "<div class=\"create-error\"> 
                  <div id=\"error\" class=\"error\">Please fill in all the fields</div>
                </div>";
        }
  
      }elseif(isset($_GET["errorp"])){

        if(($_GET["errorp"] == "none")){
  
          echo "<div class=\"create-error\"> 
                  <div id=\"error\" class=\"error delete-success\">The post has been upadated successfully</div>
                </div>";
        }else if(($_GET["errorp"] == "emptyinputs")){
          echo "<div class=\"create-error\"> 
                  <div id=\"error\" class=\"error\">Please fill in all the fields</div>
                </div>";
        }
  
      }
      
      echo "<div class=\"create-post-box\">
            <h1>create a new post</h1>
            <form id=\"update-form\" action=\"../includes/update.includes.php\" method=\"POST\">
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
            <h1>create a new post</h1>";

            
      if(isset($_GET["error"])){

        if(($_GET["error"] == "none")){
  
          echo "<div class=\"create-error\"> 
                  <div id=\"error\" class=\"error delete-success\">The post has been published successfully</div>
                </div>";
        }else if(($_GET["error"] == "emptyinputs")){
          echo "<div class=\"create-error\"> 
                  <div id=\"error\" class=\"error\">Please fill in all the fields</div>
                </div>";
        }
  
      }elseif(isset($_GET["errorp"])){

        if(($_GET["errorp"] == "none")){
  
          echo "<div class=\"create-error\"> 
                  <div id=\"error\" class=\"error delete-success\">The post has been upadated successfully</div>
                </div>";
        }else if(($_GET["errorp"] == "emptyinputs")){
          echo "<div class=\"create-error\"> 
                  <div id=\"error\" class=\"error\">Please fill in all the fields</div>
                </div>";
        }
      }
        echo "<form id=\"publish-form\" action=\"../includes/create.includes.php\" method=\"POST\">
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
                <button type=\"submit\" class=\"btn\" id=\"btn\" name=\"submit\">Publish</button>
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
      <a href=\"/views/post.php?id={$result["id"]}\" class=\"btn\">Read more</a>
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

      header("Location: ../views/create.php?errorp=emptyinputs");
      
      exit();
      
    }
    $post->update($category_id, $title, $description, $body);
  }
  public function delete_post()
  {
    $post = new Posts();

    $post->id = $this->id;

    $post->delete();
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

  public function show_success_delete()
  {
        if(isset($_GET["msg"])){

      if(($_GET["msg"] == "deletesuccessfully")){

        echo "<div> <div id=\"error\" class=\"error delete-success\">The post has been deleted successfully</div>";

         echo "<div class=\"button-container\" id=\"back-home-container\">
                <button class=\"btn\" id=\"back-home\"><a href=\"index.php\">HOME</a></button>
              </div>
              </div>";
        require_once("footer.php");
      }

    }
  }
}