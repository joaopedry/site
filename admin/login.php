<?php include_once "connect.php";
	logar();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php include_once "template/header.php"; ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>
    <div class="logar">
    	<h2>Painel de controle</h2>
        <form id="login" method="post" action="login.php">
            <label>Usuario</label><input required="required" type="text" name="usuario" /><br />
            <label>Senha</label><input required="required" type="password" name="senha" /><br />
            <input type="submit" name="logar" value="Enviar" />
        </form>
    </div>
</body>
</html>