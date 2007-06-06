<?php
/*
  $Id: general.php,v 1.160 2003/07/12 08:32:47 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define ('HEADING_TITLE', 'Manage Key Files');
define ('HELP_URL', DIR_WS_ADMIN . 'et_help/index.html');

define('BUTTON_TEXT_SAVE_CHANGES', 'Save Changes');
define('BUTTON_TEXT_RESTORE_FILE', 'Restore File');
define('BUTTON_TEXT_RETURN_MAIN_EDIT', 'Return to Configuration');
define('TEXT_RETURN_MAIN', 'Return to main file list');

define('ERROR_TEXT_FILE_LOCKED', "ERROR: File '%s' is not writable");
define('ERROR_TEXT_FILE_LOCKED1', "ERROR: The Key file: %s is not writable, to Edit the key you must change it's permissions to 777");

define('ERROR_TEXT_FILE_OK', "Ok to edit the key file: %s it is writable");


define('TEXT_HIDE_NAVIGATION', 'Hide Navigation');
define('TEXT_SHOW_NAVIGATION', 'Show Navigation');

define('TEXT_HELP_HELP', 'Quick Help');
define('TEXT_HELP_HELP1', '1. Click on edit button to edit.');
define('TEXT_HELP_HELP2', '2. When finished editing, Click on save.');
define('TEXT_HELP_HELP3', '3. Onced saved, click on restore to revert back to orginal file.');
define('TEXT_HELP_HELP4', '4. Click on create button to create new key file.');
define('TEXT_HELP_HELP5', '5. Click on return button to return to main Manage Key screen.');

define('TEXT_CRYPT_MESSAGE_1', 'Primary key file');
define('TEXT_CRYPT_MESSAGE_2', 'New key file');
define('TEXT_CRYPT_MESSAGE_3', 'Unkown');

define('TABLE_HEADING_FILE_TYPE', 'File type');
define('TABLE_HEADING_FILE_NAME', 'File name');
define('TABLE_HEADING_FILE_ACTION', 'Action');

define('EDIT_ACTION', 'Edit :');
define('SAVED_ACTION', 'Saved file :');
?>
