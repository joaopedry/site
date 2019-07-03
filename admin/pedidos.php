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
        <link rel="stylesheet" href="template/stlyle.css">
        <title>Painel de Controle</title>
        
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
        
    </head>
    
    <body>
    <header>
    	<div class="logo"><a href="index.php">eat&play </a></div>
    </header>
		<?php include_once "template/lateral.php"; ?>
    	<section class="conteudo">
        	<?php
			if((isset($_GET["acao"])) AND ($_GET["acao"] == "acompanhaPedido") AND (isset($_GET["id"])))
			{
				$tipoAcompanhamento = $_GET["id"];
				if($tipoAcompanhamento == 1){
			?>
                <h1 class="titulo">Pedidos em Andamento</h1>
            <?php
				}
				else if($tipoAcompanhamento == 2){
			?>
                <h1 class="titulo">Pedidos Finalizados</h1>
            <?php
				}
				else if($tipoAcompanhamento == 3){
			?>
                <h1 class="titulo">Pedidos Cancelados</h1>
            <?php
				}
			?>
                    <div class="acompanhapedido">
                        <table>
                            <thead>
                                <tr>
                                    <th>Nº Pedido</th>
                                    <th>Cliente</th>
                                    <th>Pedido</th>
                                    <th>Quantidade</th>
                                    <th>Preço</th>
                                    <th>Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                               $sql_tipo = "SELECT *  
                                    FROM `take_orders` AS tk
                                    JOIN `orders` AS od ON tk.food = od.id
                                    WHERE tk.status = ".$tipoAcompanhamento." AND tk.qtd >= 1 and tk.food != ''";
                                $tipo = selecionar($_SG["link"], $sql_tipo);
								$conta = 0;
                                while($selecTipo = mysqli_fetch_assoc($tipo)){?>
                                <tr>
                                    <td><?php echo $selecTipo['number_order'];?></td>
                                    <td><?php echo $selecTipo['name']; ?></td>
                                    <td><?php echo $selecTipo['food']; ?></td>
                                    <td><?php echo $selecTipo['qtd']; ?></td>
                                    <td>R$ <?php echo $selecTipo['price']; ?></td>
                                    <td>
                                        <form action="pedidos.php" method="post">
                                            <?php
                                            if($tipoAcompanhamento == 1)
                                            {
                                            ?>
                                            	<input type="hidden" value="<?php echo $selecTipo['food']; ?>" name="food" id="food"/>
                                                <input type="hidden" value="<?php echo $selecTipo['id_order']; ?>" name="id_order" id="id_order"/>
                                                <input type="hidden" value="<?php echo $selecTipo['number_order']; ?>" name="number_order" id="number_order"/>
                                                <button onClick="return ConfirmarFinaliza()" class="btnFinaliza" type="submit" name="finalizar">Finalizar</button>
                                                <br />
                                                <button onClick="return ConfirmarCancela()" class="btnCancela" type="submit" name="cancelar">Cancelar</button>
                                                <button type="button" class="btnVisualiza" data-toggle="modal" data-target="#myModal<?php echo $selecTipo['id_order']; ?>">Visualizar</button>
                                                
                                            <!-- Inicio Modal -->
                                            <div class="modal fade" id="myModal<?php echo $selecTipo['id_order']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title text-center" id="myModalLabel">Pedido Nº<?php echo $selecTipo['number_order']; ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Nome: <?php echo $selecTipo['name']; ?></p>
                                                            <p>Comida: <?php echo $selecTipo['food']; ?></p>
                                                            <p>Quantidade: <?php echo $selecTipo['qtd']; ?></p>
                                                            <p>R$ <?php echo $selecTipo['price']; ?></p>                                                            
                                                            <p>Telefone: <?php echo $selecTipo['phone']; ?></p>
                                                            <p>Mesa: <?php echo $selecTipo['mesa']; ?></p>
                                                            <p>Descrição: <?php echo $selecTipo['description']; ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <label>Sem ação</label>
                                            <?php	
                                            }
                                            ?>
                                        </form>
                                    </td>
                                </tr>
                                <?php 
                                }?>
                            </tbody>
                        </table>
                    </div>
			<?php }?>
        </section>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>


<?php
function logMe($msg){
	// Abre ou cria o arquivo bloco1.txt
	// "a" representa que o arquivo é aberto para ser escrito
	$fp = fopen("log.txt", "a");
	
	// Escreve a mensagem passada através da variável $msg
	$escreve = fwrite($fp, $msg);
	
	// Fecha o arquivo
	fclose($fp);
}
	
if(isset($_POST['cancelar']))
{
	session_start();
	$id = $_POST['id_order'];
	$sql_deletar = "UPDATE `take_orders` SET status = 3 WHERE `id_order` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_POST['cancelar']);
	header('location: pedidos.php?acao=acompanhaPedido&id=1');
			logMe('Pedido Nº'.$_POST['number_order'].' - '.$_POST['food'].' - Cancelado em: '.date("d/m/Y H:i:s"). ' Pelo usuario: '.$_SESSION["usuarioNome"]. 
'
');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao deletar)';
	echo '</script>';
}

if(isset($_POST['finalizar']))
{
	$id = $_POST['id_order'];
	$sql_deletar = "UPDATE `take_orders` SET status = 2 WHERE `id_order` = '".$id."'";
	actionQuery($_SG['link'], $sql_deletar);
	unset($_POST['finalizar']);
	header('location: pedidos.php?acao=acompanhaPedido&id=1');
		logMe('Pedido Nº'.$_POST['number_order'].' - '.$_POST['food'].' - Finalizado em: '.date("d/m/Y H:i:s"). ' Pelo usuario: '.$_SESSION["usuarioNome"]. 
'
');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao deletar)';
	echo '</script>';
}

if(isset($_POST['pedido']))
{
	$sql_number = "SELECT MAX(number_order) AS n FROM `take_orders` ORDER BY number_order DESC";
	$number = selecionar($_SG["link"], $sql_number);
	$row = mysqli_fetch_assoc($number);
	$row['n'] = $row['n'] + 1;
	
	$sql_pedido = "SELECT * FROM `types` ";
	$pedido = selecionar($_SG["link"], $sql_pedido);
	$count = 0;
	while($selecpedido = mysqli_fetch_assoc($pedido)){
		$count = $count + 1;
		$sql_criar = "INSERT INTO `take_orders` (number_order, name, phone, mesa, food, qtd, status, description) VALUE ('".$row['n']."', '".$_POST['nome']."', '".$_POST['telefone']."', '".$_POST['mesa']."', '".$_POST['comida'.$count]."', '".$_POST['quantidade'.$count]."', '".$_POST['status']."', '".$_POST['texto']."')";
		actionQuery($_SG['link'], $sql_criar);
	}	
	unset($_POST['pedido']);
	header('location: ../index.php');
	
	logMe('Pedido Nº'.$row['n']. ' Solicitado em: '.date("d/m/Y H:i:s").' - Dispositivo: '.$_POST['modelo']. 
'
');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao criar)';
	echo '</script>';
}	

if(isset($_POST['criar']))
{
	$sql_criar = "INSERT INTO `orders` (`name`, `type`, `date`) VALUE ('".$_POST['name']."', '".$_POST['type']."', '".$_POST['date']."')";
	actionQuery($_SG['link'], $sql_criar);
	unset($_POST['criar']);
	header('location: pedidos.php');
}else
{
	echo '<script language="javascript">';
	echo 'alert(Erro ao criar)';
	echo '</script>';
}	
?>
<script>
function ConfirmarFinaliza(){		if (confirm ("Deseja realmente finalizar?"))		return true;	else		return false;}
function ConfirmarCancela(){		if (confirm ("Deseja realmente cancelar?"))		return true;	else		return false;}
</script>