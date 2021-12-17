<?php
    include_once("conexao.php");
    $flag = 0;

    $query = "SELECT * FROM pessoa_fisica WHERE id = {$_GET['id']}";
    $resultado = $conexao->query($query);

    if ($resultado->num_rows > 0) {
        foreach ($resultado as $value) {
            foreach ($value as $key => $v) {
                $$key = $v;
            }
        }
    }
?>