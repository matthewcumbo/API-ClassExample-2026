<?php

class Comment{

    // db related properties
    private $conn;
    private $table = "comment";
    private $alias = "c";

    // table fields 
    public $id;
    public $comment;
    public $userId;
    public $postId;

    // constructor with db connection
    // a function that is triggered automatically when an instance of the class is created
    public function __construct($db){
        $this->conn = $db;
    }

    // Read all Comment records
    public function read(){
        $query = "SELECT * 
                    FROM {$this->table} AS {$this->alias} 
                    ORDER BY {$this->alias}.id DESC;";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

    // Read a single Comment record by id
    public function readSingle(){
        $query = "SELECT * 
                    FROM {$this->table} AS {$this->alias}
                    WHERE {$this->alias}.id = ?
                    LIMIT 1;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row > 0){
            $this->comment      = $row["comment"];
            $this->userId       = $row["userId"];
            $this->postId       = $row["postId"];
        }

        return $stmt;
    }

}

?>