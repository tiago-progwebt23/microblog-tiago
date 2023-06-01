<?php
require_once "../inc/funcoes-noticias.php";
require_once "../inc/funcoes-sessao.php";
verificaAcesso();

// Pegando o id da notícia vindo do parâmetro de URL
$idNoticia = $_GET['id'];

// Pegando o id e o tipo do usuário logado vindos da SESSION
$idUsuario = $_SESSION['id'];
$tipoUsuario = $_SESSION['tipo'];

// Executando a função de DELETE com os parâmetros
excluirNoticia($conexao, $idNoticia, $idUsuario, $tipoUsuario);

// Voltando pra páginas das notícias
header("location:noticias.php");



