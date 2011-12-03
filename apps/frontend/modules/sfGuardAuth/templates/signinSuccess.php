<div class="grid_4 push_4 formLogin">
<?php if ($form->hasErrors()): ?>
<div class="flash_error ui-widget">
    <div style="padding: 0pt 0.7em;" class="ui-state-error ui-corner-all">
            <p><span style="float: left; margin-right: 0.3em;" class="ui-icon ui-icon-alert"></span>
            <strong>Por favor, vuelve a introducir tu contraseña:</strong> El nombre de usuario o contraseña no son válidos. Por favor, asegúrate de que el bloqueo de mayúsculas no está activado e inténtalo de nuevo.</p>
    </div>
</div>
<?php endif; ?>

    
    
<div class="ui-widget ui-widget-content" style="font-size: 1em;">
<div class="ui-widget-header"> Entrar en el Sistema </div><br>
  <form action="<?php echo url_for('@sf_guard_signin') ?>"  method="post" >
    <div style="margin-left: 10px">
            <label for="signin_username" class="form-lbl" style="margin-bottom:0em;">Usuario <em class="form-req">*</em></label>
            <div class="form-txt"><?php echo $form['username'] ?></div>
    </div>
     <div class="field-clear" style="margin-left: 10px">
            <label for="signin_password" class="form-lbl" style="margin-bottom:0em;">Clave <em class="form-req">*</em></label>
           <div class="form-txt"><?php echo $form['password'] ?></div>

    </div>
    <br>
    <div class="field-clear" style="margin-left: 10px;text-align: center">
        <input type="submit" value="Iniciar Sesión" class="ui-button ui-widget ui-state-default ui-corner-all ui-state-hover"></input>
        <?php echo $form['_csrf_token'] ?>
    </div>
  </form>
  <br>
  <div class="field-clear" style="text-align: center;">
      <a href="<?php echo url_for('@sf_guard_password'); ?>"><?php echo ('¿Has olvidado tu contraseña?') ?></a>
  </div>

</div>    
</div>


