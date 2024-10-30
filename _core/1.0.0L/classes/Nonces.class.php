<?php
/**
 * Nonces.class.php
 * 
 * @file ./_core/1.0.0/classes/Nonces.class.php
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
	 * Nonces class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Nonces{
		
		/**
		 * Ays
		 * 
		 * Display “Are You Sure” message to confirm the action being taken.
		 * 
		 * @param string $action The nonce action.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/wp_nonce_ays/
		 * @since 1.0.0
		 */
		public static function Ays($action){
			
			// Introduced: 2.0.4
			return \wp_nonce_ays($action);
		}
		
		
		/**
		 * Field
		 * 
		 * Retrieve or display nonce hidden field for forms.
		 * 
		 * @param integer|string $action Action name.
		 * @param string $name Nonce name.
		 * @param boolean $referer Whether to set the referer field for validation.
		 * @param boolean $echo Whether to display or return hidden form field.
		 * @return string Returns nonce field HTML markup.
		 * @link https://developer.wordpress.org/reference/functions/wp_nonce_field/
		 * @since 1.0.0
		 */
		public static function Field($action=-1, $name='_wpnonce', $referer=true, $echo=true){
			
			// Introduced: 2.0.4
			return \wp_nonce_field($action, $name, $referer, $echo);
		}
		
		
		/**
		 * URL
		 * 
		 * Retrieve URL with nonce added to URL query.
		 * 
		 * @param string $actionurl URL to add nonce action.
		 * @param integer|string Nonce action name.
		 * @param string $name Nonce name.
		 * @return string Returns escaped URL with nonce action added.
		 * @link https://developer.wordpress.org/reference/functions/wp_nonce_url/
		 * @since 1.0.0
		 */
		public static function URL($actionurl, $action=-1, $name='_wpnonce'){
			
			// Introduced: 2.0.4
			return \wp_nonce_url($actionurl, $action, $name);
		}
		
		
		/**
		 * Verify
		 * 
		 * Verify that correct nonce was used with time limit.
		 * 
		 * @param string $nonce Nonce that was used in the form to verify.
		 * @param string|integer Should give context to what is taking place and be the same when nonce was created.
		 * @return false|integer Returns false if the nonce is invalid, 1 if the nonce is valid and generated between 0-12 hours ago, 2 if the nonce is valid and generated between 12-24 hours ago.
		 * @link https://developer.wordpress.org/reference/functions/wp_verify_nonce/
		 * @since 1.0.0
		 */
		public static function Verify($nonce, $action=-1){
			
			// Introduced: 2.0.3
			return \wp_verify_nonce($nonce, $action);
		}
		
		
		/**
		 * Create
		 * 
		 * Creates a cryptographic token tied to a specific action, user, user session, and window of time.
		 * 
		 * @param string|integer $action Scalar value to add context to the nonce.
		 * @return string Returns token.
		 * @link https://developer.wordpress.org/reference/functions/wp_create_nonce/
		 * @since 1.0.0
		 */
		public static function Create($action=-1){
			
			// Introduced: 2.0.3
			return \wp_create_nonce($action);
		}
		
	}
	
}
?>