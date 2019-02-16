<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 */
function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'options-framework-theme';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'cyclops'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Test data
	$test_array = array(
		'one' => __( 'One', 'cyclops' ),
		'two' => __( 'Two', 'cyclops' ),
		'three' => __( 'Three', 'cyclops' ),
		'four' => __( 'Four', 'cyclops' ),
		'five' => __( 'Five', 'cyclops' )
	);

	// Multicheck Array
	$multicheck_array = array(
		'one' => __( 'French Toast', 'cyclops' ),
		'two' => __( 'Pancake', 'cyclops' ),
		'three' => __( 'Omelette', 'cyclops' ),
		'four' => __( 'Crepe', 'cyclops' ),
		'five' => __( 'Waffle', 'cyclops' )
	);

	// Multicheck Defaults
	$multicheck_defaults = array(
		'one' => '1',
		'five' => '1'
	);

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Typography Defaults
	$typography_defaults = array(
		'size' => '15px',
		'face' => 'georgia',
		'style' => 'bold',
		'color' => '#bada55' );

	// Typography Options
	$typography_options = array(
		'sizes' => array( '6','12','14','16','20' ),
		'faces' => array( 'Helvetica Neue' => 'Helvetica Neue','Arial' => 'Arial' ),
		'styles' => array( 'normal' => 'Normal','bold' => 'Bold' ),
		'color' => false
	);

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}

	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}


	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages( 'sort_column=post_parent,menu_order' );
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}

	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/images/';

	$options = array();

	$options[] = array(
		'name' => __( 'Social Media Settings', 'cyclops' ),
		'type' => 'heading'
	);
        
        $options[] = array(
		'name' => esc_html__( 'Background', 'cyclops' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default background image, use the <a href="%1$s" title="Custom background">Appearance &gt; Background</a> menu option.', 'cyclops' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-background' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Logo', 'cyclops' ),
		'desc' => sprintf( wp_kses( __( 'If you&rsquo;d like to replace or remove the default logo, use the <a href="%1$s" title="Custom header">Appearance &gt; Header</a> menu option.', 'cyclops' ), array( 
			'a' => array( 
				'href' => array(),
				'title' => array() )
			) ), admin_url( 'themes.php?page=custom-header' ) ),
		'type' => 'info' );

	$options[] = array(
		'name' => esc_html__( 'Social Media Settings', 'cyclops' ),
		'desc' => esc_html__( 'Enter the URLs for your Social Media platforms. You can also optionally specify whether you want these links opened in a new browser tab/window.', 'cyclops' ),
		'type' => 'info' );
        
        $options[] = array(
		'name' => esc_html__('Open links in new Window/Tab', 'cyclops'),
		'desc' => esc_html__('Open the social media links in a new browser tab/window', 'cyclops'),
		'id' => 'social_newtab',
		'std' => '0',
		'type' => 'checkbox'
        );

	$options[] = array(
		'name' => esc_html__( 'Twitter', 'cyclops' ),
		'desc' => esc_html__( 'Enter your Twitter URL.', 'cyclops' ),
		'id' => 'social_twitter',
		'std' => '',
                'fawe' => 'fa-twitter',
		'type' => 'text' 
        );

	$options[] = array(
		'name' => esc_html__( 'Facebook', 'cyclops' ),
		'desc' => esc_html__( 'Enter your Facebook URL.', 'cyclops' ),
		'id' => 'social_facebook',
		'std' => '',
                'fawe' => 'fa-facebook',
		'type' => 'text' );
		
	$options[] = array(
		'name' => esc_html__( 'MeWe', 'cyclops' ),
		'desc' => esc_html__( 'Enter your MeWe URL.', 'cyclops' ),
		'id' => 'social_mewe',
		'std' => '',
                'fawe' => 'fa-mewe',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'TripAdvisor', 'cyclops' ),
		'desc' => esc_html__( 'Enter your TripAdvisor URL.', 'cyclops' ),
		'id' => 'social_tripadvisor',
		'std' => '',
                'fawe' => 'fa-tripadvisor',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'LinkedIn', 'cyclops' ),
		'desc' => esc_html__( 'Enter your LinkedIn URL.', 'cyclops' ),
		'id' => 'social_linkedin',
		'std' => '',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'SlideShare', 'cyclops' ),
		'desc' => esc_html__( 'Enter your SlideShare URL.', 'cyclops' ),
		'id' => 'social_slideshare',
		'std' => '',
		'type' => 'text' );

	
	$options[] = array(
		'name' => esc_html__( 'Tumblr', 'cyclops' ),
		'desc' => esc_html__( 'Enter your Tumblr URL.', 'cyclops' ),
		'id' => 'social_tumblr',
		'std' => '',
                'fawe' => 'fa-tumblr',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'GitHub', 'cyclops' ),
		'desc' => esc_html__( 'Enter your GitHub URL.', 'cyclops' ),
		'id' => 'social_github',
		'std' => '',
                'fawe' => 'fa-github',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Bitbucket', 'cyclops' ),
		'desc' => esc_html__( 'Enter your Bitbucket URL.', 'cyclops' ),
		'id' => 'social_bitbucket',
		'std' => '',
                'fawe' => 'fa-bitbucket',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'YouTube', 'cyclops' ),
		'desc' => esc_html__( 'Enter your YouTube URL.', 'cyclops' ),
		'id' => 'social_youtube',
		'std' => '',
                'fawe' => 'fa-youtube',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Instagram', 'cyclops' ),
		'desc' => esc_html__( 'Enter your Instagram URL.', 'cyclops' ),
		'id' => 'social_instagram',
		'std' => '',
                'fawe' => 'fa-instagram',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Flickr', 'cyclops' ),
		'desc' => esc_html__( 'Enter your Flickr URL.', 'cyclops' ),
		'id' => 'social_flickr',
		'std' => '',
                'fawe' => 'fa-flickr',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'Pinterest', 'cyclops' ),
		'desc' => esc_html__( 'Enter your Pinterest URL.', 'cyclops' ),
		'id' => 'social_pinterest',
		'std' => '',
                'fawe' => 'fa-pinterest',
		'type' => 'text' );

	$options[] = array(
		'name' => esc_html__( 'RSS', 'cyclops' ),
		'desc' => esc_html__( 'Enter your RSS Feed URL.', 'cyclops' ),
		'id' => 'social_rss',
		'std' => '',
                'fawe' => 'fa-rss',
		'type' => 'text' );

	// Advanced settings, if needed
        /*
        $options[] = array(
		'name' => __( 'Advanced Settings', 'cyclops' ),
		'type' => 'heading'
	);

	$options[] = array(
		'name' => __( 'Check to Show a Hidden Text Input', 'cyclops' ),
		'desc' => __( 'Click here and see what happens.', 'cyclops' ),
		'id' => 'example_showhidden',
		'type' => 'checkbox'
	);

	$options[] = array(
		'name' => __( 'Hidden Text Input', 'cyclops' ),
		'desc' => __( 'This option is hidden unless activated by a checkbox click.', 'cyclops' ),
		'id' => 'example_text_hidden',
		'std' => 'Hello',
		'class' => 'hidden',
		'type' => 'text'
	);

	$options[] = array(
		'name' => __( 'Uploader Test', 'cyclops' ),
		'desc' => __( 'This creates a full size uploader that previews the image.', 'cyclops' ),
		'id' => 'example_uploader',
		'type' => 'upload'
	);

	$options[] = array(
		'name' => "Example Image Selector",
		'desc' => "Images for layout.",
		'id' => "example_images",
		'std' => "2c-l-fixed",
		'type' => "images",
		'options' => array(
			'1col-fixed' => $imagepath . '1col.png',
			'2c-l-fixed' => $imagepath . '2cl.png',
			'2c-r-fixed' => $imagepath . '2cr.png'
		)
	);

	$options[] = array(
		'name' =>  __( 'Example Background', 'cyclops' ),
		'desc' => __( 'Change the background CSS.', 'cyclops' ),
		'id' => 'example_background',
		'std' => $background_defaults,
		'type' => 'background'
	);

	$options[] = array(
		'name' => __( 'Multicheck', 'cyclops' ),
		'desc' => __( 'Multicheck description.', 'cyclops' ),
		'id' => 'example_multicheck',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array
	);

	$options[] = array(
		'name' => __( 'Colorpicker', 'cyclops' ),
		'desc' => __( 'No color selected by default.', 'cyclops' ),
		'id' => 'example_colorpicker',
		'std' => '',
		'type' => 'color'
	);

	$options[] = array( 'name' => __( 'Typography', 'cyclops' ),
		'desc' => __( 'Example typography.', 'cyclops' ),
		'id' => "example_typography",
		'std' => $typography_defaults,
		'type' => 'typography'
	);

	$options[] = array(
		'name' => __( 'Custom Typography', 'cyclops' ),
		'desc' => __( 'Custom typography options.', 'cyclops' ),
		'id' => "custom_typography",
		'std' => $typography_defaults,
		'type' => 'typography',
		'options' => $typography_options
	);
         * End of Advanced Settings area. Uncomment to use
         */

	

	return $options;
}

add_action( 'optionsframework_after','cyclops_options_display_sidebar' );

/**
 * cyclops admin sidebar
 */
function cyclops_options_display_sidebar() { 
        // replaceable variables
        $ocws_theme_screenshot_thumb = "screenshot400.png";
        $mycurtheme = wp_get_theme();
        $ocws_theme_op_text = $mycurtheme->get('Description');
        
        $ocws_theme_op_header = "About ".$mycurtheme->get('Name');
        
	 ?>
        <div id="optionsframework-sidebar">
		<div class="metabox-holder">
	    	<div class="ocws_postbox">
	    		<h3><?php esc_attr_e( $ocws_theme_op_header, 'cyclops' ); ?></h3>
                        <img src="<?php echo get_stylesheet_directory_uri().'/assets/'.$ocws_theme_screenshot_thumb; ?>" style="margin-right:auto; margin-left:auto; width:300px;" />
      			<div class="ocws_inside_box"> 
                            <?php echo $ocws_theme_op_text; ?>
	      			
      			</div><!-- ocws_inside_box -->
	    	</div><!-- .ocws_postbox -->
	  	</div><!-- .metabox-holder -->
	</div><!-- #optionsframework-sidebar -->
        
        
<?php
}
?>