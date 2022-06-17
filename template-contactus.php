<?php 
/*
Template Name: Contact Us
*/
?>
<?php get_header('secondary');?>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            This is default contact us page
            <h1><?php the_title(); ?></h1>
            <hr>
            <?php get_template_part( 'includes/section', 'content' ); ?>
          </div>
        </div>
    </div>


<?php get_footer();?>