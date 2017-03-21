<?php
	include("_post.php");
?>
<?php if(logged_in()&& $post["user_id"] == current_user("id")) { ?>
<span class="post-link-edit">(<a href="/<?php echo APP_ROOT;?>/posts/<?php echo $post["id"];?>/edit">editar</a>)</span>&nbsp;
<span class="post-link-delete">(<a href="/<?php echo APP_ROOT;?>/posts/<?php echo $post["id"];?>/delete">eliminar</a>)</span>
<?php } ?>