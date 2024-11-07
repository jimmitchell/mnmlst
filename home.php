<?php get_header(); ?>

<main>
	<div class="wrap">
		<?php
				
			$args = array(
				'post_type' => 'post',
				'post_status' => array('publish'),
				'category_name' => 'musings,posts,photos,links',
				'paged' => get_query_var( 'paged' ),
			);

			$query = new WP_Query( $args );
	
			if ( have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

				if( has_category( 'posts' ) ) { ?>
				<article class="home-article">
					<?php get_template_part( 'partials/post', 'home' ); ?>
				<?php }
				elseif( has_category( 'musings' ) ) { ?>
				<article class="home-status">
					<?php get_template_part( 'partials/post', 'home-status' );
				}
				elseif( has_category( 'photos' ) ) { ?>
				<article class="home-image">
					<?php get_template_part( 'partials/post', 'home-image' );
				}
				elseif( has_category( 'links' ) ) { ?>
				<article class="home-link">
					<?php get_template_part( 'partials/post', 'home-link' );
				}  ?>
				</article>
				
				<hr class="post-separator">
				
				<?php endwhile; ?>
			
				<?php the_posts_pagination( array(
					'mid_size' => 1,
					'prev_text' => __( '&larr;', 'nominal' ),
					'next_text' => __( '&rarr;', 'nominal' ),
					'total' => $query->max_num_pages,
				)); ?>

			<?php else : ?>

			<article>
				<h2 class="page-title">Um, yeah&hellip;</h2>
				<p>That didn't quite work out the way I thought it would&hellip;</p>
				<?php get_search_form(); ?>
			</article>
				
		<?php endif; ?>
		
		<?php wp_reset_postdata(); ?>
		
    </div>
</main>

<?php get_footer(); ?>