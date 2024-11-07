		<h1 class="post-title"><?php the_title(); ?></h1>

		<div class="article-content">

			<p class="meta byline">
				<?php echo get_the_date('l, F jS, Y'); ?>
			</p>
			
			<?php
//  				if ( has_post_thumbnail() ) {
//  					the_post_thumbnail('post-image');
//  					$photo_credit = get_post_meta( $post->ID, 'photo_credit', true );
//  					$photo_credit_link = get_post_meta( $post->ID, 'photo_credit_link', true );
// 
//  					if (strlen($photo_credit_link) > 0) {
//  						echo '<p class="meta credit">Photo: <a href="' . $photo_credit_link .'">' . $photo_credit . '</a></p>';
//  					}
//  					else if (strlen($photo_credit) > 0) {
//  						echo '<p class="meta credit">Photo: '. $photo_credit . '</p>';
//  					}
//  				}
			?>

			<?php the_content(); ?>

			<?php wp_link_pages( array(
				'before'      => '<div class="nav-links">',
				'after'       => '</div>',
				'pagelink'    => '%',
				'separator'   => '',
			) ); ?>

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

	<?php if ( comments_open() || get_comments_number() ) :
		 comments_template('/comments.php', true);
	endif; ?>
