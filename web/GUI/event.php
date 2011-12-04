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
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

	<div id="header">
		<div id="header_content">
		Usuario&nbsp;
		<div id="logout_button" style="width:60px;height:20px;background-color:#605A55;display:inline-block;text-align:center;border:1px solid#999;"><a href="q.php?f=logout">LogOut</a></div>
		</div>
	</div>
	<div id="middle">
		<div id="content">
			<div id="trel" style="visibility:hidden;position:absolute;top:150px;left:200px;background-color:#ddd;width:250px;height:250px;"></div>
		<? //map ?>
			<div id="desc">Descripcion del mapa</div>
			<div id="tt_k"></div>
			<div id="sidebar">
				<p>
					INICIO:<span class="box_se">4&nbsp;Dic&nbsp;2011 - 16:00 hrs</span>
					<br/>
					FINAL:<span class="box_se">5&nbsp;Dic&nbsp;2011 - 18:00 hrs</span>
				</p>
				<br/>
				
				<p>
					N° de usuarios: 6
				</p>
				<p id="e_comuna">
					
					<div id="show_comuna" style="position:absolute;top:198px;left:145px;float:right;background-color:#ddd;width:300px;height:300px;"><h2>Datos de comuna</h2><div style="width:inherit;height:inherit;background-color:#F9F9F9;border-left:1px dashed#ddd;border-bottom:1px dashed#ddd;border-right:1px dashed#ddd;"></div></div>
				</p>
				<p id="salir"><a href="start">Salir</a></p>
				
			</div>
			<div id="comments">
				<div class="s_coment_a"><h2>User</h2><p>Comments</p><div class="dt">04-Dic-2011</div></div>
				<div class="s_coment_b"><h2>User</h2><p>Comments</p><div class="dt">04-Dic-2011</div></div>
				<div class="s_coment_a"><h2>User</h2><p>Comments</p><div class="dt">04-Dic-2011</div></div>
				<div class="s_coment_b"><h2>User</h2><p>Comments</p><div class="dt">04-Dic-2011</div></div>
				<br/>
				<form name="new_msg">
				
					Tu opinión:<br/> <textarea name="msg" cols="50" rows="10"></textarea>
									<input type="button" value="Opinar"/>
				</form>
			</div>
			
		</div>
	</div>
	<div id="footer">
	
	</div>
	<script type="text/javascript">
	var e_comuna = new clickOpt("ecomuna_1", "rels");
	e_comuna.setDivtoReload('show_comuna'); e_comuna.setPagetoRequest('q.php'); e_comuna.setAttrs('f=ecomuna'); e_comuna.setMethod('GET');
	e_comuna.run();
	</script>
</body>
</html>
