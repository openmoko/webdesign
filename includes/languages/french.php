<?php
/*
  $Id: english.php,v 1.3 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

// look in your $PATH_LOCALE/locale directory for available locales
// or type locale -a on the server.
// Examples:
// on RedHat try 'en_US'
// on FreeBSD try 'en_US.ISO_8859-1'
// on Windows try 'en', or 'English'
//@setlocale(LC_TIME, 'fr');
setlocale(LC_TIME, 'fr_FR.ISO_8859-1');


//VVC Constants
define('VISUAL_VERIFY_CODE_CHARACTER_POOL', 'abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ123456789FJWNVB63HDLAJAF');  //no zeros or O
define('VISUAL_VERIFY_CODE_CATEGORY', 'Verify security code');
define('VISUAL_VERIFY_CODE_ENTRY_ERROR', 'The security code you entered did not match the one displayed.');
define('VISUAL_VERIFY_CODE_ENTRY_TEXT', '*');
define('VISUAL_VERIFY_CODE_TEXT_INSTRUCTIONS', 'Type security code here:');
define('VISUAL_VERIFY_CODE_BOX_IDENTIFIER', '<- Security Code');

define('DATE_FORMAT_SHORT', '%d/%m/%Y');  // this is used for strftime()
define('DATE_FORMAT_LONG', '%A %d %B, %Y'); // this is used for strftime()
define('DATE_FORMAT', 'd/m/Y'); // this is used for date()
define('DATE_TIME_FORMAT', DATE_FORMAT_SHORT . ' %H:%M:%S');

////
// Return date in raw format
// $date should be in format mm/dd/yyyy
// raw date is in format YYYYMMDD, or DDMMYYYY
function tep_date_raw($date, $reverse = false) {
  if ($reverse) {
    return substr($date, 0, 2) . substr($date, 3, 2) . substr($date, 6, 4);
  } else {
    return substr($date, 6, 4) . substr($date, 3, 2) . substr($date, 0, 2);
  }
}

// if USE_DEFAULT_LANGUAGE_CURRENCY is true, use the following currency, instead of the applications default currency (used when changing language)
define('LANGUAGE_CURRENCY', 'EUR');

// Global entries for the <html> tag
define('HTML_PARAMS','dir="LTR" lang="fr"');

// charset for web pages and emails
define('CHARSET', 'iso-8859-1');

// page title
define('TITLE', 'Nom de votre boutique, &agrave; changer dans catalog/includes/languages/french');

// ######## CCGV
define('BOX_INFORMATION_GV', 'Gift Voucher FAQ');
define('VOUCHER_BALANCE', 'Voucher Balance');
define('BOX_HEADING_GIFT_VOUCHER', 'Gift Voucher Account'); 
define('GV_FAQ', 'Gift Voucher FAQ');
define('ERROR_REDEEMED_AMOUNT', 'Congratulations, you have redeemed ');
define('ERROR_NO_REDEEM_CODE', 'You did not enter a redeem code.');  
define('ERROR_NO_INVALID_REDEEM_GV', 'Invalid Gift Voucher Code'); 
define('TABLE_HEADING_CREDIT', 'Credits Available');
define('GV_HAS_VOUCHERA', 'You have funds in your Gift Voucher Account. If you want <br>
                         you can send those funds by <a class="pageResults" href="');
       
define('GV_HAS_VOUCHERB', '"><b>email</b></a> to someone'); 
define('ENTRY_AMOUNT_CHECK_ERROR', 'You do not have enough funds to send this amount.'); 
define('BOX_SEND_TO_FRIEND', 'Send Gift Voucher');

define('VOUCHER_REDEEMED', 'Voucher Redeemed');
define('CART_COUPON', 'Coupon :');
define('CART_COUPON_INFO', 'more info');
define('MODULE_ORDER_TOTAL_COUPON_TEXT_ERROR', 'Coupon Redemption');
define('ERROR_REDEEMED_AMOUNT_ZERO', '<BR>***HOWEVER:No reducion available, please see the coupon restrictions***');
// header text in includes/header.php
define('HEADER_TITLE_CREATE_ACCOUNT', 'Cr&eacute;er un compte');
define('HEADER_TITLE_MY_ACCOUNT', 'Mon compte');
define('HEADER_TITLE_CART_CONTENTS', 'Mon panier');
define('HEADER_TITLE_CHECKOUT', 'Commander');
define('HEADER_TITLE_TOP', 'Accueil');
define('HEADER_TITLE_CATALOG', 'Catalogue');
define('HEADER_TITLE_LOGOFF', 'Se d&eacute;connecter');
define('HEADER_TITLE_LOGIN', 'S\'identifier');

// footer text in includes/footer.php
define('FOOTER_TEXT_REQUESTS_SINCE', 'visites depuis');

// text for gender
define('MALE', 'Monsieur');
define('FEMALE', 'Madame');
define('MALE_ADDRESS', 'Mr.');
define('FEMALE_ADDRESS', 'Mme.');

// text for date of birth example
define('DOB_FORMAT_STRING', 'jj/mm/aaaa');


// categories mainpage
define('BOX_HEADING_CATEGORIES_MAIN_PAGE', 'Categories');


// quick_find box text in includes/boxes/quick_find.php
define('BOX_SEARCH_TEXT', 'Utilisez des mots clefs pour trouver le produit que vous cherchez.');
define('BOX_SEARCH_ADVANCED_SEARCH', 'Recherche Avanc&eacute;e');


// reviews box text in includes/boxes/reviews.php
define('BOX_HEADING_REVIEWS', 'Commentaires');
define('BOX_REVIEWS_WRITE_REVIEW', 'R&eacute;diger un commentaire pour ce produit!');
define('BOX_REVIEWS_NO_REVIEWS', 'Il n\'y a actuellement aucun commentaire');
define('BOX_REVIEWS_TEXT_OF_5_STARS', '%s de 5 &eacute;toiles!');

// shopping_cart box text in includes/boxes/shopping_cart.php

define('BOX_SHOPPING_CART_EMPTY', '0 produits');


// best_sellers box text in includes/boxes/best_sellers.php
define('BOX_HEADING_BESTSELLERS_IN', 'Meilleures Ventes Pour<br>&nbsp;&nbsp;');

// notifications box text in includes/boxes/products_notifications.php

define('BOX_NOTIFICATIONS_NOTIFY', 'M\'informer des mises &agrave; jour de <b>%s</b>');
define('BOX_NOTIFICATIONS_NOTIFY_REMOVE', 'Ne pas m\'informer des mises &agrave; jour de <b>%s</b>');

// manufacturer box text

define('BOX_MANUFACTURER_INFO_HOMEPAGE', '%s page d\'accueil');
define('BOX_MANUFACTURER_INFO_OTHER_PRODUCTS', 'Autres produits');

// tell a friend box text in includes/boxes/tell_a_friend.php
define('BOX_TELL_A_FRIEND_TEXT', 'Informer un(e) ami(e) de ce produit.');

//BEGIN allprods modification
define('BOX_INFORMATION_ALLPRODS', 'Voir tous les articles');
//END allprods modification

//BEGIN all categories and products modification
define ('ALL_PRODUCTS_LINK', 'Tous les produits par catégories');
//END categories and products modification

//BEGIN all categories and products modification
define ('ALL_PRODUCTS_MANF', 'Tous les produits par constructeur');
//END categories and products modification
// VJ Links Manager v1.00 begin
define('BOX_INFORMATION_LINKS', 'Liens');
// VJ Links Manager v1.00 end

// checkout procedure text
define('CHECKOUT_BAR_DELIVERY', 'Informations de livraison');
define('CHECKOUT_BAR_PAYMENT', 'Informations sur le paiement');
define('CHECKOUT_BAR_CONFIRMATION', 'Confirmation');
define('CHECKOUT_BAR_FINISHED', 'C\'est fini!');

// pull down default text
define('PULL_DOWN_DEFAULT', 'Veuillez s&eacute;lectionner');
define('TYPE_BELOW', 'un type ci-dessous');

// javascript messages
define('JS_ERROR', 'Des erreurs sont apparues pendant le traitement de votre formulaire.\n\nVeuillez faire les corrections suivantes:\n\n');

define('JS_REVIEW_TEXT', '* Le \'commentaire\' doit avoir au moins ' . REVIEW_TEXT_MIN_LENGTH . ' caractères.\n');
define('JS_REVIEW_RATING', '* Vous devez évaluer le produit pour votre commentaire.\n');

define('JS_ERROR_NO_PAYMENT_MODULE_SELECTED', '* Veuillez sélectionner un mode de paiement pour votre commande.\n');

define('JS_ERROR_SUBMITTED', 'Ce formulaire a déjà été soumis. Veuillez cliquer sur Ok et attendre la fin du traitement.');

define('ERROR_NO_PAYMENT_MODULE_SELECTED', 'Veuillez choisir un mode de paiement pour votre commande.');

define('CATEGORY_COMPANY', 'Information soci&eacute;t&eacute;');
define('CATEGORY_PERSONAL', 'Vos informations personnelles');
define('CATEGORY_ADDRESS', 'Votre adresse');
define('CATEGORY_CONTACT', 'Vos informations de contact');
define('CATEGORY_OPTIONS', 'Options');
define('CATEGORY_PASSWORD', 'Votre mot de passe');

define('ENTRY_COMPANY', 'Nom de la soci&eacute;t&eacute;:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Civilités:');
define('ENTRY_GENDER_ERROR', 'Veuillez sélectionner les civilités.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'Votre Pr&eacute;nom:');
define('ENTRY_FIRST_NAME_ERROR', 'Votre prénom doit contenir un minimum de ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' caractères.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Votre Nom:');
define('ENTRY_LAST_NAME_ERROR', 'Votre Nom doit contenir un minimum de ' . ENTRY_LAST_NAME_MIN_LENGTH . ' caractères.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Date de naissance:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Votre date de naissance doit être au format: JJ/MM/AAAA (ex 03/02/1961)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (ex. 03/02/1961)');
define('ENTRY_EMAIL_ADDRESS', 'Votre adresse email:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'Votre adresse email doit contenir un minimum de ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' caractères.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Votre adresse email ne semble pas valide - Veuillez faire les corrections nécessaires.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Votre adresse email figure déjà dans notre base de données - Veuillez vous identifier avec cette adresse ou alors créer un nouveau compte avec une adresse email différente.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Rue:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Votre Rue doit contenir un minimum de ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' caractères.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Quartier:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Code postal:');
define('ENTRY_POST_CODE_ERROR', 'Votre code postal doit contenir un minimum de ' . ENTRY_POSTCODE_MIN_LENGTH . ' caractères.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'Ville:');
define('ENTRY_CITY_ERROR', 'Votre ville doit contenir un minimum de ' . ENTRY_CITY_MIN_LENGTH . ' caractères.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'N&deg; d&eacute;part./Etat:');
define('ENTRY_STATE_ERROR', 'Votre N° de départ/Etat doit contenir un minimum de ' . ENTRY_STATE_MIN_LENGTH . ' caractères.');
define('ENTRY_STATE_ERROR_SELECT', 'Veuillez sélectionner un N° départ./Etat à partir de la liste déroulante.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Pays:');
define('ENTRY_COUNTRY_ERROR', 'Vous devez sélectionner un pays dans la liste déroulante.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Num&eacute;ro de t&eacute;l&eacute;phone:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Votre N° de téléphone doit contenir un minimum de ' . ENTRY_TELEPHONE_MIN_LENGTH . ' caractères.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_FAX_NUMBER', 'Num&eacute;ro de Fax:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Lettre d\'information:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Je veux souscrire');
define('ENTRY_NEWSLETTER_NO', 'Je ne veux pas souscrire');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Mot de passe:');
define('ENTRY_PASSWORD_ERROR', 'Votre mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'La confirmation du mot de passe doit correspondre au mot de passe saisi pr&eacute;c&eacute;demment.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Confirmation du mot de passe:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Mot de passe actuel:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Votre mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
define('ENTRY_PASSWORD_NEW', 'Nouveau mot de passe:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Votre nouveau mot de passe doit contenir un minimum de ' . ENTRY_PASSWORD_MIN_LENGTH . ' caractères.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'La confirmation du mot de passe doit correspondre au nouveau mot de passe saisi.');
define('PASSWORD_HIDDEN', '--Masqu&eacute;--');

define('FORM_REQUIRED_INFORMATION', '* Informations n&eacute;cessaires');

// constants for use in tep_prev_next_display function
define('TEXT_RESULT_PAGE', 'Page de r&eacute;sultats:');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS', 'Afficher <b>%d</b> &agrave; <b>%d</b> (de <b>%d</b> produits)');
define('TEXT_DISPLAY_NUMBER_OF_ORDERS', 'Afficher <b>%d</b> &agrave; <b>%d</b> (de <b>%d</b> commandes)');
define('TEXT_DISPLAY_NUMBER_OF_REVIEWS', 'Afficher <b>%d</b> &agrave; <b>%d</b> (de <b>%d</b> commentaires)');
define('TEXT_DISPLAY_NUMBER_OF_PRODUCTS_NEW', 'Afficher <b>%d</b> &agrave; <b>%d</b> (de <b>%d</b> nouveaux produits)');
define('TEXT_DISPLAY_NUMBER_OF_SPECIALS', 'Afficher <b>%d</b> &agrave; <b>%d</b> (de <b>%d</b> promotions)');
define('TEXT_DISPLAY_NUMBER_OF_FEATURED', 'Afficher <b>%d</b> &agrave; <b>%d</b> (de <b>%d</b> produits d&eacute;crits)');

define('PREVNEXT_TITLE_FIRST_PAGE', 'Premi&egrave;re page');
define('PREVNEXT_TITLE_PREVIOUS_PAGE', 'Page Pr&eacute;c&eacute;dente');
define('PREVNEXT_TITLE_NEXT_PAGE', 'Page Suivante');
define('PREVNEXT_TITLE_LAST_PAGE', 'Derni&egrave;re Page');
define('PREVNEXT_TITLE_PAGE_NO', 'Page %d');
define('PREVNEXT_TITLE_PREV_SET_OF_NO_PAGE', 'Groupe pr&eacute;c&eacute;dent de %d Pages');
define('PREVNEXT_TITLE_NEXT_SET_OF_NO_PAGE', 'Groupe suivant de %d Pages');
define('PREVNEXT_BUTTON_FIRST', '&lt;&lt;Premier');
define('PREVNEXT_BUTTON_PREV', '[&lt;&lt;&nbsp;Prec]');
define('PREVNEXT_BUTTON_NEXT', '[Suiv&nbsp;&gt;&gt;]');
define('PREVNEXT_BUTTON_LAST', 'Derni&egrave;re&gt;&gt;');

define('IMAGE_BUTTON_ADD_ADDRESS', 'Ajouter une adresse');
define('IMAGE_BUTTON_ADDRESS_BOOK', 'Carnet d\'adresse');
define('IMAGE_BUTTON_BACK', 'Retour');
define('IMAGE_BUTTON_BUY_NOW', 'Acheter maintenant');
define('IMAGE_BUTTON_CHANGE_ADDRESS', 'Changer l\'adresse');
define('IMAGE_BUTTON_CHECKOUT', 'Confirmation');
define('IMAGE_BUTTON_CONFIRM_ORDER', 'Valider la commande');
define('IMAGE_BUTTON_CONTINUE', 'Continuer');
define('IMAGE_BUTTON_CONTINUE_SHOPPING', 'Continuer vos achats');
define('IMAGE_BUTTON_DELETE', 'Supprimer');
define('IMAGE_BUTTON_EDIT_ACCOUNT', 'Editer mon compte');
define('IMAGE_BUTTON_HISTORY', 'Historique des commandes');
define('IMAGE_BUTTON_LOGIN', 'S\'inscrire');
define('IMAGE_BUTTON_IN_CART', 'Ajouter au panier');
define('IMAGE_BUTTON_NOTIFICATIONS', 'Mon avis');
define('IMAGE_BUTTON_QUICK_FIND', 'Trouver rapidement');
define('IMAGE_BUTTON_REMOVE_NOTIFICATIONS', 'Supprimer mon avis');
define('IMAGE_BUTTON_REVIEWS', 'Commentaires');
define('IMAGE_BUTTON_SEARCH', 'Rechercher');
define('IMAGE_BUTTON_SHIPPING_OPTIONS', 'Options de Livraison');
define('IMAGE_BUTTON_TELL_A_FRIEND', 'Informer un(e) ami(e)');
define('IMAGE_BUTTON_UPDATE', 'Mise &agrave; jour');
define('IMAGE_BUTTON_UPDATE_CART', 'Mettre &agrave; jour le panier');
define('IMAGE_BUTTON_WRITE_REVIEW', 'R&eacute;diger un commentaire');

define('SMALL_IMAGE_BUTTON_DELETE', 'Supprimer');
define('SMALL_IMAGE_BUTTON_EDIT', 'Editer');
define('SMALL_IMAGE_BUTTON_VIEW', 'Voir');

define('ICON_ARROW_RIGHT', 'plus');
define('ICON_CART', 'Dans le panier');
define('ICON_ERROR', 'Erreur');
define('ICON_SUCCESS', 'Succ&egrave;s');
define('ICON_WARNING', 'Attention');

define('TEXT_CUSTOMER_GREETING_HEADER', 'Bienvenue &agrave; nos clients');
define('TEXT_GREETING_PERSONAL', 'Soyez le bienvenu <span class="greetUser">%s</span>, voulez-vous prendre connaissance des <a href="%s"><u>nouveaux produits</u></a> mis en vente ?');
define('TEXT_GREETING_PERSONAL_RELOGON', '<small>Si vous n\'&ecirc;tes pas %s, veuillez <a href="%s"><u>vous identifier &agrave; nouveau</u></a> avec votre propre compte.</small>');
define('TEXT_GREETING_GUEST', 'Bonjour et Bienvenue <span class="greetUser">cher visiteur</span>, voulez vous vous <a href="%s"><u>identifier</u></a> ou d&eacute;sirez vous <a href="%s"><u>cr&eacute;er votre compte</u></a> ?');

define('TEXT_SORT_PRODUCTS', 'Produits tri&eacute;s  ');
define('TEXT_DESCENDINGLY', 'D&eacute;croissant');
define('TEXT_ASCENDINGLY', 'Croissant');
define('TEXT_BY', ' par ');

define('TEXT_REVIEW_BY', 'par %s');
define('TEXT_REVIEW_WORD_COUNT', '%s mots');
define('TEXT_REVIEW_RATING', 'Ratio: %s [%s]');
define('TEXT_REVIEW_DATE_ADDED', 'Ajout&eacute; le : %s');
define('TEXT_NO_REVIEWS', 'Actuellement, aucun commentaire n\'est disponible.');

define('TEXT_NO_NEW_PRODUCTS', 'Actuellement, aucun produit n\'est disponible.');

define('TEXT_NO_PRODUCTS', 'Actuellement, aucun produit n\'est disponible dans cette gamme.');

define('TEXT_UNKNOWN_TAX_RATE', 'Taux de taxe inconnue');

define('TEXT_REQUIRED', '<span class="errorText">Obligatoire</span>');

// Down For Maintenance
define('TEXT_BEFORE_DOWN_FOR_MAINTENANCE', 'ATTENTION: Ce site Internet sera en maintenance &agrave; partir de : ');
define('TEXT_ADMIN_DOWN_FOR_MAINTENANCE', 'ATTENTION: Ce site Internet est &agrave; l\'heure actuelle indisponible pour des raisons de maintenance');

define('ERROR_TEP_MAIL', '<font face="Verdana, Arial" size="2" color="#ff0000"><b><small>TEP ERROR:</small> Impossible d\'envoyer des emails avec la configuration actuelle du serveur SMTP. Veuillez v&eacute;rifier les r&eacute;glages de votre php.ini et corriger le serveur SMTP si n&eacute;cessaire.</b></font>');
define('WARNING_INSTALL_DIRECTORY_EXISTS', 'Attention : Le r&eacute;pertoire d\'installation existe &agrave; : ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install. Pour des raisons de s&eacute;curit&eacute;, veuillez supprimer ce dossier.');
define('WARNING_CONFIG_FILE_WRITEABLE', 'Attention : Je suis en mesure d\'&eacute;crire sur votre fichier configure.php &agrave; : ' . dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php. Veuillez SVP faire un CHMOD 444 sur ce fichier pour r&eacute;duire les risques et am&eacute;liorer la s&eacute;curit&eacute;.');
define('WARNING_SESSION_DIRECTORY_NON_EXISTENT', 'Attention : Le r&eacute;pertoire des sessions n\'existe pas : ' . tep_session_save_path() . '. L\'enregistrement des sessions ne pourra se faire tant que le r&eacute;pertoire ne sera pas cr&eacute;&eacute;.');
define('WARNING_SESSION_DIRECTORY_NOT_WRITEABLE', 'Attention : Je ne suis pas en mesure d\'&eacute;crire dans le r&eacute;pertoire de sessions : ' . tep_session_save_path() . '. Les sessions ne seront pas disponibles tant que ce r&eacute;pertoire n\'aura pas les bonnes permissions (CHMOD 777).');
define('WARNING_SESSION_AUTO_START', 'Attention: session.auto_start est activ&eacute; - Veuillez d&eacute;sactiver cette fonction de php dans php.ini et redemarrer le serveur web.');
define('WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT', 'Attention : Le r&eacute;pertoire de t&eacute;l&eacute;chargement des produits n\'existe pas : ' . DIR_FS_DOWNLOAD . '. Le t&eacute;l&eacute;chargement de produits ne fonctionnera pas tant que le r&eacute;pertoire se sera pas cr&eacute;&eacute;.');
define('WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT', 'Warning: The downloadable products directory does not exist: ' . DIR_FS_DOWNLOAD . '. Downloadable products will not work until this directory is valid.');
define('WARNING_ENCRYPT_FILE_MISSING', 'Warning: The Encryption key file is missing.');


define('TEXT_CCVAL_ERROR_UNKNOWN_CARD', 'Error: 01 The first four digits of the number entered are: %s If that number is correct, we do not accept that type of credit card.If it is wrong, please try again.');
define('TEXT_CCVAL_ERROR_INVALID_MONTH', 'Error: 02 The expiry date Motnth entered for the credit card is invalid.Please check the date and try again.');
define('TEXT_CCVAL_ERROR_INVALID_YEAR', 'Error: 03 The expiry date year entered for the credit card is invalid.Please check the date and try again.');
define('TEXT_CCVAL_ERROR_INVALID_DATE', 'Error: 04 The expiry date entered for the credit card is invalid.Please check the date and try again.');
define('TEXT_CSCAL_ERROR_CARD_TYPE_MISMATCH', 'Error: 05 The Credit Card number does not match the Card Type:');
define('TEXT_CCVAL_ERROR_SHORT', 'Error: 06 You have not entered the correct amount of digits. Please ensure you have entered all of the long number displayed on the front of your card');
define('TEXT_CCVAL_ERROR_BLACKLIST', 'Error: 07 We cannot accept your card as it is blacklisted, if you feel you have recieved this message in error please contact your card issuer.');
define('TEXT_CCVAL_ERROR_CVV_LENGTH', 'Error: 08 The CCV/CVV/CID number entered is the incorrect length. Please try again.');
define('TEXT_CCVAL_ERROR_NOT_ACCEPTED', 'Error: 09 The credit card number you have entered appears to be a %s card. Unfortunately at this time we do not accept %s as payment.');
define('TEXT_CCVAL_ERROR_INVALID_NUMBER', 'Error: 10 The credit card number entered is invalid. Please check the number for misstyped numbers and try again.');

/*
  The following copyright announcement can only be
  appropriately modified or removed if the layout of
  the site theme has been modified to distinguish
  itself from the default Chainreaction-copyrighted
  theme.

  For more information please read the following
  Frequently Asked Questions entry on the osCommerce
  support site:

  http://www.oscommerce.com/community.php/faq,26/q,50

  Please leave this comment intact together with the
  following copyright announcement.
*/
define('FOOTER_TEXT_BODY', 'Copyright &copy; 2003 <a href="http://www.oscommerce.com" target="_blank">Oscommerce</a> and <a href="http://www.chainreactionweb.com" target="_blank">CRE Loaded Team</a><br>Powered by <a href="http://www.oscommerce.com" target="_blank">Oscommerce</a><font color="red"> Supercharged by</font> <a href="http://www.creloaded.com" target="_blank">CRE Loaded Team</a><br><font color="blue"> Traduction française par uurbana, thdt98, jeanmarie et cyberghost</font><br>Using Version ' . PROJECT_VERSION);
/////////////////////////////////////////////////////////////////////
// HEADER.PHP
// Header Links
define('HEADER_LINKS_DEFAULT','ACCUEIL');
define('HEADER_LINKS_WHATS_NEW','NOUVEAUTES');
define('HEADER_LINKS_SPECIALS','PROMOTIONS');
define('HEADER_LINKS_REVIEWS','COMMENTAIRES');
define('HEADER_LINKS_LOGIN','S\'IDENTIFIER');
define('HEADER_LINKS_LOGOFF','SE DECONNECTER');
define('HEADER_LINKS_PRODUCTS_ALL','CATALOGUE');
define('HEADER_LINKS_ACCOUNT_INFO','INFORMATION COMPTE');
define('HEADER_LINKS_LINKS','LIENS');
define('HEADER_LINKS_FAQ','FAQS');
define('HEADER_LINKS_NEWS','NEWS');
define('HEADER_LINKS_INFORMATION','INFORMATION');
/////////////////////////////////////////////////////////////////////

// BOF: Lango added for print order mod
define('IMAGE_BUTTON_PRINT_ORDER', 'Commande imprimable');
// EOF: Lango added for print order mod

// WebMakers.com Added: Attributes Sorter
require(DIR_WS_LANGUAGES . $language . '/' . 'attributes_sorter.php');

// wishlist box text in includes/boxes/wishlist.php
define('BOX_HEADING_CUSTOMER_WISHLIST', 'Mes futurs achats');
define('BOX_WISHLIST_EMPTY', 'Vous n\'avez pas d\'article dans votre liste des futurs achats');
define('IMAGE_BUTTON_ADD_WISHLIST', 'Ajouter &agrave; ma liste d\'achats futurs');
define('TEXT_WISHLIST_COUNT', 'Actuellement %s articles sont dans votre liste d\'achat futurs.');
define('TEXT_DISPLAY_NUMBER_OF_WISHLIST', 'Afficher <b>%d</b> &agrave; <b>%d</b> (de <b>%d</b> articles de votre liste des futurs achats)');
define('BOX_HEADING_CUSTOMER_WISHLIST_HELP', 'Aide sur "mes futurs achats"');
define('BOX_HEADING_SEND_WISHLIST', 'Envoyer mes futurs achats');
define('BOX_TEXT_MOVE_TO_CART', 'Envoyer vers Panier');
define('BOX_TEXT_DELETE', 'Effacer');

//DWD Modify: Information Page Unlimited 1.1f - PT
  define('BOX_HEADING_INFORMATION', 'Info système');
  define('BOX_INFORMATION_MANAGER', 'Configurer Info');
//DWD Modify End

if(file_exists('includes/languages/english_newsdesk.php')) {
include('includes/languages/french_newsdesk.php');
include('includes/languages/french_faqdesk.php');
}

/*Begin Checkout Without Account images*/
define('IMAGE_BUTTON_CREATE_ACCOUNT', 'Créer Compte');
define('NAV_ORDER_INFO', 'Information Commande');
/*End Checkout WIthout Account images*/

// Include for Events Calendar 2.0 Contribution 
define('BOX_TOOLS_EVENTS_MANAGER', 'Events Manager');
define('IMAGE_NEW_EVENT', 'New Event');

// VJ guest pricing begin
// ADDED for Viewprice
// Text to replace price in InfoBoxes
define('PRICES_LOGGED_IN_TEXT', 'Trade Price');
// Text to replace price in Product Info, Specials & New Products lists
define('PRICES_LOGGED_IN_SUBMIT','Trade Price');
// Text to replace Buy 'Now button'
define('PRICES_LOGGED_IN_BUY_TEXT', 'Trade Only');
// END ViewPrice
// VJ guest pricing end

//Added for FAQ System 2.1 DMG

  define('BOX_INFORMATION_FAQ', 'FAQ');

//Added for Article Manager DMG

// Article Manager
define('BOX_HEADING_ARTICLES', 'Articles');
define('BOX_ALL_ARTICLES', 'All Articles');
define('BOX_NEW_ARTICLES', 'New Articles');
define('TEXT_DISPLAY_NUMBER_OF_ARTICLES', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> articles)');
define('TEXT_DISPLAY_NUMBER_OF_ARTICLES_NEW', 'Displaying <b>%d</b> to <b>%d</b> (of <b>%d</b> new articles)');
define('TABLE_HEADING_AUTHOR', 'Author');
define('TABLE_HEADING_ABSTRACT', 'Abstract');
define('BOX_HEADING_AUTHORS', 'Articles by Author');
define('NAVBAR_TITLE_DEFAULT', 'Articles');
define('BOX_ASEARCH_TEXT','Search Articles Text');
// Eversun mod for sppc and qty price breaks
define('ENTRY_COMPANY_TAX_ID', 'Company\'s tax id number:');
define('ENTRY_COMPANY_TAX_ID_ERROR', '');
define('ENTRY_COMPANY_TAX_ID_TEXT', '');
// Eversun mod end for sppc and qty price breaks  


#################    Starts - 15 June 2006    #################


define('IFRAME_ERROR','Sorry, you browser does not support iframes.');
define("GIFT_VOUCHER_ACCOUNT_BALANCE_1","You still have</br>");
define("GIFT_VOUCHER_ACCOUNT_BALANCE_2","</br>left to spend in your Gift Voucher Account<br><br>");
define("GIFT_VOUCHER_ACCOUNT_BALANCE_3","Send to a Friend");
define("DONATE_BUTTON_IMAGE_ALT","Make payments with PayPal - it\'s fast, free and secure");


#################    Ends - 15 June 2006    #################


#################    Starts - 16 June 2006    #################


define("LOGIN_ALT","login");
define("LOGOFF_ALT","logoff");
define("MYACCOUNT_ALT","MyAccount");
define("SPECIALS_ALT","Specials");
define("WHATS_NEW_ALT","What\'s New");
define("CONTACT_US_ALT","Contact Us");
define("IMAGE_ALT","image");
define("BOX_ALT","box");

#################    Ends - 16 June 2006    #################


#################    Starts - 20 June 2006    #################

//dayNames in calender
define("S","S");
define("M","M");
define("T","T");
define("W","W");
define("T","T");
define("F","F");
define("S","S");

//monthNames  in calender
define("JANUARY","JANUARY");
define("FEBRUARY","FEBRUARY");
define("MARCH","MARCH");
define("APRIL","APRIL");
define("MAY","MAY");
define("JUNE","JUNE");
define("JULY","JULY");
define("AUGUST","AUGUST");
define("SEPTEMBER","SEPTEMBER");
define("OCTOBER","OCTOBER");
define("NOVEMBER","NOVEMBER");
define("DECEMBER","DECEMBER");



define("DELETE_CACHE_FILES",'cache files deleted - top level');
define("UPDATE_CONFIGURATION_SETTING",'reset to false');
define("UPDATE_CONFIG_FILES_EXIST",'configuration cache files updated');
define("UPDATE_CONFIG_FILES_NOTEXIST",'ERROR: update file does not exist');
define("IS_GUEST_CHECK",'customer_id not set');
define("FILE_EXISTS_AND_IS_NOT_EXPIRED",'file exists and is not expired');
define("NO_FILE_OR_EXPIRED",'file does not exist or is expired');
define("OB_STARTED",'ob started @ ');
define("IS_GUESS_CHECK_END",'customer_id not set ');
define("OB_COMPRESSED",'output buffer flushed and compressed');
define("CACHE_OUTPUTT",'compressed ob sent to screen');
define("CACHE_WRITE_FILE",'compressed ob written to file');
define("UNSET_CACHE_COMPRESS", 'cache compress unset');
define("COMPRESS_BUFFER", 'compressing buffer');
define("CACHE_FILE_WRITE", 'buffer writtent to file');
define("CACHE_UNSET_WRITE_BUFFER", 'write buffer unset');
define("OUTPUT_2_SCREEN", 'successfully output to screen');
define("CACHE_UNSET_SCREEN_BUFFER", 'screen buffer unset');

define("OPEN_SESSION_FILE_ERROR", 'Could not open session file');
define("WRITE_SESSION_FILE_ERROR", 'Could not write session file');
define("SESSION_MODULE_ERROR", 'Failed to initialize session module.');
define("SESSION_NOT_SAVED", 'Session could not be saved.');
define("SESSION_NOT_CLOSED", 'Session could not be closed.');
define("SESSION_NOT_STARTED", 'Session could not be started.');

///
define("NO_BANNER_WITH_GROUP_ERROR1", '<b>TEP ERROR!');
define("NO_BANNER_WITH_GROUP_ERROR2", 'No banners with group');
define("NO_BANNER_WITH_GROUP_ERROR3", ' found!</b>');
define("NO_BANNER_WITH_ID_ERROR1", '<b>TEP ERROR!');
define("NO_BANNER_WITH_ID_ERROR2", 'Banner with ID');
define("NO_BANNER_WITH_ID_ERROR3", ' not found, or status inactive</b>');
define("NO_BANNER_WITH_UNKNOWN_PARAM_ERROR1", '<b>TEP ERROR!');
define("NO_BANNER_WITH_UNKNOWN_PARAM_ERROR2", 'Unknown');
define("NO_BANNER_WITH_UNKNOWN_PARAM_ERROR3", 'parameter value - it must be either');
define("NO_BANNER_WITH_UNKNOWN_PARAM_ERROR4", 'dynamic');
define("NO_BANNER_WITH_UNKNOWN_PARAM_ERROR5", 'static');
define("TEP_DB_ERRORR", '[TEP STOP]');
define("TEP_HREF_LINK_ERROR1", '<b>Error!</b></font><br><br><b>Unable to determine the page link!<br><br>');
define("TEP_HREF_LINK_ERROR2", '<b>Error!</b></font><br><br><b>Unable to determine connection method on a link!<br><br>Known methods: NONSSL SSL</b><br><br>');

///

#################    Ends - 20 June 2006    #################


#################    Starts - 21 June 2006    #################



define("CVV_HELP_TITLE","Card Verification Value (ccv/cvc/ccv2/cid) Help");
define("CVV_HELP_DESC1","<p><strong>What is a Card Verification Value (ccv/cvc/ccv2/cid)?</strong>
      </p>
      <p>The Card Verification Value (ccv/cvc/ccv2/cid) is a 3-digit number found on the signature
        panel on the back of your credit card. It is an additional safeguard that
        helps us validate your purchase and protect against fraud. It is not contained
        in the magnetic stripe information and is therefore not printed on sales
        receipts.</p>
      <p><strong>Where is the ccv/cvc/ccv2/cid located?</strong></p>");


define("CVV_HELP_DESC2","<p><strong>VISA, MASTERCARD,  DISCOVERY &amp; most other cards</strong><br>
        You can find your card verification code on the reverse side of your credit
        card, printed into the signature field. It is a 3-digit group for MasterCard,
        Visa, Discovery, and most other cards.<br>
      </p> ");


define("CVV_HELP_DESC3","<p><strong>AMERICAN EXPRESS</strong><br>
        The American Express Card verification code is a 4-digit number printed
        on the front of your card. It appears after and to the right (above) of
        your card number.<br>
      </p>");


#################    Start - 23 June 2006   #################

define("INFO_CC_1","Make Shopping Easier for Customers with Website Payments");
define("INFO_CC_2",''.tep_image(DIR_WS_MODULES . 'payment/paypal/images/hdr_ppGlobev4_160x76.gif',' PayPal ','','','align=right valign="top" style="margin: 10px;"').'
PayPal has optimized their checkout experience by launching an exciting new improvement to their payment flow.
<br/><br/>For new buyers, signing up for a PayPal account is now optional. This means you can complete your payment first, and then decide whether to save your information for future purchases.
<p>To pay by credit card, look for this button:<br/>
<p align="center">'.tep_image(DIR_WS_MODULES . 'payment/paypal/images/PayPal-ContinueCheckout.gif','','','').'</p>
<br/>
Or you may see this:<br/>
<p align="center">'.tep_image(DIR_WS_MODULES . 'payment/paypal/images/PayPal-no-account-Click-Here.gif','','','').'</p>
<br/>
One of these options should appear on the first PayPal screen.<br/>
<p>Note: if you are a PayPal member, you can either use your account,
or use a credit card that is not associated with a PayPal account.
In that case you\'d also need to use an email address that\'s not associated with a PayPal account.</p> ');


define("PAYPAL_SHOPPING_CART_IPN_SUBJECT","PayPal_Shopping_Cart_IPN");
define("PAYPAL_SHOPPING_CART_IPN_FROM","PayPal_Shopping_Cart_IPN");

#################    End - 23 June 2006   #################


#################    Start - 28 June 2006   #################

define("BOX_HEADING_CUSTOMER_WISHLIST_VIEW","My Wishlist View");
define("BOX_HEADING_CUSTOMER_WISHLIST_HELP","My Wishlist Help");

#################    End - 28 June 2006   #################


#################    Start - 29 June 2006   #################


define("VIEWPRICE_ERROR",'You must be logged in to search for prices.');

define("UNABLE_TO_CONNECT_TO_DATABASE_SERVER",'Unable to connect to database server!');
define("AFFILIATE_SHOW_BANNER_CHECK_PATHES",'Check the pathes! (catalog/includes/configure.php)');
define("AFFILIATE_SHOW_BANNER_ABSOLUTE_PATH",'absolute path to picture:');
define("AFFILIATE_SHOW_BANNER_BUILD_WITH_1",'build with:');
define("AFFILIATE_SHOW_BANNER_BUILD_WITH_2",'DIR_FS_DOCUMENT_ROOT . DIR_WS_CATALOG . DIR_WS_IMAGES . $banner');
define("AFFILIATE_SHOW_BANNER_DIR_FS_DOCUMENT_ROOT",'DIR_FS_DOCUMENT_ROOT');
define("AFFILIATE_SHOW_BANNER_DIR_WS_CATALOG",'DIR_WS_CATALOG');
define("AFFILIATE_SHOW_BANNER_DIR_WS_IMAGES",'DIR_WS_IMAGES');
define("AFFILIATE_SHOW_BANNER_BANNER",'$banner');
define("AFFILIATE_SHOW_BANNER_SQL_QUERY_USED",'SQL-Query used:');
define("AFFILIATE_SHOW_BANNER_TRY_TO_FIND_ERROR",'Try to find error:');
define("AFFILIATE_SHOW_BANNER_SQL_QUERY",'SQL-Query:');
define("AFFILIATE_SHOW_BANNER_LOCATING_PIC",'Locating Pic');


#################    End - 29 June 2006   #################

#################    End - 01 July 2006   #################

define("PAYPAL_NOTIFY_IPN_TEST_1","TEST IPN Processed for order #");
define("PAYPAL_NOTIFY_IPN_TEST_2","You need to specify an order #");
define("PAYPAL_NOTIFY_RECEIVED_ERROR_1","Error: no valid ");
define("PAYPAL_NOTIFY_RECEIVED_ERROR_2"," received.");

define('TEXT_CLOSE_WINDOW', 'Close Window');


#################    End - 01 July 2006   #################

define("TEXT_YOUR_CONTENT_HERE","Your Content here");
define("TEXT_NO_SPECIALS","There are currently no specials defined.");
?>
