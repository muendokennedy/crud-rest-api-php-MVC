<?php

require_once("database.class.php");

class Posts extends Database
{
  private $conn;
  private $table = array("posts", "categories");

  // Post properties
  public $id;
  public $category_id;
  public $category_name;
  public $title;
  public $description;
  public $body;
  public $created_at;
  public $name;

  // constructor
  public function __construct()
  {
    $this->conn = $this->connect();
  }

  // Get posts
  public function read_posts()
  {
    try{

      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $query = "SELECT c.name as category_name, p.id, p.category_id, p.title, p.description, p.body, p.created_at FROM {$this->table[0]} p LEFT JOIN categories c ON p.category_id = c.id ORDER BY p.created_at DESC;";

      $stmt = $this->conn->prepare($query);

      $stmt->execute();

      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

      return $results;

    }catch(PDOException $e){

      echo "<p>Error: {$e->getMessage()}</p>";

    }

  }

  public function read_post()
  {
    try{
      
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT c.name as category_name, p.id, p.category_id, p.title, p.description, p.body, p.created_at FROM {$this->table[0]} p LEFT JOIN categories c ON p.category_id = c.id WHERE p.id = ? LIMIT 0,1;";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->category_name = $row["category_name"];
        $this->category_id = $row["category_id"];
        $this->title = $row["title"];
        $this->description = $row["description"];
        $this->body = $row["body"];
        $this->created_at = $row["created_at"];
        
    }catch(PDOException $e){

      echo "<p>Error: {$e->getMessage()}</p>";

    }
  }

  public function create($category_id, $title, $description, $body)
  {
    $query = "INSERT INTO {$this->table[0]}(category_id, title, description, body) VALUES(:category_id, :title,:description,:body);";

    $stmt = $this->conn->prepare($query);


    $this->category_id = htmlspecialchars(strip_tags($category_id));
    $this->title = htmlspecialchars(strip_tags($title));
    $this->description = htmlspecialchars(strip_tags($description));
    $this->body = htmlspecialchars(strip_tags($body));

    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":body", $this->body);

    $stmt->execute();
  }

  public function update($category_id, $title, $description, $body)
  {
    $query = "UPDATE {$this->table[0]} SET category_id = :category_id, title = :title,description = :description, body = :body WHERE id = :id;";

    $stmt = $this->conn->prepare($query);


    $this->category_id = htmlspecialchars(strip_tags($category_id));
    $this->title = htmlspecialchars(strip_tags($title));
    $this->description = htmlspecialchars(strip_tags($description));
    $this->body = htmlspecialchars(strip_tags($body));

    $stmt->bindParam(":category_id", $this->category_id);
    $stmt->bindParam(":title", $this->title);
    $stmt->bindParam(":description", $this->description);
    $stmt->bindParam(":body", $this->body);
    $stmt->bindParam(":id", $this->id);


    $stmt->execute();
  }
  public function delete()
  {
    $query = "DELETE FROM {$this->table[0]} WHERE id = :id;";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(":id", $this->id);


    $stmt->execute();
  }
}