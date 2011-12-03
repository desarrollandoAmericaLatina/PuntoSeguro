<h1>Tus locales registrados</h1>

<table>
  <thead>
    <tr>
      <th>Id local</th>
      <th>Nombre local</th>
      <th>Direccion</th>
      <th>Coordenadas</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($locals as $local): ?>
    <tr>
      <td><a href="<?php echo url_for('local/edit?id_local='.$local->getIdLocal()) ?>"><?php echo $local->getIdLocal() ?></a></td>
      <td><?php echo $local->getNombreLocal() ?></td>
      <td><?php echo $local->getDireccion() ?></td>
      <td>(<?php echo round($local->getLat() * 100) / 100; ?>, <?php echo round($local->getLng() * 100) / 100; ?>)</td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo 'AAA'.$local->countActiveLocals().'BB';?>
      <?php if (($count = $local->countActiveLocals()) - 3 > 0): ?>
        <div class="more_jobs">
          and <?php echo link_to($count, 'category', $category) ?>
          more...
        </div>
      <?php endif; ?>


  <a href="<?php echo url_for('local/new') ?>">Agregar nuevo</a>
