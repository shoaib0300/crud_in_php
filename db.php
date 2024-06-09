<?php

class Database{
    private $dsn = "mysql:host=localhost;dbname=php_oop_crud_level_1";
    private $user = "root";
    private $pass = "";
    public $conn;

    public function __construct(){
        try{
            $this->conn = new PDO($this->dsn, $this->user, $this->pass);
        }
        catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function insert($data) {
        $sql = "INSERT INTO users (first_name, last_name, email, phone) VALUES (:fname, :lname, :email, :phone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);
        return true;
    }
    

    public function read(){
        $data = array();
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach($result as $row){
            $data[] = $row;
        }
        return $data;
    }

    public function getUserByID($id){
        $sql = "SELECT * FROM users WHERE id= :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id'=> $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function update($id, $data) {
        $sql = "UPDATE users SET first_name = :fname, last_name = :lname, email = :email, phone = :phone WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'id' => $id,
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'phone' => $data['phone']
        ]);
        return true;
    }

    public function delete($id){
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        return true;
    }

    public function totalRowCount(){
        $sql = "SELECT * FROM users";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $t_rows = $stmt->rowCount();
        return $t_rows;
    }
}
