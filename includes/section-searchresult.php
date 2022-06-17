<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
  <div class="card mb-10">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3><?php the_title(); ?></h3>
      </div>
      <div class="panel-body">
        <div class="col-md-3">
          <img src="<?php the_post_thumbnail_url('post-small');?>" alt="" class="img-responsive">
        </div>
        <div class="col-md-9">
          <p><?php the_excerpt(); ?></p>
          <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-success">Read more</a>
        </div>
      </div>
    </div>
  </div>

<?php endwhile;else : ?>
  <h3> There is no result found for the search <? echo get_seach_query(); ?>
<?php endif; ?>