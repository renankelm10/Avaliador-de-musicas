<?php
class ValidarModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }
    public function buscarUsuario($name, $email) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE name = ? AND email = ?");

        if (!$stmt) {
            die('Erro na consulta SQL: ' . $this->conn->error);
        }

        $stmt->bind_param("ss", $name, $email); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0)
         { 
            $user = $result->fetch_assoc();  
            if ($user['email'] === 'admin@gmail.com' && $user['name'] === 'admin') {
                header('Location: ../index.php?action=admin');  
                exit();
            }
    
            return $user;  
        }
        return false; 
    }
}
