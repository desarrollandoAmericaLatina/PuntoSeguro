<?php
/*
 * Template para el error 404 personalizado
 * referencia: http://www.librosweb.es/symfony_1_2/capitulo19/opciones_de_symfony.html
 * and open the template in the editor.
 * tambien se puede adornar usando formee: 	<span class="form-msg-error">Página no encontrada. El servidor ha retornado un error 404.</span>
 */
?>
<!-- apps/frontend/templates/layout.php -->
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="author" content="Gustavo Lacoste &lt;gustavo@lacosox.org&gt;" />
<meta name="copyright" content="Licensed under GPL and MIT." />
<meta name="title" content="" />
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="language" content="es" />
<meta name="robots" content="all" />
    <title>
                  ERROR 404
    </title>

<link href="http://fonts.googleapis.com/css?family=Droid+Serif:regular,italic,bold" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.14/jquery-ui.min.js"></script>
<link rel="stylesheet" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot(). '/css/960.css'?>" type="text/css" />
<link rel="stylesheet" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot(). '/js/jqueryui/1.8.14/css/lacosoxfuture11/jquery-ui.css'?>" type="text/css" />

<link rel="stylesheet" href="<?php echo sfContext::getInstance()->getRequest()->getRelativeUrlRoot(). '/js/jqueryui/1.8.14/css/master.css'?>" type="text/css" />



  </head>
  <body>
  <noscript>
  <!-- Comienzo Advertencia aplicación sólo funciona con JS activo -->
    <span class="form-msg-error"><strong>Error:</strong> <font face="arial">JavaScript debe estar habilitado para poder utilizar este sistema en la vista estándar. Sin embargo, parece que esta funcionalidad no está habilitada o que no es compatible con tu navegador. Para utilizar la vista estándar, habilita JavaScript cambiando las opciones de tu navegador y, a continuación, <a href="">inténtalo de nuevo</a>.</font>
    </span>
  <style>
  #contenedorPrincipal{
    display: none;
  }
  </style>
  <!-- Fin Advertencia aplicación sólo funciona con JS activo -->
  </noscript>

  <div id="contenedorPrincipal">

    <div class="container_12 ui-corner-top" id="container-header">
      <div class="clear">
      </div>
    </div>
    <div class="container_12" id="centro">
      <div class="grid_12" id="body-header">
        <div class="grid_11">&#160;
        </div>
      </div>
      <div class="clear">
      </div>
      <div class="grid_12" id="body">
        <!-- INICIO CONTENIDO CENTRAL -->

        <div class="ui-widget">
          <div style="padding: 0 .7em;" class="ui-state-error"> 
            <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span> 
            <strong>Error:</strong> Página no encontrada. (El servidor ha retornado un error 404).</p>
          </div>
        </div>

          <h4>¿Sabía usted la dirección URL?</h4>
              Es posible que haya escrito la dirección (URL) incorrectamente. Compruebe para asegurarse de que tiene las palabras con correcta ortografía, mayúsculas, minúsculas, etc

          <h4>¿Ha seguido un enlace desde otro lugar a este sitio?</h4>
              Si usted llegó a esta página desde otra parte de este sitio, por favor envíenos un email  para que podamos corregir nuestro error.

          <h4>¿Ha seguido un enlace desde otro sitio?</h4>
              Los enlaces desde otros sitios a veces puede estar obsoletos o mal escritos. Envíanos un email explicando de donde viene y podemos intentar ponernos en contacto con el otro sitio con el fin de solucionar el problema.

          <h4>¿Que puede hacer?</h4>

          <ul class="sfTIconList">
                <li class="sfTLinkMessage"><a href="javascript:history.go(-1)">Volver a la página anterior</a></li>
          </ul>
        <!-- FIN CONTENIDO CENTRAL -->
      </div>
      <div class="clear">
      </div>
    </div>
  </div>
  </body>
</html>
