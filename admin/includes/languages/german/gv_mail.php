<?php
/*
  $Id: gv_mail.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Geschenk-Gutschein an Kunden versenden');

define('TEXT_CUSTOMER', 'Kunde:');
define('TEXT_SUBJECT', 'Betreff:');
define('TEXT_FROM', 'Absender:');
define('TEXT_TO', 'Email an:');
define('TEXT_AMOUNT', 'Betrag:');
define('TEXT_MESSAGE', 'Nachricht:');
define('TEXT_SINGLE_EMAIL', '<span class="smallText">Use this for sending single emails, otherwise use dropdown above</span>');
define('TEXT_SELECT_CUSTOMER', 'Kunden ausw&auml;hlen');
define('TEXT_ALL_CUSTOMERS', 'Alle Kunden');
define('TEXT_NEWSLETTER_CUSTOMERS', 'An alle Newsletter-Abonnenten');

define('NOTICE_EMAIL_SENT_TO', 'Hinweis: Email wurde versendet an: %s');
define('ERROR_NO_CUSTOMER_SELECTED', 'Fehler: Es wurde kein Kunde ausgew&auml;hlt.');
define('ERROR_NO_AMOUNT_SELECTED', 'Fehler: Sie haben keinen Betrag f&uuml;r den Gutschein eingegeben.');

define('TEXT_TO_REDEEM1', 'You can also redeem this Gift Voucher during checkout. Just enter the code in the box provided, and click on the redeem button. ');
define('TEXT_GV_WORTH', 'Geschenk-Gutscheinwert ');
define('TEXT_TO_REDEEM', 'Um den Gutschein einzul&ouml;sen, klicken Sie auf den unten stehenden Link. Bitte notieren Sie sich den Gutschein-Code.');
define('TEXT_REMEMBER', 'Please do not lose the coupon code, make sure to keep the code safe so you can benefit from this special offer');
define('TEXT_WHICH_IS', 'welcher lautet');
define('TEXT_IN_CASE', ' falls Sie Probleme haben.');
define('TEXT_OR_VISIT', 'oder besuchen Sie ');
define('TEXT_ENTER_CODE', ' und geben den Gutschein-Code ein ');

define('TEXT_REDEEM_COUPON_MESSAGE_HEADER', 'Sie haben k&uuml;rzlich einen Geschenk-Gutschein von unserem Online-Shop erworben.' . "\n"
                                          . 'Aus Sicherheitsgr&uuml;nden wurde Ihnen dieser nicht unmittelbar danach zur Verf&uuml;gung gestellt.' . "\n"
                                          . 'Nun wurde der Gutscheinbetrag freigegeben. Sie k&ouml;nnen nun unseren Online-Shop besuchen' . "\n"
                                          . 'und diesen Gutschein per Email an jemanden versenden.' . "\n\n");
define ('TEXT_REDEEM_COUPON_MESSAGE_AMOUNT', "\n\n" . 'Der Wert des Geschenk-Gutscheins ist %s');
define ('TEXT_REDEEM_COUPON_MESSAGE_BODY', "\n\n" . 'Sie k&ouml;nnen nun unsere Seite besuchen, sich anmelden und danach den Gutschein per Email an jemanden versenden.');
define ('TEXT_REDEEM_COUPON_MESSAGE_FOOTER', "\n\n");

// MaxiDVD Added Line For WYSIWYG HTML Area: BOF
define('TEXT_EMAIL_BUTTON_TEXT', '<p><HR><b><font color="red">The Back Button has been DISABLED while HTML WYSIWG Editor is turned ON.</b></font><HR>');
define('TEXT_EMAIL_BUTTON_HTML', '<p><HR><b><font color="red">HTML is currently Disabled!</b></font><br><br>If you want to send HTML email, Enable WYSIWYG Editor for Email in: Admin-->Configuration-->WYSIWYG Editor-->Options<br>');
// MaxiDVD Added Line For WYSIWYG HTML Area: EOF
?>