<?php
/**
 * Redirects.class.php
 * 
 * @file ./_core/1.0.0/classes/Redirects.class.php
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
	 * Redirects class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Redirects{
		
		/**
		 * Redirect
		 * 
		 * Redirect to another location.
		 * 
		 * @param string $location Target path to redirect.
		 * @param int $status Redirection status code.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/wp_redirect/
		 * @since 1.0.0
		 */
		public static function Redirect($location, $status=302){
			
			// Introduced: 1.5.1
			wp_redirect($location, $status);
			
			// "Headers already sent" fallback for non-77 issues.
			echo '<script>window.location = "'.$location.'";</script>';
			
			exit;
		}
		
		
		/**
		 * Refresh
		 * 
		 * Reload to current location.
		 * 
		 * @param void This method not receive any params.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/wp_redirect/
		 * @since 1.0.0
		 */
		public static function Refresh(){
			
			$php_self = $_SERVER['PHP_SELF'];
			$query_string = $_SERVER['QUERY_STRING'];
			
			$location = $php_self;
			if($query_string){
				
				$location .= '?'.$query_string;
			}
			
			// Introduced: 1.5.1
			wp_redirect($location);
			
			// "Headers already sent" fallback for non-77 issues.
			echo '<script>window.location.reload();</script>';
			
			exit;
		}
		
		
		/**
		 * NoticeRedirect
		 * 
		 * Set notice to display and next redirect to another location.
		 * 
		 * @param string $type Type of notice. Accepted types: success, updated, info, warning, error, default.
		 * @param string $msg Content of notice message.
		 * @param string $location Target path to redirect.
		 * @param int $status Redirection status code.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/wp_redirect/
		 * @since 1.0.0
		 */
		public static function NoticeRedirect($type, $msg, $location, $status=302){
			
			setcookie('redirect_notice', UI::Notice($type, $msg, true));
			return self::Redirect($location, $status);
		}
		
		
		/**
		 * NoticeRefresh
		 * 
		 * Set notice to display and next reload to current location.
		 * 
		 * @param string $type Type of notice. Accepted types: success, updated, info, warning, error, default.
		 * @param string $msg Content of notice message.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/wp_redirect/
		 * @since 1.0.0
		 */
		public static function NoticeRefresh($type, $msg){
			
			setcookie('redirect_notice', UI::Notice($type, $msg, true));
			return self::Refresh();
		}
		
	}
	
}