<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://redstar.be
 * @since      1.0.0
 *
 * @package    Product_Specific_Email_Paragraphs_For_Woocommerce
 * @subpackage Product_Specific_Email_Paragraphs_For_Woocommerce/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Product_Specific_Email_Paragraphs_For_Woocommerce
 * @subpackage Product_Specific_Email_Paragraphs_For_Woocommerce/includes
 * @author     Peter Morlion <peter.morlion@gmail.com>
 */
class Product_Specific_Email_Paragraphs_For_Woocommerce_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'product-specific-email-paragraphs-for-woocommerce',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
