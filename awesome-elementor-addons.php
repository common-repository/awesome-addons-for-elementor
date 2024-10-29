<?php
/**
 * Plugin Name: Awesome Addons For Elementor
 * Plugin URI: https://awesomeaddons.com/elementor
 * Description: The most advanced collection of Elementor page builder widgets.
 * Version: 1.0.3
 * Author: Awesome Addons
 * Author URI: https://awesomeaddons.com/
 * License: GPLv2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: aw_elementor
 * Domain Path: /languages/
 *
 * @package Advanced_Addons
 */

    if( !function_exists('add_action') ) {
        die('Elementor not Installed'); // if Elementor not installed kill the page.
    }

    // Define absoulote path
    if( !defined( 'ABSPATH' ) ) exit; // No access of directly access

    define( 'AWESOME_ADDONS_VERSION', '1.0.3' );
    // Define file
    define('AWESOME_ADDONS_FILE', __FILE__);
    // Define url
    define('AWESOME_ADDONS_URL', plugins_url('/', __FILE__ ) );
    // Define path
    define('AWESOME_ADDONS_PATH', plugin_dir_path( __FILE__ ) );
    // Assets
    define( 'AWESOME_ADDONS_DIR_ASSETS', trailingslashit( AWESOME_ADDONS_URL . 'assets' ) );
     // Admin
     define( 'AWESOME_ADDONS_ADMIN', trailingslashit( AWESOME_ADDONS_URL . 'admin' ) );
    
    require AWESOME_ADDONS_PATH . 'base/base.php';

    // Class Register
    if (class_exists('Awesome_Addons_For_Elementor')) {
        # code...
        $awesome_addons_elementor = new Awesome_Addons_For_Elementor();
        $awesome_addons_elementor->awesome_addons_elementor_register();
        $awesome_addons_elementor->awesome_addons_elementor_widget_bundle();

    }
    
    // Activation
    register_activation_hook( __FILE__, array($awesome_addons_elementor, 'activate' ));

    // Deactivation
    register_deactivation_hook( __FILE__, array($awesome_addons_elementor, 'deactivate' ));
