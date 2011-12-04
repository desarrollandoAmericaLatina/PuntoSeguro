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

            <?php echo $sf_content ?>

	</div>

	<div id="footer">

	</div>


         </div>
    </div>
</body>
</html>
