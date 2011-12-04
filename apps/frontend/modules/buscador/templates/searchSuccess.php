<?php slot('title') ?>
  <?php  echo sprintf('Puntos en '.$address) ?>
<?php end_slot(); ?>

<?php include_partial('buscadorSuperior',array('address' => $address, 'categories'=>$categories, 'filterCatArray'=>$filterCatArray)) ?>

<div id="result_list_container" class="searchResults grid_3" style="background-color: #e0dcd7">
    <div id="searchResults">

    <ul class="results">
    <?php foreach( $pager->getResults() as $row): ?>
        
    <li href="#" class="local-list-item ui-widget-content">
        <a class="local-list-item-link ui-widget" href="">
            <div class="img_local_wrap_ext">
            <div class="img_local_wrap_int">
              <?php echo image_tag('logo_test.png', 'size=60x60'); ?>
            </div>
            </div>
            <div class="result_txtbloq">
              <div class="resultado_item_txt">
              <div class="ui-widget-header"><?php echo $row->getNombreLocal();?></div>
              <p class=""><?php echo html_entity_decode($row->getDescripcionLocal());?></p>
              </div>
            </div>
        </a>
    </li>&nbsp;
        
    <?php endforeach; ?>
    &nbsp;
    </ul>

    <div class="ui-pg">    
    <?php if ($pager->haveToPaginate()): ?>
    <?php echo link_to('«', 'buscador/search?'.$sf_data->getRaw('parameters').'page='.$pager->getFirstPage()) ?>
    <?php echo link_to('<', 'buscador/search?'.$sf_data->getRaw('parameters').'page='.$pager->getPreviousPage()) ?>
    <?php $links = $pager->getLinks();
    $page=0;
    foreach ($links as $page): ?>

    <?php echo ($page == $pager->getPage()) ? $page : link_to($page, 'buscador/search?'.$sf_data->getRaw('parameters').'page='.$page) ?>

    <?php if ($page != $pager->getCurrentMaxLink()): ?> –
    <?php else: ?>
    <?php echo link_to('>', 'buscador/search?'.$sf_data->getRaw('parameters').'page='.$pager->getNextPage()) ?>
    <?php echo link_to('»', 'buscador/search?'.$sf_data->getRaw('parameters').'page='.$pager->getLastPage()) ?>
    <?php endif ?>
    <?php endforeach ?>

    <?php echo $pager->getPage().' / '.$pager->getLastPage()?>
    <?php endif ?>
    </div>
        
    <div style="display:none" id="info">sss</div>

    </div>


</div>
<div class="searchResults grid_9" id="map_container">
    <div id="map_canvas">Cargando...</div>
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
var zonas_layer = new google.maps.KmlLayer("http://190.113.0.89/merobaronelauto.cl/www/app/GRIDRM600.kmz", {suppressInfoWindows: true,preserveViewport:true});
zonas_layer.setMap(GM);

});
//]]>
</script>