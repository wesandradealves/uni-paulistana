<aside class="col-12 col-lg-5 sidebar --contact">
    <?php the_content(); ?>

    <?php if ( is_active_sidebar( 'contato' ) ) : ?>
        <?php dynamic_sidebar( 'contato' ); ?>
    <?php endif; ?>

    <ul class="navigation d-flex flex-column flex-wrap mt-5">
        <?php if(get_field('phone', 'option')) : ?>
            <li class="mb-4 pb-2 nav-item d-flex align-items-center">
                <?php  
                    if(stripos( get_field('phone', 'option'), '|' )) {
                        $i = 0;
                        foreach (explode('|', get_field('phone', 'option')) as $phone) {
                            $i++;
                            ?>
                            <span class="d-flex align-items-center me-3">
                                <i class="me-2 <?php if($i===2) : ?> fa-brands fa-whatsapp <?php else : ?> fa-solid fa-phone <?php endif; ?>"></i>
                                <span>
                                    <a data-label="Telefone" class="nav-link <?php if($i===2) : ?> whatsapp-btn <?php endif; ?>" href="<?php if($i===2) : ?>javascript:void(0)<?php else : ?> tel:+55<?php echo preg_replace('/\s+/', '', $phone); ?> <?php endif; ?>" title="<?php echo $phone; ?>">
                                        <span class="d-inline-block"><?php echo $phone; ?></span>
                                    </a>
                                </span>
                            </span>
                            <?php 
                        }
                    } else {
                        ?>
                            <span class="d-flex align-items-center me-3">
                                <i class="me-3 fa-solid fa-phone"></i>
                                <span>
                                    <a data-label="Telefone" class="nav-link" href="tel:+55<?php echo preg_replace('/\s+/', '', get_field('phone', 'option')); ?>" title="<?php echo get_field('phone', 'option'); ?>">
                                        <span class="d-inline-block"><?php echo get_field('phone', 'option'); ?></span>
                                    </a>
                                </span>
                            </span>                        
                        <?php 
                    }
                ?>
            </li>             
        <?php endif; ?>
        <?php if(get_field('contact', 'option')) : ?>
            <li class="mb-4 pb-2 nav-item d-flex align-items-center">
                <i class="me-3 fa-solid fa-envelope"></i>
                <span><a data-label="E-mail" class="nav-link" href="mailto:<?php echo get_field('contact', 'option'); ?>" title="<?php echo get_field('contact', 'option'); ?>"><span class="d-inline-block"><?php echo get_field('contact', 'option'); ?></span></a></span>
            </li>   
        <?php endif; ?>           
        <?php if(get_field('atendimento', 'option')) : ?>
            <li class="mb-4 pb-2 nav-item d-flex align-items-start">
                <i class="me-3 fa-solid fa-calendar"></i>
                <span>
                    <p data-label="Localização" class="nav-link"><span class="d-inline-block"><?php echo get_field('atendimento', 'option'); ?></span></p>
                </span>
            </li>
        <?php endif; ?>                                      
    </ul>
    <?php if( have_rows('social_networks', 'option') ): ?>
        <ul class="social-networks d-flex flex-wrap align-items-center mb-5 mb-lg-0">
            <li class="pe-4"><p class="m-0">Siga-nos: </p></li>
            <?php $i = 0; while( have_rows('social_networks', 'option') ) : $i++; the_row(); ?>
                <li class="nav-item pe-3">
                    <a class="nav-link" target="_blank" href="<?php echo get_sub_field('url'); ?>">
                        <i class="fa-brands <?php echo get_sub_field('icon'); ?>"></i>
                    </a>
                </li>                                
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>    
</aside>
