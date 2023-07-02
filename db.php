<?php

// Ficheiro de ligação à base de dados, credencias de acesso
$host = 'localhost';
$username = 'root';
$psw = '';
$database = 'projeto';

// Criar ligação
$conn = new mysqli($host, $username, $psw, $database);

// Verificar ligação
if ($conn->connect_error) {
  die("Erro na ligação: " . $conn->connect_error);
} else {
  echo "";
}

?>