<?php if ( is_active_sidebar( 'ads' ) ) : ?>
    <section class="mt-5 mb-5 pb-4 d-flex justify-content-center align-items-center flex-wrap">
        <div class="container">
            <?php if(get_field('banner_cta', 'option')) : ?>
                <div onclick="location.href = '<?php echo get_field('banner_cta', 'option')['link']; ?>';" class="banner-cta d-flex flex-wrap align-items-stretch">
                    <div class="p-5 pt-lg-4 pb-lg-4 text col-12 col-md-7 d-flex flex-wrap flex-column justify-content-center">
                        <div class="col-lg-9">
                            <?php echo get_field('banner_cta', 'option')['text']; ?>
                        </div>
                    </div>
                    <div class="p-5 pt-lg-4 pb-lg-4 cta flex-fill d-flex flex-wrap flex-column justify-content-center align-items-center">
                        <?php echo get_field('banner_cta', 'option')['label_cta']; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php dynamic_sidebar( 'ads' ); ?>
        </div>
    </section>
<?php endif; ?>