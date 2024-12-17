<?php
/**
 * Theme functions and definitions
 *
 * @package Blogrift
 */
if ( ! function_exists( 'blogrift_enqueue_styles' ) ) :
	/**
	 * @since 0.1
	 */
	function blogrift_enqueue_styles() {
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'blogus-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'blogrift-style', get_stylesheet_directory_uri() . '/style.css', array( 'blogus-style-parent' ), '1.0' );
		wp_dequeue_style( 'blogus-default',get_template_directory_uri() .'/css/colors/default.css');
		wp_enqueue_style( 'blogrift-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );

		if(is_rtl()){
		    wp_enqueue_style( 'blogus_style_rtl', trailingslashit( get_template_directory_uri() ) . 'style-rtl.css' );
	    }
		
	}

endif;
add_action( 'wp_enqueue_scripts', 'blogrift_enqueue_styles', 9999 );

function blogrift_theme_setup() {

    require( get_stylesheet_directory() . '/frontpage-options.php' );
    //Load text domain for translation-ready
    load_theme_textdomain('blogrift', get_stylesheet_directory() . '/languages');
    add_theme_support( "title-tag" );
    add_theme_support( 'automatic-feed-links' );
}

add_action( 'after_setup_theme', 'blogrift_theme_setup' );

add_action( 'customize_register', 'blogrift_customizer_rid_values', 1000 );
function blogrift_customizer_rid_values($wp_customize) {

  $wp_customize->remove_control('blogus_title_font_size'); 

}

if ( ! function_exists( 'blogrift_admin_scripts' ) ) :
    function blogrift_admin_scripts() {
        wp_enqueue_style('blogrift-admin-style-css', get_stylesheet_directory_uri() . '/css/customizer-controls.css');
    }
endif;
add_action( 'admin_enqueue_scripts', 'blogrift_admin_scripts' );

$args = array(
    'default-color' => '#fff',
    'default-image' => '',
);
add_theme_support( 'custom-background', $args );
/**
* banner additions.
*/
require get_stylesheet_directory().'/hooks/hook-front-page-main-banner-section.php';

if (!function_exists('blogrift_get_block')) :
    /**
     *
     * @param null
     *
     * @return null
     *
     * @since blogrift 1.0.0
     *
     */
    function blogrift_get_block($block = 'grid', $section = 'post')
    {

        get_template_part('hooks/blocks/block-' . $section, $block);

    }
endif;



function blogrift_theme_option( $wp_customize ) {
    /*--- Site title Font size **/
    $wp_customize->add_setting('blogrift_title_font_size',
        array(
            'default'           => 30,
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field',
            'priority' => 50,
        )
    );
    $wp_customize->add_control('blogrift_title_font_size',
        array(
            'label'    => esc_html__('Site Title Size', 'blogrift'),
            'section'  => 'title_tagline',
            'type'     => 'number',
        )
    );
}
add_action('customize_register','blogrift_theme_option');

if ( ! function_exists( 'blogrift_header_color' ) ) :
function blogrift_header_color() {
    $blogus_logo_text_color = get_header_textcolor();
    $blogrift_title_font_size = get_theme_mod('blogrift_title_font_size',30); ?>

    <style type="text/css">
    <?php if ( ! display_header_text() ) : ?>
        .site-title,
        .site-description {
            position: absolute;
            clip: rect(1px, 1px, 1px, 1px);
        }
    <?php else : ?>
        .site-title a,
        .site-description {
            color: #<?php echo esc_attr( $blogus_logo_text_color ); ?>;
        }

        .site-branding-text .site-title a {
            font-size: <?php echo esc_attr( $blogrift_title_font_size,30 ); ?>px;
        }

        @media only screen and (max-width: 640px) {
            .site-branding-text .site-title a {
                font-size: 26px;

            }
        }

        @media only screen and (max-width: 375px) {
            .site-branding-text .site-title a {
                font-size: 26px;

            }
        }

    <?php endif; ?>
    </style>
    <?php
}
endif;
add_action('wp_footer','blogrift_header_color');

function blogrift_limit_content_chr( $content, $limit=100 ) {
    return mb_strimwidth( strip_tags($content), 0, $limit, '...' );
}

if (!function_exists('blogrift_post_meta')) :
    function blogrift_post_meta() {

        $global_post_date = get_theme_mod('global_post_date_author_setting','show-date-author');
        $blogus_global_comment_enable = get_theme_mod('blogus_global_comment_enable', false); ?>
        <div class="bs-blog-meta">
            <?php if($global_post_date =='show-date-author') {
                blogus_author_content(); blogus_date_content();
            } elseif($global_post_date =='show-date-only') {
                blogus_date_content(); 
            } elseif($global_post_date =='show-author-only') {
                blogus_author_content(); 
            } elseif($global_post_date =='hide-date-author') { }

            if($blogus_global_comment_enable == true) { ?>
                <span class="comments-link"> <a href="<?php the_permalink(); ?>"><?php echo absint(get_comments_number()); ?> <?php esc_html_e('Comments','blogrift'); ?></a> </span>
            <?php } blogus_edit_link(); ?>
        </div>
        <?php
    }
endif;

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogrift_widgets_init() {

	$blogus_footer_column_layout = esc_attr(get_theme_mod('blogus_footer_column_layout',3));
	
	$blogus_footer_column_layout = 12 / $blogus_footer_column_layout;
	
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar Widget Area', 'blogrift' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="bs-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'blogrift' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-'.$blogus_footer_column_layout.' rotateInDownLeft animated bs-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="bs-widget-title"><h2 class="title">',
		'after_title'   => '</h2></div>',
	) );

}
add_action( 'widgets_init', 'blogrift_widgets_init' );