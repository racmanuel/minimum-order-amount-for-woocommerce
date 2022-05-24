<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://github.com/racmanuel
 * @since      1.0.0
 *
 * @package    Minimum_Order_Amount_For_Woocommerce
 * @subpackage Minimum_Order_Amount_For_Woocommerce/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Minimum_Order_Amount_For_Woocommerce
 * @subpackage Minimum_Order_Amount_For_Woocommerce/includes
 * @author     Manuel Ramirez Coronel <ra_cm@outlook.com>
 */
class Minimum_Order_Amount_For_Woocommerce_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'minimum-order-amount-for-woocommerce',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
