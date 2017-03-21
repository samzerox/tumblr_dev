<form action="/<?php echo APP_ROOT; ?>/sessions/create" method="post">
<fieldset>
<legend>Inicia sesion</legend>
  <div>
      <input type="text" name="user[username]" />      
  </div>
    <div>
      <input type="password" name="user[password]" />      
  </div>
  <input type="submit" value="Entrar" />
</fieldset>
</form>