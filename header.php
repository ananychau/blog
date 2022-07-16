<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dhor
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'dhor' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="container">
			<div class="site-header-inner">
				<div id="sim" class="site-identity-mobile">
					<div class="site-branding">
						<?php if ( has_custom_logo() ) : ?>
							<div class="site-logo">
								<?php the_custom_logo(); ?>
							</div>
						<?php endif; ?>

						<div class="site-title-tagline">
							<?php
							$hide_site_title =  dhor_get_option( 'hide_site_title' );

							if( $hide_site_title === false ) {
								if ( is_front_page() && is_home() ) :
									?>
								<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
								<?php
								else :
									?>
									<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
									<?php
								endif;
							}

							$hide_tagline =  dhor_get_option( 'hide_tagline' );

							if( $hide_tagline === false ) {
								$dhor_description = get_bloginfo( 'description', 'display' );
								if ( $dhor_description || is_customize_preview() ) :
									?>
									<p class="site-description"><?php echo $dhor_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
								<?php endif;
							} ?>
						</div><!-- .site-title-tagline -->
					</div><!-- .site-branding -->

					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><span class="menu-bar"></span><span class="menu-bar"></span><span class="menu-bar"></span></button>
				</div>

				<div class="main-navigation-wrap">
					<nav id="site-navigation" class="main-navigation">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
								'fallback_cb'    => 'dhor_menu_fallback'
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div><!-- .main-navigation-wrap -->
			</div><!-- .site-header-inner -->
		</div><!-- .container -->
	</header><!-- #masthead -->

	<?php
	$enable_banner = dhor_get_option( 'enable_banner' );
	if( is_front_page() && is_home() && $enable_banner === true  ) {
		get_template_part( 'template-parts/content', 'banner' );
	}?>

	<?php
	$enable_breadcrumb = dhor_get_option( 'enable_breadcrumb' );

	if( !is_front_page() && !is_home() && !is_404() && ( $enable_breadcrumb === true  || is_archive() || is_search() ) ){
		get_template_part( 'template-parts/content', 'breadcrumb' );
	} ?>

	<div id="content" class="site-content">
		<div class="container">
			<div class="inner-wrapper">
