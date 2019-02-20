<?php
/**
 * Adding Custom Customizers.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/*************************
 * Creating Panel.     *
 *************************/

function quba_panel($wp_customize)
{
    $wp_customize->add_panel('quba_panel', array(
        'title' => esc_html('Quba', 'quba'),
        'capability' => 'edit_theme_options',
        'description' => esc_html('Here you can customize your website.', 'quba'),
        'priority' => 13,
    ));
}

add_action('customize_register', 'quba_panel');

/***********************************
 * Adding Controls and Settings.  *
 ***********************************/

function qubatheme_customize_register($wp_customize)
{

    // Theme Intro section.
    $wp_customize->add_section('quba_intro', array(
        'title'       => esc_html('Intro Section Settings', 'quba'),
        'capability'  => 'edit_theme_options',
        'priority'    => 10,
        'panel'     => 'quba_panel',
    ));

    $wp_customize->add_setting('intro_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'intro_toggle_switch', array(
        'label' => esc_html('Toggle Switch'),
        'description' => esc_html('Hide or show section', 'quba'),
        'priority' => 10,
        'section' => 'quba_intro'
    )));

    $wp_customize->selective_refresh->add_partial('intro_toggle_switch', array(
        'selector' => '#intro .row', 
    ));

    $wp_customize->add_setting('intro_primary_text', array(
        'default' => 'Quba WordPress Theme',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_kses_post'
    ));

    $wp_customize->add_control(new TinyMCE_Custom_control($wp_customize, 'intro_primary_text', array(
        'label' => esc_html('Primary Text'),
        'description' => esc_html('Input Field For Primary Text'),
        'priority' => 20,
        'section' => 'quba_intro',
        'input_attrs' => array(
            'toolbar1' => 'bold italic',
        )
    )));

    $wp_customize->add_setting('intro_secondary_text', array(
        'default' => 'Quba is a WordPress Theme designed with design attention to details, flexibility and performance. You can easily customize every bit of the theme.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('intro_secondary_text', array(
        'label' => esc_html('Secondary Text'),
        'description' => esc_html('Input Field For Secondary Text'),
        'section' => 'quba_intro',
        'priority' => 30,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Secondary Text'),
        ),
    ));

    $wp_customize->add_setting('button_one_text', array(
        'default' => 'Contact',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('button_one_text', array(
        'label' => esc_html('Button One'),
        'description' => esc_html('Input Text For Button One'),
        'section' => 'quba_intro',
        'priority' => 40,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter text.'),
        ),
    ));

    $wp_customize->add_setting('button_one_link', array(
        'default' => 'https://',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('button_one_link', array(
        'label' => esc_html('Button One Link'),
        'description' => esc_html('Input Link For Button One'),
        'section' => 'quba_intro',
        'priority' => 50,
        'type' => 'url',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter url.'),
        ),
    ));

    $wp_customize->add_setting('button_two_text', array(
        'default' => 'Blog',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('button_two_text', array(
        'label' => esc_html('Button Two'),
        'description' => esc_html('Input Text For Button Two'),
        'section' => 'quba_intro',
        'priority' => 60,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter text.'),
        ),
    ));

    $wp_customize->add_setting('button_two_link', array(
        'default' => 'https://',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('button_two_link', array(
        'label' => esc_html('Button Two Link'),
        'description' => esc_html('Input Link For Button Two'),
        'section' => 'quba_intro',
        'priority' => 70,
        'type' => 'url',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter url.'),
        ),
    ));

    $wp_customize->add_setting('image_intro', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'image_intro', array(
        'label' => esc_html('Intro Image'),
        'description' => esc_html('Upload Image'),
        'priority' => 80,
        'section' => 'quba_intro',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    // Theme About section.
    $wp_customize->add_section('quba_about', array(
        'title'       => esc_html('About Section Settings', 'quba'),
        'capability'  => 'edit_theme_options',
        'priority'    => 20,
        'panel'     => 'quba_panel',
    ));

    $wp_customize->add_setting('about_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'about_toggle_switch', array(
        'label' => esc_html('Toggle Switch'),
        'description' => esc_html('Hide or show section', 'quba'),
        'priority' => 10,
        'section' => 'quba_about'
    )));

    $wp_customize->add_setting('image_about', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'image_about', array(
        'label' => esc_html('About Image'),
        'description' => esc_html('Upload Image'),
        'priority' => 20,
        'section' => 'quba_about',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    $wp_customize->selective_refresh->add_partial('image_about', array(
        'selector' => '#about .about-content', 
    ));

    $wp_customize->add_setting('about_heading', array(
        'default' => 'About Developer',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('about_heading', array(
        'label' => esc_html('About Heading'),
        'description' => esc_html('Input About Heading.'),
        'section' => 'quba_about',
        'priority' => 30,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter heading.'),
        ),
    ));

    $wp_customize->add_setting('about_text', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_kses_post'
    ));

    $wp_customize->add_control(new TinyMCE_Custom_control($wp_customize, 'about_text', array(
        'label' => esc_html('About Text'),
        'description' => esc_html('Input Field For About Text'),
        'priority' => 40,
        'section' => 'quba_about',
        'input_attrs' => array(
            'toolbar1' => 'bold italic link',
        )
    )));

    // Theme Services section.
    $wp_customize->add_section('quba_services', array(
        'title'       => esc_html('Service Section Settings', 'quba'),
        'capability'  => 'edit_theme_options',
        'priority'    => 30,
        'panel'     => 'quba_panel',
    ));

    $wp_customize->add_setting('services_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'services_toggle_switch', array(
        'label' => esc_html('Toggle Switch'),
        'description' => esc_html('Hide or show section', 'quba'),
        'priority' => 10,
        'section' => 'quba_services'
    )));

    $wp_customize->selective_refresh->add_partial('services_toggle_switch', array(
        'selector' => '.services', 
    ));

    $wp_customize->add_setting('services_heading', array(
        'default' => 'What We Provide',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('services_heading', array(
        'label' => esc_html('Section Heading'),
        'description' => esc_html('Input Heading.'),
        'section' => 'quba_services',
        'priority' => 20,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter heading.'),
        ),
    ));

    $wp_customize->add_setting('service_subheading', array(
        'default' => 'Nullam blandit gravida viverra. Etiam turpis erat, sagittis sit amet felis non, porta porta justo. Integer ornare nibh nulla, id pulvinar metus cursus semper.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('service_subheading', array(
        'label' => esc_html('Secondary Text'),
        'description' => esc_html('Section Sub Heading'),
        'section' => 'quba_services',
        'priority' => 30,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Secondary Text'),
        ),
    ));

    // Service One Setting
    $wp_customize->add_setting('servicesOne_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'servicesOne_toggle_switch', array(
        'label' => esc_html('Service One'),
        'description' => esc_html('Hide or show service', 'quba'),
        'priority' => 40,
        'section' => 'quba_services'
    )));

    $wp_customize->add_setting('serviceOne_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'serviceOne_image', array(
        'label' => esc_html('Service Image/Thumnail'),
        'description' => esc_html('Upload Image'),
        'priority' => 50,
        'section' => 'quba_services',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    $wp_customize->add_setting('servicesOne_heading', array(
        'default' => 'Content Marketing',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('servicesOne_heading', array(
        'label' => esc_html('Service Name'),
        'description' => esc_html('Input Name.'),
        'section' => 'quba_services',
        'priority' => 60,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter name.'),
        ),
    ));

    $wp_customize->add_setting('serviceOne_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('serviceOne_description', array(
        'label' => esc_html('Service Description'),
        'description' => esc_html('Description'),
        'section' => 'quba_services',
        'priority' => 70,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
        ),
    ));

    // Service Two Setting
    $wp_customize->add_setting('servicesTwo_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'servicesTwo_toggle_switch', array(
        'label' => esc_html('Service Two'),
        'description' => esc_html('Hide or show service', 'quba'),
        'priority' => 80,
        'section' => 'quba_services'
    )));

    $wp_customize->add_setting('serviceTwo_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'serviceTwo_image', array(
        'label' => esc_html('Service Image/Thumnail'),
        'description' => esc_html('Upload Image'),
        'priority' => 90,
        'section' => 'quba_services',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    $wp_customize->add_setting('servicesTwo_heading', array(
        'default' => 'Email Marketing',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('servicesTwo_heading', array(
        'label' => esc_html('Service Name'),
        'description' => esc_html('Input Name.'),
        'section' => 'quba_services',
        'priority' => 100,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter name.'),
        ),
    ));

    $wp_customize->add_setting('serviceTwo_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('serviceTwo_description', array(
        'label' => esc_html('Service Description'),
        'description' => esc_html('Description'),
        'section' => 'quba_services',
        'priority' => 110,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
        ),
    ));

    // Service Three Setting
    $wp_customize->add_setting('servicesThree_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'servicesThree_toggle_switch', array(
        'label' => esc_html('Service Three'),
        'description' => esc_html('Hide or show service', 'quba'),
        'priority' => 120,
        'section' => 'quba_services'
    )));

    $wp_customize->add_setting('serviceThree_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'serviceThree_image', array(
        'label' => esc_html('Service Image/Thumnail'),
        'description' => esc_html('Upload Image'),
        'priority' => 130,
        'section' => 'quba_services',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    $wp_customize->add_setting('servicesThree_heading', array(
        'default' => 'Market Analysis',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('servicesThree_heading', array(
        'label' => esc_html('Service Name'),
        'description' => esc_html('Input Name.'),
        'section' => 'quba_services',
        'priority' => 140,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter name.'),
        ),
    ));

    $wp_customize->add_setting('serviceThree_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('serviceThree_description', array(
        'label' => esc_html('Service Description'),
        'description' => esc_html('Description'),
        'section' => 'quba_services',
        'priority' => 150,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
        ),
    ));

    // Service Four Setting
    $wp_customize->add_setting('servicesFour_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'servicesFour_toggle_switch', array(
        'label' => esc_html('Service Four'),
        'description' => esc_html('Hide or show service', 'quba'),
        'priority' => 160,
        'section' => 'quba_services'
    )));

    $wp_customize->add_setting('serviceFour_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'serviceFour_image', array(
        'label' => esc_html('Service Image/Thumnail'),
        'description' => esc_html('Upload Image'),
        'priority' => 170,
        'section' => 'quba_services',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    $wp_customize->add_setting('servicesFour_heading', array(
        'default' => 'Web Development',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('servicesFour_heading', array(
        'label' => esc_html('Service Name'),
        'description' => esc_html('Input Name.'),
        'section' => 'quba_services',
        'priority' => 180,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter name.'),
        ),
    ));

    $wp_customize->add_setting('serviceFour_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('serviceFour_description', array(
        'label' => esc_html('Service Description'),
        'description' => esc_html('Description'),
        'section' => 'quba_services',
        'priority' => 190,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
        ),
    ));

    // Service Five Setting
    $wp_customize->add_setting('servicesFive_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'servicesFive_toggle_switch', array(
        'label' => esc_html('Service Five'),
        'description' => esc_html('Hide or show service', 'quba'),
        'priority' => 200,
        'section' => 'quba_services'
    )));

    $wp_customize->add_setting('serviceFive_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'serviceFive_image', array(
        'label' => esc_html('Service Image/Thumnail'),
        'description' => esc_html('Upload Image'),
        'priority' => 210,
        'section' => 'quba_services',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    $wp_customize->add_setting('servicesFive_heading', array(
        'default' => 'Keyword Research',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('servicesFive_heading', array(
        'label' => esc_html('Service Name'),
        'description' => esc_html('Input Name.'),
        'section' => 'quba_services',
        'priority' => 220,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter name.'),
        ),
    ));

    $wp_customize->add_setting('serviceFive_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('serviceFive_description', array(
        'label' => esc_html('Service Description'),
        'description' => esc_html('Description'),
        'section' => 'quba_services',
        'priority' => 230,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
        ),
    ));

    // Service Six Setting
    $wp_customize->add_setting('servicesSix_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'servicesSix_toggle_switch', array(
        'label' => esc_html('Service Six'),
        'description' => esc_html('Hide or show service', 'quba'),
        'priority' => 240,
        'section' => 'quba_services'
    )));

    $wp_customize->add_setting('serviceSix_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'serviceSix_image', array(
        'label' => esc_html('Service Image/Thumnail'),
        'description' => esc_html('Upload Image'),
        'priority' => 250,
        'section' => 'quba_services',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    $wp_customize->add_setting('servicesSix_heading', array(
        'default' => 'Optimization',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('servicesSix_heading', array(
        'label' => esc_html('Service Name'),
        'description' => esc_html('Input Name.'),
        'section' => 'quba_services',
        'priority' => 260,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter name.'),
        ),
    ));

    $wp_customize->add_setting('serviceSix_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('serviceSix_description', array(
        'label' => esc_html('Service Description'),
        'description' => esc_html('Description'),
        'section' => 'quba_services',
        'priority' => 270,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
        ),
    ));

    // Service Seven Setting
    $wp_customize->add_setting('servicesSeven_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'servicesSeven_toggle_switch', array(
        'label' => esc_html('Service Seven'),
        'description' => esc_html('Hide or show service', 'quba'),
        'priority' => 280,
        'section' => 'quba_services'
    )));

    $wp_customize->add_setting('serviceSeven_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'serviceSeven_image', array(
        'label' => esc_html('Service Image/Thumnail'),
        'description' => esc_html('Upload Image'),
        'priority' => 290,
        'section' => 'quba_services',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    $wp_customize->add_setting('servicesSeven_heading', array(
        'default' => 'Social Media Optimization',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('servicesSeven_heading', array(
        'label' => esc_html('Service Name'),
        'description' => esc_html('Input Name.'),
        'section' => 'quba_services',
        'priority' => 300,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter name.'),
        ),
    ));

    $wp_customize->add_setting('serviceSeven_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('serviceSeven_description', array(
        'label' => esc_html('Service Description'),
        'description' => esc_html('Description'),
        'section' => 'quba_services',
        'priority' => 310,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
        ),
    ));

    // Service Eight Setting
    $wp_customize->add_setting('servicesEight_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'servicesEight_toggle_switch', array(
        'label' => esc_html('Service Eight'),
        'description' => esc_html('Hide or show service', 'quba'),
        'priority' => 320,
        'section' => 'quba_services'
    )));

    $wp_customize->add_setting('serviceEight_image', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'serviceEight_image', array(
        'label' => esc_html('Service Image/Thumnail'),
        'description' => esc_html('Upload Image'),
        'priority' => 330,
        'section' => 'quba_services',
        'mime_type' => 'image',
        'button_labels' => array(
            'select' => esc_html('Select Image'),
            'change' => esc_html('Change Image'),
            'default' => esc_html('Default'),
            'remove' => esc_html('Remove'),
            'placeholder' => esc_html('No Image Selected'),
            'frame_title' => esc_html('Select Image'),
            'frame_button' => esc_html('Choose Image'),
        )
    )));

    $wp_customize->add_setting('servicesEight_heading', array(
        'default' => 'CMS Development',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('servicesEight_heading', array(
        'label' => esc_html('Service Name'),
        'description' => esc_html('Input Name.'),
        'section' => 'quba_services',
        'priority' => 340,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter name.'),
        ),
    ));

    $wp_customize->add_setting('serviceEight_description', array(
        'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('serviceEight_description', array(
        'label' => esc_html('Service Description'),
        'description' => esc_html('Description'),
        'section' => 'quba_services',
        'priority' => 350,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
        ),
    ));

    // Theme Portfolio section.
    $wp_customize->add_section('quba_portfolio', array(
        'title'       => esc_html('Portfolio Section Settings', 'quba'),
        'capability'  => 'edit_theme_options',
        'priority'    => 40,
        'panel'     => 'quba_panel',
    ));

    $wp_customize->add_setting('portfolio_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'portfolio_toggle_switch', array(
        'label' => esc_html('Toggle Switch'),
        'description' => esc_html('Hide or show section', 'quba'),
        'priority' => 10,
        'section' => 'quba_portfolio'
    )));

    $wp_customize->selective_refresh->add_partial('portfolio_toggle_switch', array(
        'selector' => '#portfolio .container', 
    ));

    $wp_customize->add_setting('portfolio_heading', array(
        'default' => 'Portfolio',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('portfolio_heading', array(
        'label' => esc_html('Section Heading'),
        'description' => esc_html('Input Heading.'),
        'section' => 'quba_portfolio',
        'priority' => 20,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter heading.'),
        ),
    ));

    $wp_customize->add_setting('portfolio_subheading', array(
        'default' => 'Showcase your work effectively and in an attractive form that your prospective clients will love. ',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('portfolio_subheading', array(
        'label' => esc_html('Sub Heading'),
        'description' => esc_html('Section Sub Heading'),
        'section' => 'quba_portfolio',
        'priority' => 30,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Sub Heading'),
        ),
    ));

    // Theme Contact section.
    $wp_customize->add_section('quba_contact', array(
        'title'       => esc_html('Contact Section Settings', 'quba'),
        'capability'  => 'edit_theme_options',
        'priority'    => 50,
        'panel'     => 'quba_panel',
    ));

    $wp_customize->add_setting('contact_toggle_switch', array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_switch_sanitization'
    ));

    $wp_customize->add_control(new toggle_switch_control($wp_customize, 'contact_toggle_switch', array(
        'label' => esc_html('Toggle Switch'),
        'description' => esc_html('Hide or show section', 'quba'),
        'priority' => 10,
        'section' => 'quba_contact'
    )));

    $wp_customize->selective_refresh->add_partial('contact_toggle_switch', array(
        'selector' => '#contact .container .row', 
    ));

    $wp_customize->add_setting('contact_heading', array(
        'default' => 'Ready To Get Start',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('contact_heading', array(
        'label' => esc_html('Section Heading'),
        'description' => esc_html('Input Heading.'),
        'section' => 'quba_contact',
        'priority' => 20,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter heading.'),
        ),
    ));

    $wp_customize->add_setting('contact_subheading', array(
        'default' => 'Get in touch with me',
        'transport' => 'refresh',
        'sanitize_callback' => 'wp_filter_nohtml_kses'
    ));

    $wp_customize->add_control('contact_subheading', array(
        'label' => esc_html('Sub Heading'),
        'description' => esc_html('Section Sub Heading'),
        'section' => 'quba_contact',
        'priority' => 30,
        'type' => 'textarea',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Sub Heading'),
        ),
    ));

    $wp_customize->add_setting('saOne_class', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saOne_class', array(
        'label' => esc_html('Social Account One'),
        'description' => esc_html('FontAwesome Class'),
        'section' => 'quba_contact',
        'priority' => 40,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter FontAwesome Class'),
        ),
    ));

    $wp_customize->add_setting('saOne_url', array(
        'default' => 'https://',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saOne_url', array(
        'label' => esc_html('Social Account One URL'),
        'section' => 'quba_contact',
        'priority' => 45,
        'type' => 'url',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter url.'),
        ),
    ));

    $wp_customize->add_setting('saTwo_class', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saTwo_class', array(
        'label' => esc_html('Social Account Two'),
        'description' => esc_html('FontAwesome Class'),
        'section' => 'quba_contact',
        'priority' => 50,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter FontAwesome Class'),
        ),
    ));

    $wp_customize->add_setting('saTwo_url', array(
        'default' => 'https://',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saTwo_url', array(
        'label' => esc_html('Social Account Two URL'),
        'section' => 'quba_contact',
        'priority' => 55,
        'type' => 'url',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter url.'),
        ),
    ));

    $wp_customize->add_setting('saThree_class', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saThree_class', array(
        'label' => esc_html('Social Account Three'),
        'description' => esc_html('FontAwesome Class'),
        'section' => 'quba_contact',
        'priority' => 60,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter FontAwesome Class'),
        ),
    ));

    $wp_customize->add_setting('saThree_url', array(
        'default' => 'https://',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saThree_url', array(
        'label' => esc_html('Social Account Three URL'),
        'section' => 'quba_contact',
        'priority' => 65,
        'type' => 'url',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter url.'),
        ),
    ));

    $wp_customize->add_setting('saFour_class', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saFour_class', array(
        'label' => esc_html('Social Account Four '),
        'description' => esc_html('FontAwesome Class'),
        'section' => 'quba_contact',
        'priority' => 70,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter FontAwesome Class'),
        ),
    ));

    $wp_customize->add_setting('saFour_url', array(
        'default' => 'https://',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saFour_url', array(
        'label' => esc_html('Social Account Four URL'),
        'section' => 'quba_contact',
        'priority' => 75,
        'type' => 'url',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter url.'),
        ),
    ));

    $wp_customize->add_setting('saFive_class', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saFive_class', array(
        'label' => esc_html('Social Account Five'),
        'description' => esc_html('FontAwesome Class'),
        'section' => 'quba_contact',
        'priority' => 80,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter FontAwesome Class'),
        ),
    ));

    $wp_customize->add_setting('saFive_url', array(
        'default' => 'https://',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('saFive_url', array(
        'label' => esc_html('Social Account Five URL'),
        'section' => 'quba_contact',
        'priority' => 85,
        'type' => 'url',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter url.'),
        ),
    ));

    $wp_customize->add_setting('email_class', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('email_class', array(
        'label' => esc_html('Email'),
        'description' => esc_html('Eamil Details'),
        'section' => 'quba_contact',
        'priority' => 90,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter FontAwesome Class'),
        ),
    ));

    $wp_customize->add_setting('email_address', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('email_address', array(
        'label' => esc_html('Your Email Address'),
        'section' => 'quba_contact',
        'priority' => 95,
        'type' => 'url',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter url.'),
        ),
    ));

    // Theme Footer section.
    $wp_customize->add_section('quba_footer', array(
        'title'       => esc_html('Footer Section Settings', 'quba'),
        'capability'  => 'edit_theme_options',
        'priority'    => 60,
        'panel'     => 'quba_panel',
    ));

    $wp_customize->add_setting('telephone_number', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('telephone_number', array(
        'label' => esc_html('Telephone Number'),
        'section' => 'quba_footer',
        'priority' => 10,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter Your Number'),
        ),
    ));

    $wp_customize->selective_refresh->add_partial('telephone_number', array(
        'selector' => '.footer-contact', 
    ));

    $wp_customize->add_setting('email_address-footer', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('email_address-footer', array(
        'label' => esc_html('Email Address'),
        'section' => 'quba_footer',
        'priority' => 20,
        'type' => 'text',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter Your Email Address'),
        ),
    ));

    $wp_customize->add_setting('contact_form', array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'quba_text_sanitization'
    ));

    $wp_customize->add_control('contact_form', array(
        'label' => esc_html('Contact Form Page URL'),
        'section' => 'quba_footer',
        'priority' => 30,
        'type' => 'url',
        'capability' => 'edit_theme_options',
        'input_attrs' => array(
            'class' => 'my-custom-class',
            'style' => 'border: 1px solid #999',
            'placeholder' => esc_html('Enter Contact Form Page URL'),
        ),
    ));

}
add_action('customize_register', 'qubatheme_customize_register');
