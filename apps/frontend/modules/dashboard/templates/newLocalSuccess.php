<?php slot('title') ?>
  <?php  echo sprintf('Registro local') ?>
<?php end_slot(); ?>







<form id="header_find_form" name="header_find_form" action="<?php echo url_for('buscador/search');?>" method="get">
    <div class="grid_6 push_3" style="background-color: pink">
        <div id="mastHead">
          <p class="clearfix" id="search_near">
            <label for="dropperText_Mast">Dirección</label>

            <input value="" size="14" id="field_direction" tabindex="2" name="field_direction" maxlength="64">
          </p>
          <span class="ybtn"><button class="btn-r-l" tabindex="3" value="submit" id="goto-position-button" ><span>Posicionar</span></button></span>

        </div>
    </div>
    <div class="clear"></div>

    <div class="grid_6 push_3">

    <div id="map_canvas" style="height:370px;width: 100%;background-color: red"></div>
    </div>


    <!-- Hidden Field-->
    <div style="display:none">
        <input type="text" value="<?php echo $lat;?>" id="lat" name="lat" />
        <input type="text" value="<?php echo $lng;?>" id="lng" name="lng" />
    </div>
</form>  

<script type="text/javascript">
//<![CDATA[    
$().ready(function() {
Local.initFormCreateNew();
});
//]]>
</script>