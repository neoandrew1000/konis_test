<?php get_header() ?>
    

    
    <div class="content">
      <div>
        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
          <h1 class="title"><?php the_title(); ?></h1>
          
          <?php the_content(); ?>
          
          
    
        <?php endwhile; else: _e('<p>Извините, но по вашему запросу ничего не найдено!</p>');
        endif;
        ?>
      </div>
    </div>
    

    
    <?php get_footer() ?>