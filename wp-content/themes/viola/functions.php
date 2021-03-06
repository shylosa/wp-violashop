<?php
/**
 * viola functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package viola
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('viola_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function viola_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on viola, use a find and replace
         * to change 'viola' to the name of your theme in all the template files.
         */
        load_theme_textdomain('viola', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'viola'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'viola_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true
            )
        );

        //add_theme_support('custom-logo');
        add_theme_support('post-formats', array('aside', 'gallery', 'image', 'video', 'audio'));

    }
endif;
add_action('after_setup_theme', 'viola_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function viola_content_width()
{
    $GLOBALS['content_width'] = apply_filters('viola_content_width', 640);
}

add_action('after_setup_theme', 'viola_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function viola_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'viola'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'viola'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
}

add_action('widgets_init', 'viola_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function viola_scripts()
{
    wp_enqueue_style('viola-style', get_stylesheet_uri(), array(), _S_VERSION);
    wp_enqueue_style('viola-bootstrap-style', _viola_assets_path('css/bootstrap.min.css'), array('viola-style'), _S_VERSION);
    wp_enqueue_style('viola-responsive-style', _viola_assets_path('css/responsive.css'), array('viola-bootstrap-style'), _S_VERSION);
    wp_enqueue_style('viola-style-style', _viola_assets_path('css/style.css'), array('viola-responsive-style'), _S_VERSION);
    wp_enqueue_style('viola-custom-style', _viola_assets_path('css/custom.css'), array('viola-style-style'), _S_VERSION);

    wp_style_add_data('viola-style', 'rtl', 'replace');
    //IE9 support
    wp_script_add_data('https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js', 'conditional', 'lt IE 9');
    wp_script_add_data('https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js', 'conditional', 'lt IE 9');

    //Scripts
    wp_enqueue_script('viola-navigation-script', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery-core', 'jquery-migrate', 'viola-popper', 'viola-bootstrap'), _S_VERSION, true);
    wp_enqueue_script('jquery-core', '', array(), false, true);
    wp_enqueue_script('jquery-migrate', '', array('jquery-core'), false, true);

    wp_enqueue_script('viola-popper', _viola_assets_path('js/popper.min.js'), array('jquery-migrate'), false, true);
    wp_enqueue_script('viola-bootstrap', _viola_assets_path('js/bootstrap.min.js'), array('viola-popper'), false, true);

    wp_enqueue_script('viola-jquery-superslides', _viola_assets_path('js/jquery.superslides.min.js'), array('viola-bootstrap'), false, true);
    wp_enqueue_script('viola-bootstrap-select', _viola_assets_path('js/bootstrap-select.js'), array('viola-jquery-superslides'), false, true);
    wp_enqueue_script('viola-inewsticker', _viola_assets_path('js/inewsticker.js'), array('viola-bootstrap-select'), false, true);

    wp_enqueue_script('viola-bootsnav', _viola_assets_path('js/bootsnav.js'), array('viola-inewsticker'), false, true);
    wp_enqueue_script('viola-images-loaded', _viola_assets_path('js/images-loaded.min.js'), array('viola-bootsnav'), false, true);
    wp_enqueue_script('viola-isotope', _viola_assets_path('js/isotope.min.js'), array('viola-images-loaded'), false, true);

    wp_enqueue_script('viola-owl-carousel', _viola_assets_path('js/owl.carousel.min.js'), array('viola-isotope'), false, true);
    wp_enqueue_script('viola-baguette-box', _viola_assets_path('js/baguetteBox.min.js'), array('viola-owl-carousel'), false, true);
    wp_enqueue_script('viola-jquery-ui', _viola_assets_path('js/jquery-ui.js'), array('viola-baguette-box'), false, true);

    wp_enqueue_script('viola-form-validator', _viola_assets_path('js/form-validator.min.js'), array('viola-jquery-ui'), false, true);
    wp_enqueue_script('viola-contact-form-script', _viola_assets_path('js/contact-form-script.js'), array('viola-form-validator'), false, true);
    wp_enqueue_script('viola-jquery-nicescroll', _viola_assets_path('js/jquery.nicescroll.min.js'), array('viola-contact-form-script'), false, true);

    wp_enqueue_script('viola-custom', _viola_assets_path('js/custom.js'), array('viola-jquery-nicescroll'), false, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'viola_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

//Custom functions

/**
 * @param string $path
 * @return string
 */
function _viola_assets_path(string $path): string
{
    return get_template_directory_uri() . '/assets/' . $path;
}

/**
 * Changes the class on the custom logo in the header.php
 */
function helpwp_custom_logo_output( $html ) {
    $html = str_replace('style', '', $html );
    return $html;
}
add_filter('get_custom_logo', 'helpwp_custom_logo_output', 10);

