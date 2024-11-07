<form method="get" id="searchform" action="<?php echo esc_url(home_url()); ?>/">
    <label for="search" class="offscreen">Search</label>
    <input type="text" value="<?php the_search_query(); ?>" name="s" id="search" placeholder="What are you looking for?" autofocus />
</form>