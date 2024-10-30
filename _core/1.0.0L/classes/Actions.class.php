<?php
/**
 * Actions.class.php
 * 
 * @file ./_core/1.0.0/classes/Actions.class.php
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
	 * Actions class (final).
	 * 
	 * @package 77solutions.WP77L
	 * @since 1.0.0
	 */
	final class Actions{
		
		/**
		 * Has
		 * 
		 * Check if any action has been registered for a hook.
		 * 
		 * @param string $tag The name of the action hook.
		 * @param callable|boolean $function_to_check The callback to check for.
		 * @return int|boolean If $function_to_check is omitted, returns boolean for whether the hook has anything registered. When checking a specific function, the priority of that hook is returned, or false if the function is not attached. When using the $function_to_check argument, this function may return a non-boolean value that evaluates to false (e.g.) 0, so use the === operator for testing the return value.
		 * @link https://developer.wordpress.org/reference/functions/has_action/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Has($tag, $function_to_check=false){
			
			// Introduced: 2.5.0
			return \has_action($tag, $function_to_check);
		}
		
		
		/**
		 * Add
		 * 
		 * Hooks a function on to a specific action.
		 * 
		 * @param string $tag The name of the action to which the $function_to_add is hooked.
		 * @param callable $function_to_add The name of the function you wish to be called.
		 * @param int $priority Used to specify the order in which the functions associated with a particular action are executed. Lower numbers correspond with earlier execution, and functions with the same priority are executed in the order in which they were added to the action.
		 * @param int $accepted_args The number of arguments the function accepts.
		 * @return true Will always return true.
		 * @link https://developer.wordpress.org/reference/functions/add_action/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Add($tag, $function_to_add, $priority=10, $accepted_args=1){
			
			// Introduced: 1.2.0
			return \add_action($tag, $function_to_add, $priority, $accepted_args);
		}
		
		
		/**
		 * Execute
		 * 
		 * Execute functions hooked on a specific action hook.
		 * 
		 * @param string $tag The name of the action to be executed.
		 * @param mixed $arg Additional arguments which are passed on to the functions hooked to the action.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/do_action/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Execute($tag, $arg=''){
			
			// Introduced: 1.2.0
			return \do_action($tag, $arg);
		}
		
		
		/**
		 * ExecuteRefArray
		 * 
		 * Execute functions hooked on a specific action hook, specifying arguments in an array.
		 * 
		 * @param string $tag The name of the action to be executed.
		 * @param array $args The arguments supplied to the functions hooked to $tag.
		 * @return void This method not returns any value.
		 * @link https://developer.wordpress.org/reference/functions/do_action_ref_array/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function ExecuteRefArray($tag, $args){
			
			// Introduced: 2.1.0
			return \do_action_ref_array($tag, $args);
		}
		
		
		/**
		 * Did
		 * 
		 * Retrieve the number of times an action is fired.
		 * 
		 * @param string $tag The name of the action hook.
		 * @return int The number of times action hook $tag is fired.
		 * @link https://developer.wordpress.org/reference/functions/did_action/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Did($tag){
			
			// Introduced: 2.1.0
			return \did_action($tag);
		}
		
		
		/**
		 * Remove
		 * 
		 * Removes a function from a specified action hook.
		 * 
		 * @param string $tag The action hook to which the function to be removed is hooked.
		 * @param callable $function_to_remove The name of the function which should be removed.
		 * @param int $priority The priority of the function.
		 * @return boolean Whether the function is removed.
		 * @link https://developer.wordpress.org/reference/functions/remove_action/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Remove($tag, $function_to_remove, $priority=10){
			
			// Introduced: 1.2.0
			return \remove_action($tag, $function_to_remove, $priority);
		}
		
		
		/**
		 * RemoveAll
		 * 
		 * Remove all of the hooks from an action.
		 * 
		 * @param string The action to remove hooks from.
		 * @param int|boolean $priority The priority number to remove them from.
		 * @return true Returns true when finished.
		 * @link https://developer.wordpress.org/reference/functions/remove_all_actions/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function RemoveAll($tag, $priority=false){
			
			// Introduced: 2.7.0
			return \remove_all_actions($tag, $priority);
		}
		
		
		/**
		 * Doing
		 * 
		 * Retrieve the name of an action currently being processed.
		 * 
		 * @param string|null $action Action to check. Defaults to null, which checks if any action is currently being run.
		 * @return boolean Whether the action is currently in the stack.
		 * @link https://developer.wordpress.org/reference/functions/doing_action/
		 * @link https://adambrown.info/p/wp_hooks/version/3.1
		 * @since 1.0.0
		 */
		public static function Doing($action=null){
			
			return Filters::Doing($action);
		}
		
	}
	
}
?>