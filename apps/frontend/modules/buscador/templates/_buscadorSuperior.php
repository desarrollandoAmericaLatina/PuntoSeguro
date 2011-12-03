<?php $filterCatArray=$sf_data->getRaw('filterCatArray');?>

<div id="mastHead">
  <form id="header_find_form" name="header_find_form" action="<?php echo url_for('buscador/search');?>" method="get">    
  <div class="grid_9 push_3" style="background-color: #F5F5F5">
    
    
      <p class="clearfix" id="search_near">
        <label for="dropperText_Mast">Ciudad o dirección <em>(Ej.- Temuco)</em></label>
        <input value="<?php echo $address; ?>" size="14" id="find_loc" tabindex="2" name="find_loc" maxlength="64">
      </p>
      <span class="ybtn"><button class="btn-r-l" tabindex="3" value="submit" id="header-search-submit" type="submit"><span>Buscar</span></button></span>
      <br>
  </div>
  <div class="clear"></div>
  <div class="grid_9 push_3" style="background-color: #F5F5F5">

<div id="keywordSearchIn" class="searchFilters clearfix">
<ul class="checkbox-list clearfix">
<?php foreach( $categories as $category): ?>
<li class="clearfix">
<input id="filterIn<?php echo $category['id']; ?>" class="checkbox" type="checkbox" value="YES" name="filterIn<?php echo $category['id']; ?>" <?php if(in_array($category['id'], $filterCatArray))  echo 'checked';?>>
<label for="filterIn<?php echo $category['id']; ?>"><?php echo $category['name']; ?></label>
</li>
<?php endforeach; ?>
<input id="live_search" class="checkbox" type="checkbox" value="on" name="live_search">
<label for="live_search">Live Search</label>
</ul>
</div>

  </div>
  </form> 
</div>
<br>
<div class="clear"></div>

<script type="text/javascript">
//<![CDATA[
$().ready(function() {
GeoSearch.initAutoCompleteAddr($('#find_loc'),function(){});
});
//]]>
</script>