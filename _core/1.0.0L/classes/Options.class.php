<?php
/**
 * Options.class.php
 * 
 * @file ./_core/1.0.0/classes/Options.class.php
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
	 * Options class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Options{
		
		/**
		 * Add
		 * 
		 * Create WordPress option with default value.
		 * 
		 * @param string $option_id ID of WordPress option.
		 * @param string $option_value Default value of WordPress option.
		 * @return boolean Returns true when option was added or false on failure.
		 * @link https://developer.wordpress.org/reference/functions/add_option/
		 * @since 1.0.0
		 */
		public static function Add($option_id, $option_value){
			
			$option_value = addslashes($option_value);
			
			// Introduced: 1.0.0
			return \add_option($option_id, $option_value);
		}
		
		
		/**
		 * Delete
		 * 
		 * Delete WordPress option.
		 * 
		 * @param string $option_id ID of WordPress option.
		 * @return boolean Returns true when option was deleted or false on failure.
		 * @link https://developer.wordpress.org/reference/functions/delete_option/
		 * @since 1.0.0
		 */
		public static function Delete($option_id){
			
			// Introduced: 1.2.0
			return \delete_option($option_id);
		}
		
		
		/**
		 * Get
		 * 
		 * Get value of WordPress option.
		 * 
		 * @param string $option_id ID of WordPress option.
		 * @return mixed Returns value set for option.
		 * @link https://developer.wordpress.org/reference/functions/get_option/
		 * @since 1.0.0
		 */
		public static function Get($option_id){
			
			// Introduced: 1.5.0
			$option_value = \get_option($option_id);
			$option_value = \stripslashes($option_value);
			
			return $option_value;
		}
		
		
		/**
		 * Update
		 * 
		 * Update value of WordPress option.
		 * 
		 * @param string $option_id ID of WordPress option.
		 * @param string $option_value Default value of WordPress option.
		 * @return boolean Returns true when option was updated or false on failure.
		 * @link https://developer.wordpress.org/reference/functions/update_option/
		 * @since 1.0.0
		 */
		public static function Update($option_id, $option_value){
			
			$option_value = \addslashes($option_value);
			
			// Introduced: 1.0.0
			return \update_option($option_id, $option_value);
		}
		
	}
	
}
?>