<?php

    function alertErro($msg) {
        echo '<div class="alert alert-danger" role="alert">';
        echo $msg;
        echo '</div>';
    }

    function alertSucesso($msg) {
        echo '<div class="alert alert-success" role="alert">';
        echo $msg;
        echo '</div>';
    }

    function login() {
        if (!isset($_SESSION)) session_start();

        if (isset($_POST['logar_cpf'])) {

            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['senha'] = $_POST['senha'];

            if (empty($_SESSION['usuario']) || empty($_SESSION['senha'])) {
                $_SESSION['erro'] = "Campos usuário ou senha não preenchido";
                header('Location: login.php');
                exit();
            }
        } else if (isset($_POST['logar_cnpj'])) {

            $_SESSION['usuario'] = $_POST['usuario'];
            $_SESSION['senha'] = $_POST['senha'];

            if (empty($_SESSION['usuario']) || empty($_SESSION['senha'])) {
                $_SESSION['erro'] = "Campos usuário ou senha não preenchido";
                header('Location: login.php');
                exit();
            }
        }

        if (!empty($_SESSION)) {
            include "conexao.php";

            if (isset($_POST['logar_cpf'])) {    
                $sql = "SELECT usuario FROM pessoa_fisica WHERE usuario ='" . $_SESSION['usuario'] . "' AND senha=SHA('" . $_SESSION['senha'] . "')";

                $result = $conexao->query($sql);
                foreach ($result as $value) {
                    $_SESSION['usuario'] = $value['usuario'];
                }
                $num_rows = $result->num_rows;

                $conexao->close();

                if (!$num_rows) {
                    $_SESSION['erro'] = "Usuário ou senha inválido!";
                    header("Location: login.php");
                    exit();
                }
            } else if (isset($_POST['logar_cnpj'])) {
                $sql = "SELECT usuario FROM pessoa_juridica WHERE usuario ='" . $_SESSION['usuario'] . "' AND senha=SHA('" . $_SESSION['senha'] . "')";

                $result = $conexao->query($sql);
                foreach ($result as $value) {
                    $_SESSION['usuario'] = $value['usuario'];
                }
                $num_rows = $result->num_rows;

                $conexao->close();

                if (!$num_rows) {
                    $_SESSION['erro'] = "Usuário ou senha inválido!";
                    header("Location: login.php");
                    exit();
                }
            }
        } else {
            header("Location: login.php");
            exit();
        }
    }

    function validaCampoEmBranco($campo) {
        if (isset($campo)) {
            if (empty($campo))
                return 'is-invalid';
            else
                return $campo;
        } else
            return '';
    }

    function retornaValorNoCampo($campo) {
        if (isset($campo)) {

            return $campo;
        } else
            return '';
    }

?>