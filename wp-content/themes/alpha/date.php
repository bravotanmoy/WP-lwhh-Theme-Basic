<?php get_header();?>
<body <?php body_class(); ?>>
<?php get_template_part("/template-parts/common/hero"); ?>
<div class="posts text-center">
    <h1>
        Posts In 
        <?php 
        if(is_month()){
            $month = get_query_var("monthnum");
            $dataobj = DateTime::createFromFormat("!m",$month);
            echo $dataobj->format("F");
        } else if(is_year()){
            echo esc_html(get_query_var("year"));
        }else if(is_day()){
            printf("%s/%s/%s/",get_query_var("day"),get_query_var("monthnum"),get_query_var("year"));
            
           // echo get_query_var("day"),"/".get_query_var("monthum")."/".get_query_var("year");
        }
        ?>
    </h1>
    <?php
    while ( have_posts() ) {
        the_post();
        ?>
         <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php    
    }

    ?>

    <div class="container post-pagination">
        <div class="row">
            <div class="col-md-4"> </div>
            <div class="col-md-8">
                <?php
                the_posts_pagination(array(
                    "screen_reader_text"=>' ',
                    "prev_text" => "New Posts",
                    "next_text" => "Old Posts"
                ));
                ?>
            </div>
        </div>
    </div>
</div>
<?php get_footer();?>
