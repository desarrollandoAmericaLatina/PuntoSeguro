<? 
//revisar si el usuario esta conectado, sino mostrar enter.php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>default</title>
	<link rel="stylesheet" type="text/css" href="style/start.css"/>
	<script type="text/javascript" src="scripts/dynamic.js"></script>
</head>
<body>
	<div id="header">
		<div id="header_content">
		Usuario&nbsp;
		<div id="logout_button" style="width:60px;height:20px;background-color:#605A55;display:inline-block;text-align:center;border:1px solid#999;"><a href="q.php?f=logout">LogOut</a></div>
		</div>
	</div>
	<div id="middle">
		<div id="content">
			<div id="trel" style="visibility:hidden;position:absolute;top:150px;left:200px;background-color:#ddd;width:250px;height:250px;"></div>
			<div class="qbox"><a href="#" id="ingresara_punto" style="z-index:2000;">Ingresar a un punto</a></div>
			<div class="qbox"><a href="#" id="crear_punto"style="z-index:2000;">Crear un punto</a></div>
		<? //map ?>
		<div id="_map"></div>
		<div id="info">Número de usuarios registrados:<? ?> </div>
		<div id="fb" style="float:left;">Facebook</div>
		</div>
	</div>
	<div id="footer">
	
	</div>
	<script type="text/javascript">
		var rel = new clickOpt('ingresara_punto','rels');
		rel.setDivtoReload('trel'); rel.setPagetoRequest('q.php'); rel.setAttrs('f=ingresara_punto'); rel.setMethod('GET');
		rel.run();
		var rel2 = new clickOpt('crear_punto','rels');
		rel2.setDivtoReload('trel'); rel2.setPagetoRequest('q.php'); rel2.setAttrs('f=crear_punto'); rel2.setMethod('GET');
		rel2.run();
	</script>
</body>
</html>
