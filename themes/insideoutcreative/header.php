<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if(get_field('header', 'options')) { the_field('header', 'options'); } ?>
<?php if(get_field('custom_css')) { ?> 
<style>
<?php the_field('custom_css'); ?>
</style>
<?php } ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
if(get_field('body','options')) { the_field('body','options'); } 

echo '<div class="secondary-nav text-white position-relative z-3 pt-2 pb-2 bg-accent-secondary w-100" style="z-index:5;">';

// echo '<div class="bg-accent position-absolute w-100 h-100 z-2" style="top:0;left:0;"></div>';


echo '<div class="container z-3 position-relative">';
echo '<div class="row align-items-center justify-content-between">';

echo '<div class="col-6 desktop-hidden">';
echo '<a id="navToggle" class="nav-toggle">';
echo '<div>';
echo '<div class="line-1 bg-white"></div>';
echo '<div class="line-2 bg-white"></div>';
echo '<div class="line-3 bg-white"></div>';
echo '</div>';
echo '</a>';
echo '</div>';

echo '<div class="col-md-3 col-6 text-center">';

echo get_template_part('partials/si');

echo '</div>';

echo '<div class="col-md-3 text-center">';
echo '<div style="margin-bottom:-1rem;">';
echo get_field('website_message','options');
echo '</div>';
echo '</div>';

echo '</div>';
echo '</div>';


echo '</div>';

echo '<div class="blank-space"></div>';
echo '<header class="position-relative w-100" style="top:0;left:0;">';

$globalPlaceholderImg = get_field('global_placeholder_image','options');


if(is_page() && !is_front_page()){
if(has_post_thumbnail()){
the_post_thumbnail('full', array('class' => 'w-100 h-100 bg-img position-absolute','style'=>'object-position:top;'));
} else {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute','style'=>'object-position:top;']);
}
} elseif(!is_front_page()) {
echo wp_get_attachment_image($globalPlaceholderImg['id'],'full','',['class'=>'w-100 h-100 bg-img position-absolute','style'=>'object-position:top;']);
} elseif(is_front_page()) {

    $header = get_field('header_gallery');

    if( $header ): 
        echo '<div class="header-carousel owl-carousel owl-theme position-absolute h-100">';
        foreach( $header as $image ):
            
            echo wp_get_attachment_image($image['id'], 'full','',['class'=>'w-100 h-100 bg-img skip-lazy','style'=>'object-position:top right;top:0;left:0;'] );
            
        endforeach; 
        echo '</div>';
    endif;

}


echo '<div class="position-absolute w-100 h-100 z-1" style="background: rgb(255,255,255);
background: radial-gradient(circle, rgba(255,255,255,0) 0%, rgba(15,40,73,1) 100%);top:0;left:0;pointer-events:none;mix-blend-mode:multiply;"></div>';
$logoSecondary = get_field('logo_secondary','options');
echo wp_get_attachment_image($logoSecondary['id'],'full','',['class'=>'position-absolute z-2 secondary-logo','style'=>'width:250px;height:auto;top:0px;right:0;z-index:6;']);
?>

<div class="nav pt-3 pb-3 z-1 position-relative bg-accent w-100" style="z-index:5;">
<div class="container">
<div class="row align-items-center">
<div class="col-lg-2 col-md-6 col-5">
<a href="<?php echo home_url(); ?>">
<?php 
$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:250px;']);
}
?>
</a>
</div>
<div class="col-md-9 mobile-hidden">
<?php 
wp_nav_menu(array(
'menu' => 'primary',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center mb-0'
));
?>
</div>


</div>
</div>
</div>

<div id="navMenuOverlay" class="position-fixed" style="z-index:4;"></div>
<div class="col-9 nav-items bg-accent desktop-hidden" id="navItems" style="z-index:5;">

<div class="pt-5 pb-5">
<div class="close-menu">
<div>
<span id="navMenuClose" class="close h1 text-white">X</span>
</div>
</div>
<a href="<?php echo home_url(); ?>">
<?php 
$logo = get_field('logo','options'); 
if($logo){
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto','style'=>'max-width:125px;']);
}
?>
</a>
</div>
<?php 
wp_nav_menu(array(
'menu' => 'primary',
'menu_class'=>'menu list-unstyled mb-0'
));

?>
</div>

<?php
echo '<section class="hero position-relative z-2">';



if(is_front_page()) {
echo '<div class="hero-content-inner text-white" style="padding:200px 0 150px;">';
// echo '<div class="position-relative">';
// echo '<div class="multiply overlay position-absolute w-100 h-100 bg-img"></div>';
// echo '<div class="position-relative">';
echo '<div class="container">';
echo '<div class="row justify-content-end">';
echo '<div class="col-md-6">';
echo '<h1 class="pt-3 pb-3 mb-0 text-shadow">' . get_the_title() . '</h1>';
echo '<div class="divider mb-3"></div>';
echo '<div class="text-shadow">';
echo '<strong>';
echo get_field('subtitle');
echo '</strong>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '</div>';
// echo '</div>';
// echo '</div>';
echo '</div>';
}



if(!is_front_page()) {
echo '<div class="container pt-5 pb-5 text-white text-center">';
echo '<div class="row">';
echo '<div class="col-md-12">';
if(is_page() || !is_front_page()){
echo '<h1 class="">' . get_the_title() . '</h1>';
} elseif(is_single()){
echo '<h1 class="">' . get_single_post_title() . '</h1>';
} elseif(is_author()){
echo '<h1 class="">Author: ' . get_the_author() . '</h1>';
} elseif(is_tag()){
echo '<h1 class="">' . get_single_tag_title() . '</h1>';
} elseif(is_category()){
echo '<h1 class="">' . get_single_cat_title() . '</h1>';
} elseif(is_archive()){
echo '<h1 class="">' . get_archive_title() . '</h1>';
}
echo '</div>';
echo '</div>';
echo '</div>';
}

echo '</section>';
echo '</header>';
?>