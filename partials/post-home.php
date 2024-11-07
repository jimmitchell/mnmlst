		<h1 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

		<div class="article-content">

			<p class="meta byline">
				<?php echo get_the_date('l, F jS, Y'); ?>
			</p>

			<?php the_excerpt(); ?>

		</div>
