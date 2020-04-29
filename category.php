<?php 
/**
 * A Simple Category Template
 *
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="sub-header col-md-12">
			<div class="row">
				<div class="col-md-7 text-left">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
				</div>
				<div class="col-md-5 text-right">
					
					<?php get_search_form(); ?>

				</div>
			</div>
		</div><!-- end .sub-header -->
	</div><!-- end .row -->  

	<?php if( have_posts() ) : ?>

	<div class="row">
		<header class="col-md-12 page-header">
			<h1 class="page-title">
				<?php printf( __( 'Category for: %s', 'pixelsqare' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?>
			</h1>
		</header>

		<div class="main-content col-md-12">
			<div class="row no-gutters">

	<?php 
		// Star the loop 
		while( have_posts() ) : the_post();

			get_template_part( 'template-parts/content');

		endwhile;


		else : get_template_part('template-parts/no-result');

		endif;
	?>
			</div><!-- end .row .no-gutters -->
			
		</div><!-- end .main-content -->
	</div><!-- end .row  -->

	<div class="row no-gutters">
		<div class="page-ctrl col-md-12 ">
			<div class="row">
				<div class="page-nav-left col-md-6 text-left">
					<?php previous_posts_link('<i class="fas fa-arrow-alt-circle-left"></i> Prev'); ?>
				</div>
				<div class="page-nav-right col-md-6 text-right">
					<?php next_posts_link('Next <i class="fas fa-arrow-alt-circle-right"></i>'); ?>
				</div>
			</div><!-- end .row -->
		</div><!-- end page-ctrl -->

	</div><!-- end .row -->
</div><!-- end .container -->


<?php get_footer(); ?>