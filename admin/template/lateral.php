<aside>
	<nav class="menu">
		<ul>
        	<li><a href="index.php">Playlist</li></a>
        	<li><a href="player.php">Player</li></a>
            <li><a href="cardapio.php">Cardápio</li></a>
            <li><a href="cadastrapedidos.php">Cadastrar Pedidos</li></a>
            <!--<li><a href="pedidos.php">Acompanhar Pedidos</li></a>-->
            <li><a href="arquivos.php">Arquivos</li></a>
        	<li><a href="sair.php">Sair</li></a>
    		<li>
                <form action="pedidos.php" method="get">
                    <label>Acompanhar Pedidos</label>
                    <select name="acompanharPedido" onchange="location = this.value;">
                        <option value="">Selecione:</option>
                        <option value="pedidos.php?acao=acompanhaPedido&id=1">Pedidos em Andamento</option>
                        <option value="pedidos.php?acao=acompanhaPedido&id=2">Pedidos Finalizados</option>
                        <option value="pedidos.php?acao=acompanhaPedido&id=3">Pedidos Cancelados</option>
                    </select>
                </form>
           </li>
    	</ul>
    </nav>
</aside>