<?php
/**
 * Template for displaying the header
 *
 * Displays all of the head element and everything up unit the "site content"
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	
<div class="container-fluid">
	<div class="row">
		
		<header class="main-header col-md-12">

			<div class="row ">
				<div class="col-md-4"></div>

				<div class="logo col-md-4 col-sm-12" id="main-logo">
					<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
 							the_custom_logo();
					} else {
						?>
							<a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt=""></a>
						<?php
					} ?>
				</div><!-- end .logo #main-logo -->

			</div><!-- end .row -->

		</header><!-- end .main-header -->

		<div class="main-navigation col-md-12">
			<div class="row">
				<div class="primary-navigation col-md-12">
					<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
				</div>
			</div>
		</div><!-- end .main-naviation -->

	</div><!-- end .row -->
</div><!-- end .container-fluid -->