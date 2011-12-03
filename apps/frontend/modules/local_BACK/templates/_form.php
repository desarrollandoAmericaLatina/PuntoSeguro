<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('local/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id_local='.$form->getObject()->getIdLocal() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('local/index') ?>">Volver a la lista</a>
          <?php if (!$form->getObject()->isNew()): ?>
            <?php echo link_to('Borrar', 'local/delete?id_local='.$form->getObject()->getIdLocal(), array('method' => 'delete', 'confirm' => '¿Estás completamente seguro que tu deseas eliminar este local?')) ?>
          <?php endif; ?>
          <input type="submit" class="ui-button ui-widget ui-state-default ui-corner-all ui-state-hover" value="Guardar local" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['nombre_local']->renderLabel() ?></th>
        <td>
          <?php echo $form['nombre_local']->renderError() ?>
          <?php echo $form['nombre_local'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['descripcion_local']->renderLabel() ?></th>
        <td>
          <?php echo $form['descripcion_local']->renderError() ?>
          <?php echo $form['descripcion_local'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['direccion']->renderLabel() ?></th>
        <td>
          <?php echo $form['direccion']->renderError() ?>
          <?php echo $form['direccion'] ?>
          <button id="goto-position-button" class="ui-button ui-widget ui-state-default ui-corner-all ui-state-hover" style="padding: 5px !important">Posicionar</button>
        </td>
      </tr>
      
      <tr>
        <td valign="top" colspan="2">
          <div id="local_msg_pos_maker" class="ui-widget">
            <div style="margin-top: 20px; padding: 0pt 0.7em;" class="ui-state-highlight"> 
                    <p><span style="float: left; margin-right: 0.3em;" class="ui-icon ui-icon-info"></span>
                    <strong>Posición geográfica: </strong> Ajusta la posición  de tu local en el mapa arrastrando el ícono y soltándolo.  </p>
            </div>
	  </div>            
          <div id="mapa_error_posicion_container">
              <div id="mapa_error_posicion" class="ui-widget" >
                <div style="padding: 0 .7em;" class="ui-state-error"> 
                  <p><span style="float: left; margin-right: .3em;" class="ui-icon ui-icon-alert"></span> 
                  <strong>Porfavor:</strong> No se pudieron determinar las coordenadas exactas, porfavor verifica el campo dirección.</p>
                </div>
              </div>
          </div>
          <div id="map_canvas"></div>
        </td>
      </tr>
      
      <tr>
        <td>
          <?php echo $form['lat']->renderError() ?>
          <?php echo $form['lat'] ?>
        </td>
      </tr>
      <tr>
        <td>
          <?php echo $form['lng']->renderError() ?>
          <?php echo $form['lng'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
