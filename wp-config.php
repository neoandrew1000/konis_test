<?php
/**
 * Основные параметры WordPress.
 *
 * Этот файл содержит следующие параметры: настройки MySQL, префикс таблиц,
 * секретные ключи, язык WordPress и ABSPATH. Дополнительную информацию можно найти
 * на странице {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Кодекса. Настройки MySQL можно узнать у хостинг-провайдера.
 *
 * Этот файл используется сценарием создания wp-config.php в процессе установки.
 * Необязательно использовать веб-интерфейс, можно скопировать этот файл
 * с именем "wp-config.php" и заполнить значения.
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'test');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '06091992');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется снова авторизоваться.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '+T.31|r4=_L9C5}}i`xOPdR,y~mcc^3+G@a*!i?tx:-41qwq}aKd!y-O=V!e Cl3');
define('SECURE_AUTH_KEY',  '!NRVbPSdlYC)wzb>@?@6w(BZp/7JK!qWemYYk4A|MGl:Fe{$.m^;--pnfN@kIAY[');
define('LOGGED_IN_KEY',    'oQtYgd1+buCW?:QOJk?^k<gQK*ITHv+v+|g /+M?7|YbS>u%{*!GH0>lczm-(_}N');
define('NONCE_KEY',        'V(9|X6-y?iIK(RhL&MJmIkkg8[d.XL4A+}]v6JV<M<OKu>]Y+W(uQ|Py,klOxSv+');
define('AUTH_SALT',        '*co5|D^C%ER^K~BXl[lQpI-%=$Oq+`QmpF&nGx|f1fXlP=E*!9D|[W-F-)!84(~y');
define('SECURE_AUTH_SALT', '>/AF%_-{{hA:/Wv@e](aH4%hLi.?|jj}<>uG=Xcz{W-D(V3!>++#Tm2vR5QQ}(]@');
define('LOGGED_IN_SALT',   'XO:oc[_`PH5ZOK( ,n~VuaiAWYTQ8YI61!.fpN@H%0n,F*%7jC4o|)aWlM>$2w&N');
define('NONCE_SALT',       'aqf;th^x.~&36$qc$_THN_yL|@wb-q+:dbS_Cj>{:8x3fk;8oR*U2o,i1=C*Ei?M');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько блогов в одну базу данных, если вы будете использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'nse_';

/**
 * Язык локализации WordPress, по умолчанию английский.
 *
 * Измените этот параметр, чтобы настроить локализацию. Соответствующий MO-файл
 * для выбранного языка должен быть установлен в wp-content/languages. Например,
 * чтобы включить поддержку русского языка, скопируйте ru_RU.mo в wp-content/languages
 * и присвойте WPLANG значение 'ru_RU'.
 */
define('WPLANG', 'ru_RU');

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Настоятельно рекомендуется, чтобы разработчики плагинов и тем использовали WP_DEBUG
 * в своём рабочем окружении.
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
