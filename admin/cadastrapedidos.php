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
			<h1 class="titulo">Cadastrar novo tipo de comida</h1>
            	<div class="Cadastrotipo">
                    <form class="FORMtipo" method="post" action="query.php" enctype="multipart/form-data">
                        <label>Nome do novo tipo:</label>
                        <input type="text" name="name"/>
                        <input class="criarTipo" type="submit" name="criarTipoComida" value="Adicionar" />                            
                    </form>
				</div>
        	<h1 class="titulo">Cadastrar Comida</h1>
            	<div class="Cadastrocomida">
                    <form class="FORMcomida" method="post" action="query.php" enctype="multipart/form-data">
                        <label>Nome:</label>
                        <input class="FORMnome" type="text" name="name"/>
                        <label>Tipo:</label>
                        <select class="FORMtipo" name="type" placeholder="Arquivo" required>
                        <option value="">Selecione:</option>
                        <?php
                        $sql_tipo = "SELECT * FROM `types` ";
                        $tipo = selecionar($_SG["link"], $sql_tipo);
                        while($selecTipo = mysqli_fetch_assoc($tipo)){?>
                        <option><?php echo $selecTipo['name']; ?></option>   
                        <?php
                        }
                        ?>
                        </select>
                        <label>Preço: R$</label>
                        <input class="FORMpreco" type="text" name="price"/>
                        <input type="hidden" name="date" value="<?php echo date('y/m/d H:i:s'); ?>" readonly value="1" />
                        <input class="criarComida" type="submit" name="criarComida" value="Adicionar" />                            
                    </form>
				</div>
                <table>
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Tipo</th>
                            <th>Preço</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        $sql_select = "SELECT * FROM `orders` ";
                        $comida = selecionar($_SG["link"], $sql_select);
                        while($selecComida = mysqli_fetch_assoc($comida)){?>
                        <tr>
                            <td><?php echo $selecComida['food']; ?></td>
                            <td><?php echo $selecComida['type']; ?></td>
                            <td><?php echo $selecComida['price']; ?></td>
                            <td>
                                <a class="btnEditaCard" href="editar.php?acao=atualizarComida&id=<?php echo $selecComida['id']; ?>">Editar</a>
                                <a onClick="return ConfirmarAlteracao()" class="btnDeleteCard" href="query.php?deletarComida&id=<?php echo $selecComida['id']; ?>">Excluir</a>
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