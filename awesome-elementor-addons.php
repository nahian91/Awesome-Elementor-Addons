<?php
/*
Plugin Name: Awesome Elementor Widgets
Plugin URI: https://anahian.com
Description: Web Bricks is a powerful tool with 15+ free add-ons that makes it easy for anyone to create stunning and professional-looking websites, regardless of skill level.
Version:     1.0.11
Author:      Web Bricks
Author URI:  https://anahian.com/about-us
License:     GPLv3 or later
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Domain Path: /languages
Text Domain: aee
*/

if (!defined('ABSPATH')) exit;
define('AEE_VERSION', '1.0.0');
define('AEE_FILE', __FILE__);
define('AEE_PLUGIN_BASENAME', plugin_basename(AEE_FILE));
define('AEE_PATH', plugin_dir_path(AEE_FILE));
define('AEE_URL', plugins_url('/', AEE_FILE));

if (!defined('ABSPATH'))
    exit;

/**
 * Main Class File of plugin
 * @since Awesome Elementor Widgets
 */
if (!class_exists('AEE')) {
    class AEE{
        public $this_uri;
        public $this_dir;

        /**
         * Get Instance
         * 
         * @since Awesome Elementor Widgets
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
            $this->this_uri = AEE_URL;
            $this->this_dir = AEE_PATH;
            
            if (!did_action('elementor/loaded')) {
                add_action( 'admin_notices', array($this, 'admin_notice__error_ele') );
            }else{
                //elementor hooks 
                add_action( 'elementor/frontend/after_enqueue_scripts', array($this, '_scripts') );
                add_action( 'elementor/elements/categories_registered', array($this, 'elementor_category') );
                add_action( 'elementor/widgets/register', array($this, 'register_widgets') );
            }
        }

        /**
         * To Check Plugin is installed or not
         * @since Awesome Elementor Widgets
         */
        function _is_plugin_installed($plugin_path ) {
            $installed_plugins = get_plugins();
            return isset( $installed_plugins[ $plugin_path ] );
        }

        /**
         * 
         * Admin Error Notice
         * @since Awesome Elementor Widgets
         */
        function admin_notice__error_ele() {

            if (!current_user_can('activate_plugins')) {
                return;
            }
    
            $elementor = 'elementor/elementor.php';
            if ( $this->_is_plugin_installed( $elementor ) ) {
                $activation_url = wp_nonce_url('plugins.php?action=activate&amp;plugin=' . $elementor . '&amp;plugin_status=all&amp;paged=1&amp;s', 'activate-plugin_' . $elementor);
                
                $message = sprintf( __('%1$sAwesome Elementor Widgets%2$s requires %1$sElementor%2$s plugin to be active. Please activate Elementor to continue.', 'aee'), "<strong>", "</strong>");
    
                $button_text = __('Activate Elementor', 'aee');
            } else {
                $activation_url = wp_nonce_url(self_admin_url('update.php?action=install-plugin&plugin=elementor'), 'install-plugin_elementor');
    
                $message = sprintf(__('%1$sAwesome Elementor Widgets%2$s requires %1$sElementor%2$s plugin to be installed and activated. Please install Elementor to continue.', 'aee'), '<strong>', '</strong>');
                $button_text = __('Install Elementor', 'aee');
            }
    
            $button = '<p><a href="' . $activation_url . '" class="button-primary">' . $button_text . '</a></p>';
    
            printf('<div class="error"><p>%1$s</p>%2$s</div>', __($message), $button);

        }

        /**
         * Load and register the required Elementor widgets file
         *
         * @param $widgets_manager
         *
         * @since Awesome Elementor Widgets
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
         * @since Awesome Elementor Widgets
         */
        function _scripts() {
            // preview script
            wp_enqueue_style('aee-bootstrap', $this->this_uri . 'assets/css/bootstrap.minmin.css');
            wp_enqueue_style('aee-fontawesome', $this->this_uri . 'assets/css/fontawesome.min.css');
            wp_enqueue_style('aee-main', $this->this_uri . 'assets/css/main.css');
            wp_enqueue_style('aee-responsive', $this->this_uri . 'assets/css/responsive.css' );
            wp_enqueue_style('aee-elementor-responsive', $this->this_uri . 'assets/css/responsive.css' );
        }

        /**
         * Elementor Category
         * @since Awesome Elementor Widgets
         */
        function elementor_category() {

            // Register widget block category for Elementor section
            \Elementor\Plugin::instance()->elements_manager->add_category( 'aee-elementor', array(
                'title' => esc_html__( 'Awesome Elementor Addons', 'aee' ),
            ), 1 );
        }

    }
}

add_action('after_setup_theme', function(){
    AEE::instance();
});