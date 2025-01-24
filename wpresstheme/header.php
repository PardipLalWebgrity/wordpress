
<?php

/**
 * Theme header template file
 * 
 * This is default header file which access by get_header() function
 * 
 * @package wpresstheme
 */

?>



<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php wp_body_open();?>

	<!-- Start Page -->
	<div id="page" class="page">

		<header class="site-header">
			<?php get_template_part('template-parts/header/nav'); ?>
		</header>

		<!-- Start Page Content -->
		<div id="page-content" class="page-content">

	 