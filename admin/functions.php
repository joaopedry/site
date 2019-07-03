<?php
function actionQuery($link, $sql){
	if(mysqli_query($link, $sql)){
		return true;
	}else{
		return false;
	}
}

function selecionar($link, $sql){
	return mysqli_query($link, $sql);
}

//passando fuso
date_default_timezone_set("America/Sao_Paulo");
setlocale(LC_ALL, 'pt_BR');
?>
