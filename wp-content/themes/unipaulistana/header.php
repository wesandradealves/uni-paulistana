<!DOCTYPE html>
<?php 
    $title = '';

    if(is_404()) {
        $title = 'Página não encontrada.';
    } elseif(get_queried_object()->name) {
        $title = get_queried_object()->name;
    } elseif(get_queried_object()->name) {
        $title = get_queried_object()->label;
    } else {
        $title = get_queried_object()->post_title;
    }
?>
<html <?php language_attributes(); $lang = explode("lang=",get_language_attributes()); ?>>
<head>
    <title><?php echo get_bloginfo('title').(!is_front_page() ? ' - '.$title : ' - '.get_option('blogdescription')); ?></title>
    <meta charset="<?php echo bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta name="language" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:locale" content="<?php echo str_replace('"','',$lang[1]); ?>" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="<?php echo get_bloginfo('title').' - '.$title; ?>" />
    <meta property="og:description" content="<?php echo get_bloginfo('description'); ?>" />
    <meta property="og:url" content="<?php echo site_url(); ?>" />
    <meta property="og:site_name" content="<?php echo get_bloginfo('title'); ?>" />
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/img/screenshot.png" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="true">
    <link rel="canonical" href="<?php echo site_url(); ?>" />
    <?php 
        wp_meta(); 
        wp_head();
    ?>
</head>
<body style="display: none" <?php body_class( is_tax() ? 'taxonomy--page' : ((is_single()) ? 'taxonomy--single-page' : '') ); ?>>
    <div id="wrap">
        <header id="header" class="header">
            <?php get_template_part('template_parts/topbar'); ?>
            <div class="header-bottom ps-4 pe-4">
                <div class="container d-flex align-items-center justify-content-between">
                	<?php get_template_part('template_parts/logo', null, array('template' => 'header')); ?>
                    <nav class="navigation">
                        <ul class="d-flex align-items-center justify-content-end">
                            <?php 
                                $i = 0;
                                foreach (custom_navigation('main') as $key => $item) {
                                    if($item['show_level_1']) {
                                        echo '<li class="nav-item d-none d-md-block '.(!empty($item['data']) ? ' hasChildren ' : '').($i < count(custom_navigation('main')) ? 'pe-4' : '').'">';
                                            echo '<a target="'.($item->target !== 'Selecione' ? $item->target : '_top').'" class="nav-link" href="'.$item['url'].'" title="'.$item['key'].'">'.$item['key'].(!empty($item['data']) ? '<i class="fa-solid fa-angle-down ps-2"></i>' : '').'</a>';
                                            if(!empty($item['data'])){
                                                $main = $item;
                                                ?>
                                                <div class="submenu">
                                                    <div class="container pt-4 pb-5">
                                                        <div class="pb-3 d-flex align-items-stretch justify-content-between flex-wrap">
                                                            <div class="col-9">
                                                                <h3 class="title mb-3"><?php echo $item['key']; ?></h3>
                                                                <ul class="panels col-6">
                                                                    <?php 
                                                                        foreach ($item['data'] as $item) {
                                                                            ?>
                                                                            <li class="nav-item d-block">
                                                                                <a target="<?php echo $item->target !== 'Selecione' ? $item->target : '_top'; ?>" class="p-4 d-flex align-items-center justify-content-between nav-link" href="<?php echo $item->url; ?>">
                                                                                    <?php echo $item->title; ?> 
                                                                                    <?php if(!empty($item->data)) : ?>
                                                                                        <i class="fa-solid fa-angle-right"></i>
                                                                                    <?php endif; ?>
                                                                                </a>
                                                                                <?php if(!empty($item->data)) : ?>
                                                                                    <ul class="subpanel">
                                                                                        <?php 
                                                                                            foreach ($item->data as $key => $submenu) {
                                                                                                ?>
                                                                                                <li class="nav-item mb-4"><a target="<?php echo $submenu->target !== 'Selecione' ? $submenu->target : '_top'; ?>" href="<?php echo $submenu->url; ?>" class="nav-link"><?php echo $submenu->title; ?></a></li>
                                                                                                <?php 
                                                                                            }
                                                                                        ?>
                                                                                    </ul>
                                                                                <?php endif; ?>
                                                                            </li>                                                                             
                                                                            <?php 
                                                                        }
                                                                    ?>
                                                                </ul>
                                                            </div>
                                                            <?php if($main['item_media']) : ?>
                                                                <div class="flex-fill ps-5">
                                                                    <a target="_blank" href="<?php echo $main['item_media_url']; ?>">
                                                                        <img class="img-fluid" src="<?php echo $main['item_media']; ?>" alt="<?php echo $main['key']; ?>" class="d-block ms-auto">
                                                                    </a>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php 
                                            }
                                        echo '</li>';
                                    }

                                }
                            ?>
                            <li class="nav-item d-md-none">
                                <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                                </button>
                            </li>
                        </ul>  
                    </nav>          
                </div>
            </div>
            <nav class="navigation --mobile ps-4 pe-4">
                <div class="container">
                    <ul class="d-flex flex-column flex-wrap justify-content-between align-items-stretch">
                        <?php 
                            foreach (custom_navigation('footer') as $key => $item) {
                                if(!empty($item['data'])){
                                    echo '<li class="nav-col">';
                                        echo '<h3 class="title d-flex align-items-center justify-content-between">'.$item['key'].' <a href="javascript:void(0)" class="open pt-4 pb-4"><i class="fas fa-angle-down"></i></a></h3>';
                                        echo '<ul class="d-none">';
                                        foreach ($item['data'] as $submenu) {
                                            echo '<li class="nav-item"><a class="nav-link pt-4 pb-4 d-block" href="'.$submenu->url.'">'.$submenu->title.'</a></li>';
                                        }
                                        echo '</ul>';
                                    echo '</li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
            </nav>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css" integrity="sha512-6qkvBbDyl5TDJtNJiC8foyEVuB6gxMBkrKy67XpqnIDxyvLLPJzmTjAj1dRJfNdmXWqD10VbJoeN4pOQqDwvRA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="<?php echo get_template_directory_uri() ?>/js/jquery.mCustomScrollbar.min.js"></script>
            <script src="<?php echo get_template_directory_uri() ?>/js/jquery.mousewheel.min.js"></script>
            <script>
                $(document).ready(function($){
                    $('.subpanel, .faq-list .faq-item .text').mCustomScrollbar({
                        alwaysShowScrollbar: 2
                    });
                });                
            </script>
        </header>
        <main class="main">