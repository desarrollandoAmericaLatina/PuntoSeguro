<<<<<<< HEAD
<div style="float:left; position:relative;left:200px;width:400px;">
<h1 style="color:#DA5D13;position:relative;left:-140px;">Bienvenido a Punto Seguro </h1>
<h2 style="height:70px;word-spacing:1em;">Una aplicación para compartir información sobre la seguridad de tu barrio y comuna.</h2>
</div>
<img src="/PuntoSeguro/web/images/logo_solo_b.jpg" class="logo" style="z-index:2;"/>
=======
<div id="content">
<h1>Bienvenido a Punto Seguro,</h1>
<h2>Una aplicación para compartir información sobre la seguridad de tu barrio y comuna.</h2>
<img src="/PuntoSeguro/web/images/logo_solo_b.jpg" class="logo">
>>>>>>> 7040d0ab93bf5be9a2e0cdb8594bac2ea6f4071d

<?php slot('title') ?>
  <?php  echo sprintf('Puntos en '.$address) ?>
<?php end_slot(); ?>
<div style="position:relative;top:-150px;">
<?php include_partial('buscadorSuperior',array('address' => $address, 'categories'=>$categories, 'filterCatArray'=>$filterCatArray)) ?>
<<<<<<< HEAD
</div>
<div class="searchResults grid_9" id="map_container" style="position:relative;top:-120px;z-index:20;">
    <div id="map_canvas">Cargando...</div>
</div>

<div class=" grid_3">
=======

<div class="searchResults grid_9" id="map_container">
    <div id="map_canvas">Cargando...</div>asd
</div>

<div class=" grid_3" >
>>>>>>> 7040d0ab93bf5be9a2e0cdb8594bac2ea6f4071d
<?php // echo image_tag('loading-image.gif','style=float:left;')?>

				
 </div>


</div>

<div id="footer_">
<h2 style="color:#DA5D13">Instrucciones:</h2>
<ul>
<li>1-Crea un punto seguro en el mapa en la ubicación de tu barrio.
o Unete a un punto seguro ya creado.</li>
<li>2-Discute, organizate con tus vecinos</li>
<li>3.Infórmate sobre la delincuencia en tu comuna</li>
<li>4.Comparte y difunde el punto seguro.</li>
</ul>

<h2 style="color:#DA5D13">Crea un punto seguro.</h2>

<p>Un punto seguro es una página para compartir ideas sobre la seguridad o un tema de delincuencia en tu barrio.</p>
<li>1.Coloca un título descriptivo</li>
<li>2.Describe el tema a tratar y dale una función: prevenir, denunciar o pedir apoyo.</li>
<li>3.Ingresa la dirección del punto seguro y elige comuna.
*si fuese necesario, haz click sobre el ícono Punto Seguro y muevelo al punto deseado.</li>
<li>4.Ingresa a tu Punto seguro y comparte tu opinión y dudas sobre tu tema.</li>
</ul>

</div>
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
//var zonas_layer2 = new google.maps.KmlLayer("http://knxroot.github.com/opendata/kml/proyectos_comunitarios_2010.kml", {suppressInfoWindows: true,preserveViewport:true});
//zonas_layer2.setMap(GM);
});
//]]>
</script>
</div>
