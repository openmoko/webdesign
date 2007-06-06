<?php
/*
  $Id: order_edit_french.php,v 1.3 2004/09/08 00:36:41 ccwjr Exp $


  Contribution based on:

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2004 osCommerce
  Creload French team for Creload 6.1
  Released under the GNU General Public License
*/


define('HEADING_STEP2', 'ETAPE 2 - Choisissez votre paiement et votre moyen de livraison pour la commande N°');
define('HEADING_INSTRUCT1', '!!! INSTRUCTIONS !!!');
define('HEADING_INSTRUCT2', 'Note: Si vous changez les quantit&eacute;s d\'articles command&eacute;s<br>
              elles ne seront pas prises en compte dans le stock <br>
          Faites en sorte de faire les changements aprés cette section<br>
          <br>');
define('HEADING_STEP3', '3 Ajouter un nouvel article');
define('HEADING_SHIPPING', 'Moyen de Livraison :');

define('TEXT_ADD_PROD_STEP1', '1:');
define('TEXT_ADD_STEP2', '2:');
define('TEXT_ADD_STEP3', '3:');
define('TEXT_ADD_STEP4', '4:');

define('TEXT_ADD_PROD', 'Ajouter un Article ');
define('TEXT_SELECT_PROD', 'S&eacute;lectionner cet Article');

define('TEXT_ADD_CAT_CHOOSE', '--- CHOISIR UNE CATEGORIE ---\n');
define('TEXT_SELECT_CAT', 'S&eacute;lectionner cette cat&eacute;gorie');
define('TEXT_ADD_PROD_CHOOSE', 'Ajouter un Article ');

define('TEXT_SELECT_OPT', 'S&eacute;lectionner les options');
define('TEXT_SELECT_OPT_SKIP', 'Pas d\'options pour ce produit');

define('TEXT_ADD_QUANTITY', ' Quantité');
define('TEXT_ADD_NOW', 'Ajouter Maintenant!');
define('TEXT_VIEW_CC', ' Pour voir les champs CC');
define('TEXT_VIEW_PO', ' ou les champs PO');

define('TEXT_INFO_PO', 'Information PO:');
define('TEXT_INFO_NAME', 'Nom :');
define('TEXT_INFO_AC_NR', 'Num&eacute;ro de compte:');
define('TEXT_INFO_PO_NR', 'Commande N°:');

// pull down default text
define('PULL_DOWN_DEFAULT', 'Choisissez');
define('TYPE_BELOW', 'Tapez ci-dessous');

define('JS_ERROR', 'Des erreurs sont survenues durant le traitement de votre formulaire.\n\nVeuillez effectuer les corrections suivantes:\n\n');

define('JS_GENDER', '* La valeur du genre doit être selectionnée.\n'); 
define('JS_FIRST_NAME', '* Le nom doit avoit au moins ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' lettres.\n'); 
define('JS_LAST_NAME', '* Le prénom doit avoir au moins ' . ENTRY_LAST_NAME_MIN_LENGTH . ' lettres.\n'); 
define('JS_DOB', '* Votre date de naissance doit avoir ce format: JJ/MM/AAAA (ex. 03/02/1961)\n'); 
define('JS_EMAIL_ADDRESS', '* Votre adresse email doit contenir un minimum de ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caractères.\n'); 
define('JS_ADDRESS', '* Votre adresse doit contenir un minimum de ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caractères.\n'); 
define('JS_POST_CODE', '* Le code postal doit avoir au moins ' . ENTRY_POSTCODE_MIN_LENGTH . ' numéros.\n'); 
define('JS_CITY', '* Le champ Ville doit avoir au moins ' . ENTRY_CITY_MIN_LENGTH . ' lettres.\n'); 
define('JS_STATE', '* Le pays doit être sélectionné.\n'); 
define('JS_STATE_SELECT', '-- Choisissez --'); 
define('JS_ZONE', '* Veuillez choisir un pays à partir de la liste déroulante.\n'); 
define('JS_COUNTRY', '* Veuillez choisir un pays à partir de la liste déroulante.\n'); 
define('JS_TELEPHONE', '* Votre numéro de téléphone doit contenir un minimum de ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caractères.\n'); 
define('JS_PASSWORD', '* Votre mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.\n');

define('CATEGORY_COMPANY', 'D&eacute;tails soci&eacute;t&eacute;');
define('CATEGORY_PERSONAL', 'Vos d&eacute;tails personnels');
define('CATEGORY_ADDRESS', 'Votre adresse');
define('CATEGORY_CONTACT', 'Vos coordonn&eacute;es');
define('CATEGORY_OPTIONS', 'Options');
define('CATEGORY_PASSWORD', 'Votre mot de passe ');
define('CATEGORY_CORRECT', 'Si vous &ecirc;tes la bonne personne, Confirmez en cliquant ci-dessous.');
define('ENTRY_CUSTOMERS_ID', 'ID:');
define('ENTRY_CUSTOMERS_ID_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_COMPANY', 'Nom de la soci&eacute;t&eacute;:');
define('ENTRY_NAME', 'Nom:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Civilit&eacute;es :');
define('ENTRY_GENDER_ERROR', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_GENDER_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_FIRST_NAME', 'Pr&eacute;nom:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' carac.</font></small>');
define('ENTRY_FIRST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_LAST_NAME', 'Nom:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_LAST_NAME_MIN_LENGTH . ' carac.</font></small>');
define('ENTRY_LAST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_DATE_OF_BIRTH', 'Date de naissance:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<small><font color="#FF0000">(ex. 03/02/1961)</font></small>');
define('ENTRY_DATE_OF_BIRTH_TEXT', '&nbsp;<small>(ex. 03/02/1961) <font color="#AABBDD">requis</font></small>');
define('ENTRY_EMAIL_ADDRESS', 'Adresse email:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' carac.</font></small>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<small><font color="#FF0000">Votre adresse email ne semble pas être valide - veuillez effectuer toutes les corrections n&eacute;cessaires.</font></small>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<small><font color="#FF0000">Votre adresse email est d&eacute;jà enregistr&eacute;e sur notre site - Veuillez ouvrir une session avec cette adresse email ou cr&eacute;ez un compte avec une adresse diff&eacute;rente.</font></small>');
define('ENTRY_EMAIL_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_STREET_ADDRESS', 'Street Address:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' carac.</font></small>');
define('ENTRY_STREET_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_SUBURB', 'Compl&eacute;ment d\'adresse:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Code postal:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_POSTCODE_MIN_LENGTH . ' carac.</font></small>');
define('ENTRY_POST_CODE_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_CITY', 'Ville:');
define('ENTRY_CITY_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_CITY_MIN_LENGTH . ' carac.</font></small>');
define('ENTRY_CITY_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_STATE', 'Etat/Province:');
define('ENTRY_STATE_ERROR', '&nbsp;<small><font color="#FF0000">requis</font></small>');
define('ENTRY_STATE_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_COUNTRY', 'Pays:');
define('ENTRY_COUNTRY_ERROR', '');
define('ENTRY_COUNTRY_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_TELEPHONE_NUMBER', 'Num&eacute;ro de t&eacute;l&eacute;phone:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_TELEPHONE_MIN_LENGTH . ' carac.</font></small>');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_FAX_NUMBER', 'Num&eacute;ro de Fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'S\'abonner');
define('ENTRY_NEWSLETTER_NO', 'Se d&eacute;sabonner');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Mot de Passe:');
define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmez votre mot de Passe:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('ENTRY_PASSWORD_ERROR', '&nbsp;<small><font color="#FF0000">min ' . ENTRY_PASSWORD_MIN_LENGTH . ' carac.</font></small>');
define('ENTRY_PASSWORD_TEXT', '&nbsp;<small><font color="#AABBDD">requis</font></small>');
define('PASSWORD_HIDDEN', '--INVISIBLE--');

// manual order box text in includes/boxes/manual_order.php

define('BOX_HEADING_MANUAL_ORDER', 'Commande Manuelle');
define('BOX_MANUAL_ORDER_CREATE_ACCOUNT', 'Cr&eacute;er un compte');
define('BOX_MANUAL_ORDER_CREATE_ORDER', 'Cr&eacute;er une commande');
?>
