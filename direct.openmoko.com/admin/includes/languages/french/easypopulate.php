<?php
/*
  $Id: easypopulate.php,v 1.4 2004/09/21  zip1 Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 Chainreactionworks.com

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Configuration Easy Populate');
define('EASY_VERSION_A', 'Easy Populate Advanced ');
define('EASY_VERSION_B', 'Easy Populate Basic ');
define('EASY_EXPORT', ' Export');
define('EASY_IMPORT', ' Import');
define('EASY_VER_A', ' 3.01');
define('EASY_VER_B', ' 3.01');
define('EASY_DEFAULT_LANGUAGE',' - Langue par d&eacute;faut: ');
define('EASY_UPLOAD_FILE', 'Fichier uploader. ');
define('EASY_UPLOAD_TEMP', 'Nom Temmporaire: ');
define('EASY_UPLOAD_USER_FILE', 'Fichier Utilisateur: ');
define('EASY_SIZE', 'Taille: ');
define('EASY_FILENAME', 'Nom Fichier: ');
define('EASY_SPLIT_DOWN', 'Vous pouvez t&eacute;l&eacute;charger vos dossiers partag&eacute;s dans les Outils/Fichiers dans /catalog/temp/');
define('EASY_UPLOAD_EP_FILE', 'Envoyer fichier EP pour l\'import');
define('EASY_SPLIT_EP_FILE', 'Upload and Split a EP File');
define('EASY_SPLIT_EP_LOCAL', 'Split a EP File on the server');

define('TEXT_IMPORT_TEMP', 'Importer les donn&eacute;es du fichier vers %s');
define('TEXT_INSERT_INTO_DB', 'Inserer dans DB');
define('TEXT_SELECT_ONE', 'Choisir un fichier EP pour l\'import');
define('TEXT_SELECT_TWO', 'Select a EP File for Splitting');

define('TEXT_SPLIT_FILE', 'Choisir un fichier EP');
define('TEXT_SPLIT', 'Split a EP File');

define('EASY_LABEL_CREATE', 'Cr&eacute;er un fichier d\'exportation');
define('EASY_LABEL_CREATE_SELECT', 'Choisir une m&eacute;thode de sauvegarde pour l\'exportation du fichier');
define('EASY_LABEL_CREATE_SAVE', 'Sauvegarder un fichier temporaire sur le serveur');
define('EASY_LABEL_SELECT_DOWN', 'Choisir la m&eacute;thode de t&eacute;l&eacute;chargement');
define('EASY_LABEL_SORT', 'Choisir la m&eacute;thode pour le classement');
define('EASY_LABEL_PRODUCT_RANGE', 'Limite par ID Produit');
define('EASY_LABEL_LIMIT_CAT', 'Limite par cat&eacute;gorie');
define('EASY_LABEL_LIMIT_MAN', 'Limite par constructeur');

define('EASY_LABEL_PRODUCT_AVAIL', 'Champs disponibles: ');
define('EASY_LABEL_PRODUCT_TO', ' à ');
define('EASY_LABEL_PRODUCT_RECORDS', '    Nombre total d\'enregistrements: ');
define('EASY_LABEL_PRODUCT_BEGIN', 'd&eacute;but: ');
define('EASY_LABEL_PRODUCT_END', 'fin: ');
define('EASY_LABEL_PRODUCT_START', 'D&eacute;marrer creation fichier ');

define('EASY_FILE_LOCATE', 'Vous pouvez obtenir votre fichier dans le Outils/Fichiers');
define('EASY_FILE_LOCATE2', ' en cliquant sur ce lien et en allant au gestionnaire');

define('EASY_FILE_LOCATE_2', ' by clicking this Link and going to the file manager');
define('EASY_FILE_RETURN', ' Vous pouvez retorner à EP en cliquant ce lien.');
define('EASY_IMPORT_TEMP_DIR', 'Importer du r&eacute;pertoire Temp ');
define('EASY_LABEL_DOWNLOAD', 'T&eacute;l&eacute;chargement');
define('EASY_LABEL_COMPLETE', 'Complet');
define('EASY_LABEL_TAB', 'tab-delimited .txt file to edit');
define('EASY_LABEL_MPQ', 'Mod&egrave;le/Prix/Qt&eacute;');
define('EASY_LABEL_EP_MC', 'Mod&egrave;le/Cat&eacute;gorie');

define('EASY_LABEL_EP_ATTRIB', 'Attributs');
define('EASY_LABEL_NONE', 'Non');
define('EASY_LABEL_CATEGORY', 'Nom 1&egrave;re cat&eacute;gorie');
define('PULL_DOWN_MANUFACTURES', 'Manufacturers');
define('EASY_LABEL_PRODUCT', 'Num&eacute;ro ID produit');
define('EASY_LABEL_MANUFACTURE', 'Num&eacute;ro ID constructeur');
define('EASY_LABEL_EP_MA', 'Mod&egrave;le/Attributs');
define('EASY_LABEL_EP_FR_TITLE', 'Cr&eacute;er un fichier EP ou Froogle dans r&eacute;pertoire Temp ');
define('EASY_LABEL_EP_DOWN_TAB', 'Cr&eacute;ation <b>Compl&egrave;te</b> du fichier tab-delimited .txt dans r&eacute;pertoire temp');
define('EASY_LABEL_EP_DOWN_MPQ', 'Cr&eacute;er fichier <b>Mod&egrave;l/Prix/Qty</b> tab-delimited .txt dans r&eacute;pertoire temp');
define('EASY_LABEL_EP_DOWN_MC', 'Cr&eacute;er fichier <b>Mod&egrave;le/Cat&eacute;gorie</b> tab-delimited .txt dans r&eacute;pertoire temp');
define('EASY_LABEL_EP_DOWN_MA', 'Cr&eacute;er fichier <b>Mod&egrave;le/Attributs</b> tab-delimited .txt dans r&eacute;pertoire temp');
define('EASY_LABEL_EP_LIMIT', 'Limit number of products to Export');
define('EASY_LABEL_NEW_PRODUCT', "<font color='green'> !Nouveau produit! </font><br>");
define('EASY_LABEL_UPDATED', "<font color='blue'> Mis à jour</font><br>");
define('EASY_LABEL_DELETE_STATUS_1', "<font color='red'> Effacer Produit ");
define('EASY_LABEL_DELETE_STATUS_2', " de la BDD</font><br>");
define('EASY_LABEL_LINE_COUNT_1', 'ajout&eacute; ');
define('EASY_LABEL_LINE_COUNT_2', 'enregistrement et fermeture fichier... ');
define('EASY_LABEL_FILE_COUNT_1A', 'Creating file EPA_Split ');
define('EASY_LABEL_FILE_COUNT_1B', 'Creating file EPB_Split ');
define('EASY_LABEL_FILE_COUNT_2', '.txt ...  ');
define('EASY_LABEL_FILE_CLOSE_1', 'Ajout&eacute; ');
define('EASY_LABEL_FILE_CLOSE_2', ' enregistrement et fermeture fichier...');
define('EASY_LABEL_FILE_INSERT_LOCAL', 'Inserting local file: ');
define('TEXT_INFO_TIMER', 'Script timer:');
define('TEXT_INFO_SECOND', 'seconds.');

//errormessages
define('EASY_ERROR_1', 'Étrange mais il n\'y a aucune langue par d&eacute;faut ... Cela pourrait ne pas se produire, juste au cas où... ');
define('EASY_ERROR_2', '... ERREUR! - Trop de caract&egrave;res dans le num&eacute;ro mod&egrave;le.<br>
      12 est le maximun dans l\'installation d\'oscommerce.<br>
      Votre longueur maximum de product_model est ');
define('EASY_ERROR_2A', ' <br>Vous pouvez raccourcir vos num&eacute;ros de type ou augmenter la taille du champ dans la base de donn&eacute;es.</font>');
define('EASY_ERROR_2B',  "<font color='red'>");
define('EASY_ERROR_3', '<p class=smallText>Aucun champ de products_id. Cette ligne n\'a pas &eacute;t&eacute; import&eacute;e <br><br>');
define('EASY_ERROR_4', '<font color=red>ERREUR - le v_customer_group_id et le v_customer_price fonctionnent par paire</font>');
define('EASY_ERROR_5', '</b><font color=red>Error 05 - You are trying to use a file created with EP Advanced, please try with Easy Populate Advanced </font>');
define('EASY_ERROR_5a', '<font color=red><b><u>  Click here to return to Easy Populate Basic </u></b></font>');
define('EASY_ERROR_6', '</b><font color=red>Error 06 - You are trying to use a file created with EP Basic, please try with Easy Populate Basic </font>');
define('EASY_ERROR_6a', '<font color=red><b><u>  Click here to return to Easy Populate Advanced </u></b></font>');
define('EASY_ERROR_7', '<p class=smallText> Error 07 - No Module field in record or it is the last line in the file. This line was not imported. <br><br>');

// Eversun mod for Easy Populate Products Options, Values and Attributes
define('EASY_VERSION_C', 'Easy Populate Options');
define('EASY_LABEL_OPTIONS_ID', 'Options ID');
define('EASY_LABEL_OPTIONS_NAME', 'Options Name');
define('EASY_VERSION_D', 'Easy Populate Values');
define('EASY_LABEL_VALUES_ID', 'Values ID');
define('EASY_LABEL_VALUES_NAME', 'Values Name');
define('EASY_VERSION_E', 'Easy Populate Attributes');
define('TEXT_SELECT_ONE_OPTIONS', 'Select a EP Option File for Import');
define('TEXT_SELECT_ONE_VALUES', 'Select a EP Values File for Import');
define('TEXT_SELECT_ONE_ATTRIBUTES', 'Select a EP Attributes File for Import');
define('EASY_ERROR_8', '<b><font color=red>Error - You didn\'t select any file</font></b>');
define('EASY_INFO_SUCCESS', '<b><font color=red>Import Success</font></b>');
define('EASY_INFO_FILE_NOT_FOUND', '<b><font color=red>File not Found</font></b>');
define('EASY_INFO_CHECK_ERROR1', '<b><font color=red>Field %s not in the table %s.</font></b>');
// Eversun mod end for Easy Populate Products Options, Values and Attributes



/*******************************/
define('ERROR_CANT_PROCESSED_ON_LINE', "Can\'t processed on line ");
define('ERROR_DOESNT_HAVE_THIS_OPTIONS_ID', "doesn\'t have this options_id: ");
define('ERROR_DOESNT_HAVE_THIS_PRODUCTS_ID_1', "doesn\'t have this products_id: ");
define('ERROR_DOESNT_HAVE_THIS_PRODUCTS_ID_2', " or model: ");
define('ERROR_DOESNT_HAVE_THIS_VALUES_ID_1', "doesn\'t have values_id: ");
define('ERROR_DOESNT_HAVE_THIS_VALUES_ID_2', " for  options_id: ");

define('MSG_READ_RECORDS', "Read records: ");
define('MSG_RECORDS_WILL_BE_UPDATED', " records will be updated");
define('MSG_RECORDS_WILL_BE_INSERTED', " records will be inserted");
define('MSG_RECORDS_WILL_BE_DELETED', " records will be deleted");
define('MSG_ERROR_RECORDS_WONT_BE_PROCESSED', " records won\'t be processed, because of below reasons:");

define('ERROR_OPTIONS_TYPE_CHANGE_ERROR_1', " options type change error, you can\'t change option type from");
define('ERROR_OPTIONS_TYPE_CHANGE_ERROR_2', 'to');

/*******************************/


?>
