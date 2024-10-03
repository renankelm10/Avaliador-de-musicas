<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db_name = "meu_banco";

    public function getConnection() {
        $conn = new mysqli($this->host, $this->user, $this->pass, $this->db_name);

        if ($conn->connect_error) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        return $conn;
    }
}

