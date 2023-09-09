<div class="topbar d-none d-lg-block">
    <div class="container">
        <nav class="navigation">
            <?php 
                wp_nav_menu( 
                    array( 
                        'theme_location' => 'topbar', 
                        'menu_class' => 'd-flex flex-wrap align-items-center justify-content-end',   
                        'container' => false
                    ) 
                ); 
            ?>
        </nav>
    </div>
</div>