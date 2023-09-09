        </main>
        <footer id="footer" class="footer">
            <div class="container pt-5 pb-5">
                <div class="footer-top d-flex flex-wrap justify-content-between align-items-center">
                    <?php get_template_part('template_parts/logo', null, array('template' => 'footer')); ?>
                    <?php if(get_field('qr_code', 'option')) : ?>
                        <div class="qrcode qrcode flex-fill ps-md-4 pe-lg-4 pe-xl-0 mt-5 m-lg-auto p-0 d-flex align-items-center flex-wrap flex-column flex-xl-row">
                            <img class="flex-fill" src="<?php echo get_field('qr_code', 'option'); ?>" alt="<?php echo get_bloginfo('title'); ?>">
                            <p class="mt-3 mt-xl-0 flex-fill text ps-xl-4">Consulte aqui
                            o cadastro
                            da instituição
                            no Sistema
                            e-MEC</p>
                        </div>
                    <?php endif; ?>
                    <nav class="navigation d-flex align-items-end justify-content-end">
                        <ul class="d-flex pe-4 pe-xl-5 me-xxl-5 flex-column flex-wrap justify-content-end">
                            <?php if(get_field('address', 'option')) : ?>
                                <li onclick="location.href='<?php echo get_field('gmaps', 'option'); ?>'" class="nav-item d-flex mb-4 align-items-center justify-content-end">
                                    <i class="me-lg-1 fa-solid fa-location-dot"></i>
                                    <span>
                                        <p data-label="Localização" class="nav-link">
                                            <span class="d-none d-lg-block">
                                                <?php echo get_field('address', 'option'); ?>
                                            </span>
                                        </p>
                                    </span>
                                </li>
                            <?php endif; ?>

                            <?php if(get_field('phone', 'option')) : ?>
                                <li class="nav-item d-flex mb-lg-4 align-items-center justify-content-end flex-column flex-lg-row">
                                    <?php  
                                        if(stripos( get_field('phone', 'option'), '|' )) {
                                            $i = 0;
                                            foreach (explode('|', get_field('phone', 'option')) as $phone) {
                                                $i++;
                                                ?>
                                                <span class="d-flex align-items-center ms-lg-3 mb-3 mb-lg-0">
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
                                                <span class="d-flex align-items-center">
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
                                <li class="nav-item d-flex align-items-center justify-content-end">
                                    <i class="me-lg-2 fa-solid fa-envelope"></i>
                                    <span><a data-label="E-mail" class="nav-link" href="mailto:<?php echo get_field('contact', 'option'); ?>" title="<?php echo get_field('contact', 'option'); ?>"><span class="d-none d-lg-block"><?php echo get_field('contact', 'option'); ?></span></a></span>
                                </li>   
                            <?php endif; ?>                                                      
                        </ul>
                        <?php if( have_rows('social_networks', 'option') ): ?>
                            <ul class="social-networks d-flex flex-column flex-lg-row flex-wrap align-items-center justify-content-end">
                                <?php $i = 0; while( have_rows('social_networks', 'option') ) : $i++; the_row(); ?>
                                    <li class="nav-item pe-lg-2 <?php echo $i < count(get_field('social_networks', 'option')) ? 'pb-1 mb-3' : ''; ?> pb-lg-0 mb-lg-0">
                                        <a target="_blank" class="nav-link" href="<?php echo get_sub_field('url'); ?>">
                                            <i class="fa-brands <?php echo get_sub_field('icon'); ?>"></i>
                                        </a>
                                    </li>                                
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>     
                    </nav>
                </div>
                <div class="footer-bottom">
                    <nav class="navigation">
                        <ul class="d-flex flex-wrap align-items-stretch">
                            <?php 
                                foreach (custom_navigation('footer') as $key => $item) {
                                    if(!empty($item['data'])){
                                        echo '<li class="nav-col col-6 mb-5 mb-lg-0 pe-5">';
                                            echo '<h3 class="title mb-4"><a target="'.($item['target'] !== 'Selecione' ? $item['target'] : '_top').'" href="'.$item['url'].'">'.$item['key'].'</a></h3>';
                                            echo '<ul>';
                                            foreach ($item['data'] as $submenu) {
                                                echo '<li class="nav-item mb-4"><a class="nav-link" href="'.$submenu->url.'">'.$submenu->title.'</a></li>';
                                            }
                                            echo '</ul>';
                                        echo '</li>';
                                    } else {
                                        if($item['show_level_1']) :
                                        echo '<li class="nav-col col-6 mb-5 mb-lg-0 pe-5"><h3 class="title mb-4"><a target="'.($item['target'] !== 'Selecione' ? $item['target'] : '_top').'" href="'.$item['url'].'">'.$item['key'].'</a></h3></li>';
                                        endif;
                                    }
                                }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </footer>
    </div> 
    <!-- <?php if(get_field('whatsapp_form_id', 'option')) : ?>                         -->
        <div class="module-whatsapp" id="module-whatsapp" style="visibility: hidden;">
            <div class="module-whatsapp-btn whatsapp-btn btn-whatsapp-pulse" id="module-whatsapp-btn">
                <div class="whatsapp-icon-message">
                    <div class="whatsapp-icon-message-close">
                        <i class="fas fa-times"></i>
                    </div>
                    <figure>
                        <img src="<?php echo get_template_directory_uri(); ?>/img/whatsapp-unipaulistana.jpg" alt="Thais - WhatsApp | Jet Vap" />
                    </figure>
                    <div class="whatsapp-icon-message-content">
                        <p><strong>Olá! Posso ajudar?</strong> Qualquer coisa me chama aqui, ta?</p>
                    </div>
                </div>
                <a href="https://api.whatsapp.com/send/?phone=55<?php echo str_replace([':', '\\', '/', '*', '-', ' '], '', explode('|', get_field('phone', 'option'))[1]); ?>&text=Olá!" class="module-whatsapp-btn-icon">
                    <i class="fa-solid fa-xmark"></i>
                </a>
            </div>

            <!-- <div class="module-whatsapp-container" id="module-whatsapp-container">
                <div class="module-whatsapp-header">
                    <div class="module-whatsapp-header-icon">
                    </div>
                    <div class="module-whatsapp-header-title">
                        <strong>Comece uma conversa</strong>
                        <p>Cadastre-se para começar uma conversa no <b>WhatsApp</b></p>
                    </div>
                </div>
                <div class="module-whatsapp-content">
                    <div class="module-whatsapp-content-form">
                        <?php echo do_shortcode('[contact-form-7 id="'.get_field('whatsapp_form_id', 'option').'" title="WhatsApp Icon – PT-BR"]'); ?>
                    </div>
                </div>
            </div> -->
        </div>
    <!-- <?php endif; ?> -->
    <?php wp_footer(); ?>
</body>
</html>