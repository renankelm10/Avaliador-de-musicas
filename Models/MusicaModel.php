<?php
class MusicaModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function inserirMusica($titulo, $artista, $genero, $url_musica) {
        $query = "INSERT INTO musicas (titulo, artista, genero, url_musica) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            
            die('Erro na preparação da query: ' . $this->conn->error);
        }
        $stmt->bind_param("ssss", $titulo, $artista, $genero, $url_musica);
        return $stmt->execute();
    }

    public function BuscarMusica() {
        $query = "SELECT * FROM musicas";
        $result = $this->conn->query($query);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function adicionarAvaliacao($musicaId, $avaliacao) {
        $stmt = $this->conn->prepare("INSERT INTO avaliacoes (musica_id, avaliacao) VALUES (?, ?)");
        $stmt->bind_param("ii", $musicaId, $avaliacao);
        $stmt->execute();

        // Recalcular a média de avaliações
        $stmt = $this->conn->prepare("SELECT AVG(avaliacao) as media FROM avaliacoes WHERE musica_id = ?");
        $stmt->bind_param("i", $musicaId);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $mediaAvaliacao = $row['media'];

        // Atualizar a média na tabela de músicas
        $stmt = $this->conn->prepare("UPDATE musicas SET media_avaliacao = ? WHERE id = ?");
        $stmt->bind_param("di", $mediaAvaliacao, $musicaId);
        return $stmt->execute();

    }

    
}
