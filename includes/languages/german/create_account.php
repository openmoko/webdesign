<?php
/*
  $Id: create_account.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/


// MAIL VALIDATION START //
define('VALIDATE_YOUR_MAILADRESS', 'Click here to Validate/Activate Your account');
define('SECOND_LINK', '<B>Or you can manually copy and paste in the following link into your browsers window:</B><BR> ');
define('OR_VALIDATION_CODE', '<B>Your Validation Code is:</B> ');
define('MAIL_VALIDATION', '<FONT COLOR="#FF0000"><B>You have to validate/activate your account before you can login.</B></FONT><P><B>Please click on the link below to finish the account creation process:</B> ');
// MAIL VALIDATION END //

define('NAVBAR_TITLE', 'Konto erstellen');

define('HEADING_TITLE', 'Informationen zu Ihrem Kundenkonto');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>ACHTUNG:</b></font></small> Wenn Sie bereits ein Konto besitzen, so melden Sie sich bitte <a href="%s"><u><b>hier</b></u></a> an.');

define('EMAIL_SUBJECT', 'Willkommen zu ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Sehr geehrter Herr ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_MS', 'Sehr geehrte Frau ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_NONE', 'Hallo ' . stripslashes($HTTP_POST_VARS['firstname']) . ',' . "\n\n");
define('EMAIL_WELCOME', 'willkommen bei <b>' . STORE_NAME . '</b>.' . "\n\n");

define('EMAIL_TEXT', 'Sie k&ouml;nnen jetzt unseren <b>Online-Service</b> nutzen. Der Service bietet unter anderem:' . "\n\n" . '<li><b>Kundenwarenkorb</b> - Jeder Artikel bleibt registriert bis Sie zur Kasse gehen, oder die Artikel aus dem Warenkorb entfernen.' . "\n" . '<li><b>Adressbuch</b> - Wir k&ouml;nnen jetzt die Artikel zu der von Ihnen ausgesuchten Adresse senden. Der perfekte Weg ein Geburtstagsgeschenk zu versenden.' . "\n" . '<li><b>Vorherige Bestellungen</b> - Sie k&ouml;nnen jederzeit Ihre vorherigen Bestellungen &uuml;berpr&uuml;fen.' . "\n" . '<li><b>Meinungen &uuml;ber Artikel</b> - Teilen Sie Ihre Meinung zu unseren Artikeln mit anderen Kunden.' . "\n\n");
define('ADMIN_EMAIL_WELCOME', 'Application to become a wholesale customer of <b>' . STORE_NAME . '</b>.' . "\n\n");
define('ADMIN_EMAIL_TEXT', 'You have received an application to become a wholesale customer from your website.  Information regarding this application can be found at your online administration panel.' . "\n\n");

define('EMAIL_CONFIRMATION', 'Thank you for submitting your account information to our ' . STORE_NAME . "\n\n" . 'To finish your account setup please verify your e-mail address by clicking the link below: ' . "\n\n");
define('EMAIL_CONTACT', 'For help with any of our online services, please email the store-owner: ');
define('EMAIL_CONTACT_TEXT', '<a href=\"mailto:' . STORE_OWNER_EMAIL_ADDRESSS . '\">' . STORE_OWNER_EMAIL_ADDRESS . '</a>' . "\n\n");
define('EMAIL_WARNING', '<b>Note:</b> This Email address was given to us by one of our customers. If you did not signup to be a member, please send an email to ');
define('EMAIL_WARNING_TEXT', '<a href=\"mailto:' . STORE_OWNER_EMAIL_ADDRESS . '\">' . STORE_OWNER_EMAIL_ADDRESS . '</a>' . "\n");

/* ICW Credit class gift voucher begin */
define('EMAIL_GV_INCENTIVE_HEADER', "\n\n" .'Als Dankesch&ouml;n für Neukunden, haben wir Ihnen einen Geschenk-Gutschein im Wert von %s geschickt');
define('EMAIL_GV_REDEEM', 'Der Einl&ouml;secode für Ihren Geschenk-Gutschein lautet %s. Sie können diesen Einl&ouml;secode bei einem Einkauf an der Kasse einl&ouml;sen');
define('EMAIL_GV_LINK', 'oder wenn Sie diesem Link folgen ');
define('EMAIL_COUPON_INCENTIVE_HEADER', 'Glückwunsch! Damit Ihr erster Besuch in unserem Onlineshop eine lohnende Erfahrung wird, haben wir Ihnen einen Rabatt-Kupon zugesandt.' . "\n" .
                                        ' Unten finden Sie die Details zu dem f&uuml;r Sie erstellten Rabatt-Kupon' . "\n");
define('EMAIL_COUPON_REDEEM', 'Um den Kupon einzul&ouml;sen, geben Sie bitte diesen Einl&ouml;secode bei einem Einkauf an der Kasse ein: %s');
/* ICW Credit class gift voucher end */
define('HEADING_TITLE_CHECKOUT','Checkout Personal Info');// Added by sheetal for PWA form Title
?>
