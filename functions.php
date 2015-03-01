<?php

	//Register the menu
	function vutranvn_register_my_menus() {
		register_nav_menus(
            array(	'header-menu' => __( 'Header Menu', 'vutranvn' )
            )
        );
	}
	add_action( 'init', 'vutranvn_register_my_menus' );

	// Register scripts
	function vutranvn_scripts() {
		wp_enqueue_script(
			'vutranvn-bootstrap',
			get_stylesheet_directory_uri() . '/js/bootstrap.min.js',
			array( 'jquery' )
		);

		wp_enqueue_style(
			'vutranvn-style',
			get_stylesheet_directory_uri() . '/style.css',
			array( 'vutranvn-bootstrap', 'vutranvn-bootstrap-theme' )
		);

		wp_enqueue_script( 'comment-reply' );

		wp_enqueue_style(
			'vutranvn-bootstrap',
			get_stylesheet_directory_uri() . '/css/bootstrap.min.css'
		);

		wp_enqueue_style(
			'vutranvn-bootstrap-theme',
			get_stylesheet_directory_uri() . '/css/bootstrap-theme.min.css'
		);

		wp_enqueue_style(
			'vutranvn-font-awesome',
			get_stylesheet_directory_uri() . '/css/font-awesome.min.css'
		);
	}
	add_action( 'wp_enqueue_scripts', 'vutranvn_scripts' );


	// Add home to the link list and to the main menu
	function vutranvn_page_menu_args( $vutranvn_args ) {
	if ( ! isset( $vutranvn_args['show_home'] ) )
		$vutranvn_args['show_home'] = true;
	return $vutranvn_args;
	}
	add_filter( 'wp_page_menu_args', 'vutranvn_page_menu_args' );

	/** Support Post Formats */
	add_theme_support('post-formats',
		array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat') );

	//Add RSS links to <head> section
	add_theme_support( 'automatic-feed-links' );

    // Support different languages
    load_theme_textdomain('vutranvn', get_template_directory() . '/languages' );

	/*
	 * Switches default core markup for search form, comment form,
	 * and comments to output valid HTML5.
	 */
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

    /* Include featured Images in theme */
    add_theme_support( 'post-thumbnails' );


	/* Set content Width */
	if ( ! isset( $content_width ) ) $content_width = 500;

	/* Custom Continue Reading Link */
	function vutranvn_new_excerpt_more( $vutranvn_more ) {
		return ' <a class="more-link excerpt-link" href="'. get_permalink( get_the_ID() ) . '">' . __('Continue Reading', 'vutranvn') . '<span class="glyphicon glyphicon-chevron-right"></span></a>';
	}
	add_filter( 'excerpt_more', 'vutranvn_new_excerpt_more' );


	/* Add the class img-circle to the avatar */
	function vutranvn_change_avatar_css($vutranvn_class) {
		$vutranvn_class = str_replace("class='avatar", "class='author_gravatar img-circle", $vutranvn_class) ;
		return $vutranvn_class;
	}
	add_filter('get_avatar','vutranvn_change_avatar_css');


	// Register the sidebar

	function vutranvn_register_sidebar() {
		// Register primary sidebar
		register_sidebar(
			array(
				'id' => 'primary',
				'name' => __('Primary Sidebar', 'vutranvn'),
				'description' => __( 'This is the righthanded sidebar', 'vutranvn', 'vutranvn'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			)
		);

		// Register left footer widget
		register_sidebar(
			array(
				'id' => 'leftfooter',
				'name' => __('Left Footer', 'vutranvn'),
				'description' => __( 'This is the widget area for the left part of the footer', 'vutranvn'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			)
		);

		// Register middle footer widget
		register_sidebar(
			array(
				'id' => 'middlefooter',
				'name' => __('Middle Footer', 'vutranvn'),
				'description' => __( 'This is the widget area for the center part of the footer', 'vutranvn'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			)
		);

		// Register left footer widget
		register_sidebar(
			array(
				'id' => 'rightfooter',
				'name' => __('Right Footer', 'vutranvn'),
				'description' => __( 'This is the widget area for the right part of the footer', 'vutranvn'),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget' => '</div>',
				'before_title' => '<h4 class="widget-title">',
				'after_title' => '</h4>'
			)
		);

	}

	add_action( 'widgets_init', 'vutranvn_register_sidebar');

	/** My own comment design */
 	function vutranvn_magazin_comment($comment, $args, $depth) {
   	$GLOBALS['comment'] = $comment; ?>
   	<div <?php comment_class('row new-comment'); ?> >
	   	<div id="li-comment-<?php comment_ID() ?>">
	   		<?php $posttype = get_comment_type(); if ($posttype == 'comment') { ?>
		    <div class="meta col-sm-3 info">
		    <?php } else { ?>
   		    <div class="meta col-sm-4 info">
   		    <?php } ?>
				<div id="comment-<?php comment_ID(); ?>">
		    		<div class="comment-author vcard">
		    			<?php $posttype = get_comment_type(); if ($posttype == 'comment') { ?>
			        	<div class="meta-item hidden-xs"><?php echo get_avatar($comment,$size='48'); ?></div>
			        	<div class="meta-item"><span data-icon="&#xe08a;" class="info-icon"></span><?php echo get_comment_author_link() ?></div>
			        	<?php } else { ?>
			        	<div class="meta-item"><span data-icon="&#xe0e3;" class="info-icon"></span><?php echo get_comment_author_link() ?></div>
			        	<?php } ?>
			        	<div class="hidden-xs">
				        	<div class="meta-item"><span data-icon="&#xe023;" class="info-icon"></span><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf('%1$s', get_comment_date()) ?></a></div>
				        	<div class="meta-item"><span data-icon="&#x7d;" class="info-icon"></span><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf('%1$s', get_comment_time()) ?></a></div>
	                    </div>
	                    <?php if( is_admin() ) { ?><div class="meta-item"><div data-icon="&#x6c;" class="info-icon"></div><?php edit_comment_link(__('(Edit)' , 'vutranvn'),'  ','') ?></div><?php } ?>
						<div class="meta-item"><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'add_below' => 'comment-content', 'reply_text' => '<span data-icon="&#x4a" class="info-icon"></span> ' . __('Reply', 'vutranvn')))) ?></div>

	                    <?php cancel_comment_reply_link(); ?>
		    		</div>


			   	</div>
			</div>

			<?php $posttype = get_comment_type(); if ($posttype == 'comment') { ?>
		    <div class="comment-content col-sm-9">
		    <?php } else { ?>
		    <div class="comment-content col-sm-8">
   		    <?php } ?>
		    	<?php if ($comment->comment_approved == '0') : ?>
					<div class="alert alert-warning" style="margin-top: -12px"><em style="font-size: 13px"><?php _e('Your comment is awaiting moderation.', 'vutranvn') ?></em></div>
				<?php endif; ?>
		    	<div id="comment-content-<?php comment_ID() ?>">
					<?php comment_text() ?>
				</div>
		    </div>
		</div>
	</div>
	<?php }


/* Sets own title to page */
function vutranvn_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'vutranvn' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'vutranvn_wp_title', 10, 2 );

function remove_version_wp() {

	return '';
}

remove_action('wp_head', 'wp_generator');

function remove_wp_version_strings( $src ) {
	global $wp_version;
		parse_str(parse_url($src, PHP_URL_QUERY), $query);
	if ( !empty($query['ver']) && $query['ver'] === $wp_version ) {
		$src = remove_query_arg('ver', $src);
	}
	return $src;
}
add_filter( 'script_loader_src', 'remove_wp_version_strings' );
add_filter( 'style_loader_src', 'remove_wp_version_strings' );

