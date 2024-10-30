<?php
/**
 * Formatting.class.php
 * 
 * @file ./_core/1.0.0/classes/Formatting.class.php
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
	 * Formatting class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Formatting{
		
		/**
		 * SanitizeEmail
		 * 
		 * Strips out all characters that are not allowable in an email.
		 * 
		 * @param string $email Email address to filter.
		 * @return string Returns filtered email address.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_email/
		 * @since 1.0.0
		 */
		public static function SanitizeEmail($email){
			
			// Introduced: 1.5.0
			return \sanitize_email($email);
		}
		
		
		/**
		 * SanitizeFileName
		 * 
		 * Sanitizes a filename replacing whitespace with dashes, removes special illegal characters.
		 * 
		 * @param string $name The file name.
		 * @return string Returns sanitized file name.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_file_name/
		 * @since 1.0.0
		 */
		public static function SanitizeFileName($name){
			
			// Introduced: 2.1.0
			return \sanitize_file_name($name);
		}
		
		
		/**
		 * SanitizeHTMLClass
		 * 
		 * Sanitizes an HTML classname to ensure it only contains valid characters.
		 * 
		 * @param string $class The classname to be sanitized.
		 * @param string $fallback The value to return if the sanitization ends up as an empty string. Defaults to an empty string.
		 * @return string Returns sanitized value.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_html_class/
		 * @since 1.0.0
		 */
		public static function SanitizeHTMLClass($class, $fallback=''){
			
			// Introduced: 2.8.0
			return \sanitize_html_class($class, $fallback);
		}
		
		
		/**
		 * SanitizeKey
		 * 
		 * Sanitizes a string key.
		 * 
		 * @param string $key String key.
		 * @return string Returns sanitized key.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_key/
		 * @since 1.0.0
		 */
		public static function SanitizeKey($key){
			
			// Introduced: 3.0.0
			return \sanitize_key($key);
		}
		
		
		/**
		 * SanitizeOption
		 * 
		 * Sanitises various option values based on the nature of the option.
		 * 
		 * @param string $option The name of the option.
		 * @param string $value The unsanitised value.
		 * @return string Returns sanitized value.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_option/
		 * @since 1.0.0
		 */
		public static function SanitizeOption($option, $value){
			
			// Introduced: 2.0.5
			return \sanitize_option($option, $value);
		}
		
		
		/**
		 * SanitizeSQLOrderBy
		 * 
		 * Ensures a string is a valid SQL 'order by' clause.
		 * 
		 * @param string $orderby Order by clause to be validated.
		 * @return string|false Returns $orderby if valid, false otherwise.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_sql_orderby/
		 * @since 1.0.0
		 */
		public static function SanitizeSQLOrderBy($orderby){
			
			// Introduced: 2.5.1
			return \sanitize_sql_orderby($orderby);
		}
		
		
		/**
		 * SanitizeTextField
		 * 
		 * Sanitizes a string from user input or from the database.
		 * 
		 * @param string $str String to sanitize.
		 * @return string Returns sanitized string.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_text_field/
		 * @since 1.0.0
		 */
		public static function SanitizeTextField($str){
			
			// Introduced: 2.9.0
			return \sanitize_text_field($str);
		}
		
		
		/**
		 * SanitizeTitle
		 * 
		 * Sanitizes a title, or returns a fallback title.
		 * 
		 * @param string $title The string to be sanitized.
		 * @param string $fallback_title A title to use if $title is empty.
		 * @param string $context The operation for which the string is sanitized.
		 * @return Returns sanitized string.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_title/
		 * @since 1.0.0
		 */
		public static function SanitizeTitle($title, $fallback_title='', $context='save'){
			
			// Introduced: 1.0.0
			return \sanitize_title($title, $fallback_title, $context);
		}
		
		
		/**
		 * SanitizeTitleForQuery
		 * 
		 * Sanitizes a title with the 'query' context.
		 * 
		 * @param string $title The string to be sanitized.
		 * @return Returns sanitized string.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_title_for_query/
		 * @since 1.0.0
		 */
		public static function SanitizeTitleForQuery($title){
			
			// Introduced: 3.1.0
			return \sanitize_title_for_query($title);
		}
		
		
		/**
		 * SanitizeTitleWithDashes
		 * 
		 * Sanitizes a title, replacing whitespace and a few other characters with dashes.
		 * 
		 * @param string $title The title to be sanitized.
		 * @param string $raw_title Not used.
		 * @param string $context The operation for which the string is sanitized.
		 * @return Returns sanitized title.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_title_with_dashes/
		 * @since 1.0.0
		 */
		public static function SanitizeTitleWithDashes($title, $raw_title='', $context='display'){
			
			// Introduced: 1.2.0
			return \sanitize_title_with_dashes($title, $raw_title, $context);
		}
		
		
		/**
		 * SanitizeUser
		 * 
		 * Sanitizes a username, stripping out unsafe characters.
		 * 
		 * @param string $username The username to be sanitized.
		 * @param boolean $strict If set limits $username to specific characters.
		 * @return string Returns sanitized username, after passing through filters.
		 * @link https://developer.wordpress.org/reference/functions/sanitize_user/
		 * @since 1.0.0
		 */
		public static function SanitizeUser($username, $strict=false){
			
			// Introduced: 2.0.0
			return \sanitize_user($username, $strict);
		}
		
		
		/**
		 * SanitizeCSS
		 * 
		 * Sanitizes CSS code.
		 * 
		 * @param string $code Code to sanitize.
		 * @return string Returns sanitized CSS code.
		 * @link http://77solutions.eu/docs/csstidy/1.5.5/
		 * @since 1.0.0
		 */
		public static function SanitizeCSS($code){
			
			$csstidy = new \csstidy();
			
			$csstidy -> parse($code);
			
			return $csstidy -> print -> plain();
		}
		
		
		/**
		 * EscapeHTML
		 * 
		 * Escapes HTML blocks.
		 * 
		 * @param string $text String to escape.
		 * @return string Returns escaped $text.
		 * @link https://developer.wordpress.org/reference/functions/esc_html/
		 * @since 1.0.0
		 */
		public static function EscapeHTML($text){
			
			// Introduced: 2.8.0
			return \esc_html($text);
		}
		
		
		/**
		 * EscapeURL
		 * 
		 * Checks and cleans a URL.
		 * 
		 * @param string $url The URL to be cleaned.
		 * @param array $protocols An array of acceptable protocols.
		 * @param string $_context Private. Use esc_url_raw() for database usage.
		 * @return Returns cleaned $url after the 'clean_url' filter is applied.
		 * @link https://developer.wordpress.org/reference/functions/esc_url/
		 * @since 1.0.0
		 */
		public static function EscapeURL($url, $protocols=null, $_context='display'){
			
			// Introduced: 2.8.0
			return \esc_url($url, $protocols, $_context);
		}
		
		
		/**
		 * EscapeJS
		 * 
		 * Escape single quotes, htmlspecialchar ” &, and fix line endings.
		 * 
		 * @param string $text The text to be escaped.
		 * @return string Returns escaped text.
		 * @link https://developer.wordpress.org/reference/functions/esc_js/
		 * @since 1.0.0
		 */
		public static function EscapeJS($text){
			
			// Introduced: 2.8.0
			return \esc_js($text);
		}
		
		
		/**
		 * EscapeAttr
		 * 
		 * Escaping for HTML attributes.
		 * 
		 * @param string $text The text to be escaped.
		 * @return string Returns escaped text.
		 * @link https://developer.wordpress.org/reference/functions/esc_attr/
		 * @since 1.0.0
		 */
		public static function EscapeAttr($text){
			
			// Introduced: 2.8.0
			return \esc_attr($text);
		}
		
		
		/**
		 * EscapeTextarea
		 * 
		 * Escaping for textarea values.
		 * 
		 * @param string $text The text to be escaped.
		 * @return string Returns escaped text.
		 * @link https://developer.wordpress.org/reference/functions/esc_textarea/
		 * @since 1.0.0
		 */
		public static function EscapeTextarea($text){
			
			// Introduced: 3.1.0
			return \esc_textarea($text);
		}
		
		
		/**
		 * StripAllTags
		 * 
		 * Properly strip all HTML tags including script and style.
		 * 
		 * @param string $string String containing HTML tags.
		 * @param boolean $remove_breaks Whether to remove left over line breaks and white space chars.
		 * @return string Returns processed string.
		 * @link https://developer.wordpress.org/reference/functions/wp_strip_all_tags/
		 * @since 1.0.0
		 */
		public static function StripAllTags($string, $remove_breaks=false){
			
			// Introduced: 2.9.0
			return \wp_strip_all_tags($string, $remove_breaks);
		}
		
	}
	
}
?>