		<?php $link = esc_url( get_post_meta( $post->ID, 'bookmark_link', true )); ?>
		
		<h2 class="linked-post"><a href="<?php echo $link; ?>"><?php the_title(); ?></a>&nbsp;<a href="<?php the_permalink() ?>" class="linked-list" title="Local permalink."><i class="fa-solid fa-star"></i></a></h2>

		<div class="article-content">
			
			<?php
				if( $post->post_excerpt != '' ) {
					echo '<blockquote>';
					the_excerpt();
					echo '</blockquote>';
				}
			?>
			
			<?php the_content(); ?>

		</div>
