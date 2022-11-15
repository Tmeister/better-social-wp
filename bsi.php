<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://enriquechavez.co
 * @since             1.0.0
 * @package           Bsi
 *
 * @wordpress-plugin
 * Plugin Name:       Better Social Images
 * Plugin URI:        https://enriquechavez.co
 * Description:       Just a proof-of-concept plugin to create better social images automatically.
 * Version:           1.0.0
 * Author:            Enrique Chavez
 * Author URI:        https://enriquechavez.co
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       bsi
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'BSI_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-bsi-activator.php
 */
function activate_bsi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bsi-activator.php';
	Bsi_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-bsi-deactivator.php
 */
function deactivate_bsi() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-bsi-deactivator.php';
	Bsi_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_bsi' );
register_deactivation_hook( __FILE__, 'deactivate_bsi' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-bsi.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_bsi() {

	$plugin = new Bsi();
	$plugin->run();

}
run_bsi();
