<!DOCTYPE html>
<html lang="ru-RU">
<head>
    <meta name="viewport" content="width=device-width" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel='stylesheet' href='/wp-content/themes/konis/style.css' type='text/css' media='all' />
    <title><?php if(is_front_page()):?><?php bloginfo('description');?><?php else:?><?php wp_title( '|', true, 'right' ); ?><?php endif;?></title>
    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>
</head>
<body>
  
  <div class="all">
    
    <div class="header">
      <a href="/" class="logo"></a>
      <div id="mmenu">меню</div>
      <div class="phone">
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Телефон") ) : endif; ?>
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Часы работы") ) : endif; ?>
      </div>
      <div class="recal">
        <p>Мы сами Вам позвоним</p>
        <form action="/ajax/" id="phoneform" method="post" class="ajax">
          <input type="text" id="phone" name="uphone" placeholder="+7 (___) ___-__-__" class="req_phone">
          <input type="hidden" name="thisform" value="actphone">
          
          <input type="submit" class="phone_submit" value=">" >
          <p class="result"></p>
        </form>
      </div>
      <div class="zamer">
        <a href="#zamer" class="modal">выезд на замер</a><br>
        по Симферополю<br>
        <span>бесплатно</span>
      </div>
    </div>
    
    <div class="nav <?=(is_front_page())?'':'nothome'?>">
      <?php wp_nav_menu('menu=menu&container=false'); ?>
    </div>