<?php 
/**
 * The main template file
 *
 * This is the most generic template file in the WordPress theme
 * and one of the two required files for a theme (the other being style.css)
 * It is used to display a page when nothing more specific matches a query
 */

get_header(); ?>

<div class="container">
	<div class="row">
		<div class="sub-header col-md-12">
			<div class="row">
				<div class="col-xl-7 text-left col-lg-12">
					<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
				</div>
				<div class="col-xl-5 text-right col-lg-12">
					
					<?php get_search_form(); ?>

				</div>
			</div>
		</div><!-- end .sub-header -->
	</div><!-- end .row --> 

	<?php if( have_posts() ) : ?>

	<div class="row">
		<div class="main-content col-md-12">
			<div class="row no-gutters">

	<?php 
		// Star the loop 
		while( have_posts() ) : the_post();

			get_template_part( 'template-parts/content');

		endwhile;


		else : get_template_part('template-parts/content', 'none');

		endif;
	?>
				</div><!-- end .row .no-gutters -->
			
		</div><!-- end .main-content -->
	</div><!-- end .row  -->

	<div class="row">
		<div class="page-ctrl col-md-12">
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

<?php  get_footer(); ?>