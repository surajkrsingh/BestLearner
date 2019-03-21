<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package lifestyle
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php get_template_part( 'template-parts/content', 'suggest-article' ); ?>
	<header class="header">
			<section class="header__top-header"> 
				<div class="logo-container column">
					<?php
					$title_class = false;
					if ( get_theme_mod( 'custom_logo' ) ) {
						the_custom_logo();

						// If showing logo, hide the blog name.
						$title_class = 'screen-reader-text';
					}

					if ( is_front_page() && is_home() ) :
						?>
					<h3 class="site-title logo line-break<?php echo esc_attr( $title_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h3>
						<?php

					else :

						?>
					<h2 class="site-title logo line-break<?php echo esc_attr( $title_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
						<?php
					endif;

					$description  = get_bloginfo( 'description', 'display' );
					$hide_tagline = get_theme_mod( 'lifestyle_hide_tagline' );
					$desc_class   = $hide_tagline ? 'screen-reader-text' : false;

					if ( $description || is_customize_preview() ) :

						?>
					<h4 class="site-description <?php echo esc_attr( $desc_class ); ?> logo-slogan text text--uppercase"><?php echo esc_html( $description ); ?></p>
						<?php

					endif;
					?>
				</div>
				<div class="top-header__search">
					<input type="text" placeholder="Find from here.." name="header-search" class="top-header__search__box" />
					<button type="button" class="top-header__search__button"><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>

				<div class="top-header__link">
					<a href="javascript:void(0);" id="menu-open" class="button button--border deactive"><i class="fa fa-bars"></i></a>
					<a href="javascript:void(0);" class="button button--green open">Suggest an article</a>
					<a href="#" class="button button--green">About us</a>
				</div>
			</section>
			<section class="header__bottom-header">
				<nav id="site-navigation" class="bottom-header__nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'lifestyle' ); ?>">
					<?php
					require 'inc/classes/class-primary-menu.php';
					wp_nav_menu(
						array(
							'theme_location' => 'primary',
							'container'      => 'ul',
							'menu'           => 'primary',
							'menu_class'     => 'menu-list',
							'walker'         => new Primary_Menu(),
						)
					);
					?>
				</nav>	
			</section>
</header>
<main class="main">
