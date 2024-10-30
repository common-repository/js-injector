<?php
/**
 * Scripts.class.php
 * 
 * @file ./_core/1.0.0/classes/Scripts.class.php
 * @package 77solutions.WP77L
 * @author 77 Solutions, Matthew Lukas Mania
 * @license GPLv3
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 */
/*
This file is part of WP77 Lite.

WP77 Lite is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

WP77 Lite is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with WP77 Lite.  If not, see https://www.gnu.org/licenses/gpl-3.0.txt.
*/


namespace WP77\V1_0_0L{
	
	
	if(!defined('ABSPATH')){ exit; }
	
	
	/**
	 * Scripts class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Scripts{
		
		/**
		 * Register
		 * 
		 * Register a new script.
		 * 
		 * @param string $handle Name of the script. Should be unique.
		 * @param string $src Full URL of the script, or path of the script relative to the WordPress root directory.
		 * @param array $deps An array of registered script handles this script depends on.
		 * @param string|boolean|null $ver String specifying script version number, if it has one, which is added to the URL as a query string for cache busting purposes. If version is set to false, a version number is automatically added equal to current installed WordPress version. If set to null, no version is added.
		 * @param boolean $in_footer Whether to enqueue the script before </body> instead of in the <head>. Default 'false'.
		 * @return boolean Whether the script has been registered. True on success, false on failure.
		 * @link https://developer.wordpress.org/reference/functions/wp_register_script/
		 * @since 1.0.0
		 */
		public static function Register($handle, $src, $deps=array(), $ver=false, $in_footer=false){
			
			// Introduced: 2.1.0, Return value was added: 4.3.0
			return \wp_register_script($handle, $src, $deps, $ver, $in_footer);
		}
		
		
		/**
		 * Deregister
		 * 
		 * Remove a registered script.
		 * 
		 * @param string $handle Name of the script to be removed.
		 * @return void
		 * @link https://developer.wordpress.org/reference/functions/wp_deregister_script/
		 * @since 1.0.0
		 */
		public static function Deregister($handle){
			
			// Introduced: 2.1.0
			return \wp_deregister_script($handle);
		}
		
		
		/**
		 * Enqueue
		 * 
		 * Enqueue a script.
		 * 
		 * @param string $handle Name of the script. Should be unique.
		 * @param string $src Full URL of the script, or path of the script relative to the WordPress root directory.
		 * @param array $deps An array of registered script handles this script depends on.
		 * @param string|boolean|null $ver String specifying script version number, if it has one, which is added to the URL as a query string for cache busting purposes. If version is set to false, a version number is automatically added equal to current installed WordPress version. If set to null, no version is added.
		 * @param boolean $in_footer Whether to enqueue the script before </body> instead of in the <head>.
		 * @return void
		 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_script/
		 * @since 1.0.0
		 */
		public static function Enqueue($handle, $src='', $deps=array(), $ver=false, $in_footer=false){
			
			// Introduced: 2.1.0
			return \wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);
		}
		
		
		/**
		 * Dequeue
		 * 
		 * Remove a previously enqueued script.
		 * 
		 * @param string $handle Name of the script to be removed.
		 * @return void
		 * @link https://developer.wordpress.org/reference/functions/wp_dequeue_script/
		 * @since 1.0.0
		 */
		public static function Dequeue($handle){
			
			// Introduced: 3.1.0
			return \wp_dequeue_script($handle);
		}
		
		
		/**
		 * ScriptIs
		 * 
		 * Check whether a script has been added to the queue.
		 * 
		 * @param string $handle Name of the script.
		 * @param string $list Status of the script to check. Accepts 'enqueued' (introduced in unknown version of WP), 'registered', 'queue', 'to_do', and 'done'.
		 * @return boolean Whether the script is queued.
		 * @link https://developer.wordpress.org/reference/functions/wp_script_is/
		 * @since 1.0.0
		 */
		public static function ScriptIs($handle, $list='queue'){
			
			if($list == 'enqueued'){
				
				$list = 'queue';
			}
			
			// Introduced: 2.8.0, 'enqueued' added as an alias of the 'queue' list: 3.5.0
			return \wp_script_is($handle, $list);
		}
		
		
		/**
		 * LocalizeScript
		 * 
		 * Localize a script.
		 * 
		 * @param string $handle Script handle the data will be attached to.
		 * @param string $object_name Name for the JavaScript object. Passed directly, so it should be qualified JS variable. Example: '/[a-zA-Z0-9_]+/'.
		 * @param array $l10n The data itself. The data can be either a single or multi-dimensional array.
		 * @return boolean Returns true if the script was successfully localized, false otherwise.
		 * @link https://developer.wordpress.org/reference/functions/wp_localize_script/
		 * @since 1.0.0
		 */
		public static function LocalizeScript($handle, $object_name, $l10n){
			
			// Introduced: 2.2.0
			return \wp_localize_script($handle, $object_name, $l10n);
		}
		
	}
	
}
?>