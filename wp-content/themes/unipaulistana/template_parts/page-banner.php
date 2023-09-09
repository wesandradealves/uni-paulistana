<section class="page-banner d-none d-md-block" style="background: url(
    <?php
        if($args['template'] === '404' && get_field('404', 'option')) {
            echo get_field('404', 'option')['banner'];
        } else {
            if(get_field('banner')) {
                echo get_field('banner');
            } else {
                echo get_the_post_thumbnail_url($args['node']->ID);
            }
        }
    ?>) center center / cover no-repeat">
    <div class="page-banner-content">
        <div class="container d-flex flex-column <?php if(!is_single()) : ?> align-items-center <?php else : ?> align-items-start <?php endif; ?> justify-content-center">
            <div class="title">
                <?php 
                    if(is_single()) {
                        if(get_field('headline')) {
                            echo get_field('headline');
                        } else {
                            echo get_queried_object()->post_title;
                        }
                    } else {
                        if($args['template'] === '404' && get_field('404', 'option')) {
                            echo 'Página não encontrada';
                        } elseif(get_field('headline', get_queried_object()->ID)) {
                            echo get_field('headline', get_queried_object()->ID);
                        } else {
                            echo get_field('headline', $args['node']->ID) ? get_field('headline', $args['node']->ID) : $args['node']->post_title;
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>      

