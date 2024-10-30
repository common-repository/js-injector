<?php
/**
 * HTTP.class.php
 * 
 * @file ./_core/1.0.0/classes/HTTP.class.php
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
	 * HTTP class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class HTTP{
		
		/**
		 * Get
		 * 
		 * Get raw response from HTTP request using GET method. Result include HTTP headers and content.
		 * 
		 * @param string $url URL to retrieve.
		 * @param array $args Additional arguments.
		 * @return WP_Error|array Returns response array on success, or WP_Error object on fail.
		 * @link https://developer.wordpress.org/reference/functions/wp_remote_get/
		 * @since 1.0.0
		 */
		public static function Get($url, $args=array()){
			
			// Introduced: 2.7.0
			return \wp_remote_get($url, $args);
		}
		
		
		/**
		 * Post
		 * 
		 * Get raw response from HTTP request using POST method. Result include HTTP headers and content.
		 * 
		 * @param string $url URL to retrieve.
		 * @param array $args Additional arguments.
		 * @return WP_Error|array Returns response array on success, or WP_Error object on fail.
		 * @link https://developer.wordpress.org/reference/functions/wp_remote_post/
		 * @since 1.0.0
		 */
		public static function Post($url, $args=array()){
			
			// Introduced: 2.7.0
			return \wp_remote_post($url, $args);
		}
		
		
		/**
		 * Head
		 * 
		 * Get raw response from HTTP request using HEAD method. Result include HTTP headers and content.
		 * 
		 * @param string $url URL to retrieve.
		 * @param array $args Additional arguments.
		 * @return WP_Error|array Returns response array on success, or WP_Error object on fail.
		 * @link https://developer.wordpress.org/reference/functions/wp_remote_head/
		 * @since 1.0.0
		 */
		public static function Head($url, $args=array()){
			
			// Introduced: 2.7.0
			return \wp_remote_head($url, $args);
		}
		
	}
	
}