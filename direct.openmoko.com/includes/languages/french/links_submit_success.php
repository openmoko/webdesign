<?php
/*
  $Id: links_submit_success.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Liens');
define('NAVBAR_TITLE_2', 'Succ&egrave;s');
define('HEADING_TITLE', 'Votre Lien a &eacute;t&eacute; soumis!');
define('TEXT_LINK_SUBMITTED', 'F&eacute;licitations! Votre lien a &eacute;t&eacute; soumis avec succ&egrave;s! On l\'ajoutera &agrave; notre liste d&egrave;s que nous l\'approuverons.  Si vous avez <small><b>des questions</b></small>, envoyez un email au <a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">responsable en ligne</a>.<br><br>Vous recevrez un email confirmant votre soumission.  Si vous ne l\'avez pas reçu dans l\'heure, veuillez <a href="' . tep_href_link(FILENAME_CONTACT_US, '', 'SSL') . '">nous contacter</a>. En outre, vous recevrez un email d&egrave;s que votre lien sera approuv&eacute;.');
?>