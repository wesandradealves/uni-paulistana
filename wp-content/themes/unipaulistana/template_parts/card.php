<?php 
    if(isset($args['node']->ID)) {
        $nid = $args['node']->ID;
        $title = get_the_title($nid);
        $excerpt = get_the_time('M d', $nid);
        $thumbnail = get_the_post_thumbnail_url($nid) ? get_the_post_thumbnail_url($nid) : 'https://www.charlotteathleticclub.com/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png'; 
        $permalink = get_the_permalink($nid);
    } elseif(isset($args['node']->term_id)) {
        $nid = $args['node']->term_id;
        $thumbnail = get_field('thumbnail', $args['node']) ? get_field('thumbnail', $args['node']) : 'https://www.charlotteathleticclub.com/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png'; 
        $title = $args['node']->name;
        $permalink = get_term_link($args['node']);
    } else {
        $title = isset($args['node']['title']) ? $args['node']['title'] : '';
        $excerpt = isset($args['node']['summary']) ? $args['node']['summary'] : '';
        $thumbnail = isset($args['node']['thumbnail']) ? $args['node']['thumbnail'] : 'https://www.charlotteathleticclub.com/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png';      
        $permalink = isset($args['node']['url']) ? $args['node']['url'] : '';               
    }
?>
<?php
    $data_do_curso    = get_field('expira_em', $args['node']->ID);
    $today = date("Y-m-d");
?>
<div <?php if($data_do_curso && $today > $data_do_curso): ?> disabled <?php endif; ?> data-expirate="<?php echo get_field('expira_em', $args['node']->ID); ?>" <?php if($args['squared']) : ?> smaller <?php endif; ?> <?php if($args['data_hash']) : ?> data-hash="<?php echo  $args['data_hash']; ?>" <?php endif; ?> class="card  <?php if($args['type'] === 'icon' && $args['variation'] !== 2 && $args['variation'] !== '2') : ?> h-100 <?php endif; ?> --variation-<?php echo $args['variation']; ?> <?php if($args['classes']) : ?> <?php echo $args['classes']; ?> <?php endif; ?>"  <?php if($args['type'] !== 'default') : ?> data-layout="<?php echo $args['type']; ?>" <?php endif; ?>  <?php if($args['type'] !== 'icon' && $args['variation'] !== 3) : ?> onclick="location.href = '<?php echo $permalink; ?>';" <?php endif; ?>>
    <div <?php if($args['type'] === 'icon' && ($args['variation'] === 3 || $args['variation'] === '3')) : ?> style="background: url(<?php echo $thumbnail; ?>) center center / cover no-repeat transparent" <?php endif; ?> class="card-inner <?php if($args['type'] === 'icon' && ($args['variation'] !== 2 && $args['variation'] !== '2' && $args['variation'] !== 3 && $args['variation'] !== '3')) : ?> p-5 <?php endif; ?> <?php if($args['variation'] !== 2 && $args['variation'] !== '2') : ?> h-100 <?php endif; ?>  overflow-hidden">
        <?php 
            if($args['type'] === 'info')  {
                if($args['variation'] === 2 || $args['variation'] === '2') {        
                    ?>
                        <div class="thumbnail d-block overflow-hidden img-fluid">
                            <picture>
                                <source srcset="<?php echo $thumbnail; ?>" media="(min-width: 768px)" >
                                <img class="img-fluid" src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>">
                            </picture>    
                            <?php if($args['full']) : ?>
                                <div class="card-info">
                                    <h3 class="title"><?php echo $title; ?></h3>    
                                    <p class="text mt-3"><?php echo $excerpt; ?></p>  
                                </div> 
                            <?php endif; ?>
                        </div>
                        <?php if(!$args['full']) : ?>
                            <div class="card-info mt-3">
                                <h3 class="title"><?php echo $title; ?></h3>    
                                <p class="text mt-3"><?php echo $excerpt; ?></p>  
                            </div> 
                        <?php endif; ?>  
                    <?php 
                } else {
                    ?>
                    <div class="thumbnail d-block overflow-hidden img-fluid">
                        <picture>
                            <source srcset="<?php echo $thumbnail; ?>" media="(min-width: 768px)" >
                            <img class="img-fluid" src="<?php echo $thumbnail; ?>" alt="Capa do Instalura">
                        </picture>    
                        <div class="card-info">
                            <h3 class="title">
                                <?php echo $title; ?>
                            </h3>     
                            <div class="tags mt-2 d-flex w-100 flex-wrap align-items-center">
                                <?php
                                    $terms = get_the_terms( $args['node'], 'modalidade' );
                                    foreach ($terms as $term) {
                                        ?>
                                        <span class="bubble me-2 mb-1"><?php echo $term->name; ?></span>
                                        <?php 
                                    }                                    
                                ?>
                                <!-- <?php
                                    $terms = get_the_terms( $args['node'], 'modalidade' );
                                    foreach ($terms as $term) {
                                        ?>
                                        <span class="bubble me-2 mb-1"><?php echo $term->name; ?></span>
                                        <?php 
                                    }                                    
                                ?>                                 -->
                                <span class="bubble me-2 mb-1">Duração: <?php echo get_field('info', $args['node'])['duracao']; ?></span>
                            </div> 
                        </div> 
                    </div>
                    <?php 
                }
            } else {
                switch ($args['type']) {
                    case 'default':
                        ?>
                        <div class="thumbnail d-block overflow-hidden img-fluid">
                            <picture>
                                <source srcset="<?php echo $thumbnail; ?>" media="(min-width: 768px)" >
                                <img class="img-fluid" src="<?php echo $thumbnail; ?>" alt="<?php echo $title; ?>">
                            </picture> 
                            <h3 class="title"><?php echo $title; ?></h3>                               
                        </div>                    
                        <?php 
                        break;
                    case 'simple':
                        ?>
                        <h3 class="title"><?php echo $title; ?></h3> 
                        <p class="text"><?php echo $excerpt; ?></p>  
                        <a href="<?php echo $url; ?>" class="show-more-btn d-flex align-items-center" title="Ver mais">Ver mais <i class="fa-solid fa-angle-right ms-auto"></i></a>                 
                        <?php 
                        break;
                    case 'icon':
                        ?>
                            <div class="card-info <?php if($args['variation'] !== 2 && $args['variation'] !== '2') : ?> h-100 <?php else : ?> align-items-center <?php endif; ?> <?php if($args['type'] === 'icon' && ($args['variation'] === 3 || $args['variation'] === '3')) : ?> h-100 align-items-center justify-content-center <?php endif; ?> d-flex flex-column">
                                <?php if($args['node']['icon']) : ?>
                                    <i class="icon <?php if($args['enable_tabs']) : ?> d-none d-lg-block <?php endif; ?>"><img src="<?php echo $args['node']['icon']; ?>" alt="<?php echo $args['node']['title']; ?>"></i>
                                <?php endif; ?>
                                <h3 class="title <?php if($args['node']['icon']) : ?> mt-4 <?php endif; ?>"><?php echo $args['node']['title']; ?></h3>     
                                <?php if(($args['variation'] !== 2 && $args['variation'] !== '2') && ($args['variation'] !== 3 && $args['variation'] !== '3')) : ?>
                                    <p class="text pb-5"><?php echo $args['node']['summary']; ?></p> 
                                    <?php if($args['node']['card_cta_label'] && $args['node']['card_cta_url']) : ?>
                                        <a href="<?php echo $args['node']['card_cta_url']; ?>" class="btn d-inline-block mt-auto"><?php echo $args['node']['card_cta_label']; ?></a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div> 
                            <div class="modal d-none flex-column justify-content-center align-items-center w-100 h-100 p-5">
                                <div class="modal-inner p-5 w-100">
                                    <h3 class="title mb-4 d-block w-100"><?php echo $args['node']['title']; ?></h3>
                                    <p class="text d-block w-100"><?php echo $args['node']['summary']; ?></p> 
                                    <a href="javascript:void(0)" class="close">
                                        <i class="fas fa-xmark"></i>
                                    </a>
                                </div>
                            </div>
                        <?php 
                        break;
                    default:
                    break;
                }
            }
        ?>
    </div>
</div>    


