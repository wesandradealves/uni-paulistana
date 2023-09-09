<?php get_header(); ?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<section class="d-block mt-3 mb-3 pb-3 pt-3 mt-lg-5 mb-lg-5 pb-lg-5 pt-lg-5">
    <div class="container overflow-hidden d-flex flex-column flex-lg-row justify-content-between align-items-stretch flex-wrap">
        <div id="search" class="content flex-fill pe-lg-5 single-content">
            <div class="post-header mb-5">
                <img class="d-block img-fluid noticia-banner" src="<?php echo get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_template_directory_uri().'/img/no-banner.png'; ?>" alt="<?php the_title(); ?>">
                <h1 class="title mt-5"><?php the_title(); ?></h1>
                <div class="d-flex align-items-center mt-2 mb-5 post-header-bottom">
                    <div class="col-6">
                        <p class="text"><?php the_time('j/m/Y') ?>, por <?php the_author_meta('display_name', get_post_field('post_author')); ?></p>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <?php echo do_shortcode('[addtoany url="' . get_the_permalink() . '" title="' . get_the_title() . '"]') ?>
                    </div>
                </div>
            </div>
            <div class="blog-container d-block w-100">
                <?php the_content(); ?>
            </div>
            <style>
                .blog-container {
                    height: auto;
                }
                .blog-container h1, .blog-container h2, .blog-container h3, .blog-container h4, .blog-container h5, .blog-container h6 {
                    width: 100%;
                    margin: 2rem 0 1.5rem 0;
                }
                @media screen and (min-width: 768px) {
                    .blog-container h1, .blog-container h2, .blog-container h3, .blog-container h4, .blog-container h5, .blog-container h6 {
                        width: 100%;
                        margin: 2rem 0 1.5rem 0;
                    }
                }
                @media screen and (min-width: 992px) {
                    .blog-container h1, .blog-container h2, .blog-container h3, .blog-container h4, .blog-container h5, .blog-container h6 {
                        width: 80%;
                        margin: 2rem auto 1.5rem auto;
                    }
                }
                .blog-container pre {
                    width: 100%;
                    margin: 2rem 0 1.5rem 0;
                }
                @media screen and (min-width: 768px) {
                    .blog-container pre {
                        width: 80%;
                        margin: 2rem auto 1.5rem auto;
                    }
                }
                @media screen and (min-width: 992px) {
                    .blog-container pre {
                        width: 80%;
                        margin: 2rem auto 1.5rem auto;
                    }
                }
                .blog-container p {
                    width: 100%;
                    font-size: 1.142rem;
                    line-height: 2rem;
                    margin: 0 0 1.5rem 0;
                }
                .blog-container p b, .blog-container p strong {
                    font-weight: bold;
                }
                @media screen and (min-width: 768px) {
                    .blog-container p {
                        width: 80%;
                        font-size: 1.214rem;
                        margin: 0 auto 1.5rem auto;
                    }
                }
                @media screen and (min-width: 992px) {
                    .blog-container p {
                        width: 80%;
                        margin: 0 auto 1.5rem auto;
                    }
                }
                .blog-container p br {
                    margin-bottom: 1.5rem;
                    display: block;
                }
                @media screen and (min-width: 768px) {
                    .blog-container p br {
                        margin-bottom: 2rem;
                    }
                }
                .blog-container iframe {
                    width: 100%;
                    height: 280px;
                    margin: 2rem 0;
                }
                @media screen and (min-width: 768px) {
                    .blog-container iframe {
                        height: 400px;
                    }
                }
                @media screen and (min-width: 992px) {
                    .blog-container iframe {
                        height: 450px;
                        margin: 50px 0;
                    }
                }
                .blog-container img {
                    width: 100%;
                    height: auto;
                    display: block;
                    margin: 2rem 0;
                }
                @media screen and (min-width: 768px) {
                    .blog-container img {
                        margin: 3rem 0;
                    }
                }
                .blog-container ul {
                    width: 100%;
                    height: auto;
                    display: block;
                    list-style: none;
                    padding-left: 15px;
                    margin: 2rem 0;
                }
                @media screen and (min-width: 768px) {
                    .blog-container ul {
                        padding-left: 2rem;
                        width: 80%;
                        margin: 2rem auto;
                    }
                }
                @media screen and (min-width: 992px) {
                    .blog-container ul {
                        width: 80%;
                        margin: 2rem auto 2rem auto;
                    }
                }
                .blog-container ul li {
                    font-size: 1rem;
                    line-height: 2rem;
                    margin-bottom: 1rem;
                }
                @media screen and (min-width: 768px) {
                    .blog-container ul li {
                        font-size: 1.125rem;
                    }
                }
                .blog-container ul li::before {
                    content: "\f324";
                    font-family: 'Font Awesome 5 Free';
                    font-size: 0.857rem;
                    font-weight: 600;
                    color: #d01800;
                    display: inline-block;
                    vertical-align: middle;
                    margin-right: 10px;
                }
                .blog-container ul li:last-child {
                    margin-bottom: 0;
                }
                .blog-container ol {
                    width: 100%;
                    height: auto;
                    display: block;
                    list-style: none;
                    counter-reset: li;
                    padding-left: 1rem;
                }
                @media screen and (min-width: 768px) {
                    .blog-container ol {
                        padding-left: 2rem;
                        width: 80%;
                        margin: 2rem auto;
                    }
                }
                .blog-container ol li {
                    font-size: 1rem;
                    line-height: 2rem;
                    margin-bottom: 10px;
                    counter-increment: li;
                }
                @media screen and (min-width: 768px) {
                    .blog-container ol li {
                        font-size: 1.125rem;
                    }
                }
                .blog-container ol li::before {
                    content: counter(li) ".";
                    color: #d01800;
                    display: inline-block;
                    margin-right: 10px;
                }
                .blog-container ol li:last-child {
                    margin-bottom: 0;
                }
                .blog-container .gallery {
                    width: 100%;
                    height: auto;
                    margin: 2rem auto;
                    display: block;
                }
                @media screen and (min-width: 992px) {
                    .blog-container .gallery {
                        margin: 3rem auto;
                    }
                }
                .blog-container .gallery dt, .blog-container .gallery dl {
                    margin: 0;
                    padding: 0;
                }
                .blog-container .gallery .gallery-item {
                    width: 100%;
                    height: auto;
                    display: block;
                }
                .blog-container .gallery .gallery-item img {
                    width: 100%;
                    height: auto;
                    display: block;
                    padding: 0;
                    margin: 0;
                }
                .blog-container .gallery.gallery-columns-2 {
                    display: grid;
                    grid-gap: 0;
                    grid-template-columns: repeat(2, 1fr);
                    align-items: start;
                    justify-content: stretch;
                }
                .blog-container .gallery.gallery-columns-2 .gallery-item {
                    width: 100%;
                    height: auto;
                }
                .blog-container .gallery.gallery-columns-2 .gallery-item img {
                    width: 100%;
                    max-width: 100%;
                    height: auto;
                    display: block;
                    margin: 0;
                    padding: 0;
                }
                .blog-container .gallery.gallery-columns-3 {
                    display: grid;
                    grid-gap: 0;
                    grid-template-columns: repeat(3, 1fr);
                }
                .blog-container .gallery.gallery-columns-3 .gallery-item {
                    width: 100%;
                    height: auto;
                }
                .blog-container .gallery.gallery-columns-3 .gallery-item img {
                    width: 100%;
                    height: auto;
                    display: block;
                }
                .blog-container .gallery.gallery-columns-4 {
                    display: grid;
                    grid-gap: 0;
                    grid-template-columns: repeat(4, 1fr);
                }
                .blog-container .gallery.gallery-columns-4 .gallery-item {
                    width: 100%;
                    height: auto;
                }
                .blog-container .gallery.gallery-columns-4 .gallery-item img {
                    width: 100%;
                    height: auto;
                    display: block;
                }
                .blog-container .gallery.gallery-columns-5 {
                    display: grid;
                    grid-gap: 0;
                    grid-template-columns: repeat(5, 1fr);
                }
                .blog-container .gallery.gallery-columns-5 .gallery-item {
                    width: 100%;
                    height: auto;
                }
                .blog-container .gallery.gallery-columns-5 .gallery-item img {
                    width: 100%;
                    height: auto;
                    display: block;
                }
                .blog-container .gallery.gallery-columns-6 {
                    display: grid;
                    grid-gap: 0;
                    grid-template-columns: repeat(6, 1fr);
                }
                .blog-container .gallery.gallery-columns-6 .gallery-item {
                    width: 100%;
                    height: auto;
                }
                .blog-container .gallery.gallery-columns-6 .gallery-item img {
                    width: 100%;
                    height: auto;
                    display: block;
                }
                .blog-container .gallery.gallery-columns-7 {
                    display: grid;
                    grid-gap: 0;
                    grid-template-columns: repeat(7, 1fr);
                }
                .blog-container .gallery.gallery-columns-7 .gallery-item {
                    width: 100%;
                    height: auto;
                }
                .blog-container .gallery.gallery-columns-7 .gallery-item img {
                    width: 100%;
                    height: auto;
                    display: block;
                }
                .blog-container .gallery.gallery-columns-8 {
                    display: grid;
                    grid-gap: 0;
                    grid-template-columns: repeat(8, 1fr);
                }
                .blog-container .gallery.gallery-columns-8 .gallery-item {
                    width: 100%;
                    height: auto;
                }
                .blog-container .gallery.gallery-columns-8 .gallery-item img {
                    width: 100%;
                    height: auto;
                    display: block;
                }
                .blog-container .gallery.gallery-columns-9 {
                    display: grid;
                    grid-gap: 0;
                    grid-template-columns: repeat(9, 1fr);
                }
                .blog-container .gallery.gallery-columns-9 .gallery-item {
                    width: 100%;
                    height: auto;
                }
                .blog-container .gallery.gallery-columns-9 .gallery-item img {
                    width: 100%;
                    height: auto;
                    display: block;
                }
                .blog-container .gallery br {
                    display: none;
                }
                .blog-container blockquote {
                    width: 100%;
                    height: auto;
                    display: block;
                    position: relative;
                    margin: 2rem 0;
                    padding: 1rem 0 1rem 3rem;
                    border-left: 2px solid #d5d5d5;
                }
                @media screen and (min-width: 768px) {
                    .blog-container blockquote {
                        width: 80%;
                        margin: 2rem auto;
                    }
                }
                @media screen and (min-width: 992px) {
                    .blog-container blockquote {
                        width: 80%;
                        margin: 3rem auto;
                    }
                }
                .blog-container blockquote::before {
                    content: '\f10d';
                    font-family: "Font Awesome 5 Free";
                    font-weight: 600;
                    top: 0px;
                    left: 1rem;
                    font-size: 2rem;
                    line-height: 2rem;
                    position: absolute;
                    color: #d01800;
                    z-index: 0;
                }
                .blog-container blockquote p {
                    font-weight: bold;
                    font-size: 1.142rem;
                    position: relative;
                    z-index: 1;
                }
                .blog-container blockquote p:last-child {
                    margin-bottom: 0;
                }
            </style>
        </div>

        <?php get_sidebar('search'); ?>
    </div>
</section>
<?php get_footer(); ?>