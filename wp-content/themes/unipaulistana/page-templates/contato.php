<?php /* Template Name: Contato */ ?>
<?php 
    get_header(); 
    global $template; 
?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<?php get_template_part('template_parts/page-banner', null, array('node' => $post)); ?>
<section class="section single-content" data-template="<?php echo str_replace('.php', '', basename($template)); ?>">
    <div class="container d-flex align-items-stretch flex-wrap">
        <?php get_sidebar('contato'); ?>
        <?php if(get_field('form_id')) : ?>
            <div class="ps-lg-5 col-12 col-lg-6 ms-auto">
                <?php echo do_shortcode('[contact-form-7 id="'.get_field('form_id').'" title="Contato"]'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php if(get_field('sidebar')) : ?> 
    <?php get_sidebar('map'); ?>
<?php endif; ?>
<?php get_footer(); ?>