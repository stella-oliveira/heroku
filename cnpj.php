<?php
    require_once "conexao.php";
    require_once "header.php";
?>

<main>
    <?php
        $flag = 1;  

        if (isset($_POST['buscar'])) {
            require_once "busca_cnpj.php";
         } 

            echo '<div class="container-fluid mt-3">';
            if(isset($_POST['submit']) || isset($_POST['alterar'])) {
                require_once "resultado_cnpj.php";
            } else if (isset($_GET['id'])) {
                require_once "selecionar_cnpj.php";
            }
            echo '</div>';
        
    ?>
 
    <form id="formularioCNPJ" class="form-horizontal" method="post" action="#">
        
    <input type="hidden" name="id" value='<?= $_GET['id'] ?>'>

        <div class="container mt-5">            
            <div class="row">  

                    <div class="col-md-12 formulario">
                        <h2>Cadastro CNPJ</h2>

                        <div class="panel panel-default">                  
                            <div class="panel-body">      

                                <!------------ CNPJ, DATA E RAZÃO SOCIAL ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="cnpj">CNPJ</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['cnpj'] ? 'is-invalid' : '' ?>" id="cnpj" name="cnpj" placeholder="Digite o CNPJ" autofocus value="<?= isset($cnpj)?$cnpj:'' ?>" />
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-2 mt-md-4">
                                        <input type="submit" id="buscar" name="buscar" class="btn btn-primary btn-sm" value="Buscar">
                                    </div>               
                                    <div class="form-group col-md-2">
                                        <label for="abertura">Data de abertura</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['abertura'] ? 'is-invalid' : '' ?>" id="abertura" name="abertura" value="<?=isset($abertura) ? date("j/m/Y", strtotime($abertura)) : '' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="nome">Razão social</label>
                                            <div class="validar">
                                                <input type="text" class="form-control <?= $array_erro['nome'] ? 'is-invalid' : '' ?>" id="nome" name="nome" value="<?= isset($nome)?$nome:'' ?>" />
                                            </div>
                                    </div>
                                </div>

                                <!------------ NOME E ATIVIDADE ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="fantasia">Nome fantasia</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="fantasia" name="fantasia" value="<?= isset($fantasia)?$fantasia:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="atividade_principal">Código da atividade</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['atividade_principal_codigo'] ? 'is-invalid' : '' ?>" id="atividade_principal" name="atividade_principal_codigo" value="<?= isset($codigo)?$codigo:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="atividade_principal">Atividade</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['atividade_principal_atividade'] ? 'is-invalid' : '' ?>" id="atividade_principal" name="atividade_principal_atividade" value="<?= isset($atividade)?$atividade:'' ?>" />
                                        </div>
                                    </div>
                                </div> 
                                
                                <!------------ ENDEREÇO ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="logradouro">Logradouro</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['logradouro'] ? 'is-invalid' : '' ?>" id="logradouro" name="logradouro" value="<?= isset($logradouro)?$logradouro:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="numero">Número</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['numero'] ? 'is-invalid' : '' ?>" id="numero" name="numero" value="<?= isset($numero)?$numero:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="complemento">Complemento</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="complemento" name="complemento" value="<?= isset($complemento)?$complemento:'' ?>" />
                                        </div>
                                    </div>
                                </div>
                                
                                <!------------ ENDEREÇO ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="cep">CEP</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['cep'] ? 'is-invalid' : '' ?>" id="cep" name="cep" value="<?= isset($cep)?$cep:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bairro">Bairro / Distrito</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['bairro'] ? 'is-invalid' : '' ?>" id="bairro" name="bairro" value="<?= isset($bairro)?$bairro:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="municipio">Município</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['municipio'] ? 'is-invalid' : '' ?>" id="municipio" name="municipio" value="<?= isset($municipio)?$municipio:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="uf">UF</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['uf'] ? 'is-invalid' : '' ?>" id="uf" name="uf" value="<?= isset($uf)?$uf:'' ?>" />
                                        </div>
                                    </div>
                                </div>

                                <!------------ USUÁRIO E SENHA ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="usuario">Usuário</label>
                                        <div class="validar">
                                            <input type="text" class="form-control <?= $array_erro['usuario'] ? 'is-invalid' : '' ?>" id="usuario" name="usuario" minlength="5" placeholder="Digite um usuário" value="<?= isset($usuario)?$usuario:'' ?>" />
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="senha">Senha</label>
                                        <div class="validar">
                                            <input type="password" class="form-control <?= $array_erro['senha'] ? 'is-invalid' : '' ?>" id="senha_principal" name="senha" minlength="6" placeholder="Digite uma senha" value="<?= isset($senha)?$senha:'' ?>" />
                                        </div>
                                    </div>   
                                    <div class="form-group col-md-4">
                                        <label for="senha2">Repita a senha</label>
                                        <div class="validar">
                                            <input type="password" class="form-control <?= $array_erro['senha2'] ? 'is-invalid' : '' ?>" id="senha2" name="senha2" placeholder="Digite a senha novamente" value="<?= isset($senha2)?$senha2:'' ?>" />
                                        </div>
                                    </div>                                  
                                </div> 
                            </div>
                        </div>
                    </div>

            </div>

            <div class="form-group text-center pb-2">
                <?php if($flag): ?>
                <button type="submit" name="submit" class="btn btn-lg btn-primary">Cadastrar</button>
                <?php else: ?>
                <button type="submit" name="alterar" class="btn btn-lg btn-primary">Alterar</button>
                <?php endif ?>
                <button type="reset" name="alterar" class="btn btn-lg btn-primary">Limpar</button> 
            </div>

        </div>  
    </form>
</main>

<?php
    require_once "footer.php";
?>