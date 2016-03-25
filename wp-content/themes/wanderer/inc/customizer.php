<?php
/**
 * Get Option
 *
 * Return given option value or return default
 *
 * @package Wanderer
 * @since 3.0.0
 */

function get_wanderer_option( $option_name, $default = false ) {

	$wanderer_options = get_theme_mod( 'wanderer_options' );

	if ( isset( $wanderer_options[$option_name] ) )
		$option = $wanderer_options[$option_name];
	
	if ( ! empty( $option ) )
		return $option;
	
	return $default;
}

/**
 * Sanitize Text Input
 *
 * @since 1.0
 */
function input_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/**
 * Sanitize Dropdown
 *
 * @since 1.0
 */
function dropdown_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @since 3.0.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 * @return void
 */
function wanderer_customize_register( $wp_customize ) {

	if ( $wp_customize->is_preview() && ! is_admin() )
		add_action( 'wp_footer', 'wanderer_customize_preview', 21 );

	/**
	 * Site Title & Description Section
	 */

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	/**
	 * Create Wanderer Panel
	 */

	$wp_customize->add_panel( 'wanderer_customizer', array(
	    'priority'       => 10,
	    'capability'     => 'edit_theme_options',
	    'theme_supports' => '',
	    'title'          => 'Wanderer Customizer Options',
	    'description'    => 'Theme Options for Wanderer',
	) );

	
	/**
	 * Site Colors
	 */

	$wp_customize->add_section( 'color_section',
		array(
			'title'    => __( 'Colors', 'wanderer' ),
			'priority' => 100,
			'panel'  => 'wanderer_customizer'
		)	
	);

	$wp_customize->add_setting(
	    'wanderer_options[primary_color]',
	    array(
	        'default'     => '#666666',
	        'sanitize_callback' => 'input_sanitize_text'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'entry_title_color',
	        array(
	            'label'      => __( 'Primary Color', 'wanderer' ),
	            'section'    => 'color_section',
	            'settings'   => 'wanderer_options[primary_color]'
	        )
	    )
	);
	
	$wp_customize->add_setting(
	    'wanderer_options[secondary_color]',
	    array(
	        'default'     => '#82c9c7',
	        'sanitize_callback' => 'input_sanitize_text'
	    )
	);
	$wp_customize->add_control(
	    new WP_Customize_Color_Control(
	        $wp_customize,
	        'entry_subtitle_color',
	        array(
	            'label'      => __( 'Secondary Color', 'wanderer' ),
	            'section'    => 'color_section',
	            'settings'   => 'wanderer_options[secondary_color]'
	        )
	    )
	);
	
	/**
	 * Logos Section
	 */
	$wp_customize->add_section( 'logo_section',
		array(
			'title'    => __( 'Logos', 'wanderer' ),
			'priority' => 100,
			'panel'  => 'wanderer_customizer'
		)	
	);

	$wp_customize->add_setting( 'wanderer_options[logo]', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
        	$wp_customize,
			'logo',
			array(
				'section' => 'logo_section',
				'label'   => __( 'Custom Logo', 'wanderer' ),
	            'settings'   => 'wanderer_options[logo]',
				'priority' 	 => 100
			)
		)
	);
	
	$wp_customize->add_setting( 'wanderer_options[favicon]', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
        	$wp_customize,
			'favicon',
			array(
				'section' => 'logo_section',
				'label'   => __( 'Custom Favicon', 'wanderer' ),
	            'settings'   => 'wanderer_options[favicon]',
				'priority' 	 => 150
			)
		)
	);

	/**
	 * Featured user
	 */
	$wp_customize->add_section( 'user_section',
		array(
			'title'    => __( 'User', 'wanderer' ),
			'priority' => 100,
			'sanitize_callback' => 'dropdown_sanitize_integer',
			'panel'  => 'wanderer_customizer'
		)	
	);

	$wp_customize->add_setting('wanderer_options[user]', array(
	    'default'           => '',
	    'sanitize_callback' => 'dropdown_sanitize_integer'
	) );
	$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'featured_user',
	        array(
	        	'section' => 'user_section',
	            'label'    => 'User',
	            'settings' => 'wanderer_options[user]',
	            'priority' 	 => 250,
	            'type' => 'select',
	            'choices' => wanderer_get_user_list(),
	        )
	    )
	);

	/**
	 * Featured Category
	 */
	$wp_customize->add_section( 'featured_section',
		array(
			'title'    => __( 'Featured Category', 'wanderer' ),
			'priority' => 100,
			'sanitize_callback' => 'dropdown_sanitize_integer',
			'panel'  => 'wanderer_customizer'
		)	
	);

	$wp_customize->add_setting('wanderer_options[featured]', array(
	    'default'           => '',
	    'sanitize_callback' => 'dropdown_sanitize_integer',
	) );
	$wp_customize->add_control(
	    new WP_Customize_Control(
	        $wp_customize,
	        'featured',
	        array(
	        	'section' => 'featured_section',
	            'label'    => 'Featured Category',
	            'settings' => 'wanderer_options[featured]',
	            'priority' 	 => 250,
	            'type' => 'select',
	            'choices' => wanderer_get_category_list(array('show_count' => 0)),
	        )
	    )
	);

	$wp_customize->add_setting( 'wanderer_options[hide_featured]', array(
			'default'           => '',
			'sanitize_callback' => 'input_sanitize_text'
	) );
	$wp_customize->add_control(
			new WP_Customize_Control(
					$wp_customize,
					'hide_featured',
					array(
							'section' => 'featured_section',
							'type' => 'checkbox',
							'label'   => __( 'Check if you want to hide the featured category from the post index on the home page.', 'wanderer' ),
							'settings'   => 'wanderer_options[hide_featured]',
							'priority' 	 => 251,
							'sanitize_callback' => 'input_sanitize_text'

					)
			)
	);

	/**
	 * Hero Opacity
	 */
	$wp_customize->add_section( 'header_section',
		array(
			'title'    => __( 'Featured Image Opacity', 'wanderer' ),
			'description' => __( 'These settings will affect all headers on the homepage and single post pages', 'wanderer'),
			'priority' => 100,
			'panel'  => 'wanderer_customizer'
		)	
	);

	$wp_customize->add_setting( 'wanderer_options[opacity_color_setting]',
		array(
		        'default'     => '#000000',
		        'sanitize_callback' => 'input_sanitize_text'
		    ) 
		);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
        	$wp_customize,
			'opacity_color_setting',
			array(
				'section' => 'header_section',
				'label'   => __( 'Color of Overlay Opacity', 'wanderer' ),
	            'settings'   => 'wanderer_options[opacity_color_setting]',
				'priority' 	 => 200,
				'sanitize_callback' => 'input_sanitize_text',
			)
		)
	);

	$wp_customize->add_setting( 'wanderer_options[opacity_setting]', array(
	    'default'           => '',
	    'sanitize_callback' => 'input_sanitize_text'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
        	$wp_customize,
			'opacity_setting',
			array(
				'section' => 'header_section',
				'type' => 'range',
				'label'   => __( 'Opacity Setting (increments 0.1 to 1)', 'wanderer' ),
	            'settings'   => 'wanderer_options[opacity_setting]',
				'priority' 	 => 200,
				'sanitize_callback' => 'input_sanitize_text',
				'input_attrs' => array(
			        'min'   => 0,
			        'max'   => 1,
			        'step'  => 0.1
			    ),
			)
		)
	);

	/**
	 * Social Info
	 */

	$wp_customize->add_section( 'social_section',
		array(
			'title'    => __( 'Social Media', 'wanderer' ),
			'priority' => 200,
			'description' => __( 'Profile image should be around 300 x 300 pixels.', 'wanderer'),
			'panel'  => 'wanderer_customizer'
		)	
	);

	$wp_customize->add_setting( 'wanderer_options[facebook]', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
        	$wp_customize,
			'facebook',
			array(
				'section' => 'social_section',
				'label'   => __( 'Facebook', 'wanderer' ),
	            'settings'   => 'wanderer_options[facebook]',
				'priority' 	 => 200,
				'sanitize_callback' => 'input_sanitize_text',
			)
		)
	);

	$wp_customize->add_setting( 'wanderer_options[twitter]', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
        	$wp_customize,
			'twitter',
			array(
				'section' => 'social_section',
				'label'   => __( 'Twitter', 'wanderer' ),
	            'settings'   => 'wanderer_options[twitter]',
				'priority' 	 => 200,
				'sanitize_callback' => 'input_sanitize_text',
			)
		)
	);

	$wp_customize->add_setting( 'wanderer_options[linkedin]', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
        	$wp_customize,
			'linkedin',
			array(
				'section' => 'social_section',
				'label'   => __( 'Linkedin', 'wanderer' ),
	            'settings'   => 'wanderer_options[linkedin]',
				'priority' 	 => 200,
				'sanitize_callback' => 'input_sanitize_text',
			)
		)
	);

	$wp_customize->add_setting( 'wanderer_options[pinterest]', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
        	$wp_customize,
			'pinterest',
			array(
				'section' => 'social_section',
				'label'   => __( 'Pinterest', 'wanderer' ),
	            'settings'   => 'wanderer_options[pinterest]',
				'priority' 	 => 200,
				'sanitize_callback' => 'input_sanitize_text',
			)
		)
	);

	$wp_customize->add_setting( 'wanderer_options[instagram]', array(
	    'default'           => '',
	    'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
        	$wp_customize,
			'instagram',
			array(
				'section' => 'social_section',
				'label'   => __( 'Instagram', 'wanderer' ),
	            'settings'   => 'wanderer_options[instagram]',
				'priority' 	 => 200,
				'sanitize_callback' => 'input_sanitize_text',
			)
		)
	);

	/**
	 * Footer Section
	 */

	$wp_customize->add_section( 'footer_section',
		array(
			'title'    => __( 'Footer', 'wanderer' ),
			'priority' => 200,
			'panel'  => 'wanderer_customizer'
		)	
	);

	$wp_customize->add_setting( 'wanderer_options[copyright]', array(
	    'default'           => '',
	    'sanitize_callback' => 'input_sanitize_text'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
        	$wp_customize,
			'copyright',
			array(
				'section' => 'footer_section',
				'type' => 'checkbox',
				'label'   => __( 'Show copyright text', 'wanderer' ),
	            'settings'   => 'wanderer_options[copyright]',
				'priority' 	 => 200,
				'sanitize_callback' => 'input_sanitize_text'

			)
		)
	);

	$wp_customize->add_setting( 'wanderer_options[footer_text]', array(
	    'default'           => '',
	    'sanitize_callback' => 'input_sanitize_text'
	) );
	$wp_customize->add_control(
		new WP_Customize_Control(
        	$wp_customize,
			'footer_text',
			array(
				'section' => 'footer_section',
				'type' => 'textarea',
				'label'   => __( 'Add Footer Text', 'wanderer' ),
	            'settings'   => 'wanderer_options[footer_text]',
				'priority' 	 => 200,
				'sanitize_callback' => 'input_sanitize_text'

			)
		)
	);
}
add_action( 'customize_register', 'wanderer_customize_register' );


/**
 * Customize Preview
 *
 * Allows transported customizer options to be displayed without delay.
 *
 * @since 3.0.0
 */
function wanderer_customize_preview() { ?>

<script type="text/javascript">
( function( $ ) {
	/* Site title and description. */
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
} )( jQuery );
</script>

<?php }


