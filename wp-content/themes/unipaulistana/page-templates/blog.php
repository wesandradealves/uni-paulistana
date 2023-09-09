<?php /* Template Name: Blog */ ?>
<?php 
    get_header(); 
    global $template; 
?>
<?php get_template_part('template_parts/page-header', null, array()); ?>
<?php get_template_part('template_parts/page-banner', null, array()); ?>
<section class="section single-content" data-template="<?php echo str_replace('.php', '', basename($template)); ?>">
    <div class="container d-flex align-items-center flex-wrap">
        <div class="col-12 section-header pb-0 mb-0 <?php if(isset($_GET['c'])) : ?> p-0 <?php endif; ?>">
            <?php
                if( !isset($_GET['c']) ) {
                    ?>
                    <span>
                        <?php the_content();  ?>
                    </span>
                    <?php 
                } else {
                    ?>
                    <h2><span>Procurando por:</span> <strong>"<?php echo $_GET['c']; ?>"</strong>.</h2>
                    <?php 
                }
            ?>            
        </div>
    </div>
</section>
<section class="section d-block">
    <div class="container pt-0 d-flex flex-wrap align-items-stretch">
        <div id="search" class="content pe-lg-5 overflow-hidden d-flex flex-wrap align-items-stretch">
            <?php 
                if(isset($_GET['c']) || isset($_GET['category'])) {
                    $keys = array_keys($_GET);
                    $tax_query = array('relation' => 'OR');

                    foreach ($keys as $key) {
                        if($key !== 'c') {
                            array_push($tax_query, array(
                                'taxonomy' => $key,
                                'field' => 'slug',
                                'terms' => [$_GET[$key]],
                                'operator' => 'IN'
                            ));
                        }
                    }

                    $args = array(
                        'post_type' => 'noticias',
                        'order' => 'DESC',
                        'tax_query' => $tax_query,
                        'posts_per_page'      => '12', //how many posts you need
                        'paged'          => $paged //add the 'paged' parameter
                    );

                    if(isset($_GET['c'])) {
                        $args['s'] = $_GET['c'];
                    }
                } else {           
                    $args = array(
                        'post_type' => 'noticias',
                        'order' => 'DESC',
                        'posts_per_page'      => '12', //how many posts you need
                        'paged'          => $paged //add the 'paged' parameter
                    );                    
                }

                $query = new WP_Query($args);

                if ($query->have_posts()) :
                    $i = 0;
                    while ( $query->have_posts() ) : $query->the_post();    
                    $i++;        
            ?>
            <div class="card col-12 col-md-6 --variation-2 pb-3 <?php echo $i % 2 == 0 ? 'ps-md-3' : 'pe-md-3'; ?>" data-layout="info"
                onclick="location.href = '<?php the_permalink(); ?>';">
                <div class="card-inner    overflow-hidden">
                    <div class="thumbnail d-block overflow-hidden img-fluid">
                        <picture>
                            <source
                                srcset="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'https://www.charlotteathleticclub.com/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png'; ?>"
                                media="(min-width: 768px)">
                            <img decoding="async" class="img-fluid" src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : 'https://www.charlotteathleticclub.com/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png'; ?>"
                                alt="<?php the_title(); ?>">
                        </picture>
                    </div>
                    <div class="card-info mt-3">
                        <p class="text"><?php the_time('j/m/Y') ?>, por <?php echo get_the_author(); ?></p>
                        <h3 class="title mt-3"><?php the_title(); ?></h3>
                    </div>

                </div>
            </div>
            <?php endwhile;  
            endif; ?>
            <?php 
                $total_pages = $query->max_num_pages;
                if ($total_pages > 1) : $current_page = max(1, get_query_var('paged'));  
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
            <?php endif; ?>
            <?php 
            wp_reset_query();
            wp_reset_postdata();   
            ?>
        </div>
        <?php get_sidebar('search'); ?>
    </div>
</section>
<?php get_footer(); ?>