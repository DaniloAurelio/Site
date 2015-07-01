<?php
require_once("./config/database.php");
require_once("topo.html");

$sql="Select * from tb_home where descricao= 'ciasoftware' ";
    $stmt = $conexao->prepare($sql);
      $stmt->execute();
    $paginas1 = $stmt->fetch(PDO::FETCH_ASSOC);

	$sql="Select * from tb_home where descricao= 'sites' ";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $paginas2 = $stmt->fetch(PDO::FETCH_ASSOC);

	$sql="Select * from tb_home where descricao= 'servicos' ";
    $stmt = $conexao->prepare($sql);
    $stmt->execute();
    $paginas3 = $stmt->fetch(PDO::FETCH_ASSOC);

	$sql="Select * from tb_home where descricao= 'assessoria' ";
    $stmt = $conexao->prepare($sql);
       $stmt->execute();
    $paginas4 = $stmt->fetch(PDO::FETCH_ASSOC);
  #  print_r($paginas3['titulo']);

?>

 <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
        
            <h1><?=$paginas1['titulo'];?></h1>
            <p><?=utf8_encode($paginas1['conteudo']);?></p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Saiba Mais... &raquo;</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2><?=$paginas2['titulo'];?></h2>
                <p><?=utf8_encode($paginas2['conteudo']);?></p>
                <p><a class="btn btn-default" href="#" role="button">Saiba Mais... &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2><?=utf8_encode($paginas3['titulo']);?></h2>
                <p><?=utf8_encode($paginas3['conteudo']);?></p>
                <p><a class="btn btn-default" href="#" role="button">Saiba Mais... &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2><?=$paginas4['titulo'];?></h2>
                <p><?=utf8_encode($paginas4['conteudo']);?></p>
                <p><a class="btn btn-default" href="#" role="button">Saiba Mais...&raquo;</a></p>
            </div>
        </div>


<?php
require_once("rodape.php");
?>
