<?php
/*
  $Id: links_submit.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Liens');
define('NAVBAR_TITLE_2', 'Soumettre un lien');

define('HEADING_TITLE', 'Information sur le lien');

define('TEXT_MAIN', 'Veuillez compl&eacute;ter le formulaire suivant pour soumettre votre site.');

define('EMAIL_SUBJECT', 'Bienvenue dans l\'espace d\'&eacute;change de liens de ' . STORE_NAME);
define('EMAIL_GREET_NONE', 'Ch&egrave;r(e) %s' . "\n\n");
define('EMAIL_WELCOME', 'Nous vous accueillons dans le programme d\'&eacute;change de liens de <b>' . STORE_NAME . '</b>'. "\n\n");
define('EMAIL_TEXT', 'Votre lien a &eacute;t&eacute; soumis avec succ&egrave;s à ' . STORE_NAME . '. Votre lien sera ajout&eacute; à notre liste d&egrave;s que nous l\'approuverons.  Vous recevrez un email au sujet du statut de votre soumission.  Si vous ne l\'avez pas reçu dans les 48 heures suivantes, svp contactez-nous avant de soumettre votre lien une nouvelle fois.' . "\n\n");
define('EMAIL_CONTACT', 'Pour nous aider avec notre programme d\'&eacute;change de lien, entrez l\'email du propri&eacute;taire du magasin: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Note:</b> Cette adresse email nous a &eacute;t&eacute; donn&eacute;e pendant la soumission d\'un site.  Si vous avez un probl&egrave;me, envoyez svp un email à ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_OWNER_SUBJECT', 'Lien soumis ' . STORE_NAME);
define('EMAIL_OWNER_TEXT', 'Un nouveau lien a &eacute;t&eacute; soumis ' . STORE_NAME . '. Il n\'est pas encore approuv&eacute;.  Veuillez le v&eacute;rifier et l\'activer.' . "\n\n");

define('TEXT_LINKS_HELP_LINK', '&nbsp;Aide&nbsp;[?]');

define('HEADING_LINKS_HELP', 'Aide sur les liens');
define('TEXT_LINKS_HELP', '<b>Titre du site:</b> Un titre descriptif pour votre site.<br><br><b>URL:</b> L\'adresse absolue de votre site, y compris \'http://\'.<br><br><b>Cat&eacute;gorie:</b> Cat&eacute;gorie la plus appropri&eacute;e pour votre site.<br><br><b>Description:</b> Une courte description de votre site.<br><br><b>Image URL:</b> L\'URL Absolue de l\'image que vous souhaitez soumettre, y compris \'http://\'. Cette image sera montr&eacute;e avec le lien de votre site.<br>Ex : http://your-domain.com/path/to/your/image.gif <br><br><b> Nom Complet:</b> Votre Nom Complet.<br><br><b>Email:</b> Votre adresse Email. Veuillez &eacute;crire un email valide, car on vous contactera par l\'interm&eacute;diaire de cet email.<br><br><b>Votre page de liens:</b> L\'URL Absolue de votre page de liens, o&ugrave; un lien vers votre site sera list&eacute; / visible.<br>Ex : http://votre-domaine.com/path/to/your/links_page.php');
define('TEXT_CLOSE_WINDOW', '<u>Fermer la fen&ecirc;tre</u> [x]');

// VJ todo - move to common language file
define('CATEGORY_WEBSITE', 'D&eacute;tails du site');
define('CATEGORY_RECIPROCAL', 'D&eacute;tails de votre lien');

define('ENTRY_LINKS_TITLE', 'Titre du site:');
define('ENTRY_LINKS_TITLE_ERROR', 'Le titre du lien doit contenir un minimum de ' . ENTRY_LINKS_TITLE_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_TITLE_TEXT', '*');
define('ENTRY_LINKS_URL', 'URL:');
define('ENTRY_LINKS_URL_ERROR', 'L\'URL doit contenir un minimum de ' . ENTRY_LINKS_URL_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_URL_TEXT', '*');
define('ENTRY_LINKS_CATEGORY', 'Cat&eacute;gorie:');
define('ENTRY_LINKS_CATEGORY_TEXT', '*');
define('ENTRY_LINKS_DESCRIPTION', 'Description:');
define('ENTRY_LINKS_DESCRIPTION_ERROR', 'La description doit contenir un minimum de ' . ENTRY_LINKS_DESCRIPTION_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_DESCRIPTION_TEXT', '*');
define('ENTRY_LINKS_IMAGE', 'URL de l\'image:');
define('ENTRY_LINKS_IMAGE_TEXT', '');
define('ENTRY_LINKS_CONTACT_NAME', 'Nom complet:');
define('ENTRY_LINKS_CONTACT_NAME_ERROR', 'Votre nom et pr&eacute;nom doit contenir un minimum de ' . ENTRY_LINKS_CONTACT_NAME_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_CONTACT_NAME_TEXT', '*');
define('ENTRY_LINKS_RECIPROCAL_URL', 'Votre page de liens:');
define('ENTRY_LINKS_RECIPROCAL_URL_ERROR', 'Votre page de liens doit contenir un minimum de ' . ENTRY_LINKS_URL_MIN_LENGTH . ' caract&egrave;res.');
define('ENTRY_LINKS_RECIPROCAL_URL_TEXT', '*');
?>
