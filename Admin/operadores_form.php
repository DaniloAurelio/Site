<?php
require_once("sessao.php");
require_once("../config/database.php");
require_once("header.html");
$id=$_REQUEST[id];
$login=$_POST['login'];
$email=$_POST['email'];
$senha=$_POST['senha'];

$acao=$_POST['acao'];
if(isset($_POST['nivel'])){
foreach($_POST["nivel"] as $nivel){
		$nivel=$nivel;
	}
}

if($acao=='I'){

try{
	$senha = crypt(sha1(md5($senha)), 'qwerty');
	$sql=" Insert into tb_operadores set login = :login,senha= :senha, email= :email , nivel= :nivel";
	$stmt = $conexao->prepare($sql) or die ("Erro");
	$stmt->bindParam('login', $login, PDO::PARAM_STR);
	$stmt->bindParam('email', $email);
	$stmt->bindParam('senha', $senha);
	$stmt->bindParam('nivel', $nivel);
	$stmt->execute();
	} catch (Exception $e) {
    die("Erro !!	");
	}
		?>
    <button type="button" class="btn btn-success">Operação realizada com sucesso!</button>
    <script language= "JavaScript">
    location.href="operadores.php";
    </script>
<?

}else if($acao=='U'){
		
	try{
		$senha = crypt(sha1(md5($senha)), 'qwerty');
	$sql=" UPDATE tb_operadores set login = :login,senha= :senha, email= :email , nivel= :nivel where id= :id" ;
	$stmt = $conexao->prepare($sql) or die ("Erro");
	$stmt->bindParam('login', $login, PDO::PARAM_STR);
	$stmt->bindParam('email', $email);
	$stmt->bindParam('senha', $senha);
	$stmt->bindParam('nivel', $nivel);
	$stmt->bindParam('id', $id);
	$stmt->execute();
	} catch (Exception $e) {
    die("Erro !!	");
	}
	
		?>
    <button type="button" class="btn btn-success">Operação realizada com sucesso!</button>
    <script language= "JavaScript">
    location.href="operadores.php";
    </script>
<?
		
}else if(isset($id)){
		$sql="Select * from tb_operadores where id= :id";
		$stmt = $conexao->prepare($sql) or die ("Erro");
		$stmt->bindParam('id', $id);
		$stmt->execute();		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$acao ='U';
	
		
}else if(!isset($_POST['acao'])){
		$acao= 'I';

}



?>

    <div class="row">
        <div class="col-lg-12">
            
            <ol class="breadcrumb">
                <li>
                    <i class="dropdown-menu-left"></i>  <a href="operadores.php">Operadores</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Incluir
                </li>
            </ol>
        </div>
    </div>

<div class="col-lg-6">
<div class='right-button-margin'>
    
    
       <h2>Cadastrar Operador</h2>
</div>
 
    <div class="row">
                    <div class="col-lg-6">

                        <form role="form" method="post">	
							<input name="acao" type="hidden" value="<?=$acao;?>" />
                            <div class="form-group">
                                <label>Login</label>
                                <input class="form-control" type="text" name="login" required="required" value="<?=$row['login'];?>">
                            </div>
                              <div class="form-group">
                                <label>E-Mail</label>
                                <input class="form-control" type="text" name="email"  required="required" value="<?=$row['email'];?>">
   </div>
                            
                            <div class="form-group">
                                <label>Senha</label>
                              <input class="form-control" type="password" name="senha" required="required" value="<?=$row['senha'];?>">
                            </div>
                          
                                                
                              <div class="form-group">
                                <label>Nível</label>
                                <label class="checkbox-inline">
                                    <input name="nivel[]" type="checkbox" value="1" <? if($row['nivel']=='1'){ echo 'checked';}?> >1
                                </label>
                                <label class="checkbox-inline">
                                    <input name="nivel[]" type="checkbox" value="2"<? if($row['nivel']=='2'){ echo 'checked';}?>>2
                                </label>
                                <label class="checkbox-inline">
                                    <input name="nivel[]" type="checkbox" value="3"<? if($row['nivel']=='3'){ echo 'checked';}?>>3
                                </label>
                                    <p class="help-block">1 = Acesso Total</p>
                            </div>
                            
								<button type="submit" class="btn btn-default">Gravar</button>
                                   <button type="reset" class="btn btn-default">Cancelar</button>
						</form>
           		</div> 
   </div>
</div>




<?php
    require_once("footer.html");
?>