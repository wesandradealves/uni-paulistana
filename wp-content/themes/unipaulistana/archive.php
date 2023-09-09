<?php get_header(); ?>
<?php get_template_part('template_parts/page-header', null, array('node' => get_queried_object())); ?>

<?php 
    if(
        !is_archive() && !is_search() || 
        is_archive() && get_queried_object()->name !== 'curso'
    ) :
?>
    <?php get_template_part('template_parts/page-banner', null, array('node' => get_page_by_title( 'Notícias' ))); ?>
<?php endif; ?>

<section class="d-block mt-5">
    <?php get_template_part('template_parts/taxonomy-header', null, array()); ?>

    <!-- <div id="top" class="section col-12 single-content" data-template="<?php echo str_replace('.php', '', basename($template)); ?>">
        <div class="container d-flex align-items-center flex-wrap">
            <div class="col-12 section-header pb-0 mb-0 <?php if(isset($_GET['c'])) : ?> p-0 <?php endif; ?>">
                <?php
                    if(get_queried_object()->name === 'noticias') {
                        $args = array(
                            'post_type'        => 'page',
                            'search_title'     => 'Notícias',
                            'post_status'      => 'publish',
                            'orderby'          => 'title', 
                            'order'            => 'ASC',
                        );

                        $wp_query = new WP_Query( $args );
                        if ( $wp_query->have_posts() ) : 
                        while ( $wp_query->have_posts() ) : $wp_query->the_post();
                                //Your Code to display post...
                            the_content();
                        endwhile;
                        wp_reset_query();
                        wp_reset_postdata();                               
                        endif;
                    } elseif(get_queried_object()->name === 'curso') {
                        ?>
                        <h2><strong>Conheça nossos<br/>cursos</strong></h2>
                        <?php 
                    } else {
                        ?>
                        <h2><strong><?php echo get_queried_object()->name; ?></strong></h2>
                        <?php 
                    }
                ?>
            </div>
        </div>
    </div>   -->

    <div class="container p-2 p-lg-0 d-flex flex-wrap flex-column flex-lg-row align-items-start">
        <?php if(get_queried_object()->name === 'curso') : ?>
            <?php get_sidebar('search'); ?>
        <?php endif; ?>

        <div id="search" class="d-flex flex-wrap col-12 col-lg-auto flex-fill <?php if(get_queried_object()->name === 'noticias') : ?> pe-lg-5 <?php else : ?> ps-lg-5 <?php endif; ?>">
            <?php 
                if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post(); 
                        get_template_part('template_parts/card', null, array(
                            'node' => $post, 
                            'classes' => 'ps-md-2 pe-md-2 col-12 col-md-6 pb-3',
                            'variation' => get_queried_object()->name === 'curso' ? 1 : 2,
                            'type' => 'info'
                        ));  
                    }
                    
                    $total_pages = $wp_query->max_num_pages;
                    if ($total_pages > 1) {
                        $current_page = max(1, get_query_var('paged')); 
                        ?>
                            <div class="pagination d-block col-12 mt-5">
                                <div class="d-flex align-items-center justify-content-center">
                                    <?php 
                                        echo paginate_links(array(
                                            'base' => get_pagenum_link(1).
                                            '%_%',
                                            //'format' => '/page/%#%',
                                            'current' => $current_page,
                                            'total' => $total_pages,
                                            'prev_text' => __('<i class="fas fa-chevron-left page-prev"></i>'),
                                            'next_text' => __('<i class="fas fa-chevron-right page-next"></i>'),
                                        ));   
                                    ?>
                                </div>
                            </div>                              
                        <?php 
                    }    

                    wp_reset_query();
                    wp_reset_postdata();  
                } else {
                    ?>
                        <p class="d-flex col-12 flex-column justify-content-center align-items-center mb-auto">Nenhum resultado encontrado.</p>                        
                    <?php 
                }
            ?>
        </div>

        <?php if(get_queried_object()->name === 'noticias') : ?>
            <?php get_sidebar('search'); ?>
        <?php endif; ?>
    </div>
</section>

<?php get_sidebar('ads'); ?>
<?php get_footer(); ?>