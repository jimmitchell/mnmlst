<?php get_header(); ?>

<main>

    <div class="wrap">

        <?php if (have_posts()) : ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                <h1 class="page-title">
                    <?php if (is_day()) : ?>
                        <?php printf(__('%s', 'mnmlst'), '' . get_the_date() . ''); ?>
                    <?php elseif (is_month()) : ?>
                        <?php printf(__('%s', 'mnmlst'), '' . get_the_date(_x('F Y', 'F = Month, Y = Year', 'mnmlst'))); ?>
                    <?php elseif (is_year()) : ?>
                        <?php printf(__('%s', 'mnmlst'), '' . get_the_date(_x('Y', 'Y = Year', 'mnmlst'))); ?>
                    <?php elseif (is_category()) : ?>
                        <?php printf(__('%s', 'mnmlst'), '' . single_cat_title('', false) . ''); ?>
                    <?php elseif (is_tag()) : ?>
                        <?php printf(__('%s', 'mnmlst'), '' . single_tag_title('', false) . ''); ?>
                    <?php elseif (is_author()) : ?>
                        <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
                        <?php printf(__('Published by %s', 'mnmlst'), $curauth->display_name); ?>
                    <?php else : ?>
                        <?php _e('Archive', 'mnmlst'); ?>
                    <?php endif; ?>
                </h1>

                <?php
                global $wp_query;
                query_posts(array_merge(
                    $wp_query->query,
                    array('posts_per_page' => -1)
                ));
                ?>

                <div class="article-content">
                    <ul class="styled-list">
                        <?php while (have_posts()) : the_post();
                            $title = get_the_title();
                            if ($title == NULL || $title == '') {
                                $title = '<b>Musing:</b> ' . get_the_date('l, F jS, Y g:ia');
                            } else {
                                $title = get_the_title();
                            }
                            $categories = get_the_category(); ?>
                            <li><a href="<?php the_permalink() ?>" rel="bookmark" class="<?php echo esc_html($categories[0]->slug); ?>"><?php echo $title; ?></a></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </article>

        <?php else : ?>

            <article>
                <h1 class="page-title">Um, yeah&hellip;</h1>
                <p>That didn't quite work out the way I expected it would&hellip;</p>
            </article>

        <?php endif; ?>

    </div>
</main>

<?php get_footer(); ?>