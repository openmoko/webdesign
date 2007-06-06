<?php
/*
  ec.php, v 1.0 09/06/2005

  Copyright (c) 2005 POSTOSC.COM

  Released under the GNU General Public License

  Absolutely no warranty. Use at your own risk.
*/

chdir('../../../../');
require('includes/application_top.php');

if(isset($_GET['token'])) {
  tep_session_register('paypal_token');
  $paypal_token = $_GET['token'];
  tep_redirect(tep_href_link(FILENAME_CHECKOUT_CONFIRMATION, '', 'SSL'));
}

require('includes/application_bottom.php');
?>
