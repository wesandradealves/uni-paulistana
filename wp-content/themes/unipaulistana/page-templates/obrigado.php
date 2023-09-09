<?php /* Template Name: Obrigado */ ?>
<?php 
    get_header(); 
    global $template; 
?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<?php get_template_part('template_parts/page-banner', null, array('node' => $post)); ?>
<section class="section single-content" data-template="<?php echo str_replace('.php', '', basename($template)); ?>">
    <div class="container d-flex align-items-stretch flex-wrap">
        <div class="col-12 col-lg-5 section-header">
            <?php the_content(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>