<div data-query="<?php echo get_queried_object(  )->name; ?>" class="flex-fill <?php if(get_field('taxonomy_header', get_queried_object())) : ?> ps-lg-5 <?php endif; ?> overflow-hidden">
    <?php 
        if(get_queried_object(  )->name === 'curso') {
            $q = new WP_Query( array(
                'posts_per_page'   => -1,
                'post_type'     => 'curso',
                'meta_key'      => 'featured',
                'meta_value'    => TRUE
            ) );
        }  else {
            $q = new WP_Query( array(
                'posts_per_page'   => -1,
                'post_type'     => 'curso',
                'meta_key'      => 'featured',
                'meta_value'    => TRUE,
                'tax_query' => array(
                    array(
                        'taxonomy' => get_queried_object()->taxonomy,
                        'field'    => 'slug',
                        'terms'    =>  get_queried_object()->slug,
                    ),
                ),
            ) );            
        }

    ?>
    <?php if ($q->have_posts()) : ?>
        <div class="section-header m-0 p-0 mb-lg-5 <?php if (!$q->have_posts()) : ?> flex-fill <?php endif; ?>">
            <h2 class="align-items-end d-flex  align-items-end justify-content-between">
                <span class="title col-12 <?php if ($q->have_posts()) : ?> col-lg-8 <?php endif; ?> pb-4 pb-lg-0">
                    Confira os cursos que estão
                    em alta na UniPaulistana.
                </span>
                <?php if ($q->have_posts()) : ?>
                <div class="owl-custom-nav d-none d-lg-flex align-items-center justify-content-between mt-4">
                    <a class="courses-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
                    <a class="courses-next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
                </div> 
                <?php endif; ?>
            </h2>
        </div>
        <div class="d-none d-lg-block overflow-hidden">
            <div class="owl-carousel owl-theme">
                <?php 
                    while ( $q->have_posts() ) : $q->the_post();
                        get_template_part('template_parts/card', null, array(
                            'node' => $post, 
                            'classes' => 'me-4',
                            'variation' => 1,
                            'type' => 'info'
                        ));  
                    endwhile;
                    wp_reset_query();
                    wp_reset_postdata();                     
                ?>  
            </div>
        </div>
    <?php endif; ?>
</div>