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
        	<h1 class="titulo">Painel de Controle</h1>
            <form class="inserir" action="query.php" method="post">
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
                <input type="number" min="1" max="255" name="seq" value="255"/>
                <input class="btnCriar"  type="submit" name="criar" value="Adicionar" />
            </form>
            <table>
            	<thead>
            		<tr>
                    	<th style="width:50%;">Título</th>
                        <th>Tipo</th>
                        <th>Data</th>
                        <th>Ação</th>
                    </tr>
				</thead>
                <tbody>
                <?php 
					$sql_select = "SELECT * FROM `medias` ORDER BY seq ";
					$media = selecionar($_SG["link"], $sql_select);
					while($selecMedia = mysqli_fetch_assoc($media)){?>
					<tr>
                    	<td><?php echo $selecMedia['title']; ?></a></td>
                        <td><?php echo $selecMedia['type']; ?></td>
                        <td><?php echo $selecMedia['date']; ?></td>
                        <td>
                        	<a class="btnEdita" href="editar.php?acao=atualizar&id=<?php echo $selecMedia['id']; ?>">Editar</a>
                        	<form action="query.php" method="post">
                                <input type="hidden" value="<?php echo $selecMedia['id']; ?>" name="id" id="id"/>
                                <button onClick="return ConfirmarAlteracao()" class="btnDelete" type="submit" name="deletar">Deletar</button>
                            </form>
                        </td>
                    </tr>
					<?php 
					}?>
                </tbody>
            </table>            
        </section>
    </body>
</html>
<script>
function ConfirmarAlteracao(){		if (confirm ("Deseja realmente excluir?"))		return true;	else		return false;}
</script>