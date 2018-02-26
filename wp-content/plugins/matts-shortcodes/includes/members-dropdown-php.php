<h2>MEMBERS DIRECTORY</h2>

<div class="members-container">
	<div class="vert-line"></div>
	
	<?php $args = array('post_type' => 'Members', 'order' => 'ASC'); ?>
	<?php $loop = new WP_Query($args); ?>
	<?php if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post(); ?>
	
	<div class="member">
		<h1><?php the_title(); ?></h1>
		<div class="member-content">
			<?php 
			$logo = get_field('member_logo');
			
			if( !empty($logo) ): ?>
			
				<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="member-logo" />
				
			<?php endif; ?>
				
			<?php the_content(); 
			
			$link = get_field('member_link');
			
			if ( $link ): ?>
			<a class="et_pb_button" href="<?php echo $link; ?>" target="_blank">Visit Site</a>
			<?php endif; ?>
			
		</div>
		<div class="dot-button"><i class="fa fa-plus"></i></div>
		
		<?php 
		
		$images = get_field('member_photo_gallery');
		$size = 'full';
		
		if( $images ): ?>
		
		<div class="slider-container">
			<div class="slider">
				
				<?php foreach( $images as $image ): ?>
				<div>
					<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
				</div>
				<?php endforeach; ?>
				
			</div>
		</div>
		
		<?php endif; ?>
	</div>
	
	<?php endwhile; ?>
	<?php else: ?>
	<h2>No posts here!</h2>
	<?php endif; ?>
	<?php wp_reset_postdata(); ?>
	
</div>