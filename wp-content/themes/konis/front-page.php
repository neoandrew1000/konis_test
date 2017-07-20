<?php get_header() ?>
    
    <div class="block_slider">
      <?php echo do_shortcode("[metaslider id=66]"); ?>
    </div>
    
    <div class="links_block">
      <ul class="lb_ul">
        <li><a href="<?php echo get_permalink(25); ?>"><?php echo get_the_post_thumbnail( 25 ); ?><span><span><?php echo get_the_title( 25 ) ?></span></span></a></li>
        <li><a href="<?php echo get_permalink(27); ?>"><?php echo get_the_post_thumbnail( 27 ); ?><span><span><?php echo get_the_title( 27 ) ?></span></a></li>
        <li><a href="<?php echo get_permalink(29); ?>"><?php echo get_the_post_thumbnail( 29 ); ?><span><span><?php echo get_the_title( 29 ) ?></span></a></li>
      </ul>
      <ul class="lb_ul">
        <li><a href="<?php echo get_permalink(33); ?>"><?php echo get_the_post_thumbnail( 33 ); ?><span><span><?php echo get_the_title( 33 ) ?></span></span></a></li>
        <li><a href="<?php echo get_permalink(35); ?>"><?php echo get_the_post_thumbnail( 35 ); ?><span><span><?php echo get_the_title( 35 ) ?></span></span></a></li>
        <li><a href="<?php echo get_permalink(31); ?>"><?php echo get_the_post_thumbnail( 31 ); ?><span><span><?php echo get_the_title( 31 ) ?></span></span></a></li>
      </ul>
    </div>
    
    <div class="about">
      <div>
        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
          <h2 class="title"><?php the_title(); ?></h2>
          
          <?php the_content(); ?>
          
          
    
        <?php endwhile; else: _e('<p>Извините, но по вашему запросу ничего не найдено!</p>');
        endif;
        ?>
      </div>
    </div>
    
    <div class="block_articles">
      <div class="ba_left">
        <div class="form_zakaz">
          <p class="fz_title">Вызов мастера на замер</p>
          <form action="/ajax/" method="post" class="ajax" id="front_form">
            <input class="finp req_name" name="uname" placeholder="Ваше имя">
            <input class="finp req_phone" id="uphone" name="uphone" placeholder="+7 (___) ___-__-__">
            <input type="hidden" name="thisform" value="zayav">
            <input type="submit" class="inpsubm" value="Отправить заявку">
            <p class="result"></p>
          </form>
        </div>
        
        <div class="etaps">
          <?php 
          if ( have_posts() ) : // если имеются записи в блоге.
            query_posts('page_id=436');   // указываем ID рубрик, которые необходимо вывести.
            while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
          ?>
          <?php the_content(); ?>
          <?php  endwhile;  // завершаем цикл.
          
          endif;
          /* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */
          wp_reset_query();                
        ?>
        </div>
      </div>
      <div class="ba_right">
      
        <a href="<?php echo get_category_link(1); ?>" class="all_art">Все <?php echo get_cat_name(1) ?></a>
        <h3 class="ba_title"><?php echo get_cat_name(1) ?></h3>
        
        <?php 
          if ( have_posts() ) : // если имеются записи в блоге.
            query_posts('cat=1&posts_per_page=4');   // указываем ID рубрик, которые необходимо вывести.
            while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
          ?>
          <div class="art_bl">
            <div class="atach"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(),'categ'); ?></a></div>
            <h4 class="art_title"><?php the_title(); ?></h4>
            <p class="news_text"><?php kama_excerpt(array('maxchar'=>90)); ?></p>
            <a href="<?php the_permalink(); ?>" class="art_link">Узнать подробнее</a>
          </div>
          <?php  endwhile;  // завершаем цикл.
          
          endif;
          /* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */
          wp_reset_query();                
        ?>
        <div class="clear2"></div>
        <a href="<?php echo get_category_link(2); ?>" class="all_art">Все <?php echo get_cat_name(2) ?></a>
        <h3 class="ba_title"><?php echo get_cat_name(2) ?></h3>
        
        <?php 
          if ( have_posts() ) : // если имеются записи в блоге.
            query_posts('cat=2&posts_per_page=2');   // указываем ID рубрик, которые необходимо вывести.
            while (have_posts()) : the_post();  // запускаем цикл обхода материалов блога
          ?>
          <div class="art_bl">
            <div class="atach"><a href="<?php the_permalink(); ?>"><?php echo get_the_post_thumbnail(get_the_ID(),'categ'); ?></a></div>
            <h4 class="art_title"><?php the_title(); ?></h4>
            <p class="news_text"><?php kama_excerpt(array('maxchar'=>90)); ?></p>
            <a href="<?php the_permalink(); ?>" class="art_link">Узнать подробнее</a>
          </div>
          <?php  endwhile;  // завершаем цикл.
          
          endif;
          /* Сбрасываем настройки цикла. Если ниже по коду будет идти еще один цикл, чтобы не было сбоя. */
          wp_reset_query();                
        ?>
       <div class="clear"></div>
      </div>
    
    </div>
    
    <?php get_footer() ?>