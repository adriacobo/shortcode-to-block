<?php
/**
 * Plugin Name: Shortcode To Blocks
 *
 * @package sctob
 **/

// Incluimos todos los scripts.
add_action( 'init', 'misqueridosscriptsalljs' );
/**
 * Enqueue scripts for a block
 *
 * @return void
 */
function misqueridosscriptsalljs() {
	wp_enqueue_script(
		'shortcode-to-block-js',
		plugin_dir_url( __FILE__ ) . 'shortcodetoblock.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'shortcodetoblock.js' ),
		true
	);
	wp_enqueue_style(
		'shortcode-to-block-js',
		plugin_dir_url( __FILE__ ) . 'shortcodetoblock.css',
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'shortcodetoblock.css' )
	);
}

// Hook: Register block.
add_action( 'init', 'register_miqueridoblockalljs' );
/**
 * Enqueue scripts for a block
 *
 * @return void
 */
function register_miqueridoblockalljs() {
	/**
	 * Only load if Gutenberg is available.
	 */

	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	/**
	 * Ref https://developer.wordpress.org/block-editor/developers/block-api/block-attributes/
	 */
	register_block_type(
		'sctob/miqueridoblockjs',
		array(
			'attributes' => array(
				'align'   => array(
					'type'    => 'string', // null, boolean, object, array, number, string, integer.
					'default' => 'left',
				),
				'bgcolor' => array(
					'type'    => 'string',
					'default' => 'transparent',
				),
				'title'   => array(
					'type'    => 'string',
					'default' => '',
				),
				'heading' => array(
					'type'    => 'string',
					'default' => 'h2',
				),
			),
		)
	);
}
