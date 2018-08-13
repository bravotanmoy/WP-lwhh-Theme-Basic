<?php 
/*
* Template Name: Custom Query WPQuery
*/
?>
<?php get_header();?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts text-center">
    
    <?php
    $paged = get_query_var("paged")?get_query_var("paged") : 1;
    $posts_per_page = 3;
    $total = 9;
    $post_ids = array(53);
    $_p = new WP_Query( array(
           /* 'category_name'     => 'default',
            'tag'               => 'special',*/

        /**
         * Relationship and Join
         */
        /* 'posts_per_page'    => $posts_per_page,
         'paged'             => $paged,
         'tax_query'         => array(
                 'relation' => 'OR',
                 array(
                         'taxonomy' => 'category',
                         'field'    => 'slug',
                         'terms'    =>array('new-ctgry')
                 ),
                 array(
                     'taxonomy' => 'post_tag',
                     'field'    => 'slug',
                     'terms'    =>array('special-tag')
                 )
         )*/

           /**
            * Date and Post Status
            */
           /*'monthnum' => 5,
            'year' => 2018,
            'post_status' => 'publish'*/

           /**
            * Post Format */

           /*'posts_per_page' => $posts_per_page,
           'paged'          => $paged,
           'tax_query'      => array(
                   'relation' => 'OR',
               array(
                       'taxonomy' => 'post_format',
                       'field'    => 'slug',
                       'terms'    =>array(
                               'post-format-audio',
                               'post-format-video'
                       ),
                       'operator' => "NOT IN"
               ),
           )*/

            /**
             *  Meta Value Search
             */
            /*'posts_per_page' => $posts_per_page,
            'paged'          => $paged,
            'meta_value'     => '1',*/

            /**
             * Featured Post / Meta box
             */
            /*'posts_per_page' => $posts_per_page,
            'paged'          => $paged,
            'meta_key'       => 'featured',
            'meta_value'     => '1', */

            /**
             * Multiple Meta Box Key Value
             */
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged,
            'meta_query'     => array(
                    'relation' => 'AND',
                array(
                        'key'     => 'featured',
                        'value'   => '1',
                        'compare' => '='
                ),
                array(
                        'key'     => 'homepage',
                    'value'       => '1',
                        'compare' => '='
                )
            )

    ));
    while ( $_p->have_posts() ) {
        $_p->the_post();
        ?>
         <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php    
    }

    wp_reset_query();
    ?>

    <div class="container post-pagination">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        echo paginate_links( array(
                            'total'     => $_p->max_num_comment_pages,
                            'current'   => $paged,
                            'prev_next' => false,
                            ));
                    ?>
                </div>
            </div>
    </div>

    
</div>
<?php get_footer();?>
