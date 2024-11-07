<?php get_header(); ?>

<main>
    <div class="wrap">

        <article>
            <h2 class="page-title error-404">four-oh-four</h2>

            <div class="article-content">
                <p class="error-404">Sorry, friend&hellip; No such page exists on my site.<br />Try using this handy-dandy search form instead.</p>

                <?php get_search_form(); ?>
                
                <div id="wb404">
                     <script src="https://archive.org/web/wb404.js"></script>
                 </div>

            </div>
        </article>

    </div>
</main>

<?php get_footer(); ?>