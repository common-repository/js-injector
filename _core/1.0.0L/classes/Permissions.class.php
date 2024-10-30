<?php
/**
 * Permissions.class.php
 * 
 * @file ./_core/1.0.0/classes/Permissions.class.php
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
	 * Permissions class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Permissions{
		
		/**
		 * CurrentUserCan
		 * 
		 * Whether the current user has a specific capability.
		 * 
		 * @param string $capability Capability name.
		 * @return boolean Returns true if current user has the given capability. If $capability is a meta cap and $object_id is passed, whether the current user has the given meta capability for the given object.
		 * @link https://developer.wordpress.org/reference/functions/current_user_can/
		 * @link https://codex.wordpress.org/Roles_and_Capabilities
		 * @since 1.0.0
		 */
		public static function CurrentUserCan($capability){
			
			// Introduced: 2.0.0
			return \current_user_can($capability);
		}
		
		
		/**
		 * IsSuperAdmin
		 * 
		 * Determine if user is a super admin.
		 * 
		 * @return boolean Returns true if user is network admin, or false when not.
		 * @link https://developer.wordpress.org/reference/functions/is_super_admin/
		 * @link https://codex.wordpress.org/Roles_and_Capabilities
		 * @since 1.0.0
		 */
		public static function IsSuperAdmin(){
			
			// Introduced: 3.0.0
			return \is_super_admin(false);
		}
		
		
		/**
		 * IsAdmin
		 * 
		 * Determine if user is admin.
		 * 
		 * @return boolean Returns true if user is site admin, or false when not.
		 * @link https://codex.wordpress.org/Roles_and_Capabilities
		 * @since 1.0.0
		 */
		public static function IsAdmin(){
			
			return self::CurrentUserCan('administrator');
		}
		
		
		/**
		 * IsEditor
		 * 
		 * Determine if user is editor.
		 * 
		 * @return boolean Returns true if user is site editor, or false when not.
		 * @link https://codex.wordpress.org/Roles_and_Capabilities
		 * @since 1.0.0
		 */
		public static function IsEditor(){
			
			return self::CurrentUserCan('editor');
		}
		
		
		/**
		 * IsAuthor
		 * 
		 * Determine if user is author.
		 * 
		 * @return boolean Returns true if user is site author, or false when not.
		 * @link https://codex.wordpress.org/Roles_and_Capabilities
		 * @since 1.0.0
		 */
		public static function IsAuthor(){
			
			return self::CurrentUserCan('author');
		}
		
		
		/**
		 * IsContributor
		 * 
		 * Determine if user is contributor.
		 * 
		 * @return boolean Returns true if user is site contributor, or false when not.
		 * @link https://codex.wordpress.org/Roles_and_Capabilities
		 * @since 1.0.0
		 */
		public static function IsContributor(){
			
			return self::CurrentUserCan('contributor');
		}
		
		
		/**
		 * IsSubscriber
		 * 
		 * Determine if user is subscriber.
		 * 
		 * @return boolean Returns true if user is site subscriber, or false when not.
		 * @link https://codex.wordpress.org/Roles_and_Capabilities
		 * @since 1.0.0
		 */
		public static function IsSubscriber(){
			
			return self::CurrentUserCan('subscriber');
		}
		
	}
	
}
?>