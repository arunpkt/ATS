<?php get_header('secondary');?>
<section class="main_content">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1>Seach result for <?php echo get_search_query(); ?></h1>
            <?php get_template_part( 'includes/section', 'searchresult' ); ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
           <?php previous_posts_link()?>
          <?php next_posts_link() ?>
          </div>
        </div>
    </div>
</section>

<?php get_footer();?>