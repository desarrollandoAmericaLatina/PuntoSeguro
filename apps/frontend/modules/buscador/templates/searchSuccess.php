<div id="content">
        <div id="logo"><img src="images/logo_solo_b.jpg"/></div>
        
</div>


<?php slot('title') ?>
  <?php  echo sprintf('Puntos en '.$address) ?>
<?php end_slot(); ?>

<?php include_partial('buscadorSuperior',array('address' => $address, 'categories'=>$categories, 'filterCatArray'=>$filterCatArray)) ?>

<div class="searchResults grid_9" id="map_container">
    <div id="map_canvas">Cargando...</div>
</div>

<div class=" grid_3" >
<?php echo image_tag('logo_solo_b.jpg','60x60'); // echo image_tag('loading-image.gif','style=float:left;')?>
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
 </div>


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
