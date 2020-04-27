/**
 * Internal block libraries
 *
 * @package
 */

 const { __ } = wp.i18n;
 const { registerBlockType } = wp.blocks;
 const { InspectorControls } = wp.blockEditor;
 const { TextControl, TextareaControl, ColorPalette, PanelBody, SelectControl } = wp.components;


registerBlockType( 'sctob/miqueridoblockjs', {
	title: 'Mi querido bloque todo JS',
	icon: 'smiley',
	category: 'common',
	attributes: {
		align: {
			type: 'string',
		},
		bgcolor: {
			type: 'string',
		},
		title: {
			type: 'string',
		},
		content: {
			type: 'string',
		},
	},
	edit: ( { attributes, setAttributes } ) => {
		function setAlign( value ) {
			setAttributes( { align: value } );
		}
		function setBgColor( value ) {
			setAttributes( { bgcolor: value } );
		}
		function setTitle( value ) {
			setAttributes( { title: value } );
		}
		function setHeading( value ) {
			setAttributes( { heading: value } );
		}
    function setContent( value ) {
			setAttributes( { content: value } );
		}

		return wp.element.createElement(
			'div',
			null,
			wp.element.createElement(
				'div',
				{
					class: 'miqueridobloque',
				},
        //preview will go here
        wp.element.createElement(
					'div',
					{
						style: {
							textAlign: attributes.align,
							backgroundColor: attributes.bgcolor,
						},
					},
					wp.element.createElement(
						attributes.heading, {}, attributes.title
					),
					wp.element.createElement(
						TextareaControl,
						{ onChange: setContent },
						attributes.content
					)
				),
        //Block inspector
				wp.element.createElement(
					InspectorControls,
					null,
					wp.element.createElement(
						PanelBody,
						null,
						wp.element.createElement( SelectControl, {
							value: attributes.heading,
							label: 'Select heading',
							options: [
								{label: 'h1', value: 'h1'},
								{label: 'h2', value: 'h2'},
								{label: 'h3', value: 'h3'},
								{label: 'h4', value: 'h4'},
								{label: 'h5', value: 'h5'},
								{label: 'h6', value: 'h6'},
							],
							onChange: setHeading,
						} ),
            wp.element.createElement( TextControl, {
							value: attributes.title,
							label: 'Introducir título',
							onChange: setTitle,
						} ),
						wp.element.createElement( SelectControl, {
							value: attributes.align,
							label: 'Select position',
							options: [
								{label: 'left', value: 'left'},
								{label: 'right', value: 'right'},
								{label: 'center', value: 'center'}
							],
							onChange: setAlign,
						} ),
						wp.element.createElement(
							'label',
							{},
							'Elije un bg Color'
						),
            wp.element.createElement(
							'div',
							{ style: { height: '10px', backgroundColor: attributes.bgcolor }},
						),
						wp.element.createElement( ColorPalette, {
							value: attributes.bgcolor,
							label: 'Select bg Color',
							onChange: setBgColor,
						} )
					)
				),
			)
		);
	},
	save: ( props ) => {
		return wp.element.createElement(
			'div',
			{
				styles: {
					textAlign: props.attributes.align,
					backgroundColor: props.attributes.bgcolor,
				},
			},
			wp.element.createElement(
				props.attributes.heading,
				{},
				props.attributes.title
			),
			props.attributes.content
		);
	},
} );
