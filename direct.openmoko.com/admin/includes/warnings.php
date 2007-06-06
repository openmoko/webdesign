<?php
//check for encryption key
    /*  Removed because the configuration keys are already loaded
    $encrypt_query = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_PATH'");
    $encrypt = tep_db_fetch_array($encrypt_query);
    $encrypt_path = $encrypt['configuration_value'];
    $crypt_query1 = tep_db_query("select configuration_id, configuration_title, configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'PAYMENT_CC_CRYPT_FILE'");
    $encrypt1 = tep_db_fetch_array($crypt_query1);
    $encrypt_file = $encrypt1['configuration_value'];
    */
  if ( defined('PAYMENT_CC_CRYPT_PATH') ) $encrypt_path = PAYMENT_CC_CRYPT_PATH;
  if ( defined('PAYMENT_CC_CRYPT_FILE') ) $encrypt_file = PAYMENT_CC_CRYPT_FILE;

  if (!(is_file(DIR_FS_CATALOG . DIR_WS_INCLUDES . $encrypt_path . $encrypt_file) ) ){
      $messageStack->add('header', WARNING_ENCRYPT_FILE_MISSING, 'warning');
    }

// check if the 'install' directory exists, and warn of its existence
  if (WARN_INSTALL_EXISTENCE == 'true') {
    if (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/../install')) {
      $messageStack->add('header', WARNING_INSTALL_DIRECTORY_EXISTS, 'warning');
    }
  }

// Eversun mod for upgrade database from 6.15 to 6.2
// check if the 'upgrades' directory exists, and warn of its existence
  if (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/../upgrades')) {
    $messageStack->add('header', WARNING_UPGRADES_DIRECTORY_EXISTS, 'warning');
  }
// Eversun mod end for upgrade database from 6.15 to 6.2

// check if the admin configure.php file is writeable
  if (WARN_CONFIG_WRITEABLE == 'true') {
    if ( (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) && (is_writeable(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) ) {
      $messageStack->add('header', WARNING_CONFIG_FILE_WRITEABLE, 'warning');
    }
  }
  
// check if the catalog configure.php file is writeable
  if (WARN_CONFIG_WRITEABLE == 'true') {
    if ( (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/../includes/configure.php')) && (is_writeable(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/../includes/configure.php')) ) {
      $messageStack->add('header', WARNING_CONFIG_FILE_WRITEABLE_CATALOG, 'warning');
    }
  }
// check if the session folder is writeable
  if (WARN_SESSION_DIRECTORY_NOT_WRITEABLE == 'true') {
    if (STORE_SESSIONS == '') {
      if (!is_dir(tep_session_save_path())) {
        $messageStack->add('header', WARNING_SESSION_DIRECTORY_NON_EXISTENT, 'warning');
      } elseif (!is_writeable(tep_session_save_path())) {
        $messageStack->add('header', WARNING_SESSION_DIRECTORY_NOT_WRITEABLE, 'warning');
      }
    }
  }


// give the visitors a message that the website will be down at ... time
  if ( (WARN_BEFORE_DOWN_FOR_MAINTENANCE == 'true') && (DOWN_FOR_MAINTENANCE == 'false') ) {
       $messageStack->add('header', TEXT_BEFORE_DOWN_FOR_MAINTENANCE . PERIOD_BEFORE_DOWN_FOR_MAINTENANCE, 'warning');
  }


// this will let the admin know that the website is DOWN FOR MAINTENANCE to the public
  if ( (DOWN_FOR_MAINTENANCE == 'true') && (EXCLUDE_ADMIN_IP_FOR_MAINTENANCE == getenv('REMOTE_ADDR')) ) {
       $messageStack->add('header', TEXT_ADMIN_DOWN_FOR_MAINTENANCE, 'warning');
  }

// check session.auto_start is disabled
  if ( (function_exists('ini_get')) && (WARN_SESSION_AUTO_START == 'true') ) {
    if (ini_get('session.auto_start') == '1') {
      $messageStack->add('header', WARNING_SESSION_AUTO_START, 'warning');
    }
  }
  //download directory not writable

  if ( (WARN_DOWNLOAD_DIRECTORY_NOT_READABLE == 'true') && (DOWNLOAD_ENABLED == 'true') ) {
    if (!is_dir(DIR_FS_CATALOG . 'download/')) {
      $messageStack->add('header', WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT, 'warning');
    }
  }
  
//check for temp
    if (!is_writeable(DIR_FS_CATALOG . 'tmp/')) {
      $messageStack->add('header', WARNING_TMP_DIRECTORY_NON_EXISTENT, 'warning');
    }
  
  
// check if a default currency is set
  if (!defined('DEFAULT_CURRENCY')) {
    $messageStack->add(ERROR_NO_DEFAULT_CURRENCY_DEFINED, 'error');
  }

// check if a default language is set
  if (!defined('DEFAULT_LANGUAGE')) {
    $messageStack->add(ERROR_NO_DEFAULT_LANGUAGE_DEFINED, 'error');
  }
//file up loads
  if (function_exists('ini_get') && ((bool)ini_get('file_uploads') == false) ) {
    $messageStack->add(WARNING_FILE_UPLOADS_DISABLED, 'warning');
  }

  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
  
  if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerError">
    <td class="headerError"><?php echo htmlspecialchars(urldecode($HTTP_GET_VARS['error_message'])); ?></td>
  </tr>
</table>
<?php
  }

  if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerInfo">
    <td class="headerInfo"><?php echo htmlspecialchars($HTTP_GET_VARS['info_message']); ?></td>
  </tr>
</table>
<?php
  }
?>
