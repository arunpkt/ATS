<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <section class="main_content">
    <div class="container">
        <div class="row">
          <div class="col-md-6">
                <p><?php the_content(); ?></p>

            <!-- Category link -->
                <hr>
                <?php
                  $categories = get_the_category();
                  foreach($categories as $category) : 
                  ?>
                  <a href="<?php echo get_category_link($category -> term_id); ?>" class="btn btn-info">
                    <?php echo $category -> name; ?>
                  </a>
                <?php   
                  endforeach;
                ?>
          </div>
          <div class="col-md-6">
                <ul>
                 <!-- /* <?php if(get_post_meta($post -> ID, 'Color', true)):?>
                    <li>Color : <?php echo get_post_meta($post -> ID, 'Color', true); ?>
                  <?php endif;?>
                  <?php if(get_post_meta($post -> ID, 'Price', true)):?>
                    <li>Color : <?php echo get_post_meta($post -> ID, 'Price', true); ?>
                  <?php endif;?>*/ -->
 
                    <li>Color : <?php the_field('color'); ?>

                    <?php
                      $gallery = get_field('gallery');
                      if($gallery): ?>
                          <img src="<?php echo $gallery ?>" />
                      <?php endif; ?>
                
                </ul>
          </div>
        </div>
    </div>
  </section>
<?php endwhile;else:endif ?>

