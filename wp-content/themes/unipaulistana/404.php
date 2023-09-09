<?php 
    get_header(); 
    global $template; 
?>
<?php get_template_part('template_parts/page-header', null, array('template' => str_replace('.php', '', basename($template)), 'node' => $post)); ?>
<?php get_template_part('template_parts/page-banner', null, array('template' => str_replace('.php', '', basename($template)), 'node' => $post)); ?>
<?php if(get_field('404', 'option')) : ?>
<section class="section single-content" data-section="obrigado">
    <div class="container d-flex align-items-stretch flex-wrap">
        <div class="col-12 col-lg-5 section-header">
            <?php echo get_field('404', 'option')['body']; ?>
        </div>
    </div>
</section>
<?php endif; ?>
<?php get_footer(); ?>