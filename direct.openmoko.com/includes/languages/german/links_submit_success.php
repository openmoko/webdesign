<?php
/*
  $Id: links_submit_success.php,v 1.1 2004/03/05 01:39:14 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Links');
define('NAVBAR_TITLE_2', 'Erfolg');
define('HEADING_TITLE', 'Ihr Link wurde eingetragen!');
define('TEXT_LINK_SUBMITTED', 'Gl&uuml;chkwunsch! Ihr Link wurde erfolgreich abgeschickt! Er wird zu unserer Liste hinzugef&uuml;gt, sobald wir ihn genehmigt haben. Wenn Sie dazu <small><b>IRGENDWELCHE</b></small> Fragen haben, senden Sie bitte eine Email an unseren <a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '"> Webmaster</a>.<br><br>Sie werden eine Best&auml;tigung des Link-Eintrags per Email erhalten. Wenn Sie dieses nicht innerhalb einer Stunde erhaltenr, <a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '"> kontaktieren Sie uns</a> bitte. Ebenfalls werden Sie eine Email erhalten, sobald ein von Ihnen ageschickter Link zum Eintrag genehmigt wurde.');
?>