<?php
/*
   for Separate Pricing Per Customer v4 2005/03/03
   customers_groups.php
*/
  
define('HEADING_TITLE', 'Gruppen');
define('HEADING_TITLE_SEARCH', 'Suchen:');

define('TABLE_HEADING_NAME', 'Name');
define('TABLE_HEADING_ACTION', 'Aktion');

define('ENTRY_GROUPS_NAME', 'Gruppenname:');
define('ENTRY_GROUP_SHOW_TAX', 'Zeige&#160;Preis&#160;mit/ohne&#160;MwSt.:');
define('ENTRY_GROUP_SHOW_TAX_YES', 'Preis inkl. MwSt.');
define('ENTRY_GROUP_SHOW_TAX_NO', 'Preis ohne MwSt.');

define('ENTRY_GROUP_TAX_EXEMPT', 'Steuerfrei:'); 
define('ENTRY_GROUP_TAX_EXEMPT_YES', 'Ja'); 
define('ENTRY_GROUP_TAX_EXEMPT_NO', 'Nein'); 

define('ENTRY_GROUP_PAYMENT_SET', 'Bezahl Module für diese Gruppe setzen');
define('ENTRY_GROUP_PAYMENT_DEFAULT', 'Einstellung der Konfiguration verwenden');
define('ENTRY_PAYMENT_SET_EXPLAIN', 'If you choose <b><i>Set payment modules for the customer group</i></b> but do not check any of the boxes, default settings will still be used.');

define('ENTRY_GROUP_SHIPPING_SET', 'Versand Module für diese Kunden Gruppe');
define('ENTRY_GROUP_SHIPPING_DEFAULT', 'Einstellung der Konfiguration verwenden');
define('ENTRY_SHIPPING_SET_EXPLAIN', 'If you choose <b><i>Set shipping modules for the customer group</i></b> but do not check any of the boxes, default settings will still be used.');

define('TEXT_DELETE_INTRO', 'Wollen Sie diese Gruppe wirklich l&ouml;schen?');
define('TEXT_DISPLAY_NUMBER_OF_CUSTOMERS_GROUPS', 'Anzeigen <b>%d</b> bis <b>%d</b> (von <b>%d</b> Kundengruppen)');
define('TEXT_INFO_HEADING_DELETE_GROUP', 'Gruppe l&ouml;schen');

define('ERROR_CUSTOMERS_GROUP_NAME', 'Bitte geben Sie einen Gruppennamen an');
?>
