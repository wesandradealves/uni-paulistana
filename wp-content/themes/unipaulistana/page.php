<?php get_header(); ?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<?php get_template_part('template_parts/page-banner', null, array('node' => $post)); ?>
<?php the_content(); ?>  
<?php get_sidebar('ads'); ?>
<?php get_footer(); ?>