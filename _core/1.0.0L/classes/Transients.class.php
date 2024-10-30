<?php
/**
 * Transients.class.php
 * 
 * @file ./_core/1.0.0/classes/Transients.class.php
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
	 * Transients class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Transients{
		
		/**
		 * Get
		 * 
		 * Get transient value. If transient not exists or has empty value, then returns false.
		 * 
		 * @param string $transient_id ID of transient.
		 * @return mixed Returns value of transient or false when transient not have value or not exists.
		 * @link https://developer.wordpress.org/reference/functions/get_transient/
		 * @since 1.0.0
		 */
		public static function Get($transient_id){
			
			// Introduced: 2.8.0
			return \get_transient($transient_id);
		}
		
		
		/**
		 * Set
		 * 
		 * Set/update value of transient.
		 * 
		 * @param string $transient_id ID of transient.
		 * @param string $transient_value Value of transient.
		 * @param string $expiration Time until transient expiration in seconds from now, 0 for never expires.
		 * @return mixed Returns false if value was not set and true if value was set.
		 * @link https://developer.wordpress.org/reference/functions/set_transient/
		 * @since 1.0.0
		 */
		public static function Set($transient_id, $transient_value, $expiration){
			
			// Introduced: 2.8.0
			return \set_transient($transient_id, $transient_value, $expiration);
		}
		
		
		/**
		 * Delete
		 * 
		 * Delete transient. If transient not exists then no action is taken.
		 * 
		 * @param string $transient_id ID of transient.
		 * @return mixed Returns true on success, false on fail.
		 * @link https://developer.wordpress.org/reference/functions/delete_transient/
		 * @since 1.0.0
		 */
		public static function Delete($transient_id){
			
			// Introduced: 2.8.0
			return \delete_transient($transient_id);
		}
		
	}
	
}
?>