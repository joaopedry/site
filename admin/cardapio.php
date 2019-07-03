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
        	<h1 class="titulo">Cardápios</h1>
            <div class="Cadastrocardapio">
                <form class="FORMcardapio" method="post" action="query.php" enctype="multipart/form-data">
                    <label>Título:</label>
                    <input class="FORMtitulo" type="text" name="name"/>
                    <label>Ícone:</label>
                    <select class="FORMicone" name="url_icon" placeholder="Arquivo" required>
                        <option value="">Selecione seu arquivo</option>
                            <?php
                            //Lista dos arquivos de uma pasta
                            foreach(new DirectoryIterator("img/")  as $fileInfo)
                            {
                                if($fileInfo->isDot()) continue;
                                $arqName = $fileInfo->getFilename();
                            ?>
                        <option><?php echo $arqName;?></option>   
                            <?php
                            }
                            ?>
                    </select>
                    <label>Cardápio:</label>
                    <select class="FORMcard" name="url_file" placeholder="Arquivo" required>
                        <option value="">Selecione seu arquivo</option>
                            <?php
                            //Lista dos arquivos de uma pasta
                            foreach(new DirectoryIterator("img/")  as $fileInfo)
                            {
                                if($fileInfo->isDot()) continue;
                                $arqName = $fileInfo->getFilename();
                            ?>
                        <option><?php echo $arqName;?></option>   
                            <?php
                            }
                            ?>
                    </select>
                    <input type="hidden" name="date" value="<?php echo date('Y/m/d H:i:s'); ?>" readonly value="1" />
                    <input class="criarCardapio" type="submit" name="criar_menu" value="Adicionar" />                            
                </form>
            </div>
            <table>
            	<thead>
            		<tr>
                    	<th>Título</th>
                        <th>Ícone</th>
                        <th>Cardápio</th>
                        <th>Data de Modificação</th>
                        <th>Ação</th>
                    </tr>
				</thead>
                <tbody>
                <?php 
					$sql_select = "SELECT * FROM `menu` ";
					$menu = selecionar($_SG["link"], $sql_select);
					while($selecMenu = mysqli_fetch_assoc($menu)){?>
					<tr>
                    	<td><?php echo $selecMenu['name']; ?></td>
                        <td><?php echo $selecMenu['url_icon']; ?></td>
                        <td><?php echo $selecMenu['url_file']; ?></td>
                        <td><?php echo $selecMenu['date']; ?></td>
                        <td>
                        	<a class="btnEditaCard" href="editar.php?acao=atualizarMenu&id=<?php echo $selecMenu['id']; ?>">Editar</a>
                            <a onClick="return ConfirmarAlteracao()" class="btnDeleteCard" href="query.php?acao=deletarMenu&id=<?php echo $selecMenu['id']; ?>">Excluir</a>
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