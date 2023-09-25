<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://redstar.be
 * @since      1.0.0
 *
 * @package    Product_Specific_Email_Paragraphs_For_Woocommerce
 * @subpackage Product_Specific_Email_Paragraphs_For_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Product_Specific_Email_Paragraphs_For_Woocommerce
 * @subpackage Product_Specific_Email_Paragraphs_For_Woocommerce/admin
 * @author     Peter Morlion <peter.morlion@gmail.com>
 */
class Product_Specific_Email_Paragraphs_For_Woocommerce_Admin {

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
		 * defined in Product_Specific_Email_Paragraphs_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Product_Specific_Email_Paragraphs_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/product-specific-email-paragraphs-for-woocommerce-admin.css', array(), $this->version, 'all' );

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
		 * defined in Product_Specific_Email_Paragraphs_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Product_Specific_Email_Paragraphs_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/product-specific-email-paragraphs-for-woocommerce-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Add product data tab.
	 *
	 * @since    1.0.0
	 */
	public function add_product_data_tabs($tabs) {
		$tabs['product_specific_email_paragraphs'] = [
			'label' => __('Email', 'product-specific-email-paragraphs'),
			'target' => 'product_specific_email_paragraphs',
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
		<div id="product_specific_email_paragraphs" class="panel woocommerce_options_panel hidden">
			<div class="product_specific_email_paragraph_editor">
				<?php

				global $post;
				$product_specific_email_paragraph = get_post_meta($post->ID, 'product_specific_email_paragraph', true);
				if (!$product_specific_email_paragraph) {
					$product_specific_email_paragraph = '';
				}

				wp_editor( $product_specific_email_paragraph, 'product_specific_email_paragraph', array(
					'textarea_name' => 'product_specific_email_paragraph'
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
		$product_specific_email_paragraph = isset($_POST['product_specific_email_paragraph']) ? $_POST['product_specific_email_paragraph'] : '';
		$product->update_meta_data('product_specific_email_paragraph', $product_specific_email_paragraph);
		$product->save();
	}
}
