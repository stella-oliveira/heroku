<?php

    $cnpj_string = $_POST['cnpj'];
    $cnpj = preg_replace('/[^0-9]/', '', $cnpj_string);  
    $url = "https://www.receitaws.com.br/v1/cnpj/$cnpj";
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $resultado = json_decode(curl_exec($ch));

    foreach ($resultado as $res=>$index) {
        $$res = $index;
    }

    $atividade_principal = $resultado->atividade_principal;
    foreach ($atividade_principal as $a) {
        $atividade = $a->text;
        $codigo = $a->code;
    }

    curl_close($ch);

?>