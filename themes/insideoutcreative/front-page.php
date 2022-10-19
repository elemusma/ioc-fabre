<?php get_header();


// start of intro
if(have_rows('intro_content')): while(have_rows('intro_content')): the_row();
$icons = get_sub_field('icons');
$pretitle = get_sub_field('pretitle');
$title = get_sub_field('title');
$content = get_sub_field('content');
$button = get_sub_field('button');
$button_url = $button['url'];
$button_title = $button['title'];
$button_target = $button['target'] ? $button['target'] : '_self';


echo '<section class="pb-5 position-relative bg-accent-secondary z-3" style="">';
echo '<div class="container">';
// echo '<div>';

if( have_rows('icons')):
echo '<div class="row justify-content-center">';
$iconsCounter = 0;
while(have_rows('icons')): the_row();
$icon = get_sub_field('icon');
$iconsCounter++;

if($iconsCounter == 1) {
    echo '<div class="col-md-3 col-6 text-center col-intro-icon" style="margin-top:-50px;">';
    echo '<div class="position-relative d-inline-block p-2 tab-icon tab-icon-active" style="border-radius:50%;border:1px solid white;" id="tab-icon-' . $iconsCounter . '">';
    echo '<div class="position-relative bg-accent-secondary d-inline-block p-2" style="border-radius:50%;">';
    echo wp_get_attachment_image($icon['id'], 'full','',['class'=>'w-auto img-portfolio','style'=>'height:75px;width:75px;object-fit:contain;'] );
    echo '</div>';
    echo '</div>';
    echo '<h2 class="h6 p-2 text-accent bold">' . $icon['title'] . '</h2>';
    echo '</div>';
} else {
    echo '<div class="col-md-3 col-6 text-center col-intro-icon" style="margin-top:-50px;">';
    echo '<div class="position-relative d-inline-block p-2 tab-icon" style="border-radius:50%;border:1px solid white;" id="tab-icon-' . $iconsCounter . '">';
    echo '<div class="position-relative bg-accent-secondary d-inline-block p-2" style="border-radius:50%;">';
    echo wp_get_attachment_image($icon['id'], 'full','',['class'=>'w-auto img-portfolio','style'=>'height:75px;width:75px;object-fit:contain;'] );
    echo '</div>';
    echo '</div>';
    echo '<h2 class="h6 p-2 text-accent bold">' . $icon['title'] . '</h2>';
    echo '</div>';
}



endwhile; 
echo '</div>';
endif;

if( have_rows('icons')):
echo '<div class="row justify-content-center pt-5">';
echo '<div class="col-md-6 text-center col-tab-content">';
$iconsCounter = 0;
while(have_rows('icons')): the_row();
$pretitle = get_sub_field('pretitle');
$title = get_sub_field('title');
$content = get_sub_field('content');

$iconsCounter++;

if($iconsCounter == 1){
    echo '<div class="w-100 tab-content tab-content-active" id="tab-content-' . $iconsCounter . '">';
    echo '<h3 class="text-accent bold mb-0" style="line-height:1;">' . $pretitle . '</h3>';
    echo '<h2 class="text-white h1">' . $title . '</h2>';
    echo $content;

    if(have_rows('buttons')): while(have_rows('buttons')): the_row();
    $button = get_sub_field('button');
    $button_url = $button['url'];
    $button_title = $button['title'];
    $button_target = $button['target'] ? $button['target'] : '_self';
    echo '<a class="btn btn-outline-main mt-5 ml-2 mr-2" href="' . esc_url( $button_url ) . '" target="' . esc_attr( $button_target ) . '">' . esc_html( $button_title ) . '</a>';
    endwhile; endif;
    echo '</div>';

} else {
    echo '<div class="w-100 tab-content" style="" id="tab-content-' . $iconsCounter . '">';
    echo '<h3 class="text-accent bold mb-0" style="line-height:1;">' . $pretitle . '</h3>';
    echo '<h2 class="text-white h1">' . $title . '</h2>';
    echo $content;
    
    if(have_rows('buttons')): while(have_rows('buttons')): the_row();
        $button = get_sub_field('button');
        $button_url = $button['url'];
        $button_title = $button['title'];
        $button_target = $button['target'] ? $button['target'] : '_self';
        echo '<a class="btn btn-outline-main mt-5 ml-2 mr-2" href="' . esc_url( $button_url ) . '" target="' . esc_attr( $button_target ) . '">' . esc_html( $button_title ) . '</a>';
    endwhile; endif;
    echo '</div>';
}


endwhile;
echo '</div>';
echo '</div>';
endif;

// echo '<div class="row justify-content-center pt-5">';
// echo '<div class="col-md-6 text-center">';

// echo '<h3 class="text-accent bold mb-0" style="line-height:1;">' . $pretitle . '</h3>';
// echo '<h2 class="text-white h1">' . $title . '</h2>';
// echo $content;

// echo '<a class="btn btn-outline-main mt-5" href="' . esc_url( $button_url ) . '" target="' . esc_attr( $button_target ) . '">' . esc_html( $button_title ) . '</a>';
// echo '</div>';
// echo '</div>';

// echo '</div>';
echo '</div>';
echo '</section>';
endwhile; endif;
// end of intro

// start of projects

echo '<section class="pt-5 pb-5 position-relative">';
echo '<div class="position-absolute w-100 h-100 bg-attachment" style="background:url(/wp-content/uploads/2022/01/Past-Projects-Background-Image.jpg);background-size:cover;background-attachment:fixed;opacity:.25;top:0;left:0;"></div>';
echo '<div class="container">';
echo '<div class="row">';

echo '<div class="col-12 pb-4">';
echo '<h3>PAST PROJECTS</h3>';
echo '</div>';

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

// if(have_rows('past_projects')): while(have_rows('past_projects')): the_row();
// $bgImg = get_sub_field('background_image');
// $content = get_sub_field('content');
// $gallery = get_sub_field('gallery');
// echo '<section class="pt-5 pb-5 position-relative bg-attachment" style="">';
// echo '<div class="position-absolute w-100 h-100 bg-attachment" style="background:url(' . $bgImg['url'] . ');background-size:cover;background-attachment:fixed;opacity:.35;top:0;left:0;"></div>';

// echo '<div class="container">';
// echo '<div class="row">';
// echo '<div class="col-12">';

// echo '<div class="pb-4">';
// echo $content;
// echo '</div>';

// if( $gallery ): 
// echo '<div class="row">';
// $galleryCounter = 0;
// foreach( $gallery as $image ):
// $galleryCounter++;

// if($galleryCounter == 1){
// echo '<div class="col-md-8 col-portfolio overflow-h pb-2 pr-1">';
// // echo '<div class="position-relative">';
// echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100','style'=>'height:400px;object-fit:cover;'] );
// echo '</a>';
// // echo '</div>';
// echo '</div>';
// }

// if($galleryCounter > 1){
// echo '<div class="col-md-4 col-portfolio overflow-h pb-2 pr-1 pl-1">';
// // echo '<div class="position-relative">';
// echo '<a href="' . wp_get_attachment_image_url($image['id'], 'full') . '" data-lightbox="image-set">';
// echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100','style'=>'height:400px;object-fit:cover;'] );
// echo '</a>';
// // echo '</div>';
// echo '</div>';
// }
// endforeach; 
// echo '</div>';
// endif;

// echo '</div>';
// echo '</div>';
// echo '</div>';


// echo '</section>';
// endwhile; endif;
// end of projects

// start of about us
if(have_rows('about_content')): while(have_rows('about_content')): the_row();

$bgImg = get_sub_field('background_image');
$title = get_sub_field('title');
$content = get_sub_field('content');
echo '<section class="position-relative bg-attachment" style="background:url(' . $bgImg['url'] . ');background-size:cover;background-attachment:fixed;padding:100px 0 150px;">';
echo '<div class="position-absolute w-100 h-100" style="top:0;left:0;mix-blend-mode:multiply;background: rgb(15,40,73);
background: linear-gradient(90deg, rgba(15,40,73,1) 0%, rgba(255,82,35,1) 100%);"></div>';

echo '<div class="container position-relative z-1">';
echo '<div class="row">';

echo '<div class="col-md-9 text-white">';
echo '<h2 class="">' . $title . '</h2>';
echo '<div class="divider mb-3 mt-3"></div>';
echo $content;
echo '</div>';

echo '</div>';
echo '</div>';
echo '</section>';

endwhile; endif;
// end of about us

echo '<div class="pt-5 pb-5"></div>';
get_footer(); ?>