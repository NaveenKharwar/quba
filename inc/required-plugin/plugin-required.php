<?php
/**
 * The required plugins.
 *
 */

require_once get_template_directory() . '/inc/required-plugin/class-plugin-activation.php';

add_action( 'quba_register', 'quba_plugin_register_required_plugins' );

function quba_plugin_register_required_plugins() {
	$plugins = array(

		array(
			'name'         => 'Quba Engine', 
			'slug'         => 'quba-engine',
			'required'     => true,
            'force_activation'   => false,
			'force_deactivation' => false,
        ),

		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),

	);

	$config = array(
		'id'           => 'quba',                 
		'default_path' => '',                      
		'menu'         => 'quba-install-plugins', 
		'has_notices'  => true,                    
		'dismissable'  => true,                    
		'dismiss_msg'  => '',                      
		'is_automatic' => false,                   
		'message'      => '',                      

		
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'quba' ),
			'menu_title'                      => __( 'Install Plugins', 'quba' ),
			'installing'                      => __( 'Installing Plugin: %s', 'quba' ),
			'updating'                        => __( 'Updating Plugin: %s', 'quba' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'quba' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'quba'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'quba'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'quba'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'quba'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'quba'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'quba'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'quba'
			),
			'update_link' 					  => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'quba'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'quba'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'quba' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'quba' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'quba' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'quba' ),
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'quba' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'quba' ),
			'dismiss'                         => __( 'Dismiss this notice', 'quba' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'quba' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'quba' ),
		),
	);

	quba( $plugins, $config );
}
