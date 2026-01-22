<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


<header>
<h1><?php bloginfo('name'); ?></h1>
<p><?php bloginfo('description'); ?></p>


<?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
</header>