<?php
class UserModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function inserirUser($name, $email) {
        $query = "INSERT INTO users (name, email) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $name, $email);
        return $stmt->execute();
    }

    public function buscarUsers() {
        $query = "SELECT * FROM users ";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
