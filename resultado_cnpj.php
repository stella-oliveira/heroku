<?php
    include_once("conexao.php");
    include_once("funcoes.php");
    
    if (isset($_GET['id'])){
        $flag = 0;
    } else {
        $flag = 1;
    }    

    $array_erro = [];
    $id = trim($_POST['id']);

    empty($_POST['cnpj']) ? $array_erro['cnpj'] = "Campo CNPJ não preenchido" : $cnpj = trim($_POST['cnpj']);
    empty($_POST['abertura']) ? $array_erro['abertura'] = "Campo Data de Abertura não preenchido" : $abertura = trim($_POST['abertura']);
    empty($_POST['nome']) ? $array_erro['nome'] = "Campo Razão Social não preenchido" : $nome = trim($_POST['nome']);
    $fantasia = trim($_POST['fantasia']);
    empty($_POST['atividade_principal_codigo']) ? $array_erro['atividade_principal_codigo'] = "Campo Código não preenchido" : $codigo = trim($_POST['atividade_principal_codigo']);
    empty($_POST['atividade_principal_atividade']) ? $array_erro['atividade_principal_atividade'] = "Campo Atividade não preenchido" : $atividade = trim($_POST['atividade_principal_atividade']);
    empty($_POST['logradouro']) ? $array_erro['logradouro'] = "Campo Logradouro não preenchido" : $logradouro = trim($_POST['logradouro']);
    empty($_POST['numero']) ? $array_erro['numero'] = "Campo Número não preenchido" : $numero = trim($_POST['numero']);
    $complemento = $_POST['complemento'];
    empty($_POST['cep']) ? $array_erro['cep'] = "Campo CEP não preenchido" : $cep = trim($_POST['cep']);
    empty($_POST['bairro']) ? $array_erro['bairro'] = "Campo Bairro não preenchido" : $bairro = trim($_POST['bairro']);
    empty($_POST['municipio']) ? $array_erro['municipio'] = "Campo Município não preenchido" : $municipio = trim($_POST['municipio']);
    empty($_POST['uf']) ? $array_erro['uf'] = "Campo UF não preenchido" : $uf = trim($_POST['uf']);
    empty($_POST['usuario']) ? $array_erro['usuario'] = "Campo Usuário não preenchido" : $usuario = trim($_POST['usuario']);
    empty($_POST['senha']) ? $array_erro['senha'] = "Campo Senha não preenchido" : $senha = trim($_POST['senha']);
    empty($_POST['senha2']) ? $array_erro['senha2'] = "Campo Repita a senha não preenchido" : $senha2 = trim($_POST['senha2']);
    
    if (count($array_erro) > 0) {
         alertErro('Preencha os campos obrigatórios');
    } else {
        $query = '';

            if ($flag) {     
                $query = "INSERT INTO pessoa_juridica VALUES 
                (NULL, '$cnpj', STR_TO_DATE('$abertura', '%d/%m/%Y'), '$nome', '$fantasia', '$codigo', '$atividade', '$logradouro', '$numero', 
                '$complemento', '$cep', '$bairro', '$municipio', '$uf', '$usuario', SHA1('$senha'), SHA1('$senha2'), NOW())";
                
            } else {
                $query = "UPDATE pessoa_juridica SET
                    cnpj = '$cnpj',
                    abertura = STR_TO_DATE('$abertura', '%d/%m/%Y'),
                    nome = '$nome',
                    fantasia = '$fantasia',
                    codigo = '$codigo',
                    atividade = '$atividade',
                    logradouro = '$logradouro',
                    numero = '$numero',
                    complemento = '$complemento',
                    cep = '$cep',
                    bairro = '$bairro',
                    municipio = '$municipio',
                    uf = '$uf',
                    usuario = '$usuario'
                    WHERE id = '$id';
                ";
            }
        $resultado = $conexao->query($query);

        if ($resultado){
            alertSucesso("Dados informados com sucesso!");
            unset($cnpj, $abertura, $nome, $fantasia, $atividade_principal_codigo, $atividade_principal_atividade, $logradouro, $numero, $complemento, $cep, $usuario, $senha, $senha2);
            $conexao->close();
            exit();
        } else {
            alertErro("Não foi possível inserir os dados. CNPJ ou usuário já cadastrados.");
        }
    }                

?>