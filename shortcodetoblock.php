<?php
/**
 * Plugin Name: Shortcode To Blocks
 *
 * @package sctob
 **/

// Shortcode: Mi querido shortcode.
add_shortcode( 'mis_queridos_shortcodes', 'mis_queridos_shortcodes' );
/**
 * Normal shortcode that print some div.
 *
 * @param array  $atts atributos del shortcode.
 * @param string $content contenido del shortcode.
 *
 * @return string shortcodes
 */
function mis_queridos_shortcodes( $atts, $content ) {
	$atts = shortcode_atts(
		array(
			'align'     => 'left',
			'bgcolor'   => '#FFF',
			'title'     => 'Estos son mis shortcode',
			'attribute' => 'h2',
			'content'   => '',
		),
		$atts
	);

	$return  = '<div style="text-align:' . esc_html( $atts['align'] ) . ';background-color:' . esc_html( $atts['bgcolor'] ) . '">';
	$return .= '<' . esc_attr( $atts['attribute'] ) . '>' . esc_html( $atts['title'] ) . '</' . esc_attr( $atts['attribute'] ) . '>';
	$return .= esc_html( $content );
	$return .= '</div>';
	return $return;
}
/**
 * Print the same output that shortcode.
 *
 * @param array $atts atributos del shortcode.
 *
 * @return string shortcodes
 */
function print_this_block_output( $atts ) {
	$return  = '<div style="text-align:' . esc_html( $atts['align'] ) . ';background-color:' . esc_html( $atts['bgcolor'] ) . '">';
	$return .= '<' . esc_attr( $atts['heading'] ) . '>' . esc_html( $atts['title'] ) . '</' . esc_attr( $atts['heading'] ) . '>';
	$return .= esc_html( $atts['content'] );
	$return .= '</div>';
	return $return;
}

require 'fromphp/shortcodetoblock.php';
// require 'alljs/shortcodetoblock.php';
