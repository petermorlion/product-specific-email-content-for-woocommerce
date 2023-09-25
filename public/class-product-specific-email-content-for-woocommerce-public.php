<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/petermorlion/product-specific-email-content-for-woocommerce
 * @since      1.0.0
 *
 * @package    Product_Specific_Email_Content_For_Woocommerce
 * @subpackage Product_Specific_Email_Content_For_Woocommerce/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Product_Specific_Email_Content_For_Woocommerce
 * @subpackage Product_Specific_Email_Content_For_Woocommerce/public
 * @author     Peter Morlion <peter.morlion@gmail.com>
 */
class Product_Specific_Email_Content_For_Woocommerce_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Customize the order details in the email.
	 *
	 * @since    1.0.0
	 */
	public function email_order_details($order, $sent_to_admin, $plain_text, $email) {
		if ($sent_to_admin) {
			return;
		}

		try {
			$items = $order->get_items();
			foreach ($items as $item) {
				$data = $item->get_data();
				$product_id = $data["product_id"];
				$product = new WC_Product($product_id);
				$product_specific_email_content = $product->get_meta('product_specific_email_content', true, 'view');
				?><h2><?php echo esc_html($product->get_title()); ?></h2><?php

				do_action('product_specific_email_content_before_content', $item, $product);

				echo wp_kses_post(nl2br(stripslashes($product_specific_email_content)));

				do_action('product_specific_email_content_after_content', $item, $product);
			}
		} catch (Exception $e) {
			error_log($e);
			?>
			<p><?php _e('Something went wrong while adding more info to this email.', 'product-specific-email-content-for-woocommerce'); ?></p>
			<?php
		}
	}

	/**
	 * Declare HPOS compatibility
	 *
	 * @since    1.3.0
	 */
	public static function declare_hpos_compatibility() {
		if ( class_exists( \Automattic\WooCommerce\Utilities\FeaturesUtil::class ) ) {
			\Automattic\WooCommerce\Utilities\FeaturesUtil::declare_compatibility( 'custom_order_tables', PRODUCT_SPECIFIC_EMAIL_CONTENT_FOR_WOOCOMMERCE_MAIN_FILE, true );
		}
	}

}
