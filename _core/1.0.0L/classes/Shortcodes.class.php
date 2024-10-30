<?php
/**
 * Shortcodes.class.php
 * 
 * @file ./_core/1.0.0/classes/Shortcodes.class.php
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
	 * Shortcodes class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Shortcodes{
		
		/**
		 * Add
		 * 
		 * Add hook for shortcode tag.
		 * 
		 * @param string $shortcode_tag Shortcode tag.
		 * @param string $shortcode_func Hook to run when shortcode found.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/add_shortcode/
		 * @since 1.0.0
		 */
		public static function Add($shortcode_tag, $shortcode_func){
			
			// Introduced: 2.5.0
			\add_shortcode($shortcode_tag, $shortcode_func);
		}
		
		
		/**
		 * Remove
		 * 
		 * Remove hook for shortcode tag.
		 * 
		 * @param string $shortcode_tag Shortcode tag.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/remove_shortcode/
		 * @since 1.0.0
		 */
		public static function Remove($shortcode_tag){
			
			// Introduced: 2.5.0
			\remove_shortcode($shortcode_tag);
		}
		
		
		/**
		 * RemoveAll
		 * 
		 * Clear all shortcodes.
		 * 
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/remove_all_shortcodes/
		 * @since 1.0.0
		 */
		public static function RemoveAll(){
			
			// Introduced: 2.5.0
			return \remove_all_shortcodes();
		}
		
		
		/**
		 * Exists
		 * 
		 * Check shortcode with given tag exists.
		 * 
		 * @param string $shortcode_tag Shortcode tag.
		 * @return boolean Returns true when shortcode exists or false when not.
		 * @link https://developer.wordpress.org/reference/functions/shortcode_exists/
		 * @since 1.0.0
		 */
		public static function Exists($shortcode_tag){
			
			if(function_exists('\shortcode_exists')){
				
				// Introduced: 3.6.0
				return \shortcode_exists($shortcode_tag);
			}
			else{
				
				// Introduced: 2.5.0
				global $shortcode_tags;
				
				return isset($shortcode_tags[$shortcode_tag]);
			}
		}
		
	}
	
}
?>