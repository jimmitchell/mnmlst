		<h1 class="post-title"><?php the_title(); ?></h1>
		
		<div class="article-content" style="margin-bottom:20px;">
			
			<p class="meta byline">
				<?php echo get_the_date('l, F jS, Y'); ?>
			</p>
		
		<?php if ( has_post_thumbnail() ): ?>
			
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
			
			<div class="overlay">
			<a href="<?php echo $image[0]; ?>" class="pseudover v3 single-photo" data-lightbox="image-<? echo $post->ID; ?>" data-title="<?php the_excerpt(); ?>" alt="image of <?php the_title(); ?>" title="Click to view larger">
				<?php the_post_thumbnail('photo-image'); ?>
			</a>
			</div>
			
		<?php endif; ?>
		
		<p><?php the_content(); ?></p>
			
		</div>
		
		<p class="meta tag">
		<?php
		
			echo do_shortcode('[tinykudos]');

			$categories = get_the_category();
			$separator = '';
			$output = '';
			if ( ! empty( $categories ) ) {
				foreach( $categories as $category ) {
					$output .= '<span><a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a></span>' . $separator;
				}
				echo trim( $output, $separator );
			}
				
			the_tags( '<span>', '', '</span>' );
			
		?>
		</p>
		
	</article>
