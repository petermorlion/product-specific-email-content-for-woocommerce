<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/petermorlion/product-specific-email-content-for-woocommerce
 * @since             1.0.0
 * @package           Product_Specific_Email_Content_For_Woocommerce
 *
 * @wordpress-plugin
 * Plugin Name:       Product Specific Email Content for WooCommerce
 * Plugin URI:        https://github.com/petermorlion/product-specific-email-content-for-woocommerce
 * Description:       This plugin allows you to add content to the order emails per product. This is useful if a purchased product requires some more explanation.
 * Version:           1.2.1
 * Author:            Peter Morlion
 * Author URI:        https://redstar.be
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       product-specific-email-content-for-woocommerce
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
define( 'PRODUCT_SPECIFIC_EMAIL_CONTENT_FOR_WOOCOMMERCE_VERSION', '1.2.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-product-specific-email-content-for-woocommerce-activator.php
 */
function activate_product_specific_email_content_for_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-product-specific-email-content-for-woocommerce-activator.php';
	Product_Specific_Email_Content_For_Woocommerce_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-product-specific-email-content-for-woocommerce-deactivator.php
 */
function deactivate_product_specific_email_content_for_woocommerce() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-product-specific-email-content-for-woocommerce-deactivator.php';
	Product_Specific_Email_Content_For_Woocommerce_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_product_specific_email_content_for_woocommerce' );
register_deactivation_hook( __FILE__, 'deactivate_product_specific_email_content_for_woocommerce' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-product-specific-email-content-for-woocommerce.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_product_specific_email_content_for_woocommerce() {

	$plugin = new Product_Specific_Email_Content_For_Woocommerce();
	$plugin->run();

}
run_product_specific_email_content_for_woocommerce();
