
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Nova Música</title>
    <style>
       
    </style>
</head>
<body>

<head>
    <link rel="stylesheet" href="../../public/Css/musicaCadastro.css">
</head>


<h1>Cadastrar Nova Música</h1>

<form action="../index.php?action=cadastro" method="POST">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo" required>
 
    <br />
    
    <label for="artista">Artísta/Banda:</label>
 
    <input type="text" name="artista" required>
    
    <br />
    
 

    <label for="genero">Gênero:</label>
    <input type="text" name="genero">


    <br />
   
 
 
    <label for="url_musica">URL da Música (YouTube, Spotify, etc.):</label>
    <input type="url" name="url_musica" required>

    <button type="submit">Cadastrar Música</button>
</form>

<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Artista</th>
            <th>Gênero</th>
            <th>URL</th>
            <th>Avaliações</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($listarmusica)): ?>
            <?php foreach ($listarmusica as $musica): ?>
                <tr>
                    <td><?= htmlspecialchars($musica['titulo']) ?></td>
                    <td><?= htmlspecialchars($musica['artista']) ?></td>
                    <td><?= htmlspecialchars($musica['genero']) ?></td>
                    <td><a href="<?= htmlspecialchars($musica['url_musica']) ?>" target="_blank">Ouvir Música</a></td>
                    
                    <td>
                        <li>Média: <?= htmlspecialchars($musica['media_avaliacao']) ?></li>
                        
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="no-music">Nenhuma música encontrada.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

</body>
</html>