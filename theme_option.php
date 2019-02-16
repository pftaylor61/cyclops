<?php 
        if ( class_exists( 'WP_Customize_Control' ) && ! class_exists( 'theme_name_Customize_Misc_Control' ) ) :
            class theme_name_Customize_Misc_Control extends WP_Customize_Control {
            public function render_content() {
             global $post;
                switch ( $this->type ) {
                    default:
                    case 'description' :
                        echo '
                        <p class="description">' . $this->description . '</p>';
                    break;

                    case 'heading':
                        echo '<h3>' . esc_html( $this->label ) . '</h3>';
                    break;

                    case 'line' :
                        echo '<hr />';
                    break;
                }
            }
        }
        endif;


        // Create your custom panel in your theme using customize_register function
        function theme_name_logo_settings($wp_customize) {

            $wp_customize->add_section('theme_name_theme_panel', array(
            'title' => 'theme_name Theme Global Setting',
            'description' => '',
            'priority' => 120,
            ));

        }
        add_action('customize_register', 'theme_name_logo_settings');


     // Creating dropdown
     if( class_exists( 'WP_Customize_Control' ) ):
        class WP_Customize_Latest_Post_Control extends WP_Customize_Control {
            public $type = 'latest_post_dropdown';
            public $post_type = 'custom_post_type_name';

            public function render_content() {

            $latest = new WP_Query( array(
                'post_type'   => $this->post_type,
                'post_status' => 'publish',
                'orderby'     => 'date',
                'order'       => 'DESC'
            ));

            ?>
                <label>
                    <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
                        <?php
                        while( $latest->have_posts() ) {
                            $latest->the_post();
                            echo "<option " . selected( $this->value(), get_the_ID() ) . " value='" . get_the_ID() . "'>" . the_title( '', '', false ) . "</option>";
                        }
                        ?>
                    </select>
                </label>
            <?php
            }
        }
    endif;
    function theme_name_pages($wp_customize) {
    $wp_customize->add_setting('home_page_control');
     $wp_customize->add_control(
        new WP_Customize_Latest_Post_Control(
            $wp_customize,
            'home_page_control',
            array(
            'label' => __( 'Select A Home Page', 'theme_name' ),
            'section' => 'theme_name_theme_panel',
            'settings' => 'home_page_control',
            'post_type' => 'custom_post_type_name'
            )
        )
    );
    }
    add_action('customize_register', 'theme_name_pages');


    //Static custom post for landing
    add_filter( 'get_pages', function ( $pages, $args )
    {
        // First make sure this is an admin page, if not, bail
        if ( !is_admin() )
            return $pages;

        // Make sure that we are on the reading settings page, if not, bail
        global $pagenow;
        if ( 'options-reading.php' !== $pagenow )
            return $pages;

        // Remove the filter to avoid infinite loop
        remove_filter( current_filter(), __FUNCTION__ );

        // Setup our static counter
        static $counter = 0;

        // Bail on the third run all runs after this. The third run will be 2
        if ( 2 <= $counter )
            return $pages;

        // Update our counter
        $counter++;

        $args = [
            'post_type'      => 'custom_post_type_name',
            'posts_per_page' => -1
        ];
        // Get the post type posts with get_posts to allow non hierarchical post types
        $new_pages = get_posts( $args );

        // If we only need custom post types
        $pages = $new_pages;

        return $pages;
    }, 10, 2 );

?>