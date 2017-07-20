<?php 
/*
 Plugin Name: Advanced User Reviews
 Description: Отзывы на сайте
 Version: 1.0
 Author: Волков Вячеслав (VeXell)
 Author URI: http://vexell.ru/
*/
 //ini_set('display_errors', '1');
 //ini_set('error_reporting', E_ALL);
// Stop direct call
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) { die('You are not allowed to call this page directly.'); }

if (!class_exists('AdvUserReviews')) {
 class AdvUserReviews {
 
	## Хранение внутренних данных
	public $data = array();
	
	## Конструктор объекта
	## Инициализация основных переменных
	function AdvUserReviews()
	{
		global $wpdb;
		
		## Объявляем константу инициализации нашего плагина
		DEFINE('AdvUserReviews', true);
		
		## Название файла нашего плагина 
		$this->plugin_name = plugin_basename(__FILE__);
		
		## URL адресс для нашего плагина
		$this->plugin_url = trailingslashit(WP_PLUGIN_URL.'/'.dirname(plugin_basename(__FILE__)));
		
		## Таблица для хранения наших отзывов
		## обязательно должна быть глобально объявлена перменная $wpdb
		$this->tbl_adv_reviews   = $wpdb->prefix . 'adv_reviews';
		
		## Функция которая исполняется при активации плагина
		register_activation_hook( $this->plugin_name, array(&$this, 'activate') );
		
		## Функция которая исполняется при деактивации плагина
		register_deactivation_hook( $this->plugin_name, array(&$this, 'deactivate') );
		
		##  Функция которая исполняется удалении плагина
		register_uninstall_hook( $this->plugin_name, array(&$this, 'uninstall') );
		
		// Если мы в адм. интерфейсе
		if ( is_admin() ) {
			
			// Добавляем стили и скрипты
			add_action('wp_print_scripts', array(&$this, 'admin_load_scripts'));
			add_action('wp_print_styles', array(&$this, 'admin_load_styles'));
			
			// Добавляем меню для плагина
			add_action( 'admin_menu', array(&$this, 'admin_generate_menu') );
			
		} else {
		    // Добавляем стили и скрипты
			add_action('wp_print_scripts', array(&$this, 'site_load_scripts'));
			add_action('wp_print_styles', array(&$this, 'site_load_styles'));
			
			add_shortcode('show_reviews', array (&$this, 'site_show_reviews'));
      add_shortcode('post_reviews', array (&$this, 'site_post_reviews'));
      add_shortcode('show_reviews_front', array (&$this, 'site_show_reviews_front'));
		}
	}
  
  /** Активация плагина */
	function activate() 
	{
		global $wpdb;
		
		require_once(ABSPATH . 'wp-admin/upgrade-functions.php');
		
		$table	= $this->tbl_adv_reviews;
		
		## Определение версии mysql
		if ( version_compare(mysql_get_server_info(), '4.1.0', '>=') ) {
			if ( ! empty($wpdb->charset) )
				$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
			if ( ! empty($wpdb->collate) )
				$charset_collate .= " COLLATE $wpdb->collate";
		}
		
		## Структура нашей таблицы для отзывов
		$sql_table_adv_reviews = "
				CREATE TABLE `".$wpdb->prefix."adv_reviews` (
					`ID` INT(10) UNSIGNED NULL AUTO_INCREMENT,
					`review_title` VARCHAR(255) NOT NULL DEFAULT '0',
					`review_text` TEXT NOT NULL,
					`review_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
					`review_user_name` VARCHAR(200) NULL,
					`review_user_email` VARCHAR(200) NULL,
					`review_status` INT(10),
					PRIMARY KEY (`ID`)
				)".$charset_collate.";";
		
		## Проверка на существование таблицы	
		if ( $wpdb->get_var("show tables like '".$table."'") != $table ) {
			dbDelta($sql_table_adv_reviews);
		}
		
	}
  
  function deactivate() 
	{
		return true;
	}
	
	/**
	 * Удаление плагина
	 */
	function uninstall() 
	{
		global $wpdb;
		
		$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}adv_reviews");
	}
	
	/**
	 * Загрузка необходимых скриптов для страницы управления в панели администрирования
	 */
	function admin_load_scripts()
	{
		// Региестрируем скрипты
		wp_register_script('advReviewsAdminJs', $this->plugin_url . 'js/admin-scripts.js' );
		wp_register_script('jquery', $this->plugin_url . 'js/jquery-1.4.2.min.js' );
		
		// Добавляем скрипты на страницу
		wp_enqueue_script('advReviewsAdminJs');
		wp_enqueue_script('jquery');
	}
	
	/**
	 * Загрузка необходимых стилей для страницы управления в панели администрирования
	 */
	function admin_load_styles()
	{	
		// Регистрируем стили 
		wp_register_style('advReviewsAdminCss', $this->plugin_url . 'css/admin-style.css' );
		// Добавляем стили
    wp_enqueue_style('advReviewsAdminCss');
	}
	
	/**
 	 * Генерируем меню
	 */
	function admin_generate_menu()
	{
		// Добавляем основной раздел меню
		add_menu_page('Модуль управления отзывами', 'Отзывы', 'manage_options', 'edit-reviews', array(&$this, 'admin_edit_reviews'));
		// Добавляем дополнительный раздел
		add_submenu_page( 'edit-reviews', 'Управление содержимом', 'О плагине', 'manage_options', 'plugin_info', array(&$this,'admin_plugin_info'));
	}
	
	/**
	 * Выводим список отзывов для редактирования
	 */
	public function admin_edit_reviews()
	{
		global $wpdb;
		
		$action = isset($_GET['action']) ? $_GET['action'] : null ;
		
		switch ($action) {
		
			case 'edit':
				
				$this->data['review'] = $this->db_rev($action); // Получаем данные из БД
				
				include_once('edit_review.php'); // Подключаем страницу для отображения результатов 
        break;
			
			case 'submit':
        
        $this->db_rev($action);
				
				$this->admin_show_reviews(); // Показываем список отзывов
        break;
			
			case 'delete':
			
				$this->db_rev($action); // Удаляем существующую запись

				$this->admin_show_reviews(); // Показываем список отзывов
        break;
			
			default:
				$this->admin_show_reviews();
		}
		
	}
	
	/**
	 * Функция для отображения списка отзывов в адм. панели
	 */
	private function admin_show_reviews()
	{
		global $wpdb;
		
		// Получаем данные из БД
		$this->data['reviews'] 	 = $wpdb->get_results("SELECT * FROM `" . $this->tbl_adv_reviews . "`", ARRAY_A);
		
		// Подключаем страницу для отображения результатов 
		include_once('view_reviews.php');
	}
  
  /** Method for works in DB */
  private function db_rev($action, $page=1)
  {
    global $wpdb;
    
    if($action == 'delete')
    {
      $wpdb->query("DELETE FROM `".$this->tbl_adv_reviews."` WHERE `ID` = '". (int)$_GET['id'] ."'");
    }
    else if($action == 'submit')
    {
      $inputData = array(
            'review_status' 	 => strip_tags($_POST['review_status']),
            'review_text' 		 => strip_tags($_POST['review_text']),
          'review_user_name' 	 => strip_tags($_POST['review_user_name']),
          'review_user_email'  => strip_tags($_POST['review_user_email']),
				);
			
      $editId=intval($_POST['id']);
    
      if ($editId == 0) return false;
    
      // Обновляем существующую запись
      $wpdb->update( $this->tbl_adv_reviews, $inputData, array( 'ID' => $editId ));
    }
    else if($action == 'edit')
    {
      return $wpdb->get_row("SELECT * FROM `" . $this->tbl_adv_reviews . "` WHERE `ID`= ". (int)$_GET['id'], ARRAY_A);
    }
    else if($action == 'all_show')
    {
      $start = $page*5-5;
      return $wpdb->get_results("SELECT * FROM `" . $this->tbl_adv_reviews . "` WHERE `review_status` = 1 ORDER by id DESC LIMIT {$start}, 5", ARRAY_A);
    }
    else if($action == 'last')
    {
      return $wpdb->get_results("SELECT * FROM `" . $this->tbl_adv_reviews . "` WHERE `review_status` = 1 ORDER by id DESC LIMIT 6", ARRAY_A);
    }
    else if($action == 'count')
    {
      return $wpdb->get_results("SELECT COUNT(*) as count_r FROM `" . $this->tbl_adv_reviews . "` WHERE `review_status` = 1", ARRAY_A);
    }
    else if($action == 'insert')
    {
      $inputData = array(
        'review_photo' 	  	=> 'not.png',
        'review_text' 		  => strip_tags($_POST['review_text']),
        'review_user_name' 	=> strip_tags($_POST['review_user_name']),
        'review_user_name' 	 => strip_tags($_POST['review_user_name']),
        'review_user_email'  => strip_tags($_POST['review_user_email']),
        'review_status' 	  => 0,
      );
      
      // Добавляем новый отзыв на сайт	
      $wpdb->insert( $this->tbl_adv_reviews, $inputData );
      return $wpdb->insert_id;
    }
      
  }
	
	/** Показываем статическую страницу - о плагине */
	public function admin_plugin_info()
	{
		include_once('plugin_info.php');
	}
	
	function site_load_scripts()
	{
		wp_register_script('jquery', $this->plugin_url . 'js/jquery-1.4.2.min.js' );
		wp_register_script('advReviewsJs', $this->plugin_url . 'js/site-scripts.js' );
		wp_enqueue_script('jquery');
		wp_enqueue_script('advReviewsJs');
	}

	function site_load_styles()
	{
		wp_register_style('advReviewsCss', $this->plugin_url . 'css/site-style.css' );
		wp_enqueue_style('advReviewsCss');
	}
	
	/**
	 * Список отзывов на сайте
	 */
  public function site_post_reviews($atts, $content=null)
  {
    if (isset($_POST['action']) ) 
    {
      if($_POST['action'] == 'add-review')
      {
          $id = $this->add_user_review();
      }
      else if($_POST['action'] == 'show-review')
      {
          $this->site_show_reviews_two('');
      }
		}
  }
     
	public function site_show_reviews()
	{
		global $wpdb;
		$page = (isset($_GET['pr']))?(int)$_GET['pr']:1;
    $page = ($page != 0)? $page : 1;
		// Выбираем все отзывы из Базы Данных
    $count = $this->db_rev('count');
    $this->data['rev_count'] = ceil($count[0]['count_r']/5);
    
    //print_r($this->data);exit;
    
		$this->data['reviews'] = $this->db_rev('all_show', $page);
		$this->data['page'] = $page;
		## Включаем буферизацию вывода
		ob_start ();
		include_once('site_reviews.php');
		## Получаем данные
		$output = ob_get_contents ();
		## Отключаем буферизацию
		ob_end_clean ();
		
		return $output;
	}
  
  public function site_show_reviews_front()
	{
		global $wpdb;
		
		// Выбираем все отзывы из Базы Данных
		$this->data['reviews'] = $this->db_rev('last', 6);
		
		## Включаем буферизацию вывода
		ob_start ();
		include_once('site_reviews_front.php');
		## Получаем данные
		$output = ob_get_contents ();
		## Отключаем буферизацию
		ob_end_clean ();
		
		return $output;
	}
	
	private function add_user_review() 
	{
    
    
    $id =  $this->db_rev('insert');
        
    $nameFile = $this->upload_file($id);
    
    if($nameFile)
    {
      $inputData = array('review_photo' => $nameFile);
      $wpdb->update( $this->tbl_adv_reviews, $inputData, array( 'ID' => $id ));
    }
    
    echo json_encode(
    array(
        "result" => 'Ваш отзыв принят и будет добавлен после одобрения',
        )
    );
    
    exit;
	}
  
  // function upload file
  private function upload_file($id)
  {
    if(isset($_FILES['review_photo']))
    {
      $storeFolder = $_SERVER['DOCUMENT_ROOT'].'/wp-content/uploads/reviews/';
      $tempFile = $_FILES['review_photo']['tmp_name'];

      
      $file_ext = strtolower(strrchr($_FILES['review_photo']['name'], '.'));
      $type_file = array('.jpg','.jpeg','.png');
      
      if(in_array($file_ext, $type_file))
      {
        $nameFile = $id . $file_ext;
        $pathFile = $storeFolder . $nameFile;

        if(move_uploaded_file($tempFile, $pathFile))
        {
            $this->img_resize($pathFile,$pathFile,112,112);
            return $nameFile;
            $inputData = array('review_photo' => $nameFile);
            $wpdb->update( $this->tbl_adv_reviews, $inputData, array( 'ID' => $id ));
        }
        return false;
      }
    }
  }
    
     /***********************************************************************************
    Функция img_resize(): генерация thumbnails
    Параметры:
      $src             - имя исходного файла
      $dest            - имя генерируемого файла
      $width, $height  - ширина и высота генерируемого изображения, в пикселях
    Необязательные параметры:
      $rgb             - цвет фона, по умолчанию - белый
      $quality         - качество генерируемого JPEG, по умолчанию - максимальное (100)
    ***********************************************************************************/
    public function img_resize($src, $dest, $width, $height, $rgb=0xFFFFFF, $quality=100)
    {
      if (!file_exists($src)) return false;
     
      $size = getimagesize($src);
     
      if ($size === false) return false;
     
      // Определяем исходный формат по MIME-информации, предоставленной
      // функцией getimagesize, и выбираем соответствующую формату
      // imagecreatefrom-функцию.
      $format = strtolower(substr($size['mime'], strpos($size['mime'], '/')+1));
      $icfunc = "imagecreatefrom" . $format;
      if (!function_exists($icfunc)) return false;
     
      $x_ratio = $width / $size[0];
      $y_ratio = $height / $size[1];
     
      $ratio       = min($x_ratio, $y_ratio);
      $use_x_ratio = ($x_ratio == $ratio);
     
      $new_width   = $use_x_ratio  ? $width  : floor($size[0] * $ratio);
      $new_height  = !$use_x_ratio ? $height : floor($size[1] * $ratio);
      $new_left    = $use_x_ratio  ? 0 : floor(($width - $new_width) / 2);
      $new_top     = !$use_x_ratio ? 0 : floor(($height - $new_height) / 2);
     
      $isrc = $icfunc($src);
      $idest = imagecreatetruecolor($width, $height);
     
      imagefill($idest, 0, 0, $rgb);
      imagecopyresampled($idest, $isrc, $new_left, $new_top, 0, 0,
        $new_width, $new_height, $size[0], $size[1]);
     
      imagejpeg($idest, $dest, $quality);
     
      imagedestroy($isrc);
      imagedestroy($idest);
     
      return true;
     
    }

 }
}

global $reviews;
$reviews = new AdvUserReviews();