		<?php $link = esc_url( get_post_meta( $post->ID, 'bookmark_link', true )); ?>
		
		<h2 class="linked-post"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></h2>

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
