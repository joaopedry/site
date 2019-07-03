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
        	<h1 class="titulo">Fazer upload da música:</h1>
            <div class="UPmusica">
                <form class="FORMmusica" method="post" action="query.php" enctype="multipart/form-data">
                    <input class="fileMusica" type="file" name="arquivo" />
                    <input class="enviarMusica" type="submit" name="enviarArquivo" value="Enviar Arquivo" />
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>Arquivo</th>
                            <th style="width:10%;">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        foreach(new DirectoryIterator("media/")  as $fileInfo)
                        {
                            if($fileInfo->isDot()) continue;
                            $arqName = $fileInfo->getFilename();
                        ?>
                        <tr>
                            <td><?php echo $arqName;?></td>
    
                            <td>
                                <a onClick="return ConfirmarAlteracao()" class="btnDelete" href="query.php?deletarArquivo=<?php echo $arqName;?>">Excluir</a>
                            </td>
                        </tr> 
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
                <h1 class="titulo">Fazer upload da imagem:</h1>
                <div class="UPimagem">
                <form class="FORMimagem" method="post" action="query.php" enctype="multipart/form-data">
                    <input class="fileImagem" type="file" name="arquivo" />
                    <input class="enviarImagem" type="submit" name="enviarImagem" value="Enviar Arquivo" />
                </form>
                <table>
                    <thead>
                        <tr>
                            <th>Arquivo</th>
                            <th style="width:10%;">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        foreach(new DirectoryIterator("img/")  as $fileInfo)
                        {
                            if($fileInfo->isDot()) continue;
                            $arqName = $fileInfo->getFilename();
                        ?>
                        <tr>
                            <td><?php echo $arqName;?></td>
    
                            <td>
                                <a onClick="return ConfirmarAlteracao()" class="btnDelete" href="query.php?deletarIMG=<?php echo $arqName;?>">Excluir</a>
                            </td>
                        </tr>
                        <?php 
                        }?>
                    </tbody>
                </table>
            </div>
       	</section>
    </body>
</html>
<script>
function ConfirmarAlteracao(){		if (confirm ("Deseja realmente excluir?"))		return true;	else		return false;}
</script>