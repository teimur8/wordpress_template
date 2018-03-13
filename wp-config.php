<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'wordpress');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

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
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '#EN$#z6kS^;&7f~>Rd/4F/L(kZCEp$;./%Ire]2S1ltK8:mY`Y1PKbpxRy,yxux3');
define('SECURE_AUTH_KEY',  'f+AuZ3iuE}WE6/F-Ty5MH+U:j8.HddA$Td48AZ6,XI|3SUnn%?p4bQgrr|,{]byV');
define('LOGGED_IN_KEY',    '+Xkx&cu1OyEP~KYP,-}5+R{s--CRgj|K$`/tA.)YbF7-8)M}tj}RJ@[gmtA#An+z');
define('NONCE_KEY',        'Z]bRop:a/z[R//qvZ*Le<5r+b`f?d.Ta]by52s>I+g+vCMw5#p$ncZSdx$=V#+*1');
define('AUTH_SALT',        'D{( [@c#0e,=!?={n00?J:Y!SUBj1#e?u$-(y;[V<54Iojg><[R?fb+N.L4LXcxa');
define('SECURE_AUTH_SALT', 'erKD5hcDE[~u;G9(vQg/]X,k9e/!j-ov^Sw_|@F|*=#9Gk._YNP.p0`W}`W3?O0^');
define('LOGGED_IN_SALT',   'dZ^rmFi9M18;|YwX9:5z+yPZ$r]#YHOs4[VKYdq+ f>m|A(dm;OOd+T=|s,Tvjm,');
define('NONCE_SALT',       'aQ0xegwIW(Sb{{=y|mq<1_2{Hom79=9l!;+;bF|8z2WJW&L$Na]!f1{`w?Nn rR&');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
