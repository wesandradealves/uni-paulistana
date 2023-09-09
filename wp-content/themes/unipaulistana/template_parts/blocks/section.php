<section 
    data-feature="<?php echo $args['fields']['feature']; ?>"
    data-block-id="<?php echo $args['block']['id']; ?>" 
    id="<?php echo $args['block']['id']; ?>" 
    <?php if(($args['fields']['background_color'] || $args['fields']['background']) && $args['fields']['feature'] !== 'text-banner') : ?> style="background: url(<?php echo $args['fields']['background']; ?>) center center / cover no-repeat <?php echo $args['fields']['background_color']; ?>;" <?php endif; ?>
    class="section <?php if($args['fields']['feature'] === 'text-banner') : ?>      d-flex flex-column justify-content-center align-items-center         <?php endif; ?> <?php if($args['fields']['feature'] === 'video' && $args['fields']['video_url']) : ?> has-video <?php endif; ?> <?php echo $args['block']['id'].' '.$args['fields']['classes']; ?>">
    <div 
    <?php if($args['fields']['feature'] === 'text-banner' && $args['fields']['background_color']) : ?> style="background-color: <?php echo $args['fields']['background_color']; ?>" <?php endif; ?>
        class="container<?php echo $args['fields']['layout'] === 'full' ? '-fluid' : ''; ?> <?php if($args['fields']['feature'] === 'text-banner') : ?> ps-5 pe-5 <?php endif; ?> <?php if($args['fields']['feature']==='testimonials') : ?> pe-lg-5 row m-auto d-flex flex-column flex-md-row flex-wrap justify-content-between overflow-hidden <?php endif; ?>">
        <?php if($args['fields']['show_header']) : ?>
            <div class="section-header p-0 ps-lg-5 pe-lg-5 ms-0 me-0 <?php if($args['fields']['feature'] === 'grid' && ($args['fields']['card_variation'] === '3' || $args['fields']['card_variation'] === 3)) : ?> ms-lg-3 me-lg-3  <?php else : ?> ms-lg-2 me-lg-2 <?php endif; ?> <?php if($args['fields']['feature']==='testimonials') : ?> col-12 col-lg-5 pb-0 mb-0 <?php elseif($args['fields']['feature']==='image' || $args['fields']['feature']==='video') : ?> mb-4 <?php endif; ?>">
                <h1 class="title d-flex 
                flex-column flex-lg-row
                <?php if($args['fields']['feature'] === 'grid' && ($args['fields']['card_variation'] === '2' || $args['fields']['card_variation'] === 2)) : ?>
                align-items-end justify-content-lg-center
                <?php elseif($args['fields']['cards_type']==='icon' && $args['fields']['feature']==='cards' && ($args['fields']['card_variation'] === '2' || $args['fields']['card_variation'] === 2)): ?>
                align-items-lg-center justify-content-between
                <?php endif; ?>
                ">
                    <span class="col-lg-6"><?php echo strip_tags($args['fields']['title']); ?></span>
                    <?php if($args['fields']['cards_type']==='icon' && $args['fields']['feature']==='cards' && ($args['fields']['card_variation'] === '2' || $args['fields']['card_variation'] === 2)) : ?>
                        <div class="owl-custom-nav mt-4 mt-lg-0 d-flex flex-wrap align-items-center justify-content-between">
                            <a class="<?php echo $args['block']['id']; ?>-prev"><i class="fa-solid fa-angle-left" aria-hidden="true"></i></a>
                            <a class="<?php echo $args['block']['id']; ?>-next"><i class="fa-solid fa-angle-right" aria-hidden="true"></i></a>
                        </div>   
                    <?php endif; ?>                    
                </h1>

                <?php if($args['fields']['subtitle']) : ?>
                    <div class="text <?php if($args['fields']['cards_type']==='info' && $args['fields']['feature']==='cards') : ?> d-flex align-items-center justify-content-between <?php else: ?> d-block <?php endif; ?>">
                        <?php if($args['fields']['cards_type']==='info' && $args['fields']['feature']==='cards') : ?>
                            <span class="flex-fill pe-5">
                                <?php echo $args['fields']['subtitle']; ?>
                            </span>
                            <!-- <div class="owl-custom-nav d-none d-lg-flex flex-wrap align-items-center justify-content-between">
                                <a class="<?php echo $args['block']['id']; ?>-prev"><i class="fa-solid fa-angle-left" aria-hidden="true"></i></a>
                                <a class="<?php echo $args['block']['id']; ?>-next"><i class="fa-solid fa-angle-right" aria-hidden="true"></i></a>
                            </div>    -->
                        <?php else : ?>
                            <?php echo $args['fields']['subtitle']; ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?> 

                <?php if($args['fields']['feature'] === 'testimonials') : ?>
                    <div class="owl-custom-nav d-none d-lg-flex flex-wrap align-items-center justify-content-between mt-4">
                        <a class="<?php echo $args['block']['id']; ?>-prev"><i class="fa-solid fa-angle-left" aria-hidden="true"></i></a>
                        <a class="<?php echo $args['block']['id']; ?>-next"><i class="fa-solid fa-angle-right" aria-hidden="true"></i></a>
                    </div>       
                    <?php if($args['fields']['botao_cta_url'] && $args['fields']['botao_cta_label']) : ?>                 
                        <span class="d-none d-lg-block mt-5 pt-3">
                            <a href="<?php echo $args['fields']['botao_cta_url']; ?>" title="<?php echo $args['fields']['botao_cta_label']; ?>" class="d-inline-block btn btn-cta"><?php echo $args['fields']['botao_cta_label']; ?></a>
                        </span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div id="post_<?php print the_id().'_'.$args['block']['id']; ?>" class="d-block <?php if(($args['fields']['feature']==='video' || $args['fields']['feature']==='image') && (!is_home() && !is_front_page())) : ?> ps-lg-5 pe-lg-5 ms-lg-2 me-lg-2 <?php endif; ?> <?php if($args['fields']['feature']==='testimonials') : ?> col-12 col-lg-5 p-0 ps-lg-5 overflow-hidden <?php elseif($args['fields']['cards_type']==='simple' || $args['fields']['cards_type']==='icon' && $args['fields']['feature']==='cards' && ($args['fields']['card_variation'] === '2' || $args['fields']['card_variation'] === 2) || $args['fields']['feature']==='grid' && ($args['fields']['card_variation'] === '3' || $args['fields']['card_variation'] === 3)) :  ?> ps-lg-5 pe-lg-5 ms-lg-2 me-lg-2 <?php endif; ?>">
            <?php 
                switch ($args['fields']['feature']) {
                    case 'default':
                        echo '<div class="d-block ms-lg-2 me-lg-2 ps-lg-5 pe-lg-5 single-content">'.$args['fields']['body'].'</div>';
                        break;
                    case 'two-columns-image-list':
                        ?>
                        <div class="content d-flex flex-wrap align-items-stretch">
                            <div class="col-6 pt-lg-4 mt-lg-4 pt-xxl-5 mt-xxl-2 d-flex flex-column flex-wrap">
                                <div class="d-flex flex-fill icon-list flex-column flex-lg-row flex-wrap align-items-center justify-content-center align-items-lg-stretch">
                                    <?php 
                                        foreach ($args['fields']['icons'] as $item) {
                                            ?>
                                            <div class="col-12 col-lg-6 item d-flex flex-column justify-content-center align-items-center">
                                                <img class="d-block mb-4" src="<?php echo $item['icon']; ?>">
                                                <div class="text">
                                                    <?php echo $item['text']; ?>
                                                </div>
                                            </div>
                                            <?php 
                                        }
                                    ?>
                                </div>
                                <a class="cta d-none d-lg-flex flex-fill d-flex flex-column justify-content-center align-items-center" href="<?php echo $args['fields']['link']; ?>">
                                    <?php echo $args['fields']['body']; ?>
                                </a>
                            </div>
                            <div class="col-6 d-flex justify-content-center align-items-center">
                                <picture class="d-block img-fluid">
                                    <source srcset="<?php echo $args['fields']['image']; ?>" media="(min-width: 992px)" >
                                    <img class="img-fluid" src="<?php echo $args['fields']['image_mobile']; ?>" alt="Capa do Instalura">
                                </picture>                                 
                            </div>
                            <a class="cta d-flex d-lg-none col-12 flex-fill d-flex flex-column justify-content-center align-items-center" href="<?php echo $args['fields']['link']; ?>">
                                <?php echo $args['fields']['body']; ?>
                            </a>                            
                        </div>
                        <?php 
                    break;
                    case 'video':
                    case 'image':
                        ?>
                        <div class="d-flex flex-column flex-lg-row flex-wrap justify-content-between align-items-stretch">
                            <?php if($args['fields']['body']) : ?>
                                <div class="single-content col-12 col-lg-6 pe-lg-5 me-lg-5 order-1">
                                    <?php echo $args['fields']['body']; ?>
                                </div>  
                            <?php endif; ?>
                            <div class="flex-fill order-2 mt-5 mt-lg-0">
                                <?php if($args['fields']['feature'] !== 'video') : ?>
                                    <a href="<?php echo $args['fields']['link']; ?>">
                                        <picture>
                                            <source srcset="<?php echo $args['fields']['image']; ?>" media="(min-width: 768px)" >
                                            <img class="m-auto d-block img-fluid" src="<?php echo $args['fields']['image_mobile'] ? $args['fields']['image_mobile'] : $args['fields']['image']; ?>" alt="Capa do Instalura">
                                        </picture> 
                                    </a>    
                                <?php else : ?>
                                    <ul class="d-flex flex-wrap flex-lg-column justify-content-lg-center align-items-lg-center">
                                        <li class="col-4 col-md-auto"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/6566e9f01ab7d16d1fb6.png" alt=""></li>
                                        <li class="col-6 mt-5 ps-5 ps-lg-0 col-md-auto"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/6241465eaa7c23dcd4c6.png" alt=""></li>
                                    </ul>
                                <?php endif; ?>                             
                            </div>
                            <?php if($args['fields']['feature'] === 'video' && $args['fields']['video_url']) : ?>
                            <div class="glightbox-wrapper d-block col-12 mt-5 pt-5 order-3">
                                <a href="<?php echo $args['fields']['video_url']; ?>" class="d-block glightbox m-auto">
                                    <span class="icon d-flex justify-content-center align-items-center d-flex">
                                        <i class="fa-solid fa-play"></i>
                                    </span>
                                    <img class="img-fluid d-block" src="https://img.youtube.com/vi/<?php echo explode('?v=', $args['fields']['video_url'])[1]; ?>/0.jpg" alt="image" />
                                </a> 
                            </div>    
                            <?php endif; ?>                          
                        </div>
                        <?php 
                        break;
                    case 'grid':
                    case 'cards':
                        ?>
                            <?php 
                            $i = 0;
                            if($args['fields']['enable_tabs']) : ?>
                                <div class="d-flex mt-5 align-items-center justify-content-between d-lg-none owl-thumbs">
                                    <?php 
                                        foreach ($args['fields']['cards'] as $item) {
                                            $i++;
                                            ?>
                                            <a class="owl-thumb flex-fill d-flex flex-column justify-content-center align-items-center ms-2 me-2" href="#<?php echo $args['block']['id'].'_item_'.$i; ?>"><i class="icon d-flex flex-column align-items-center"><img src="<?php echo $item['icon']; ?>" alt=""></i></a>
                                            <?php 
                                        }
                                    ?>
                                </div>         
                            <?php endif; ?>
                                       
                            <div class="d-flex align-items-stretch <?php if($args['fields']['feature'] === 'grid' && ($args['fields']['card_variation'] === '2' || $args['fields']['card_variation'] === 2)) : ?> flex-wrap grid --variation-<?php echo $args['fields']['card_variation']; ?> <?php else : ?> simple-carousel <?php endif; ?>">
                                <?php if($args['fields']['feature'] === 'grid' && ($args['fields']['card_variation'] === '2' || $args['fields']['card_variation'] === 2)) : ?>
                                        <?php 
                                            $query = new WP_Query(array(
                                                'post_type' => 'noticias',
                                                'order' => 'DESC',
                                                'posts_per_page'      => 3, //how many posts you need
                                            ));

                                            if ($query->have_posts()) :
                                                $i = 0;
                                                while ( $query->have_posts() ) : $query->the_post(); $i++;
                                                    ?>
                                                        <?php if($i === 1) : ?>
                                                            <div class="pe-md-2 d-none d-lg-flex">
                                                                <?php                                                        
                                                                    get_template_part('template_parts/card', null, array(
                                                                        'node' => $post, 
                                                                        'full' => $i === 1,
                                                                        'squared' => $args['fields']['squared'],
                                                                        'variation' => $args['fields']['card_variation'],
                                                                        'type' => $args['fields']['cards_type']
                                                                    ));
                                                                ?>
                                                            </div>
                                                            <div class="flex-fill d-none flex-wrap align-items-stretch justify-content-between d-lg-flex">
                                                        <?php else : ?>
                                                            <?php                                                        
                                                                get_template_part('template_parts/card', null, array(
                                                                    'node' => $post, 
                                                                    'full' => $i === 1,
                                                                    'classes' => 'col-6 pe-2 ps-2',
                                                                    'squared' => $args['fields']['squared'],
                                                                    'variation' => $args['fields']['card_variation'],
                                                                    'type' => $args['fields']['cards_type']
                                                                ));
                                                            ?>
                                                        <?php endif; ?>                                                        
                                                    <?php 
                                                endwhile;
                                                wp_reset_query();
                                                wp_reset_postdata();   
                                            endif;
                                        ?>
                                        <?php if($args['fields']['botao_cta_url'] && $args['fields']['botao_cta_label']) : ?>
                                            <span class="d-none col-12 d-lg-flex flex-wrap justify-content-end align-items-end mt-5 ver-todos">
                                                <a href="<?php echo $args['fields']['botao_cta_url']; ?>" title="<?php echo $args['fields']['botao_cta_label']; ?>" class="d-inline-block btn btn-cta --variation"><?php echo $args['fields']['botao_cta_label']; ?></a>
                                            </span>  
                                        <?php endif; ?>  
                                    </div>

                                    
                                    <div class="d-flex d-lg-none simple-carousel">
                                        <?php 
                                            $query = new WP_Query(array(
                                                'post_type' => 'noticias',
                                                'order' => 'DESC',
                                                'posts_per_page'      => -1, //how many posts you need
                                            ));

                                            if ($query->have_posts()) :
                                                while ( $query->have_posts() ) : $query->the_post(); 
                                                    get_template_part('template_parts/card', null, array(
                                                        'node' => $post, 
                                                        'classes' => 'me-4',
                                                        'squared' => $args['fields']['squared'],
                                                        'variation' => $args['fields']['card_variation'],
                                                        'type' => $args['fields']['cards_type']
                                                    ));
                                                endwhile;
                                                wp_reset_query();
                                                wp_reset_postdata();   
                                            endif;
                                        ?>
                                    </div>
                            
                                    <?php if($args['fields']['botao_cta_url'] && $args['fields']['botao_cta_label']) : ?>
                                        <span class="d-flex col-12 d-lg-none flex-wrap justify-content-center align-items-center mt-5 ver-todos">
                                            <a href="<?php echo $args['fields']['botao_cta_url']; ?>" title="<?php echo $args['fields']['botao_cta_label']; ?>" class="d-inline-block btn btn-cta --variation"><?php echo $args['fields']['botao_cta_label']; ?></a>
                                        </span>  
                                    <?php endif; ?>  
                                <?php else : ?>
                                    <?php 
                                        switch ($args['fields']['cards_type']) {
                                            case 'icon':
                                                if($args['fields']['card_variation'] == 2) {
                                                    ?>
                                                    <div class="owl-carousel owl-theme">
                                                        <?php 
                                                            foreach ($args['fields']['cards'] as $item) {
                                                                get_template_part('template_parts/card', null, array(
                                                                    'node' => $item, 
                                                                    'classes' => 'ps-2 pe-2 pb-lg-3 col-lg-3',
                                                                    'squared' => $args['fields']['squared'],
                                                                    'enable_tabs' => $args['fields']['enable_tabs'],
                                                                    'data_hash' => $args['block']['id'].'_item_'.$i,
                                                                    'variation' => $args['fields']['card_variation'],
                                                                    'type' => $args['fields']['cards_type']
                                                                ));
                                                            }  
                                                        ?>
                                                    </div>
                                                    <?php 
                                                } else {
                                                    foreach ($args['fields']['cards'] as $item) {
                                                        get_template_part('template_parts/card', null, array(
                                                            'node' => $item, 
                                                            'classes' => 'ps-2 pe-2 pb-lg-3 col-lg-3',
                                                            'squared' => $args['fields']['squared'],
                                                            'enable_tabs' => $args['fields']['enable_tabs'],
                                                            'data_hash' => $args['block']['id'].'_item_'.$i,
                                                            'variation' => $args['fields']['card_variation'],
                                                            'type' => $args['fields']['cards_type']
                                                        ));
                                                    }  
                                                }
                                                break;
                                            case 'simple':
                                                foreach ($args['fields']['cards'] as $item) {
                                                    get_template_part('template_parts/card', null, array(
                                                        'node' => $item, 
                                                        'classes' => 'ms-2 me-2',
                                                        'squared' => $args['fields']['squared'],
                                                        'enable_tabs' => $args['fields']['enable_tabs'],
                                                        'data_hash' => $args['block']['id'].'_item_'.$i,
                                                        'variation' => $args['fields']['card_variation'],
                                                        'type' => $args['fields']['cards_type']
                                                    ));
                                                }
                                                break;
                                            case 'info':
                                                $query = new WP_Query( array(
                                                    'posts_per_page'   => 3,
                                                    'order' => 'DESC',
                                                    'post_type'     => 'curso',
                                                    'meta_key'      => 'featured',
                                                    'meta_value'    => TRUE
                                                ) );                                                

                                                if ($query->have_posts()) :
                                                    while ( $query->have_posts() ) : $query->the_post();
                                                        get_template_part('template_parts/card', null, array(
                                                            'node' => $post, 
                                                            'classes' => 'me-4',
                                                            'squared' => $args['fields']['squared'],
                                                            'variation' => $args['fields']['card_variation'],
                                                            'type' => $args['fields']['cards_type']
                                                        ));
                                                    endwhile;
                                                    wp_reset_query();
                                                    wp_reset_postdata();                                                       
                                                endif;
                                                break;
                                            default:
                                                if($args['fields']['conteudo_personalizado']) {
                                                    foreach ($args['fields']['cards'] as $item) {
                                                        get_template_part('template_parts/card', null, array(
                                                            'node' => $item, 
                                                            'classes' => 'me-4',
                                                            'squared' => $args['fields']['squared'],
                                                            'variation' => $args['fields']['card_variation'],
                                                            'type' => $args['fields']['cards_type']
                                                        ));
                                                    }
                                                } else {
                                                    $terms = get_terms([
                                                        'taxonomy' => 'tipo-de-curso',
                                                        'hide_empty' => false,
                                                    ]);
                                                    
                                                    if($terms) {
                                                        foreach($terms as $term) {
                                                            get_template_part('template_parts/card', null, array(
                                                                'node' => $term, 
                                                                'classes' => 'me-4',
                                                                'squared' => $args['fields']['squared'],
                                                                'variation' => $args['fields']['card_variation'],
                                                                'type' => $args['fields']['cards_type']
                                                            ));
                                                        }
                                                    }
                                                }
                                                break;
                                        }    
                                    ?>
                                <?php endif; ?>
                            </div>
                        <?php 
                        break;   
                    case 'testimonials': 
                            $testimonials = new WP_Query( array(
                                'post_type' => 'testimonials',
                                'order' => 'ASC',
                                'posts_per_page' => -1
                            ) );
                            if ( $testimonials->have_posts() ) : 
                                ?>
                                <div class="testimonials testimonials-slick col-12 m-0">
                                    <?php 
                                        while ( $testimonials->have_posts() ) : $testimonials->the_post();
                                            ?>
                                            <div class="me-2 ms-2 d-block">
                                                <p class="text mt-5 mt-lg-0 d-block">
                                                        <?php echo get_the_content(); ?> 
                                                        <strong class="d-block mt-5">
                                                            <?php the_title(); ?>
                                                        </strong>
                                                </p>
                                            </div>                                          
                                            <?php 
                                        endwhile;
                                        wp_reset_query();
                                        wp_reset_postdata(); 
                                    ?>     
                                </div>  
                                <?php      
                            endif;                                                                
                        ?>                                                                                                                       
                        <?php 
                        break;
                    case 'faq': 
                        if(empty($args['fields']['custom_faq'])) {
                            $faq = new WP_Query( array(
                                'post_type' => 'faq',
                                'order' => 'ASC',
                                'posts_per_page' => -1
                            ) );
                            if ( $faq->have_posts() ) : 
                                ?>
                                <ul class="faq-list">
                                    <?php while ( $faq->have_posts() ) : $faq->the_post(); ?>
                                        <li class="faq-item p-5 ps-0 pe-0 ps-lg-5 pe-lg-5 d-block">
                                            <h3 class="title d-flex justify-content-between align-items-center">
                                                <span>
                                                    <?php the_title(); ?>
                                                </span>
                                                <i class="fa-solid fa-plus"></i>
                                            </h3>
                                            <div class="text pt-4 d-none">
                                                <?php the_content(); ?>
                                            </div>
                                        </li>     
                                    <?php 
                                        endwhile;
                                        wp_reset_query();
                                        wp_reset_postdata(); 
                                    ?>                                                                                                          
                                </ul>                                 
                                <?php
                            endif;
                        } else {
                            ?>
                                <ul class="faq-list">
                                    <?php for ($i=0; $i < count($args['fields']['custom_faq']); $i++) : ?>
                                        <li class="faq-item p-5 ps-0 pe-0 ps-lg-5 pe-lg-5 d-block">
                                            <h3 class="title d-flex justify-content-between align-items-center">
                                                <span>
                                                    <?php echo $args['fields']['custom_faq'][$i]['title']; ?>
                                                </span>
                                                <i class="fa-solid fa-plus"></i>
                                            </h3>
                                            <div class="text pt-4 d-none">
                                                <?php print $args['fields']['custom_faq'][$i]['text']; ?>
                                            </div>
                                        </li>     
                                    <?php 
                                        endfor;
                                    ?>                                                                                                          
                                </ul> 
                            <?php 
                        }
                        break;
                    case 'text-banner':
                        ?>
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img class="mb-4 pb-2" src="<?php echo $args['fields']['icon']; ?>" />
                            <?php echo $args['fields']['body']; ?>
                            <?php if($args['fields']['botao_cta_label']&&$args['fields']['botao_cta_url']) : ?>
                            <a target="_blank" href="<?php echo $args['fields']['botao_cta_url']; ?>" class="btn d-inline-block mt-5"><?php echo $args['fields']['botao_cta_label']; ?></a>
                            <?php endif; ?>
                        </div>
                        <?php 
                        break;
                    case 'forms':
                        echo do_shortcode('['.$args['fields']['shortcode'].']');
                        break;
                    default:
                        break;
                }
            ?>
            <?php if($args['fields']['carousel'] || ($args['fields']['feature'] === 'grid' && ($args['fields']['card_variation'] === '2' || $args['fields']['card_variation'] === 2))) : ?>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                <?php if($args['fields']['feature']==='testimonials') : ?>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
                <?php endif; ?>
                <script>
                    $(document).ready(function($) {
                        function callback(event) {
                            var resizeEvent = window.document.createEvent('UIEvents'); 
                            resizeEvent.initUIEvent('resize', true, false, window, 0); 
                            window.dispatchEvent(resizeEvent);
                            $(window).trigger('resize');
                        }	      

                        <?php if($args['fields']['feature']==='testimonials') : ?>
                        
                        $('.testimonials-slick').slick({
                            infinite: true,
                            dots: false,
                            adaptiveHeight: true,
                            prevArrow: false,
                            nextArrow: false
                        });    
                        
                        $(".<?php echo $args['block']['id']; ?>-prev").click(function () {
                            $(".testimonials-slick").slick("slickPrev");
                        });

                        $(".<?php echo $args['block']['id']; ?>-next").click(function () {
                            $(".testimonials-slick").slick("slickNext");
                        });
                        
                        <?php endif; ?>

                        var <?php echo $args['block']['id']; ?> = $('.<?php echo $args['block']['id']; ?> .owl-carousel');

                        <?php echo $args['block']['id']; ?>.owlCarousel({
                            <?php if($args['fields']['enable_tabs']) : ?>
                            URLhashListener:true,
                            autoplayHoverPause:true,
                            startPosition: 'URLHash',
                            <?php endif; ?>

                            mouseDrag: true,
                            touchDrag: true,
                            navSpeed: 400,
                            autoplayTimeout: 10000,
                            smartSpeed: 400,
                            dots: false,
                            autoplay: false,
                            loop: false,
                            autoplayHoverPause: true,
                            hidden: false,
                            margin:24,
                            responsiveClass:true,
                            <?php if($args['fields']['feature']==='testimonials') : ?>
                                loop: true,
                                responsive:{
                                    0:{
                                        center:false,
                                        items:1,
                                        margin:0,
                                        startPosition: 0,
                                    }
                                }
                            <?php else : ?>
                            onInitialize: callback,
                            responsive:{
                                <?php if($args['fields']['feature'] === 'grid' && ($args['fields']['card_variation'] === '2' || $args['fields']['card_variation'] === 2)) : ?>
                                0:{
                                    center: true,
                                    items: 2,
                                    margin: 12,
                                    startPosition: 0,
                                }
                                <?php else : ?>
                                    <?php if($args['fields']['enable_tabs']) : ?>
                                    0:{
                                        center:false,
                                        items:1,
                                        margin:12,
                                        startPosition: 0,
                                    },
                                    992:{
                                        items: <?php echo $args['fields']['grid_cols']; ?>,
                                    }                                    
                                    <?php else: ?>
                                    0:{
                                        center:true,
                                        items:2,
                                        margin:12,
                                        startPosition: 0,
                                    },
                                    768:{
                                        center:false,
                                        items: 3,
                                        margin:24,
                                    },
                                    992:{
                                        startPosition: 0,
                                        items: <?php echo $args['fields']['grid_cols']; ?>,
                                    }
                                    <?php endif; ?>
                                <?php endif; ?>
                            }
                            <?php endif; ?>
                        });	

                        $(".<?php echo $args['block']['id']; ?>-next").click(function(e){
                            <?php echo $args['block']['id']; ?>.trigger('next.owl.carousel', [300]);
                        })

                        $(".<?php echo $args['block']['id']; ?>-prev").click(function(e){
                            <?php echo $args['block']['id']; ?>.trigger('prev.owl.carousel', [300]);
                        })
                    });
                </script>
            <?php endif; ?>
        </div>
        <?php if($args['fields']['feature'] === 'testimonials' && $args['fields']['botao_cta_url'] && $args['fields']['botao_cta_label']) : ?>
            <span class="d-flex d-lg-none mt-5 col-12 justify-content-center align-items-center">
                <a href="<?php echo $args['fields']['botao_cta_url']; ?>" title="<?php echo $args['fields']['botao_cta_label']; ?>" class="d-inline-block btn btn-cta"><?php echo $args['fields']['botao_cta_label']; ?></a>
            </span>  
        <?php elseif($args['fields']['feature'] === 'cards' && $args['fields']['botao_cta_url'] && $args['fields']['botao_cta_label']) : ?>
            <span class="d-flex mt-5 col-12 justify-content-center align-items-center">
                <a href="<?php echo $args['fields']['botao_cta_url']; ?>" title="<?php echo $args['fields']['botao_cta_label']; ?>" class="d-inline-block btn btn-cta --variation"><?php echo $args['fields']['botao_cta_label']; ?></a>
            </span>              
        <?php endif; ?>    
    </div>
    <?php if($args['fields']['feature'] === 'text-banner' && $args['fields']['alert']) : ?>
        <div class="advice d-flex justify-content-between flex-md-row">
            <span class="d-inline-block pe-4">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </span>
            <span class="flex-fill">
                <?php echo $args['fields']['alert']; ?>
            </span>
        </div>   
    <?php endif; ?>  
</section>