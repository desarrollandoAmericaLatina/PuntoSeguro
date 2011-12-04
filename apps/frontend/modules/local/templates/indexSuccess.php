<h1>Tus Puntos Seguros registrados</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nombre Punto Seguro</th>
      <th>Categoría</th>      
      <th>Direccion</th>
      <th>Coordenadas</th>
      <th>F. Creación</th>
      <th>F. Actualización</th>      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($locals as $local): ?>
    <tr>
      <td><a href="<?php echo url_for('local/edit?id_local='.$local->getIdLocal()) ?>"><?php echo $local->getIdLocal() ?></a></td>
      <td><?php echo $local->getNombreLocal() ?></td>
      <td><?php echo $local->getCategoryId() ?></td>      
      <td><?php echo $local->getDireccion() ?></td>
      <td>(<?php echo round($local->getLat() * 100) / 100; ?>, <?php echo round($local->getLng() * 100) / 100; ?>)</td>
      <td><?php echo $local->getCreatedAt() ?></td>
      <td><?php echo $local->getUpdatedAt() ?></td>      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<div style="width: 100%; text-align: right">
  <a href="<?php echo url_for('local/new') ?>">Agregar nuevo</a>    
</div>


  