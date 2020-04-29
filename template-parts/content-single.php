<article id="post-<?php the_ID(); ?>" class="freebie-single col-md-12">
	
	<header class="entry-header">
		<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
		<div class="entry-sub">
			
			<div class="entry-posted">
				<?php  printf( 'Posted on <span class="entry-date"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span> <span class="byline"> by <span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
	                esc_url( get_permalink() ),
	                esc_attr( get_the_date( 'c' ) ),
	                esc_html( get_the_date() ),
	                esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
	                get_the_author()
		        ); ?>
			</div>
			
			<?php if( has_category() ) { ?>

				<div class="entry-categories">
					Categories: <?php the_category(' '); ?>
				</div><!-- end entry-categories -->

			<?php } ?>

		</div><!-- end .entry-sub -->
	</header><!-- end .entry-header -->

	<div class="entry-featured">
		<?php the_post_thumbnail('px_single'); ?>
	</div>

	<div class="entry-content">
		<?php the_content(); ?>
	</div>

	<a class="download-btn" target="_blank" href="<?php echo $meta = get_post_meta(get_the_ID(), 'download_metaboxu', true); ?>"><i class="fas fa-file-download"></i>  Download </a>


</article><!-- end .article .freebie -->