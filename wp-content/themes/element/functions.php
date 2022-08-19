<?php
/**
 * element functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package element
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function element_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on element, use a find and replace
		* to change 'element' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'element', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'element' ),
			'footer-ru' => esc_html__( 'Footer', 'element' ),
            
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
			'element_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'element_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function element_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'element_content_width', 640 );
}
add_action( 'after_setup_theme', 'element_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function element_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'element' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'element' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'element_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function element_scripts() {
	wp_enqueue_style( 'element-tailwind', get_template_directory_uri() . '/assets/css/main.css' , array(), _S_VERSION );
	wp_enqueue_style( 'element-woocommerce', get_template_directory_uri() . '/woocommerce/assets/css/woocommerce.css' , array(), _S_VERSION );
	wp_enqueue_style( 'element-aos', get_template_directory_uri() . '/assets/css/aos.css' , array(), _S_VERSION );
	wp_enqueue_style( 'element-nice-select', get_template_directory_uri() . '/assets/css/nice-select.css' , array(), _S_VERSION );
	wp_enqueue_style( 'element-slick', get_template_directory_uri() . '/assets/css/slick.css' , array(), _S_VERSION );
	wp_enqueue_style( 'element-style', get_stylesheet_uri(), array(), _S_VERSION );

    wp_enqueue_script( 'element-scrollMagic', get_template_directory_uri() . '/assets/js/ScrollMagic.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'element-mask-js', get_template_directory_uri() . '/woocommerce/assets/js/jquery.maskedinput.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'element-nice-select-js', get_template_directory_uri() . '/assets/js/jquery.nice-select.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'element-slick-slider', get_template_directory_uri() . '/assets/js/slick.min.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'element-aos', get_template_directory_uri() . '/assets/js/aos.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'element-debug', get_template_directory_uri() . '/assets/js/debug.addIndicators.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'element-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'element-js', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'element-woocommerce-js', get_template_directory_uri() . '/woocommerce/assets/js/main.js', array(), _S_VERSION, true );
	wp_enqueue_script('jquery');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'element_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
/// Walker menu by Arkadyy
class walker_texas_ranger extends Walker_Nav_Menu
{
    function __construct($css_class_prefix)
    {
        $this->css_class_prefix = $css_class_prefix;

        // Define menu item names appropriately
        $this->item_css_class_suffixes = array(
            'item' => '__item',
            'parent_item' => '__item--parent',
            'active_item' => '__item--active',
            'parent_of_active_item' => '__item--parent--active',
            'ancestor_of_active_item' => '__item--ancestor--active',
            'sub_menu' => '__sub-menu',
            'sub_menu_item' => '__sub-menu__item',
            'link' => '__link',
        );
    }

    // Check for children
    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
    {

        $id_field = $this->db_fields['id'];

        if (is_object($args[0])) {
            $args[0]->has_children = !empty($children_elements[$element->$id_field]);
        }

        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);

    }

    function start_lvl(&$output, $depth = 1, $args = array())
    {

        $real_depth = $depth + 1;

        $indent = str_repeat("\t", $real_depth);
        $prefix = $this->css_class_prefix;
        $suffix = $this->item_css_class_suffixes;
        $classes = array(
            $prefix . $suffix['sub_menu'],
            $prefix . $suffix['sub_menu'] . '--' . $real_depth . ' navigation_level2'
        );
        $class_names = implode(' ', $classes);
        // Add a ul wrapper to sub nav
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }

    // Add main/sub classes to li's and links

    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {

        global $wp_query;

        $indent = ($depth > 0 ? str_repeat("    ", $depth) : ''); // code indent
        $prefix = $this->css_class_prefix;
        $suffix = $this->item_css_class_suffixes;
        // Item classes
        $item_classes = array(
            'item_class' => $depth == 0 ? $prefix . $suffix['item'] : '',
            'parent_class' => $args->has_children ? $parent_class = $prefix . $suffix['parent_item'] . ' js-menu-item-parent' : '',
            'active_page_class' => in_array("current-menu-item", $item->classes) ? $prefix . $suffix['active_item'] : '',
            'active_parent_class' => in_array("current-menu-parent", $item->classes) ? $prefix . $suffix['parent_of_active_item'] : '',
            'active_ancestor_class' => in_array("current-menu-ancestor", $item->classes) ? $prefix . $suffix['ancestor_of_active_item'] : '',
            'depth_class' => $depth >= 1 ? $prefix . $suffix['sub_menu_item'] . ' ' . $prefix . $suffix['sub_menu'] . '--' . $depth . '__item' : '',
            'item_id_class' => $prefix . '__item--' . $item->object_id,
            // 'user_class'            => $item->classes[0] !== '' ? $prefix . '__item--'. $item->classes[0] : ''
            'user_class' => $item->classes[0] !== '' ? $item->classes[0] : ''
        );
        // convert array to string excluding any empty values
        $class_string = implode("  ", array_filter($item_classes));
        // Add the classes to the wrapping <li>
        $output .= $indent . '<li class="' . $class_string . '">';
        // Link classes
        $link_classes = array(
            'item_link' => $depth == 0 ? $prefix . $suffix['link'] : '',
            'depth_class' => $depth >= 1 ? $prefix . $suffix['sub_menu'] . $suffix['link'] . '  ' . $prefix . $suffix['sub_menu'] . '--' . $depth . $suffix['link'] : '',
        );
        $link_class_string = implode("  ", array_filter($link_classes));
        $link_class_output = 'class="' . $link_class_string . '"';
        // link attributes
        $attributes = !empty

        ($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        // Creatre link markup
        $item_output = $args->before;
        $item_output .= '<a' . $attributes . ' ' . $link_class_output . '>';
        $item_output .= $args->link_before;
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= $args->link_after;
        $item_output .= $args->after;
        $item_output .= '</a>';
        $item_output .= $args->has_children ? '<span class="menu__arrow js-menu-toggler"></span>' : '';
        // Filter <li>

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

}

function bem_menu($location = "main_menu", $css_class_prefix = 'main-menu', $css_class_modifiers = null)
{

    // Check to see if any css modifiers were supplied
    if ($css_class_modifiers) {
        if (is_array($css_class_modifiers)) {
            $modifiers = implode(" ", $css_class_modifiers);
        } elseif (is_string($css_class_modifiers)) {
            $modifiers = $css_class_modifiers;
        }
    } else {
        $modifiers = '';
    }
    $args = array(
        'theme_location' => $location,
        'container' => false,
        'items_wrap' => '<ul class="' . $css_class_prefix . ' ' . $modifiers . '">%3$s</ul>',
        'walker' => new walker_texas_ranger($css_class_prefix, true)
    );

    if (has_nav_menu($location)) {
        return wp_nav_menu($args);
    } else {
        echo "<p>You need to first define a menu in WP-admin<p>";
    }
}

function dd($var)
{
    echo '<pre style="background: #000; color: green; padding: 15px;" >';
    print_r($var);
    echo '</pre>';
    die();
}

 get_template_part( 'components/button' );

 require get_template_directory() . '/woocommerce/includes/wc-function.php';



add_filter( 'excerpt_length', function(){
    return 27;
} );
add_filter('excerpt_more', function($more) {
    return '...';
});

    
