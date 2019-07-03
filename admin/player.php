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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>﻿
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
            <h2>Player de Música</h2>
            	 <audio id="audio" autoplay="true" preload="auto" tabindex="0" controls="" >
					<?php 
					$sql_select = "SELECT * FROM `medias` ORDER BY `date` LIMIT 1";
					$media = selecionar($_SG["link"], $sql_select);
					while($selecMedia = mysqli_fetch_assoc($media)){
						if($selecMedia['type'] == "audio")
						{
						?>	
						<source src="media/<?php echo $selecMedia['url_file']; ?>" >
					<?php 
						}
					}
					?>
            	</audio>	
                <audio style="display:none" id="video" preload="auto" tabindex="0" controls="" >
                    <?php 
                    $sql_select = "SELECT * FROM `medias` ORDER BY `date` LIMIT 1";
                    $media = selecionar($_SG["link"], $sql_select);
                    while($selecMedia = mysqli_fetch_assoc($media)){
                        if($selecMedia['type'] == "video")
                        {
                        ?>	
                        <source src="media/<?php echo $selecMedia['url_file']; ?>" >
                    <?php 
                        }
                    }
                    ?>
                </audio>
            </form>
            <ul id="playlist">
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Tipo</th>
                            <th>Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php 
                        $sql_select = "SELECT * FROM `medias` ";
                        $media = selecionar($_SG["link"], $sql_select);
                        while($selecMedia = mysqli_fetch_assoc($media)){?>
                        <tr>
							<td>
                                <a id="titulo" class="<?php echo $selecMedia['type']; ?>" href="media/<?php echo $selecMedia['url_file']; ?>">
                                	<?php echo $selecMedia['title']; ?>
                                </a>
                            </td>
                            <td><?php echo $selecMedia['type']; ?></td>
                            <td><?php echo $selecMedia['date']; ?></td>
                        </tr>
                        <?php 
                        }?>
                        
                    </tbody>
                </table>
            </ul>         
        </section>


        
<script type="text/javascript">
	inicio();
	function inicio()
	{
		$('#playlist li:first-child').addClass('active');
		var corrente = 0;
		var media = $("#audio");
		var playlist = $("#playlist");
		var tracks = playlist.find("li a");
		var len = tracks.length;
		media[0].play();
		playlist.find("a").click(function(e){
			e.preventDefault();
			link = $(this);
			if(link.hasClass('video'))
			{
				var media = $("#video");
				var playing = document.getElementById('audio');
				playing.pause();
				$('#audio').hide();
				$('#video').show();
			}
			else
			{
				var media = $("#audio");
				var playing = document.getElementById('video');
				playing.pause();
				$('#video').hide();
				$('#audio').show();
			}
			corrente = link.parent().index();
			run(link, media[0]);
		});
		media[0].addEventListener("ended", function(e){	 
			corrente++;
			
			if(corrente == len){
				corrente = 0;
				link = playlist.find('a')[0];
			}else{
				link = playlist.find('a')[corrente];
			}
			run($(link),media[0]);
		});
		
	}

	function run(link, player)
	{
		player.src = link.attr("href");
		par = link.parent();
		par.addClass("active").siblings().removeClass("active");
		player.load();
		player.play();
	}
</script>
    </body>
</html>
