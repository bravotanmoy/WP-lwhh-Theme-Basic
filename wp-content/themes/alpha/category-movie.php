
<?php

    single_cat_title();
    $alpha_current_term = get_queried_object();
//    echo "<pre>";
//    print_r($alpha_current_term);
//    echo "</pre>";

    $alpha_term_thumbnail_id = get_field("thumbnail",$alpha_current_term);
    if($alpha_term_thumbnail_id){
        $file_thumb_details = wp_get_attachment_image_src($alpha_term_thumbnail_id);
        echo "<img src='" . esc_url( $file_thumb_details[0] ) . "'/>";
    }
