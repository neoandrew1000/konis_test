<?php get_header() ?>
    

    
    <div class="content">
    
      <div>
      <div class="cont_left">
        <?php
          if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <h1 class="title"><?php the_title(); ?></h1>
            
            <?php the_content(); ?>
            
            
      
          <?php endwhile; else: _e('<p>Извините, но по вашему запросу ничего не найдено!</p>');
          endif;
          ?>
      </div>
        
        
        <div class="form_block cont_right" style="max-width: 541px;    margin: auto;">
          <form action="/ajax/" method="post" class="ajax" id="cont_form">
            <p>Отправить сообщение</p>
            
            <div class="inpdiv inp1">
              <label for="review_user_name">Ваше имя</label>
              <input type="text" name="review_user_name" id="review_user_name" class="req_name">
            </div>
            
            <div class="inpdiv">
              <label for="review_user_email">Ваш E-mail</label>
              <input type="text" name="review_user_email" id="review_user_email" class="req_email">
            </div>
            <div>
            <label for="review_text">Сообщение</label>
            <textarea name="review_text" id="review_text" class="req_mess"></textarea>
            </div>
            
            <input type="hidden" name="thisform" value="mess">
            
            <input type="submit" class="inpsubm" value="Отправить">
            <p class="result"></p>
          </form>
        </div>
        <div class="clear"></div>
      </div>
    </div>
    

    
    <?php get_footer() ?>