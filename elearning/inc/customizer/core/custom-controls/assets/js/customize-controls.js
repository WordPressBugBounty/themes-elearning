/**
 * Radio buttonset control JS to handle the toggle of radio buttonsets.
 *
 * File `buttonset.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor[ 'elearning-buttonset' ] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this;

		// Change the value.
		this.container.on( 'click', 'input', function () {
			control.setting.set( jQuery( this ).val() );
		} );

	}

} );

/**
 * Background image control JS to handle the background customize option.
 *
 * File `background.js`.
 *
 * @package eLearning
 */
(
	function ( $ ) {

		$( window ).on( 'load', function () {
			$( 'html' ).addClass( 'colorpicker-ready' );
		} );

		wp.customize.controlConstructor['elearning-background'] = wp.customize.Control.extend( {

			ready : function () {

				'use strict';

				var control = this;

				// Init background control.
				control.initeLearningBackgroundControl();

			},

			initeLearningBackgroundControl : function () {

				var control     = this,
				    value       = control.setting._value,
				    colorpicker = control.container.find( '.elearning-color-picker-alpha' );

				// Hide unnecessary controls by default and show only when background image is set.
				if ( _.isUndefined( value['background-image'] ) || '' === value['background-image'] ) {
					control.container.find( '.customize-control-content > .background-repeat' ).hide();
					control.container.find( '.customize-control-content > .background-position' ).hide();
					control.container.find( '.customize-control-content > .background-size' ).hide();
					control.container.find( '.customize-control-content > .background-attachment' ).hide();
				}

				// Background color setting.
				colorpicker.wpColorPicker( {

					change : function () {
						if ( jQuery( 'html' ).hasClass( 'colorpicker-ready' ) ) {
							setTimeout(
								function () {
									control.saveValue( 'background-color', colorpicker.val() );
								},
								100
							);
						}
					},

					clear : function ( event ) {
						var element = jQuery( event.target ).closest( '.wp-picker-input-wrap' ).find( '.wp-color-picker' )[0];

						if ( element ) {
							control.saveValue( 'background-color', '' );
						}
					}

				} );

				// Background image setting.
				control.container.on( 'click', '.background-image-upload-button, .thumbnail-image img', function ( e ) {
					var image = wp.media( { multiple : false } ).open().on( 'select', function () {

						// This will return the selected image from the Media Uploader, the result is an object.
						var uploadedImage = image.state().get( 'selection' ).first(),
						    previewImage  = uploadedImage.toJSON().sizes.full.url,
						    imageUrl,
						    imageID,
						    imageWidth,
						    imageHeight,
						    preview,
						    removeButton;

						if ( ! _.isUndefined( uploadedImage.toJSON().sizes.medium ) ) {
							previewImage = uploadedImage.toJSON().sizes.medium.url;
						} else if ( ! _.isUndefined( uploadedImage.toJSON().sizes.thumbnail ) ) {
							previewImage = uploadedImage.toJSON().sizes.thumbnail.url;
						}

						imageUrl    = uploadedImage.toJSON().sizes.full.url;
						imageID     = uploadedImage.toJSON().id;
						imageWidth  = uploadedImage.toJSON().width;
						imageHeight = uploadedImage.toJSON().height;

						// Show extra controls if the value has an image.
						if ( '' !== imageUrl ) {
							control.container.find( '.customize-control-content > .background-repeat, .customize-control-content > .background-position, .customize-control-content > .background-size, .customize-control-content > .background-attachment' ).show();
						}

						control.saveValue( 'background-image', imageUrl );
						preview      = control.container.find( '.placeholder, .thumbnail' );
						removeButton = control.container.find( '.background-image-upload-remove-button' );

						if ( preview.length ) {
							preview.removeClass().addClass( 'thumbnail thumbnail-image' ).html( '<img src="' + previewImage + '" alt="" />' );
						}

						if ( removeButton.length ) {
							removeButton.show();
						}
					} );

					e.preventDefault();
				} );

				control.container.on( 'click', '.background-image-upload-remove-button', function ( e ) {

					var preview,
					    removeButton;

					e.preventDefault();

					control.saveValue( 'background-image', '' );

					preview      = control.container.find( '.placeholder, .thumbnail' );
					removeButton = control.container.find( '.background-image-upload-remove-button' );

					// Hide unnecessary controls.
					control.container.find( '.customize-control-content > .background-repeat' ).hide();
					control.container.find( '.customize-control-content > .background-position' ).hide();
					control.container.find( '.customize-control-content > .background-size' ).hide();
					control.container.find( '.customize-control-content > .background-attachment' ).hide();

					if ( preview.length ) {
						preview.removeClass().addClass( 'placeholder' ).html( eLearningCustomizerControlBackground.placeholder );
					}

					if ( removeButton.length ) {
						removeButton.hide();
					}
				} );

				// Background repeat setting.
				control.container.on( 'change', '.background-repeat select', function () {
					control.saveValue( 'background-repeat', jQuery( this ).val() );
				} );

				// Background position setting.
				control.container.on( 'change', '.background-position select', function () {
					control.saveValue( 'background-position', jQuery( this ).val() );
				} );

				// Background size setting.
				control.container.on( 'change', '.background-size select', function () {
					control.saveValue( 'background-size', jQuery( this ).val() );
				} );

				// Background attachment setting.
				control.container.on( 'change', '.background-attachment select', function () {
					control.saveValue( 'background-attachment', jQuery( this ).val() );
				} );

			},

			/**
			 * Saves the value.
			 */
			saveValue : function ( property, value ) {

				var control = this,
				    input   = jQuery( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .background-hidden-value' ),
				    val     = control.setting._value;

				val[property] = value;

				jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
				control.setting.set( val );

			}

		} );

	}
)( jQuery );

/**
 * Color picker control JS to handle color picker rendering within customize control.
 *
 * File `color.js`.
 *
 * @package eLearning
 */
(
	function ( $ ) {

		$( window ).on( 'load', function () {
			$( 'html' ).addClass( 'colorpicker-ready' );
		} );

		wp.customize.controlConstructor[ 'elearning-color' ] = wp.customize.Control.extend( {

			ready : function () {

				'use strict';

				var control = this,
					isHueSlider = ( this.params.mode === 'hue' ),
					picker = this.container.find( '.elearning-color-picker-alpha' ),
					color = picker.val().replace( /\s+/g, '' );

				picker.wpColorPicker( {

					change : function ( event, ui ) {
						var current = ( isHueSlider ? ui.color.h() : picker.iris( 'color' ) );

						if ( jQuery( 'html' ).hasClass( 'colorpicker-ready' ) && color !== current.replace( /\s+/g, '' ) ) {
							control.setting.set( current );
						}
					},

					clear: function() {

						if ( ! control.setting.get() ) {
							control.setting.set( '' );
						}

						control.setting.set( '' );
					}

				} );

			}

		} );

	}
)( jQuery );

(
	function ( $ ) {

		wp.customize.controlConstructor['elearning-date'] = wp.customize.Control.extend( {

			ready: function() {
				'use strict';

				var control  = this,
					selector = control.selector,
					input    = $( selector ).find( 'input' );

				// Init the datepicker.
				input.datepicker(
					{
						dateFormat : 'yy-mm-dd',
						changeMonth: true,
						changeYear : true,
						showOn     : 'button',
						buttonText : '',
						beforeShow : function( input, obj ) {
							$( input ).after( $( input ).datepicker( 'widget' ) );
						}
					}
				);

				// Save the changes.
				input.on( 'change keyup paste', function() {
					control.setting.set( $( this ).val() );
				} );
			},
		} );
	}
)( jQuery );

/**
 * Radio buttonset control JS to handle the toggle of radio buttonsets.
 *
 * File `buttonset.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor[ 'elearning-buttonset' ] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this;

		// Change the value.
		this.container.on( 'click', 'input', function () {
			control.setting.set( jQuery( this ).val() );
		} );

	}

} );

/**
 * Dimensions JS to handle the background customize option.
 *
 * File `background.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor['elearning-dimensions'] = wp.customize.Control.extend( {

    ready : function () {

        'use strict';

        var control = this;

        // Top Dimension setting.
        control.container.on( 'change keyup paste input', '.top input', function () {
            control.updateTop();
        } );

        // Right Dimension setting.
        control.container.on( 'change keyup paste input', '.right input', function () {
            control.updateRight();
        } );

        // Left Dimension setting.
        control.container.on( 'change keyup paste input', '.left input', function () {
            control.updateLeft();
        } );

        // Bottom Dimension setting.
        control.container.on( 'change keyup paste input', '.bottom input', function () {
            control.updateBottom();
        } );

    },

    updateTop : function () {

        var control  = this,
            val      = control.setting._value,
            input    = control.container.find( '.dimensions-hidden-value' ),
            newValue = {
                'top' : {}
            };

        control.container.find( '.top .input-wrapper' ).each(
            function () {
                var controlValue = jQuery( this ).find( 'input' ).val();

                newValue['top'] = controlValue;
            }
        );

        // Extend/Update the `val` object to include `newValue`'s new data as an object.
        jQuery.extend( val, newValue );

        jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
        control.setting.set( val );

    },

    updateRight : function () {

        var control  = this,
            val      = control.setting._value,
            input    = control.container.find( '.dimensions-hidden-value' ),
            newValue = {
                'right' : {}
            };

        control.container.find( '.right .input-wrapper' ).each(
            function () {
                var controlValue = jQuery( this ).find( 'input' ).val();

                newValue['right'] = controlValue;
            }
        );

        // Extend/Update the `val` object to include `newValue`'s new data as an object.
        jQuery.extend( val, newValue );

        jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
        control.setting.set( val );

    },

    updateBottom: function () {

        var control  = this,
            val      = control.setting._value,
            input    = control.container.find( '.dimensions-hidden-value' ),
            newValue = {
                'bottom' : {}
            };

        control.container.find( '.bottom .input-wrapper' ).each(
            function () {
                var controlValue = jQuery( this ).find( 'input' ).val();

                newValue['bottom'] = controlValue;
            }
        );

        // Extend/Update the `val` object to include `newValue`'s new data as an object.
        jQuery.extend( val, newValue );

        jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
        control.setting.set( val );

    },

    updateLeft : function () {

        var control  = this,
            val      = control.setting._value,
            input    = control.container.find( '.dimensions-hidden-value' ),
            newValue = {
                'left' : {}
            };

        control.container.find( '.left .input-wrapper' ).each(
            function () {
                var controlValue = jQuery( this ).find( 'input' ).val();

                newValue['left'] = controlValue;
            }
        );

        // Extend/Update the `val` object to include `newValue`'s new data as an object.
        jQuery.extend( val, newValue );

        jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
        control.setting.set( val );

    },

} );
/**
 * Editor control JS to handle the editor rendering within customize control.
 *
 * File `editor.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor[ 'elearning-editor' ] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this,
			id      = 'editor_' + control.id;

		if ( wp.editor && wp.editor.initialize ) {
			wp.editor.initialize(id, {
				tinymce: {
					wpautop: true,
					setup: function (editor) {
						editor.on( 'Paste Change input Undo Redo', function() {
							var content = editor.getContent();
							wp.customize.instance( control.id ).set( content );
						} )
					}
				},
				quicktags: true,
				mediaButtons: true
			});
		}

	},

} );
/**
 * Dropdown categories control JS to handle the dropdown categories customize control.
 *
 * File `dropdown-categorie.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor[ 'elearning-dropdown-categories' ] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this;

		// Change the value.
		this.container.on( 'change', 'select', function () {
			control.setting.set( jQuery( this ).val() );
		} );

	}

} );

/**
 * Control: FontAwesome.
 */
(
	function ( $ ) {

		wp.customize.controlConstructor['elearning-fontawesome'] = wp.customize.Control.extend(
			{
				ready: function () {
					'use strict';

					var control = this;

					control.initeLearningFontawesomeControl();
				},

				initeLearningFontawesomeControl: function() {
					var control       = this,
						selector      = control.selector,
						elSelector    = $( selector ).find( 'select' ),
						faData        = [],
						value         = control.setting._value,
						data          = window['eLearningCustomizerControlFontawesome' + this.id],
						faDataCounter = 0,
						faSelect;

					$.each(
						data,
						function ( key, value ) {
							faData[ faDataCounter ] = {
								id: value,
								text: value
							};

							faDataCounter++;
						}
					);

					// Add HTML inside the option element.
					function formatState( state ) {

						if ( ! state.id ) {
							return state.text;
						}

						var $state = $(
							'<span><i class="fa fa-lg ' + state.text + '"></i> ' + state.text + '</span>'
						);

						return $state;
					};

					// Apply selectWoo.
					faSelect = elSelector.selectWoo(
						{
							data: faData,
							width: '100%',
							templateResult: formatState,
						}
					);

					faSelect.val( value ).trigger( 'change' );

					faSelect.on(
						'change',
						function () {
							control.setting.set( elSelector.val() );
						}
					);
				},
			}
		);
	}
)( jQuery );

/**
 * Editor control JS to handle the editor rendering within customize control.
 *
 * File `editor.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor[ 'elearning-editor' ] = wp.customize.Control.extend(
	{

		ready : function () {

			'use strict';

			var control = this,
				id      = 'editor_' + control.id;

			if (wp.editor && wp.editor.initialize) {
				wp.editor.initialize(
					id,
					{
						tinymce: {
							wpautop: false,
							forced_root_block: "",
						},
						quicktags: true,
						mediaButtons: true
						}
				);
			}

		},

		onChangeActive : function ( active, args ) {

			'use strict';

			var control = this,
				id      = 'editor_' + control.id,
				element = control.container.find( 'textarea' ),
				editor;

			editor = tinyMCE.get( id );

			if ( editor ) {

				editor.onChange.add(
					function ( ed ) {
						var content;

						ed.save();
						content = editor.getContent();
						element.val( content ).trigger( 'change' );
						wp.customize.instance( control.id ).set( content );
					}
				);

			}

		}

	}
);

/* global wp, jQuery, _, elearningCustomizerControlGradient */
/**
 * Background image control JS to handle the background customize option.
 *
 * File `background.js`.
 *
 * @package eLearning
 */
(
	function ( $ ) {

		$( window ).on(
			'load',
			function () {
				$( 'html' ).addClass( 'colorpicker-ready' );
			}
		);

		wp.customize.controlConstructor['elearning-gradient'] = wp.customize.Control.extend(
			{

				ready : function () {

					'use strict';

					var control = this;

					// Init controls.
					control.initColorControl();
					control.initColorStopControl();
					control.initColor2Control();
					control.initColorStop2Control();
					control.initGradientAngleControl();

					var selectedType = $( '.types select' ).find( ':selected' ).val();

					if ( 'radial' === selectedType ) {
						control.container.find( '.type > .type-linear' ).hide();
						control.container.find( '.type > .type-radial' ).show();
					}

					if ( 'linear' === selectedType ) {
						control.container.find( '.type > .type-radial' ).hide();
						control.container.find( '.type > .type-linear' ).show();
					}
					control.container.on(
						'change',
						'.types select',
						function () {
							if ( 'radial' === $( this ).find( ':selected' ).val() ) {
								control.container.find( '.type > .type-linear' ).hide();
								control.container.find( '.type > .type-radial' ).show();
							}

							if ( 'linear' === $( this ).find( ':selected' ).val() ) {
								control.container.find( '.type > .type-radial' ).hide();
								control.container.find( '.type > .type-linear' ).show();
							}

							control.saveValue( 'gradient-type', jQuery( '.types select' ).val() );
						}
					);
					control.container.on(
						'change',
						'.type-radial select',
						function () {
							control.saveValue( 'gradient-position', jQuery( '.type-radial select' ).val() );
						}
					);

				},

				initColorControl : function () {

					var control     = this,
						value       = control.setting._value,
						colorpicker = control.container.find( '.color .elearning-color-picker-alpha' );

					// Background color setting.
					colorpicker.wpColorPicker(
						{

							change : function () {
								if ( jQuery( 'html' ).hasClass( 'colorpicker-ready' ) ) {
									setTimeout(
										function () {
											control.saveValue( 'color', colorpicker.val() );
										},
										100
									);
								}
							},

							clear : function ( event ) {
								var element = jQuery( event.target ).closest( '.wp-picker-input-wrap' ).find( '.primary-color .wp-color-picker' )[0];

								if ( element ) {
									control.saveValue( 'color', '' );
								}
							}

							}
					);

				},

				initColorStopControl : function () {
					'use strict';

					var control = this,
						value   = control.setting._value;

					// Update the text value.
					this.container.find( '.color-stop input[type=range]' ).on( 'input change', function () {
						var value        = jQuery( this ).val(),
							input_number = jQuery( this ).closest( '.slider-wrapper' ).find( '.elearning-range-value .value' );

						input_number.val( value );
						input_number.change();
					} );

					// Save changes.
					jQuery( '.color-stop .slider-wrapper' ).on(
						'input change',
						'input[type=number]',
						function () {
							var value = jQuery( this ).val();
							jQuery( this ).closest( '.color-stop .slider-wrapper' ).find( 'input[type=range]' ).val( value );
							control.saveValue( 'color-stop' , value );
						}
					);

				},

				initColor2Control : function () {

					var control     = this,
						value       = control.setting._value,
						colorpicker = control.container.find( '.color-2 .elearning-color-picker-alpha' );

					// Background color setting.
					colorpicker.wpColorPicker(
						{

							change : function () {
								if ( jQuery( 'html' ).hasClass( 'colorpicker-ready' ) ) {
									setTimeout(
										function () {
											control.saveValue( 'color-2', colorpicker.val() );
										},
										100
									);
								}
							},

							clear : function ( event ) {
								var element = jQuery( event.target ).closest( '.wp-picker-input-wrap' ).find( '.secondary-color .wp-color-picker' )[0];

								if ( element ) {
									control.saveValue( 'color-2', '' );
								}
							}

						}
					);

				},

				initColorStop2Control : function () {
					'use strict';

					var control = this,
						value   = control.setting._value;

					// Update the text value.
					this.container.find( '.color-stop-2 input[type=range]' ).on( 'input change', function () {
						var value        = jQuery( this ).val(),
							input_number = jQuery( this ).closest( '.slider-wrapper' ).find( '.elearning-range-value .value' );

						input_number.val( value );
						input_number.change();
					} );

					// Save changes.
					jQuery( '.color-stop-2 .slider-wrapper' ).on(
						'input change',
						'input[type=number]',
						function () {
							var value = jQuery( this ).val();
							jQuery( this ).closest( '.color-stop-2 .slider-wrapper' ).find( 'input[type=range]' ).val( value );
							control.saveValue( 'color-stop-2' , value );
						}
					);

				},

				initGradientAngleControl : function () {
					'use strict';

					var control = this,
						value   = control.setting._value;

					// Update the text value.
					this.container.find( '.type-linear input[type=range]' ).on( 'input change', function () {
						var value        = jQuery( this ).val(),
							input_number = jQuery( this ).closest( '.slider-wrapper' ).find( '.elearning-range-value .value' );

						input_number.val( value );
						input_number.change();
					} );

					// Save changes.
					jQuery( '.type-linear .slider-wrapper' ).on(
						'input change',
						'input[type=number]',
						function () {
							var value = jQuery( this ).val();
							jQuery( this ).closest( '.type-linear .slider-wrapper' ).find( 'input[type=range]' ).val( value );
							control.saveValue( 'gradient-angle' , value );
						}
					);

				},

					/**
					 * Saves the value.
					 */
				saveValue : function ( property, value ) {
					var control     = this,
						input       = jQuery( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .gradient-hidden-value' ),
						val         = control.setting._value;
					val[ property ] = value;
					jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
					control.setting.set( val );
				},

			}
		);

	}
)( jQuery );

/**
 * Group control JS to handle the group customize option.
 *
 * File `group.js`.
 *
 * @package eLearning
 */
(
	function ( $ ) {

		wp.customize.controlConstructor['elearning-group'] = wp.customize.Control.extend( {

			ready : function () {

				'use strict';

				var control = this;

				control.registerToggleEvents();
				this.container.on( 'elearning_settings_changed', control.onOptionChange );

			},

			registerToggleEvents : function () {

				var control = this;

				/* Close popup when click outside on customize sidebar area */
				$( '.wp-full-overlay-sidebar-content' ).click(
					function ( e ) {
						if ( ! $( e.target ).closest( '.elearning-field-settings-modal' ).length ) {
							$( '.elearning-group-toggle-icon.open' ).trigger( 'click' );
						}
					}
				);

				control.container.on(
					'click',
					'.elearning-group-wrap .elearning-group-toggle-icon',
					function ( e ) {

						e.preventDefault();
						e.stopPropagation();

						var $this          = $( this ),
						    parent_wrap    = $this.closest( '.customize-control-elearning-group' ),
						    is_loaded      = parent_wrap.find( '.elearning-field-settings-modal' ).data( 'loaded' ),
						    parent_section = parent_wrap.parents( '.control-section' );

						if ( $this.hasClass( 'open' ) ) {
							parent_wrap.find( '.elearning-field-settings-modal' ).hide();
						} else {

							/* Close popup when another popup is clicked */
							var get_open_popup = parent_section.find( '.elearning-group-toggle-icon.open' );
							if ( get_open_popup.length > 0 ) {
								get_open_popup.trigger( 'click' );
							}

							if ( is_loaded ) {
								parent_wrap.find( '.elearning-field-settings-modal' ).show();
							} else {

								var fields     = control.params.elearning_fields,
								    modal_wrap = $( eLearningCustomizerControlGroup.group_modal_tmpl ),
								    device     = $( '#customize-footer-actions .active' ).attr( 'data-device' );

								parent_wrap.find( '.elearning-field-settings-wrap' ).append( modal_wrap );
								parent_wrap.find( '.elearning-fields-wrap' ).attr( 'data-control', control.params.name );
								control.elearning_render_field( parent_wrap, fields, control );
								parent_wrap.find( '.elearning-field-settings-modal' ).show();

								if ( 'mobile' === device ) {
									$( '.control-wrap.mobile' ).addClass( 'active' );
									$( '.responsive-switchers .preview-mobile' ).addClass( 'active' );

									$( '.control-wrap.tablet, .control-wrap.desktop' ).removeClass( 'active' );
									$( '.responsive-switchers .preview-tablet, .responsive-switchers .preview-desktop' ).removeClass( 'active' );
								} else if ( 'tablet' === device ) {
									$( '.control-wrap.tablet' ).addClass( 'active' );
									$( '.responsive-switchers .preview-tablet' ).addClass( 'active' );

									$( '.control-wrap.mobile, .control-wrap.desktop' ).removeClass( 'active' );
									$( '.responsive-switchers .preview-mobile, .responsive-switchers .preview-desktop' ).removeClass( 'active' );
								} else {
									$( '.control-wrap.desktop' ).addClass( 'active' );
									$( '.responsive-switchers .preview-desktop' ).addClass( 'active' );

									$( '.control-wrap.mobile, .control-wrap.tablet' ).removeClass( 'active' );
									$( '.responsive-switchers .preview-mobile, .responsive-switchers .preview-tablet' ).removeClass( 'active' );
								}

							}

						}

						$this.toggleClass( 'open' );

					}
				);

				control.container.on(
					'click',
					'.elearning-group-wrap > .customizer-text',
					function ( e ) {

						e.preventDefault();
						e.stopPropagation();

						$( this ).find( '.elearning-group-toggle-icon' ).trigger( 'click' );

					}
				);

			},

			elearning_render_field : function ( wrap, fields, control_element ) {

				var control             = this;
				var elearning_field_wrap = wrap.find( '.elearning-fields-wrap' );
				var fields_html         = '';
				var control_types       = [];
				var field_values        = control.isJSONString( control_element.params.value ) ? JSON.parse( control_element.params.value ) : {};

				if ( 'undefined' != typeof fields.tabs ) {

					var counter = 0;
					fields_html += '<div id="' + control_element.params.name + '-tabs" class="elearning-group-tabs">';

					fields_html += '<ul class="elearning-group-list">';
					_.each(
						fields.tabs,
						function ( value, key ) {
							var li_class = '';

							if ( 0 === counter ) {
								li_class = "active";
							}

							fields_html += '<li class="' + li_class + '"><a href="#tab-' + key.replace( ' ','-' ) + '"><span>' + key + '</span></a></li>';
							counter ++;
						}
					);
					fields_html += '</ul>';

					fields_html += '<div class="elearning-tab-content" >';
					_.each(
						fields.tabs,
						function ( fields_data, key ) {

							var result = control.generateFieldHtml( fields_data, field_values );

							fields_html += '<div id="tab-' + key.replace( ' ','-' ) + '" class="tab">';
							fields_html += result.html;

							_.each(
								result.controls,
								function ( control_value, control_key ) {
									control_types.push(
										{
											key   : control_value.key,
											value : control_value.value,
											name  : control_value.name
										}
									);
								}
							);

							fields_html += '</div>';

						}
					);
					fields_html += '</div>';

					fields_html += '</div>';

					elearning_field_wrap.html( fields_html );

					$( '#' + control_element.params.name + '-tabs' ).tabs();

				} else {

					var result = control.generateFieldHtml( fields, field_values );

					fields_html += result.html;

					_.each(
						result.controls,
						function ( control_value, control_key ) {
							control_types.push(
								{
									key   : control_value.key,
									value : control_value.value,
									name  : control_value.name
								}
							);
						}
					);

					elearning_field_wrap.html( fields_html );

				}

				_.each(
					control_types,
					function ( control_type, index ) {

						switch ( control_type.key ) {

							case 'elearning-color':
								control.initColorControl( elearning_field_wrap, control_element, control_type.name );
								break;

							case 'elearning-background':
								control.initBackgroundControl( control_element, control_type, control_type.name );
								break;

							case 'elearning-typography':
								control.initTypographyControl( control_element, control_type, control_type.name );
								break;

						}

					}
				);

				wrap.find( '.elearning-field-settings-modal' ).data( 'loaded', true );

			},

			isJSONString : function ( string ) {

				try {
					JSON.parse( string );
				} catch ( e ) {
					return false;
				}

				return true;

			},

			generateFieldHtml : function ( fields_data, field_values ) {

				var fields_html   = '';
				var control_types = [];

				_.each(
					fields_data,
					function ( attr, index ) {

						var new_value   = (
							    wp.customize.control( attr.name ) ? wp.customize.control( attr.name ).params.value : ''
						    ),
						    control     = attr.control,
						    template_id = 'customize-control-' + control + '-content',
						    template    = wp.template( template_id ),
						    value       = new_value || attr.default,
						    dataAtts    = '',
						    input_attrs = '';

						attr.value = value;
						attr.title = attr.label;

						// Data attributes.
						_.each(
							attr.data_attrs,
							function ( value, name ) {
								dataAtts += ' data-' + name + ' ="' + value + '"';
							}
						);

						// Input attributes.
						_.each(
							attr.input_attrs,
							function ( value, name ) {
								input_attrs += name + ' ="' + value + '"';
							}
						);

						attr.dataAttrs  = dataAtts;
						attr.inputAttrs = input_attrs;

						control_types.push(
							{
								key   : control,
								value : value,
								name  : attr.name
							}
						);

						var responsive_switchers = '',
						    controlsType         = [
							    'elearning-typography'
						    ];

						if ( (
							     'elearning-typography' === attr.control
						     ) && controlsType.includes( attr.control ) ) {
							attr.languages = eLearningCustomizerControlTypographySubsets;
						}

						if ( controlsType.includes( attr.control ) ) {
							responsive_switchers = 'has-responsive-switchers';
						}

						fields_html += '<li id="customize-control-' + attr.name + '" class="customize-control ' + responsive_switchers + ' customize-control-' + attr.control + '" >';
						fields_html += template( attr );
						fields_html += '</li>';

					}
				);

				var result = new Object();

				result.controls = control_types;
				result.html     = fields_html;

				return result;

			},

			onOptionChange : function ( e, control, element, value, name ) {

				var control_id = $( '.hidden-field-' + name );
				control_id.val( value );

				var sub_control = wp.customize.control( name );
				sub_control.setting.set( value );

			},

			initColorControl : function ( wrap, control_elem, name ) {

				var control     = this;
				var colorpicker = wrap.find( '.customize-control-elearning-color .elearning-color-picker-alpha' );

				colorpicker.wpColorPicker(
					{
						change : function ( event, ui ) {

							if ( 'undefined' != typeof event.originalEvent || 'undefined' != typeof ui.color._alpha ) {

								var element = $( event.target ).closest( '.wp-picker-input-wrap' ).find( '.wp-color-picker' )[0];
								name        = $( element ).parents( '.customize-control' ).attr( 'id' );
								var picker  = $( '#' + name + '.customize-control-elearning-color .elearning-color-picker-alpha' );
								name        = name.replace( 'customize-control-', '' );
								var current = picker.iris( 'color' );

								$( element ).val( current );

								control.container.trigger(
									'elearning_settings_changed',
									[
										control,
										$( element ),
										current,
										name
									]
								);
							}

						},

						clear : function ( event ) {

							var element = $( event.target ).closest( '.wp-picker-input-wrap' ).find( '.wp-color-picker' )[0];
							name        = $( element ).parents( '.customize-control' ).attr( 'id' );
							name        = name.replace( 'customize-control-', '' );

							$( element ).val( '' );

							control.container.trigger(
								'elearning_settings_changed',
								[
									control,
									$( element ),
									'',
									name
								]
							);

							wp.customize.previewer.refresh();

						}
					}
				);
			},

			initBackgroundControl : function ( control, control_atts, name ) {

				var input            = $( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .background-hidden-value' ),
				    value            = JSON.parse( input.val() ),
				    control_name     = control_atts.name,
				    colorpicker      = control.container.find( '.elearning-color-picker-alpha' ),
				    controlContainer = control.container.find( '#customize-control-' + control_name );

				// Hide unnecessary controls if the value doesn't have an image.
				if ( _.isUndefined( value['background-image'] ) || '' === value['background-image'] ) {
					controlContainer.find( '.customize-control-content > .background-repeat' ).hide();
					controlContainer.find( '.customize-control-content > .background-position' ).hide();
					controlContainer.find( '.customize-control-content > .background-size' ).hide();
					controlContainer.find( '.customize-control-content > .background-attachment' ).hide();
				}

				// Background color setting.
				colorpicker.wpColorPicker(
					{
						change : function () {

							if ( $( 'html' ).hasClass( 'colorpicker-ready' ) ) {
								var $this = $( this );

								setTimeout(
									function () {
										control.saveBackgroundValue( 'background-color', colorpicker.val(), $this, name );
									},
									100
								);
							}

						},

						clear : function ( event ) {

							var element = $( event.target ).closest( '.wp-picker-input-wrap' ).find( '.wp-color-picker' )[0];

							if ( element ) {
								control.saveBackgroundValue( 'background-color', '', $( element ), name );
							}

							wp.customize.previewer.refresh();

						}
					}
				);

				// Background image setting..
				controlContainer.on( 'click', '.background-image-upload-button, .thumbnail-image img', function ( e ) {
					var upload_img_btn = $( this );
					var image          = wp.media( { multiple : false } ).open().on( 'select', function () {

						// This will return the selected image from the Media Uploader, the result is an object.
						var uploadedImage = image.state().get( 'selection' ).first(),
						    previewImage  = uploadedImage.toJSON().sizes.full.url,
						    imageUrl,
						    imageID,
						    imageWidth,
						    imageHeight,
						    preview,
						    removeButton;

						if ( ! _.isUndefined( uploadedImage.toJSON().sizes.medium ) ) {
							previewImage = uploadedImage.toJSON().sizes.medium.url;
						} else if ( ! _.isUndefined( uploadedImage.toJSON().sizes.thumbnail ) ) {
							previewImage = uploadedImage.toJSON().sizes.thumbnail.url;
						}

						imageUrl    = uploadedImage.toJSON().sizes.full.url;
						imageID     = uploadedImage.toJSON().id;
						imageWidth  = uploadedImage.toJSON().width;
						imageHeight = uploadedImage.toJSON().height;

						// Show extra controls if the value has an image.
						if ( '' !== imageUrl ) {
							controlContainer.find( '.customize-control-content > .background-repeat, .customize-control-content > .background-position, .customize-control-content > .background-size, .customize-control-content > .background-attachment' ).show();
						}

						control.saveBackgroundValue( 'background-image', imageUrl, upload_img_btn, name );
						preview      = controlContainer.find( '.placeholder, .thumbnail' );
						removeButton = controlContainer.find( '.background-image-upload-remove-button' );

						if ( preview.length ) {
							preview.removeClass().addClass( 'thumbnail thumbnail-image' ).html( '<img src="' + previewImage + '" alt="" />' );
						}

						if ( removeButton.length ) {
							removeButton.show();
						}
					} );

					e.preventDefault();
				} );

				controlContainer.on( 'click', '.background-image-upload-remove-button', function ( e ) {

					var preview,
					    removeButton;

					e.preventDefault();

					control.saveBackgroundValue( 'background-image', '', $( this ) );

					preview      = controlContainer.find( '.placeholder, .thumbnail' );
					removeButton = controlContainer.find( '.background-image-upload-remove-button' );

					// Hide unnecessary controls.
					controlContainer.find( '.customize-control-content > .background-repeat' ).hide();
					controlContainer.find( '.customize-control-content > .background-position' ).hide();
					controlContainer.find( '.customize-control-content > .background-size' ).hide();
					controlContainer.find( '.customize-control-content > .background-attachment' ).hide();

					if ( preview.length ) {
						preview.removeClass().addClass( 'placeholder' ).html( eLearningCustomizerControlBackground.placeholder );
					}

					if ( removeButton.length ) {
						removeButton.hide();
					}
				} );

				// Background repeat setting.
				controlContainer.on( 'change', '.background-repeat select', function () {
					control.saveBackgroundValue( 'background-repeat', $( this ).val(), $( this ), name );
				} );

				// Background position setting.
				controlContainer.on( 'change', '.background-position select', function () {
					control.saveBackgroundValue( 'background-position', $( this ).val(), $( this ), name );
				} );

				// Background size setting.
				controlContainer.on( 'change', '.background-size select', function () {
					control.saveBackgroundValue( 'background-size', $( this ).val(), $( this ), name );
				} );

				// Background attachment setting.
				controlContainer.on( 'change', '.background-attachment select', function () {
					control.saveBackgroundValue( 'background-attachment', $( this ).val(), $( this ), name );
				} );

			},

			saveBackgroundValue : function ( property, value, element, name ) {

				var control = this,
				    input   = $( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .background-hidden-value' ),
				    val     = JSON.parse( input.val() );

				val[property] = value;

				$( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );

				name = $( element ).parents( '.customize-control' ).attr( 'id' );
				name = name.replace( 'customize-control-', '' );

				control.container.trigger(
					'elearning_settings_changed',
					[
						control,
						element,
						val,
						name
					]
				);

			},

			initTypographyControl : function ( control, control_atts, name ) {

				var value            = control.setting._value,
				    control_name     = control_atts.name,
				    controlContainer = control.container.find( '#customize-control-' + control_name );

				// On customizer load, render the available font options.
				control.renderTypographyFontSelector( $( this ), name, control_atts );
				control.renderTypographyVariantSelector( $( this ), name, control_atts );
				control.renderTypographySubsetSelector( $( this ), name, control_atts );

				// Font style setting.
				controlContainer.on( 'change', '.font-style select', function () {
					control.saveTypographyValue( 'font-style', $( this ).val(), $( this ), name );
				} );

				// Text transform setting.
				controlContainer.on( 'change', '.text-transform select', function () {
					control.saveTypographyValue( 'text-transform', $( this ).val(), $( this ), name );
				} );

				// Text decoration setting.
				controlContainer.on( 'change', '.text-decoration select', function () {
					control.saveTypographyValue( 'text-decoration', $( this ).val(), $( this ), name );
				} );

				// Font size setting.
				controlContainer.on( 'change keyup paste input', '.font-size input', function () {
					control.saveTypographyFontSize( $( this ), name, control_atts );
				} );

				// Line height setting.
				controlContainer.on( 'change keyup paste input', '.line-height input', function () {
					control.saveTypographyLineHeight( $( this ), name, control_atts );
				} );

				// Letter spacing setting.
				controlContainer.on( 'change keyup paste input', '.letter-spacing input', function () {
					control.saveTypographyLetterSpacing( $( this ), name, control_atts );
				} );

			},

			renderTypographyFontSelector : function ( element, name, control_atts ) {

				var control       = this,
				    selector      = control.selector + ' .font-family select',
				    standardFonts = [],
				    googleFonts   = [],
				    customFonts   = [],
				    input         = $( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .typography-hidden-value' ),
				    value         = JSON.parse( input.val() ),
				    fonts         = control.getTypographyFonts(),
				    fontSelect;

				// Format standard fonts as an array.
				if ( ! _.isUndefined( fonts.standard ) ) {
					_.each(
						fonts.standard,
						function ( font ) {
							standardFonts.push(
								{
									id   : font.family.replace( /&quot;/g, '&#39' ),
									text : font.label
								}
							);
						}
					);
				}

				// Format Google fonts as an array.
				if ( ! _.isUndefined( fonts.google ) ) {
					_.each(
						fonts.google,
						function ( font ) {
							googleFonts.push(
								{
									id   : font.family,
									text : font.label
								}
							);
						}
					);
				}

				// Combine fonts and build the final data.
				data = [
					{
						text     : fonts.standardfontslabel,
						children : standardFonts
					},
					{
						text     : fonts.googlefontslabel,
						children : googleFonts
					}
				];

				// Format custom fonts as an array.
				if ( ! _.isUndefined( fonts.custom ) ) {
					_.each(
						fonts.custom,
						function ( font ) {
							customFonts.push(
								{
									id   : font.family,
									text : font.label
								}
							);
						}
					);

					// Merge on `data` array.
					data.push(
						{
							text     : fonts.customfontslabel,
							children : customFonts
						}
					);
				}

				// Instantiate selectWoo with the data.
				fontSelect = $( selector ).selectWoo(
					{
						data  : data,
						width : '100%'
					}
				);

				// Set the initial value.
				if ( value['font-family'] ) {
					fontSelect.val( value['font-family'].replace( /'/g, '"' ) ).trigger( 'change' );
				}

				// When the font option value changes.
				fontSelect.on(
					'change',
					function () {

						// Set the value.
						control.saveTypographyValue( 'font-family', $( this ).val(), $( this ), name );

						// Render new list of selected font options.
						control.renderTypographyVariantSelector( $( this ), name, control_atts );
						control.renderTypographySubsetSelector( $( this ), name, control_atts );

					}
				);

			},

			getTypographyFonts : function () {

				var control = this;

				if ( ! _.isUndefined( eLearningCustomizerControlTypography ) ) {
					return eLearningCustomizerControlTypography;
				}

				return {
					google   : [],
					standard : []
				};

			},

			renderTypographyVariantSelector : function ( element, name, control_atts ) {

				var control    = this,
				    input      = $( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .typography-hidden-value' ),
				    value      = JSON.parse( input.val() ),
				    fontFamily = value['font-family'],
				    variants   = control.getTypographyVariants( fontFamily ),
				    selector   = control.selector + ' .font-weight select',
				    data       = [],
				    isValid    = false,
				    variantSelector;

				if ( false !== variants ) {

					$( control.selector + ' .font-weight' ).show();
					_.each(
						variants,
						function ( variant ) {
							if ( value['font-weight'] === variant.id ) {
								isValid = true;
							}

							data.push(
								{
									id   : variant.id,
									text : variant.label
								}
							);
						}
					);

					if ( ! isValid ) {
						value['font-weight'] = 'regular';
					}

					if ( $( selector ).hasClass( 'select2-hidden-accessible' ) ) {
						$( selector ).selectWoo( 'destroy' );
						$( selector ).empty();
					}

					// Instantiate selectWoo with the data.
					variantSelector = $( selector ).selectWoo(
						{
							data  : data,
							width : '100%'
						}
					);

					variantSelector.val( value['font-weight'] ).trigger( 'change' );
					variantSelector.on(
						'change',
						function () {
							control.saveTypographyValue( 'font-weight', $( this ).val(), $( this ), name );
						}
					);

				} else {

					$( control.selector + ' .font-weight' ).hide();

				}

			},

			getTypographyVariants : function ( fontFamily ) {

				var control = this,
				    fonts   = control.getTypographyFonts();

				var variants = false;
				_.each(
					fonts.standard,
					function ( font ) {
						if ( fontFamily && font.family === fontFamily.replace( /'/g, '"' ) ) {
							variants = font.variants;

							return variants;
						}
					}
				);

				_.each(
					fonts.google,
					function ( font ) {
						if ( font.family === fontFamily ) {
							variants = font.variants;

							return variants;
						}
					}
				);

				// For custom fonts.
				if ( ! _.isUndefined( fonts.custom ) ) {
					_.each(
						fonts.custom,
						function ( font ) {
							if ( font.custom === fontFamily ) {
								variants = font.variants;

								return variants;
							}
						}
					);
				}

				return variants;

			},

			renderTypographySubsetSelector : function ( element, name, control_atts ) {

				var control    = this,
				    input      = $( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .typography-hidden-value' ),
				    value      = JSON.parse( input.val() ),
				    fontFamily = value['font-family'],
				    subsets    = control.getTypographySubsets( fontFamily ),
				    selector   = control.selector + ' .subsets select',
				    data       = [],
				    validValue = value.subsets,
				    subsetSelector;

				if ( false !== subsets ) {

					$( control.selector + ' .subsets' ).show();
					_.each(
						subsets,
						function ( subset ) {
							if ( _.isObject( validValue ) ) {
								if ( - 1 === validValue.indexOf( subset.id ) ) {
									validValue = _.reject(
										validValue,
										function ( subValue ) {
											return subValue === subset.id;
										}
									);
								}
							}

							data.push(
								{
									id   : subset.id,
									text : subset.label
								}
							);
						}
					);

				} else {

					$( control.selector + ' .subsets' ).hide();

				}

				if ( $( selector ).hasClass( 'select2-hidden-accessible' ) ) {
					$( selector ).selectWoo( 'destroy' );
					$( selector ).empty();
				}

				// Instantiate selectWoo with the data.
				subsetSelector = $( selector ).selectWoo(
					{
						data  : data,
						width : '100%'
					}
				);

				subsetSelector.val( validValue ).trigger( 'change' );
				subsetSelector.on(
					'change',
					function () {
						control.saveTypographyValue( 'subsets', $( this ).val(), $( this ), name );
					}
				);

			},

			getTypographySubsets : function ( fontFamily ) {

				var control = this,
				    subsets = false,
				    fonts   = control.getTypographyFonts();

				_.each(
					fonts.google,
					function ( font ) {
						if ( font.family === fontFamily ) {
							subsets = font.subsets;

							return subsets;
						}
					}
				);

				return subsets;

			},

			saveTypographyFontSize : function ( element, name, control_atts ) {

				var control          = this,
				    input            = $( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .typography-hidden-value' ),
				    val              = JSON.parse( input.val() ),
				    control_name     = control_atts.name,
				    controlContainer = control.container.find( '#customize-control-' + control_name ),
				    newValue         = {
					    'font-size' : {}
				    };

				controlContainer.find( '.font-size .control-wrap' ).each(
					function () {
						var controlValue = $( this ).find( 'input' ).val();
						var device       = $( this ).find( 'input' ).data( 'device' );

						newValue['font-size'][device] = controlValue;
					}
				);

				// Extend/Update the `val` object to include `newValue`'s new data as an object.
				$.extend( val, newValue );

				$( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );

				name = $( element ).parents( '.customize-control' ).attr( 'id' );
				name = name.replace( 'customize-control-', '' );

				control.container.trigger(
					'elearning_settings_changed',
					[
						control,
						element,
						val,
						name
					]
				);

			},

			saveTypographyLineHeight : function ( element, name, control_atts ) {

				var control          = this,
				    input            = $( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .typography-hidden-value' ),
				    val              = JSON.parse( input.val() ),
				    control_name     = control_atts.name,
				    controlContainer = control.container.find( '#customize-control-' + control_name ),
				    newValue         = {
					    'line-height' : {}
				    };

				controlContainer.find( '.line-height .control-wrap' ).each(
					function () {
						var controlValue = $( this ).find( 'input' ).val();
						var device       = $( this ).find( 'input' ).data( 'device' );

						newValue['line-height'][device] = controlValue;
					}
				);

				// Extend/Update the `val` object to include `newValue`'s new data as an object.
				$.extend( val, newValue );

				$( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );

				name = $( element ).parents( '.customize-control' ).attr( 'id' );
				name = name.replace( 'customize-control-', '' );

				control.container.trigger(
					'elearning_settings_changed',
					[
						control,
						element,
						val,
						name
					]
				);

			},

			saveTypographyLetterSpacing : function ( element, name, control_atts ) {

				var control          = this,
				    input            = $( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .typography-hidden-value' ),
				    val              = JSON.parse( input.val() ),
				    control_name     = control_atts.name,
				    controlContainer = control.container.find( '#customize-control-' + control_name ),
				    newValue         = {
					    'letter-spacing' : {}
				    };

				controlContainer.find( '.letter-spacing .control-wrap' ).each(
					function () {
						var controlValue = $( this ).find( 'input' ).val();
						var device       = $( this ).find( 'input' ).data( 'device' );

						newValue['letter-spacing'][device] = controlValue;
					}
				);

				// Extend/Update the `val` object to include `newValue`'s new data as an object.
				$.extend( val, newValue );

				$( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );

				name = $( element ).parents( '.customize-control' ).attr( 'id' );
				name = name.replace( 'customize-control-', '' );

				control.container.trigger(
					'elearning_settings_changed',
					[
						control,
						element,
						val,
						name
					]
				);

			},

			saveTypographyValue : function ( property, value, element, name ) {

				var control = this,
				    input   = $( '#customize-control-' + control.id.replace( '[', '-' ).replace( ']', '' ) + ' .typography-hidden-value' ),
				    val     = JSON.parse( input.val() );

				val[property] = value;

				$( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );

				name = $( element ).parents( '.customize-control' ).attr( 'id' );
				name = name.replace( 'customize-control-', '' );

				control.container.trigger(
					'elearning_settings_changed',
					[
						control,
						element,
						val,
						name
					]
				);

			},

		} );

	}
)( jQuery );

/**
 * Background image control JS to handle the navigate customize option.
 *
 * File `navigate.js`.
 *
 * @package eLearning
 */
(
	function ( $ ) {

		$( window ).on( 'load', function () {

			$( '.tg-navigate a' ).on( 'click', function ( e ) {
				e.preventDefault();

				var targetContainer = $( this ).data( 'target' );
				var targetSection   = $( this ).data( 'section' );

				if ( targetSection ) {
					if ( 'panel' === targetContainer ) {
						wp.customize.panel( targetSection ).focus();
					} else {
						wp.customize.section( targetSection ).focus();
					}
				}
			} );

		} );
	}
)( jQuery );

/**
 * Radio image control JS to handle the toggle of radio images.
 *
 * File `radio-image.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor[ 'elearning-radio-image' ] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this;

		// Change the value.
		this.container.on( 'click', 'input', function () {
			control.setting.set( jQuery( this ).val() );
		} );

	}

} );

/**
 * Slider control JS to handle the range of the inputs.
 *
 * File `slider.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor['elearning-slider'] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this;

		// Update the text value.
		this.container.find( 'input[type=range]' ).on( 'input change', function () {
			var value        = jQuery( this ).val(),
				input_number = jQuery( this ).closest( '.slider-wrapper' ).find( '.elearning-range-value .value' );

			input_number.val( value );
			input_number.change();
		} );

		// Handle the reset button.
		this.container.find( '.elearning-slider-reset' ).click( function () {
			var wrapper       = jQuery( this ).closest( '.slider-wrapper' ),
			    input_range   = wrapper.find( 'input[type=range]' ),
			    input_number  = wrapper.find( '.elearning-range-value .value' ),
			    default_value = input_range.data( 'reset_value' );

			input_range.val( default_value );
			input_number.val( default_value );
			input_number.change();
		} );

		// Save changes.
		this.container.on( 'input change', 'input[type=number]', function () {
			var value = jQuery( this ).val();
			jQuery( this ).closest( '.slider-wrapper' ).find( 'input[type=range]' ).val( value );
			control.setting.set( value );
		} );

	}

} );

/**
 * Sortable control JS to handle the sortable feature of custom customize controls.
 *
 * File `sortable.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor['elearning-sortable'] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this;

		// Set the sortable container.
		control.sortableContainer = control.container.find( 'ul.sortable' ).first();

		control.unsortableContainer = control.container.find( 'ul.unsortable' ).first();

		control.unsortableContainer.find( 'li' ).each(
			function () {
				// Enable/disable options when we click on the eye of Thundera.
				jQuery( this ).find( 'i.visibility' ).click(
					function () {
						jQuery( this ).toggleClass( 'dashicons-visibility-faint' ).parents( 'li:eq(0)' ).toggleClass( 'invisible' );
					}
				);
			}
		).click(
			function () {
				// Update value on click.
				control.updateValue();
			}
		);

		// Init sortable.
		control.sortableContainer.sortable(
			{
				// Update value when we stop sorting.
				stop : function () {
					control.updateValue();
				}
			}
		).disableSelection().find( 'li' ).each(
			function () {
				// Enable/disable options when we click on the eye of Thundera.
				jQuery( this ).find( 'i.visibility' ).click(
					function () {
						jQuery( this ).toggleClass( 'dashicons-visibility-faint' ).parents( 'li:eq(0)' ).toggleClass( 'invisible' );
					}
				);
			}
		).click(
			function () {
				// Update value on click.
				control.updateValue();
			}
		);

	},

	updateValue : function () {

		'use strict';

		var control    = this,
			sortable = [],
			unsortable =[],
			newValue   = [];

		this.sortableContainer.find( 'li' ).each(
			function () {
				if ( ! jQuery( this ).is( '.invisible' ) ) {
					sortable.push( jQuery( this ).data( 'value' ) );
				}
			}
		);

		this.unsortableContainer.find( 'li' ).each(
			function (i) {
				if ( ! jQuery( this ).is( '.invisible' ) ) {
					unsortable.push( jQuery( this ).data( 'value' ) );
				}
			}
		);

		newValue = unsortable.concat(sortable);

		control.setting.set( newValue );

	}


} );


/**
 * Switch toggle control JS to handle the toggle of custom customize controls.
 *
 * File `toggle.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor['elearning-toggle'] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this,
		    value   = control.setting._value;

		// Save the value.
		this.container.on( 'change', 'input', function () {
			value = jQuery( this ).is( ':checked' ) ? true : false;
			input_number.val( value );
			input_number.change();
		} );

		// Handle the reset button.
		this.container.find( '.elearning-slider-reset' ).click( function () {
			var wrapper       = jQuery( this ).closest( '.slider-wrapper' ),
				input_range   = wrapper.find( 'input[type=range]' ),
				input_number  = wrapper.find( '.elearning-range-value .value' ),
				default_value = input_range.data( 'reset_value' );

			input_range.val( default_value );
			input_number.val( default_value );
			input_number.change();
		} );

		// Save changes.
		this.container.on( 'input change', 'input[type=number]', function () {
			var value = jQuery( this ).val();
			jQuery( this ).closest( '.slider-wrapper' ).find( 'input[type=range]' ).val( value );
			control.setting.set( value );
		} );

	}

} );

/**
 * Switch toggle control JS to handle the toggle of custom customize controls.
 *
 * File `toggle.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor['elearning-toggle'] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this,
		    value   = control.setting._value;

		// Save the value.
		this.container.on( 'change', 'input', function () {
			value = jQuery( this ).is( ':checked' ) ? true : false;

			control.setting.set( value );
		} );

	}

} );

/**
 * Typography control JS to handle the typography customize option.
 *
 * File `typography.js`.
 *
 * @package eLearning
 */
wp.customize.controlConstructor['elearning-typography'] = wp.customize.Control.extend( {

	ready : function () {

		'use strict';

		var control = this;

		// On customizer load, render the available font options.
		control.renderFontSelector();
		control.renderVariantSelector();
		control.renderSubsetSelector();

		// Font style setting.
		control.container.on( 'change', '.font-style select', function () {
			control.saveValue( 'font-style', jQuery( this ).val() );
		} );

		// Text transform setting.
		control.container.on( 'change', '.text-transform select', function () {
			control.saveValue( 'text-transform', jQuery( this ).val() );
		} );

		// Text decoration setting.
		control.container.on( 'change', '.text-decoration select', function () {
			control.saveValue( 'text-decoration', jQuery( this ).val() );
		} );

		// Font size setting.
		control.container.on( 'change keyup paste input', '.font-size input', function () {
			control.updateFontSize();
		} );

		// Line height setting.
		control.container.on( 'change keyup paste input', '.line-height input', function () {
			control.updateLineHeight();
		} );

		// Letter spacing setting.
		control.container.on( 'change keyup paste input', '.letter-spacing input', function () {
			control.updateLetterSpacing();
		} );

	},

	renderFontSelector : function () {

		var control       = this,
		    selector      = control.selector + ' .font-family select',
		    standardFonts = [],
		    googleFonts   = [],
		    customFonts   = [],
		    value         = control.setting._value,
		    fonts         = control.getFonts(),
		    fontSelect;

		// Format standard fonts as an array.
		if ( ! _.isUndefined( fonts.standard ) ) {
			_.each(
				fonts.standard,
				function ( font ) {
					standardFonts.push(
						{
							id   : font.family.replace( /&quot;/g, '&#39' ),
							text : font.label
						}
					);
				}
			);
		}

		// Format Google fonts as an array.
		if ( ! _.isUndefined( fonts.google ) ) {
			_.each(
				fonts.google,
				function ( font ) {
					googleFonts.push(
						{
							id   : font.family,
							text : font.label
						}
					);
				}
			);
		}

		// Combine fonts and build the final data.
		data = [
			{
				text     : fonts.standardfontslabel,
				children : standardFonts
			},
			{
				text     : fonts.googlefontslabel,
				children : googleFonts
			}
		];

		// Format custom fonts as an array.
		if ( ! _.isUndefined( fonts.custom ) ) {
			_.each(
				fonts.custom,
				function ( font ) {
					customFonts.push(
						{
							id   : font.family,
							text : font.label
						}
					);
				}
			);

			// Merge on `data` array.
			data.push(
				{
					text     : fonts.customfontslabel,
					children : customFonts
				}
			);
		}

		// Instantiate selectWoo with the data.
		fontSelect = jQuery( selector ).selectWoo(
			{
				data  : data,
				width : '100%'
			}
		);

		// Set the initial value.
		if ( value['font-family'] ) {
			fontSelect.val( value['font-family'].replace( /'/g, '"' ) ).trigger( 'change' );
		}

		// When the font option value changes.
		fontSelect.on(
			'change',
			function () {

				// Set the value.
				control.saveValue( 'font-family', jQuery( this ).val() );

				// Render new list of selected font options.
				control.renderVariantSelector();
				control.renderSubsetSelector();

			}
		);

	},

	getFonts : function () {

		var control = this;

		if ( ! _.isUndefined( eLearningCustomizerControlTypography ) ) {
			return eLearningCustomizerControlTypography;
		}

		return {
			google   : [],
			standard : []
		};

	},

	renderVariantSelector : function () {

		var control    = this,
		    value      = control.setting._value,
		    fontFamily = value['font-family'],
		    variants   = control.getVariants( fontFamily ),
		    selector   = control.selector + ' .font-weight select',
		    data       = [],
		    isValid    = false,
		    variantSelector;

		if ( false !== variants ) {

			jQuery( control.selector + ' .font-weight' ).show();
			_.each(
				variants,
				function ( variant ) {
					if ( value['font-weight'] === variant.id ) {
						isValid = true;
					}

					data.push(
						{
							id   : variant.id,
							text : variant.label
						}
					);
				}
			);

			if ( ! isValid ) {
				value['font-weight'] = 'regular';
			}

			if ( jQuery( selector ).hasClass( 'select2-hidden-accessible' ) ) {
				jQuery( selector ).selectWoo( 'destroy' );
				jQuery( selector ).empty();
			}

			// Instantiate selectWoo with the data.
			variantSelector = jQuery( selector ).selectWoo(
				{
					data  : data,
					width : '100%'
				}
			);

			variantSelector.val( value['font-weight'] ).trigger( 'change' );
			variantSelector.on(
				'change',
				function () {
					control.saveValue( 'font-weight', jQuery( this ).val() );
				}
			);

		} else {

			jQuery( control.selector + ' .font-weight' ).hide();

		}

	},

	getVariants : function ( fontFamily ) {

		var control = this,
		    fonts   = control.getFonts();

		var variants = false;
		_.each(
			fonts.standard,
			function ( font ) {
				if ( fontFamily && font.family === fontFamily.replace( /'/g, '"' ) ) {
					variants = font.variants;

					return variants;
				}
			}
		);

		_.each(
			fonts.google,
			function ( font ) {
				if ( font.family === fontFamily ) {
					variants = font.variants;

					return variants;
				}
			}
		);

		// For custom fonts.
		if ( ! _.isUndefined( fonts.custom ) ) {
			_.each(
				fonts.custom,
				function ( font ) {
					if ( font.custom === fontFamily ) {
						variants = font.variants;

						return variants;
					}
				}
			);
		}

		return variants;

	},

	renderSubsetSelector : function () {

		var control    = this,
		    value      = control.setting._value,
		    fontFamily = value['font-family'],
		    subsets    = control.getSubsets( fontFamily ),
		    selector   = control.selector + ' .subsets select',
		    data       = [],
		    validValue = value.subsets,
		    subsetSelector;

		if ( false !== subsets ) {

			jQuery( control.selector + ' .subsets' ).show();
			_.each(
				subsets,
				function ( subset ) {
					if ( _.isObject( validValue ) ) {
						if ( - 1 === validValue.indexOf( subset.id ) ) {
							validValue = _.reject(
								validValue,
								function ( subValue ) {
									return subValue === subset.id;
								}
							);
						}
					}

					data.push(
						{
							id   : subset.id,
							text : subset.label
						}
					);
				}
			);

		} else {

			jQuery( control.selector + ' .subsets' ).hide();

		}

		if ( jQuery( selector ).hasClass( 'select2-hidden-accessible' ) ) {
			jQuery( selector ).selectWoo( 'destroy' );
			jQuery( selector ).empty();
		}

		// Instantiate selectWoo with the data.
		subsetSelector = jQuery( selector ).selectWoo(
			{
				data  : data,
				width : '100%'
			}
		);

		subsetSelector.val( validValue ).trigger( 'change' );
		subsetSelector.on(
			'change',
			function () {
				control.saveValue( 'subsets', jQuery( this ).val() );
			}
		);

	},

	getSubsets : function ( fontFamily ) {

		var control = this,
		    subsets = false,
		    fonts   = control.getFonts();

		_.each(
			fonts.google,
			function ( font ) {
				if ( font.family === fontFamily ) {
					subsets = font.subsets;

					return subsets;
				}
			}
		);

		return subsets;

	},

	saveValue : function ( property, value ) {

		var control = this,
		    input   = control.container.find( '.typography-hidden-value' ),
		    val     = control.setting._value;

		val[property] = value;

		jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
		control.setting.set( val );

	},

	updateFontSize : function () {

		var control  = this,
		    val      = control.setting._value,
		    input    = control.container.find( '.typography-hidden-value' ),
		    newValue = {
			    'font-size' : {}
		    };

		control.container.find( '.font-size .control-wrap' ).each(
			function () {
				var controlValue = jQuery( this ).find( 'input' ).val();
				var device       = jQuery( this ).find( 'input' ).data( 'device' );

				newValue['font-size'][device] = controlValue;
			}
		);

		// Extend/Update the `val` object to include `newValue`'s new data as an object.
		jQuery.extend( val, newValue );

		jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
		control.setting.set( val );

	},

	updateLineHeight : function () {

		var control  = this,
		    val      = control.setting._value,
		    input    = control.container.find( '.typography-hidden-value' ),
		    newValue = {
			    'line-height' : {}
		    };

		control.container.find( '.line-height .control-wrap' ).each(
			function () {
				var controlValue = jQuery( this ).find( 'input' ).val();
				var device       = jQuery( this ).find( 'input' ).data( 'device' );

				newValue['line-height'][device] = controlValue;
			}
		);

		// Extend/Update the `val` object to include `newValue`'s new data as an object.
		jQuery.extend( val, newValue );

		jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
		control.setting.set( val );

	},

	updateLetterSpacing : function () {

		var control  = this,
		    val      = control.setting._value,
		    input    = control.container.find( '.typography-hidden-value' ),
		    newValue = {
			    'letter-spacing' : {}
		    };

		control.container.find( '.letter-spacing .control-wrap' ).each(
			function () {
				var controlValue = jQuery( this ).find( 'input' ).val();
				var device       = jQuery( this ).find( 'input' ).data( 'device' );

				newValue['letter-spacing'][device] = controlValue;
			}
		);

		// Extend/Update the `val` object to include `newValue`'s new data as an object.
		jQuery.extend( val, newValue );

		jQuery( input ).attr( 'value', JSON.stringify( val ) ).trigger( 'change' );
		control.setting.set( val );

	}

} );
