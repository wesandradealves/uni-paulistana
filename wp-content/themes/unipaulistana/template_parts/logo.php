<?php
    $url = get_field($args['template'] === 'header' ? 'logo' : 'alt_logo', 'option'); 
?>
<span class="logo">
    <?php 
        echo '<a href="'.site_url().'" title="'.get_bloginfo('title').'"><img class="img-fluid" alt="'.get_bloginfo('title').'" src="'.$url.'"/></a>';
    ?>
</span>