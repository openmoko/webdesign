<?php
/*
  $Id: moneyorder.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

  define('MODULE_PAYMENT_MONEYORDER_TEXT_TITLE', 'Paiement par ch&egrave;que');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_DESCRIPTION', '<br>Etablir le ch&egrave;que &agrave; l\'ordre de :&nbsp;<br>' . MODULE_PAYMENT_MONEYORDER_PAYTO . '<br><br>Envoyer &agrave; :<br>' . nl2br(STORE_NAME_ADDRESS) . '<br><br>' . 'Votre commande ne sera envoy&eacute;e qu\'&agrave; r&eacute;ception du r&egrave;glement et de sa validation par notre banque.');
  define('MODULE_PAYMENT_MONEYORDER_TEXT_EMAIL_FOOTER', '<br>Etablir le ch&egrave;que &agrave; l\'ordre de :&nbsp;<br>'. MODULE_PAYMENT_MONEYORDER_PAYTO . '<br><br>Envoyer &agrave;:<br>' . STORE_NAME_ADDRESS . '' . '<br><br>Votre commande ne sera envoy&eacute;e qu\'&agrave; r&eacute;ception du r&egrave;glement et de sa validation par notre banque.');
?>
