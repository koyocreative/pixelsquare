<?php
/**
 * This is template for displaying single posts and pages
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

	<div class="row">
		<div class="main-content col-md-12">
			<div class="row no-gutters">

				<?php
					if( have_posts() ) {
						while( have_posts() ) {
							the_post();
							get_template_part('template-parts/content', 'single');
						}
					}
				?>

			</div><!-- end .row .no-gutters -->
			
		</div><!-- end .main-content -->
	</div><!-- end .row  -->

	<div class="row">
		<div class="page-ctrl col-md-12">
			<div class="row">
				<div class="page-nav-left col-md-6 col-xm-12">
					<?php previous_post_link('%link', '<i class="fas fa-arrow-alt-circle-left"></i> %title'); ?>
				</div>
				<div class="page-nav-right col-md-6 col-sm-12">
					<?php next_post_link('%link', '%title <i class="fas fa-arrow-alt-circle-right"></i>'); ?>
				</div>
			</div><!-- end .row -->
		</div><!-- end page-ctrl -->

	</div><!-- end .row -->
</div>

<?php  get_footer(); ?>