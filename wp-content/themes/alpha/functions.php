<?php

require_once get_theme_file_path('/inc/tgm.php');
// CMB 2 Meta Box
require_once get_theme_file_path('/inc/cmb2-mb.php');

if ( class_exists( 'Attachments' ) ) {
    require_once "lib/attachments.php";
}

// Cache Busting

if ( site_url() == "http://demo.lwhh.com" ) {
    define( "VERSION", time() );
} else {
    define( "VERSION", wp_get_theme()->get( "Version" ) );
}


function alpha_bootstrapping(){
    load_theme_textdomain("alpha");
    add_theme_support("post-thumbnails");
    add_theme_support("title-tag");
    add_theme_support("html5", array("searc-form") );
    add_theme_support("post-formats",array("image","quote","video","audio","link"));

    register_nav_menu("topmenu",__("Top Menu","alpha"));
    register_nav_menu("footermenu",__("Footer Menu","alpha"));

    add_image_size("alpha-square",400,400,true); // center center
    add_image_size("alpha-portrait",400,9999);
    add_image_size("alpha-landscape",9999,400);
    add_image_size("alpha-landscape-hard-cropped",600,400);

    add_theme_support("custom-background");

}
add_action("after_setup_theme","alpha_bootstrapping");


function alpha_assets(){
    wp_enqueue_style("bootstrap","//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css");
    wp_enqueue_style("dashicons");
    wp_enqueue_style( "tns-style","//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.7.1/tiny-slider.css" );
    wp_enqueue_style( "featherlight-css", "//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css" );
    wp_enqueue_style("alpha",get_stylesheet_uri(),null,time());

    wp_enqueue_script( "tns-js", "//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.7.1/min/tiny-slider.js", null, "0.0.1", true );

    wp_enqueue_script( "featherlight-js", "//cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js", array( "jquery" ), "0.0.1", true );

    wp_enqueue_script("alpha-main",get_theme_file_uri("/assets/js/main.js"),array("jquery","featherlight-js"),"0.0.1",true);

}
add_action("wp_enqueue_scripts","alpha_assets");


function alpha_sidebar(){
    register_sidebar(
        array(
            'name'          => __( 'Single Post Sidebar', 'alpha' ),
            'id'            => 'sidebar-1',
            'description'   => __( 'Right Sidebar', 'alpha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Left', 'alpha' ),
            'id'            => 'footer-left',
            'description'   => __( 'Widgetized Area On The Left Side', 'alpha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );


    register_sidebar(
        array(
            'name'          => __( 'Footer Right', 'alpha' ),
            'id'            => 'footer-right',
            'description'   => __( 'Widgetized Area On The Right Side', 'alpha' ),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '',
            'after_title'   => '',
        )
    );

}
add_action("widgets_init","alpha_sidebar");


function alpha_the_excerpt($excerptX){
    if(!post_password_required()){
        return $excerptX;
    }else{
        echo get_the_password_form();
    }

}
add_filter("the_excerpt","alpha_the_excerpt");

function alpha_protected_title_change(){
    return "%s";
}

add_filter("protected_title_format","alpha_protected_title_change");


function alpha_menu_item_class($classes , $item) {
    $classes[] = "list-inline-item";
    return $classes;
}
add_filter("nav_menu_css_class","alpha_menu_item_class", 10, 2);



function alpha_about_page_template_banner(){


    if(is_page()){
        $alpha_feat_image = get_the_post_thumbnail_url(null, "large");
        ?>
        <style>

            .page-header{
                background-image: url(<?php echo $alpha_feat_image;?>);
            }
        </style>

        <?php
    }

}

add_action("wp_head","alpha_about_page_template_banner",11);




function alpha_body_class($classes){
    unset($classes[array_search("custom-background", $classes)]);
    unset($classes[array_search("single-format-audio", $classes)]);
    $classes[] = "newclass";
    return $classes;
}
add_filter("body_class","alpha_body_class");

function alpha_post_class($classes){
    unset($classes[array_search("format-audio", $classes)]);
    return $classes;
}
add_filter("post_class","alpha_post_class");


// Search highlighting
function alpha_highlight_search_results($text){
    if(is_search()){
        $pattern = '/('. join('|', explode(' ', get_search_query())).')/i';
        $text = preg_replace($pattern, '<span class="search-highlight">\0</span>', $text);
    }
    return $text;
}
add_filter('the_content', 'alpha_highlight_search_results');
add_filter('the_excerpt', 'alpha_highlight_search_results');
add_filter('the_title', 'alpha_highlight_search_results');

function alpha_modify_main_query($wpq){
    if(is_home() && $wpq->is_main_query() ){
      //  $wpq->set("post__not_in",array(49));
        $wpq->set("tag__not_in",array(49));
    }
}
add_action("pre_get_posts","alpha_modify_main_query");

// Hiding ACD from dashboard
//add_filter('acf/settings/show_admin', '__return_false');