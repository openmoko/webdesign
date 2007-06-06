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

define('HEADING_TITLE', 'Geschenk-Gutschein versenden');
define('NAVBAR_TITLE', 'Geschenk-Gutschein versenden');
define('EMAIL_SUBJECT', 'Anfrage von ' . STORE_NAME);
define('HEADING_TEXT','<br>Bitte machen Sie unterhalb Angaben zum Geschenk-Gutschein, den Sie versenden m&ouml;chten. F&uuml;r weitere Informationen sehen Sie bitte in unsere <a href="' . tep_href_link(FILENAME_GV_FAQ,'','NONSSL').'">'.GV_FAQ.'.</a><br>');
define('ENTRY_NAME', 'Name des Empf&auml;ngers:');
define('ENTRY_EMAIL', 'Emailadresse des Empf&auml;ngers:');
define('ENTRY_MESSAGE', 'Nachricht an Empf&auml;nger:');
define('ENTRY_AMOUNT', 'Wert des Geschenk-Gutscheins:');
define('ERROR_ENTRY_AMOUNT_CHECK', '&nbsp;&nbsp;<span class="errorText">Ung&uuml;ltiger Wert</span>');
define('ERROR_ENTRY_EMAIL_ADDRESS_CHECK', '&nbsp;&nbsp;<span class="errorText">Ung&uuml;ltige Emailadresse</span>');
define('MAIN_MESSAGE', 'Sie haben entschieden einen Geschenk-Gutschein im Wert von %s an %s mit der Emailadresse %s zu versenden<br><br>Das Begleitschreiben wird folgendermassen aussehen:<br><br>Hallo %s<br><br>
                        Ihnen wurde ein Geschenk-Gutschein im Wert von %s durch %s zugesandt');

define('PERSONAL_MESSAGE', '%s sagt');
define('TEXT_SUCCESS', 'Gl&uuml;ckwunsch, Ihr Geschenk-Gutschein wurde erfolgreich versandt');


define('EMAIL_SEPARATOR', '----------------------------------------------------------------------------------------');
define('EMAIL_GV_TEXT_HEADER', 'Glückwunsch, Sie haben einen Geschenk-Gutschen im Wert von %s erhalten');
define('EMAIL_GV_TEXT_SUBJECT', 'Ein Geschenk von %s');
define('EMAIL_GV_FROM', 'Dieser Geschenk-Gutschein wurde Ihnen von %s zugesandt');
define('EMAIL_GV_MESSAGE', 'mit folgendem Begleitschreiben ');
define('EMAIL_GV_SEND_TO', 'Hallo, %s');
define('EMAIL_GV_REDEEM', 'Um diesen Geschenk-Gutschein einzul&ouml;sen, klicken Sie bitte auf den Link unterhalb. Bitte notieren Sie sich auch den Einl&ouml;se-Code, welcher lautet %s. (F&uuml;r den Fall, daß Probleme auftauchen)');
define('EMAIL_GV_LINK', 'Zum Einl&ouml;sen klicken Sie bitte ');
define('EMAIL_GV_VISIT', ' oder besuchen Sie ');
define('EMAIL_GV_ENTER', ' und geben Sie diesen Code ein: ');
define('EMAIL_GV_FIXED_FOOTER', 'Wenn Sie Probleme haben, den Gutschen mit dem automatisierten Link oberhalb einzulösen, ' . "\n" .
                                'k&ouml;nnen Sie auch den Geschenk-Gutschein Code auch an der Kasse unseres Online-Shops einl&ouml;sen.' . "\n\n");
define('EMAIL_GV_SHOP_FOOTER', '');
?>