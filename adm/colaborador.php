<?php


session_start();

include('../conexao/conexao.php');


echo "Olá - ".$_SESSION['usuarioNome'];









echo "<a href='../index.html'>Sair</a>";



