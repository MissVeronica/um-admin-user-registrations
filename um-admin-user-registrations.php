<?php
/**
 * Plugin Name:         Ultimate Member - Admin User Registrations
 * Description:         Extension to Ultimate Member for Admin User Registrations.
 * Version:             1.0.0
 * Requires PHP:        7.4
 * Author:              Miss Veronica
 * License:             GPL v3 or later
 * License URI:         https://www.gnu.org/licenses/gpl-2.0.html
 * Author URI:          https://github.com/MissVeronica
 * Text Domain:         ultimate-member
 * Domain Path:         /languages
 * UM version:          2.8.5
 */

if ( ! defined( 'ABSPATH' ) ) exit;
if ( ! class_exists( 'UM' ) ) return;

class UM_Admin_User_Registrations {

    function __construct() {

        add_filter( 'um_registration_for_loggedin_users', '__return_true' );
        add_filter( 'um_field_value',                      array( $this, 'um_field_value_admin_registration' ), 10, 5 );
    }

    public function um_field_value_admin_registration( $value, $default, $key, $type, $data ) {

        if ( UM()->fields()->set_mode == 'register' ) {
            $value = $default;
        }

        return $value;
    }


}

new UM_Admin_User_Registrations();
