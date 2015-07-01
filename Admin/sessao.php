<?php
session_start();

if($_SESSION['logado']==1){
	
	}else{

	$_SESSION['logado']=0;
	session_destroy();
	?>
		 <script language= "JavaScript">
    location.href="login.php";
    </script>
		<?
		exit();

}	

?>