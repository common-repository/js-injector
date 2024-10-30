<?php
/**
 * activate.php
 * 
 * @file ./activate.php
 * @package 77solutions.JSInjector
 * @author 77 Solutions, Matthew Lukas Mania
 * @license GPLv3
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 */
/*
This file is part of Custom JS Injector.

Custom JS Injector is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or any later version.

Custom JS Injector is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Custom JS Injector. If not, see https://www.gnu.org/licenses/gpl-3.0.txt.
*/


if(!defined('ABSPATH')){ exit; }


$_plugin -> OptionAdd('dashboard_js_head_enabled', false);
$_plugin -> OptionAdd('dashboard_js_head_code', '');
$_plugin -> OptionAdd('dashboard_js_head_code_safe', '');

$_plugin -> OptionAdd('dashboard_js_foot_enabled', false);
$_plugin -> OptionAdd('dashboard_js_foot_code', '');
$_plugin -> OptionAdd('dashboard_js_foot_code_safe', '');

$_plugin -> OptionAdd('login_js_head_enabled', false);
$_plugin -> OptionAdd('login_js_head_code', '');
$_plugin -> OptionAdd('login_js_head_code_safe', '');

$_plugin -> OptionAdd('login_js_foot_enabled', false);
$_plugin -> OptionAdd('login_js_foot_code', '');
$_plugin -> OptionAdd('login_js_foot_code_safe', '');

$_plugin -> OptionAdd('recovery_js_head_enabled', false);
$_plugin -> OptionAdd('recovery_js_head_code', '');
$_plugin -> OptionAdd('recovery_js_head_code_safe', '');

$_plugin -> OptionAdd('recovery_js_foot_enabled', false);
$_plugin -> OptionAdd('recovery_js_foot_code', '');
$_plugin -> OptionAdd('recovery_js_foot_code_safe', '');

$_plugin -> OptionAdd('register_js_head_enabled', false);
$_plugin -> OptionAdd('register_js_head_code', '');
$_plugin -> OptionAdd('register_js_head_code_safe', '');

$_plugin -> OptionAdd('register_js_foot_enabled', false);
$_plugin -> OptionAdd('register_js_foot_code', '');
$_plugin -> OptionAdd('register_js_foot_code_safe', '');

$_plugin -> OptionAdd('site_js_head_enabled', false);
$_plugin -> OptionAdd('site_js_head_code', '');
$_plugin -> OptionAdd('site_js_head_code_safe', '');

$_plugin -> OptionAdd('site_js_foot_enabled', false);
$_plugin -> OptionAdd('site_js_foot_code', '');
$_plugin -> OptionAdd('site_js_foot_code_safe', '');
?>