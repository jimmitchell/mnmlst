<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="site-container">
        
        <header class="header">

            <nav class="site-nav">

                <p class="site-title">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <img id="avatar" class="u-photo" src="<?php echo get_stylesheet_directory_uri() . '/img/avatar.jpeg'; ?>" width="36" height="36" />
                        <?php bloginfo('name'); ?>
                    </a>
                </p>

                <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_id' => 'main-menu', 'menu_class' => 'nav-menu', 'container' => '' ) ); ?>
                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>

            </nav>

        </header>

        <div id="content">
            <div class="container" role="document">