<?php
class ResponsiveNotice {

    public static function init() {
        add_action('wp_enqueue_scripts', array('ResponsiveNotice','load_scripts'));
        add_action( 'plugins_loaded', array('ResponsiveNotice', 'load_textdomain' ));
        add_action( 'admin_menu', array('ResponsiveNotice', 'register_menu_page' ));
        add_action( 'admin_init', array('ResponsiveNotice', 'register_settings' ));
    }

    public static function load_scripts() {
        wp_enqueue_script('rn_js_cookie', plugins_url( '/js/js.cookie.js', dirname( __FILE__ )));
        wp_register_script('rn_main', plugins_url( '/js/main.js', dirname( __FILE__ )), array(), false, true);
        wp_localize_script('rn_main', 'rn' , array( 'enabled' => get_option('rn_enabled'), 
                                                    'content' => get_option('rn_content'), 
                                                    'hide_days' => get_option('rn_hide_days'), 
                                                    'bgcolor' => get_option('rn_bgcolor'), 
                                                    'textcolor' => get_option('rn_textcolor'),
                                                    'close_text' => __('close','responsive_notice')
                                                    ) );
        wp_enqueue_script('rn_main');
    }

    public static function load_textdomain() {
        load_plugin_textdomain( 'responsive_notice', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
    }

    public static function register_menu_page(){
        add_options_page( __('Responsive EU Cookie Notice Options','responsive_notice'), __('Responsive EU Cookie Notice','responsive_notice'), 'manage_options', str_replace('classes/','', plugin_dir_path(  __FILE__ )).'admin.php');
    }

    public static function register_settings() {
        global $wpdb;

        /* user-configurable values */
        add_option('rn_enabled', '0');
        register_setting('responsive_notice', 'rn_enabled', array('ResponsiveNotice', 'checkbox_filter' ));
        add_option('rn_content', "<div style=\"text-align: center;\"><p>".__('This website uses cookies to ensure that you get the best possible experience.','responsive_notice').sprintf(" <a href=\"%s\">".__('More Info','responsive_notice')."</a>", get_bloginfo ('url').'/privacy-terms')."</p></div>");
        register_setting( 'responsive_notice', 'rn_content', array('ResponsiveNotice', 'string_filter' ) );
        add_option('rn_bgcolor', '#ffffff');
        register_setting( 'responsive_notice', 'rn_bgcolor', array('ResponsiveNotice', 'string_filter' ) );
        add_option('rn_textcolor', '#000000');
        register_setting( 'responsive_notice', 'rn_textcolor', array('ResponsiveNotice', 'string_filter' ) );
        add_option('rn_hide_days', '9999');
        register_setting( 'responsive_notice', 'rn_hide_days', array('ResponsiveNotice', 'integer_filter' ) );
        
    }
    
    public static function checkbox_filter($check) {
        if ($check != "1") {
            return "0";
        } else {
            return $check;
        }
    }
    
    public static function string_filter($str) {
        return filter_var($str, FILTER_UNSAFE_RAW, FILTER_FLAG_STRIP_LOW & FILTER_FLAG_STRIP_HIGH);
    }
    
    public static function integer_filter( $int ) {
        return filter_var($int, FILTER_SANITIZE_NUMBER_INT);
    }
}
