<?php get_header(); ?>

<main>
    <?php if (have_posts()) : while (have_posts()) : the_post();
            $post = get_post(); ?>

            <div class="wrap">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php

                    $format = get_post_format() ?: 'standard';

                    if ($format == 'gallery') {
                        get_template_part('partials/post', $format);
                    } elseif ($format == 'image') {
                        get_template_part('partials/post', $format);
                    } elseif ($format == 'link') {
                        get_template_part('partials/post', $format);
                    } elseif ($format == 'status') {
                        get_template_part('partials/post', $format);
                    } else {
                        get_template_part('partials/post', 'standard');
                    }

                    ?>

                    <div class="single-pagination">
                        <div class="prev-link">
                            <?php
                                if( $format == 'status' ){
                                    previous_post_link('<p style="margin-top:-2px;">%link</p>', '&larr; Older', TRUE);
                                } else {
                                    previous_post_link('<h5>Older</h5><p>%link</p>', '%title', TRUE);
                                }
                            ?>
                        </div>
                        <div class="next-link">
                            <?php
                                if( $format == 'status' ){
                                    next_post_link('<p style="margin-top:-2px;">%link</p>', 'Newer &rarr;', TRUE);
                                }
                                else {
                                    next_post_link('<h5>Newer</h5><p>%link</p>', '%title ', TRUE);
                                }
                            ?>
                        </div>
                    </div>

            </div>

        <?php endwhile; ?>
    <?php else : ?>

        <div class="wrap">

            <article>
                <h2 class="page-title">Um, Yeah&hellip;</h2>
                <p>That didn't quite work out the way it was supposed to.</p>
            </article>

        </div>

    <?php endif; ?>
</main>

<?php get_footer(); ?>