<?php
	include_once "connect.php";
	include_once "functions.php";
/*arquivos.php*/

//Upload de musicas
if(isset($_POST['enviarArquivo']))
{
	$_UP['pasta'] = "media/";
	$_UP['tamanho'] = '2048 * 1024 * 100';
	$_UP['extensoes'] = array('mp3', 'mp4', 'ogg', 'wmv', 'avi');
	$_UP['erro'][0] = 'Não houve erro';
	
	if($_FILES['arquivo']['error'] != 0)
	{
		die("Error ao transferir arquivo");
		exit;
	}
	$file_parts = explode('.',$_FILES['arquivo']['name']);
	$extensao = strtolower(end($file_parts));
	//Verifica se a extensão é permitida
	if(array_search($extensao, $_UP['extensoes']) === false)
	{
		echo "Extensão de arquivo não permitida!";
		exit;
	}
	//Mover a musica para a pasta correta
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].$_FILES['arquivo']['name']))
	{
		echo "Upload efetuado com sucesso!";
		header("location:arquivos.php");
	}
}

//Delete arquivos
if(isset($_GET['deletarArquivo']))
{
	unlink("media/".$_GET['deletarArquivo']);
	unset($_GET['deletarArquivo']);
	header("location:arquivos.php");
}

//Upload de imagem
if(isset($_POST['enviarImagem']))
{
	$_UP['pasta'] = "img/";
	$_UP['tamanho'] = '2048 * 1024 * 100';
	$_UP['extensoes'] = array('png', 'jpg', 'jpge', 'gif');
	$_UP['erro'][0] = 'Não houve erro';
	
	if($_FILES['arquivo']['error'] != 0)
	{
		die("Error ao transferir arquivo");
		exit;
	}
	$file_parts = explode('.',$_FILES['arquivo']['name']);
	$extensao = strtolower(end($file_parts));
	//Verifica se a extensão é permitida
	if(array_search($extensao, $_UP['extensoes']) === false)
	{
		echo "Extensão de arquivo não permitida!";
		exit;
	}
	//Mover a musica para a pasta correta
	if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'].$_FILES['arquivo']['name']))
	{
		echo "Upload efetuado com sucesso!";
		header("location:arquivos.php");
	}
}

//Delete arquivos
if(isset($_GET['deletarIMG']))
{
	unlink("img/".$_GET['deletarIMG']);
	unset($_GET['deletarIMG']);
	header("location:arquivos.php");
}

/*cardapio.php*/

if(isset($_POST['criar_menu']))
{
	$sql_criar = "INSERT INTO `menu` (`name`, `url_icon`, `url_file`, `date`) VALUE ('".$_POST['name']."', '".$_POST['url_icon']."', '".$_POST['url_file']."', '".$_POST['date']."')";
	actionQuery($_SG['link'], $sql_criar);
	unset($_POST['criar']);
	header('location: cardapio.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao criar)';
	echo '</script>';
}	

if(isset($_GET['acao']))
{
	$id = $_GET['id'];
	$sql_deletar = "DELETE FROM `menu` WHERE `id` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_GET['acao']);
	header('location: cardapio.php');
}

/*index.php*/
if(isset($_POST['deletar']))
{
	$id = $_POST['id'];
	$sql_deletar = "DELETE FROM `medias` WHERE `id` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_POST['deletar']);
	header('location: index.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao deletar)';
	echo '</script>';
}

if(isset($_POST['criar']))
{
	$sql_criar = "INSERT INTO `medias` (title, url_file, type, date, seq) VALUE ('".$_POST['title']."', '".$_POST['url_file']."', '".$_POST['type']."', NOW(), '".$_POST['seq']."')";
	actionQuery($_SG['link'], $sql_criar);
	unset($_POST['criar']);
	header('location: index.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao criar)';
	echo '</script>';
}
/*CadastraPedidos*/
if(isset($_POST['deletar']))
{
	$id = $_POST['id'];
	$sql_deletar = "DELETE FROM `medias` WHERE `id` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_POST['deletar']);
	header('location: index.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao deletar)';
	echo '</script>';
}

if(isset($_POST['criarTipoComida']))
{
	$sql_criar = "INSERT INTO `types` (name) VALUE ('".$_POST['name']."')";
	actionQuery($_SG['link'], $sql_criar);
	unset($_POST['criarTipo']);
	header('location: cadastrapedidos.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao criar)';
	echo '</script>';
}	

if(isset($_POST['criarComida']))
{
	$sql_criar = "INSERT INTO `orders` (`food`, `type`, `price`, `date`) VALUE ('".$_POST['name']."', '".$_POST['type']."', '".$_POST['price']."', '".$_POST['date']."')";
	actionQuery($_SG['link'], $sql_criar);
	unset($_POST['criar']);
	header('location: cadastrapedidos.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao criar)';
	echo '</script>';
}
	
if(isset($_GET['deletarComida']))
{
	$id = $_GET['id'];
	$sql_deletar = "DELETE FROM `orders` WHERE `id` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_GET['deletarComida']);
	header('location: cadastrapedidos.php');
}
/* ../index.php */
if(isset($_POST['solicitarOrcamento']))
{
	$sql_email = "INSERT INTO `emails` (`email`) VALUE ('".$_POST['email']."')";
	actionQuery($_SG['link'], $sql_email);
	unset($_POST['solicitarOrcamento']);
	header('location: ..\index.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao criar)';
	echo '</script>';
}
?>