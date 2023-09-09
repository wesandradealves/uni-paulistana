<?php 
    global $template; 
    $template = str_replace('.php', '', basename($template));
?>

<aside class="sidebar">
    <ul class="shortcuts d-flex align-items-stretch justify-content-between d-lg-none pt-3 pb-4 pb-lg-5">
        <li class="shortcuts-item">
            <a class="shortcuts-link d-flex align-items-center justify-content-between" href="javascript:void(0)">Filtrar <img src="<?php echo get_template_directory_uri(); ?>/img/832b30d084b7c0f8ed6e.png" alt="" class="icon"></a>
        </li>
    </ul>
    <div class="filter d-none d-lg-flex flex-wrap flex-column">
        <h3 class="title pe-4 mb-4 close-filter justify-content-between d-flex d-lg-none flex-wrap align-items-center">Fechar filtro <i class="fa-solid fa-xmark me-3"></i></h3>
        <div class="section-header mt-5 mb-4 d-block d-lg-none p-0">
            <h3 class="title"><?php if(get_queried_object()->taxonomy === 'categoria') : ?> Procure por notícias <?php else : ?> Encontre o curso ideal para você.<?php endif; ?></h3>
        </div>
        <?php get_search_form(); ?>
    </div>
    <?php if ( is_active_sidebar( 'search' ) ) : ?>
        <?php dynamic_sidebar( 'search' ); ?>
    <?php endif; ?>  
</aside>