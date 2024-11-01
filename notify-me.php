<?php

/*
Plugin Name: WP Notify Me
Plugin URI:  https://miguelclark.com.mx/notify-me
Description: WP Notify Me is a plugin that allows you to receive notifications by email when a publication changes its status.
Version:     1.2
Author:      Miguel Clark
Author URI:  https://miguelclark.com.mx/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: wp-notify-me
Domain Path: /languages

* Notify Me is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with WP Gestor de Liga. If not, see https://www.gnu.org/licenses/gpl-2.0.html
 * 
*/


if(!defined('ABSPATH')) exit;
/*
* Añade funciones
*/
require_once plugin_dir_path( __FILE__ ) . 'includes/funciones.php';
/*
* Añade settings
*/
require_once plugin_dir_path( __FILE__ ) . 'includes/settings.php';
/*
* Añade Lenaguajes de traduccion
*/
function mc_notifyme_plugin_load_textdomain() {
	
	$text_domain	= 'notify-me';
    $path_languages =  basename(dirname(__FILE__)) . '/languages/';
   
     load_plugin_textdomain($text_domain, false, $path_languages );
}
add_action('init', 'mc_notifyme_plugin_load_textdomain');


