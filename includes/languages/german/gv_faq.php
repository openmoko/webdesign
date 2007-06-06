<?php
/*
  $Id: gv_faq.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Geschenk-Gutschein FAQ');
define('HEADING_TITLE', 'Geschenk-Gutschein FAQ');

define('TEXT_INFORMATION', '<a name="Top"></a>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=1','NONSSL').'">Geschenk-Gutscheine kaufen</a><br>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=2','NONSSL').'">Wie Sie Geschenk-Gutscheine versenden</a><br>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=3','NONSSL').'">Einkaufen mit Geschenkgutscheinen</a><br>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=4','NONSSL').'">Einl&ouml;sen von Geschenk-Gutscheinen</a><br>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=5','NONSSL').'">Wenn Probleme auftauchen</a><br>
');
switch ($HTTP_GET_VARS['faq_item']) {
  case '1':
define('SUB_HEADING_TITLE','Geschenk-Gutscheine kaufen.');
define('SUB_HEADING_TEXT','Geschenk-Gutscheine werden genauso wie andere Artikel in unserem Shop gekauft.
  Sie k&ouml;nnen diese auch durch die Standard-Zahlungsweise des Shops bezahlen.
  Sobald gekauft, wird der Wert des Geschenk-Gutscheines zu Ihrem pers&ouml;nlichen
  Geschenk-Gutschein Konto gebucht. Wenn Sie Guthaben auf Ihrem Geschenk-Gutschein Konto haben,
  wird der Gegenwert in der Warenkorb-Box angezeigt, und ein Link zu der Seite hergestellt,
  von der aus Sie den Gutschein an jemanden per email versenden k&ouml;nnen.');
  break;
  case '2':
define('SUB_HEADING_TITLE','Wie Sie Geschenk-Gutscheine versenden.');
define('SUB_HEADING_TEXT','Um einen Geschenk-Gutschein zu senden, m&uuml;ssen Sie unsere Geschenk-Gutschein-Seite besuchen.
  Sie k&ouml;nnen den Link zu dieser Seite in der Warenkorb-Box an der rechtsseitigen Spalte auf jeder Seite finden.
  Wenn Sie einen Geschenk-Gutschein versenden, m&uuml;ssen Sie folgendes angeben:
  - Name und Email Adresse des Geschenk-Gutschein-Empf&auml;ngers
  - Der Wert, den Sie versenden wollen. (Beachten Sie: Sie m&uuml;ssen nicht den gesamten Betrag auf einmal versenden,
    den Sie auf Ihrem Geschenk-Gutschein-Konto zur Verf&uuml; gung haben.)
  - Eine kurze Nachricht an den Empf&auml;nger, welche in der Email stehen wird.
  Bitte stellen Sie sicher, dass Sie die Informationen korrekt eingegeben haben, obgleich
  Sie nat&uuml;rlich die M&ouml;glichkeit haben, diese Informationen vor dem Versenden der Email beliebig zu &auml;ndern.');
  break;
  case '3':
  define('SUB_HEADING_TITLE','Einkaufen mit Geschenkgutscheinen.');
  define('SUB_HEADING_TEXT','Wenn Sie &uuml;ber Guthaben auf Ihrem Gutschein-Konto verf&uuml;gen, k&ouml;nnen Sie damit Artikel aus dem Onlineshop kaufen.
  An der Kasse wird eine zus&auml;tzliche Checkbox erscheinen.
  Wenn Sie das H&auml;kchen dort setzen, wird der Ihr Einkauf mit dem Gutschein-Konto verrechnet.
  Bitte beachten Sie, dass falls Ihr Guthaben auf dem Gutschein-Konto die Kosten des Einkaufs nicht abdecken sollte, m&uuml;ssen Sie noch eine andere Zahlungsmethode w&auml;hlen.
  Sollte Ihr Guthaben auf den Gutschein-Konto gr&ouml;ßer sein als Ihre Rechnungssumme, verbleibt der Restbetrag auf Ihrem Gutschrift-Konto für zuk&uuml;nftige Eink&auml;ufe.');
  break;
  case '4':
  define('SUB_HEADING_TITLE','Einl&ouml;sen von Geschenk-Gutscheinen.');
  define('SUB_HEADING_TEXT','Wenn Sie einen Geschenk-Gutschein per E-Mail bekommen, enth&auml;lt diese Angaben dar&uuml;ber, wer Ihnen diesen Gutschein gesendet hat; evtl. mit einer kurzen Nachricht des Absenders.
  Die E-Mail enth&auml;lt auch die Geschenk-Gutschein-Nummer.
  Eine gute Idee ist es, sich einen Ausdruck dieser Email zu machen um sp&auml;ter Bezug darauf nehmen zu k&ouml;nnen.
  Sie k&ouml;nnen den Geschenk-Gutschein nun auf zwei Arten einl&ouml;sen<br>
    1. Durch klicken des Links in dieser Email:<br>
    Dadurch gelangen Sie direkt zur Seite "Gutschein einl&ouml;sen".
    Bevor der Geschenkgutschein &uuml;berpr&uuml;ft wird und auf Ihr Geschenk-Gutschein-Konto gebucht werden kann, sind Sie aufgefordert, ein Konto zu er&ouml;ffnen.
    Die Einrichtung dieses Kontos ist für Sie kostenlos und ohne Verpflichtungen.
    2. Auf der Kasse-Seite beim W&auml;hlen der Zahlungsmethode ist ein Feld für den Gutschein-Code vorgesehen.
    Geben Sie dort den Code ein und klicken sie auf den "Einl&ouml;sen" Button.
    Der Code wird nach erfolgter &Uuml;berpr&uuml;fung Ihrem Geschenk-Gutschein-Konto gutgeschrieben.
    Sie k&ouml;nnen den Betrag nun f&uuml;r jeden Artikel unseres Online-Shops verwenden.');
  break;
  case '5':
  define('SUB_HEADING_TITLE','Wenn Probleme auftauchen.');
  define('SUB_HEADING_TEXT','F&uuml;r alle das Geschenk-Gutschein-System betreffenden Anfragen, kontaktieren Sie uns bitte
  per Email an '. STORE_OWNER_EMAIL_ADDRESS . '. Bitte geben Sie uns in Ihrer Email an uns so viel Informationen als m&ouml;glich an. ');
  break;
  default:
  define('SUB_HEADING_TITLE','');
  define('SUB_HEADING_TEXT','Bitte w&auml;hlen Sie eine der obigen Fragen aus.');

  }
?>