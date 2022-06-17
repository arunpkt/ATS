<?php get_header('secondary');?>

<section class="custom_content">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
                <h1><?php the_title(); ?></h1>
                <!-- Thumb nail -->
                <?php if(has_post_thumbnail()) : ?>
                    <img src="<?php the_post_thumbnail_url('post-small'); ?>" class="img-responsive center" />
                <?php endif;?>
                
            </div>
        </div>
    </div>
</section>


<?php get_template_part( 'includes/section', 'cars' ); ?>

<?php get_footer();?>