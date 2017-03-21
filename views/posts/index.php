<?php
	foreach($posts["result"] as $post)
	{
		include("_post.php");
	}
?>
<?php if($page > 1) { ?>
<span class="navigator">
<a href="/<?php echo APP_ROOT;?>/posts/page/<?php echo $page - 1;?>">anterior</a>
</span>
<?php } ?>
<?php if($page < $total_pages) { ?>
<span class="navigator">
<a href="/<?php echo APP_ROOT;?>/posts/page/<?php echo $page + 1;?>">siguiente</a>
</span>
<?php } ?>