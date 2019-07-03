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
    	<div class="logo"><a href="index.php">eat&play </a></div>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
            <h1 class="titulo">Editar Informações</h1>
            <div class="FormEdita">
				<?php 
                if((isset($_GET["acao"])) AND ($_GET["acao"] == "atualizar") AND (isset($_GET["id"])))
                {
                    $sql_select = "SELECT * FROM `medias` WHERE id=".$_GET['id']." LIMIT 1";
                    $media = selecionar($_SG["link"], $sql_select);
                    while($selecMedia = mysqli_fetch_assoc($media)){?>
                        <form method="post" action="editar.php" enctype="multipart/form-data">
                            <label>Título</label>
                            <input class="FORM" type="text" name="title" value="<?php echo $selecMedia['title']; ?>" />
                            <label>Arquivo</label>
                            <select class="FORM" name="url_file" placeholder="Arquivo" required>
                            <option><?php echo $selecMedia['url_file']; ?></option>
                            <?php
                            //Lista dos arquivos de uma pasta
                            foreach(new DirectoryIterator('media/')  as $fileInfo)
                            {
                                if($fileInfo->isDot()) continue;
                                $arqName = $fileInfo->getFilename();
                            ?>
                            <option><?php echo $arqName;?></option>   
                            <?php
                            }
                            ?>
                            </select>
                            <label>Tipo</label>
                            <select class="FORM" name="type">
                                <option><?php echo $selecMedia['type']; ?></option>
                                <option value="audio">Áudio</option>
                                <option value="video">Vídeo</option>
                            </select>
                            <input type="number" min="1" max="255" name="seq" value="<?php echo $selecMedia['seq']; ?>"/>
                            <input type="hidden" name="date" value="<?php echo $selecMedia['date']; ?>" />
                            <input type="hidden" name="id" value="<?php echo $selecMedia['id']; ?>" /><br />
                            <input class="atualizar" type="submit" name="atualizar" value="Atualizar" />                            
                        </form>
                    <?php }?>
                 <?php }?>
                <?php 
                 if((isset($_GET["acao"])) AND ($_GET["acao"] == "atualizarMenu") AND (isset($_GET["id"])))
                {
                    $sql_select = "SELECT * FROM `menu` WHERE id=".$_GET['id']." LIMIT 1";
                    $imagem = selecionar($_SG["link"], $sql_select);
                    while($selecMedia = mysqli_fetch_assoc($imagem)){?>
                        <form method="post" action="editar.php" enctype="multipart/form-data">
                            <label>Nome do Cardápio:</label>
                            <input class="FORM" type="text" name="name" value="<?php echo $selecMedia['name']; ?>" />
                            <label>Ícone: </label>
                            <select class="FORM" name="url_icon" placeholder="Arquivo" required>
                            <option><?php echo $selecMedia['url_icon']; ?></option>
                            <?php
                            //Lista dos arquivos de uma pasta
                            foreach(new DirectoryIterator('img/')  as $fileInfo)
                            {
                                if($fileInfo->isDot()) continue;
                                $arqName = $fileInfo->getFilename();
                            ?>
                            <option><?php echo $arqName;?></option>   
                            <?php
                            }
                            ?>
                            </select>
                            <label>Cardápio: </label>
                            <select class="FORM" name="url_file" placeholder="Arquivo" required>
                            <option><?php echo $selecMedia['url_file']; ?></option>
                            <?php
                            //Lista dos arquivos de uma pasta
                            foreach(new DirectoryIterator('img/')  as $fileInfo)
                            {
                                if($fileInfo->isDot()) continue;
                                $arqName = $fileInfo->getFilename();
                            ?>
                            <option><?php echo $arqName;?></option>   
                            <?php
                            }
                            ?>
                            </select>
                            <label>Data: </label><input type="hidden" name="date" value="<?php echo date('y/m/d H:i:s'); ?>" readonly value="1" />
                            <input type="hidden" name="id" value="<?php echo $selecMedia['id']; ?>" /><br />
                            <input class="atualizar" type="submit" name="atualizarMenu" value="Atualizar" />                            
                        </form>
                    <?php }?>
                 <?php }?>
                 
                <?php 
                 if((isset($_GET["acao"])) AND ($_GET["acao"] == "atualizarComida") AND (isset($_GET["id"])))
                {
                    $sql_select = "SELECT * FROM `orders` WHERE id=".$_GET['id']." LIMIT 1";
                    $comida = selecionar($_SG["link"], $sql_select);
                    while($selecComida = mysqli_fetch_assoc($comida)){?>
                        <form method="post" action="editar.php" enctype="multipart/form-data">
                            <label>Nome: </label>
                            <input class="FORM" class="EditaNome" type="text" name="food" value="<?php echo $selecComida['food']; ?>" />
                            <label>Tipo: </label>
                            <select class="FORM" name="type" placeholder="Arquivo" required>
                            <option><?php echo $selecComida['type']; ?></option>
                            <?php
                                $sql_tipo = "SELECT * FROM `types` ";
                                $tipo = selecionar($_SG["link"], $sql_tipo);
                                while($selecTipo = mysqli_fetch_assoc($tipo)){?>
                            <option><?php echo $selecTipo['name']; ?></option>   
                            <?php
                            }
                            ?>
                            </select>
                            <label>Preço: </label>
                            <input class="FORM" type="text" name="preco" value="<?php echo $selecComida['price']; ?>" />
                            <input type="hidden" name="date" value="<?php echo date('y/m/d H:i:s'); ?>" readonly value="1" />
                            <input type="hidden" name="id" value="<?php echo $selecComida['id']; ?>" /><br />
                            <input class="atualizar" type="submit" name="atualizarComida" value="Atualizar" />                            
                        </form>
                    <?php }?>
                 <?php }?>
			</div>
        </section>
    </body>
</html>

<?php
if(isset($_POST['atualizar']))
{
	$id = $_POST['id'];
	$sql_atualizar = "UPDATE `medias` SET title='".$_POST['title']."', url_file='".$_POST['url_file']."', type='".$_POST['type']."', date='".$_POST['date']."', seq='".$_POST['seq']."' WHERE `id` = '".$id."'";
	actionQuery($_SG['link'], $sql_atualizar);
	unset($_POST['atualizar']);
	header('location: index.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao editar)';
	echo '</script>';
}

if(isset($_POST['atualizarMenu']))
{
	$id = $_POST['id'];
	$sql_atualizar = "UPDATE `menu` SET name='".$_POST['name']."', url_icon='".$_POST['url_icon']."', url_file='".$_POST['url_file']."', date='".$_POST['date']."' WHERE `id` = '".$id."'";
	actionQuery($_SG['link'], $sql_atualizar);
	unset($_POST['atualizarMenu']);
	header('location: cardapio.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao editar)';
	echo '</script>';
}

if(isset($_POST['atualizarComida']))
{
	$id = $_POST['id'];
	$sql_atualizarComida = "UPDATE `orders` SET food='".$_POST['food']."', type='".$_POST['type']."', price='".$_POST['preco']."' WHERE `id` = '".$id."'";
	actionQuery($_SG['link'], $sql_atualizarComida);
	unset($_POST['atualizarComida']);
	header('location: cadastrapedidos.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao editar)';
	echo '</script>';
}
?>
