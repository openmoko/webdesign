<?php
/*
  $Id: create_account_process.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/
define('NAVBAR_TITLE', 'Cr&eacute;er un compte');
define('HEADING_TITLE', 'Information du compte');
define('HEADING_NEW', 'Commande soumise');
define('NAVBAR_NEW_TITLE', 'Commande soumise');

define('EMAIL_SUBJECT', 'Bienvenue sur ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Cher Mr. ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_MS', 'Chere Mme. ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_NONE', 'Cher ' . stripslashes($HTTP_POST_VARS['firstname']) . ',' . "\n\n");
define('EMAIL_WELCOME', 'Nous vous accueillons sur <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Vous pouvez maintenant participer aux <b>divers services<b> que nous devons vous offrir. Certains de ces services incluent :' . "\n\n" . '<li><b>Panier permanent</b> - N\'importe quels produits ajout&eacute;s &agrave; votre panier en ligne restent l&agrave; jusqu\'&agrave; ce que vous les supprimiez, ou les consultiez.' . "\n" . '<li><b>Carnet d\'adresses </b> - Nous pouvons maintenant livrer vos produits &agrave; une adresse diff&eacute;rente de la v&ocirc;tre ! C\'est parfait pour envoyer des cadeaux d\'anniversaire adresses &agrave; l\'intention d\'autres personnes.' . "\n" . '<li><b>Historique de commandes</b> - Voir vos historiques d\'achats que vous avez effectu&eacute;s chez nous.' . "\n" . '<li><b>Critiques de produits</b> - Partagez vos avis sur des produits avec nos autres clients.' . "\n\n");
define('EMAIL_CONTACT', 'Pour obtenir de l\'aide sur n\'importe quel de nos services en ligne, envoyez s\'il vous pla&icirc;t un courrier &eacute;lectronique au propri&eacute;taire du magasin : ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>REMARQUE :</b> Si cette adresse &eacute;lectronique vous a &eacute;t&eacute; donn&eacute; par un de nos clients. Si vous n\'&ecirc;tes pas un membre, envoyez s\'il vous pla&icirc;t un courrier &eacute;lectronique à ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_PASS_1', 'Votre Mot de Passe pour ce compte est le suivant Your password for this account is ');
define('EMAIL_PASS_2', ', garder le dans un endroit sûr. (Remarque: Attention aux minuscules/majuscules pour le Mot de passe.)');


?>