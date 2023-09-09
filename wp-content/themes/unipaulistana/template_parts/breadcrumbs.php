<?php 
    global $template; 
    $template = str_replace('.php', '', basename($template));
?>

<nav class="breadcrumb mb-2">
    <ul class="d-flex align-items-center">
        <li class="nav-item"><a class="nav-link" href="<?php echo get_home_url(); ?>">Home</a></li>
        <?php if($template && $template === '404' || is_archive() || is_tax()) : ?>
            <li class="nav-item"><a class="nav-link"><?php echo isset($_GET['c']) || is_search() ? 'Busca' : (get_queried_object() ? (get_queried_object()->label ? get_queried_object()->label : get_queried_object()->name) : (is_archive() ? $args['node']->label : '404')); ?></a></li>
        <?php else : ?>
            <?php if(!is_single() && breadcrumbs()->title) : ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo breadcrumbs()->url; ?>"><?php echo breadcrumbs()->title; ?></a></li>
            <?php else : ?>
                <?php
                    $terms = get_the_terms( $post->ID, get_queried_object()->post_type === 'noticias' ? 'categoria' : 'tipo-de-curso' ); 
                    if($terms) : 
                        foreach ($terms as $term) :
                ?>
                <?php if(get_queried_object()->post_type === 'noticias') : ?>
                    <li class="nav-item"><a class="nav-link" href="<?php echo get_permalink(get_page_by_title('Notícias')); ?>"><?php echo get_page_by_title('Notícias')->post_title; ?></a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></li>
                <?php endforeach;
            endif; ?>
            <?php endif; ?>
            <li class="nav-item"><a class="nav-link"><?php echo $args['node']->post_title; ?></a></li>
        <?php endif; ?>
    </ul>
</nav>