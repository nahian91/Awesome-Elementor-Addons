<?php
/*
Plugin Name: Awesome Widgets
Plugin URI: https://anahian.com
Description: Awesome Widgets is a powerful tool with 15+ free add-ons that makes it easy for anyone to create stunning and professional-looking websites, regardless of skill level.
Version:     1.0.12
Author:      Abdullah Nahian
Author URI:  https://anahian.com/about-us
License:     GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Domain Path: /languages
Text Domain: awesome-widgets
*/

if (!defined('ABSPATH')) exit;
define('AWEA_VERSION', '1.0.0');
define('AWEA_FILE', __FILE__);
define('AWEA_PLUGIN_BASENAME', plugin_basename(AWEA_FILE));
define('AWEA_PATH', plugin_dir_path(AWEA_FILE));
define('AWEA_URL', plugins_url('/', AWEA_FILE));

if (!defined('ABSPATH'))
    exit;

/**
 * Main Class File of plugin
 * @since Awesome Widgets
 */
if (!class_exists('AWEA')) {
    class AWEA{
        public $this_uri;
        public $this_dir;

        /**
         * Get Instance
         * 
         * @since Awesome Widgets
         */
        private static $_instance = null;
        public static function instance(){
            if( is_null( self::$_instance ) ){
                self::$_instance = new self();
            }
            return self::$_instance;
        }
        
        /*
         * Constructor
         */
        public function __construct() {

            // This uri & dir
            $this->this_uri = AWEA_URL;
            $this->this_dir = AWEA_PATH;
            
            if (!did_action('elementor/loaded')) {
                add_action( 'admin_notices', array($this, 'admin_notice_error_ele') );
            }else{
                //elementor hooks 
                add_action( 'elementor/frontend/after_enqueue_scripts', array($this, 'awea_scripts') );
                add_action( 'elementor/elements/categories_registered', array($this, 'elementor_category') );
                add_action( 'elementor/widgets/register', array($this, 'register_widgets') );
            }
        }

        /**
         * To Check Plugin is installed or not
         * @since Awesome Widgets
         */
        function _is_plugin_installed($plugin_path ) {
            $installed_plugins = get_plugins();
            return isset( $installed_plugins[ $plugin_path ] );
        }

        /**
         * 
         * Admin Error Notice
         * @since Awesome Widgets
         */
        function admin_notice_error_ele() {

            if (!current_user_can('activate_plugins')) {
                return;
            }
    
            $elementor = 'elementor/elementor.php';
            if ( $this->_is_plugin_installed( $elementor ) ) {
                $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor);
                
                $message = sprintf( __('%1$sAwesome Widgets%2$s requires %1$sElementor%2$s plugin to be active. Please activate Elementor to continue.', 'awesome-widgets'), "<strong>", "</strong>");
    
                $button_text = __('Activate Elementor', 'awesome-widgets');
            } else {
                $activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
    
                $message = sprintf(__('%1$sAwesome Elementor Widgets%2$s requires %1$sElementor%2$s plugin to be installed and activated. Please install Elementor to continue.', 'awesome-widgets'), '<strong>', '</strong>');
                $button_text = __('Install Elementor', 'awesome-widgets');
            }
    
            $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    
            printf('<div class="error"><p>%1$s</p>%2$s</div>', $message, $button);

        }

        /**
         * Load and register the required Elementor widgets file
         *
         * @param $widgets_manager
         *
         * @since Awesome Widgets
         */
        function register_widgets( $widgets_manager ) {
            
            // Load Elementor Featured Service
            require_once $this->this_dir . 'widgets/awesome-cta.php';
            require_once $this->this_dir . 'widgets/awesome-heading.php';
            require_once $this->this_dir . 'widgets/awesome-image-box.php';
            require_once $this->this_dir . 'widgets/awesome-list-group.php';
            require_once $this->this_dir . 'widgets/awesome-number-box.php';
            require_once $this->this_dir . 'widgets/awesome-price.php';
            require_once $this->this_dir . 'widgets/awesome-process.php';
            
            // // Register Featured Service Widge
            $widgets_manager->register( new \ELementor\Awesome_Heading() );
            $widgets_manager->register( new \ELementor\Awesome_Image_Box() );
            $widgets_manager->register( new \ELementor\Awesome_List_Group() );
            $widgets_manager->register( new \ELementor\Awesome_Number_Box() );
            $widgets_manager->register( new \ELementor\Awesome_Price() );
            $widgets_manager->register( new \ELementor\Awesome_Process() );
            $widgets_manager->register( new \ELementor\Awesome_CTA() );
            
        }

        /**
         * Loads scripts on elementor editor
         * @since Awesome Widgets
         */
        function awea_scripts() {
            // preview script
            wp_enqueue_style('awesome-widgets-bootstrap', $this->this_uri . 'assets/css/bootstrap.minmin.css');
            wp_enqueue_style('awesome-widgets-fontawesome', $this->this_uri . 'assets/css/fontawesome.min.css');
            wp_enqueue_style('awesome-widgets-main', $this->this_uri . 'assets/css/main.css');
            wp_enqueue_style('awesome-widgets-responsive', $this->this_uri . 'assets/css/responsive.css' );
            wp_enqueue_style('awesome-widgets-elementor-responsive', $this->this_uri . 'assets/css/responsive.css' );
        }

        /**
         * Elementor Category
         * @since Awesome Widgets
         */
        function elementor_category() {

            // Register widget block category for Elementor section
            \Elementor\Plugin::instance()->elements_manager->add_category( 'awesome-widgets-elementor', array(
                'title' => esc_html__( 'Awesome Widgets', 'awesome-widgets' ),
            ), 1 );
        }

    }
}

add_action('after_setup_theme', function(){
    AWEA::instance();
});