
<? ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>default</title>
	
	<link rel="stylesheet" type="text/css" href="style/enter.css"/>
	<script type="text/javascript" src=""></script>
	      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : 'YOUR_APP_ID',
            status     : true, 
            cookie     : true,
            xfbml      : true
          });
        };
        (function(d){
           var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           d.getElementsByTagName('head')[0].appendChild(js);
			}(document));
      </script>
</head>
<body> <div id="fb-root"></div>
	<div id="header">
		<div id="himage"></div>
	</div>
	<div id="content">
		<div id="login">
			<h1>Entrar</h1>
			<form name="lgin" id="lgin" method="POST" action="q.php?query=login">
				<h2>Usuario:<input type="text" name="usnm"/></h2>
				<h2>Contraseña:<input type="text" name="passwd"/></h2>
				<div class="sep"></div>
				<input type="submit" value="Log In" class="button" /><br/><br/>
				<div class="fb-login-button">Entrar con Facebook</div>
			</form>
		</div>
		
		<div id="registro">
			<h1>Registro de usuario</h1>
			<!--<h2>-whatever-</h2>-->
			<form name="reg" id="reg" method="POST" action="q.php?query=register">
				<h2>Nombre de Usuario:<input type="text" name="usnm"></h2>
				<h2>Contraseña:<input type="text" name="passwd"/></h2>
				<h2>Repite Contraseña:<input type="text" name="rpasswd"/></h2>
				<h2>E-Mail:<input type="text" name="email"/></h2>
				<div class="sep"></div>
				<input type="submit" value="Registro" class="button"/>
		</div><div id="vert_sep"></div>
	</div>
		</form>
	</div>

<script type="text/javascript"></script>
</body>
</html>
