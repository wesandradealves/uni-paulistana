<?php 
    global $template; 
    $template = str_replace('.php', '', basename($template));
?>

<section class="page-header">
    <div class="container  d-flex flex-wrap align-items-center justify-content-between pt-3 pb-3 pt-lg-4 pb-lg-4">
        <div class="page-header-info col-12">
            <?php get_template_part('template_parts/breadcrumbs', null, array('node' => get_queried_object())); ?>
            <?php if(is_single()) : ?> <span class="title col-lg-6"> <?php else : ?> <h1 class="title"> <?php endif; ?>
                <?php 
                    if($args['template'] === '404' && get_field('404', 'option')) {
                        echo 'Página não encontrada.';
                    } elseif( isset($_GET['c']) || is_search() ) {
                        echo 'Busca';
                    } elseif($template === 'blog' || (is_single() && get_post_type() === 'noticias')) {
                        echo 'Notícias';
                    } else {
                        if(get_queried_object()->label) {
                            echo get_queried_object()->label;
                        } elseif(get_queried_object()->name) {
                            echo get_queried_object()->name;
                        } elseif(get_queried_object()->post_title) {
                            echo get_queried_object()->post_title;
                        } else {
                            the_title();
                        }
                    }
                ?>
            <?php if(is_single()) : ?> </span>  <?php else : ?> </h1> <?php endif; ?>
        </div>
        <div class="d-none d-lg-flex align-items-center justify-content-between">
            <span class="pe-5"><img src="<?php echo get_template_directory_uri(); ?>/img/b444bbeb641980fc8068.png" alt=""></span>
            <span><img src="<?php echo get_template_directory_uri(); ?>/img/d6852ac2994660eb629f.png" alt=""></span>
        </div>
    </div>
</section>