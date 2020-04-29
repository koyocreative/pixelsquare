<article id="post-<?php the_ID(); ?>" class="freebie col-md-3">
	<div class="freebie-overlay">
		<a href="<?php esc_url(get_permalink()) ?>">
		<?php the_title( '<h3><a href="'.esc_url(get_permalink()).'">', '</a></h3>' ); ?>
		</a>

		<div class="freebie-overlay-meta">
			<!-- <a class="meta-download"><i class="fas fa-eye"></i> 36</a> -->
			<a class="meta-author"><i class="fas fa-user-circle"></i> <?php the_author(); ?></a>
		</div>
	</div>

	<div class="freebie-bg">
		<?php the_post_thumbnail('px_thumb'); ?>
	</div>
</article><!-- end .article .freebie -->