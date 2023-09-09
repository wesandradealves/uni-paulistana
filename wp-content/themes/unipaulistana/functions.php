<?php

function remove_menus()
{
    global $post;

    remove_menu_page("index.php"); //Dashboard

    remove_menu_page("jetpack"); //Jetpack*

    remove_menu_page("edit.php"); //Posts;

    // remove_menu_page( 'upload.php' );                 //Media

    // remove_menu_page( 'edit.php?post_type=page' );    //Pages

    // remove_menu_page( 'edit-comments.php' );          //Comments

    //remove_menu_page( 'themes.php' );                 //Appearance

    // remove_menu_page( 'plugins.php' );                //Plugins

    // remove_menu_page( 'users.php' );                  //Users

    // remove_menu_page( 'tools.php' );                  //Tools

    // remove_menu_page( 'options-general.php' );        //Settings
}

function wp_before_admin_bar_render()
{
    echo '

        <style type="text/css">

            #menu-appearance ul.wp-submenu.wp-submenu-wrap li:not(.wp-submenu-head):not(.hide-if-no-customize),

            #wp-admin-bar-comments,

            #wp-admin-bar-new-content,

            #wp-admin-bar-updates,

            .wp_welcome_panel-hide,

            #wp-admin-bar-wp-logo,

            #wpfooter,

            #footer-upgrade,

            #welcome-panel{

                display: none !important;

            }

        </style>

    ';
}

function prefix_add_footer_styles()
{
    wp_enqueue_style( 'overwrites', get_template_directory_uri().'/css/overwrites.css', array(), filemtime( get_template_directory().'/css/overwrites.css' ) );    
}

function regScripts()
{
    wp_deregister_script("jquery");
    wp_enqueue_script(
        "vendors",
        get_template_directory_uri() . "/js/jquery.js",
        "",
        "",
        false
    );
    wp_enqueue_script('commons', get_template_directory_uri()."/js/main.js", array(), filemtime( get_template_directory().'/js/main.js' ), true);
    wp_enqueue_style( 'style', get_template_directory_uri().'/style.css', array(), filemtime( get_template_directory().'/style.css' ) );    
}

function disable_default_dashboard_widgets()
{
    remove_meta_box("dashboard_right_now", "dashboard", "core");

    remove_meta_box("dashboard_recent_comments", "dashboard", "core");

    remove_meta_box("dashboard_incoming_links", "dashboard", "core");

    remove_meta_box("dashboard_plugins", "dashboard", "core");

    remove_meta_box("dashboard_quick_press", "dashboard", "core");

    remove_meta_box("dashboard_recent_drafts", "dashboard", "core");

    remove_meta_box("dashboard_primary", "dashboard", "core");

    remove_meta_box("dashboard_secondary", "dashboard", "core");
}

if (function_exists("acf_add_options_page")) {
    acf_add_options_page([
        "page_title" => "Theme General Settings",
        "menu_title" => "Theme Settings",
        "menu_slug" => "theme-general-settings",
        "capability" => "edit_posts",
        "redirect" => true,
    ]);
}

function wpb_custom_new_menu()
{
    register_nav_menu("topbar", __("Topbar"));
    register_nav_menu("main", __("Main"));
    register_nav_menu("footer", __("Footer"));
}

function atg_menu_classes($classes, $item, $args)
{
    // if($args->theme_location == 'main') {
    //     $classes[] = 'nav-item p-0 ps-5';
    // } elseif($args->theme_location == 'footer') {
    //     $classes[] = 'nav-item nav-col col-6 mb-5 mb-lg-0 pe-5';
    // }
    $classes[] = "nav-item";
    return $classes;
}

function add_menu_link_class($atts, $item, $args)
{
    $atts["class"] = "nav-link";
    return $atts;
}

function custom_navigation($menu_name)
{
    $locations = get_nav_menu_locations();
    $menu_id = $locations[$menu_name];
    $menuObject = wp_get_nav_menu_object($menu_id);
    $array_menu = wp_get_nav_menu_items($menuObject->slug);
    $menu = [];

    foreach ($array_menu as $key => $item) {
        $menu[$item->ID] = [];
    }

    foreach ($menu as $key => $item) {
        $menu[$key]["data"] = [];

        foreach ($array_menu as $menu_item) {
            if ($menu_item->object_id == $key) {
                $menu[$key]["key"] = $menu_item->post_title;
                $menu[$key]["url"] = $menu_item->url;
                $menu[$key]["show_level_1"] = get_field(
                    "show_level_1",
                    $menu_item->ID
                );
                $menu[$key]["item_media"] = get_field(
                    "item_media",
                    $menu_item->ID
                );
                $menu[$key]["item_media_url"] = get_field(
                    "item_media_url",
                    $menu_item->ID
                );
                $menu[$key]["target"] = get_field("target", $menu_item->ID);
            }
        }

        foreach ($array_menu as $item) {
            $o = new \stdClass();

            if ($key == $item->menu_item_parent) {
                $o->id = $item->ID;
                $o->title = $item->post_title
                    ? $item->post_title
                    : $item->title;
                $o->url = $item->url;
                $o->target = $item->target;
                $o->data = [];

                foreach ($array_menu as $item) {
                    $_o = new \stdClass();

                    if ($o->id == $item->menu_item_parent) {
                        $_o->id = $item->ID;
                        $_o->title = $item->post_title
                            ? $item->post_title
                            : $item->title;
                        $_o->url = $item->url;
                        $_o->target = get_field("target", $item->ID);

                        array_push($o->data, $_o);
                    }
                }

                array_push($menu[$key]["data"], $o);
            }
        }
    }

    return $menu;
}

function breadcrumbs()
{
    global $post;
    global $wpdb;
    $nid = $post->ID;

    $menu_items = wp_get_nav_menu_items("footer");
    $item = current(
        wp_filter_object_list($menu_items, [
            "object_id" => get_queried_object_id(),
        ])
    );
    $parent = $item->menu_item_parent;

    $locations = get_nav_menu_locations();
    $menu_id = $locations["footer"];
    $menuObject = wp_get_nav_menu_object($menu_id);
    $array_menu = wp_get_nav_menu_items($menuObject->slug);

    foreach ($array_menu as $key => $item) {
        if ($item->ID == $parent) {
            $parent = $item;
        }
    }

    return $parent;
}

if (!function_exists("the_widgets_init")) {
    function the_widgets_init()
    {
        if (!function_exists("register_sidebars")) {
            return;
        }
        register_sidebar([
            "id" => "ads",
            "name" => __("Sidebar"),
            "before_widget" => '<aside id="%1$s" class="widget %2$s">',
            "after_widget" => "</aside>",
            "before_title" => "",
            "after_title" => "",
        ]);
    } // End the_widgets_init()
}

function mycustom_wp_redirect()
{
    ?>
 <script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
        event.preventDefault();
        
        var phone = event.detail.inputs[3].value;
        var text = event.detail.inputs[4].value;

        setTimeout(function() { 
        	console.log(event.detail.inputs);
            window.location.href = `https://api.whatsapp.com/send/?phone=${phone}&text=${text}`;
        }, 1000);
   
    }, false );
 </script>
<?php
}

function render_hero_block(
    $block,
    $content = "",
    $is_preview = false,
    $post_id = 0
) {
    $fields = [
        "images" => get_field("images"),
        "show_bottom" => get_field("show_bottom"),
    ];
    get_template_part("template_parts/blocks/hero", "hero", [
        "block" => $block,
        "is_preview" => $is_preview,
        "post_id" => $post_id,
        "fields" => $fields,
    ]);
}

function render_section_block(
    $block,
    $content = "",
    $is_preview = false,
    $post_id = 0
) {
    $fields = [
        "icons" => get_field("icons"),
        "link" => get_field("link"),
        "shortcode" => get_field("shortcode"),
        "alert" => get_field("alert"),
        "icon" => get_field("icon"),
        "video_url" => get_field("video_url"),
        "custom_faq" => get_field("custom_faq"),
        "enable_tabs" => get_field("enable_tabs"),
        "cards" => get_field("cards"),
        "squared" => get_field("squared"),
        "conteudo_personalizado" => get_field("conteudo_personalizado"),
        "background" => get_field("background"),
        "background_color" => get_field("background_color"),
        "botao_cta_label" => get_field("botao_cta_label"),
        "botao_cta_url" => get_field("botao_cta_url"),
        "body" => get_field("body"),
        "image" => get_field("image"),
        "image_mobile" => get_field("image_mobile"),
        "feature" => get_field("feature"),
        "grid_cols" => get_field("grid_cols"),
        "carousel" => get_field("carousel"),
        "cards_type" => get_field("cards_type"),
        "smaller_cards" => get_field("smaller_cards"),
        "card_variation" => get_field("card_variation"),
        "block_id" => $block["id"],
        "show_header" => get_field("show_header"),
        "classes" => get_field("classes"),
        "layout" => get_field("layout"),
        "title" => get_field("title"),
        "subtitle" => get_field("subtitle"),
    ];
    get_template_part("template_parts/blocks/section", "section", [
        "block" => $block,
        "is_preview" => $is_preview,
        "post_id" => $post_id,
        "fields" => $fields,
    ]);
}

// register_post_type('faq', array(

//     'labels' => array(

//         'name' => _x('FAQ', 'post type general name'),

//         'singular_name' => _x('FAQ', 'post type singular name'),

//         'add_new' => _x('Novo', 'FAQ'),

//         'add_new_item' => __('Novo FAQ'),

//         'edit_item' => __('Editar FAQ'),

//         'new_item' => __('Novo FAQ'),

//         'view_item' => __('Ver FAQ'),

//         'search_items' => __('Buscar FAQ'),

//         'not_found' =>  __('Nada encontrado'),

//         'not_found_in_trash' => __('Nada encontrado'),

//         'parent_item_colon' => ''

//     ),

//     'exclude_from_search' => false, // the important line here!

//     'public' => true,

//     'publicly_queryable' => true,

//     'show_ui' => true,

//     'query_var' => true,

//     'rewrite' => true,

//     'show_in_nav_menus' => true,

//     'capability_type' => 'post',

//     'hierarchical' => false,

//     'menu_position' => -1,

//     'supports' => array('title', 'editor')

// ));

register_post_type("testimonials", [
    "labels" => [
        "name" => _x("Depoimentos", "post type general name"),

        "singular_name" => _x("Depoimento", "post type singular name"),

        "add_new" => _x("Novo", "Depoimento"),

        "add_new_item" => __("Novo Depoimento"),

        "edit_item" => __("Editar Depoimento"),

        "new_item" => __("Novo Depoimento"),

        "view_item" => __("Ver Depoimento"),

        "search_items" => __("Buscar Depoimento"),

        "not_found" => __("Nada encontrado"),

        "not_found_in_trash" => __("Nada encontrado"),

        "parent_item_colon" => "",
    ],

    "exclude_from_search" => false, // the important line here!

    "public" => true,

    "publicly_queryable" => true,

    "show_ui" => true,

    "query_var" => true,

    "rewrite" => true,

    "show_in_nav_menus" => true,

    "capability_type" => "post",

    "hierarchical" => false,

    "menu_position" => -1,

    "supports" => ["title", "editor"],
]);

function tabela_de_horas()
{
    $query = new WP_Query([
        "posts_per_page" => -1,
        "post_type" => "curso",
    ]);

    $html = '<div class="ps-lg-5 pe-lg-5 ms-lg-2 me-lg-2 mt-5 mt-md-0">
            <form action="#block_647534533b790" method="GET" class="d-flex align-items-stretch justify-content-between schdule-table flex-column flex-md-row">
                <select required name="c" class="me-3 col-12 col-md-6 p-3 p-md-0">
                    <option>Selecione o curso</option>';

    if ($query->have_posts()):
        while ($query->have_posts()):
            $query->the_post();
            $html .=
                '<option value="' .
                get_the_id() .
                '">' .
                get_the_title() .
                "</option>";
        endwhile;
        wp_reset_query();
        wp_reset_postdata();
    endif;

    $html .= '</select>
                <button class="content-link p-3 p-md-0 flex-fill" style="border: 0">Ver tabela de horas</button>
            </form>';

    if (isset($_GET["c"])) {
        $p = get_post($_GET["c"]);
        $file = get_field("tabela_de_horas", $p->ID);
        if ($p && $file) {
            $html .=
                '<a download class="mt-3 d-inline-flex justify-content-center w-100 btn btn-cta p-3 --variation" href="' .
                $file["url"] .
                '">' .
                $file["filename"] .
                "</a>";
        } else {
            $html .=
                '<p class="mt-3 d-flex align-items-center justify-content-center">Nenhuma tabela encontrada.</p>';
        }
    }

    $html .= "</div>";

    return $html;
}

if (function_exists("register_sidebar")) {
    register_sidebar([
        "id" => "contato",
        "name" => __("Sidebar"),
        "before_widget" => '<aside id="%1$s" class="widget %2$s">',
        "after_widget" => "</aside>",
        "before_title" => "",
        "after_title" => "",
    ]);

    register_sidebar([
        "id" => "map",
        "name" => __("Map Sidebar"),
        "before_widget" => '<aside id="%1$s" class="widget %2$s">',
        "after_widget" => "</aside>",
        "before_title" => "",
        "after_title" => "",
    ]);

    register_sidebar([
        "id" => "search",
        "name" => __("Search Sidebar"),
        "before_widget" => '<aside id="%1$s" class="widget %2$s">',
        "after_widget" => "</aside>",
        "before_title" => "",
        "after_title" => "",
    ]);
}

add_filter("posts_where", "qirolab_posts_where", 10, 2);
function qirolab_posts_where($where, &$wp_query)
{
    global $wpdb;
    if ($title = $wp_query->get("search_title")) {
        $where .=
            " AND " .
            $wpdb->posts .
            ".post_title LIKE '" .
            esc_sql($wpdb->esc_like($title)) .
            "%'";
    }
    return $where;
}

function custom_pre_get_posts($query)
{
    if (
        $query->is_main_query() &&
        !$query->is_feed() &&
        !is_admin() &&
        is_category()
    ) {
        $query->set("page_val", get_query_var("paged"));
        $query->set("paged", 0);
    }
}

add_action("pre_get_posts", "custom_pre_get_posts");

function custom_pagination($numpages = "", $pagerange = "", $paged = "")
{
    if (empty($pagerange)) {
        $pagerange = 2;
    }

    /**
     * This first part of our function is a fallback
     * for custom pagination inside a regular loop that
     * uses the global $paged and global $wp_query variables.
     *
     * It's good because we can now override default pagination
     * in our theme, and use this function in default queries
     * and custom queries.
     */
    global $paged;
    if (empty($paged)) {
        $paged = 1;
    }
    if ($numpages == "") {
        global $wp_query;
        $numpages = $wp_query->max_num_pages;
        if (!$numpages) {
            $numpages = 1;
        }
    }

    /**
     * We construct the pagination arguments to enter into our paginate_links
     * function.
     */
    $pagination_args = [
        "base" => get_pagenum_link(1) . "%_%",
        "format" => "page/%#%",
        "total" => $numpages,
        "current" => $paged,
        "show_all" => false,
        "end_size" => 1,
        "mid_size" => $pagerange,
        "prev_next" => true,
        "prev_text" => __("&laquo;"),
        "next_text" => __("&raquo;"),
        "type" => "plain",
        "add_args" => false,
        "add_fragment" => "",
    ];

    $paginate_links = paginate_links($pagination_args);

    if ($paginate_links) {
        echo "<nav class='custom-pagination'>";
        echo $paginate_links;
        echo "</nav>";
    }
}

function my_mce4_options($init)
{
    $custom_colours = '
        "3366FF", "Color 1 name",
        "CCFFCC", "Color 2 name",
        "FFFF00", "Color 3 name",
        "99CC00", "Color 4 name",
        "FF0000", "Color 5 name",
        "FF99CC", "Color 6 name",
        "CCFFFF", "Color 7 name",
        "FFFFFF", "Color 8 name"
    ';

    // build colour grid default+custom colors
    $init["textcolor_map"] = "[" . $custom_colours . "]";

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init["textcolor_rows"] = 1;

    return $init;
}
add_filter("tiny_mce_before_init", "my_mce4_options");

add_action("wpcf7_mail_sent", "save_my_form_data_to_my_cpt");
add_action("wpcf7_mail_failed", "save_my_form_data_to_my_cpt");

// function cptui_register_my_cpts_eventos() {

// 	/**
// 	 * Post Type: Eventos.
// 	 */

// 	$labels = [
// 		"name" => esc_html__( "Eventos", "unipaulistana" ),
// 		"singular_name" => esc_html__( "Evento", "unipaulistana" ),
// 	];

// 	$args = [
// 		"label" => esc_html__( "Eventos", "unipaulistana" ),
// 		"labels" => $labels,
// 		"description" => "",
// 		"public" => true,
// 		"publicly_queryable" => true,
// 		"show_ui" => true,
// 		"show_in_rest" => true,
// 		"rest_base" => "",
// 		"rest_controller_class" => "WP_REST_Posts_Controller",
// 		"rest_namespace" => "wp/v2",
// 		"has_archive" => false,
// 		"show_in_menu" => true,
// 		"show_in_nav_menus" => true,
// 		"delete_with_user" => false,
// 		"exclude_from_search" => true,
// 		"capability_type" => "post",
// 		"map_meta_cap" => true,
// 		"hierarchical" => false,
// 		"can_export" => true,
// 		"rewrite" => [ "slug" => "eventos", "with_front" => true ],
// 		"query_var" => true,
// 		"menu_position" => -1,
// 		"menu_icon" => "dashicons-calendar",
// 		"supports" => [ "title", "editor", "custom-fields" ],
// 		"show_in_graphql" => false,
// 	];

// 	register_post_type( "eventos", $args );
// }

// add_action( 'init', 'cptui_register_my_cpts_eventos' );

function save_my_form_data_to_my_cpt($contact_form)
{
    if ($contact_form->id === 1585) {
        $submission = WPCF7_Submission::get_instance();
        if (!$submission) {
            return;
        }
        $posted_data = $submission->get_posted_data();
        //The Sent Fields are now in an array
        //Let's say you got 4 Fields in your Contact Form
        //my-email, my-name, my-subject and my-message
        //you can now access them with $posted_data['my-email']
        //Do whatever you want like:
        $new_post = [];
        if (isset($posted_data["email"]) && !empty($posted_data["email"])) {
            $new_post["post_title"] = $posted_data["email"];
        }
        $new_post["post_type"] = "newsletter"; //insert here your CPT
        $new_post["post_status"] = "publish";
        //you can also build your post_content from all of the fields of the form, or you can save them into some meta fields
        // if(isset($posted_data['my-email']) && !empty($posted_data['my-email'])){
        //     $new_post['meta_input']['sender_email_address'] = $posted_data['my-email'];
        // }
        // if(isset($posted_data['my-name']) && !empty($posted_data['my-name'])){
        //     $new_post['meta_input']['sender_name'] = $posted_data['my-name'];
        // }
        //When everything is prepared, insert the post into your Wordpress Database
        if ($post_id = wp_insert_post($new_post)) {
            //Everything worked, you can stop here or do whatever
        } else {
            //The post was not inserted correctly, do something (or don't ;) )
        }
    }
    return;
}

function calendar()
{
    return '<script src="https://events.timely.fun/embed.js" data-src="https://events.timely.fun/eax33rmz/month?lang=pt-BR" data-max-height="0"  id="timely_script" class="timely-script"></script>';
}

// function target_product_cat_query_with_conditional_tags( $query ) {
//     $custom_post_type = 'curso';
//     $custom_taxonomy = 'tipo-de-curso';
//     $term_ids_form_field_name = 'tipo-de-curso';

//     if ( $query->is_search() &&
//         isset( $_GET[ $term_ids_form_field_name ] ) &&
//         ! empty( $_GET[ $term_ids_form_field_name ] )
//     ) {

//         // Get the tipo-de-curso-term-ids and add them to the tax_query
//         $related_term_id_list = $_GET[ $term_ids_form_field_name ];
//         $related_term_ids = explode( ',', $related_term_id_list );

//         $tax_query = array(
//             array(
//                 'taxonomy' => $custom_taxonomy,
//                 'field' => 'term_id',
//                 'terms' => $related_term_ids
//             )
//         );
//         $query->set( 'tax_query', $tax_query );
//     }
// }

// add_action( 'pre_get_posts', 'target_product_cat_query_with_conditional_tags' );

function my_search_form($form)
{
    global $template;
    $template = str_replace(".php", "", basename($template));
    $post_type = isset($_GET["post_type"]) ? $_GET["post_type"] : "curso";

    if (
        (is_archive() && get_queried_object()->name === "curso") ||
        (is_tax() && get_queried_object()->taxonomy !== "categoria")
    ) {
        $post_type = "curso";
    } else {
        $post_type = "noticia";
    }

    $form =
        '
    <form class="d-block" id="search" action="' .
        home_url("/") .
        '" method="get">
        <div class="d-flex flex-wrap mb-4 searchbar">
            <input type="hidden" name="post_type" value="' .
        $post_type .
        '" />
            <input id="s" name="s" type="text" value="' .
        get_search_query() .
        '" />
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        <ul class="filters d-block">';
    if (
        ((is_search() || is_archive()) &&
            get_queried_object()->name === "curso") ||
        (is_tax() && get_queried_object()->taxonomy !== "categoria")
    ) {
        $modalidade = get_terms([
            "taxonomy" => "tipo-de-curso",
            "hide_empty" => false,
        ]);

        if ($modalidade) {
            $form .= '<h3 class="title mb-4">Categoria</h3>';
            foreach ($modalidade as $term) {
                $form .=
                    '<li class="mb-4 d-flex flex-wrap align-items-center">';
                $form .=
                    '<a class="d-flex align-items-center" href="' .
                    get_term_link($term) .
                    '"><i class="fas me-3 fa-solid fa-angle-right"></i> ' .
                    $term->name .
                    "</a>";
                // $form .= '<span class="custom-checkbox">';
                //     $form .= '<input '.(isset($_GET['mod']) && $_GET['mod'] === $term->name ? 'checked' : '').' name="modalidade[]" value="'.$term->slug.'" type="radio">';
                //     $form .= '<label for="modalidade"></label>';
                // $form .= '</span>';
                // $form .= '<label class="ps-3" for="filter">'.$term->name.'</label>';
                $form .= "</li>";
            }
        }

        $modalidade = get_terms([
            "taxonomy" => "modalidade",
            "hide_empty" => false,
        ]);

        if ($modalidade) {
            $form .= '<li class=" mb-4"><h3 class="title">Modalidade</h3></li>';
            foreach ($modalidade as $term) {
                $form .=
                    '<li class="mb-4 d-flex flex-wrap align-items-center">';
                $form .=
                    '<a class="d-flex align-items-center" href="' .
                    get_term_link($term) .
                    '"><i class="fas me-3 fa-solid fa-angle-right"></i> ' .
                    $term->name .
                    "</a>";
                // $form .= '<span class="custom-checkbox">';
                //     $form .= '<input '.(isset($_GET['mod']) && $_GET['mod'] === $term->name ? 'checked' : '').' name="modalidade[]" value="'.$term->slug.'" type="radio">';
                //     $form .= '<label for="modalidade"></label>';
                // $form .= '</span>';
                // $form .= '<label class="ps-3" for="filter">'.$term->name.'</label>';
                $form .= "</li>";
            }
        }

        $tags = get_terms([
            "taxonomy" => "duracao",
            "hide_empty" => false,
        ]);

        if ($tags) {
            $form .= '<li class=" mb-4"><h3 class="title">Duração</h3></li>';
            foreach ($tags as $term) {
                $form .=
                    '<li class="mb-4 d-flex flex-wrap align-items-center">';
                $form .=
                    '<a class="d-flex align-items-center" href="' .
                    get_term_link($term) .
                    '"><i class="fas me-3 fa-solid fa-angle-right"></i> ' .
                    $term->name .
                    "</a>";
                // $form .= '<span class="custom-checkbox">';
                //     $form .= '<input '.(isset($_GET['mod']) && $_GET['mod'] === $term->name ? 'checked' : '').' name="modalidade[]" value="'.$term->slug.'" type="radio">';
                //     $form .= '<label for="modalidade"></label>';
                // $form .= '</span>';
                // $form .= '<label class="ps-3" for="filter">'.$term->name.'</label>';
                $form .= "</li>";
            }
        }
    } else {
        $modalidade = get_terms([
            "taxonomy" => "categoria",
            "hide_empty" => false,
        ]);

        if ($modalidade) {
            $form .= '<li class=" mb-4"><h3 class="title">Categoria</h3></li>';
            foreach ($modalidade as $term) {
                $form .=
                    '<li class="mb-4 d-flex flex-wrap align-items-center">';
                $form .=
                    '<a class="d-flex align-items-center" href="' .
                    get_term_link($term) .
                    '"><i class="fas me-3 fa-solid fa-angle-right"></i> ' .
                    $term->name .
                    "</a>";
                // $form .= '<span class="custom-checkbox">';
                //     $form .= '<input '.(isset($_GET['mod']) && $_GET['mod'] === $term->name ? 'checked' : '').' name="categoria[]" value="'.$term->slug.'" type="radio">';
                //     $form .= '<label for="categoria"></label>';
                // $form .= '</span>';
                // $form .= '<label class="ps-3" for="filter">'.$term->name.'</label>';
                $form .= "</li>";
            }
        }

        $noticias = new WP_Query([
            "post_type" => "noticias",
            "order" => "DESC",
            "posts_per_page" => 4,
        ]);

        if ($noticias->have_posts()) {
            $form .=
                '<li class=" mb-4"><h3 class="title">POSTS RECENTES</h3></li>';
            $form .= '<ul class="recent-posts">';
            while ($noticias->have_posts()) {
                $noticias->the_post();
                $form .=
                    '<li class="d-flex align-items-center item mb-4" onclick="location.href = ' .
                    get_the_permalink() .
                    ';">';
                $form .=
                    '<div class="thumbnail" style="background-image: url(' .
                    (get_the_post_thumbnail_url()
                        ? get_the_post_thumbnail_url()
                        : "https://www.charlotteathleticclub.com/assets/camaleon_cms/image-not-found-4a963b95bf081c3ea02923dceaeb3f8085e1a654fc54840aac61a57a60903fef.png") .
                    ');" class="thumbnail"></div>';
                $form .= '<div class="flex-fill ps-4">';
                $form .=
                    '<h3><a href="' .
                    get_the_permalink() .
                    '">' .
                    get_the_title() .
                    "</a></h3>";
                $form .= "</div>";
                $form .= "</li>";
            }
            wp_reset_query();
            wp_reset_postdata();
            $form .= "</ul>";
        }
    }
    $form .= '</ul>
    </form>';
    if (
        ((is_search() || is_archive()) &&
            get_queried_object()->name === "noticias") ||
        (is_search() &&
            $_GET["post_type"] &&
            $_GET["post_type"] === "noticia") ||
        (is_tax() && get_queried_object()->taxonomy === "categoria") ||
        (is_single() && get_post_type() === "noticias")
    ) {
        $form .= '<div class="d-block newsletter filters-group">';
        $form .= '<h3 class="title mb-2">CADASTRE-SE NA NOSSA NEWSLETTER</h3>';
        $form .=
            '<p class="text mb-4">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy</p>';
        $form .= do_shortcode('[contact-form-7 id="1585" title="Newsletter"]');
        $form .= "</div>";
    }

    return $form;
}

add_filter("get_search_form", "my_search_form");

// $option_posts_per_page = get_option( 'posts_per_page' );

// add_action( 'init', 'my_modify_posts_per_page', 0);

// function my_modify_posts_per_page() {
//     add_filter( 'option_posts_per_page', 'my_option_posts_per_page' );
// }

// function my_option_posts_per_page( $value ) {
//     global $option_posts_per_page;
//     if ( is_tax( 'post_tag') ) {
//         return 2;
//     } else {
//         return $option_posts_per_page;
//     }
// }

function my_change_sort_order($query){
    $query->set( 'order', 'DESC' );  
};
function add_author_support_to_posts() {
    add_post_type_support( 'noticias', 'author' ); 
}
add_action( 'init', 'add_author_support_to_posts' );

add_action( 'pre_get_posts', 'my_change_sort_order'); 
add_action("wp_footer", "mycustom_wp_redirect");
add_shortcode("calendar", "calendar");
add_shortcode("schedule-table", "tabela_de_horas");
add_action("get_footer", "prefix_add_footer_styles");
add_theme_support("post-thumbnails", ["post", "page", "noticias", "curso"]);
add_action("init", "the_widgets_init");
add_filter("nav_menu_link_attributes", "add_menu_link_class", 1, 3);
add_filter("nav_menu_css_class", "atg_menu_classes", 1, 3);
// add_action( 'after_setup_theme', 'wpse_228223_verify_caller_file' );
add_action("init", "wpb_custom_new_menu");
add_action("wp_enqueue_scripts", "regScripts");
add_action("admin_menu", "remove_menus");
// add_action('wp_before_admin_bar_render', 'wp_before_admin_bar_render');
add_action("admin_menu", "disable_default_dashboard_widgets");
add_filter( 'wp_is_large_user_count', '__return_false' );