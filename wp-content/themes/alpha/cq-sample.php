<?php 
/*
* Template Name: Custom Query
*/
?>
<?php get_header();?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts text-center">
    
    <?php
    $paged = get_query_var("paged")?get_query_var("paged") : 1;
    $posts_per_page = 2;
    $total = 9;
    $post_ids = array(53);
    $_p = get_posts( array(
            'posts_per_page' => $posts_per_page,
            'post__in' => array(53),
            'orderby' => 'post__in',
            //'author__in' => array( 1 ),
           // 'numberposts' => $total,
           // 'order' => 'asc'
            'paged' => $paged


    ));
    foreach ( $_p as $post ) {
        setup_postdata($post);
        ?>
         <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php    
    }
    wp_reset_postdata();
    ?>

    <div class="container post-pagination">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-8">
                    <?php
                    echo paginate_links( array(
                        'total' => ceil( count( $post_ids ) / $posts_per_page )
                    ) );
                    ?>
                </div>
            </div>
    </div>

    
</div>
<?php get_footer();?>