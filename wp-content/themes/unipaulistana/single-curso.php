<?php get_header(); ?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<?php get_template_part('template_parts/page-banner', null, array('node' => $post)); ?>

<section class="section content">
    <div class="container d-flex flex-wrap justify-content-between align-items-stretch">
        <div class="col-12 col-lg-6 pe-lg-5 me-lg-5 single-content">
            <?php the_content(); ?>                    
        </div>
        <aside class="sidebar flex-fill d-flex align-items-center flex-column">
            <div class="float-card overflow-hidden static">
                <img class="thumbnail img-fluid d-none d-lg-block" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                <ul class="float-card-content d-flex align-items-center flex-wrap p-4">
                    <?php if(get_the_terms( $post->ID, 'tipo-de-curso' )) : ?>
                        <li class="col-6 mb-2 pe-2 d-flex align-items-center">
                            <i class="icon me-3"><img src="<?php echo get_template_directory_uri(); ?>/img/a5ad6f07e52847aad8e3.png" alt=""></i>
                            <p>
                                <?php foreach (get_the_terms( $post->ID, 'tipo-de-curso' ) as $term) : ?>
                                    <?php echo $term->name.'<br/>'; ?>
                                <?php endforeach; ?>
                            </p>
                        </li>
                    <?php endif; ?>
                    <li class="col-6 mb-2  ps-2 d-flex align-items-center">
                        <i class="icon me-3"><img src="<?php echo get_template_directory_uri(); ?>/img/d8991be7d530191f6e48.png" alt=""></i>
                        <p><?php echo get_field('info')['turno'] ? get_field('info')['turno'] : '-'; ?></p>
                    </li>
                    <li class="col-6 mb-2  pe-2 d-flex align-items-center">
                        <i class="icon me-3"><img src="<?php echo get_template_directory_uri(); ?>/img/9a3ea25908f78300686c.png" alt=""></i>
                        <p><?php echo get_field('info')['duracao'] ? get_field('info')['duracao'] : '-'; ?></p>
                    </li>
                    <li class="col-6 mb-2  ps-2 d-flex align-items-center">
                        <i class="icon me-3"><img src="<?php echo get_template_directory_uri(); ?>/img/214e5fb85d76f4a87cfd.png" alt=""></i>
                        <p><?php echo get_field('info')['capacidade'] ? get_field('info')['capacidade'] : '-'; ?></p>
                    </li>
                    <li class="col-6 mb-2 d-flex pe-2 align-items-center">
                        <i class="icon me-3"><img src="<?php echo get_template_directory_uri(); ?>/img/5ea8a47d0fcbd36c8b93.png" alt=""></i>
                        <p><?php echo get_field('info')['horas'] ? get_field('info')['horas'] : '-'; ?></p>
                    </li>
                    <?php if(get_the_terms( $post->ID, 'modalidade' )) : ?>
                        <li class="col-6 d-flex ps-2 align-items-center">
                            <i class="icon me-3"><img src="<?php echo get_template_directory_uri(); ?>/img/d789778d99a5ecd6e053.png" alt=""></i>
                            <p>
                                <?php foreach (get_the_terms( $post->ID, 'modalidade' ) as $term) : ?>
                                    <?php echo $term->name.'<br/>'; ?>
                                <?php endforeach; ?>
                            </p>
                        </li>
                    <?php endif; ?>
                </ul>
                <span class="d-none d-lg-block m-4 mt-0">
                    <a target="_blank" href="<?php echo get_field('inscricao') ? get_field('inscricao') : get_permalink( get_page_by_title( 'Contato' ) ) ?>" title="Faça sua inscrição" class="d-inline-block btn btn-cta">Faça sua inscrição</a>
                </span>    
            </div>
            <a target="_blank" href="<?php echo get_field('inscricao') ? get_field('inscricao') : get_permalink( get_page_by_title( 'Contato' ) ) ?>" title="Faça sua inscrição" class="d-block float-btn d-lg-none float-btn btn btn-cta">Faça sua inscrição</a>
        </aside>
    </div>
</section>

<?php if(get_field('slider') && (get_field('slider')['body'])) : ?>
    <section id="onde-vou-trabalhar" class="content onde-vou-trabalhar">
        <div class="no-que-acreditamos col-12">
            <div class="container">
                <div class="section-header col-md-6 p-0 single-content">
                    <?php echo get_field('slider')['body']; ?>
                </div>  
                <?php if( have_rows('slider') ) : ?>
                <div class="d-block mt-5 col-md-6">
                    <div class="owl-carousel owl-theme">
                        <?php while( have_rows('slider') ) : the_row(); 
                            if( have_rows('slide') ): 
                                while ( have_rows('slide') ) : the_row();   
                        ?>
                        <div class="card" data-layout="icon">
                            <div class="card-inner overflow-hidden">
                                <div class="card-info d-flex flex-column justify-content-center align-items-center">
                                    <i class="icon"><img src="<?php echo get_sub_field('icon'); ?>" alt="<?php echo get_sub_field('text'); ?>"></i>
                                    <h3 class="title mt-4"><?php echo get_sub_field('text'); ?></h3>     
                                </div> 
                            </div>
                        </div>  
                        <?php  endwhile; 
                            endif;     
                        endwhile; ?>
                    </div>
                </div> 
                <?php endif; ?>
            </div>

        </div>                
    </section>
<?php endif; ?>

<?php if(get_field('por_que_escolher_a_unipaulistana', 'option') && get_field('por_que_escolher_a_unipaulistana', 'option')['body']) : ?>
<section class="section single-content porque-escolher-a-unipaulistana" id="porque-escolher-a-unipaulistana">
    <div class="container">
        <div class="section-header p-0 single-content">
            <?php echo get_field('por_que_escolher_a_unipaulistana', 'option')['body']; ?>
        </div>  
        <ul class="d-flex mt-5 mt-lg-0 flex-column flex-md-row flex-wrap justify-content-center justify-content-md-start align-items-center">
            <li class="col-6 col-md-auto"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/6566e9f01ab7d16d1fb6.png" alt=""></li>
            <li class="col-6 mt-5 mt-md-0 ms-md-5 col-md-auto"><img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/6241465eaa7c23dcd4c6.png" alt=""></li>
        </ul>
    </div>
</section>
<?php endif; ?>

<section class="section qual-o-valor-do-curso" id="qual-o-valor-do-curso">
    <div class="container">
        <?php if(get_field('por_que_escolher_a_unipaulistana', 'option') && get_field('por_que_escolher_a_unipaulistana', 'option')['slide']) : ?>
            <div class="section-header p-5 col-12 col-lg-7 single-content mb-5">
                <div class="owl-carousel owl-theme">
                    <?php if( have_rows('por_que_escolher_a_unipaulistana', 'option') ) : ?>
                        <?php while( have_rows('por_que_escolher_a_unipaulistana', 'option') ) : the_row(); 
                                    if( have_rows('slide') ): 
                                        while ( have_rows('slide') ) : the_row();   
                                ?>
                                <div class="ps-1 pe-lg-5 me-lg-5 item overflow-hidden">
                                    <img src="<?php echo get_sub_field('icon'); ?>" class="mb-4 d-block" />
                                    <?php echo get_sub_field('body'); ?>
                                </div>
                        <?php  endwhile; 
                            endif;     
                        endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="owl-custom-nav d-flex flex-wrap align-items-center justify-content-between">
                    <a class="qual-o-valor-do-curso-prev"><i class="fa-solid fa-angle-left" aria-hidden="true"></i></a>
                    <a class="qual-o-valor-do-curso-next"><i class="fa-solid fa-angle-right" aria-hidden="true"></i></a>
                </div>   
            </div> 
        <?php endif; ?>

        <?php if(get_field('valor') && get_field('valor')['body']) : ?>
        <div class="d-block single-content price-wrapper">
            <?php echo get_field('valor')['body']; ?>
            <p class="price d-block"><?php echo get_field('valor')['int']; ?></p>

            <?php if( have_rows('valor') ) : ?>
                <div class="d-flex valores mt-4 col-lg-6 align-items-stretch flex-wrap">
                    <?php while( have_rows('valor') ) : the_row(); 
                                if( have_rows('valores') ): 
                                    while ( have_rows('valores') ) : the_row();   
                            ?>
                            <div class="d-block flex-fill pe-4">
                                <div class="valor-inner d-flex flex-column justify-content-center align-items-center p-3">
                                    <?php if(get_sub_field('title')) : ?>
                                    <p class="d-block mb-2"><?php echo get_sub_field('title'); ?></p>
                                    <?php endif; ?>
                                    <?php if(get_sub_field('subtitle')) : ?>
                                    <p class="d-block subtitle <?php if(get_sub_field('text')) : ?> mb-2 <?php endif; ?>"><?php echo get_sub_field('subtitle'); ?></p>
                                    <?php endif; ?>
                                    <?php if(get_sub_field('text')) : ?>
                                        <p class="d-block price mt-2"><?php echo get_sub_field('text'); ?></p>
                                    <?php endif; ?>
                                </div>
                            </diV>
                    <?php  endwhile; 
                        endif;     
                    endwhile; ?>
                </div>
            <?php endif; ?>

            <?php if(get_field('valor')['observacoes']) : ?>
                <p class="d-block mt-3"><small><?php echo get_field('valor')['observacoes']; ?></small></p>
            <?php endif; ?>
        </div>
        <?php endif; ?>
    </div>
</section>

<?php 
    $coordenadores = get_the_terms( $post->ID, 'coordenadores' ); 
?>

<?php if($coordenadores) : ?>
<section class="section author" id="author">
    <div class="container">
        <div class="d-block col-12 col-lg-6">
            <div class="section-header p-0 mb-5 col-12 col-lg-7">
                <h2 class="title">Coordenação</h2>
            </div> 
            <div class="author-block d-flex align-items-center">
                <?php if(get_field('thumbnail', $coordenadores[0])) : ?>
                <span class="avatar">
                    <img src="<?php echo get_field('thumbnail', $coordenadores[0]); ?>" alt="<?php echo $coordenadores[0]->name; ?>">
                </span>
                <?php endif; ?>
                <p class="author-info ps-4 col-lg-5"><?php echo $coordenadores[0]->name; ?></p>
            </div>
            <?php if(get_field('video', $post->ID)) : ?>
            <a href="<?php echo get_field('video', $post->ID); ?>" class="d-block mt-5 glightbox">
                <span class="icon d-flex justify-content-center align-items-center d-flex">
                    <i class="fa-solid fa-play"></i>
                </span>
                <img class="img-fluid d-block" src="https://img.youtube.com/vi/<?php echo explode('=', get_field('video', $post->ID))[1]; ?>/0.jpg" alt="image" />
            </a>    
            <?php endif; ?>  
            <div class="d-block mt-4">
                <div class="single-content">
                    <?php if(get_field('descricao', $coordenadores[0])) : ?>
                        <?php echo get_field('descricao', $coordenadores[0]); ?>
                    <?php else : ?>
                        <p>
                            <?php echo term_description($coordenadores[0]); ?>
                        </p>
                    <?php endif; ?>

                    <?php if(get_field('texto_adicional')) : ?>
                        <div class="mt-4">
                            <?php echo get_field('texto_adicional'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>  
        </div>
    </div>
</section>
<?php endif; ?>

<?php get_sidebar('ads'); ?>
<?php get_footer(); ?>