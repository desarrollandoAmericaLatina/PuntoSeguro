<? 
//revisar si el usuario esta conectado, sino mostrar enter.php
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>default</title>
	<link rel="stylesheet" type="text/css" href="style/start.css"/>
	<script type="text/javascript" src=""></script>
</head>
<body>
	<div id="header">
		<div id="header_content">
		Usuario&nbsp;
		<input type="button" value="log out" style="border:0;background-color:#ddd;"/>
		</div>
	</div>
	<div id="middle">
		<div id="content">
			<div class="qbox"><a href="#">Ingresar a un punto</a></div>
			<div class="qbox"><a href="#">Crear un punto</a></div>
		<? //map ?>
		<div id="_map"></div>
		<div id="info">Número de usuarios registrados:<? ?> </div>
		<div id="fb" style="float:left;">Facebook</div>
		</div>
	</div>
	<div id="footer">
	
	</div>
	<script type="text/javascript"></script>
</body>
</html>
