<?php
/**The template for displaying the header
 * Displays all of the head element and everything up until the "site-content" div.
 * @package WordPress
 * @subpackage IP_Site
 * @since IP Site 1.0 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<div class="site-inner">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'ipsite' ); ?></a>
		<header id="masthead" class="site-header" role="banner">
			<div class="logo" align="right">
				<img src="http://internationalistperspective.org/img/logo.png">
			</div>
			<div class="site-header-main" align="right">
				<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<button id="menu-toggle" class="menu-toggle"><?php _e( 'Menu', 'ipsite' ); ?></button>
					<div id="site-header-menu" class="site-header-menu">
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'ipsite' ); ?>">
								<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'primary-menu', ) ); ?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->
		</header><!-- .site-header -->
		<div id="content" class="site-content">
