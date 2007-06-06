<?php
/*
  $Id: order_edit_german.php,v 1.2 2004/03/15 12:13:02 ccwjr Exp $


  Contribution based on:

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 - 2003 osCommerce

  Released under the GNU General Public License
*/

// pull down default text
define('PULL_DOWN_DEFAULT', 'Bitte w&auml;hlen Sie');
define('TYPE_BELOW', 'Bitte unten eingeben:');

define('JS_ERROR', 'Während der Eingabe sind Fehler aufgetreten!\nBitte korrigieren Sie folgendes:\n\n');

define('JS_GENDER', '* Die \'Anrede\' muss ausgewählt werden.\n');
define('JS_FIRST_NAME', '* Der \'Vorname\' muss mindestens aus ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_LAST_NAME', '* Der \'Nachname\' muss mindestens aus ' . ENTRY_LAST_NAME_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_DOB', '* Das \'Geburtsdatum\' muss folgendes Format haben: xx.xx.xxxx (Tag/Jahr/Monat).\n');
define('JS_EMAIL_ADDRESS', '* Die \'Email-Adresse\' muss mindestens aus ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_ADDRESS', '* Die \'Strasse\' muss mindestens aus ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_POST_CODE', '* Die \'Postleitzahl\' muss mindestens aus ' . ENTRY_POSTCODE_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_CITY', '* Die \'Stadt\' muss mindestens aus ' . ENTRY_CITY_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_STATE', '* Das \'Bundesland\' muss ausgew&auml;hlt werden.\n');
define('JS_STATE_SELECT', '-- W&auml;hlen Sie oberhalb --');
define('JS_ZONE', '* Das \'Bundesland\' muss aus der Liste für dieses Land ausgew&auml;hlt werden.');
define('JS_COUNTRY', '* Das \'Land\' muss ausgew&auml;hlt werden.\n');
define('JS_TELEPHONE', '* Die \'Telefonnummer\' muss aus mindestens ' . ENTRY_TELEPHONE_MIN_LENGTH . ' Zeichen bestehen.\n');
define('JS_PASSWORD', '* Das \'Passwort\' sowie die \'Passwortbest&auml;tigung\' m&uuml;ssen &uuml;bereinstimmen und aus mindestens ' . ENTRY_PASSWORD_MIN_LENGTH . ' Zeichen bestehen.\n');

define('CATEGORY_COMPANY', 'Firma');
define('CATEGORY_PERSONAL', 'Pers&ouml;nliche Daten');
define('CATEGORY_ADDRESS', 'Adresse');
define('CATEGORY_CONTACT', 'Kontakt');
define('CATEGORY_OPTIONS', 'Optionen');
define('CATEGORY_PASSWORD', 'Passwort');
define('CATEGORY_CORRECT', 'Wenn dies der richtige Kunde ist, drücken Sie den &quot;Best&auml;tigen&quot; Button unten..');

define('ENTRY_CUSTOMERS_ID', 'Kundennummer:');
define('ENTRY_CUSTOMERS_ID_TEXT', '&nbsp;<small><font color="#AABBDD">erforderlich</font></small>');
define('ENTRY_COMPANY', 'Firmennameame:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Anrede:');
define('ENTRY_GENDER_ERROR', '&nbsp;<span class="errorText">notwendige Eingabe</span>');
define('ENTRY_GENDER_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_FIRST_NAME', 'Vorname:');
define('ENTRY_FIRST_NAME_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_FIRST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_LAST_NAME', 'Nachname:');
define('ENTRY_LAST_NAME_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_LAST_NAME_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_LAST_NAME_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_DATE_OF_BIRTH', 'Geburtsdatum:');
define('ENTRY_DATE_OF_BIRTH_ERROR', '&nbsp;<span class="errorText">(z.B. 21.05.1970)</span>');
define('ENTRY_DATE_OF_BIRTH_TEXT', '&nbsp;<small>(z.B. 21.05.1970) <font color="#AABBDD">notwendig</font></small>');
define('ENTRY_EMAIL_ADDRESS', 'Email Adresse:');
define('ENTRY_EMAIL_ADDRESS_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', '&nbsp;<span class="errorText">ung&uuml;ltige Email-Adresse!</span>');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', '&nbsp;<span class="errorText">Diese Email-Adresse existiert schon!</span>');
define('ENTRY_EMAIL_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_STREET_ADDRESS', 'Strasse:');
define('ENTRY_STREET_ADDRESS_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_STREET_ADDRESS_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_SUBURB', 'weitere Anschrift:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Postleitzahl:');
define('ENTRY_POST_CODE_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_POSTCODE_MIN_LENGTH . ' Zahlen</span>');
define('ENTRY_POST_CODE_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_CITY', 'Stadt:');
define('ENTRY_CITY_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_CITY_MIN_LENGTH . ' Buchstaben</span>');
define('ENTRY_CITY_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_STATE', 'Bundesland:');
define('ENTRY_STATE_ERROR', '&nbsp;<span class="errorText">notwendige Eingabe</font></small>');
define('ENTRY_STATE_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_COUNTRY', 'Land:');
define('ENTRY_COUNTRY_ERROR', '');
define('ENTRY_COUNTRY_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_TELEPHONE_NUMBER', 'Telefonnummer:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', '&nbsp;<span class="errorText">mindestens ' . ENTRY_TELEPHONE_MIN_LENGTH . ' Zahlen</span>');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_FAX_NUMBER', 'Telefaxnummer:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'abonniert');
define('ENTRY_NEWSLETTER_NO', 'nicht abonniert');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Passwort:');
define('ENTRY_PASSWORD_CONFIRMATION', 'Passwort Best&auml;tigung:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('ENTRY_PASSWORD_ERROR', '&nbsp;<small><font color="#FF0000">mindestens ' . ENTRY_PASSWORD_MIN_LENGTH . ' Buchstaben</font></small>');
define('ENTRY_PASSWORD_TEXT', '&nbsp;<small><font color="#AABBDD">notwendige Eingabe</font></small>');
define('PASSWORD_HIDDEN', '--HIDDEN--');

// manual order box text in includes/boxes/manual_order.php

define('BOX_HEADING_MANUAL_ORDER', 'Manuelle Bestellungen');
define('BOX_MANUAL_ORDER_CREATE_ACCOUNT', 'Konto er&ouml;ffnen');
define('BOX_MANUAL_ORDER_CREATE_ORDER', 'Bestellung er&ouml;ffnen');
?>
