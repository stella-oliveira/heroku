<?php
    require_once "conexao.php";
    require_once "funcoes.php";
    login();
    require_once "header.php";
?>

<main>

    <div class="container col-12 mt-5">
        <?php
            if (isset($_POST['submit'])) {
                $query = "DELETE FROM pessoa_juridica WHERE id={$_POST['id']}";
                $resultado = $conexao->query($query);
                if($resultado){
                    alertSucesso("Deletado com sucesso!");
                    exit();
                } else {
                    alertErro("Houve um problema ao deletar o dado: ".$conexao->erro);
                }
            } 
            
            $query = "SELECT * FROM pessoa_juridica where id = {$_GET['id']}";
            $resultado = $conexao->query($query);

        ?>

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
                </tr>
                <?php } ?>
            </tbody>
        </table>

        <form action="#" method="post">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <div class="form-group text-center mt-5">
                <input type="submit" name="submit" class="btn btn-danger text-center" value="Clique aqui se tiver certeza que deseja deletar.">
            </div>
        </form>
    
    </div>

</main>

<?php
    require_once "footer.php";
?>