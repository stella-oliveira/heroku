<?php
    require_once "conexao.php";
    require_once "funcoes.php";
    login();
    require_once "header.php";

    $query='';
    if(isset($_POST['pesquisar'])){
        $query = "SELECT * FROM pessoa_juridica WHERE {$_POST['coluna']} LIKE '%".$_POST['valor_pesquisa']."%'";
    } else {
        $query = "SELECT * FROM pessoa_juridica";
    }
    $resultado = $conexao->query($query);
?>

<main>

    <div class="container col-12 mt-5">

        <form action="" method="post">
            <div class="form-row align-items-center justify-content-center mb-5">                        
                <div class="col-auto">
                    <select class="form-control" name="coluna">
                        <option selected>Escolha o que pesquisar</option>
                        <option value="id">ID</option>
                        <option value="fantasia">Nome fantasia</option>
                        <option value="cnpj">CNPJ</option>
                        <option value="usuario">Usuário</option>
                    </select>
                </div>
                <div class="col-auto">
                    <input type="text" name="valor_pesquisa" id="valor_pesquisa" class="form-control">
                </div>
                <div class="col-auto">
                    <input type="submit" name="pesquisar" class="btn btn-primary text-center" value="Pesquisar">
                </div>
            </div>
        </form>

        <table class="table table-hover table-responsive-lg">
            <thead class="thead-light">
                <tr>
                    <th scope="col" class="align-middle">ID</th>
                    <th scope="col" class="align-middle">CNPJ</th>
                    <th scope="col" class="align-middle">Data de abertura</th>
                    <th scope="col" class="align-middle">Razão social</th>
                    <th scope="col" class="align-middle">Nome fantasia</th>
                    <th scope="col" class="align-middle">Código</th>
                    <th scope="col" class="align-middle">Atividade</th>
                    <th scope="col" class="align-middle">Endereço</th>
                    <th scope="col" class="align-middle">Usuário</th>
                    <th scope="col" class="align-middle">Data de criação</th>
                    <th scope="col"  class="align-middle" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($resultado as $value) {?>
                <tr>
                    <th class="align-middle" scope="row"><?= $value['id'] ?></th>
                    <td class="align-middle"><?= $value['cnpj'] ?></td>
                    <td class="align-middle"><?= date("j/m/Y", strtotime($value['abertura'])) ?></td>
                    <td class="align-middle"><?= $value['nome'] ?></td>  
                    <td class="align-middle"><?= $value['fantasia'] ?></td>
                    <td class="align-middle"><?= $value['codigo'] ?></td>
                    <td class="align-middle"><?= $value['atividade'] ?></td>                
                    <td class="align-middle">
                        <?= $value['logradouro'] . ", "; 
                        echo $value['numero'] . ", ";
                        echo $value['complemento'] . ", "; 
                        echo $value['bairro'] . ", "; 
                        echo $value['municipio'] . " - "; 
                        echo $value['uf'] . ", "; 
                        echo $value['cep']; 
                        ?>
                    </td>
                    <td class="align-middle"><?= $value['usuario'] ?></td>
                    <td class="align-middle"><?= date("j/m/Y H:i:s", strtotime($value['dataCriacao'])) ?></td>
                    <td class="align-middle"><a href="cnpj.php?id=<?= $value['id']?>" class="btn btn-warning">Alterar</a></td>
                    <td class="align-middle"><a href="deletar_cnpj.php?id=<?= $value['id']?>" class="btn btn-danger">Deletar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

</main>

<?php
    include_once("footer.php");
?>