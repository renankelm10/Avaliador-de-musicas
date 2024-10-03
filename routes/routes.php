<?php
require_once __DIR__ . '../../controllers/CadastroController.php';
require_once __DIR__ . '../../controllers/MusicasController.php';
require_once __DIR__ . '../../controllers/LoginController.php';

$controller = new UserController();
$controllermusica = new MusicaController();
$validarcontroller = new ValidarController();


if (isset($_GET['action'])) {
    if ($_GET['action'] == 'create') {
        $controller->createUser();

    } elseif ($_GET['action'] == 'validou') {
        $listarmusica = $controllermusica->ListarMusicas();
        include __DIR__ . '../../Views/musicas/listarMusica.php';
    }
      elseif ($_GET['action'] == 'cadastro'){
        $controllermusica->CriarMusica();

    }elseif($_GET['action'] == 'cadrastro') {
        include __DIR__ .  '../../Views/musicas/cadastro.php';
    }elseif($_GET['action'] == 'login') {
         include __DIR__ . '../../Views/musicas/login.php';

    }elseif (($_GET['action'] == 'validar')){
       $users = $validarcontroller-> ValidarUsuario();  
    }elseif($_GET['action'] == 'admin') {
        $listarmusica = $controllermusica->ListarMusicas();
        $users = $controller->listUsers();
        include __DIR__ . '../../Views/musicas/create.php';
    }elseif($_GET['action'] == 'avaliar') {
        $controllermusica -> avaliarMusica();
        $listarmusica = $controllermusica->ListarMusicas();
        include __DIR__ . '../../Views/musicas/listarMusica.php';
}}   else {
    include __DIR__ . '../../Views/musicas/cadastro.php';
     }