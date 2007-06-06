<?php
/*
  $Id: create_account_success.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Konto erstellen');
define('NAVBAR_TITLE_2', 'Erfolg');
define('HEADING_TITLE', 'Ihr Konto wurde erfolgreich er&ouml;ffnet!');
define('TEXT_ACCOUNT_CREATED', 'Herzlichen Gl&uuml;ckwunsch! Ihr neues Konto wurde erfolgreich er&ouml;ffnet! Sie k&ouml;nnen jetzt &uuml;ber Ihr Kundenkonto unseren \'Online-Service\' effizienter nutzen. Wenn Sie Fragen zum diesem Online-Shop haben, wenden Sie sich bitte an den <a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '"><u>Vertrieb</u></a>.<br><br>Eine Best&auml;tigung &uuml;ber Ihr neues Konto wird Ihnen zugesandt. Falls Sie diese Email nicht innerhalb einer Stunde erhalten, wenden Sie sich bitte an den <a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '"><u>Vertrieb</u></a>.');
define('TEXT_ACCOUNT_CREATED1', 'Congratulations, Your new account has been successfully created, You can now take advantage of member privileges to enhance your online shopping experience with us. If you have <small><b>ANY</b></small> questions about the operation of this online shop, please email the <a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">store owner</a> ' ;
?>