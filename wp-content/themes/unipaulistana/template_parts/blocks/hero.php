<section data-block-id="<?php echo $args['block']['id']; ?>" id="banner" class="banner">
    <div class="owl-carousel owl-theme">
        <?php 
            foreach ($args['fields']['images'] as $item) {
                ?>
                <div onclick="location.href = '<?php echo $item['url']; ?>';">
                    <picture class="img-fluid">
                        <source srcset="<?php echo $item['image']; ?>" media="(min-width: 640px)" >
                        <img class="img-fluid" src="<?php echo $item['image_mobile'] ? $item['image_mobile'] : $item['image']; ?>" alt="Capa do Instalura">
                    </picture>                        
                </div>                         
                <?php 
            }
        ?>
    </div>
    <?php if($args['fields']['show_bottom']) : ?>
        <div class="banner-footer">
            <div class="container">
                <ul class="d-flex flex-wrap align-items-center justify-content-center">
                    <li><img class="img-fluid" src="<?php echo get_template_directory_uri().'/img/'; ?>selo-conceito-4-mec-unipaulistana.png"></li>
                    <li><img class="img-fluid" src="<?php echo get_template_directory_uri().'/img/'; ?>selo-80-mestres-doutores-unipaulistana.png"></li>
                    <li><img class="img-fluid" src="<?php echo get_template_directory_uri().'/img/'; ?>selo-localizacao-metro-unipaulistana.png"></li>
                    <li class="mt-4 mt-lg-0"><a href="/processo-seletivo" class="content-link">Participe do <small>processo seletivo</small></a></li>
                </ul>
            </div>
        </div>
    <?php endif; ?>
</section>
