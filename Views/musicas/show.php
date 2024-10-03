<h1><?= htmlspecialchars($musica['titulo']) ?></h1> 

<p>Artista/Banda: <?= htmlspecialchars($musica['artista']) ?></p> 

<p>Gênero: <?= htmlspecialchars($musica['genero']) ?></p> 

 

<?php if ($musica['url_musica']): ?> 

    <a href="<?= htmlspecialchars($musica['url_musica']) ?>" target="_blank">Ouvir Música</a> 

<?php endif; ?> 

 

<h2>Avaliação Média: <?= htmlspecialchars($musica['media_avaliacao']) ?></h2> 

 

<h3>Avaliar esta Música:</h3> 

<form action="rate.php?id=<?= $musica['id'] ?>" method="POST"> 

    <label for="nota">Nota (1-5):</label> 

    <select name="nota" required> 

        <option value="1">1</option> 

        <option value="2">2</option> 

        <option value="3">3</option> 

        <option value="4">4</option> 

        <option value="5">5</option> 

    </select> 

    <button type="submit">Enviar Avaliação</button> 

</form>