
    <div>
        <input type="text" name="post[title]" value= "<?php echo isset($post)? $post["title"]:""; ?>" />
        <?php 
			if(isset($errors))
			{
				echo error_msg($errors["title"],"La cantidad de caracteres del titulo es de 1 a 100");
			}
		?>        
    </div>
    <div>
        <textarea name="post[body]" cols="80" rows="15"><?php echo isset($post)? $post["body"]:""; ?></textarea>
         <?php 
			if(isset($errors))
			{
				echo error_msg($errors["body"],"La cantidad de caracteres del Contenido es de 1 a 3000");
			}
		?>
    </div>
    <input type="hidden" name="post[user_id]" value="<?php echo current_user("id");?>" />
    <input type="submit" value="Guardar" />
