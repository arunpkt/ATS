<?php get_header('secondary');?>

<?php get_template_part( 'includes/section', 'content' ); ?>

<?php if(!is_page('Contact us')) : ?>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php if(is_active_sidebar('page-sidebar')) : ?>
            <?php dynamic_sidebar("page-sidebar"); ?>
          <?php endif;?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<?php get_footer();?>