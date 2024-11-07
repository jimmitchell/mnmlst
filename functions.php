<?php

define( 'THEME_VERSION', '1.0.0' );

//* Set the content width
if ( !isset( $content_width ) ) $content_width = 800;


//* Register Theme Features
function mnmlst_theme_features()
{
    // Add theme support for Featured Images
    if ( function_exists( 'add_theme_support' ) )
    {
        add_theme_support( 'post-thumbnails' );
        add_image_size( 'post-image', 800, 400, true, array( 'center', 'center' ) );
        add_image_size( 'photo-image', 700, 525, true, array( 'center', 'center' ) );
    }

    // Add theme support for Automatic Feed Links
    add_theme_support( 'automatic-feed-links' );

    // Add theme support for HTML5 Semantic Markup
    add_theme_support( 'html5', array( 'search-form', 'comment-form' ) );

    // Add theme support for document Title tag
    add_theme_support( 'title-tag' );

    // Add post formats
    //add_theme_support( 'post-formats', array( 'image', 'gallery', 'link', 'status' ) );
}
add_action( 'after_setup_theme', 'mnmlst_theme_features' );


//* Register main menu
if ( !function_exists( 'mnmlst_register_menus' ) )
{
    function mnmlst_register_menus()
    {
        register_nav_menus( array( 
            'main-menu' => __( 'Main Menu', 'mnmlst' )
        ) );
    }
    add_action( 'after_setup_theme', 'mnmlst_register_menus' );
}


//* Dequeue scripts
function mnmlst_dequeue_devicepx()
{
    wp_dequeue_script( 'devicepx' );
}
add_action( 'wp_enqueue_scripts', 'mnmlst_dequeue_devicepx', 20 );

//* Remove the really stupid WordPress queued styles...
function mnmlst_remove_global_styles(){
    wp_dequeue_style( 'global-styles' );
    wp_dequeue_style( 'classic-theme-styles' );
    wp_dequeue_style( 'wp-block-library' );
}
add_action( 'wp_enqueue_scripts', 'mnmlst_remove_global_styles' );

//* Enqueue scripts and styles
function mnmlst_enqueue_scripts_styles()
{
    wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.css', array(), THEME_VERSION );
    wp_enqueue_style( 'gt-walsheim', get_stylesheet_directory_uri() . '/css/gt-walsheim.css', array(), THEME_VERSION );
    wp_enqueue_style( 'fontawesome-core', get_stylesheet_directory_uri() . '/css/fontawesome.min.css', array(), THEME_VERSION );
    wp_enqueue_style( 'fontawesome-solid', get_stylesheet_directory_uri() . '/css/solid.min.css', array(), THEME_VERSION );
    wp_enqueue_style( 'fontawesome-brands', get_stylesheet_directory_uri() . '/css/brands.min.css', array(), THEME_VERSION );
    wp_enqueue_style( 'light-box', get_stylesheet_directory_uri() . '/css/lightbox.min.css', array(), THEME_VERSION );
    wp_enqueue_style( 'style-mnmlst', get_stylesheet_uri(), array(), THEME_VERSION );
    wp_enqueue_script( 'header-menu', get_stylesheet_directory_uri() . '/js/menu.min.js', array( 'jquery' ), THEME_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );
    wp_enqueue_script( 'lightbox', get_stylesheet_directory_uri() . '/js/lightbox.min.js', array( 'jquery' ), THEME_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );
}
add_action( 'wp_enqueue_scripts', 'mnmlst_enqueue_scripts_styles' );


//* Enqueue comment-reply
function mnmlst_enqueue_thread_comments()
{
    if ( ( !is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) )
    {
        wp_enqueue_script( 'comment-reply' );   
    }
}
add_action( 'wp_print_scripts', 'mnmlst_enqueue_thread_comments' );


//* Enqueue custom image template
function mnmlst_load_single_template( $template )
{
    $new_template = '';
    if ( is_single() )
    {
        global $post;
        if ( has_post_format( 'image' ) )
        {
            $new_template = locate_template( array( 'single-image.php' ) );
        }
    }
    return ( '' != $new_template ) ? $new_template : $template;
}
add_action( 'template_include', 'mnmlst_load_single_template' );


//* Replaces the excerpt "more" text by a link
function mnmlst_excerpt_more( $more )
{
    global $post;
    return '<p><a href="' . get_permalink( $post->ID ) . '">Read more &rarr;</a></p>';
}
add_filter( 'excerpt_more', 'mnmlst_excerpt_more' );


//* change search results query size to return all results
function mnmlst_change_wp_search_size( $query )
{
    if ( $query->is_search ) {
        $query->query_vars['posts_per_page'] = 25;
    }
    return $query;
}
add_filter( 'pre_get_posts', 'mnmlst_change_wp_search_size' );


//* Make comment form title dynamic
function mnmlst_custom_comment_title( $defaults )
{
    $defaults['title_reply'] = 'Start the Conversation';
    if( get_comments_number() > 0) {
        $defaults['title_reply'] = 'Join the Conversation';
    }
    return $defaults;
}
add_filter('comment_form_defaults', 'mnmlst_custom_comment_title', 20);



//* Remove the URL field from comment form
// function mnmlst_unset_url_field( $fields )
// {
//     if ( isset( $fields['url'] ) )
//         unset( $fields['url'] );
//     return $fields;
// }
// add_filter( 'comment_form_default_fields', 'mnmlst_unset_url_field' );


//* Always post to Mastodon
// add_filter( 'share_on_mastodon_enabled', '__return_true' );
// add_filter( 'share_on_mastodon_enabled', function ( $is_enabled, $post_id )
// {    
//     $is_enabled = false;
//     if ( has_category( 'posts', $post_id ) || has_category( 'musings', $post_id ) || has_category( 'photos' ) || has_category( 'links' ) )
//     {
//         $is_enabled = true;   
//     }
//     return $is_enabled; 
// }, 5, 2 );

// add_filter( 'share_on_mastodon_featured_image', function(  $enabled, $post )
// {    
//     if (  has_category(  'posts', $post ) )
//     {
//         return false;
//     }
//     return $enabled;
// }, 7, 2 );

// add_filter( 'share_on_mastodon_status', function ( $status, $post )
// {
//     if ( has_category( 'posts', $post ) )
//     {
//         $status = wp_strip_all_tags( html_entity_decode( get_the_title( $post ) ) );
//         $status .= "\n\n" . esc_url( get_permalink( $post ) );
//     }
// 	elseif ( has_category( 'musings', $post ) ) 
//     {
//         $status = wp_strip_all_tags( html_entity_decode( $post->post_content ) );   
//     }
//     elseif ( has_category( 'photos', $post ) )
//     {
//         $status = wp_strip_all_tags( html_entity_decode( $post->post_content ) );
//         $status .= "\n\n" . esc_url( get_permalink( $post ) );
//     }
//     elseif ( has_category( 'links', $post ) )
//     {
//        $link = esc_url(  get_post_meta(  $post->ID, 'bookmark_link', true ) );
//        $status = wp_strip_all_tags( html_entity_decode( get_the_title( $post ) ) );
//        $status .= ": " . wp_strip_all_tags( html_entity_decode(  $post->post_content ) );
//        $status .= "\n\n" . $link;
//     }  
//     $tags = get_the_tags(  $post->ID );
// 	if (  $tags && $status )
//     {
// 		$status .= "\n\n";
// 		foreach (  $tags as $tag ) {
// 			$status .= '#' . preg_replace( '/\s/', '', strtolower(  $tag->name ) ) . ' ';
// 		}
// 		$status = trim(  $status );
// 	}
//     return $status;
// }, 10, 2 );


//* Display a custom Gravatar
function mnmlst_avatar( $avatar_defaults )
{
    $custom_avatar = get_bloginfo( 'template_url' ) . '/img/gravatar.webp';
    $avatar_defaults[$custom_avatar] = "mnmlst Avatar";
    return $avatar_defaults;
}
add_filter( 'avatar_defaults', 'mnmlst_avatar' );


//* Get post images for Photo page
// function mnmlst_image_display( $size = 'medium' )
// {
//     if ( has_post_thumbnail() )
//     {
//         $image_id = get_post_thumbnail_id();
//         $image_url = wp_get_attachment_image_src( $image_id, $size );
//         $image_url = $image_url[0];
//     }
//     else
//     {
//         global $post, $posts;
//         $image_url = '';
//         ob_start();
//         ob_end_clean();
//         $output = preg_match_all( '/<img.+src=[\'"]( [^\'"]+ )[\'"].*>/i', $post->post_content, $matches );
//         $image_url = $matches[1][0];

//         //Defines a default image
//         if ( empty( $image_url ) )
//         {
//             $image_url = get_bloginfo( 'template_url' ) . "/img/default.jpg";
//         }
//     }
//     return $image_url;
// }


//* Customize the feed output for RSS
// function mnmlst_rss_feed_output($content)
// {
//     global $post;
//     //$content = apply_filters('the_content', $content);
//     if( is_feed() )
//     {
//         if ( has_term( array( 'photos' ), 'category' ) )
//         {
//             if( has_post_thumbnail( $post->ID ) ) {
//                 $content = '<p>' . '<img src="' . wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'photo-image' )[0] . '" /></p>';
//             }
//             $content .= the_content( $post->ID );
//         }
//         else if ( has_term( array( 'links' ), 'category' ) )
//         {
//             $content = '<blockquote>' . get_the_excerpt( $post->ID ) . '</blockquote>';
//             $content .= the_content( $post->ID );
//         }
//         if ( has_term( array( 'posts' ), 'category' ) )
//         {
//             $content = the_content( $post->ID );
//             $content .= '<hr/><p>Thanks for reading via RSS.<br/>';
//             $content .= '<a href="mailto:hello@jimmitchell.org">Email me</a> | <a href="https://buy.stripe.com/4gweYz1E72zI40M4gi">Support my work for $1 a month</a></p>';
//         }
//     }
//     return $content;
// }
// add_filter('the_excerpt_rss', 'mnmlst_rss_feed_output');
// add_filter('the_content_feed', 'mnmlst_rss_feed_output');
