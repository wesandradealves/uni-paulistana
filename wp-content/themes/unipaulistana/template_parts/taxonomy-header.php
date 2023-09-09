
<div id="confira-os-cursos-que-estao-em-alta-na-unipaulistana"  class="confira-os-cursos-que-estao-em-alta-na-unipaulistana pb-lg-5 mb-lg-5 overflow-hidden w-100 d-flex flex-column flex-lg-row justify-content-between align-items-stretch flex-wrap">
    <div class="container d-flex flex-wrap">
        <?php if(get_field('taxonomy_header', get_queried_object())) : ?>
            <div class="section-header d-block p-0 taxonomy-header pt-5 pt-lg-0">
                <?php print get_field('taxonomy_header', get_queried_object()); ?>
            </div>
        <?php endif; ?>
        <?php get_template_part('template_parts/featured-posts', null, array()); ?>
    </div>
</div>
