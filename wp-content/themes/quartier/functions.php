<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
global $post;

function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

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

	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			'sidebar-2' => array(
				'text_business_info',
			),

			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg',
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		'nav_menus' => array(
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'page_home',
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	) );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = 700;

	if ( twentyseventeen_is_frontpage() ) {
		$content_width = 1120;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'after_setup_theme', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'contact form', 'twentyseventeen' ),
		'id'            => 'contact-form-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );
	wp_enqueue_style( 'twentyseventeen-quartier', get_stylesheet_uri_quartier() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );

	wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );

	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}

	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

	class MysettingsPage
	{
		private $options;

		public function __construct(){
			// we create a new item on section menu admin
			add_action( 'admin_menu', array($this,'my_options_animate'));
			// add the admin settings and such
			add_action('admin_init', array($this,'config_admin_init'));
			
			if (isset($_GET['page']) && $_GET['page'] == 'page_config') {
				add_action('admin_print_scripts', 'my_admin_scripts');
				add_action('admin_print_styles', 'my_admin_styles');
			}
			function my_admin_scripts() {
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
				wp_register_script('my-upload', WP_PLUGIN_URL.'/script.js', array('jquery','media-upload','thickbox'));
				wp_enqueue_script('my-upload');
			}

			 function my_admin_styles() {
				wp_enqueue_style('thickbox');
			}
		}

		 

		public function wp_imageShortCode($atts){
			$options = get_option('mycustomplugin_options');
			$string = '<img src = "'.$options['upload_image'].'" alt = "'.$options['title'].'">' . $name;
			return $string;
		}

		/**
	     * Add options page
	     */
	    public function my_options_animate()
	    {
	        // This page will be under "Settings"
	        add_menu_page( 
				'My configurations settings',
				'slider configurations',
				'manage_options',
				'page_config',
				array($this,'configurate_field_animate'),
				get_stylesheet_directory_uri('stylesheet_directory')."/images/icons/map-marker.png"
			);

	    }
	    /**
	     * Options page callback
	     */
	    public function configurate_field_animate()
	    {
	        // Set class property
	        $this->options = get_option( 'id_config_animate' );
	        ?>
	        <div class="wrap">
	            <h1>My Settings</h1>
	            <form method="post" action="options.php" enctype="multipart/form-data">
		            <?php
		                // This prints out all hidden setting fields
						 settings_fields('id_config_animate');
						do_settings_sections('page_config');
						submit_button(); 
		            ?>
	            </form>
	        </div> 
		<?php
		}
		/**
	     * Register and add settings
	     */
	    public function config_admin_init()
	    {        
	        	// id config_animate must be called in settings_fields('id_config_animate') above display;
		// page config is the name of current page admin
		register_setting( 
			'id_config_animate', 
			'id_config_animate', 
			array($this,'plugin_options_validate') 
		);
		add_settings_section(
			'id_setting', 
			'Main Settings', 
			array($this,'plugin_section_text'), 
			'page_config'
		);
		add_settings_field(
			'plugin_text_string', 
			'title', 
			array($this,'title_callback'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'speed', 
			'speed', 
			array($this,'nbSpeed_callback'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'Title events', 
			'Title events', 
			array($this,'title_events_callback'), 
			'page_config', 
			'id_setting'
		);  
		add_settings_field(
			'Share url', 
			'Share url', 
			array($this,'share_callback'), 
			'page_config', 
			'id_setting'
		);  
		add_settings_field(
			'image', 
			'Image', 
			array($this,'image_callback'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'imageFooter', 
			'ImageFooter', 
			array($this,'imageFooter_callback'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'imageDevis', 
			'ImageDevis', 
			array($this,'devisImage_callback'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'Gallery', 
			'Gallery', 
			array($this,'gallery_callback'), 
			'page_config', 
			'id_setting'
		); 
		add_settings_field(
			'Testimonial', 
			'Testimonial', 
			array($this,'testimonial_callback'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'Devis', 
			'Devis', 
			array($this,'devis_callback'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'Reinsurance', 
			'Reinsurance', 
			array($this,'reinsurance_callback'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'content', 
			'content', 
			array($this,'content_callback'), 
			'page_config', 
			'id_setting'
		);  
		add_settings_field(
			'Faq', 
			'Faq', 
			array($this,'faq_callback'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'Faq', 
			'Faq', 
			array($this,'boolean_habillage'), 
			'page_config', 
			'id_setting'
		);
		add_settings_field(
			'title content page', 
			'title content page', 
			array($this,'title_page_callback'), 
			'page_config', 
			'id_setting'
		);  
		      
	   }
	   /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
	    public function plugin_options_validate($input)
	    {
	        $new_input = array();
	        if( isset( $input['speed'] ) )
	            $new_input['speed'] = sanitize_text_field( $input['speed'] );

	        if( isset( $input['title'] ) )
	            $new_input['title'] = sanitize_text_field( $input['title'] );

	        if( isset( $input['title_events'] ) )
	            $new_input['title_events'] = sanitize_text_field( $input['title_events'] );

	        if( isset( $input['baseline']) || isset( $input['address']) || isset( $input['telephone']) || isset( $input['email']) ||
	        	isset( $input['link_quick']) || isset( $input['latest_news']) || isset( $input['title_contact']))
	            $new_input['baseline'] = sanitize_text_field( $input['baseline'] );
	            $new_input['address'] = sanitize_text_field( $input['address'] );
	            $new_input['telephone'] = sanitize_text_field( $input['telephone'] );
	            $new_input['email'] = sanitize_text_field( $input['email'] );
	            $new_input['latest_news'] = sanitize_text_field( $input['latest_news'] );
	            $new_input['link_quick'] = sanitize_text_field( $input['link_quick'] );
	            $new_input['title_contact'] = sanitize_text_field( $input['title_contact'] );

	        if( isset( $input['facebook']) || isset( $input['twitter']) || isset( $input['google']) || isset( $input['pinterest']) || isset( $input['linkedin']) )
	            $new_input['facebook'] = sanitize_text_field( $input['facebook'] );
	            $new_input['twitter'] = sanitize_text_field( $input['twitter'] );
	            $new_input['google'] = sanitize_text_field( $input['google'] );
	            $new_input['pinterest'] = sanitize_text_field( $input['pinterest'] );
	            $new_input['linkedin'] = sanitize_text_field( $input['linkedin'] );

	        if( isset( $input['upload_image'] ) )
	            $new_input['upload_image'] = sanitize_text_field( $input['upload_image'] );
			
			if( isset( $input['upload_imageDevis'] ) )
	            $new_input['upload_imageDevis'] = sanitize_text_field( $input['upload_imageDevis'] );

			if( isset( $input['title_gallery'] ) )
	            $new_input['title_gallery'] = sanitize_text_field( $input['title_gallery'] );

	        if( isset( $input['resume_gallery'] ) )
	            $new_input['resume_gallery'] = sanitize_text_field( $input['resume_gallery'] );

	        if( isset( $input['title_testimonial'] ) )
	            $new_input['title_testimonial'] = sanitize_text_field( $input['title_testimonial'] );
			
			if( isset( $input['title_page'] ) )
	            $new_input['title_page'] = sanitize_text_field( $input['title_page'] );

	        if( isset( $input['resume_testimonial'] ) )
	            $new_input['resume_testimonial'] = sanitize_text_field( $input['resume_testimonial'] );

			if( isset( $input['title_devis'] ) )
	            $new_input['title_devis'] = sanitize_text_field( $input['title_devis'] );

	        if( isset( $input['resume_devis'] ) )
	            $new_input['resume_devis'] = sanitize_text_field( $input['resume_devis'] );
			
			if( isset( $input['cta_devis'] ) )
	            $new_input['cta_devis'] = sanitize_text_field( $input['cta_devis'] );

			if( isset( $input['cta_devis'] ) )
	            $new_input['cta_devis'] = sanitize_text_field( $input['cta_devis'] );
			
			if( isset( $input['title_reinsurance'] ) )
	            $new_input['title_reinsurance'] = sanitize_text_field( $input['title_reinsurance'] );
			
			if( isset( $input['content_one_reinsurance'] ) )
	            $new_input['content_one_reinsurance'] = sanitize_text_field( $input['content_one_reinsurance'] );
			
			if( isset( $input['content_three_reinsurance'] ) )
	            $new_input['content_three_reinsurance'] = sanitize_text_field( $input['content_three_reinsurance'] );
			
			if( isset( $input['content_two_reinsurance'] ) )
	            $new_input['content_two_reinsurance'] = sanitize_text_field( $input['content_two_reinsurance'] );
			
			if( isset( $input['upload_imageFooter'] ) )
	            $new_input['upload_imageFooter'] = sanitize_text_field( $input['upload_imageFooter'] );
				
			if( isset( $input['title_generic'] ) )
	            $new_input['title_generic'] = sanitize_text_field( $input['title_generic'] );

	        if( isset( $input['resume_generic'] ) )
	            $new_input['resume_generic'] = sanitize_text_field( $input['resume_generic'] );

	         if( isset( $input['faq_title']) || isset( $input['faq_desc']))
	            $new_input['faq_title'] = sanitize_text_field( $input['faq_title'] );
	            $new_input['faq_desc'] = sanitize_text_field( $input['faq_desc'] );

	          if( isset( $input['boolean_rd']) || isset( $input['boolean_rd_sm']))
	            $new_input['boolean_rd'] = sanitize_text_field( $input['boolean_rd'] );
	            $new_input['boolean_rd_sm'] = sanitize_text_field( $input['boolean_rd_sm'] );

	        return $new_input;
	    }

	    /** 
	     * Print the Section text
	     */
	    public function plugin_section_text() {
			echo '<p>Block 1</p>';
		}

		/** 
	     * Get the settings option array and print one of its values
	     */
	    /** 
     	* Get the settings option array and print one of its values
	     */
	    public function title_callback()
	    {
	        printf(
	            '<input type="text" id="title" name="id_config_animate[title]" value="%s" />',
	            isset( $this->options['title'] ) ? esc_attr( $this->options['title']) : ''
	        );
	    }
	    public function nbSpeed_callback()
	    {
	        printf(
	            '<input type="text" id="speed" name="id_config_animate[speed]" value="%s" />',
	            isset( $this->options['speed'] ) ? esc_attr( $this->options['speed']) : ''
	        );
	    }
	    public function title_events_callback()
	    {
	        printf(
	            '<label style="font-weight:bold; padding:20px 0 6px 0; display:block;">Titre evenement</label>
	            <input  style="min-width:300px;" type="text" id="title_events" name="id_config_animate[title_events]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >Baseline</label>
	            <input  style="min-width:300px;" type="text" id="baseline" name="id_config_animate[baseline]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;">Address</label>
	            <input  style="min-width:300px;" type="text" id="address" name="id_config_animate[address]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >phone</label>
	            <input  style="min-width:300px;" type="text" id="telephone" name="id_config_animate[telephone]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >email de contact global</label>
	            <input  style="min-width:300px;" type="text" id="email" name="id_config_animate[email]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >Liens utils</label>
	            <input  style="min-width:300px;" type="text" id="link_quick" name="id_config_animate[link_quick]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >Title of latest news on footer</label>
	            <input  style="min-width:300px;" type="text" id="latest_news" name="id_config_animate[latest_news]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >label nous contacter</label>
	            <input  style="min-width:300px;" type="text" id="title_contact" name="id_config_animate[title_contact]" value="%s" />',
	            isset( $this->options['title_events'] ) ? esc_attr( $this->options['title_events']) : '',
	            isset( $this->options['baseline'] ) ? esc_attr( $this->options['baseline']) : '',
	            isset( $this->options['address'] ) ? esc_attr( $this->options['address']) : '',
	            isset( $this->options['telephone'] ) ? esc_attr( $this->options['telephone']) : '',
	            isset( $this->options['email'] ) ? esc_attr( $this->options['email']) : '',
	            isset( $this->options['telephone'] ) ? esc_attr( $this->options['link_quick']) : '',
	            isset( $this->options['email'] ) ? esc_attr( $this->options['latest_news']) : '',
	            isset( $this->options['email'] ) ? esc_attr( $this->options['title_contact']) : ''
	        );
	    }
	    public function share_callback()
	    {
	        printf(
	            '<label style="font-weight:bold; padding:20px 0 6px 0; display:block;">Facebook</label>
	            <input  style="min-width:300px;" type="text" id="facebook" name="id_config_animate[facebook]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >Twitter</label>
	            <input  style="min-width:300px;" type="text" id="twitter" name="id_config_animate[twitter]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;">google</label>
	            <input  style="min-width:300px;" type="text" id="google" name="id_config_animate[google]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >Pinterest</label>
	            <input  style="min-width:300px;" type="text" id="pinterest" name="id_config_animate[pinterest]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >linkedin</label>
	            <input  style="min-width:300px;" type="text" id="linkedin" name="id_config_animate[linkedin]" value="%s" />',
	            isset( $this->options['facebook'] ) ? esc_attr( $this->options['facebook']) : '',
	            isset( $this->options['twitter'] ) ? esc_attr( $this->options['twitter']) : '',
	            isset( $this->options['google'] ) ? esc_attr( $this->options['google']) : '',
	            isset( $this->options['pinterest'] ) ? esc_attr( $this->options['pinterest']) : '',
	            isset( $this->options['linkedin'] ) ? esc_attr( $this->options['linkedin']) : ''
	        );
	    }
	    public function image_callback(){ 
		    	printf('<img style="max-width:200px;" src = "'.$this->options['upload_image'].'" >
		    			<br />
		    		<label style="display:block;">Url de l\'image</label>
		    		<input id="upload_image" name="id_config_animate[upload_image]" value="%s" size="40" />
		    		<br />
		    		<input type="button" class="button-secondary" id="upload_image_button" value="Ajouter une image" />',
					isset( $this->options['upload_image'] ) ? esc_attr( $this->options['upload_image']) : ''
		    	);
	    }

		public function imageFooter_callback(){ 
			printf('<img style="max-width:200px;" src = "'.$this->options['upload_imageFooter'].'" >
					<br />
				<label style="display:block;">Url de l\'image</label>
				<input id="upload_image" name="id_config_animate[upload_imageFooter]" value="%s" size="40" />
				<br />
				<input type="button" class="button-secondary" id="upload_image_button" value="Ajouter une image" />',
				isset( $this->options['upload_imageFooter'] ) ? esc_attr( $this->options['upload_imageFooter']) : ''
			);
		}


		public function devisImage_callback(){ 
			printf('<img style="max-width:200px;" src = "'.$this->options['upload_imageDevis'].'" >
					<br />
				<label style="display:block;">Url de l\'image</label>
				<input id="upload_image" name="id_config_animate[upload_imageDevis]" value="%s" size="40" />
				<br />
				<input type="button" class="button-secondary" id="upload_image_button" value="Ajouter une image" />',
				isset( $this->options['upload_imageDevis'] ) ? esc_attr( $this->options['upload_imageDevis']) : ''
			);
		}

		

	    public function gallery_callback(){ 

			printf('<input type="text" id="title_gallery" name="id_config_animate[title_gallery]" value="%s" />',
				isset( $this->options['title_gallery'] ) ? esc_attr( $this->options['title_gallery']) : ''
			);
			printf('<input type="text" id="resume_gallery" name="id_config_animate[resume_gallery]" value="%s" />',
				isset( $this->options['resume_gallery'] ) ? esc_attr( $this->options['resume_gallery']) : ''
			);
	    }

	    public function testimonial_callback(){ 

			printf('<input type="text" id="title_testimonial" name="id_config_animate[title_testimonial]" value="%s" />',
				isset( $this->options['title_testimonial'] ) ? esc_attr( $this->options['title_testimonial']) : ''
			);
			printf('<input type="text" id="resume_testimonial" name="id_config_animate[resume_testimonial]" value="%s" />',
				isset( $this->options['resume_testimonial'] ) ? esc_attr( $this->options['resume_testimonial']) : ''
			);
	    }

		public function devis_callback(){ 

			printf('<label>Title</label><input type="text" id="title_devis" name="id_config_animate[title_devis]" value="%s" />',
				isset( $this->options['title_devis'] ) ? esc_attr( $this->options['title_devis']) : ''
			);
			printf('<label>Resume</label><input type="text" id="resume_devis" name="id_config_animate[resume_devis]" value="%s" />',
				isset( $this->options['resume_devis'] ) ? esc_attr( $this->options['resume_devis']) : ''
			);
			printf('<label>TextButton</label><input type="text" id="cta_devis" name="id_config_animate[cta_devis]" value="%s" />',
				isset( $this->options['cta_devis'] ) ? esc_attr( $this->options['cta_devis']) : ''
			);
			printf('<label>url de redirection</label><input type="text" id="url_devis" name="id_config_animate[url_devis]" value="%s" />',
				isset( $this->options['url_devis'] ) ? esc_attr( $this->options['url_devis']) : ''
			);
		}

		public function reinsurance_callback(){ 

			printf('<label>Title</label><input type="text" id="title_reinsurance" name="id_config_animate[title_reinsurance]" value="%s" />',
				isset( $this->options['title_reinsurance'] ) ? esc_attr( $this->options['title_reinsurance']) : ''
			);
			printf('<label>content one</label><input type="text" id="content_one_reinsurance" name="id_config_animate[content_one_reinsurance]" value="%s" />',
				isset( $this->options['content_one_reinsurance'] ) ? esc_attr( $this->options['content_one_reinsurance']) : ''
			);
			printf('<label>content two</label><input type="text" id="content_two_reinsurance" name="id_config_animate[content_two_reinsurance]" value="%s" />',
				isset( $this->options['content_two_reinsurance'] ) ? esc_attr( $this->options['content_two_reinsurance']) : ''
			);
			printf('<label>content three</label><input type="text" id="content_three_reinsurance" name="id_config_animate[content_three_reinsurance]" value="%s" />',
				isset( $this->options['content_three_reinsurance'] ) ? esc_attr( $this->options['content_three_reinsurance']) : ''
			);
		}

		public function content_callback(){ 

				printf('<div>
						<label>Title</label>
						<input type="text" id="title_generic" name="id_config_animate[title_generic]" value="%s" />
					</div>',
					isset( $this->options['title_generic'] ) ? esc_attr( $this->options['title_generic']) : ''
				);
				printf('<div>
					<label>resume</label>
					<input type="text" id="resume_generic" name="id_config_animate[resume_generic]" value="%s" />
				</div>',
					isset( $this->options['resume_generic'] ) ? esc_attr( $this->options['resume_generic']) : ''
				);
		}

	     public function faq_callback()
	    {
	        printf(
	            '<label style="font-weight:bold; padding:20px 0 6px 0; display:block;">Faq Title</label>
	            <input  style="min-width:300px;" type="text" id="faq_title" name="id_config_animate[faq_title]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >Description faq</label>
	            <input  style="min-width:300px;" type="text" id="faq_desc" name="id_config_animate[faq_desc]" value="%s" />',
	            isset( $this->options['faq_title'] ) ? esc_attr( $this->options['faq_title']) : '',
	            isset( $this->options['faq_desc'] ) ? esc_attr( $this->options['faq_desc']) : ''
	        );
	     }
	     public function boolean_habillage()
	    {
	        printf(
	            '<label style="font-weight:bold; padding:20px 0 6px 0; display:block;">Activation de habillage</label>
	            <input  style="min-width:40px;" type="radio" class="boolean_rd" data-id="boolean_rd" name="same_bool" />
	            <input  style="min-width:40px;" type="hidden" id="boolean_rd" name="id_config_animate[boolean_rd]" value="%s" />
	            <br />
	            <Label style="font-weight:bold; padding:20px 0 6px 0; display:block;" >Activation habillage et info de la semaine</label>
	            <input  style="min-width:40px;" type="radio" class="boolean_rd_sm" data-id="boolean_rd_sm" name="same_bool" />
	            <input  style="min-width:40px;" type="hidden" id="boolean_rd_sm" name="id_config_animate[boolean_rd_sm]" value="%s" />',

	            isset( $this->options['boolean_rd'] ) ? esc_attr( $this->options['boolean_rd']) : '',
	            isset( $this->options['boolean_rd_sm'] ) ? esc_attr( $this->options['boolean_rd_sm']) : ''
	        );
	     }

		 public function title_page_callback(){ 
			printf('<input type="text" id="title_page" name="id_config_animate[title_page]" value="%s" />',
				isset( $this->options['title_page'] ) ? esc_attr( $this->options['title_page']) : ''
			);
		}
	}
    
    $my_settings_page = new MySettingsPage();

	function option_get_config_value($val){
		$optionCalled = get_option('id_config_animate')[$val];
		return $optionCalled;
	}



function validate_setting($plugin_options) { 
$keys = array_keys($_FILES); 
$i = 0; foreach ( $_FILES as $image ) {   
	// if a files was upload   
	if ($image['size']) {     
		// if it is an image     
		if ( preg_match('/(jpg|jpeg|png|gif)$/', $image['type']) ) {       
			$override = array('test_form' => false);       
			// save the file, and store an array, containing its location in $file       
			$file = wp_handle_upload( $image, $override );       
			$plugin_options[$keys[$i]] = $file['url'];     
		} else {       
		// Not an image.        
			$options = get_option('plugin_options');       
			$plugin_options[$keys[$i]] = $options[$logo];       
			// Die and let the user know that they made a mistake.       
			wp_die('No image was uploaded.');     
		}   
	}   
	// Else, the user didn't upload a file.   
	// Retain the image that's already on file.   
	else {     
		$options = get_option('plugin_options');     
		$plugin_options[$keys[$i]] = $options[$keys[$i]];   
	}   
		$i++; 
	} 
	return $plugin_options;


////////////////
}

add_action('wp_insert_post', 'wpc_champs_personnalises_defaut');

function wpc_champs_personnalises_defaut($post_id)
{
	//add_post_meta($post_id, 'hour_begin', '00:00', true);
	//add_post_meta($post_id, 'hour_end', '00:00', true);
	//add_post_meta($post_id, 'addresse', '93250 villemomble', true);
	//add_post_meta($post_id, 'bodyclass', 'test', true);
	//add_post_meta($post_id, 'categorypage', '', true);
	add_post_meta($post_id, 'prestations', 'Non', true);

	return true;
}

 //var_dump(get_the_category(the_ID())); 
function getCat($PID)
{
  $get_children_cat_post = get_categories('gallery', array(
        'hierarchical' => true
    ));

    $main_cat = str_replace("'", '',iconv('UTF-8','ASCII//TRANSLIT',str_replace(' ', '_',$get_children_cat_post[0]->name)));

	$getNameCat = get_the_category(the_ID());
	$getNameCat->cat_name;
	$name = '';

	foreach($getNameCat as $name_category){
		$name .= ' '.str_replace("'", '',iconv('UTF-8','ASCII//TRANSLIT',str_replace(' ', '_',$name_category->name)));
	}

	return printf($name .' '.$main_cat);
}

add_filter( 'shortcode_atts_wpcf7', 'custom_shortcode_atts_wpcf7_filter', 10, 3 );
 
function custom_shortcode_atts_wpcf7_filter( $out, $pairs, $atts ) {
    $my_attr = 'destination-email';
 
    if ( isset( $atts[$my_attr] ) ) {
        $out[$my_attr] = $atts[$my_attr];
    }
 
    return $out;
}

//[columpost]
// create my own shortCode
function createColum($atts, $content = null){
	
	$Old = array( '<br />', '<br>' );
	$New = array( '','' );
	$content = str_replace( $Old, $New, $content);

	return '<div class="row clearfix">'.do_shortcode($content).'</div>';
}

add_shortcode('createcolumrow', 'createColum');

function column_contact($atts, $content = null){
	$a = shortcode_atts(array(
		'type' => 'div',
		'col' => 12),
	$atts);

	return '<div class="contact-section">'.do_shortcode($content).'</div>';
}

add_shortcode('sectioncontact', 'column_contact');

function column_post($atts, $content = null){
	$a = shortcode_atts(array(
		'type' => 'figure',
		'col' => 6),
	$atts);

	return '<div class="col-lg-'.esc_attr($a['col']).' col-md-6 col-xs-12"><'.esc_attr($a['type']).'><p>'.$content.'</p></'.esc_attr($a['type']).'></div>';
}

add_shortcode('columpost', 'column_post');

function image($atts, $content = null){
	$a = shortcode_atts(array(
		'url' => '/',
		'col' => 6),
	$atts);

	return '<div class="col-lg-'.esc_attr($a['col']).' col-md-6 col-xs-12"><img src='.esc_attr($a["url"]).' /></div>';
}

add_shortcode('image', 'image');

function listaddress($atts, $content = null){
	$a = shortcode_atts(array(
		'type' => 'div',
		'title' => 'Notre addresse',
		'myaddress' => 'Mirpur New Bazar Road, Block-c, Dhaka-1210',
		'phone' => '(732) 803-01 03, (732) 806-01 04',
		'email' => 'smaple@gmail.com',
		'col' => 6),
	$atts);

	return '<div class="col-lg-'.esc_attr($a['col']).' col-md-6 col-xs-12">
		<'.esc_attr($a['type']).'>
			<article class="inner-box">
				<ul class="info-box">
					<li class="list-adr">
						<span class="icon flaticon-location"></span>
						<span><strong>Notre Addresse</strong></span>
						<span class="labelling">'.esc_attr($a['myaddress']).'</span> 
					</li>
					<li class="list-adr">
						<span class="icon flaticon-technology-5"></span>
						<span><strong>Numéro de téléphone</strong></span>
						<span class="labelling">'.esc_attr($a['phone']).'</span> 
					</li>
					<li class="list-adr">
						<span class="icon flaticon-interface-1"></span>
						<span><strong>Email</strong></span>
						<span class="labelling">'.esc_attr($a['email']).'</span> 
					</li>
				</ul>
			</article>
		</'.esc_attr($a['type']).'>
	</div>';
}

add_shortcode('address', 'listAddress');

function team_profile($atts, $content = null){
	$a = shortcode_atts(array(
		'type' => 'div',
		'name' => 'Thierry nguy',
		'post' => 'Mirpur New Bazar Road, Block-c, Dhaka-1210',
		'image' => '/',
		'linkedin' => '',
		'col' => 6),
	$atts);

	return '<article class="column team-member col-lg-3 col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
	<div class="inner-box">
		<figure class="image">
		<a href="mailto:mail@email.com">
		<img src="'.esc_attr($a['image']).'" alt=""></a></figure>
		<div class="member-info">
			<h3>'.esc_attr($a['name']).'</h3>
			<div class="designation">'.esc_attr($a['post']).'</div>
		</div>
		<div class="content">
			<div class="text"><p>'.$content.'</p></div>
			<div class="social-links">
				<a href="'.esc_attr($a['linkedin']).'"><span class="fa fa-linkedin"></span></a>
			</div>
		</div>
	</div>
</article>';
}

add_shortcode('teamprofil', 'team_profile');

function team_section($atts, $content = null){
	$a = shortcode_atts(array(
		'type' => 'div',
		'col' => 6),
	$atts);
	$no_br = preg_replace( "/(<br\s\/>)/", "", $content );
	return '<section class="team-section pb-0">
		<div class="auto-container">
			<div class="row clearfix">'.do_shortcode($no_br).'</div>
		</div>
	</section>';
}

add_shortcode('teamsection', 'team_section');

function column_single($atts, $content = null){
	$a = shortcode_atts(array(
		'type' => 'div',
		'col' => 6,
		'class' => '',
		'title' => 'title'
	),
	$atts);

	$Old = array( '<br />', '<br>' );
	$New = array( '','' );
	$content = str_replace( $Old, $New, $content );

	return '<div class="col-lg-'.esc_attr($a['col']).' '. esc_attr($a['class']). ' col-md-'.esc_attr($a['col']).' col-xs-12">
	<h2 class="title-colsingle">'.esc_attr($a['title']).'</h2>
		<'.esc_attr($a['type']).'>'.do_shortcode($content).'</'.esc_attr($a['type']).'>
		</div>';
}

add_shortcode('colsingle', 'column_single');

function maps_google($atts, $content = null){
	$address = option_get_config_value('address');
	$a = shortcode_atts(array(
			'type' => 'div',
			'class' => '', 
			'address' => $address,
			'title' => 'Google default'
		), $atts);
	return '
	<div class="column map-column col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<article class="inner-box">
            <div class="map-container">
                <div class="map-canvas"
                    data-zoom="12"
                    data-lat="48.8876729"
                    data-lng="2.488239300000032"			  
                    data-type="roadmap"
                    data-hue="#ffc400"
                    data-title="'.$a['title'].'"
                    data-content="'.$a['address'].'"							
                    style="height: 380px;">
                </div>
            </div>
        </article>
    </div>';
}

add_shortcode('googlemaps', 'maps_google');

// faq shortCode 
function faq($atts, $content = null){
	$a = shortcode_atts(array(
		'title' => '',
		'col' => 6,
		'class' => ''),
	$atts);


	$Old = array( '<br />', '<br>' );
	$New = array( '','' );
	$content = str_replace( $Old, $New, $content );

	return '<div class="accordion accordion-block">
			<div class="accord-btn">
				<h4>'.$a['title'].'</h4>
			</div>
			<div class="accord-content">
				'.$content.'
			</div>
		</div>';
}
add_shortcode('itemfaq', 'faq');

function accordion_box($atts, $content = null){
	$a = shortcode_atts(array(
		'title' => '',
		'col' => 12,
		'class' => ''),
	$atts);
	return 
	'<div class="accordion-box">'.do_shortcode($content).'</div>';
}

add_shortcode('accbox', 'accordion_box');

// faq shortCode 
function faqsection($atts, $content = null){
	$a = shortcode_atts(array(
		'title' => '',
		'col' => 6,
		'class' => ''),
	$atts);


	$Old = array( '<br />', '<br>' );
	$New = array( '','' );
	$content = str_replace( $Old, $New, $content );

	return '<div class="faqs-section">
			<div class="auto-container">
				'.do_shortcode($content).'
			</div>
		</div>';
}

add_shortcode('sectionfaq', 'faqsection');
// COMMENT form custom

function section_generic($atts, $content = null) {
	$keys = shortcode_atts(array(
		'image' => '',
		'title' => 'One example of title',
		'subtitle' => 'Seconde example of subtitle',
		'resume' => '',
		'link' => '',
		'col' => 12,
		'class' => ''
	), $atts);

	return '<section class="main-features parallax-section theme-overlay overlay-deep-black '.esc_attr($keys["class"]).'" style="background-image:url('.esc_attr($keys["image"]).');">
	<div class="auto-container">
		<div class="title-box text-center mb-0">
			<h1 class="fs-36 mb-15">'.esc_attr($keys["title"]).'</h1>
			<h2>'.esc_attr($keys["subtitle"]).'</h2>
			<div class="text">'.$content.'</div>
			<div class="">
				<a class="theme-btn btn-style-four" href="'.esc_attr($keys["link"]).'">Contacter nous</a>
				<a class="theme-btn btn-style-two" href="'.esc_attr($keys["link"]).'">Plus d\'informations</a>
			</div>
		</div>
	</div>
</section>';
}

add_shortcode('sectiongeneric', 'section_generic');

// function section_generic($atts, $content = null) {
// 	$key = shortcode_atts(array(
// 		'image' => '',
// 		'resume' = '',
// 		'link' => '',
// 		'col' => 12,
// 		'class' = ''
// 	), $atts)

// 	return ''
// }

// add_shortcode('sectiongeneric', 'section_generic');

function masonry_col($cat){
	$args = array(
        'category_name' => $cat
   );

   $queryGallery = new WP_Query($args);
    if ( $queryGallery->have_posts() ) :
        while ( $queryGallery->have_posts() ) : $queryGallery->the_post();
            get_template_part( 'template-parts/post/content', 'gallerycategory' );
        endwhile;
    endif;
}

function gallery($atts, $content = NULL){
	$a = shortcode_atts(array(
		'title' => '',
		'col' => 6,
		'class' => ''),
	$atts);


	$Old = array( '<br />', '<br>' );
	$New = array( '','' );
	$content = str_replace( $Old, $New, $content );

	$categorybyname = get_category_by_slug('gallery');
	
	$get_children_cat = get_categories(array(
		'child_of' => $categorybyname->term_id,
		'hierarchical' => false,
		'depth' => 0
	));

    $arrayCat = [];

    foreach($get_children_cat as $gallerypage){
        $getName = $gallerypage;
        $getName = $getName->name;
       
            $cat_id = str_replace(' ','_',$getName);
            $cat_classname = iconv('UTF-8','ASCII//TRANSLIT', $cat_id);
            $cat_classname = str_replace("'","",$cat_classname);
            
            $ar =  '<li class="filter" data-role="button" data-filter=".'.$cat_classname.'">'.$getName.'</li>';
    	
            array_push($arrayCat, $ar);
    }

	$count = count($arrayCat);

	echo '<section class="gallery-section sortable-masonry">
			<div class="auto-container">
				<div class="filters text-center">
		<ul class="filter-tabs filter-btns clearfix anim-3-all">'; 
			for ($i = 0; $i < $count; $i++) {
				echo $arrayCat[$i]; 
			}
	echo '</ul>
		</div>
		<div class="images-container">
		<div class="items-container row clearfix">';
    	masonry_col('gallery');
    echo '</div></div>
		</div>
	</div>
</section>';
}

add_shortcode('mygallery', 'gallery');

function urlVideoYoutube($atts, $content = NULL){
	$a = shortcode_atts(array(
		"url" => ''
	), $atts);

	return '<div class="column image-column col-md-6 col-sm-12 col-xs-12">
	    	<article class="inner-box wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
	    		<figure class="image-box video-box">'.
	            	$content .'
	                <a href="'. $a['url'].'" class="lightbox-image video-link"><div class="icon-outer"><span class="img-circle fa fa-play"></span></div></a>
	            </figure>
	        </article>
	    </div>';
}
add_shortcode('colvideo', 'urlVideoYoutube');

function contentAbout($atts, $content = NULL){
	$a = shortcode_atts(array(
		'title' => '',
		'resume'=>'',
		'desc'=>'example of text',
		'item' => '',
		'item2' => '',
		'item3' => '',
		'item4' => '',
		'item5' => ''

	), $atts);
	$Old = array( '<br />', '<br>' );
	$New = array( '','' );
	$content = str_replace( $Old, $New, $content );
	
	return'
	 <div class="column default-text-column with-margin col-md-6 col-sm-6 col-xs-12">
    	<article class="inner-box mt-10 wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
    		<h2 class="fs-32">'.$a['title'].'<span class="theme_color roboto-font"></span></h2>
            <div class="bigger-text">'.$a['resume'].'</div>
            <div class="text">'.$a['desc'].'</div>
			<ul class="styled-list-one no-margin-bottom">
				'.htmlspecialchars_decode(empty($a["item"]) ? "" :'<li>'.$a["item"].'</li>').'
				'.htmlspecialchars_decode(empty($a["item2"]) ? "" :'<li>'.$a["item2"].'</li>').'
				'.htmlspecialchars_decode(empty($a["item3"]) ? "" :'<li>'.$a["item3"].'</li>').'
				'.htmlspecialchars_decode(empty($a["item4"]) ? "" :'<li>'.$a["item4"].'</li>').'
				'.htmlspecialchars_decode(empty($a["item5"]) ? "" :'<li>'.$a["item5"].'</li>').'
			</ul>
        </article>
    </div>';
}
add_shortcode('colabout', 'contentAbout');

function col3($atts, $content = NULL){
	$a = shortcode_atts(array(
		'title' => ''
		), $atts);

	return '<div class="column default-text-column col-md-4 col-sm-6 col-xs-12">
                <div class="text-block">
                    <h3>'.$a['title'].'</h3>
                    <div class="text no-margin-bottom">'.$content.'</div>
                </div>
            </div>';
}
add_shortcode('col3', 'col3');

add_filter('comments_open', 'wpc_comments_closed', 10, 2);

function wpc_comments_closed( $open, $post_id ) {
$post = get_post( $post_id );
if ('post' == $post->post_type)
$open = false;
return $open;
}
function mytheme_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'div';
        $add_below = 'div-comment';
    }
    ?>
    <<?php echo $tag ?> 
    <?php comment_class( empty( $args['has_children'] ) ? 'wow fadeInUp animated' : 'parent wow fadeInUp animated' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body comment">
    <?php endif; ?>
    <div class="comment-author vcard">
        <?php if ( $args['avatar_size'] != 0 ) echo '<div class="author-thumb">'.get_avatar( $comment, $args['avatar_size'] ).'</div>' ?>
    </div>
    <div class="comment-info">
    	<strong><?php printf( __( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link() ); ?></strong>
    	<div class="comment-time comment-meta commentmetadata">
    		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
	    		<?php
		        /* translators: 1: date, 2: time */
		        printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
		        ?>	
		    </a>
    	</div>
	    <div class=" reply-btn reply">
	        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	    </div>
    </div>
    <?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
    <?php endif; ?>
	<div class="text">
	    <?php comment_text(); ?>
	</div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
    <?php
  }

  function addClassFaq($class1){
  	if(is_page('faq')){
  		return 
  			printf($class1);
  	}
  }

  function get_stylesheet_uri_quartier() {
	$stylesheet_dir_uri = get_stylesheet_directory_uri();
	$stylesheet_uri = $stylesheet_dir_uri . '/css/quartier.css';
	/**
	 * Filters the URI of the current theme stylesheet.
	 *
	 * @since 1.5.0
	 *
	 * @param string $stylesheet_uri     Stylesheet URI for the current theme/child theme.
	 * @param string $stylesheet_dir_uri Stylesheet directory URI for the current theme/child theme.
	 */
	return apply_filters( 'stylesheet_uri', $stylesheet_uri, $stylesheet_dir_uri );
}

add_filter( 'body_class', function( $classes ) {
	$page_id = get_the_ID();
	$pageClassCustom = get_post_meta( $page_id, 'bodyclass', true );

    return array_merge( $classes, array( $pageClassCustom ) );
} );

add_post_type_support( 'page', 'excerpt' );
