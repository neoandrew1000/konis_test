<?php get_header() ?>
    

    
    <div class="content_category">
      <div>
        <?php
        $i=1;
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
          <div class="post_block <?=($i==3)?'none_padding':''?> ">
            <div class="categ_miniat"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(); ?></a></div>
            <h4 class="art_title"><?php the_title(); ?></h4>
            <p class="news_text"><a href="<?php the_permalink(); ?>"><?php kama_excerpt(array('maxchar'=>85)); ?></a></p>
            <a href="<?php the_permalink(); ?>" class="art_link">Узнать подробнее</a>
          </div>
          
          
    
        <?php $i=($i==3) ? 1 : $i+1 ; endwhile; else: _e('<p>Извините, но по вашему запросу ничего не найдено!</p>');
        endif;
        ?>
        
      </div>
      <div class="clear"></div>
      <?php wp_corenavi(); ?>
    </div>
    

    
    <?php get_footer() ?>