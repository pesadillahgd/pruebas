<?php

error_reporting(0);
set_time_limit(0);
session_start();

if(!file_exists("usuarios.txt")){
  $fopen = fopen("usuarios.txt" , "a+");
  fclose($fopen);
}
if(isset($_SESSION['usuario']) and isset($_SESSION['senha'])){
  session_destroy();
  session_start();
}

?>
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<title>GOLD CHECKER | LOGIN</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="img/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="login-css/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login-css/css/util.css">
	<link rel="stylesheet" type="text/css" href="login-css/css/main.css">
	<link rel="stylesheet" href="../use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+1PpSrTzFCRwsnLJvVHXCDCmLaCAJrmxQL9" crossorigin="anonymous">
<!--===============================================================================================-->
</head>
<body>
	    
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/com-one.png">
				<br><br>
				<center>
				<h3><span class="badge badge-blue">GOLD CHECKER</span><br><br></h3>
				<center>
				</div>
<span class="login100-form-title">
						🇵🇪 GOLD CHECKER 🇵🇪
					</span>
				<div id="wrapper">

      <div id="boxy-login-wrapper">
</div>
      <div class="card-body">
        <form method="POST" action="#">
          <div class="form-group">
            <label for="exampleInputEmail1">Usuário</label>
            <input class="form-control" name="usuario" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Insira seu Usuário">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input class="form-control" name="senha" id="exampleInputPassword1" type="password" placeholder="Senha">
          </div>
                    <input class="btn btn-primary btn-block" type="submit" name="enviar" value="Entrar">
        </form>
        </div>
      </div>
    </div>
  </div>
					<div class="text-center p-t-136">
						<p>Copyright © 2020 <a href="">Gold Checker</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
</body>

</html>

		<?php
if(isset($_POST['usuario']) and isset($_POST['senha'])){
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];
  $get = file_get_contents("usuarios.txt");
  $array = file("usuarios.txt");

if($usuario == "" or $senha == "" ){
  echo "<script>swal('erro' , 'Usuario incorrecto o Contraseña' , 'error');</script>";

}else{

  $logado = false;
  for($i=0;$i<count($array); $i++)
  {
    $explode = explode("|" , $array[$i]);

    if($explode[0] == $usuario and $explode[1] == $senha){
      $_SESSION['usuario'] = $usuario;
      $_SESSION['senha'] = $senha;
      $_SESSION['rank'] = $explode[2];
      $_SESSION['foto'] = $explode[3];
      $logado = true;
    }

  }
if($logado){
   echo "<script>swal('Sucesso!' , 'Logado Com Sucesso!' , 'success');</script>";
   echo '<meta http-equiv="refresh" content="2;url=GoldChecker/">';
}else{
   echo "<script>swal('ERRO' , 'Usuario Ou Senha Incorretos' , 'error');</script>";
}


}

}
  ?>
	
<!--===============================================================================================-->	
	<script src="login-css/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login-css/vendor/bootstrap/js/popper.js"></script>
	<script src="login-css/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login-css/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login-css/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="login-css/js/main.js"></script>

</body>

</html>