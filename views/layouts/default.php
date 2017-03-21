<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Layout por defecto</title>
<script type="text/javascript" src="/<?php echo APP_ROOT;?>/public/js/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
    mode : "textareas",
    theme : "advanced",
    theme_advanced_buttons1 : "bold,italic,underline,separator,strikethrough,justifyleft,justifycenter,justifyright, justifyfull,bullist,numlist,undo,redo,link,unlink, image, media",
    theme_advanced_buttons2 : "",
    theme_advanced_buttons3 : "",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
	forced_root_block : "",
    plugins : 'inlinepopups,media',
	content_css: "/<?php echo APP_ROOT;?>/public/stylesheets/application.css"
    
});
</script>
<link href="/<?php echo APP_ROOT;?>/public/stylesheets/application.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="main">
<img class="header-image" src="/<?php echo APP_ROOT;?>/public/imagenes/kiss.jpg" />
	<?php if(logged_in()) {?>
    <div class="logged-in">
        hola, <strong><?php echo current_user("username");?></strong>
        <span class="link-login">(<a href="/<?php echo APP_ROOT;?>/posts/new">Nueva entrada</a>)</span>
        |
        <span class="link-login">(<a href="/<?php echo APP_ROOT;?>/sessions/delete">desconectar</a>)</span>
    </div>
	<?php } else { ?>
    <div class="link-login">(<a href="/<?php echo APP_ROOT;?>/sessions/new">iniciar sesion</a>)</div>
	<?php } ?>
    <?php if(!empty($_SESSION["msg"]["success"])){ ?>
        <span class="msg-success">
            <?php echo $_SESSION["msg"]["success"]; ?>
        </span>
    <?php } ?>
    <?php if(!empty($_SESSION["msg"]["warnings"])){ ?>
        <span class="msg-success">
            <?php echo $_SESSION["msg"]["warnings"]; ?>
        </span>
    <?php } ?>
    <?php
    include(VIEWS_PATH.$route["controller"].DS.$route["view"].".php");
    ?>
</div>
</body>
</html>