				</div>
				</div>
				<footer>
				    <p><?php echo do_shortcode('[basic_copyright]'); ?></p>
				    <p>RSS feed in <a href="<?php echo esc_url(home_url()); ?>/feed/">XML</a> or <a href="<?php echo esc_url(home_url()); ?>/feed/json/">JSON</a></p>

				    <p><?php echo do_shortcode('[tinystats]'); ?></p>
				    <p><?php echo do_shortcode('[tinywebring]'); ?></p>
				    <p><?php echo do_shortcode('[tinyflags]'); ?></p>

				    <p><?php if (is_single() || is_page()) {
                            edit_post_link('Edit', '', '');
                        } ?></p>
				</footer>
				<?php wp_footer(); ?>
				</div>
				</body>

				</html>