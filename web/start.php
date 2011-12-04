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
			<div id="logo"><img src="images/logo_solo_b.jpg"/></div>
			<div id="site_desc"><h1>Bienvenido a Punto Seguro,</h1><h2>Una aplicación para compartir información sobre la seguridad de tu barrio y comuna.</h2>
						
						
						
						
</div>
			<div id="trel" style="visibility:hidden;position:absolute;top:250px;left:400px;background-color:#ddd;width:250px;height:250px;"></div>
			<div class="qbox"><a href="#" id="ingresara_punto" style="z-index:2000;">Unirse a punto</a></div>
			<div class="qbox"><a href="#" id="crear_punto"style="z-index:2000;">Crear un punto</a></div>
		<? //map ?>
		
		
		<div id="_map"><?php include_partial('buscadorSuperior',array('address' => $address, 'categories'=>$categories, 'filterCatArray'=>$filterCatArray)) ?>

<div class="searchResults grid_9" id="map_container">
    <div id="map_canvas">Cargando...</div>asd
</div></div><!---->
		
		<div id="info">Número de usuarios registrados:<? ?> </div>
		
		<div id="instrucciones"><h2>Instrucciones:</h2>
		
						<p>
						<ul style="text-align:left;">
						<li>Crea un punto seguro en el mapa en la ubicación de tu barrio.
						o Unete a un punto seguro ya creado.</li>
						<li>Discute, organizate con tus vecinos</li>
						<li>Infórmate sobre la delincuencia en tu comuna</li>
						<li>Comparte y difunde el punto seguro.</li>
						</p>
						</ul>
						<h2>Crea un punto seguro.</h2>
						<p>
							<h3>Un punto seguro es una página para compartir ideas sobre la seguridad o un tema de delincuencia en tu barrio.</h3>
						<ul style="text-align:left;">
						<li>Coloca un título descriptivo</li>
						<li>Describe el tema a tratar y dale una función: prevenir, denunciar o pedir apoyo.</li>
						<li>Ingresa la dirección del punto seguro y elige comuna.
						*si fuese necesario, haz click sobre el ícono Punto Seguro y muevelo al punto deseado.</li>
						<li>Ingresa a tu Punto seguro y comparte tu opinión y dudas sobre tu tema.</li>
						</p></div>
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
	
<script type="text/javascript">
//<![CDATA[
var SEARCH_RESULTS = {
    lat: '<?php echo $lat; ?>',
    lng: '<?php echo $lng; ?>',
    bound: new google.maps.LatLngBounds(new google.maps.LatLng(<?php echo $south; ?>,<?php echo $west; ?>),new google.maps.LatLng(<?php echo $north; ?>,<?php echo $east; ?>)),
    find_loc:'<?php echo $address; ?>',
    data: $.parseJSON('<?php echo json_encode($sf_data->getRaw('data')); ?>')
};
//]]>
</script>

<script type="text/javascript">
//<![CDATA[
$().ready(function() {
var b=Search(this, this.document, SEARCH_RESULTS);
b.initMapWithResults();
b.initEventListener();
var GM=GeoSearch.getGMAP();
//var zonas_layer = new google.maps.KmlLayer("http://190.113.0.89/merobaronelauto.cl/www/app/GRIDRM600.kmz", {suppressInfoWindows: true,preserveViewport:true});
var zonas_layer = new google.maps.KmlLayer("http://knxroot.github.com/opendata/kml/GRIDRM600.kmz", {suppressInfoWindows: true,preserveViewport:true});


zonas_layer.setMap(GM);
</body>
</html>
