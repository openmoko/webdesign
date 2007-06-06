<?php
/*
  $Id: mail.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Envoyer un courrier &eacute;lectronique aux clients');

define('TEXT_CUSTOMER', 'Client :');
define('TEXT_SUBJECT', 'Sujet :');
define('TEXT_FROM', 'De :');
define('TEXT_MESSAGE', 'Message :');
define('TEXT_SELECT_CUSTOMER', 'Choisissez un client');
define('TEXT_ALL_CUSTOMERS', 'Tous les clients');
define('TEXT_NEWSLETTER_CUSTOMERS', 'Tous les abonn&eacute;s au bulletin d\'informations');

define('NOTICE_EMAIL_SENT_TO', 'Notification : Courrier &eacute;lectronique envoy&eacute; &agrave; : %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Erreur : Aucun client n\'a &eacute;t&eacute; s&eacute;lectionn&eacute;.');
// MaxiDVD Added Line For WYSIWYG HTML Area: BOF
define('TEXT_EMAIL_BUTTON_TEXT', '<p><HR><b><font color="red">Le bouton Retour a &eacute;t&eacute; d&eacute;sactiv&eacute; pendant que HTML WYSIWG Editor est actif,</b></font> Pourquoi? - Parce que si vous cliquez sur le bouton retour pour &eacute;diter votre message HTML, le PHP (php.ini - "Magic Quotes = On") va rajouter automatiquement "\\\\\\\" backslashes partout Double Quotes " apparaissent (HTML les utilise pour les liens, images etc) et cela d&eacute;r&eacute;gle le HTML et les images vont disparaitre lorsque vous &eacute;mettrez votre message, Si vous d&eacute;sactivez WYSIWYG Editor dans Admin la capacit&eacute; HTML d\'osCommerce est aussi d&eacute;sactiv&eacute; et le bouton retour r&eacute; apparait. <br><br><b>Si vous avez vraiment besoin de visualiser vos messages avant envoi, utilisez le bouton Preview dans WYSIWYG Editor.<br><HR>');
define('TEXT_EMAIL_BUTTON_HTML', '<p><HR><b><font color="red">HTML est actuellement d&eacute;sactiv&eacute;!</b></font><br><br>Si vous souhaitez envoyer un message au format HTML, Activez WYSIWYG Editor pour Email in: Admin-->Configuration-->WYSIWYG Editor-->Options<br>');
// MaxiDVD Added Line For WYSIWYG HTML Area: EOF

// Contact US Email Subject DMG
define('TEXT_EMAIL_SUBJECTS', '* select a subject *');
define('EMAIL_SUBJECT', 'Message from ' . STORE_NAME. ': ');
?>