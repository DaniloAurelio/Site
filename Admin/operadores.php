<?php
require_once("sessao.php");
require_once("../config/database.php");
require_once("header.html");

$sql="Select * from tb_operadores  ";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

#echo "<h1> Resultados encontrados com a palavra : <b>".$_GET['busca']."</b></h1>";

?>

    <div class="row">
        <div class="col-lg-12">
            
            <ol class="breadcrumb">
                <li>
                    <i class="dropdown-menu-left"></i>  <a href="index.php">Operadores</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Listar
                </li>
            </ol>
        </div>
    </div>

<div class="col-lg-6">
<div class='right-button-margin'>
    
    <a href='operadores_form.php' class='btn btn-default pull-right'>Incluir</a>
       <h2>Operadores do Painel</h2>
</div>
 
    
    <div class="table-responsive" >
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th class="col-lg-1">Código</th>
                <th class="col-lg-2">Login</th>
                <th class="col-lg-3">E-mail</th>
                 <th class="col-lg-1">Nível</th>
                <th class=".col-lg-6">Ações</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($resultados as $resultado) {
                $texto = substr($resultado["conteudo"], 0, 500);
                ?>

            <tr>
                <td><?=$resultado['id'];?></td>
                <td><?=$resultado['login'];?></td>
                <td><?=$resultado['email'];?></td>
                <td><?=$resultado['nivel'];?></td>
                <td><a href="operadores_form.php?id=<?=$resultado['id'];?>" <span class="glyphicon-edit">Editar</span> </a> <span class="glyphicon-erase"><a href="excluir.php?modulo=operadores&id=<?=$resultado['id'];?>">Excluir</a></span> </td>
            </tr>

        <?php } ?>
            </tbody>
        </table>
    </div>
</div>




<?php
    require_once("footer.html");
?>