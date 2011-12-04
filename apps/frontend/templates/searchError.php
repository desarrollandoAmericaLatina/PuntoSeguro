<?php include_partial('buscadorSuperior',array('address' => $address, 'categories'=>$categories, 'filterCatArray'=>$filterCatArray)) ?>

<h3>Lo sentimos, ha ocurrido el siguiente error:</h3>

<div id="error_container" class="ui-widget">
  <div style="padding: 0 .7em;" class="ui-state-error"> 
    <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span> 
    <strong>Error:</strong> <?php echo $sf_data->getRaw('error_geocodificacion'); ?> </p>
  </div>
</div>

<p>
Porfavor reescriba la ubicación utilizando el patrón p.e: "Avendida Alemania, Temuco, Región de la Araucanía, Chile"
</p>