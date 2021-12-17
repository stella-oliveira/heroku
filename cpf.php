<?php
    include_once("conexao.php");
    require_once "header.php";
?>

<main>

    <?php
        $flag = 1;

        echo '<div class="container-fluid mt-3">';
            if(isset($_POST['submit']) || isset($_POST['alterar'])) {
                require_once "resultado_cpf.php";
            } else if (isset($_GET['id'])) {
                require_once "selecionar_cpf.php";
            }
        echo '</div>';

        if ($flag == 1) {
            $sexo = '';
        }
   ?>

    <form id="formularioCPF" class="form-horizontal" method="post" action="#">
        
    <input type="hidden" name="id" value='<?= $_GET['id'] ?>'>

        <div class="container mt-5"> 
            <div class="row">  

                    <div class="col-md-12 formulario">
                        <h2>Cadastro CPF</h2>

                        <div class="panel panel-default">                  
                            <div class="panel-body">      

                                <!------------ NOME, SEXO, CPF ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="nome">Nome</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" autofocus value="<?= isset($nome)?$nome:'' ?>" />
                                        </div>
                                    </div>                                    
                                    <div class="form-group col-md-4">
                                        <label for="cpf">CPF</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Digite seu CPF" value="<?= isset($cpf)?$cpf:'' ?>" /> 
                                        </div>
                                    </div>                                     
                                   
                                    <div class="form-group col-md-4">
                                        <label for="sexo">Sexo</label>
                                        <div class="validar">
                                            <select id="sexo" name="sexo" class="form-control" value="<?= isset($sexo)?$sexo:'' ?>">
                                                <option name="sexo" value="feminino" <?= $sexo === 'Feminino' ? 'selected' : '' ?>>Feminino</option>
                                                <option name="sexo" value="masculino" <?= $sexo === 'Masculino' ? 'selected' : '' ?>>Masculino</option>
                                                <option name="sexo" value="outros" <?= $sexo === 'Outros' ? 'selected' : '' ?>>Outros</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                                
                                </div>

                                <!------------ CEP, RUA, BAIRRO ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="cep">CEP</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="cep" name="cep" maxlength="9" onblur="pesquisacep(this.value);" value="<?= isset($cep)?$cep:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="rua">Rua</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="rua" name="rua" value="<?= isset($rua)?$rua:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bairro">Bairro</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?= isset($bairro)?$bairro:'' ?>" />
                                        </div>
                                    </div>
                                </div>

                                <!------------ CIDADE, UF, NÚMERO ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="cidade">Cidade</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="cidade" name="cidade" value="<?= isset($cidade)?$cidade:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="estado">Estado</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="uf" name="uf" maxlength="2" value="<?= isset($uf)?$uf:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Número da casa ou prédio / bloco / apartamento</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="numero" name="numero" placeholder="Nº da casa ou apartamento" value="<?= isset($numero)?$numero:'' ?>" />
                                        </div>
                                    </div>                                  
                                </div>

                                <!------------ TELEFONE E CELULAR ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="telefone">Telefone fixo</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="telefone" name="telefone" minlength="14" maxlength="14" placeholder="Telefone fixo" value="<?= isset($telefone)?$telefone:'' ?>" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="celular">Celular</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="celular" name="celular" minlength="14" maxlength="15" placeholder="Celular com DDD" value="<?= isset($celular)?$celular:'' ?>" />
                                        </div>
                                    </div>                                  
                                </div>
                                
                                <!------------ USUÁRIO E SENHA ------------>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="usuario">Usuário</label>
                                        <div class="validar">
                                            <input type="text" class="form-control" id="usuario" name="usuario" minlength="5" placeholder="Digite um usuário" value="<?= isset($usuario)?$usuario:'' ?>" />
                                        </div>
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="senha">Senha</label>
                                        <div class="validar">
                                            <input type="password" class="form-control" id="senha_principal" name="senha" minlength="6" placeholder="Digite uma senha" value="<?= isset($senha)?$senha:'' ?>" />
                                        </div>
                                    </div>   
                                    <div class="form-group col-md-4">
                                        <label for="senha2">Repita a senha</label>
                                        <div class="validar">
                                            <input type="password" class="form-control" id="senha2" name="senha2" placeholder="Digite a senha novamente" value="<?= isset($senha2)?$senha2:'' ?>" />
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