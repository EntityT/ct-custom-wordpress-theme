<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CT_Custom
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
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct-custom' ); ?></a>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <span class="call-now">
                <span class="call-us">CALL US NOW!</span> &nbsp; <?php echo esc_html( get_theme_mod( 'mytheme_phone_number', 'No phone number set' ) ); ?>
            </span>
            <div class="auth-links">
                <a href="#">Login</a>
                <a href="#">Signup</a>
            </div>
        </div>
    </div>
	<header id="masthead" class="site-header container">
		<div class="site-branding">
			<?php
			the_custom_logo(); ?>
		</div>

		<nav id="site-navigation" class="main-navigation">
			<!-- Menu Toggle Button for Mobile -->
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="menu-icon">&#9776;</span>
				<span class="close-icon">&times;</span>
			</button>
			
			<!-- Main Navigation -->
			<?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
		</nav>
	</header>

	<div id="content" class="site-content">
