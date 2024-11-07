<?php get_header(); ?>

<main>

    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

            <div class="wrap">
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <h1 class="post-title"><?php the_title(); ?></h1>

                    <div class="article-content">

                        <?php the_content(); ?>

                    </div>
                </article>

            <?php endwhile; ?>
        <?php else : ?>

            <article>

                <h2 class="page-title">Not Found</h2>
                <p>Sorry, but you are looking for something that isn't here.</p>

            </article>

        <?php endif; ?>

            </div>
</main>

<?php get_footer(); ?>