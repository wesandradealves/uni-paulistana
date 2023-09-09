<?php /* Template Name: Calendário Acadêmico */ ?>
<?php get_header(); ?>
<?php get_template_part('template_parts/page-header', null, array('node' => $post)); ?>
<?php get_template_part('template_parts/page-banner', null, array('node' => $post)); ?>
    <?php the_content(); ?>  
    <style>
      #download-calendar {
        height: auto;
        margin: 0 auto;
      }
      #download-calendar[href="javascript:void(0)"] {
        pointer-events: none;
        background-color: lightgray;
        color: gray;
      }
    </style>
    <?php if(get_field('calendario')) : ?>
      <script>
        $(function (e) {
          let url = "<?php echo get_field('calendario'); ?>";
          $( "#download-calendar" ).css({
            'display': 'inline-flex'
          }).attr('href', url);
          // $( "#download-calendar" ).on( "click", function() {
          //   $('#post_847_block_647534533b790').printThis({ pageTitle: "<?php the_title(); ?>"});
          // });        
        });     
      </script>      
    <?php endif; ?>
<?php get_sidebar('ads'); ?>
<?php get_footer(); ?>