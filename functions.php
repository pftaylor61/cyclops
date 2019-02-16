<?php
/** 
 * Functions file.
 * 
 * To getting start design the theme, please begins by reading on this link. https://codex.wordpress.org/Theme_Development
 * You can make this theme as your parent theme (design new by modify this theme and make it yours).
 * But I recommend that you use this theme as parent and create your new child theme.
 * 
 * Learn more about template hierarchy, please read on this link. https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package cyclops
 */


// Required WordPress variable
if (!isset($content_width)) {
    $content_width = 1140;// this will be override again in inc/classes/BootstrapBasic4.php `detectContentWidth()` method.
}

if (!function_exists('cyclops_setup')) {
    function cyclops_setup() {
        // Enable support for Custom Headers (or in our case, a custom logo)
		add_theme_support( 'custom-header', array(
				// Header image default
				'default-image' => get_template_directory_uri() . '/assets/img/cyclops.png',
				// Header text display default
				'header-text' => false,
				// Header text color default
				'default-text-color' => '000',
				// Flexible width
				'flex-width' => true,
				// Header image width (in pixels)
				'width' => 90,
				// Flexible height
				'flex-height' => true,
				// Header image height (in pixels)
				'height' => 90,
                                // Alt text
                                'alttext' => 'Logo'
			) );
                // This next section is designed to get the Options Framework going.
                // All the files in this section, and the coding, comes from Devinsays
                // The code is sampled from his options_framework_theme
                // https://github.com/devinsays/options-framework-theme
                /*
                 * Loads the Options Panel
                 *
                 * If you're loading from a child theme use stylesheet_directory
                 * instead of template_directory
                 */
                if ( !function_exists( 'optionsframework_init' ) ) {
			define( 'OPTIONS_FRAMEWORK_DIRECTORY', trailingslashit( get_template_directory_uri() ) . 'inc/' );
			require_once trailingslashit( dirname( __FILE__ ) ) . 'inc/options-framework.php';

			// Loads options.php from child or parent theme
			$optionsfile = locate_template( 'options.php' );
			load_template( $optionsfile );
		}
    } // end function cyclops_setup
} // end if not function exists cyclops
add_action( 'after_setup_theme', 'cyclops_setup' );







// Configurations ----------------------------------------------------------------------------
// Left sidebar column size. Bootstrap have 12 columns this sidebar column size must not greater than 12.
if (!isset($ocws_cyclops_sidebar_left_size)) {
    $ocws_cyclops_sidebar_left_size = apply_filters('bootstrap_basic4_column_left', 3);
}
// Right sidebar column size.
if (!isset($ocws_cyclops_sidebar_right_size)) {
    $ocws_cyclops_sidebar_right_size = apply_filters('bootstrap_basic4_column_right', 3);;
}
// Once you specified left and right column size, while widget was activated in all or some sidebar the main column size will be calculate automatically from these size and widgets activated.
// For example: you use only left sidebar (widgets activated) and left sidebar size is 4, the main column size will be 12 - 4 = 8.
// 
// Title separator. Please note that this value maybe able overriden by other plugins.
if (!isset($ocws_cyclops_title_separator)) {
    $ocws_cyclops_title_separator = '|';
}


// Require, include files ---------------------------------------------------------------------
require get_template_directory() . '/inc/classes/Autoload.php';
require get_template_directory() . '/inc/functions/include-functions.php';

// Setup auto load for load the class files without manually include file by file.
$Autoload = new \BootstrapBasic4\Autoload();
$Autoload->register();
$Autoload->addNamespace('BootstrapBasic4', get_template_directory() . '/inc/classes');
unset($Autoload);

// Call to actions/filters of the theme to enable features, register sidebars, enqueue scripts and styles.
$BootstrapBasic4 = new \BootstrapBasic4\BootstrapBasic4();
$BootstrapBasic4->addActionsFilters();
unset($BootstrapBasic4);

// Call to actions/filters of theme hook to hook into WordPress and make changes to the theme.
$Bsb4Hooks = new \BootstrapBasic4\Hooks\Bsb4Hooks();
$Bsb4Hooks->addActionsFilters();
unset($Bsb4Hooks);

// Call to actions/filters of theme hook to hook into WordPress widgets.
$WidgetHooks = new \BootstrapBasic4\Hooks\WidgetHooks();
$WidgetHooks->addActionsFilters();
unset($WidgetHooks);

// Display theme help page for admin.
$ThemeHelp = new \BootstrapBasic4\Controller\ThemeHelp();
$ThemeHelp->addActionsFilters();
unset($ThemeHelp);

/**
 * Return an unordered list of linked social media icons, based on the urls provided in the Theme Options
 *
 * @since Cyclops 0.0.1
 *
 * @return string Unordered list of linked social media icons
 */
if ( ! function_exists( 'cyclops_get_social_media' ) ) {
	function cyclops_get_social_media() {
		$output = '';
		$icons = array(
			array( 'url' => of_get_option( 'social_twitter', '' ), 'icon' => 'fab fa-twitter', 'title' => esc_html__( 'Follow me on Twitter', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_facebook', '' ), 'icon' => 'fab fa-facebook', 'title' => esc_html__( 'Like us on Facebook', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_mewe', '' ), 'icon' => 'fas fa-quote-left', 'title' => esc_html__( 'Connect with me on MeWe', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_tripadvisor', '' ), 'icon' => 'fab fa-tripadvisor', 'title' => esc_html__( 'Review us on TripAdvisor', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_linkedin', '' ), 'icon' => 'fab fa-linkedin', 'title' => esc_html__( 'Connect with me on LinkedIn', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_slideshare', '' ), 'icon' => 'fab fa-slideshare', 'title' => esc_html__( 'Follow me on SlideShare', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_tumblr', '' ), 'icon' => 'fab fa-tumblr', 'title' => esc_html__( 'Follow me on Tumblr', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_github', '' ), 'icon' => 'fab fa-github', 'title' => esc_html__( 'Fork me on GitHub', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_bitbucket', '' ), 'icon' => 'fab fa-bitbucket', 'title' => esc_html__( 'Fork me on Bitbucket', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_youtube', '' ), 'icon' => 'fab fa-youtube', 'title' => esc_html__( 'Subscribe to me on YouTube', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_instagram', '' ), 'icon' => 'fab fa-instagram', 'title' => esc_html__( 'Follow me on Instagram', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_flickr', '' ), 'icon' => 'fab fa-flickr', 'title' => esc_html__( 'Connect with me on Flickr', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_pinterest', '' ), 'icon' => 'fab fa-pinterest', 'title' => esc_html__( 'Follow me on Pinterest', 'cyclops' ) ),
			array( 'url' => of_get_option( 'social_rss', '' ), 'icon' => 'fas fa-rss', 'title' => esc_html__( 'Subscribe to my RSS Feed', 'cyclops' ) )
		);

		foreach ( $icons as $key ) {
			$value = $key['url'];
			if ( !empty( $value ) ) {
				$output .= sprintf( '<li><a href="%1$s" title="%2$s"%3$s><span class="fa-stack fa-lg"><i class="fas fa-square fa-stack-2x"></i><i class="%4$s fa-stack-1x fa-inverse"></i></span></a></li>',
					esc_url( $value ),
					$key['title'],
					( !of_get_option( 'social_newtab', '0' ) ? '' : ' target="_blank"' ),
					$key['icon']
				);
			}
		}

		if ( !empty( $output ) ) {
			$output = '<ul>' . $output . '</ul>';
		}

		return $output;
	} // end function cyclops_get_social_media
} // end if ! protector for function cyclops_get_social_media

/* Section to save options */
/*
	Backup/Restore Theme Options
	@ https://digwp.com/2014/04/backup-restore-theme-options/
	Go to "Appearance > Backup Options" to export/import theme settings
	(based on "Gantry Export and Import Options" by Hassan Derakhshandeh)
	
	I (OCWS) have edited the code slightly, so that it works with Child Themes

	Usage:
	1. Add entire backup/restore snippet to functions.php
	
*/
class backup_restore_theme_options {

	function backup_restore_theme_options() {
		add_action('admin_menu', array(&$this, 'admin_menu'));
	}
	function admin_menu() {
		// add_submenu_page($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function);
		// $page = add_submenu_page('themes.php', 'Backup Options', 'Backup Options', 'manage_options', 'backup-options', array(&$this, 'options_page'));

		// add_theme_page($page_title, $menu_title, $capability, $menu_slug, $function);
		$page = add_theme_page('Backup Options', 'Backup Options', 'manage_options', 'backup-options', array(&$this, 'options_page'));

		add_action("load-{$page}", array(&$this, 'import_export'));
	}
	function import_export() {
                // $ocws_cyclops_option_name = get_option( 'stylesheet' );
                if (is_child_theme()) {
                    $ocws_cyclops_option_name = wp_get_theme()->get('Template');
                } else {
                    $ocws_cyclops_option_name = wp_get_theme()->get('TextDomain');
                }
		if (isset($_GET['action']) && ($_GET['action'] == 'download')) {
			header("Cache-Control: public, must-revalidate");
			header("Pragma: hack");
			header("Content-Type: text/plain");
			header('Content-Disposition: attachment; filename="'.$ocws_cyclops_option_name.'-options-'.date("dMy").'.dat"');
			echo serialize($this->_get_options());
			die();
		}
		if (isset($_POST['upload']) && check_admin_referer('shapeSpace_restoreOptions', 'shapeSpace_restoreOptions')) {
			if ($_FILES["file"]["error"] > 0) {
				// error
			} else {
				$options = unserialize(file_get_contents($_FILES["file"]["tmp_name"]));
				if ($options) {
					foreach ($options as $option) {
						update_option($option->option_name, unserialize($option->option_value));
					}
				}
			}
			wp_redirect(admin_url('themes.php?page=backup-options'));
			exit;
		}
	}
	function options_page() { ?>

		<div class="wrap">
			<?php screen_icon(); ?>
			<h2>Backup/Restore Theme Options</h2>
			<form action="" method="POST" enctype="multipart/form-data">
				<style>#backup-options td { display: block; margin-bottom: 20px; }</style>
				<table id="backup-options">
					<tr>
						<td>
							<h3>Backup/Export</h3>
                                                        <p>Here are the stored settings for the current theme:</p>
							<p><textarea class="widefat code" rows="20" cols="100" onclick="this.select()"><?php echo serialize($this->_get_options()); ?></textarea></p>
							<p><a href="?page=backup-options&action=download" class="button-secondary">Download as file</a></p>
						</td>
						<td>
							<h3>Restore/Import</h3>
							<p><label class="description" for="upload">Restore a previous backup</label></p>
							<p><input type="file" name="file" /> <input type="submit" name="upload" id="upload" class="button-primary" value="Upload file" /></p>
							<?php if (function_exists('wp_nonce_field')) wp_nonce_field('shapeSpace_restoreOptions', 'shapeSpace_restoreOptions'); ?>
						</td>
					</tr>
				</table>
			</form>
		</div>

	<?php }
	function _display_options() {
		$options = unserialize($this->_get_options());
	}
	function _get_options() {
		global $wpdb;
                
                if (is_child_theme()) {
                    $ocws_cyclops_option_name = wp_get_theme()->get('Template');
                } else {
                    $ocws_cyclops_option_name = wp_get_theme()->get('TextDomain');
                }
                
		return $wpdb->get_results("SELECT option_name, option_value FROM {$wpdb->options} WHERE option_name = '".$ocws_cyclops_option_name."'"); 
	}
}
new backup_restore_theme_options();
/* End of options saving section */