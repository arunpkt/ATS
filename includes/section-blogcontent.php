<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <section class="main_content">
    <div class="container">
        <div class="row">
          <div class="col-md-12">
                <p><?php the_content(); ?></p>

                <?php
                  $firstname = get_the_author_meta('first_name');
                  $lastname = get_the_author_meta('last_name');
                ?>
                <p>Created by : <?php echo $firstname . ' ' . $lastname;?> </p>
                <p>Tags : 
                <?php
                  if($tags) :
                  $tags = get_the_tags();
                  foreach($tags as $tag) : 
                  ?>
                  <a href="<?php get_tag_link($tag -> term_id); ?>" class="btn btn-info">
                    <?php echo $tag -> name; ?>
                  </a>
                <?php   
                  endforeach;endif; 
                ?>
                </p>
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
        </div>
    </div>
  </section>
<?php endwhile;else:endif ?>

