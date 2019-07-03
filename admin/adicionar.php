<?php 
	include_once "connect.php";
	include_once "functions.php";
	protegePagina();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include_once "template/header.php"; ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Painel de Controle</title>
    </head>
    
    <body>
    <header>
    	<div class="logo">Logotipo</div>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
        	<h1 class="titulo">Painel de Controle</h1>
            <form class="inserir" action="index.php" method="post">
            <h2>Adicionar nova Mídea</h2>
            	<input type="text" name="title" placeholder="Título" />
                <select name="url_file" placeholder="Arquivo" required>
                    <option value="">Selecione seu arquivo</option>
                    <?php
                    //Lista dos arquivos de uma pasta
                    foreach(new DirectoryIterator("media/")  as $fileInfo)
                    {
                        if($fileInfo->isDot()) continue;
                        $arqName = $fileInfo->getFilename();
                    ?>
                    <option><?php echo $arqName;?></option>   
                    <?php
                    }
                    ?>
                </select>
                <select name="type">
                	<option value="audio">Áudio</option>
                    <option value="video">Vídeo</option>
                </select>
                <input class="btnCriar"  type="submit" name="criar" value="Adicionar" />
            </form>
            
            <form class="inserir" action="index.php" method="post">
            <h2>Adicionar novo Item no Cardápio</h2>
            	<input type="text" name="title" placeholder="Título" />
                <select name="url_file" placeholder="Arquivo" required>
                    <option value="">Selecione seu arquivo</option>
                    <?php
                    //Lista dos arquivos de uma pasta
                    foreach(new DirectoryIterator("media/")  as $fileInfo)
                    {
                        if($fileInfo->isDot()) continue;
                        $arqName = $fileInfo->getFilename();
                    ?>
                    <option><?php echo $arqName;?></option>   
                    <?php
                    }
                    ?>
                </select>
                <select name="type">
                	<option value="audio">Áudio</option>
                    <option value="video">Vídeo</option>
                </select>
                <input class="btnCriar"  type="submit" name="criar" value="Adicionar" />
            </form>
        </section>
    </body>
</html>


<?php
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
	$sql_criar = "INSERT INTO `medias` (title, url_file, type, date) VALUE ('".$_POST['title']."', '".$_POST['url_file']."', '".$_POST['type']."', NOW())";
	actionQuery($_SG['link'], $sql_criar);
	unset($_POST['criar']);
	header('location: index.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao criar)';
	echo '</script>';
}	
?>
