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
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'metal' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '@S7P~,u]h ,kc}&6M{B~J~@Oe]D1jLCrFm&I+rMq-5&/QMKW8&oNZDTF``+zZi*f' );
define( 'SECURE_AUTH_KEY',  '!+egL^rErLM-Pia*:^)Xx[KS0,;=?l;i]OWN9U8<w5uEnL9<Fuo=3[IX7DSLOsUz' );
define( 'LOGGED_IN_KEY',    'vz;s.0;c>8SZKdiAi8ba.5aE^h?cO2#$i/CtFD`?cd{3MwKTRb;~r5uY0@@|/ fk' );
define( 'NONCE_KEY',        '~x*zo0r[R<HhkGHN;K3WhUZiq,9+X55?d(E(n<i$>|5W(Uc)MGF,{z+4N}{6G6<)' );
define( 'AUTH_SALT',        'mGxnpIRiV<%jukMi@P3][oq%BK-o2pXZm4<UI1|]4R7q6W6x93I{X}p!Sc^}ssy~' );
define( 'SECURE_AUTH_SALT', 'PwBa1~rrf)PLcU:TD+= kP5o>V8l`^QMo`T9x/3mjY1+&*Xd[hdqO.&6#U[Sg*aF' );
define( 'LOGGED_IN_SALT',   'WtmC2R&0)IdX8WK&6DIB;E(m3F[sw@VM7-8lvk:EiFQP?%-.Ovx0OC~7|{xzgY17' );
define( 'NONCE_SALT',       'AK%jUxIJ)mdg:^0,y<-DOZ2?|t{eq.IDM&]H@QHTlO!l$Ee Q=}.zdP9K|Fq6V4S' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
