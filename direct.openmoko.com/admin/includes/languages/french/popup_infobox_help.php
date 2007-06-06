<?php
/*
  $Id: popup_infobox_help.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $


  Copyright (c) 2004 CRE Works

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Aide Infobox');
define('TEXT_INFO_HEADING_NEW_INFOBOX', 'Aide Infobox');
define('TEXT_INFOBOX_HELP_FILENAME', 'Cela repr&eacute;sente le nom du fichier box que vous avez mis dans votre r&eacute;pertoire </u>catalog/includes/boxes</u>.<br><br> En minuscule, avec espace remplacant les underscores (_) possible.<br><br>Par exemple:<br>Votre nouvelle Infobox s\'appelle <b>new_box.php</b>, vous devez saisir ici "<b> new box</b>"<br>');
define('TEXT_INFOBOX_HELP_HEADING', 'C\'est tout simplement ce qui sera montr&eacute; au-dessus de l\'Infobox dans votre catalogue.<br><div align="center"><img border="0" src="images/help1.gif"><br></div>');
define('TEXT_INFOBOX_HELP_DEFINE', 'Un exemple de cela serait : <b>BOX_HEADING_WHATS_NEW</b>.<br> Qui est alors employ&eacute; avec la logique principale de votre magasin comme cela : si vous ouvrez le fichier <u>catalog/includes/languages/french.php</u> Vous pouvez voir de nombreux exemples, ceux qui contiennent BOX_HEADING ne sont plus n&eacute;cessaires comme ils sont maintenant stock&eacute;s dans la base de donn&eacute;es et d&eacute;finis dans les fichiers <b> column_left.php </b> et <b> column_right.php </b.> <br>, mais il n\'y a aucun besoin de les supprimer!! ');
define('TEXT_INFOBOX_HELP_COLUMN', 'Entrer soit <b>left</b> soit <b>right</b><br> Si vous voulez afficher l\'infobox dans la colonne de gauche -- saisissez <b>left</b> ou si vous la voulez dans la colonne de droite -- saisissez <b>right</b><br><br><br> Il faut choisir seulement l\'un d\'entre eux.<br><br>');
define('TEXT_INFOBOX_HELP_POSITION', 'Saisissez ici un nombre que vous voulez. Plus grand sera le nombre, plus basse sera affich&eacute;e l\'infobox.<br><br> Si vous saisissez le m&ecirc;me nombre pour plusieurs infobox, elles apparaitront dans l\'ordre alphab&eacute;tique');
define('TEXT_INFOBOX_HELP_ACTIVE', 'S&eacute;lectionner l\'un ou l\'autre <b>yes</b> ou <b>no</b>. <b>yes</b> affichera l\'Infobox et <b>no</b> ne l\'affichera pas.');
define('TEXT_INFOBOX_HELP_TEMPLATE', 'Cela doit repr&eacute;senter le nom de fichier de la box o&ugrave; les fonctions pour vos box sont plac&eacute;es. Si vous avez un fichier sp&eacute;cial pour votre fonction il doit &ecirc;tre dans catalog/templates/(template name)/boxes.tpl.php 
Cela doit &ecirc;tre en minuscule.

Par exemple :
Votre nouveau fichier de fonction Infobox template est un infobox standard o&ugrave; vous avez mis une fonction standard . Si vous employez une fonction sp&eacute;ciale pour vous, les box de renseignements mettent box.tpl.php ici et placent les fichiers dans catalog/templates/(nom_du_template)/boxes.tpl.php.');
define('TEXT_INFOBOX_HELP_COLOR', 'You can use the pop_up color chart to select the color  for the font used in info box headers, <br> Just click on the color and the color code will apear in the text box..');
define('TEXT_CLOSE_WINDOW', '<u>Fermez la fen&ecirc;tre</u> [x]');

?>
