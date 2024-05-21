<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Orchard
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			var imagea = "<?php echo get_template_directory_uri() . '/images/imagea.png'; ?>";
			var imageb = "<?php echo get_template_directory_uri() . '/images/imageb.png'; ?>";
			var menu_config = {
				'#menu-item-8952': imagea,
				'#menu-item-8953': imageb
			}
			var text_config = {
				'root a': imagea,
				'root b': imageb
			}
			var mode = 'text'; // If you want to compare based on text, change value to "text"

			$('ul.nav-menu li.menu-item-has-children a').on('click', function () {
				event.preventDefault();
				var id = '#' + $(this).parents('.menu-item-has-children').attr('id');
				var text = $(this).parents('.menu-item-has-children').text().toLowerCase();
				
				if (mode == 'menu' && (typeof menu_config[id] != 'undefined')) {
					$('#banner').css('background-image', 'url(\'' + menu_config[id] + '\')');
				}

				if (mode == 'text') {
					for (var i in text_config) {
						if (text.indexOf(i) >= 0) {
							$('#banner').css('background-image', 'url(\'' + text_config[i] + '\')');
						}
					}
				}

			});
		});
	</script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'orchard' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$orchard_description = get_bloginfo( 'description', 'display' );
			if ( $orchard_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $orchard_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'orchard' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div id="banner"></div>
