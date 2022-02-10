<?php

/** Кастомные поля в записи */

add_action('add_meta_boxes', 'si_meta_boxes');
add_action('save_post' , 'si_like_save_meta');

function si_meta_boxes() {
    add_meta_box(
        'si-like',
        'Количество лайков ',
        'si_meta_like_cb',
        'post'
    );
}

/* очистить шапку */

remove_action('wp_head','feed_links_extra', 3); // убирает ссылки на rss категорий
remove_action('wp_head','feed_links', 2); // минус ссылки на основной rss и комментарии
remove_action('wp_head','rsd_link');  // сервис Really Simple Discovery
remove_action('wp_head','wlwmanifest_link'); // Windows Live Writer
remove_action('wp_head','wp_generator');

/* end очистить шапку */

function si_meta_like_cb( $post_obj ) {
    $likes = get_post_meta($post_obj->ID, 'si-like', true);
    $likes = $likes ? $likes : 0;
    //echo "<input name=\"si-like\" value=\"${likes}\" type=\"text\" >";
    echo '<p>' . $likes . '</p>';
}

function si_like_save_meta($post_id) {
    if(isset($_POST['si-like'])) {
        update_post_meta($post_id, 'si-like', $_POST['si-like']);
    }
}

/** Кастомные поля в записи */

/* регистрация произвольного(кастомного) типа записей */

add_action( 'init', 'si_register_types' );


function si_register_types() {


    register_post_type( 'services', [
        'labels' => [
            'name'               => 'Услуги', // основное название для типа записи
            'singular_name'      => 'Услуга', // название для одной записи этого типа
            'add_new'            => 'Добавить новую услугу', // для добавления новой записи
            'add_new_item'       => 'Добавить новую услугу', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать услугу', // для редактирования типа записи
            'new_item'           => 'Новая услуга', // текст новой записи
            'view_item'          => 'Смотреть услуги', // для просмотра записи этого типа.
            'search_items'       => 'Искать услуги', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Услуги', // название меню
        ],
        'public'              => true,
        'menu_position'       => 20,
        //'menu_icon'           => 'dashicons-smiley',
        'menu_icon'           => _si_assets_path('img/icons/arrow_black.png'),  
        'hierarchical'        => false,
        'supports'            => ['title'], // 'editor', 'thumbnail'
        'has_archive' => true
    ]);

    register_post_type( 'trainers', [
        'labels' => [
            'name'               => 'Тренеры', // основное название для типа записи
            'singular_name'      => 'Тренеры', // название для одной записи этого типа
            'add_new'            => 'Добавить нового тренера', // для добавления новой записи
            'add_new_item'       => 'Добавить нового тренера', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать тренера', // для редактирования типа записи
            'new_item'           => 'Новый тренер', // текст новой записи
            'view_item'          => 'Смотреть тренера', // для просмотра записи этого типа.
            'search_items'       => 'Искать тренера', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Тренеры', // название меню
        ],
        'public'              => true,
        'menu_position'       => 21,
        //'menu_icon'           => 'dashicons-smiley',
        'menu_icon'           => 'dashicons-admin-users',  
        'hierarchical'        => false,
        'supports'            => ['title'], // 'editor', 'thumbnail'
        'has_archive' => true
    ]);

    register_post_type( 'shedule', [
        'labels' => [
            'name'               => 'Занятие', // основное название для типа записи
            'singular_name'      => 'Занятие', // название для одной записи этого типа
            'add_new'            => 'Добавить новое занятие', // для добавления новой записи
            'add_new_item'       => 'Добавить новое занятие', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать занятие', // для редактирования типа записи
            'new_item'           => 'Новое занятие', // текст новой записи
            'view_item'          => 'Смотреть занятие', // для просмотра записи этого типа.
            'search_items'       => 'Искать занятие', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Занятия', // название меню
        ],
        'public'              => true,
        'menu_position'       => 22,
        //'menu_icon'           => 'dashicons-smiley',
        'menu_icon'           => 'dashicons-megaphone',  
        'hierarchical'        => false,
        'supports'            => ['title'], // 'editor', 'thumbnail'
        'has_archive' => true
    ]);

    register_post_type( 'prices', [
        'labels' => [
            'name'               => 'Прайсы', // основное название для типа записи
            'singular_name'      => 'Прайсы', // название для одной записи этого типа
            'add_new'            => 'Добавить новый прайс', // для добавления новой записи
            'add_new_item'       => 'Добавить новый прайс', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать прайс', // для редактирования типа записи
            'new_item'           => 'Новый прайс', // текст новой записи
            'view_item'          => 'Смотреть прайс', // для просмотра записи этого типа.
            'search_items'       => 'Искать прайс', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Прайсы', // название меню
        ],
        'public'              => true,
        'menu_position'       => 22,
        //'menu_icon'           => 'dashicons-smiley',
        'menu_icon'           => 'dashicons-media-text',  
        'hierarchical'        => false,
        'show_in_rest'        => true,
        'supports'            => ['title', 'editor'], // 'editor', 'thumbnail'
        'has_archive' => true
    ]);

    register_post_type( 'cards', [
        'labels' => [
            'name'               => 'Клубные Карты', // основное название для типа записи
            'singular_name'      => 'Клубная Карта', // название для одной записи этого типа
            'add_new'            => 'Добавить новую карту', // для добавления новой записи
            'add_new_item'       => 'Добавить новую карту', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать карту', // для редактирования типа записи
            'new_item'           => 'Новая карта', // текст новой записи
            'view_item'          => 'Смотреть карту', // для просмотра записи этого типа.
            'search_items'       => 'Искать карту', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Клубные Карты', // название меню
        ],
        'public'              => true,
        'menu_position'       => 23,
        //'menu_icon'           => 'dashicons-smiley',
        'menu_icon'           => 'dashicons-list-view',  
        'hierarchical'        => false,
        'supports'            => ['title'], // 'editor', 'thumbnail'
        'has_archive' => false
    ]);

    /** Регистрируем таксономию */

    register_taxonomy( 'shedule_days', [ 'shedule' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Дни недели',
			'singular_name'     => 'Дни недели',
			'search_items'      => 'Найти Дни недели',
			'all_items'         => 'Все Дни недели',
			'view_item '        => 'Посмотреть Дни недели',
			//'parent_item'       => 'Parent Genre',
			//'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => 'Редактировать Дни недели',
			'update_item'       => 'Обновить',
			'add_new_item'      => 'Добавить день недели',
			'new_item_name'     => 'Добавить день недели',
			'menu_name'         => 'Все дни недели',
			//'back_to_items'     => '← Back to Genre',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,
	] );

    register_taxonomy( 'places', [ 'shedule' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Залы',
			'singular_name'     => 'Залы',
			'search_items'      => 'Найти Залы',
			'all_items'         => 'Все Залы',
			'view_item '        => 'Посмотреть Залы',
			//'parent_item'       => 'Parent Genre',
			//'parent_item_colon' => 'Parent Genre:',
			'edit_item'         => 'Редактировать Залы',
			'update_item'       => 'Обновить',
			'add_new_item'      => 'Добавить Залы',
			'new_item_name'     => 'Добавить Залы',
			'menu_name'         => 'Все Залы',
			//'back_to_items'     => '← Back to Genre',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => true,
	] );

}

/* регистрация произвольного(кастомного) типа записей */

/* включить стандартные виджеты */
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );



/* подключаем свой виджет */

require_once(__DIR__ . '/includes/widget-text.php');
require_once(__DIR__ . '/includes/widget-contacts.php');
require_once(__DIR__ . '/includes/widget-social-link.php');
require_once(__DIR__ . '/includes/widget-iframe.php');
require_once(__DIR__ . '/includes/widget-info.php');
require_once(__DIR__ . '/includes/widget-main-page-article.php');

add_action( 'widgets_init', 'register_my_widget' );

function register_my_widget() {
    register_widget('si_widget_text');
    register_widget('si_widget_contacts');
    register_widget('si_widget_social_links');
    register_widget('si_widget_iframe');
    register_widget('si_widget_info');
    register_widget('si_widget_main_page_article');
}

/* подключаем свой виджет */



/* Создадим шорткод */


add_shortcode('si-paste-link', 'si_paste_link');


function si_paste_link($attr) {
    $params = shortcode_atts([
        'link' => '',
        'text' => '',
        'type' => 'link'
    ], $attr);
    $params['text'] = $params['text'] ? $params['text'] : $params['link'];
    if( $params['link'] ){
        $protocol = '';
        switch( $params['type'] ) {
            case 'email' :
                $protocol = 'mailto:';
            break;
            case 'phone':
                $protocol = 'tel:';
                $params['link'] = preg_replace('/[^+[0-9]/', '', $params['link']);               
            default:
                $protocol = '';
            break;
        }
        $link = $protocol . $params['link'];
        $text = $params['text'];
        return "
            <a href=\"${link}\">${text}</a>
        
        ";
    }
    else {
        return '';
    }
}

add_filter('si_widget_text', 'do_shortcode');






/* Создадим шорткод */ 

function dd($param) {
    if(is_array($param)) {
        echo '<div style="color: red; background-color: green">' . 
            var_dump($param) . '</div>';
    } else {
        echo '<div style="color: red; background-color: green">' . 
            $param . '</div>';
    }

}

add_action('wp_enqueue_scripts', 'si_scripts');

function si_scripts() {
    wp_enqueue_script(
        'js', 
        _si_assets_path('js/js.js'), // своя функция
        [],
        '1.0',
        true
    );
    wp_enqueue_style(
        'si-style',
        get_template_directory_uri() . '/assets/css/styles.css',
        [],
        '1.0',
        'all'
    );
    //отключаем скрипты
    //wp_dequeue_style('wp-block-library');
    //wp_dequeue_style('wp-embed');

    //отключаем jQuery старой версии
    // if ( !is_admin() ) {
    //     wp_deregister_script('jquery');
    // }
}

/* включить выбор логотипа, иконки и тамбнейла в теме */
add_action('after_setup_theme', 'si_setup');

function si_setup() {

    /* Регистрация меню на сайте */
    register_nav_menu( 'menu-header', 'Меню в шапке' );
    register_nav_menu( 'menu-footer', 'Меню в подвале' );
    /* Регистрация меню на сайте */
    
    add_theme_support('custom-logo');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    //add_theme_support('menus');

    //картинки размер

    add_image_size('si_pic', 600, 240, true);


}
/* включить выбор логотипа, иконки и тамбнейла в теме */

/* отключить админ бар */
//add_filter('show_admin_bar', '__return_false');
/* отключить админ бар */


/* Путь для img */
function _si_assets_path($path) {
    return get_template_directory_uri() . '/assets/' . $path;
}
/* Путь для img */

/* Сайдбар */

add_action( 'widgets_init', 'si_register' );

function si_register() {
    register_sidebar([
        'name' => 'Сайдбар контактов в шапке сайта',
        'id'   => 'si-header',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Сайдбар контактов в футере сайта',
        'id'   => 'si-footer',
        'before_widget' => null,
        'after_widget' => null
    ]);

    /** Сайдбары в футере */
    register_sidebar([
        'name' => 'Сайдбар футера - 1',
        'id'   => 'si-footer-1',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Сайдбар футера - 2',
        'id'   => 'si-footer-2',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Сайдбар футера - 3',
        'id'   => 'si-footer-3',
        'before_widget' => null,
        'after_widget' => null
    ]);
    /** Крта */
    register_sidebar([
        'name' => 'Карта',
        'id'   => 'si-map',
        'before_widget' => null,
        'after_widget' => null
    ]);
    register_sidebar([
        'name' => 'Сайдбар под картой',
        'id'   => 'si-after-map',
        'before_widget' => null,
        'after_widget' => null
    ]);
    /** Выод статьи на главную страницу */
    register_sidebar([
        'name' => 'Сайдбар статьи для главной страницы',
        'id'   => 'si-main-article',
        'before_widget' => null,
        'after_widget' => null
    ]);
    

}


/* Сайдбар */


// function disable_visual_editor($can)
// {
//   global $post;

    /*
     * Отключить визуальный редактор WordPress на странице или записи с определённым ID (в нашем примере с ID = 15)
     */
//  if ($post->ID == 8) {
        //  return false;
    //  }

    /*
     * Скрыть визуальный редактор TinyMCE на страницах с ID 16, 25 и 30 (для случаев, когда нужно убрать редактор сразу для нескольких страниц)
     */
    // $disabled_IDs = array(16, 25, 30);
    // if (in_array($post->ID, $disabled_IDs)) {
    //     return false;
    // }
	
	/*
     * Отключить визуальный редактор WordPress для всех страниц (т.е. для всех постов с типом "страница")
     */
	// $post_type = get_post_type($post);
	// if ($post_type == 'page') {
    //     return false;
    // }

    /*
     * Отключить визуальный редактор ВордПресс на страницах с определённым шаблоном (!!!ВНИМАНИЕ!!! нужно указывать не название шаблона поста или страницы, а имя файла этого шаблона, например my_page_template.php)
     */
    // $page_template = get_post_meta($post->ID, '_wp_page_template', true);
    // if ($page_template == 'my_page_template.php') {
    //     return false;
    // }

    // return $can;
// }

// add_filter('user_can_richedit', 'disable_visual_editor');

function disable_content_editor()
{
    if (isset($_GET['post'])) {
        $post_ID = $_GET['post'];
    } else if (isset($_POST['post_ID'])) {
        $post_ID = $_POST['post_ID'];
    }

    if (!isset($post_ID) || empty($post_ID)) {
        return;
    }

    /*
     * Полностью отключить редактор WordPress для страницы с определённым ID (в нашем примере с ID = 15)
     */
    if ($post_ID == 8) {
        remove_post_type_support('page', 'editor');
    }
	
	/*
     * Отключить возможность редактирования для всех страниц (т.е. для всех постов с типом "страница")
     */
	// $post_type = get_post_type($post_ID);
	// if ($post_type == 'page') {
    //     return false;
    // }

    /*
     * Отключить возможность редактирования для страниц с ID 16, 25 и 30 (для случаев, когда нужно отключить редактор сразу для нескольких страниц)
     */
    // $disabled_IDs = array(16, 25, 30);
    // if (in_array($post_ID, $disabled_IDs)) {
    //     remove_post_type_support('page', 'editor');
    // }

    /*
     * Скрыть редактор ВордПресс на страницах с определённым шаблоном (!!!ВНИМАНИЕ!!! указывать нужно не название шаблона, а имя его файла, например my_page_template.php)
     */
    // $page_template = get_post_meta($post_ID, '_wp_page_template', true);
    // if ($page_template == 'my_page_template.php') {
    //     remove_post_type_support('page', 'editor');
    // }
}

add_action('admin_init', 'disable_content_editor');

/** Поле настроек в админпанели */

add_action('admin_init', 'si_register_slogan');

function si_register_slogan() {
    add_settings_field(
        'si_option_field_slogan',
        'Слоган вашего сайта: ',
        'si_option_slogan_cb',
        'general',
        'default',
        [
            'label_for' => 'si_option_field_slogan'
        ]
    );
    register_setting(
        'general',
        'si_option_field_slogan',
        'strval'
    );
}

function si_option_slogan_cb($args) {
    $slug = $args['label_for'];
?>
    <input 
        type="text" 
        id="<?php echo $slug; ?>" 
        value="<?php echo get_option($slug); ?>"
        name="<?php echo $slug; ?>"
        class="regular-text code"
    >  
<?php
}



/* ajax для лайков */
add_action('wp_ajax_nopriv_post-likes', 'si_likes');
add_action('wp_ajax_post-likes', 'si_likes');

function si_likes() {
    $id = $_POST['id'];
    $todo = $_POST['todo'];
    $corent_data = get_post_meta($id, 'si-like', true);
    $corent_data = $corent_data ? $corent_data : 0;
    if($todo === 'plus') {
        $corent_data++;
    } else {
        $corent_data--;
    }
    $res = update_post_meta($id, 'si-like', $corent_data);
    if($res) {
        echo $corent_data;
        wp_die();
    } else {
        wp_die('Ошибка!!!', 500);
    }
    wp_die();
}
/* Не зарегистрированый пользователь */
//add_action('admin_post_nopriv_test_action', 'test_function_action');
/* Зарегистрированый пользователь */
//add_action('admin_post_test_action', 'test_function_action');

//function test_function_action() {

 //   echo "параметер GET тут!!!";

//}



// Кастомное поле со значениями лайков в постах

add_filter('manage_posts_columns', 'si_add_col_likes');
function si_add_col_likes($defaults) {
    $type = get_current_screen();
    //print_r($defaults);
    if($type->post_type === 'post'){
        unset($defaults['tags']);
        $defaults['col_likes'] = 'Лайки';
    }
    return $defaults;
}

add_action('manage_posts_custom_column', 'si_like_column', 5, 2);
function si_like_column($col_name, $post_id) {
    if($col_name !== 'col_likes') return;
    $likes = get_post_meta($post_id, 'si-like', true);
    echo $likes ? $likes : 0;
}


// Тип записи под ЗАЯВКИ

add_action( 'init', 'si_request_post_type' );

function si_request_post_type() {
    register_post_type( 'orders', [
        'labels' => [
            'name'               => 'Заявки', // основное название для типа записи
            'singular_name'      => 'Заявка', // название для одной записи этого типа
            'add_new'            => 'Добавить новую заявку', // для добавления новой записи
            'add_new_item'       => 'Добавить новую заявку', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактировать заявку', // для редактирования типа записи
            'new_item'           => 'Новая карта', // текст новой записи
            'view_item'          => 'Смотреть заявку', // для просмотра записи этого типа.
            'search_items'       => 'Искать заявку', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Заявки', // название меню
        ],
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 23,
        //'menu_icon'           => 'dashicons-smiley',
        'menu_icon'           => 'dashicons-buddicons-forums',
        'hierarchical'        => false,
        'supports'            => ['title'],
        'has_archive'         => false
    ]);
}

add_action('add_meta_boxes', 'si_meta_boxes2');

function si_meta_boxes2() {

    $fields = [
        'si_order_date' => 'Дата заявки ',
        'si_order_name' => 'Имя клиента ',
        'si_order_phone' => 'Номер телефона ',
        'si_order_choice' => 'Выбор клиента '
    ];

    foreach($fields as $key => $field) {
        add_meta_box(
            $key,
            $field,
            'si_order_fields_cb',
            'orders',
            'advanced',
            'default',
            $key
        );
    }

}

function si_order_fields_cb($post_obj, $key) {
    $slug  = $key['args'];
    //var_dump($slug);
    $field  = '';
    switch($slug) {
        case 'si_order_date':
            // $format = 'n-j-Y';
            // $field = get_the_date($format, $post_obj->ID);
            // $field = $field ? $field : 'Время не установленно!!!';
            $field = $post_obj->post_date;
        break;
        case 'si_order_choice':
            $id    = get_post_meta($post_obj->ID, $slug, true);
            $title = get_the_title($id);
            $type  = get_post_type_object(get_post_type($id))->labels->singular_name;
            $field = 'Клиен выбрал: <strong>' . $title . '</strong>. <br>Из раздела: <strong>' . $type . '</strong>';
        break;
        default:
            $field = get_post_meta($post_obj->ID, $slug, true);
            $field = $field ? $field : 'Нет данных';
        break;
    }
    echo '<p>' . $field . '</p>';
}

/* Работаем с формой */

/* Не зарегистрированый пользователь */
add_action('admin_post_nopriv_si-modal-form', 'si_modal_form_handler');
/* Зарегистрированый пользователь */
add_action('admin_post_si-modal-form', 'si_modal_form_handler');

function si_modal_form_handler() {
    $name = $_POST['si-user-name'] ? $_POST['si-user-name'] : 'Аноним';
    $phone = $_POST['si-user-phone'] ? $_POST['si-user-phone'] : false;
    $id = $_POST['form-post-id'] ? $_POST['form-post-id'] : 'empty';
    if($phone) {
        $name   = wp_strip_all_tags($name);
        $phone  = wp_strip_all_tags($phone);
        $choice = wp_strip_all_tags($id);
        $id     = wp_insert_post(wp_slash([
            'post_title' => 'Заявка № ',
            'post_type' => 'orders',
            'post_status' => 'publish',
            'meta_input' => [
                'si_order_name' => $name,
                'si_order_phone' => $phone,
                'si_order_choice' => $choice
            ]
        ]));
        if($id !== 0){
            wp_update_post([
                'ID' => $id,
                'post_title' => 'Заявка № ' . $id
            ]);
            update_field('orders_status', 'new', $id);
            //wp_mail(); на почту
        }
    }
    header('Location:' . home_url());
}

add_filter('manage_orders_posts_columns', 'orders_columns_callback_function');

function orders_columns_callback_function($columns) {
    $my_columns = [
        'id' => 'ID',
        'title' => 'Заявка',
        'orders_status' => 'Статус заявки'
    ];
    return array_slice( $columns, 0, 1 ) + $my_columns + $columns;
}

add_action('manage_orders_posts_custom_column', 'manage_orders_posts_custom_column_callback_function', 10, 2);
function manage_orders_posts_custom_column_callback_function($column, $post_id) {
    switch($column){
        case 'orders_status' :
            //var_dump(get_field('orders_status', $post_id));
            $requisition = get_field('orders_status', $post_id);
            switch($requisition['value']) {
                case 'new' :
                    $class = $requisition['value'];
                    $label = $requisition['label'];
                    echo "<div class=\"requisition_$class\">$label</div>";
                break;
                case 'done' :
                    $class = $requisition['value'];
                    $label = $requisition['label'];
                    echo "<div class=\"requisition_$class\">$label</div>";
                break;
                case 'processing' :
                    $class = $requisition['value'];
                    $label = $requisition['label'];
                    echo "<div class=\"requisition_$class\">$label</div>";
                break;
            }
            //var_dump($requisition);
        break;
    }
}

// Подключаем скрипты в админку
add_action( 'admin_enqueue_scripts', function(){
    wp_enqueue_style( 'my-wp-admin', get_template_directory_uri() .'/css/wp-admin.css' );
}, 99 );





?>
