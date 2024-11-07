<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>

<main>
    <div class="wrap">

        <article <?php post_class(); ?>>

            <h1 class="post-title">Search</h1>

            <div class="article-content">

                <?php get_search_form(); ?>

            </div>

        </article>

    </div>
</main>

<?php get_footer(); ?>