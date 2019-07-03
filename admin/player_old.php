<?php 
	include_once "connect.php";
	include_once "functions.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Playlist</title>
	<style type="text/css">
		ul{list-style: none;padding: 0px}
		a{text-decoration: none;}
		#playlist{width:0px; height:0px;}
	
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>﻿
</head>
<body>
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
    <ul id="playlist">
    	<?php 
		$sql_select = "SELECT * FROM `medias` ORDER BY `date`";
		$media = selecionar($_SG["link"], $sql_select);
		while($selecMedia = mysqli_fetch_assoc($media)){?>
    	<li>
        	<a class="<?php echo $selecMedia['type']; ?>" href="media/<?php echo $selecMedia['url_file']; ?>"><?php echo $selecMedia['title']; ?></a>
            
        </li>
        <?php 
		}?>
	</ul>
       
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
