<div id="instafeed">
	<div class="grid-sizer"></div>
	<div class="gutter-sizer"></div>
	
	<?php if ( have_posts() ) :
		while ( have_posts() ) : the_post(); ?>
	<div class="grid-item">
		<div class="grid-inner">
				<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				<?php } ?>
				<div class="card-content">
					<?php post_meta(); ?>
					<h3><?php the_title(); ?></h3>
					<p><?php custom_length_excerpt(20); ?></p>
					<p><a class="read-more-link" href="<?php the_permalink(); ?>">Full Article</a></p>
				</div>
		</div>
	</div>
	
	<?php endwhile; endif; ?>
</div>