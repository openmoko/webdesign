<?php
/*
  $Id: tell_a_friend.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Faire connaitre à un(e) ami(e)');

define('HEADING_TITLE', 'Faire connaitre à un(e) ami(e):  \'%s\'');

define('FORM_TITLE_CUSTOMER_DETAILS', 'Vous');
define('FORM_TITLE_FRIEND_DETAILS', 'Votre ami(e)');
define('FORM_TITLE_FRIEND_MESSAGE', 'Votre message');

define('FORM_FIELD_CUSTOMER_NAME', 'Votre nom:');
define('FORM_FIELD_CUSTOMER_EMAIL', 'Votre adresse email:');
define('FORM_FIELD_FRIEND_NAME', 'Le nom de votre ami(e):');
define('FORM_FIELD_FRIEND_EMAIL', 'Son adresse email:');

define('TEXT_EMAIL_SUCCESSFUL_SENT', 'Votre email à propos de <b>%s</b> vient d\'être envoy&eacute; à <b>%s</b>.');

define('TEXT_EMAIL_SUBJECT', 'Votre ami(e) %s vous recommande cet article d\' %s');
define('TEXT_EMAIL_INTRO', '<b>Bonjour %s!</b><br><br>' . "\n\n" . 'Votre ami(e), %s, a pens&eacute; que vous pourriez être int&eacute;ress&eacute; par ce produit: ' . "<br><br>" . '<b>%s</b> d\' %s.'. "<br><br>");
define('TEXT_EMAIL_LINK', "<p></p>" . 'Pour aller voir cet article, cliquez sur le lien ou copiez/collez le lien ci-apr&egrave;s:' . "\n\n" . '<a target="_blank">%s</a>' . "<br><br>");
define('TEXT_EMAIL_LINK_ARTICLE', 'To view the article click on the link below or copy and paste the link into your web browser:' . "\n\n");
define('TEXT_EMAIL_LINK_TEXT', 'To view the product copy and paste the link into your web browser:' . "\n\n");
define('TEXT_EMAIL_LINK_ARTICLE_TEXT', 'To view the article copy and paste the link into your web browser:' . "\n\n");

define('TEXT_EMAIL_SIGNATURE', 'Cordialement,' . "\n\n");

define('ERROR_TO_NAME', 'Erreur: Le nom de votre ami(e) doit comporter au moins des caract&egrave;res.');
define('ERROR_TO_ADDRESS', 'Erreur: L\'adresse email de votre ami(e) doit &ecirc;tre une adresse valide.');
define('ERROR_FROM_NAME', 'Erreur: Votre nom doit comporter au moins des caract&egrave;res.');
define('ERROR_FROM_ADDRESS', 'Erreur: Votre adresse email doit &ecirc;tre une adresse valide.');
?>
