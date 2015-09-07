<?php
// Enable featured image
add_theme_support( 'post-thumbnails');

// $content_width
if ( ! isset( $content_width ) ) {
	$content_width = 1170;
}

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Styles the visual editor with editor-style.css to match the theme style
add_editor_style();

// Load theme languages
load_theme_textdomain( 'francoise', get_template_directory().'/languages' );

// Option tree theme options
add_filter( 'ot_show_pages', '__return_false' );
add_filter( 'ot_theme_mode', '__return_true' );
require( trailingslashit( get_template_directory() ) . 'includes/theme-options.php' );
require( trailingslashit( get_template_directory() ) . 'option-tree/ot-loader.php' );
require( trailingslashit( get_template_directory() ) . 'includes/uni-metabox.php' );

// include widgets classes
require( trailingslashit( get_template_directory() ) . 'includes/uniwidget_subscribe_form.php' );
require( trailingslashit( get_template_directory() ) . 'includes/uniwidget_popular_posts.php' );
require( trailingslashit( get_template_directory() ) . 'includes/uniwidget_social_links.php' );
require( trailingslashit( get_template_directory() ) . 'includes/uniwidget_about_me.php' );

// init theme's widgets
add_action( 'widgets_init', 'uni_themes_widgets_init' );
function uni_themes_widgets_init() {
	register_widget( 'uniwidget_about_me_widget' );
    register_widget( 'uniwidget_popular_posts_widget' );
    register_widget( 'uniwidget_social_links_widget' );
    register_widget( 'uniwidget_subscribe_form_widget' );
}

//
add_filter( 'ot_radio_images', 'uni_color_schemes_radio_images', 10, 2 );
function uni_color_schemes_radio_images( $array, $field_id ) {
    if ( $field_id == 'uni_color_schemes' ) {
        $array = array(
            array(
                'value'   => 'default',
                'label'   => __( 'Default scheme', 'francoise' ),
                'src'     => get_template_directory_uri() . '/images/schemes/default.jpg'
            ),
            array(
                'value'   => 'orange',
                'label'   => __( 'Orange colour scheme', 'francoise' ),
                'src'     => get_template_directory_uri() . '/images/schemes/orange.jpg'
            ),
            array(
                'value'   => 'red',
                'label'   => __( 'Red colour scheme', 'francoise' ),
                'src'     => get_template_directory_uri() . '/images/schemes/red.jpg'
            ),
            array(
                'value'   => 'brown',
                'label'   => __( 'Brown colour scheme', 'francoise' ),
                'src'     => get_template_directory_uri() . '/images/schemes/brown.jpg'
            ),
            array(
                'value'   => 'blue',
                'label'   => __( 'Blue colour scheme', 'francoise' ),
                'src'     => get_template_directory_uri() . '/images/schemes/blue.jpg'
            ),
        );
    }
    return $array;
}

// Mailchimp API 3.0
include(trailingslashit( get_template_directory() ) . 'includes/class-uni-mailchimp-universal.php');

// Register Custom Menu Function
if (function_exists('register_nav_menus')) {
		register_nav_menus( array(
			'primary' => ( 'Francoise Main Menu' ),
            'footer' => ( 'Francoise Footer Menu' )
		) );
}

// Menu fallback
function uni_nav_fallback( $sClassForMenu = '' ) {
    $sOutput = '<nav class="mainMenu'.( ( !empty($sClassForMenu) ) ? ' '.$sClassForMenu : '' ).'"><ul class="clear">';
    $sOutput .= wp_list_pages( array('title_li' => '', 'echo' => false) );
    $sOutput .= '</ul></nav>';
    echo $sOutput;
}

// Menu footer fallback
function uni_nav_footer_fallback() {
    $sOutput = '';
    echo $sOutput;
}

//
add_filter( 'body_class', 'uni_new_body_class');
function uni_new_body_class( $classes ) {

    if ( !has_nav_menu('footer') ) {
        $classes[] = 'noFooterMenu';
    }
    if ( ot_get_option( 'uni_counters_section_enable' ) != 'on' || !class_exists('SC_PRO_Class') ) {
        $classes[] = 'noSocialCounters';
    }
    if ( ot_get_option( 'uni_single_archive_style' ) == 'wo-sidebar' && ( is_single() || is_archive() ) ) {
        $classes[] = 'single-wo-sidebar';
    }

    return $classes;
}

// wp-title
function uni_wp_title( $sTitle, $sSeparator ) {
	global $paged, $page;

	if ( is_feed() )
		return $sTitle;

    $sSeparator = '&raquo;';

	// Add the site description for the home/front page.
	$sSiteDesc = get_bloginfo( 'description' );
	if ( empty($sTitle) && !empty( $sSiteDesc ) && ( is_home() || is_front_page() ) ) {
		$sTitle = get_bloginfo( 'name' )." $sSeparator $sSiteDesc";
    } else if ( empty($sTitle) && empty( $sSiteDesc ) && ( is_home() || is_front_page() ) ) {
        $sTitle = get_bloginfo( 'name' );
    } else {
        $sTitle = get_bloginfo( 'name' )." $sTitle";
    }

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$sTitle = get_bloginfo( 'name' )." $sSeparator " . sprintf( __( 'Page %s', 'francoise' ), max( $paged, $page ) );

	return $sTitle;
}
add_filter( 'wp_title', 'uni_wp_title', 10, 2 );

// Add html5 suppost for search form and comments list
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

// TGM class 2.5.0 - neccessary plugins
include("includes/class-tgm-plugin-activation.php");

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {

    $plugins = array(
        array(
            'name'      => 'Instagram Feed',
            'slug'      => 'instagram-feed',
            'required'  => true,
        ),
        array(
            'name'      => 'WP Instagram Widget',
            'slug'      => 'wp-instagram-widget',
            'required'  => true,
        ),
        array(
            'name'      => 'Recent Tweets Widget',
            'slug'      => 'recent-tweets-widget',
            'required'  => true,
        ),
		array(
			'name'               => 'Uni User Avatar',
			'slug'               => 'uni-user-avatar',
			'source'             => get_template_directory() . '/includes/plugins/uni-user-avatar.zip',
			'required'           => true,
			'version'            => '1.6.2',
			'force_activation'   => false,
			'force_deactivation' => false,
			'external_url'       => 'http://codecanyon.net/item/uni-avatar-wp-avatar-manager-plugin/10751977',
		),
		array(
			'name'               => 'AccessPress Social Pro',
			'slug'               => 'accesspress-social-pro',
			'source'             => get_template_directory() . '/includes/plugins/accesspress-social-pro.zip',
			'required'           => true,
			'version'            => '1.1.0',
			'force_activation'   => false,
			'force_deactivation' => false,
		),
		array(
			'name'               => 'Envato WordPress Toolkit',
			'slug'               => 'envato-wordpress-toolkit',
			'source'             => get_template_directory() . '/includes/plugins/envato-wordpress-toolkit.zip',
			'required'           => false,
			'version'            => '1.7.3',
			'force_activation'   => false,
			'force_deactivation' => false,
            'external_url'       => 'https://github.com/envato/envato-wordpress-toolkit'
		),
        array(
            'name'      => 'Contact Form 7',
            'slug'      => 'contact-form-7',
            'required'  => false,
        ),
        array(
            'name'      => 'Intuitive Custom Post Order',
            'slug'      => 'intuitive-custom-post-order',
            'required'  => false,
        ),
        array(
            'name'      => 'Shortcodes Ultimate',
            'slug'      => 'shortcodes-ultimate',
            'required'  => false,
        )
    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}

// Load necessary theme scripts and styles
function uni_theme_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-masonry');
    // cssua
    wp_register_script('jquery-cssua', get_template_directory_uri() . '/js/cssua.min.js', array('jquery'), '2.1.29' );
    wp_enqueue_script('jquery-cssua');
    // bxSlider
    wp_register_script('jquery-bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.2.3' );
    wp_enqueue_script('jquery-bxslider');
    // dotdotdot
    wp_register_script('jquery-dotdotdot', get_template_directory_uri() . '/js/jquery.dotdotdot.min.js', array('jquery'), '4.2.3' );
    wp_enqueue_script('jquery-dotdotdot');
    // jquery.blockUI
    wp_register_script('jquery-blockui', get_template_directory_uri() . '/js/jquery.blockUI.js', array('jquery'), '2.70.0' );
    wp_enqueue_script('jquery-blockui');
    // parsley localization
    $sLocale = get_locale();
    $aLocale = explode('_',$sLocale);
    $sLangCode = $aLocale[0];
    if ( !file_exists( get_template_directory() . '/js/parsley/i18n/'.$sLangCode.'.js' ) ) {
        $sLangCode = 'en';
    }
    wp_register_script('parsley-localization', get_template_directory_uri() . '/js/parsley/i18n/'.$sLangCode.'.js', array('jquery'), '2.0.7' );
    wp_enqueue_script('parsley-localization');
    // parsley
    wp_register_script('jquery-parsley', get_template_directory_uri() . '/js/parsley.min.js', array('jquery'), '2.0.7' );
    wp_enqueue_script('jquery-parsley');
    // theme scripts
    wp_register_script('uni-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.1.2' );
    wp_enqueue_script('uni-script');
    
    wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
    wp_register_style( 'bxslider', get_template_directory_uri() . '/css/bxslider.css', '4.2.3' );
    wp_enqueue_style( 'bxslider');
    wp_register_style( 'ball-clip-rotate', get_template_directory_uri() . '/css/ball-clip-rotate.css', '0.1.0' );
    wp_enqueue_style( 'ball-clip-rotate');

    if ( is_home() ) {
        $params = array(
            'site_url'      => home_url(),
		    'ajax_url' 		=> admin_url('admin-ajax.php'),
            'is_home'       => 'yes',
            'locale'        => $sLangCode
	    );
    } else {
        $params = array(
            'site_url'      => home_url(),
		    'ajax_url' 		=> admin_url('admin-ajax.php'),
            'is_home'       => 'no',
            'locale'        => $sLangCode
	    );
    }

	wp_localize_script( 'uni-script', 'unithemeparams', $params );

}
add_action('wp_enqueue_scripts', 'uni_theme_scripts');

// Enqueue style.css (default WordPress stylesheet)
function uni_theme_style() {
    wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.1.2', 'all' );
    wp_enqueue_style( 'style' );
    if ( !ot_get_option( 'uni_color_schemes' ) ) {
        wp_register_style( 'uni-theme-francoise-scheme', get_template_directory_uri() . '/css/scheme-default.css', array('style'), '1.1.2', 'screen' );
        wp_enqueue_style( 'uni-theme-francoise-scheme' );
    } else {
        $sColourScheme = ot_get_option( 'uni_color_schemes' );
        wp_register_style( 'uni-theme-francoise-scheme', get_template_directory_uri() . '/css/scheme-'.$sColourScheme.'.css', array('style'), '1.1.2', 'screen' );
        wp_enqueue_style( 'uni-theme-francoise-scheme' );
    }
    wp_register_style( 'adaptive', get_template_directory_uri() . '/css/adaptive.css', array('style'), '1.1.2', 'screen' );
    wp_enqueue_style( 'adaptive' );
}
add_action( 'wp_enqueue_scripts', 'uni_theme_style' );

//
add_action('admin_enqueue_scripts', 'uni_admin_script');
function uni_admin_script() {
    wp_enqueue_script( 'my-admin', get_template_directory_uri() . '/js/uni-admin.js', array('jquery'), '1.1.2' );
}

// Add new image sizes
add_image_size( 'unithumb-blog', 840, 512, true );
add_image_size( 'unithumb-pagebigimage', 840, 560, true );
add_image_size( 'unithumb-related', 260, 174, true );
add_image_size( 'unithumb-adjacentposts', 60, 60, true );
add_image_size( 'unithumb-homeonebig', 1170, 570, true );
add_image_size( 'unithumb-homeonesquare', 570, 570, true );
add_image_size( 'unithumb-homeonehalf', 570, 270, true );
add_image_size( 'unithumb-homeslider', 1170, 570, true );
add_image_size( 'unithumb-blogmasonry', 370, 0, true );
add_image_size( 'unithumb-bloglist', 420, 256, true );
add_image_size( 'unithumb-bloggrid', 370, 250, true );

// Register sidebar
if ( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => __('Sidebar', 'francoise'),
        'id' => 'sidebar-main',
        'before_widget' => '<div class="sidebar-widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
}

// theme activation
add_action('after_switch_theme', 'uni_theme_activation_func', 10);
function uni_theme_activation_func() {
}

// theme deactivation
add_action('switch_theme', 'uni_theme_deactivation_func');
function uni_theme_deactivation_func() {
}

// Related by tags posts with thumb
function uni_related_posts_by_tags() {

    global $post;
    $oOriginalPost = $post;
    $aTags = wp_get_post_tags( $post->ID );
    $sDateAndTimeFormat = get_option( 'date_format' ).' '.get_option( 'time_format' );

    if ( isset($aTags) ) {
        $aRelativeTagArray = array();
        foreach($aTags as $oTag)
            $aRelativeTagArray[] = $oTag->term_id;

        $aRelatedArgs = array(
            'post_type' => 'post',
            'tag__in' => $aRelativeTagArray,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 3,
            'orderby' => 'rand',
            'ignore_sticky_posts' => 1
        );

        $oRelatedQuery = new wp_query( $aRelatedArgs );
        if( $oRelatedQuery->have_posts() ) {

        echo '<div class="relatedPostsBox">
			    <h3>'.__('related posts', 'francoise').'</h3>
			    <div class="relatedPostsWrap clear">';

        while( $oRelatedQuery->have_posts() ) {
        $oRelatedQuery->the_post();
        ?>
						<a href="<?php the_permalink() ?>" class="relatedPostItem">
                        <?php if ( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail( 'unithumb-related', array( 'alt' => the_title_attribute('echo=0') ) ); ?>
                        <?php } else { ?>
						    <img src="http://placehold.it/260x174/8acace/ffffff" alt="<?php the_title_attribute() ?>" width="260" height="174">
                        <?php } ?>
                            <div class="dark-overlay"></div>
							<div class="overlayBox">
								<div class="relatedPostDesc">
                                    <time class="postTime" datetime="<?php the_time('Y-m-d'); ?>"><?php the_time( $sDateAndTimeFormat ); ?></time>
									<h4><?php the_title() ?></h4>
								</div>
							</div>
						</a>
        <?php }
        echo '</div>
				</div>';
        }
        }
        $post = $oOriginalPost;
        wp_reset_postdata();
}

// post navigation
function uni_pagination($sPages = '', $sRange = 1) {
     $sShowItems = ($sRange * 2)+1;

     global $paged;
     if(empty($paged)) $paged = 1;

     if($sPages == '') {
         global $wp_query;
         $sPages = $wp_query->max_num_pages;
         if(!$sPages) {
             $sPages = 1;
         }
     }

     if( 1 != $sPages ) { ?>
				<ul>
                <?php if ( $paged > 1 && $sShowItems < $sPages ) { ?>
					<li class="newPosts">
						<a href="<?php echo get_pagenum_link( 1 ); ?>">
							<?php _e('Newer posts', 'francoise'); ?>
						</a>
					</li>
                <?php } ?>
                <?php
                if ($paged > 2 && $paged > $sRange+2 && $sShowItems < $sPages) {
                ?>
					<li class="threeDot">...</li>
				<?php
                }
                ?>
                <?php
                for ($i=1; $i <= $sPages; $i++) {
                    if (1 != $sPages && ( !($i >= $paged+$sRange+1 || $i <= $paged-$sRange-1) || $sPages <= $sShowItems ) ) {
                        echo ($paged == $i) ? '<li class="current">'.$i.'</li>' : '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
                    }
                }
                ?>
                <?php
                if ($paged < $sPages-3 &&  $paged+$sRange-3 < $sPages && $sShowItems < $sPages) {
                ?>
					<li class="threeDot">...</li>
				<?php
                }
                ?>
                <?php if ($paged < $sPages && $sShowItems < $sPages) { ?>
					<li class="olderPosts">
						<a href="<?php echo get_pagenum_link( $paged + 1 ); ?>">
                            <?php _e('Older posts', 'francoise') ?>
						</a>
					</li>
                <?php } ?>
				</ul>
     <?php
     }
}

// custom excerpt
function uni_excerpt( $iLength, $iPostId = '', $bEcho = false, $sMore = null ) {
    if ( !empty($iPostId) ) {
        $oPost = get_post( $iPostId );
    } else {
        global $post;
        $oPost = $post;
    }

	if ( null === $sMore )
		$sMore = __( '&hellip;', 'francoise' );

    $sContent = $oPost->post_content;
	$sContent = wp_strip_all_tags( $sContent );
    $sContent = strip_shortcodes( $sContent );
	if ( 'characters' == _x( 'words', 'word count: words or characters?', 'francoise' ) && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
		$sContent = trim( preg_replace( "/[\n\r\t ]+/", ' ', $sContent ), ' ' );
		preg_match_all( '/./u', $sContent, $aWordsArray );
		$aWordsArray = array_slice( $aWordsArray[0], 0, $iLength + 1 );
		$sep = '';
	} else {
		$aWordsArray = preg_split( "/[\n\r\t ]+/", $sContent, $iLength + 1, PREG_SPLIT_NO_EMPTY );
		$sep = ' ';
	}
	if ( count( $aWordsArray ) > $iLength ) {
		array_pop( $aWordsArray );
		$sContent = implode( $sep, $aWordsArray );
        $sContent = $sContent . $sMore;
	} else {
		$sContent = implode( $sep, $aWordsArray );
	}
    if ( $bEcho ) {
        echo '<p>'.$sContent.'</p>';
    } else {
        return $sContent;
    }
}

//
function uni_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'uni_custom_excerpt_length', 999 );

//
function uni_new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'uni_new_excerpt_more');

function uni_share_facebook() {
	return 'http://www.facebook.com/sharer.php?u='.urlencode(get_permalink()).'&t='.urlencode(get_the_title());
}

function uni_share_twitter() {
	return 'http://twitter.com/share?text='.urlencode(get_the_title()).'&url='.urlencode(get_permalink());
}

function uni_share_gplus() {
	return 'https://plus.google.com/share?url='.urlencode(get_permalink());
}

function uni_share_pinterest() {
    $aImage = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
    $sImageUrl = '';
	if ( isset($aImage[0]) ) $sImageUrl = $aImage[0];
	if ( $sImageUrl == false ) {
		$sImageUrl = get_template_directory_uri() . '/images/placeholders/unithumb-blog.jpg';
	}
	return 'http://pinterest.com/pin/create/button/?url='.urlencode( get_permalink() )
            .'&media='.urlencode($sImageUrl).'&description='.urlencode(get_the_title());
}

// comments
function uni_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
    global $post;
	?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
	<a id="view-comment-<?php comment_ID(); ?>" class="comment-anchor"></a>
	<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
		<footer class="comment-meta">
			<div class="comment-author vcard">
				<?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
			</div><!-- .comment-author -->

			<div class="reply">
				<?php comment_reply_link(array_merge($args, array(
					'add_below' => 'div-comment',
					'depth' => $depth,
					'max_depth' => $args['max_depth'],
					'before' => '<div>',
					'after' => '</div>'
				))); ?>
			</div><!-- .reply -->
		</footer><!-- .comment-meta -->

		<div class="comment-wrapper">
			<?php
            if ( $comment->user_id === $post->post_author ) {
                printf('<cite class="fn">%s</cite><span class="uni-post-author">%s</span>', get_comment_author_link(), __('post author', 'francoise'));
            } else {
                printf('<cite class="fn">%s</cite>', get_comment_author_link());
            }
            ?>

			<span class="comment-metadata">
				<a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
					<time datetime="<?php comment_time('c'); ?>">
						<?php printf(_x('%1$s at %2$s', '1: date, 2: time', 'francoise'), get_comment_date(), get_comment_time()); ?>
					</time>
				</a>
				<?php edit_comment_link(__('Edit', 'francoise'), '<span class="separator">&middot;</span> <span class="edit-link">', '</span>'); ?>
			</span><!-- .comment-metadata -->

			<?php if ('0' == $comment->comment_approved): ?>
				<p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'francoise'); ?></p>
			<?php endif; ?>

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->
		</div>
	</article><!-- .comment-body -->
<?php
}

// popup messages
if ( !function_exists('uni_add_js_message_div') ) {
    function uni_add_js_message_div() {
        echo '<div id="uni_popup"></div>';
    }
    add_action('wp_footer', 'uni_add_js_message_div');
}

// Ajax contact form - processing
function uni_contact_form(){

        $aResult               = array();
        $aResult['message']    = __('Error!', 'francoise');
        $aResult['status']     = 'error';

        $sCustomerName          = esc_sql($_POST['uni_contact_name']);
        $sCustomerEmail         = esc_sql($_POST['uni_contact_email']);
        $sCustomerSubject       = esc_sql($_POST['uni_contact_subject']);
        $sCustomerMsg           = esc_sql($_POST['uni_contact_msg']);
        $sNonce                 = $_POST['uni_contact_nonce'];
        $sAntiCheat             = $_POST['cheaters_always_disable_js'];

        if ( ( empty($sAntiCheat) || $sAntiCheat != 'true_bro' ) || !wp_verify_nonce( $_POST['uni_contact_nonce'], 'uni_nonce' ) ) {
            wp_send_json( $aResult );
        }

        if ( $sCustomerName && $sCustomerEmail && $sCustomerSubject && $sCustomerMsg ) {

            $sToEmail 		    = ( ot_get_option( 'uni_email' ) ) ? ot_get_option( 'uni_email' ) : get_bloginfo('admin_email');
            $sFromEmail         = $sCustomerEmail;
            $sHeadersText       = "$sCustomerName <$sFromEmail>";
	        $sSubjectText 		= $sCustomerSubject;

            $sBlogName          = get_bloginfo('name');

            $sMessage           =
                    "<h3>".sprintf( __('You have a new message sent from "%s"!', 'francoise'), $sBlogName )."</h3>
                    <p></p>
                    <p><strong>".__('Contact information', 'francoise').":</strong><br>
                    ".sprintf( __('Name: %s', 'francoise'), $sCustomerName )."
                    <br>
                    ".sprintf( __('Email: %s', 'francoise'), $sCustomerEmail )."
                    <br>
                    ".__('Message', 'francoise').":
                    <br>$sCustomerMsg
                    </p>";
            $sMessage = stripslashes_deep( $sMessage );

            uni_send_email_wrapper( $sToEmail, $sHeadersText, $sSubjectText, false, array(), $sMessage );

            $aResult['status']     = 'success';
            $aResult['message']    = __('Thanks! You message has been sent!', 'francoise');

        } else {
            $aResult['message']    = __('All fields are required!', 'francoise');
        }

	    wp_send_json( $aResult );
}
add_action('wp_ajax_uni_contact_form', 'uni_contact_form');
add_action('wp_ajax_nopriv_uni_contact_form', 'uni_contact_form');

// mailchimp subscribe user
function uni_mailchimp_subscribe_user(){

    $aResult                = array();
    $aResult['message']     = __('Error!', 'francoise');
    $aResult['status']      = 'error';

    $sEmail                 = $_POST['uni_input_email'];
    $sAntiCheat             = $_POST['cheaters_always_disable_js'];

    if ( empty($sAntiCheat) || $sAntiCheat != 'true_bro' ) {
        wp_send_json( $aResult );
    }

    $sApiKey            = ot_get_option( 'uni_mailchimp_api_key' );
    $sListId            = ot_get_option( 'uni_mailchimp_list_id' );

    if ( !empty($sApiKey) && !empty($sListId) ) {

        $oUniMailchimp = Uni_Mailchimp_Universal( $sApiKey, $sListId );
        $aResponse = $oUniMailchimp->call_lists_members( 'lists/members', 'POST', array('email_address' => $sEmail, 'status' => 'pending') );

        if ( $aResponse['status'] == 'success' ) {
            $aResult['message']     = __('Success!', 'francoise');
            $aResult['status']      = 'success';
        } else {
            $aResult['message']     = ( isset($aResponse['response']->detail) && !empty($aResponse['response']->detail) ) ? $aResponse['response']->detail : $aResponse['message'];
        }

    } else {
        $aResult['message']     = __('No API key and/or List ID is/are specified!', 'francoise');
    }

    wp_send_json( $aResult );
}
add_action('wp_ajax_uni_mailchimp_subscribe_user', 'uni_mailchimp_subscribe_user');
add_action('wp_ajax_nopriv_uni_mailchimp_subscribe_user', 'uni_mailchimp_subscribe_user');

//
function uni_send_email_wrapper( $sEmailTo, $sEmailFrom, $sSubjectText, $sEmailTemplateName, $aMailVars = array(), $sEmailText = '' ) {

	    $sCharset = 'UTF-8';
	    mb_internal_encoding($sCharset);

	    $sSubject           = mb_convert_encoding($sSubjectText, $sCharset, 'auto');
	    $sSubject           = mb_encode_mimeheader($sSubjectText, $sCharset, 'B');
        $sHeaders 			= "From: $sEmailFrom\r\nContent-Type: text/html; charset=" . get_option('blog_charset') . "\n";

        if ( $sEmailTemplateName != false ) {
            $sMailContent   = uni_get_email_content_html( $sEmailTemplateName, $aMailVars );
        } else {
            $sMailContent   = $sEmailText;
        }

        wp_mail($sEmailTo, $sSubject, $sMailContent, $sHeaders);

}

//
function uni_get_email_content_html( $sEmailTemplateName, $aMailVars = array() ) {
		ob_start();
		uni_get_template( $sEmailTemplateName );
		$sMailContent = ob_get_clean();
        if ( !empty($aMailVars) ) {
            foreach ( $aMailVars as $sVarName => $sVarValue ) {
                $sMailContent = str_replace($sVarName, $sVarValue, $sMailContent);
            }
        }
        return $sMailContent;
}

//
function uni_get_template( $sEmailTemplateName, $args = array() ) {
	if ( $args && is_array( $args ) ) {
		extract( $args );
	}

	$sTemplatePath = trailingslashit( get_stylesheet_directory() ) . $sEmailTemplateName;

	if ( ! file_exists( $sTemplatePath ) ) {
		return;
	}

	include( $sTemplatePath );
}

//
header("X-XSS-Protection: 0");
?>