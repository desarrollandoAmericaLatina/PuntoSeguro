<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="x-ua-compatible" content="ie=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
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
    <?php if (!include_slot('login-box')): ?>
      
    <?php if ($sf_user->isAuthenticated()): ?>
      <li class="login"><?php echo link_to('Salir', '@sf_guard_signout') ?></li>
    <?php else: ?>
      <li class="login"><?php echo link_to('Entrar', '@sf_guard_signin') ?></li>
    <?php endif; ?>
    <?php if ($sf_user->isAuthenticated()): ?>
      <li class="account">Hola <?php echo $sf_user->getUsername();?></li>
    <?php endif; ?>  
      
    <?php endif; ?>   
    </ul>
        
    </div>
 
    <div class="clear"> &nbsp;</div>
    
    <?php echo $sf_content ?>
    
    
    <!-- footer start -->
    <div class="grid_3"> &nbsp;
    </div>
    <div class="grid_6 align_center"> &nbsp;
    </div>
    <div class="grid_3 align_right">
    <p>
    <small>
    Powered by
    <a href="http://www.lacosox.org">Gustavo Lacoste</a> 
    </small>
    </p>
    </div>
    </div>
    <!-- footer end -->
</body>
</html>











