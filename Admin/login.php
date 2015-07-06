<?php
session_start();
$_SESSION['logado']=0;


if(isset($_POST['login'])){
require_once("../config/database.php");
$login= $_POST['login'];
$senha= $_POST['senha'];

#$senha = crypt(sha1(md5($senha)), 'qwerty');

$sql = "select * from tb_operadores where login= :login";
$stmt=$conexao->prepare($sql);
$stmt->bindParam('login',$login);
$stmt->execute();
$count=$stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

#echo $row['senha'];

if($count >0){
		
			if(password_verify($senha, $row['senha']))
        {
		       $_SESSION['logado']=1;
		$_SESSION['usuario']=$login;
		?>
		 <script language= "JavaScript">	 location.href="index.php";    </script>
		<?php
		}else{
				$_SESSION['logado']=0;
	?>
		 <script language= "JavaScript">	alert ('Usuário ou senha inválidos'); location.href="login.php";    </script>
		<?php	
			}
	
	}else{
		$_SESSION['logado']=0;
	?>
		 <script language= "JavaScript">	alert ('Usuário ou senha inválidos'); location.href="login.php";    </script>
		<?php
	}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Painel de Administração - Area restrita</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style type="text/css">
    body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #ddd;
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
  background-color: #f3f3f3;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  position: relative;
  font: 15px 'Segoe UI',Arial,sans-serif;
  background-color: #EAEBE5;
  height: auto;
  padding: 10px;
  color:#7e8c8d;
  outline:none;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
}

.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

#recover input[type="email"] {
  margin-bottom: 10px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}

/*___________________________________*/
.container {
  border-top: 2px solid #aaa;
  box-shadow:  0 2px 10px rgba(0,0,0,0.8);
  width:288px;
  height:321px;
  margin:0 auto;
  position:relative;
  z-index:1;
  
  -moz-perspective: 800px;
  -webkit-perspective: 800px;
  perspective: 800px;
}

.container form {
  width:100%;
  height:100%;
  position:absolute;
  top:0;
  left:0;
  
  /* Enabling 3d space for the transforms */
  -moz-transform-style: preserve-3d;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  
  /* When the forms are flipped, they will be hidden */
  -moz-backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  
  /* Enabling a smooth animated transition */
  -moz-transition:0.8s;
  -webkit-transition:0.8s;
  transition:0.8s;

}


.container.flipped .form-signin{
  
  opacity:0;
  
  /**
   * Rotating the login form when the
   * flipped class is added to the container
   */
  
  -moz-transform:rotateY(-180deg);
  -webkit-transform:rotateY(-180deg);
  transform:rotateY(-180deg);
}

.container.flipped #recover{
  
  opacity:1;
  
  /* Rotating the recover div into view */
  -moz-transform:rotateY(0deg);
  -webkit-transform:rotateY(0deg);
  transform:rotateY(0deg);
}


.form-signin {
  z-index:100;
}

  
  /* Enabling 3d space for the transforms */
  -moz-transform-style: preserve-3d;
  -webkit-transform-style: preserve-3d;
  transform-style: preserve-3d;
  
  /* When the forms are flipped, they will be hidden */
  -moz-backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
  backface-visibility: hidden;
  
  /* Enabling a smooth animated transition */
  -moz-transition:0.8s;
  -webkit-transition:0.8s;
  transition:0.8s;

}

#login{
  background: #f3f3f3;
  z-index: 100;
}

#recover:before {
  /* The "Click here" tooltip */
  width:100px;
  height:26px;
  content:'Login ->';
  position:absolute;
  right:270px;
  top:15px;
}

#login:after {
  /* The "Click here" tooltip */
  width:150px;
  height:26px;
  content:'';
  position:absolute;
  right:-170px;
  top:15px;
}

#recover{
  background:#f3f3f3;
  z-index:1;
  
  /* Rotating the recover password form by default */
  -moz-transform:rotateY(180deg);
  -webkit-transform:rotateY(180deg);
  transform:rotateY(180deg);
}

#formContainer.flipped #login{
  
  opacity:0;
  
  /**
   * Rotating the login form when the
   * flipped class is added to the container
   */
  
  -moz-transform:rotateY(-180deg);
  -webkit-transform:rotateY(-180deg);
  transform:rotateY(-180deg);
}

#formContainer.flipped #recover{
  
  opacity:1;
  
  /* Rotating the recover div into view */
  -moz-transform:rotateY(0deg);
  -webkit-transform:rotateY(0deg);
  transform:rotateY(0deg);
}


/*----------------------------
  Inputs, Buttons & Links
-----------------------------*/


#login .flipLink,
#recover .flipLink{  
  height: 50px;
  overflow: hidden;
  position: absolute;
  right: 0;
  text-indent: -9999px;
  top: 0;
  width: 50px;
}

#triangle-topright {
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  width: 0;
  height: 0;
  border-top: 100px solid #ddd; 
  border-left: 100px solid transparent;
}

#triangle-topleft {
  -webkit-touch-callout: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  right:auto;
  left:0;
  width: 0;
  height: 0;
  border-top: 50px solid #ddd;
  border-right: 50px solid transparent;     
}

#recover .flipLink{
  right:auto;
  left:0;
}

#forkongithub a {
  box-sizing: content-box;
  background:#ddd;
  color:#fff;
  text-decoration:none;
  font-family:arial, sans-serif;
  text-align:center;
  font-weight:bold;
  padding:5px 40px;
  font-size:1rem;
  line-height:2rem;
  position:relative;
  transition:0.5s;
}

#forkongithub a:hover {
  background:#aaa;
  color:#fff;
}

#forkongithub a::before, #forkongithub a::after {
  content:"";
  width:100%;
  display:block;
  position:absolute;
  top:1px;
  left:0;
  height:1px;
  background:#fff;
}

#forkongithub a::after {
  bottom:1px;
  top:auto;
}

@media screen and (min-width:800px){
  #forkongithub {
    position:absolute;
    display:block;
    top:0;
    right:0;
    width:200px;
    overflow:hidden;
    height:200px;
  }

  #forkongithub a {
    width:200px;
    position:absolute;
    top:60px;
    right:-60px;
    transform:rotate(45deg);
      -webkit-transform:rotate(45deg);
    box-shadow:2px 2px 10px rgba(0,0,0,0.8);
  }
}    </style>
    <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    
</head>
<body>
	<!--Inspired by http://tutorialzine.com/2012/02/apple-like-login-form/ - Apple-like Login Form with CSS 3D Transforms -->

<div class="container">
	<div class="row">
    	<div class="container" id="formContainer">

          <form class="form-signin" id="formlogin" role="form"  method="post" action="login.php">
            <h3 class="form-signin-heading">Insira seu Login</h3>
           
            <input type="text" class="form-control" name="login" id="login" placeholder="Login" required autofocus>
            <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
            <a href="#" id="flipToRecover" class="flipLink">
             Esqueci minha senha
            </a>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
          </form>
    
          <form class="form-signin" id="recover" role="form">
            <h3 class="form-signin-heading">Insira seu Email</h3>
            <a href="#" id="flipToLogin" class="flipLink">
              <div id="triangle-topleft"></div>
            </a>
            <input type="email" class="form-control" name="loginEmail" id="loginEmail" placeholder="Email" required autofocus>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Recuperar senha</button>
          </form>

        </div> <!-- /container -->
	</div>
</div>
	<script type="text/javascript">
	$(function(){
    
	// Checking for CSS 3D transformation support
	$.support.css3d = supportsCSS3D();
	
	var formContainer = $('#formContainer');
	
	// Listening for clicks on the ribbon links
	$('.flipLink').click(function(e){
		
		// Flipping the forms
		formContainer.toggleClass('flipped');
		
		// If there is no CSS3 3D support, simply
		// hide the login form (exposing the recover one)
		if(!$.support.css3d){
			$('#login').toggle();
		}
		e.preventDefault();
	});
	
/*	formContainer.find('form').submit(function(e){
		// Preventing form submissions. If you implement
		// a backend, you might want to remove this code
		e.preventDefault();
	});
	*/
	
	// A helper function that checks for the 
	// support of the 3D CSS3 transformations.
	function supportsCSS3D() {
		var props = [
			'perspectiveProperty', 'WebkitPerspective', 'MozPerspective'
		], testDom = document.createElement('a');
		  
		for(var i=0; i<props.length; i++){
			if(props[i] in testDom.style){
				return true;
			}
		}
		
		return false;
	}
});
	</script>
</body>
</html>
