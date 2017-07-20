<?php get_header() ?>
    

    
    <div class="content">
      <?php dimox_breadcrumbs() ?>
      <div class="single">
        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <?php echo get_the_post_thumbnail(); ?>
          
          <h1 class="title"><?php the_title(); ?></h1>
          
          <?php the_content(); ?>

        <?php endwhile; else: _e('<p>Извините, но по вашему запросу ничего не найдено!</p>');
        endif;
        ?>
      </div>
      
      <p class="random_post">Также Вас может заинтересовать:</p>
	  <div class="post_related">
      <?php $posts = get_posts('orderby=rand&numberposts=3$cat_id=1'); $i=1;
      foreach($posts as $post) { ?>
        <div class="post_block <?=($i==3)?'none_padding':''?> ">
            <div class="categ_miniat"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a></div>
            <h4 class="art_title"><?php the_title(); ?></h4>
            <p class="news_text"><a href="<?php the_permalink(); ?>"><?php kama_excerpt(array('maxchar'=>85)); ?></a></p>
            <a href="<?php the_permalink(); ?>" class="art_link">Узнать подробнее</a>
          </div>
        
      <?php $i=($i==3) ? 1 : $i+1 ; } ?>
	  </div>
      <div class="clear"></div>
    </div>
    

    
    <?php get_footer() ?>