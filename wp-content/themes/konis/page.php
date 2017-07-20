<?php get_header() ?>
    

    
    <div class="content">
    <?php 
$parent_title = get_the_title($post->post_parent); 

$title = get_the_title(); 

if ($parent_title != $title){ 
  dimox_breadcrumbs();
} 
?>
      <div>
        <?php
        if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
         
          <?php if(get_the_ID() == 23) { ?>
          
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
          
          <?php } else if(get_the_ID() == 7) { ?>
          
            <div class="links_block">
              <ul class="lb_ul">
                <li><a href="<?php echo get_permalink(9); ?>"><?php echo get_the_post_thumbnail( 9 ); ?><span><span><?php echo get_the_title( 9 ) ?></span></span></a></li>
                <li><a href="<?php echo get_permalink(11); ?>"><?php echo get_the_post_thumbnail( 11 ); ?><span><span><?php echo get_the_title( 11 ) ?></span></a></li>
                <li><a href="<?php echo get_permalink(13); ?>"><?php echo get_the_post_thumbnail( 13 ); ?><span><span><?php echo get_the_title( 13 ) ?></span></a></li>
              </ul>
              <ul class="lb_ul">
                <li><a href="<?php echo get_permalink(15); ?>"><?php echo get_the_post_thumbnail( 15 ); ?><span><span><?php echo get_the_title( 15 ) ?></span></span></a></li>
                <li><a href="<?php echo get_permalink(17); ?>"><?php echo get_the_post_thumbnail( 17 ); ?><span><span><?php echo get_the_title( 17 ) ?></span></span></a></li>
                <li><a href="<?php echo get_permalink(19); ?>"><?php echo get_the_post_thumbnail( 19 ); ?><span><span><?php echo get_the_title( 19 ) ?></span></span></a></li>
              </ul>
            </div>
          
          <?php } ?>
        
        <?php $urlArr = explode('/', trim($_SERVER['REQUEST_URI'],'/')); ?>
			   <?php if(isset($urlArr['1']) && ($urlArr['1']=='okna' || $urlArr['1']=='dveri' || $urlArr['1']=='avtomaticheskie-vorota'))   { ?>
          <ul class="perecluch">
          <?php 
            echo getPage();
            
          ?>
          
            
          </ul>
          <div class="borderimg">
          <?php the_content(); ?>
          </div>
          <div class="clear"></div>
         
         <?php } else { ?>
          
          
          <?php the_content(); ?>
          
         <?php } ?>
          
          
          
    
        <?php endwhile; else: _e('<p>Извините, но по вашему запросу ничего не найдено!</p>');
        endif;
        ?>
      </div>
    </div>
    

    
    <?php get_footer() ?>