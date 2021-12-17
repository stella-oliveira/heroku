<?php
    include_once("conexao.php");
    include_once("funcoes.php");
    
    if (isset($_GET['id']))
        $flag = 0;
    else
        $flag = 1;

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $sexo = $_POST['sexo'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $numero = $_POST['numero'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $senha2 = $_POST['senha2'];

    $query = '';

        if($flag){            
            $query = "INSERT INTO pessoa_fisica VALUES 
            (NULL, '$nome', '$cpf', '$sexo', '$cep', '$rua', '$bairro', '$cidade', '$uf', '$numero', 
            '$telefone', '$celular', '$usuario', SHA1('$senha'), SHA1('$senha2'), NOW())";
        }
        else {
            $query = "UPDATE pessoa_fisica SET
                nome = '$nome',
                cpf = '$cpf',
                sexo = '$sexo',
                cep = '$cep',
                rua = '$rua',
                bairro = '$bairro',
                cidade = '$cidade',
                uf = '$uf',
                numero = '$numero',
                telefone = '$telefone',
                celular = '$celular',
                usuario = '$usuario'
                WHERE id = '$id';
            ";
        }

        $resultado = $conexao->query($query);

        if ($resultado){
            alertSucesso("Dados informados com sucesso!");
            unset($nome, $cpf, $cep, $sexo, $rua, $bairro, $cidade, $uf, $numero, $telefone, $celular, $usuario, $senha, $senha2);
            $conexao->close();
            exit();
        } else {
            alertErro("Não foi possível inserir os dados. CPF ou usuário já cadastrados.");
        }
?>