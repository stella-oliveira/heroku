<?php

    $conexao = new mysqli("localhost", "root", "", "sa");

    if($conexao->connect_error) {
        $msg = "Falha ao conectar: " . $conexao->connect_error;
        alertErro($msg);
    }

?>