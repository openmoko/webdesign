<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_EUTRANSFER_TEXT_TITLE', 'EU-Standard Bank Transfer');
  define('MODULE_PAYMENT_EUTRANSFER_TEXT_DESCRIPTION', '<BR>Die billigste und einfachste Zahlungsmethode innerhalb der EU ist die Überweisung mittels IBAN und BIC.' .
                                                       '<BR>Name der Bank: ' . MODULE_PAYMENT_EUTRANSFER_BANKNAM .
                                                       '<BR>Zweigstelle: ' . MODULE_PAYMENT_EUTRANSFER_BRANCH .
                                                       '<BR>Kontoname: ' . MODULE_PAYMENT_EUTRANSFER_ACCNAM .
                                                       '<br>Kontonummer: ' . MODULE_PAYMENT_EUTRANSFER_ACCNUM .
                                                       '<BR>IBAN:: ' . MODULE_PAYMENT_EUTRANSFER_ACCIBAN .
                                                       '<BR>BIC/SWIFT: ' . MODULE_PAYMENT_EUTRANSFER_BANKBIC .
//                                                     '<BR>Sort Code: ' . MODULE_PAYMENT_EUTRANSFER_SORTCODE .
                                                       '<BR><BR>Die Ware wird ausgeliefert wenn der Betrag auf unserem Konto eingegangen ist.<BR>');
  define('MODULE_PAYMENT_EUTRANSFER_TEXT_EMAIL_FOOTER', str_replace('<BR>','\n',MODULE_PAYMENT_EUTRANSFER_TEXT_DESCRIPTION));

?>
