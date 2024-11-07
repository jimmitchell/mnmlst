		<h1 class="post-title"><?php the_title(); ?></h1>
		
		<div class="article-content" style="margin-bottom:30px;">
	
			<p class="meta byline" style="margin-bottom:30px;">
				<?php echo get_the_date('l, F jS, Y'); ?>
			</p>
			
			<?php the_content(); ?>
			
			<p><?php the_excerpt(); ?></p>
			
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