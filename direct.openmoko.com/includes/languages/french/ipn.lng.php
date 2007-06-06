<?php
/*
  $Id: ipn.lng.php,v 2.6a 2004/07/14 devosc Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  DevosC, Developing open source Code
  http://www.devosc.com

  Copyright (c) 2002 osCommerce
  Copyright (c) 2004 DevosC.com

  Released under the GNU General Public License
*/

  define('UNKNOWN_TXN_TYPE', 'Type De Transaction Inconnue');
  define('UNKNOWN_TXN_TYPE_MSG', 'Une transaction inconnue (%s) provenant de ' . $_SERVER['REMOTE_ADDR'] . "\nAvez-vous fait tous les tests?\n\n");
  define('UNKNOWN_POST', 'Message inconnu');
  define('UNKNOWN_POST_MSG', "Un MESSAGE inconnu de %s a &eacute;t&eacute; reçu.\nAvez-vous fait tous les tests?\n\n");
  define('EMAIL_SEPARATOR', "------------------------------------------------------");
  define('RESPONSE_VERIFIED', 'V&eacute;rifi&eacute;');
  define('RESPONSE_MSG', "Type de connection\n".EMAIL_SEPARATOR."\ncurl= %s, socket= %s, domain= %s, port= %s \n\nResponse PayPal\n".EMAIL_SEPARATOR."\n%s \n\n");
  define('RESPONSE_INVALID', 'Response PayPal invalide');
  define('RESPONSE_UNKNOWN', 'V&eacute;rification inconnue');
  define('EMAIL_RECEIVER', 'Configuration ID email et boutique');
  define('EMAIL_RECEIVER_MSG', "Configuration propri&eacute;t&eacute;s boutique\nPremi&egrave;re adresse email PayPal: %s\nBoutique ID: %s\n".EMAIL_SEPARATOR."\nConfiguration propri&eacute;t&eacute;s PayPal\nPremi&egrave;re adresse email PayPal: %s\nBoutique ID: %s\n\n");
  define('EMAIL_RECEIVER_ERROR_MSG', "Configuration propri&eacute;t&eacute;s boutique\nPremi&egrave;re adresse email PayPal: %s\nBoutique ID: %s\n".EMAIL_SEPARATOR."\nConfiguration propri&eacute;t&eacute;s PayPal\nPremi&egrave;re adresse email PayPal: %s\nBoutique ID: %s\n\nTransaction PayPal ID: %s\n\n");
  define('TXN_DUPLICATE', 'Dupliquer transaction');
  define('TXN_DUPLICATE_MSG', "La transaction IPN dupliquer (%s) a &eacute;t&eacute; reçu.\nV&eacute;rifiez votre compte PayPal\n\n");
  define('IPN_TXN_INSERT', "IPN INSÉRÉ");
  define('IPN_TXN_INSERT_MSG', "IPN %s a &eacute;t&eacute; ins&eacute;r&eacute;\n\n");
  define('CHECK_CURRENCY', 'Validez la devise');
  define('CHECK_CURRENCY_MSG', "Devise incorrecte\nPayPal: %s\nosC: %s\n\n");
  define('CHECK_TXN_SIGNATURE', 'Validez la signature de transaction de PayPal_Shopping_Cart');
  define('CHECK_TXN_SIGNATURE_MSG', "Signature incorrecte\nPayPal: %s\nosC: %s\n\n");
  define('CHECK_TOTAL', 'Valider le montant total de la transaction');
  define('CHECK_TOTAL_MSG', "Total incorrect\nPayPal: %s\nSession: %s\n\n");
  define('DEBUG', 'Corriger');
  define('DEBUG_MSG', "\nMessage original\n".EMAIL_SEPARATOR."\n%s\n\n\nMessage reconstruit\n".EMAIL_SEPARATOR."\n%s\n\n");
  define('PAYMENT_SEND_MONEY_DESCRIPTION', 'Somme transf&eacute;r&eacute;e');
  define('PAYMENT_SEND_MONEY_DESCRIPTION_MSG', "Vous avez reçu un paiement de %s %s \n".EMAIL_SEPARATOR."\nCe paiement a &eacute;t&eacute; envoy&eacute; par une personne du site PayPal, en utilisant le lien ENVOYER ARGENT\n\n");
  define('TEST_INCOMPLETE', 'Test invalide');
  define('TEST_INCOMPLETE_MSG', "Une erreur s'est produite, la plupart du temps à cause du champ de la commande dans le panneau d\'essai d\'Ipn qui n\'a pas eu une identification valide de transaction.\n\n\n");
  define('HTTP_ERROR', 'Erreur HTTP');
  define('HTTP_ERROR_MSG', "Une erreur HTTP s'est produite durant l\'identification\n".EMAIL_SEPARATOR."\ncurl= %s, socket= %s, domain= %s, port= %s\n\n");
?>
