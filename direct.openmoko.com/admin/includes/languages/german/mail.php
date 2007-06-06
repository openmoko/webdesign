<?php
/*
  $Id: mail.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Email an Kunden versenden');

define('TEXT_CUSTOMER', 'Kunde:');
define('TEXT_SUBJECT', 'Betreff:');
define('TEXT_FROM', 'Absender:');
define('TEXT_MESSAGE', 'Nachricht:');
define('TEXT_SELECT_CUSTOMER', 'Kunden ausw&auml;hlen');
define('TEXT_ALL_CUSTOMERS', 'Alle Kunden');
define('TEXT_NEWSLETTER_CUSTOMERS', 'An alle Newsletter-Abonnenten');

define('NOTICE_EMAIL_SENT_TO', 'Hinweis: Email wurde versendet an: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Fehler: Es wurde kein Kunde ausgew&auml;hlt.');
// MaxiDVD Added Line For WYSIWYG HTML Area: BOF
define('TEXT_EMAIL_BUTTON_TEXT', '<p><HR><b><font color="red">Durch die Aktivierung des HTML WYSIWYG Editors wurde der zurück Button deaktiviert.</b></font><br><br><b>Wenn Sie wirklich Ihre Emails vor dem Absenden noch einmal ansehen wollen, benutzen Sie bitte den "Vorschau" Button im WYSIWYG Editor.<br><HR>');
define('TEXT_EMAIL_BUTTON_HTML', '<p><HR><b><font color="red">HTML ist im Moment Abgeschaltet!</b></font><br><br>Wenn Sie eine HTML-Email versenden wollen, schalten Sie den WYSIWYG-Editor for Email in: Admin-->Configuration-->WYSIWYG Editor-->Optionen ein.<br>');
// MaxiDVD Added Line For WYSIWYG HTML Area: EOF

// Contact US Email Subject DMG
define('TEXT_EMAIL_SUBJECTS', '* Thema selektieren *');
define('EMAIL_SUBJECT', 'Mitteilung von ' . STORE_NAME. ': ');
?>