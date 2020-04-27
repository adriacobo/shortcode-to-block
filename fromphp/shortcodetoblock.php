<?php
/**
 * Plugin Name: Shortcode To Blocks
 *
 * @package sctob
 **/

// Incluimos todos los scripts.
add_action( 'init', 'misqueridosscripts' );
/**
 * Enqueue scripts for a block
 *
 * @return void
 */
function misqueridosscripts() {
	/**
	 * Only load if Gutenberg is available.
	 */
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	wp_register_script(
		'shortcode-to-block',
		plugin_dir_url( __FILE__ ) . 'shortcodetoblock.js',
		array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-components', 'wp-editor' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'shortcodetoblock.js' ),
		true
	);
	wp_register_style(
		'shortcode-to-block',
		plugin_dir_url( __FILE__ ) . 'shortcodetoblock.css',
		array( 'wp-edit-blocks' ),
		filemtime( plugin_dir_path( __FILE__ ) . 'shortcodetoblock.css' )
	);
	/**
	 * Ref https://developer.wordpress.org/block-editor/developers/block-api/block-attributes/
	 */
	register_block_type(
		'sctob/miqueridoblockfromphp',
		array(
			'editor_script'   => 'shortcode-to-block',
			'render_callback' => 'print_this_block_output',
			'attributes'      => array(
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
