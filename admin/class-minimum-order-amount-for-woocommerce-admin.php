<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://github.com/racmanuel
 * @since      1.0.0
 *
 * @package    Minimum_Order_Amount_For_Woocommerce
 * @subpackage Minimum_Order_Amount_For_Woocommerce/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Minimum_Order_Amount_For_Woocommerce
 * @subpackage Minimum_Order_Amount_For_Woocommerce/admin
 * @author     Manuel Ramirez Coronel <ra_cm@outlook.com>
 */
class Minimum_Order_Amount_For_Woocommerce_Admin {

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
		 * defined in Minimum_Order_Amount_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Minimum_Order_Amount_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/minimum-order-amount-for-woocommerce-admin.css', array(), $this->version, 'all' );

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
		 * defined in Minimum_Order_Amount_For_Woocommerce_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Minimum_Order_Amount_For_Woocommerce_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/minimum-order-amount-for-woocommerce-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
 	* Hook in and register a metabox to handle a theme options page and adds a menu item.
	*/
	function minimum_order_amount_for_woocommerce_options_cmb2() {

		/**
		 * Registers options page menu item and form.
		 */
		$cmb_options = new_cmb2_box( array(
			'id'           => 'minimum_order_amount_for_woocommerce_options_cmb2',
			'title'        => esc_html__( 'Minimum Order Amount for WooCommerce', 'cmb2' ),
			'object_types' => array( 'options-page' ),

			/*
			* The following parameters are specific to the options-page box
			* Several of these parameters are passed along to add_menu_page()/add_submenu_page().
			*/

			'option_key'      => 'minimum_order_amount_for_woocommerce_options', // The option key and admin menu page slug.
			//'icon_url'        => 'dashicons-cart', // Menu icon. Only applicable if 'parent_slug' is left empty.
			'menu_title'      => esc_html__( 'Minimum Order Amount for WooCommerce', 'cmb2' ), // Falls back to 'title' (above).
			'parent_slug'     => 'options-general.php', // Make options page a submenu item of the themes menu.
			'capability'      => 'manage_options', // Cap required to view options-page.
			// 'position'        => 1, // Menu position. Only applicable if 'parent_slug' is left empty.
			// 'admin_menu_hook' => 'network_admin_menu', // 'network_admin_menu' to add network-level options page.
			// 'display_cb'      => false, // Override the options-page form output (CMB2_Hookup::options_page_output()).
			'save_button'     => esc_html__( 'Save Settings', 'cmb2' ), // The text for the options-page save button. Defaults to 'Save'.
			// 'disable_settings_errors' => true, // On settings pages (not options-general.php sub-pages), allows disabling.
			// 'message_cb'      => 'yourprefix_options_page_message_callback',
		) );

		/**
		 * Options fields ids only need
		 * to be unique within this box.
		 * Prefix is not needed.
		 */

		$cmb_options->add_field( array(
			'name' => 'Settings',
			'desc' => '',
			'type' => 'title',
			'id'   => 'minimum_order_amount_for_woocommerce_title',
			'before_row' => 'cmb_after_row_cb',
		) );
		$cmb_options->add_field( array(
			'name'    => esc_html__( 'Minimum Order Amount', 'cmb2' ),
			'desc'    => esc_html__( 'Insert here the minimum order amount to show a button of go to checkout.', 'cmb2' ),
			'id'      => 'minimum_order_amount_for_woocommerce_amount',
			'type'    => 'text',
			'attributes' => array(
				'type' => 'number',
				'pattern' => '\d*',
			),
			'sanitization_cb' => 'absint',
			'escape_cb'       => 'absint',
		) );

		function cmb_after_row_cb() {
			require_once __DIR__ . '/partials/minimum-order-amount-for-woocommerce-admin-display.php';
		}
	}
	
}
