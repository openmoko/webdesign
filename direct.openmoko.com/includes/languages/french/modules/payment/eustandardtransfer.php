<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_EUTRANSFER_TEXT_TITLE', 'EU - Virement bancaire Standard');
  define('MODULE_PAYMENT_EUTRANSFER_TEXT_DESCRIPTION', '<BR>Veuillez employer les détails suivants pour transférer votre somme:<BR>' .
                                                         '<BR>Nom de la banque: ' . MODULE_PAYMENT_EUTRANSFER_BANKNAM .
                                                         '<BR>Branche: ' . MODULE_PAYMENT_EUTRANSFER_BRANCH .
                                                         '<BR>Nom du compte: ' . MODULE_PAYMENT_EUTRANSFER_ACCNAM .
                                                         '<br>No. compte: ' . MODULE_PAYMENT_EUTRANSFER_ACCNUM .
                                                         '<BR>IBAN:: ' . MODULE_PAYMENT_EUTRANSFER_ACCIBAN .
                                                         '<BR>BIC/SWIFT: ' . MODULE_PAYMENT_EUTRANSFER_BANKBIC .
//                                                         '<BR>Code: ' . MODULE_PAYMENT_EUTRANSFER_SORTCODE .
                                                         '<BR><BR>Votre commande sera envoyer dès que nous recevrons l\'accord de virement.<BR>');
  define('MODULE_PAYMENT_EUTRANSFER_TEXT_EMAIL_FOOTER', str_replace('<BR>','\n',MODULE_PAYMENT_EUTRANSFER_TEXT_DESCRIPTION));

?>
