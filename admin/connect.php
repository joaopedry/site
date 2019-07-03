<?php
$_SG["conectaServidor"] = true;
$_SG["abreSessao"] = true;
$_SG["caseSentive"] = false;
$_SG["validaSempre"] = true;


$_SG["servidor"] = "localhost";
$_SG["banco"] = "eat_play";
$_SG["usuario"] = "root";
$_SG["senha"] = "";
$_SG["paginaLogin"] = "login.php";
$_SG["tabela"] = "users";
$_SG["link"] = mysqli_connect($_SG["servidor"], $_SG["usuario"], $_SG["senha"], $_SG["banco"]);

$_SG["link"]->set_charset("utf8");

	if($_SG["conectaServidor"] == true)
	{
		if(!$_SG["link"])
		{
			die("Erro ao conectar");
		}
	}
	if($_SG["abreSessao"] == true)
	{
		$tempoSessao = 360; //segundos
		session_start();
		if(isset($_SESSION['sessiontime']))
		{
			if($_SESSION['sessiontime'] < (time() - $tempoSessao))
			{
				session_unset();
			}
		}
		else
		{
			session_unset();
		}
		$_SESSION['sessiontime'] = time();
	}
	
	function validaUsuario($usuario, $senha){
		global $_SG;
		$cs = ($_SG["caseSentive"]) ? "BINARY" : "";	
		$Vusuario = addslashes($usuario);
		$Vsenha = addslashes($senha);
		$sql = "SELECT `id`, `name` FROM `".$_SG["tabela"]."` WHERE ".$cs." `name` = '".$Vusuario."' AND ".$cs. " `password` = '".$Vsenha ."' LIMIT 1";
		$query = mysqli_query($_SG["link"], $sql);
		$result = mysqli_fetch_assoc($query);
		
		if(empty ($result))
		{
			return false;
		}
		else
		{
			$_SESSION["usuarioID"] = $result["id"];
			$_SESSION["usuarioNome"] = $result["name"];
			if($_SG["validaSempre"] == true)
			{
				$SESSION["usuarioLogin"] = $usuario;
				$SESSION["usuarioSenha"] = $senha;
			}
			return true;
		}
	}

	function protegePagina()
	{
		global $_SG;
		if(!isset($_SESSION["usuarioID"]) OR !isset($_SESSION["usuarioNome"]))
		{
			expulsaVisitante();
		}
		else if(!isset($_SESSION["usuarioID"]) OR !isset($_SESSION["usuarioNome"]))
		{
			if($_SG["validaSempre"] == true)
			{
				if(!validaUsuario($SESSION["usuarioLogin"], $SESSION["usuarioSenha"]))
					expulsaVisitante();
			}	
		}
	}
	
	function expulsaVisitante()
	{
		global $_SG;
		unset($_SESSION["usuarioID"], $_SESSION["usuarioNome"], $SESSION["usuarioLogin"], $SESSION["usuarioSenha"]);
		header("location:". $_SG["paginaLogin"]);
		
	}

	function logar()
	{
		if(isset($_POST['logar']))
		{
			$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
			$senha = (isset($_POST['senha'])) ? $_POST['senha'] : "";
			if(validaUsuario($usuario, $senha) == true)
			{
				header("location: index.php");
			}else
			{
				
				echo "<div class='aviso'> Usuario ou Senha Inválidos</div>";
			}
		}
	}
	/*
	function del()
	{
		if(isset($_POST['deletar']))
		{
			$id = $_POST['id'];
			$sql_deletar = "DELETE FROM `media` WHERE id=".$id;
			actionQuery($_SG['link'],$sql_deletar);
			unset($_POST['deletar']);
			header('location: index.php');
		}
	}
	function actionQuery($link, $sql){
	if(mysqli_query($link, $sql)){
		return true;
	}else{
		return false;
	}
}*/
?>