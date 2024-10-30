<?php
/**
 * Styles.class.php
 * 
 * @file ./_core/1.0.0/classes/Styles.class.php
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
	 * Styles class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Styles{
		
		/**
		 * Register
		 * 
		 * Register a CSS stylesheet.
		 * 
		 * @param string $handle Name of the stylesheet. Should be unique.
		 * @param string $src Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory.
		 * @param array $deps An array of registered stylesheet handles this stylesheet depends on.
		 * @param string|boolean|null $ver String specifying stylesheet version number, if it has one, which is added to the URL as a query string for cache busting purposes. If version is set to false, a version number is automatically added equal to current installed WordPress version. If set to null, no version is added.
		 * @param string $media The media for which this stylesheet has been defined. Accepts media types like 'all', 'print' and 'screen', or media queries like '(orientation: portrait)' and '(max-width: 640px)'.
		 * @return boolean Whether the style has been registered. True on success, false on failure.
		 * @link https://developer.wordpress.org/reference/functions/wp_register_style/
		 * @since 1.0.0
		 */
		public static function Register($handle, $src, $deps=array(), $ver=false, $media='all'){
			
			// Introduced: 2.6.0, A return value was added: 4.3.0
			return \wp_register_style($handle, $src, $deps, $ver, $media);
		}
		
		
		/**
		 * Deregister
		 * 
		 * Remove a registered stylesheet.
		 * 
		 * @param string $handle Name of the stylesheet to be removed.
		 * @return void
		 * @link https://developer.wordpress.org/reference/functions/wp_deregister_style/
		 * @since 1.0.0
		 */
		public static function Deregister($handle){
			
			// Introduced: 2.1.0
			return \wp_deregister_style($handle);
		}
		
		
		/**
		 * Enqueue
		 * 
		 * Enqueue a CSS stylesheet.
		 * 
		 * @param string $handle Name of the stylesheet. Should be unique.
		 * @param string $src Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory.
		 * @param array $deps An array of registered stylesheet handles this stylesheet depends on.
		 * @param string|boolean|null $ver String specifying stylesheet version number, if it has one, which is added to the URL as a query string for cache busting purposes. If version is set to false, a version number is automatically added equal to current installed WordPress version. If set to null, no version is added.
		 * @param string $media The media for which this stylesheet has been defined. Accepts media types like 'all', 'print' and 'screen', or media queries like '(orientation: portrait)' and '(max-width: 640px)'.
		 * @return void
		 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
		 * @since 1.0.0
		 */
		public static function Enqueue($handle, $src='', $deps=array(), $ver=false, $media='all'){
			
			// Introduced: 2.6.0
			return \wp_enqueue_style($handle, $src, $deps, $ver, $media);
		}
		
		
		/**
		 * Dequeue
		 * 
		 * Remove a previously enqueued CSS stylesheet.
		 * 
		 * @param string $handle Name of the stylesheet to be removed.
		 * @return void
		 * @link https://developer.wordpress.org/reference/functions/wp_dequeue_style/
		 * @since 1.0.0
		 */
		public static function Dequeue($handle){
			
			// Introduced: 3.1.0
			return \wp_dequeue_style($handle);
		}
		
		
		/**
		 * StyleIs
		 * 
		 * Check whether a CSS stylesheet has been added to the queue.
		 * 
		 * @param string $handle Name of the stylesheet.
		 * @param string $list Status of the stylesheet to check. Accepts 'enqueued' (introduced in unknown version of WP), 'registered', 'queue', 'to_do', and 'done'.
		 * @return boolean Whether style is queued.
		 * @link https://developer.wordpress.org/reference/functions/wp_style_is/
		 * @since 1.0.0
		 */
		public static function StyleIs($handle, $list='queue'){
			
			if($list == 'enqueued'){
				
				$list = 'queue';
			}
			
			// Introduced: 2.8.0
			return \wp_style_is($handle, $list);
		}
		
	}
	
}
?>