<footer>
<section class="bg-accent-dark pt-5 pb-5">
<div class="container">
<div class="row justify-content-center align-items-center">
<div class="col-lg-2 col-4 text-center pb-5">
<a href="<?php echo home_url(); ?>">
<?php $logo = get_field('logo','options'); $logoFooter = get_field('logo_footer','options'); 
if($logoFooter){
echo wp_get_attachment_image($logoFooter['id'],'full',"",['class'=>'w-100 h-auto']); 
} elseif($logo) {
echo wp_get_attachment_image($logo['id'],'full',"",['class'=>'w-100 h-auto']);
}
?>
</a>
</div>
<div class="col-12">
<?php wp_nav_menu(array(
'menu' => 'footer',
'menu_class'=>'menu d-flex flex-wrap list-unstyled justify-content-center text-white'
)); ?>
</div>
<?php 
echo '<div class="col-md-3">';
echo get_template_part('partials/si'); 
echo '</div>';


echo '<div class="col-md-6 text-center text-white">';
echo '<div style="margin-bottom:-1rem;">';
the_field('footer_message','options'); 
echo '</div>';
echo '</div>';


echo '<div class="col-md-3 text-center text-white">';
echo '<a href="https://insideoutcreative.io/" target="_blank" title="Website Development, Design &amp SEO in Colorado - Florida" style="padding-top:35px;"><img class="auto img-backlink" src="' . home_url() . '/wp-content/uploads/2022/01/created-by-inside-out-creative.png" alt="Website Development, Design &amp SEO in Colorado - Florida" width="125px" /></a>';
echo '</div>';

?>

</div>
</div>
</section>

</footer>
<?php if(get_field('footer', 'options')) { the_field('footer', 'options'); } ?>
<?php wp_footer(); ?>
</body>
</html>