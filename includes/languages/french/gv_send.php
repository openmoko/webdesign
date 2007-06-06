<?php
/*
  $Id: gv_send.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Envoi Des Bons Cadeaux');
define('NAVBAR_TITLE', 'Envoi Des Bons Cadeaux');
define('EMAIL_SUBJECT', 'Sujet ' . STORE_NAME);
define('HEADING_TEXT','<br>Entrez SVP ci-dessous les d&eacute;tails du bon cadeau que vous souhaitez envoyer. Pour plus d\'information, voyez SVP la notice <a href="' . tep_href_link(FILENAME_GV_FAQ,'','NONSSL').'">'.GV_FAQ.'.</a><br>');
define('ENTRY_NAME', 'Nom du Destinataire :');
define('ENTRY_EMAIL', 'Adresse d\'Email du Destinataire :');
define('ENTRY_MESSAGE', 'Message au destinataire :');
define('ENTRY_AMOUNT', 'Valeur du bon cadeau :');
define('ERROR_ENTRY_AMOUNT_CHECK', '&nbsp;&nbsp;<span class="errorText">Quantit&eacute; Impossible</span>');
define('ERROR_ENTRY_EMAIL_ADDRESS_CHECK', '&nbsp;&nbsp;<span class="errorText">Adresse Incorrecte d\'E-mail</span>');
define('MAIN_MESSAGE', 'Vous avez choisi d\'envoyer un bon cadeau d\'une valeur %s  &agrave; %s. Dont l\'adresse email est %s<br><br>Le texte accompagnant l\'email
sera <br><br>Cher %s<br><br>
                        Vous avez envoy&eacute; un bon cadeau de la valeur %s par %s');

define('PERSONAL_MESSAGE', '%s dit');
define('TEXT_SUCCESS', 'F&eacute;licitations, votre bon cadeau &agrave; &eacute;t&eacute; envoy&eacute; avec succ&egrave;s ');


define('EMAIL_SEPARATOR', '----------------------------------------------------------------------------------------');
define('EMAIL_GV_TEXT_HEADER', 'F&eacute;licitations, vous avez reçu un bon cadeau d\'une valeur %s');
define('EMAIL_GV_TEXT_SUBJECT', 'Un bon cadeau de %s');
define('EMAIL_GV_FROM', 'Ce bon cadeau vous a &eacute;t&eacute; envoy&eacute; par %s');
define('EMAIL_GV_MESSAGE', 'Avec le message suivant ');
define('EMAIL_GV_SEND_TO', 'Bonjour, %s');
define('EMAIL_GV_REDEEM', 'Pour utiliser ce bon cadeau, cliquez svp sur le lien ci-dessous. Veuillez noter &eacute;galement le code d\'utilisation qui est' . "\n" . ' %s ' . "\n" . 'Au cas où vous auriez des probl&egrave;mes.');
define('EMAIL_GV_LINK', 'Pour utiliser svp cliquez ');
define('EMAIL_GV_VISIT', ' ou visitez ');
define('EMAIL_GV_ENTER', ' et &eacute;crivez le code ');
define('EMAIL_GV_FIXED_FOOTER', 'Si vous avez des probl&egrave;mes pour envoyer le bon cadeau utilisez le lien automatis&eacute; ci-dessus, ' . "\n" .
                                'vous pouvez &eacute;galement &eacute;crire le code du bon cadeau pendant le proc&eacute;d&eacute; de contr&ocirc;le de notre magasin.' . "\n\n");
define('EMAIL_GV_SHOP_FOOTER', '');
?>