<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'desweb');
function Conexao() {
  try {
    $conn = new pdo('mysql:host=' . HOST . ';dbname=' . DBNAME, USER, PASS);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    echo "Conexão feita com sucesso";
  } catch (PDOException $e) {
    echo "Erro: Não foi possível fazer conexão" . $e->getMessage();
  }
  return $conn;
}