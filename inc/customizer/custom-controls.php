<?php
/**
 * Quba Customizer Custom Controls
 *
 */

if (class_exists('WP_Customize_Control')) {

    /**
     * Toggle Switch Custom Control
     */
    class toggle_switch_control extends WP_Customize_Control
    {
        /**
         * The type of control being rendered
         */
        public $type = 'toggle_switch';
        /**
         * Enqueue our scripts and styles
         */
        public function enqueue()
        {
            wp_enqueue_style('quba-custom-controls-css', trailingslashit(get_template_directory_uri()) . '/inc/customizer/css/customizer.css', array(), '1.0', 'all');
        }
        /**
         * Render the control in the customizer
         */
        public function render_content()
        {
            ?>
            <div class="toggle-switch-control">
                <div class="toggle-switch">
                    <input type="checkbox" id="<?php echo esc_attr($this->id); ?>" name="<?php echo esc_attr($this->id); ?>" class="toggle-switch-checkbox" value="<?php echo esc_attr($this->value()); ?>" <?php $this->link();
                    checked($this->value()); ?>>
                    <label class="toggle-switch-label" for="<?php echo esc_attr($this->id); ?>">
                        <span class="toggle-switch-inner"></span>
                        <span class="toggle-switch-switch"></span>
                    </label>
                </div>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php if (!empty($this->description)) { ?>
                    <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
                <?php } ?>
            </div>
            <?php
        }
    }


    /**
     * TinyMCE Custom Control
     */
    class TinyMCE_Custom_control extends WP_Customize_Control
    {
        /**
         * The type of control being rendered
         */
        public $type = 'tinymce_editor';
        /**
         * Enqueue our scripts and styles
         */
        public function enqueue()
        {
            wp_enqueue_script('quba-custom-controls-js', trailingslashit(get_template_directory_uri()) . '/inc/customizer/js/customizer.js', array( 'jquery' ), '1.0', true);
            wp_enqueue_style('quba-custom-controls-css', trailingslashit(get_template_directory_uri()) . '/inc/customizer/css/customizer.css', array(), '1.0', 'all');
            wp_enqueue_editor();
        }
        /**
         * Pass our TinyMCE toolbar string to JavaScript
         */
        public function to_json()
        {
            parent::to_json();
            $this->json['qubatinymcetoolbar1'] = isset($this->input_attrs['toolbar1']) ? esc_attr($this->input_attrs['toolbar1']) : 'bold italic bullist numlist alignleft aligncenter alignright link';
            $this->json['qubatinymcetoolbar2'] = isset($this->input_attrs['toolbar2']) ? esc_attr($this->input_attrs['toolbar2']) : '';
        }
        /**
         * Render the control in the customizer
         */
        public function render_content()
        {
            ?>
            <div class="tinymce-control">
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <?php if (!empty($this->description)) { ?>
                    <span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
                <?php } ?>
                <textarea id="<?php echo esc_attr($this->id); ?>" class="customize-control-tinymce-editor" <?php $this->link(); ?>><?php echo esc_attr($this->value()); ?></textarea>
            </div>
            <?php
        }
    }



    /**
     * URL sanitization
     *
     * @param  string   Input to be sanitized (either a string containing a single url or multiple, separated by commas)
     * @return string   Sanitized input
     */
    if (! function_exists('quba_url_sanitization')) {
        function quba_url_sanitization($input)
        {
            if (strpos($input, ',') !== false) {
                $input = explode(',', $input);
            }
            if (is_array($input)) {
                foreach ($input as $key => $value) {
                    $input[$key] = esc_url_raw($value);
                }
                $input = implode(',', $input);
            } else {
                $input = esc_url_raw($input);
            }
            return $input;
        }
    }

    /**
     * Switch sanitization
     *
     * @param  string       Switch value
     * @return integer  Sanitized value
     */
    if (! function_exists('quba_switch_sanitization')) {
        function quba_switch_sanitization($input)
        {
            if (true === $input) {
                return 1;
            } else {
                return 0;
            }
        }
    }

    /**
     * Radio Button and Select sanitization
     *
     * @param  string       Radio Button value
     * @return integer  Sanitized value
     */
    if (! function_exists('quba_radio_sanitization')) {
        function quba_radio_sanitization($input, $setting)
        {
            //get the list of possible radio box or select options
            $choices = $setting->manager->get_control($setting->id)->choices;

            if (array_key_exists($input, $choices)) {
                return $input;
            } else {
                return $setting->default;
            }
        }
    }

    /**
     * Integer sanitization
     *
     * @param  string       Input value to check
     * @return integer  Returned integer value
     */
    if (! function_exists('quba_sanitize_integer')) {
        function quba_sanitize_integer($input)
        {
            return (int) $input;
        }
    }

    /**
     * Text sanitization
     *
     * @param  string   Input to be sanitized (either a string containing a single string or multiple, separated by commas)
     * @return string   Sanitized input
     */
    if (! function_exists('quba_text_sanitization')) {
        function quba_text_sanitization($input)
        {
            if (strpos($input, ',') !== false) {
                $input = explode(',', $input);
            }
            if (is_array($input)) {
                foreach ($input as $key => $value) {
                    $input[$key] = sanitize_text_field($value);
                }
                $input = implode(',', $input);
            } else {
                $input = sanitize_text_field($input);
            }
            return $input;
        }
    }
}
