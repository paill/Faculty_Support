<?php
/**
 * Academic Technology Services functions and definitions
 *
 * @package Academic Technology Services
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'ats_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function ats_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Academic Technology Services, use a find and replace
	 * to change 'ats' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'ats', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in two locations.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'ats' ),
		'secondary' => __( 'Secondary Menu', 'ats' )
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	/*add_theme_support( 'custom-background', apply_filters( 'ats_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
	*/
}
endif; // ats_setup
add_action( 'after_setup_theme', 'ats_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function ats_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ats' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'ats_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function ats_scripts() {
	wp_enqueue_style( 'ats-style', get_stylesheet_uri() );
	
	wp_enqueue_style( 'cms-common' , 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/layout/common.css');
	wp_enqueue_style( 'cms-level_2' , 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/layout/level_2.css');
	wp_enqueue_style( 'cms-print' , 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/print.css');
	wp_enqueue_style( 'cms-color-common' , 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/common.css');
	
	$options = get_option('ats_theme_settings');
	if($options !=""){
		$color_option=$options['color'];
	}
	wp_enqueue_style( 'cms-ucdavis-scheme' , $color_option);
	
	if( !is_admin()){
		wp_deregister_script('jquery');
		wp_enqueue_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js', array(), '', false );
	}				
	wp_enqueue_script( 'ats-jquery-cycle', '/userJS/jquery.cycle.min.js', array('jquery'), '', false );	
	wp_enqueue_script( 'ats-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
	wp_enqueue_script( 'ats-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'ats-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'ats_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
//require get_template_directory() . '/inc/jetpack.php';

add_action('admin_init', 'ats_theme_settings_init' );
function ats_theme_settings_init(){
    register_setting( 'ats_theme_settings_options', 'ats_theme_settings' );
}
add_action('admin_menu', 'ats_register_theme_settings');

function ats_register_theme_settings() {
	add_theme_page('Theme settings', 'Theme settings', 'read', 'ats-theme-settings', 'ats_theme_settings');
}
function ats_theme_settings(){
	    ?>
	    <div class="wrap">
	        <h2>Theme Settings</h2>
	        <form method="post" action="options.php">
	            <?php settings_fields('ats_theme_settings_options'); ?>
	            <?php $options = get_option('ats_theme_settings'); ?>
	            <table class="form-table">
	                <tr valign="top"><th scope="row">Color Option</th>
	                    <td><select name="ats_theme_settings[color]">
										<option value="https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/gunrock_gold.css" <?php selected( $options['color'], 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/gunrock_gold.css' ); ?>>Gunrock - Gold</option>
										
										<option value="https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/gunrock_gold_ruled.css" <?php selected( $options['color'], 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/gunrock_gold_ruled.css' ); ?>>Gunrock - Gold, Ruled</option>
										
										<option value="https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/gunrock_blue.css" <?php selected( $options['color'], 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/gunrock_blue.css' ); ?>>Gunrock - Blue</option>
										
										<option value="https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/gunrock_white_ruled.css" <?php selected( $options['color'], 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/gunrock_white_ruled.css' ); ?>>Gunrock - White, ruled</option>
										
										<option value="https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/silo_gold_dark-blue.css" <?php selected( $options['color'], 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/silo_gold_dark-blue.css' ); ?>>Silo - Gold, Dark Blue</option>
										
										<option value="https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/silo_blue_medium-blue_pale-gold.css" <?php selected( $options['color'], 'https://cmsresources.ucdavis.edu/cms_v2/css_v2/color/silo_blue_medium-blue_pale-gold.css' ); ?>>Silo - Blue, Medium Blue, and Pale Gold</option>
									</select></td>
	                </tr>
	                <tr valign="top"><th scope="row">Department name</th>
	                    <td><input type="text" name="ats_theme_settings[dept_name]" value="<?php echo $options['dept_name']; ?>" /></td>
	                </tr>
						<tr valign="top"><th scope="row">Department address</th>
	                    <td><input type="text" name="ats_theme_settings[dept_address]" value="<?php echo $options['dept_address']; ?>" /></td>
	                </tr>
						<tr valign="top"><th scope="row">Department phone</th>
	                    <td><input type="text" name="ats_theme_settings[dept_phone]" value="<?php echo $options['dept_phone']; ?>" /></td>
	                </tr>
						<tr valign="top"><th scope="row">Department contact email</th>
	                    <td><input type="text" name="ats_theme_settings[dept_email]" value="<?php echo $options['dept_email']; ?>" /></td>
	                </tr>
	            </table>
	            <p class="submit">
	            <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
	            </p>
	        </form>
	    </div>
	    <?php   
}

function dimox_breadcrumbs() {

	/* === OPTIONS === */
	$text['home']     = 'Home'; // text for the 'Home' link
	$text['category'] = 'Archive by Category "%s"'; // text for a category page
	$text['search']   = 'Search Results for "%s" Query'; // text for a search results page
	$text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
	$text['author']   = 'Articles Posted by %s'; // text for an author page
	$text['404']      = 'Error 404'; // text for the 404 page

	$show_current   = 1; // 1 - show current post/page/category title in breadcrumbs, 0 - don't show
	$show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$show_home_link = 1; // 1 - show the 'Home' link, 0 - don't show
	$show_title     = 1; // 1 - show the title for the links, 0 - don't show
	$delimiter      = ' '; // delimiter between crumbs
	$before         = '<span class="here">'; // tag before the current crumb
	$after          = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */

	global $post;
	$home_link    = home_url('/');
	$link_before  = '<li>';
	$link_after   = '</li>';
	$link_attr    = '';
	$link         = $link_before . '<a' . $link_attr . ' href="%1$s">%2$s</a>' . $link_after;
	$parent_id    = $parent_id_2 = $post->post_parent;
	$frontpage_id = get_option('page_on_front');

	if (is_home() || is_front_page()) {

		if ($show_on_home == 1) echo '<a href="' . $home_link . '">' . $text['home'] . '</a>';

	} else {

		echo '<ul>';
		if ($show_home_link == 1) {
			echo '<li><a href="' . $home_link . '">' . $text['home'] . '</a></li>';
			if ($frontpage_id == 0 || $parent_id != $frontpage_id) echo $delimiter;
		}

		if ( is_category() ) {
			$this_cat = get_category(get_query_var('cat'), false);
			if ($this_cat->parent != 0) {
				$cats = get_category_parents($this_cat->parent, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
			}
			if ($show_current == 1) echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

		} elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;

		} elseif ( is_day() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
			echo $before . get_the_time('d') . $after;

		} elseif ( is_month() ) {
			echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
			echo $before . get_the_time('F') . $after;

		} elseif ( is_year() ) {
			echo $before . get_the_time('Y') . $after;

		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($show_current == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
				$cats = str_replace('</a>', '</a>' . $link_after, $cats);
				if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
				echo $cats;
				if ($show_current == 1) echo $before . get_the_title() . $after;
			}

		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . $post_type->labels->singular_name . $after;

		} elseif ( is_attachment() ) {
			$parent = get_post($parent_id);
			$cat = get_the_category($parent->ID); $cat = $cat[0];
			$cats = get_category_parents($cat, TRUE, $delimiter);
			$cats = str_replace('<a', $link_before . '<a' . $link_attr, $cats);
			$cats = str_replace('</a>', '</a>' . $link_after, $cats);
			if ($show_title == 0) $cats = preg_replace('/ title="(.*?)"/', '', $cats);
			echo $cats;
			printf($link, get_permalink($parent), $parent->post_title);
			if ($show_current == 1) echo $delimiter . $before . get_the_title() . $after;

		} elseif ( is_page() && !$parent_id ) {
			if ($show_current == 1) echo $before . get_the_title() . $after;

		} elseif ( is_page() && $parent_id ) {
			if ($parent_id != $frontpage_id) {
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					if ($parent_id != $frontpage_id) {
						$breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
					}
					$parent_id = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				for ($i = 0; $i < count($breadcrumbs); $i++) {
					echo $breadcrumbs[$i];
					if ($i != count($breadcrumbs)-1) echo $delimiter;
				}
			}
			if ($show_current == 1) {
				if ($show_home_link == 1 || ($parent_id_2 != 0 && $parent_id_2 != $frontpage_id)) echo $delimiter;
				echo $before . get_the_title() . $after;
			}

		} elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;

		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}

		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo __('Page') . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}

		echo '</ul><!-- .breadcrumbs -->';

	}
} // end dimox_breadcrumbs()

function subpage_peek() {
	global $post;
	
	//query subpages
	$args = array(
		'post_parent' => $post->ID,
		'post_type' => 'page',
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page'=>-1
	);
	$subpages = new WP_query($args);
	
	// create output
	if ($subpages->have_posts()) :
		$output = '<ul>';
		while ($subpages->have_posts()) : $subpages->the_post();
			$output .= '<li><strong><a href="'.get_permalink().'">'.get_the_title().'</a></strong>
						<p>'.get_the_excerpt().'<br />
						<a href="'.get_permalink().'">Learn more...</a></p></li>';
		endwhile;
		$output .= '</ul>';
	else :
		$output = '<p>No subpages found.</p>';
	endif;
	
	// reset the query
	wp_reset_postdata();
	
	// return something
	return $output;
}
add_shortcode('subpage_peek', 'subpage_peek');