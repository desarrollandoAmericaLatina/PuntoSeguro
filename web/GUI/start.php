<? 
//revisar si el usuario esta conectado, sino mostrar enter.php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
	<title>
        <?php if (!get_slot('title')): ?>
          PuntoSeguro -
        <?php else: ?>
          PuntoSeguro - <?php include_slot('title') ?>
        <?php endif ?>
        </title>
	<?php include_stylesheets() ?>
        <link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold" rel="stylesheet">
        <noscript>
        <link rel="stylesheet" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot(). '/css/mobile.min.css'?>" />
        </noscript>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot(). '/js/jquery/1.5.1/jquery.min.js'?>'>\x3C/script>")</script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<script>window.jQuery.ui || document.write("<script src='<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot(). '/js/jqueryui/1.8.14/jquery-ui.min.js'?>'>\x3C/script>")</script>

<link rel="stylesheet" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot(). '/js/jqueryui/1.8.14/css/lacosoxfuture11/jquery-ui.css'?>" type="text/css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?v=3.5&region=CL&sensor=true"></script>


<script>
//<![CDATA[

var GEOSEARCH_CONFIG = {
  urlRoot: '<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot(); ?>',
  isLoggedIn:'undefined',
  moduleName:'<?php echo sfContext::getInstance()->getModuleName(); ?>',
  actionName:'<?php echo sfContext::getInstance()->getActionName(); ?>',
  searchSiteSuggestEnabled:'<?php echo sfConfig::get('app_geoSearch_searchSiteSuggestEnabled') ? "true" : "false"; ?>',
  searchTermSuggestEnabled:'<?php echo sfConfig::get('app_geoSearch_searchTermSuggestEnabled') ? "true" : "false"; ?>',
  externalApiKeys:{
      googleMapsKey: '<?php echo sfConfig::get('app_geoSearch_googleMapsEnterpriseKey'); ?>'
  }
};
//GEOSEARCH_CONFIG["saludo"] = "xxxxxxxx";

//]]>
</script>
<?php include_javascripts() ?>
</head>
<body>
<div class="container_12">
    <div class="grid_12">

    <ul id="header-account">

    </ul>

	<div id="header">
		<div id="header_content">
    <?php if (!include_slot('login-box')): ?>

		<?php if ($sf_user->isAuthenticated()): ?>
                   <?php echo $sf_user->getUsername();?>
                <?php endif; ?> &nbsp;
                    <?php if ($sf_user->isAuthenticated()): ?>
                          <div id="logout_button" style="width:60px;height:20px;background-color:#605A55;display:inline-block;text-align:center;border:1px solid#999;"><a href="q.php?f=logout">LogOut</a></div>
                        <?php else: ?>
                          <div id="logout_button" style="width:60px;height:20px;background-color:#605A55;display:inline-block;text-align:center;border:1px solid#999;"><a href="q.php?f=login">Entrar</a></div>
                        <?php endif; ?>
    <?php endif; ?>

		
		</div>
	</div>
	<div id="middle">
		<div id="content">
			<div id="logo"><img src="images/logo_solo_b.jpg"/></div>
			<div id="trel" style="visibility:hidden;position:absolute;top:150px;left:400px;background-color:#ddd;width:250px;height:250px;"></div>
			<div class="qbox"><a href="#" id="ingresara_punto" style="z-index:2000;">Unirse a punto</a></div>
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
            </div>
    </div>
</body>
</html>
