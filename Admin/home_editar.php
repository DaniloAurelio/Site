<?php
require_once("../config/database.php");
require_once("header.html");
$id=$_GET['id'];
if($_POST['conteudo']){
    $sql="Update tb_home set conteudo= :conteudo ,titulo =:titulo where id= :id  ";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue("conteudo",$_POST['conteudo']);
    $stmt->bindValue("titulo",$_POST['titulo']);
    $stmt->bindValue("id",$id);
    $stmt->execute();
    ?>
    <button type="button" class="btn btn-success">Operação realizada com sucesso!</button>
    <script language= "JavaScript">

    location.href="home.php";
    </script>
<?

}


$sql="Select * from tb_home where id= :id  ";
$stmt = $conexao->prepare($sql);
$stmt->bindValue("id",$id);
$stmt->execute();
$resultados = $stmt->fetch(PDO::FETCH_ASSOC);



?>

<form action="" method="post">
    <fieldset>
        <label>Titulo</label>
        <input name="titulo" class="form-control" value="<?=$resultados['titulo'];?>">
        <p></p>
        <label>Conteúdo</label>
        <input type="hidden" name="id"  value="<?=$id;?>"></input>
        <textarea id="conteudo" class="ckeditor" cols="50" name="conteudo" rows="100"> <?=$resultados['conteudo']?></textarea>


    </fieldset>
    <p></p>
    <button type="submit" class="btn btn-default">Salvar</button>

</form>

<?

  require_once("footer.html");

    ?>