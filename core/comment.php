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

    // Create a new Comment record 
    public function create(){
        $query = "INSERT INTO {$this->table}
                    (comment, postId, userId)
                    VALUES (:comment,:postId,:userId);";

        $stmt = $this->conn->prepare($query);

        // clean up data sent by user/3rd party system (for security)
        $this->comment = htmlspecialchars(strip_tags($this->comment));
        $this->postId = htmlspecialchars(strip_tags($this->postId));
        $this->userId = htmlspecialchars(strip_tags($this->userId));

        // bind parameters to sql statement
        $stmt->bindParam(":comment", $this->comment);
        $stmt->bindParam(":postId", $this->postId);
        $stmt->bindParam(":userId", $this->userId);

        if($stmt->execute())
        {
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;
    }

    // Update a Comment record
    public function update(){
        $query = "UPDATE {$this->table}
                    SET comment = :comment,
                        postId = :postId,
                        userId = :userId
                    WHERE id = :id;";

        $stmt = $this->conn->prepare($query);

        // clean up data sent by user/3rd party system (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->comment = htmlspecialchars(strip_tags($this->comment));
        $this->postId = htmlspecialchars(strip_tags($this->postId));
        $this->userId = htmlspecialchars(strip_tags($this->userId));

        // bind parameters to sql statement
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":comment", $this->comment);
        $stmt->bindParam(":postId", $this->postId);
        $stmt->bindParam(":userId", $this->userId);

        if($stmt->execute())
        {
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;
    }

// Update User ID of a Comment record
    public function updateUserId(){
        $query = "UPDATE {$this->table}
                    SET userId = :userId
                    WHERE id = :id;";

        $stmt = $this->conn->prepare($query);

        // clean up data sent by user/3rd party system (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->userId = htmlspecialchars(strip_tags($this->userId));

        // bind parameters to sql statement
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam(":userId", $this->userId);

        if($stmt->execute())
        {
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;
    }

    // Delete a Comment record
    public function delete(){
        $query = "DELETE FROM {$this->table}
                    WHERE id = :id;";

        $stmt = $this->conn->prepare($query);

        // clean up data sent by user/3rd party system (for security)
        $this->id = htmlspecialchars(strip_tags($this->id));

        // bind parameters to sql statement
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute())
        {
            return true;
        }

        printf("Error %s. \n", $stmt->error);
        return false;
    }


}

?>