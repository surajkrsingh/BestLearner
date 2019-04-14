<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package bestlearner
 */

remove_action( 'wp_head', '_admin_bar_bump_cb' );
add_filter( 'show_admin_bar', '__return_false' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<title><?php bloginfo( 'name' ); ?></title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class='progress' id='progress'>
		<input type="hidden" id="progress-holder" value="0">
	</div>
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
					$hide_tagline = get_theme_mod( 'bestlearner_hide_tagline' );
					$desc_class   = $hide_tagline ? 'screen-reader-text' : false;

					if ( $description || is_customize_preview() ) :

						?>
					<h4 class="site-description <?php echo esc_attr( $desc_class ); ?> logo-slogan text text--uppercase"><?php echo esc_html( $description ); ?></p>
						<?php

					endif;
					?>
				</div>
				<form role="search" method="get" class="top-header__search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="text" placeholder="Serach from here.." name="s" class="top-header__search__box" />
					<button type="submit" class="top-header__search__button"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
				<div class="top-header__link">
					<a href="javascript:void(0);" id="menu-open" class="button button--border deactive"><i class="fa fa-bars"></i></a>
					<a href="<?php echo esc_url( get_site_url() ) . '/about-us/'; ?>" class="button button--green">About us</a>
					<a href="javascript:void(0);" class="button button--green open">Suggest an article</a>
					<?php
					if ( is_user_logged_in() ) :
						$current_user = wp_get_current_user(); //phpcs:ignore
						?>
						<a href="javascript:void(0);" class="user-profile" title="<?php echo esc_html( $current_user->display_name ); ?>">
							<?php
								printf( '<img src="%s" class="user-icon">', esc_url( get_avatar_url( $current_user->ID ) ) );
								printf( '<div class="user-name">%s</div>', esc_html( $current_user->display_name ) );
								wp_reset_postdata();
							?>
						</a>
					<?php endif ?>
				</div>
			</section>
			<section class="header__bottom-header">
				<nav id="site-navigation" class="bottom-header__nav" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'bestlearner' ); ?>">
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
