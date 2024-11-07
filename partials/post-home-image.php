		<h1 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
		
		<div class="article-content" style="margin-bottom:30px;">
		
		<p class="meta byline">
			<?php  echo get_the_date('l, F jS, Y'); ?>
		</p>
		
		<?php if ( has_post_thumbnail() ): ?>
			
			<?php the_post_thumbnail('photo-image'); ?>

		<?php endif; ?>
		
		<p><?php the_excerpt(); ?></p>
			
		</div>
