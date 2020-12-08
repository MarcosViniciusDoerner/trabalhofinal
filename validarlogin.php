<?php
  require_once "conexao.php";

  if(!empty($_POST['email']) && !empty($_POST['senha'])){

    $pdo = Conexao();
    $stmt = $pdo ->prepare('SELECT NOME, EMAIL, SENHA FROM USUARIO WHERE EMAIL = : login AND SENHA = : senha');
    $stmt -> bindParam(': login', $_POST['email']); 
    $stmt -> bindParam(': senha', $_POST['senha']);
    $stmt -> execute();
    $sql = $stmt -> fetch(PDO::FETCH_ASSOC);
    if(($sql['EMAIL'] == $_POST['email']) && ($sql['SENHA'] == $_POST['senha'])) {
        $_SESSION['logado'] = 'logado';
        $_SESSION['nome'] = $sql['NOME'];
        header('Location: ./menu.php');
      }else {
        $_SESSION['error'] = 'erro';
        header('Location: ./index.html');
      }
    }