<?php
/* Carregando o script de acesso ao servidor de BD */
require "conecta.php";


// Usada em admin/usuario-insere.php
function inserirUsuario($conexao, $nome, $email, $senha, $tipo){
    /* Variável montada com o comando SQL para INSERT
    dos dados capturados através do formulário */
    $sql = "INSERT INTO usuarios(nome, email, senha, tipo) 
            VALUES('$nome', '$email', '$senha', '$tipo')";
    
    /* Executando o comando SQL montado acima */
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

} // fim inserirUsuario


// Usada em usuarios.php
function lerUsuarios($conexao){
    // Montando o comando SQL SELECT para leitura dos usuários
    $sql = "SELECT id, nome, email, tipo FROM usuarios ORDER BY nome";

    // Guardando o resultado da operação de consulta SELECT
    $resultado = mysqli_query($conexao, $sql) 
                or die(mysqli_error($conexao));

    /* Criando um array vazio que receberá
    outros arrays contendo os dados de cada usuário */
    $usuarios = [];

    /* Loop while (enquanto) que a cada ciclo de repetição,
    irá extrair os dados de cada usuario provenientes do
    resultado da consulta. Essa extração é feita pela função
    mysqli_fetch_assoc e é guardada na variável $usuario. */
    while($usuario = mysqli_fetch_assoc($resultado)){
        /* Pegamos os dados de cada $usuario (array),
        e os colocamos dentro (array_push) 
        do grande array $usuarios. */
        array_push($usuarios, $usuario);
    }

    /*  Levamos para fora da função a matriz $usuarios,
    contendo os dados de cada $usuario */
    return $usuarios;
} // fim lerUsuarios


// Usada em usuario-exclui.php
function excluiUsuario($conexao, $id){
    /* Montando o comando de exclusão (DELETE) passando
    como condição (WHERE) o id do usuário que será excluído. */
    $sql = "DELETE FROM usuarios WHERE id = $id";

    /* Executando o comando sql */
    mysqli_query($conexao, $sql) or die(mysqli_error($conexao));
} // fim excluiUsuario




