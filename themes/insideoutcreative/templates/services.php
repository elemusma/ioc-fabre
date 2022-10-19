<?php

/**
 * Template Name: Services
 */
get_header();

echo '<section class="pt-5 pb-5 position-relative bg-accent-secondary">';
echo '<div class="container">';
echo '<div class="row">';

$relationship = get_field('relationship');
if( $relationship ):
foreach( $relationship as $post ): 
// Setup this post for WP functions (variable must be named $post).
setup_postdata($post);
echo '<a href="' . get_the_permalink() . '" class="col-md-6 img-hover">';
echo '<div class="position-relative overflow-h">';

the_post_thumbnail('large', array('class'=>'w-100 h-100 position-absolute','style'=>'top:0;left:0;object-fit:cover;'));
echo '<div class="position-relative" style="padding:100px 0;">';
echo '<h2 class="text-center text-white text-shadow">' . get_the_title() . '</h2>';
echo '</div>';
echo '<hr class="mt-2">';
echo '</div>';
echo '</a>';
endforeach;
    // Reset the global post object so that the rest of the page works correctly.
    wp_reset_postdata(); 
endif; 

echo '</div>';
echo '</div>';
echo '</section>';

get_footer();
?>