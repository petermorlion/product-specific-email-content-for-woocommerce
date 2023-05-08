<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/petermorlion/product-specific-email-content-for-woocommerce
 * @since      1.0.0
 *
 * @package    Product_Specific_Email_Content_For_Woocommerce
 * @subpackage Product_Specific_Email_Content_For_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Product_Specific_Email_Content_For_Woocommerce
 * @subpackage Product_Specific_Email_Content_For_Woocommerce/admin
 * @author     Peter Morlion <peter.morlion@gmail.com>
 */
class Product_Specific_Email_Content_For_Woocommerce_Admin {

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
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Product_Specific_Email_Content_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Product_Specific_Email_Content_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/product-specific-email-content-for-woocommerce-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Product_Specific_Email_Content_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Product_Specific_Email_Content_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/product-specific-email-content-for-woocommerce-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add product data tab.
	 *
	 * @since    1.0.0
	 */
	public function add_product_data_tabs($tabs) {
		$tabs['product_specific_email_content'] = [
			'label' => __('Email', 'product-specific-email-content-for-woocommerce'),
			'target' => 'product_specific_email_content_panel',
			'priority' => 999
		];

		return $tabs;
	}

	/**
	 * Add product data panel.
	 *
	 * @since    1.0.0
	 */
	public function add_product_data_panels() {
		?>
		<div id="product_specific_email_content_panel" class="panel woocommerce_options_panel hidden">
			<div class="product_specific_email_content_editor">
				<!-- <p><?php _e('help_text', 'product-specific-email-content-for-woocommerce'); ?></p> -->
				<?php

				global $post;
				$product_specific_email_content = get_post_meta($post->ID, 'product_specific_email_content', true);
				if (!$product_specific_email_content) {
					$product_specific_email_content = '';
				}

				wp_editor( stripslashes($product_specific_email_content), 'product_specific_email_content', array(
					'textarea_name' => 'product_specific_email_content'
				) );

				?>
			</div>
		</div>
		<?php
	}

	/**
	 * Process the product meta.
	 *
	 * @since    1.0.0
	 */
	public function process_product_meta($post_id) {
		$product = wc_get_product($post_id);
		$product_specific_email_content = isset($_POST['product_specific_email_content']) ? $_POST['product_specific_email_content'] : '';
		$product->update_meta_data('product_specific_email_content', $product_specific_email_content);
		$product->save();
	}
}
