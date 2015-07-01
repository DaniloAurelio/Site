<?php
require_once("sessao.php");
require_once("../config/database.php");
require_once("header.html");

$sql="Select * from tb_paginas where tipo='P' ";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

#echo "<h1> Resultados encontrados com a palavra : <b>".$_GET['busca']."</b></h1>";

?>

    <div class="row">
        <div class="col-lg-12">
           
            <ol class="breadcrumb">
                <li>
                    <i class="dropdown-menu-left"></i>  <a href="index.php">Conteúdo</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Páginas
                </li>
            </ol>
        </div>
    </div>

<div class="col-lg-6">
    <h2>Páginas Cadastradas</h2>
    <div class="table-responsive" >
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th class="col-lg-1">Código</th>
                <th class="col-lg-2">Descrição</th>
                <th class="col-lg-3">Titulo</th>
                <th class=".col-lg-6">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($resultados as $resultado) {
                $texto = substr($resultado["conteudo"], 0, 500);
                ?>

            <tr>
                <td><?=$resultado['id'];?></td>
                <td><?=$resultado['descricao'];?></td>
                <td><?=$resultado['titulo'];?></td>
                <td><a href="paginas_editar.php?id=<?=$resultado['id'];?>" <span class="glyphicon-edit">Editar</span> </a> <a href="excluir.php?modulo=paginas&id=<?=$resultado['id'];?>"><span class="glyphicon-erase">Excluir</span></a></td>
            </tr>

        <?php } ?>
            </tbody>
        </table>
    </div>
</div>




<?php
    require_once("footer.html");
?>