<?php 
	include_once "admin/connect.php";
	include_once "admin/functions.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>eat&play </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="index.php">eat&play </a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Principal</a></li>
                <li><a href="#programs-section" class="nav-link">Menu</a></li>
                <li><a href="#teachers-section" class="nav-link">Pedidos</a></li>
              </ul>
            </nav>
          </div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="admin/index.php" class="nav-link"><span>Área Restrita</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>
        </div>
      </div>
      
    </header>

    <div class="intro-section" id="home-section">
      
      <div class="slide-1" style="background-image: url('images/banner_2.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12">
              <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                  <h1  data-aos="fade-up" data-aos-delay="100">eat&play </h1>
                  <p class="mb-4"  data-aos="fade-up" data-aos-delay="200">Faça agora mesmo o seu pedido 100% on-line!</p>
                  <p data-aos="fade-up" data-aos-delay="300"><a href="#teachers-section" class="btn btn-primary py-3 px-5 btn-pill">Realizar pedido</a></p>

                </div>
<!--
                <div class="col-lg-5 ml-auto" data-aos="fade-up" data-aos-delay="500">
                  <form action="" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Sign Up</h3>
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email Addresss">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group mb-4">
                      <input type="password" class="form-control" placeholder="Re-type Password">
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-pill" value="Sign up">
                    </div>
                  </form>

                </div>
-->                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    <div class="site-section" id="programs-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
            <h2 class="section-title">Cardápio</h2>
        </div>
        <div class="cardapio">
		<?php
			$sql_menu = "SELECT * FROM `menu` ";
			$menu = selecionar($_SG["link"], $sql_menu);
			$count_menu = 0;
			$id_menu = 0;
			while($selecmenu = mysqli_fetch_assoc($menu)){
		?>
                <div class="cardapios" style="width:200px;position:relative;margin-left:20px;float: left;text-align:center;">
                    
                    <img src="admin/img/<?php echo $selecmenu['url_icon'];?>">
                    
					<?php echo $selecmenu['name'];?><br>
                    <button type="button" class="btnVisualiza" data-toggle="modal" data-target="#myModal<?php echo $selecmenu['id']; ?>">Visualizar</button>
                    <div class="modal fade" id="myModal<?php echo $selecmenu['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" style="width:700px; height:90%;margin-left:-90px;;">
                                <div class="modal-header">
                                	<h4 class="modal-title text-center" id="myModalLabel"><?php echo $selecmenu['name']; ?></h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <img src="admin/img/<?php echo $selecmenu['url_file'];?>" style="width:100%; height:100%;">
                            </div>
                        </div>
                    </div>
                    
                </div>
        <?php
			}
        ?>
        </div>
      </div>
    </div>

    <div class="site-section" id="teachers-section">
      <div class="container">

          <div class="cSol-lg-7 mb-5 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Montar seu pedido</h2>
            <p class="mb-5">Aqui você pode montar seu pedido da forma que achar melhor!</p>
          </div>

          <div class="pedido" >
            <form action="admin/pedidos.php" method="post">
            	<label>Nome:</label>
            	<input class="nome" name="nome" onkeyup="validar(this,'text');">
                <label>Telefone:</label>
            	<input type="text" class="telefone" name="telefone" id="telefone" maxlength="15">
                <label>Mesa:</label>
			<?php
				if(isset($_GET['mesa']))
				{
					$numQR = $_GET['mesa'];
            ?>
				<input class="mesa" name="mesa" readonly value="<?php echo $numQR ?>">
                 <?php 
				 unset($_GET['mesa']);
				 }else{
				 ?><input class="mesa" name="mesa" readonly value="Externo">
				 <?php }?>
				<input class="horario" name="horario" type="hidden">
                <?php 
					$sql_pedido = "SELECT * FROM `types` ";
					$pedido = selecionar($_SG["link"], $sql_pedido);
					$count = 0;
					while($selecpedido = mysqli_fetch_assoc($pedido)){
					$count = $count + 1;
				?>
            	<br><label><?php echo $selecpedido['name']; ?></label><br>
                <select class="comida" id="comida" name="comida<?php echo $count?>">
                <option value="">Selecione:</option>
                 <?php 
					$sql_opc = "SELECT * FROM `orders` WHERE `type` = '".$selecpedido['name']."'";
					$opc = selecionar($_SG["link"], $sql_opc);
					while($selecopc = mysqli_fetch_assoc($opc)){?>
                    <option value="<?php echo $selecopc['id'];?>"><?php echo $selecopc['food'];?> - R$<?php echo $selecopc['price'];?></option>
                <?php 
					}?>
                </select>
                <label>Quantidade:</label>
                <input class="quantidade" onkeyup="validarQTD(this,'text');" name="quantidade<?php echo $count?>" type="text" min="0" value="" maxlength="2" >
                <?php 
					}?>
                <br>
                <input class="status" name="status" type="hidden" value="1">
                <?php 
				//Verifica o dispositivo
					$mobile = FALSE;
					$dispositivo = 0;
					$user_agents = array("iPhone","iPad","Android","webOS","BlackBerry","iPod","Symbian","IsGeneric");
					
					foreach($user_agents as $user_agent){
					
						if (strpos($_SERVER['HTTP_USER_AGENT'], $user_agent) !== FALSE) {
							$mobile = TRUE;
					
							$modelo = $user_agent;
					
							break;
						}
					}
					
					if ($mobile){
						$dispositivo = strtolower($modelo);
					}else{
						$dispositivo = 'Computador';
					}
				?> 
                <input class="modelo" name="modelo" type="hidden" value="<?php echo $dispositivo ?>">
                <label>Observações:</label>
                <textarea class="texto" name="texto" maxlength="240"></textarea>
                <br>
                <input onclick="pedidoRealizado()" type="submit" class="pedido" name="pedido" title="Realizar pedido" value="Realizar pedido">
            </form>
           
          </div>
         </div> 
    </div>

    <div class="site-section bg-image overlay" style="background-image: url('images/hero_2.jpg');">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-8 text-center testimony">
            <img src="images/slide_5.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
            <h3 class="mb-4">Restaurante do João</h3>
            <blockquote>
              <p>&ldquo; Hoje, o Restaurante do João é uma rede de restaurantes com mais 80 casas espalhadas pelo Brasil, a incluir uma em Miami e, mais recentemente, no Shopping Cidade das Flores em Joinville. &rdquo;</p>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
    
    
    <footer class="footer-section bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>Sobre o eat&play </h3>
            <p>O eat&play foi desenvolvido pensado nos restaurantes que pensam em oferencer um serviço diferenciado a seus clientes, podendo deixar os mesmos realizem seus pedidos. Além do gerente do estabelecimento poder acompanhar o volume de entrada e saída de pedidos.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <!--<h3>Links</h3>-->
            <ul class="list-unstyled footer-links">
             <!-- <li><a href="#"> </a></li>
              <li><a href="#">Menu</a></li>
              <li><a href="#">Pedidos</a></li>-->
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Solicite um orçamento!</h3>
            <p>Deixe aqui seu e-mail para que possamos entrar em contato e fazer um orçamento para implantação no seu estabelecimento.</p>
            <form action="admin/query.php" method="post" class="footer-subscribe">
              <div class="d-flex mb-5">
                <input type="email" class="form-control rounded-0" placeholder="E-mail" name="email">
                <input onclick="orcamentoRealizado()" type="submit" class="btn btn-primary rounded-0" value="Enviar" name="solicitarOrcamento">
              </div>
            </form>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | <a href="https://www.linkedin.com/in/joaopedrss/" target="_blank" >João Pedro dos Santos</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>

  
    
  </div> <!-- .site-wrap -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>
  
  <script>
  /* Máscaras Telefone */

	function mascara(o,f){
		v_obj=o
		v_fun=f
		setTimeout("execmascara()",1)
	}
	function execmascara(){
		v_obj.value=v_fun(v_obj.value)
	}
	function m(v){
		v=v.replace(/\D/g,"");
		v=v.replace(/^(\d{2})(\d)/g,"($1) $2");
		v=v.replace(/(\d)(\d{4})$/,"$1-$2");
		return v;
	}
	function id( el ){
		return document.getElementById( el );
	}
	window.onload = function(){
		id('telefone').onkeypress = function(){
			mascara( this, m );
		}
	}
  </script>
  <script>
  /*Nome*/
	function validar(dom,tipo){
		switch(tipo){
			case'num':var regex=/[A-Za-z]/g;break;
			case'text':var regex=/\d/g;break;
		}
		dom.value=dom.value.replace(regex,'');
	}
	/*Qtd*/
	function validarQTD(dom,tipo){
		switch(tipo){
			case'num':var regex=/[A-Za-z]/g;break;
			case'text':var regex=/\d/g;break;
		}
		dom.value=dom.value.replace(/\D/g, '');
	}
  </script>
  <script>
	function pedidoRealizado()
	{
		alert("Pedido realizado com sucesso!!");
	}
	function orcamentoRealizado()
	{
		alert("Orçamento realizado com sucesso!!\n Logo entraremos em contato!");
	}
  </script>
  </body>
</html>

