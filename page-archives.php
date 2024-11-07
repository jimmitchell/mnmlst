<?php /* Template Name: Archives */ ?>
<?php get_header(); ?>

<main>

    <div class="header-wrap" id="p">
        <div class="entry-header">
            <div class="wrap">
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>

    <div class="wrap">

        <article>

            <h3>Posts by Year</h3>
            <div class="article-content">
                <?php
                $ref_month = '';
                $monthly = new WP_Query(array('posts_per_page' => -1, 'ignore_sticky_posts' => 1));
                if ($monthly->have_posts()) : while ($monthly->have_posts()) : $monthly->the_post();
                        if (get_the_date('Y') != $ref_month) {
                            if ($ref_month) echo "\n" . '</ul>';
                            echo "\n" . '<h5>' . get_the_date('Y') . '</h5>';
                            echo "\n" . '<ul>';
                            $ref_month = get_the_date('Y');
                        }
                        echo "\n" . '   <li><a href=' . get_permalink($post->ID) . '>' . get_the_title($post->ID) . '</a></li>';
                    endwhile;
                    echo "\n" . '</ul>';
                endif;
                ?>
            </div>
        </article>

    </div>
</main>

<?php get_footer(); ?>