<?php
/*
  $Id: algo_fraud_screener.php,v 1.25 2003/06/20 00:28:44 hpdl Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

// AlgoZone - Algozone Fraud Screen Tool definitions

define('ALGO_FS_DISTANCE', '<b>Entfernung(m/km)</b> ');
define('ALGO_FS_DISTANCE_M', '<b>Entfernung(m) </b>');
define('ALGO_FS_DISTANCE_K', '<b>Entfernung(k) </b>');
define('ALGO_FS_COUNTRY', '<b>Passendes Land  </b>');
define('ALGO_FS_CODE', '<b>PLZ  </b>');
define('ALGO_FS_FREE_EMAIL', '<b>Free Email  </b>');
define('ALGO_FS_ANONYMOUS', '<b>Anonymer Proxy  </b>');
define('ALGO_FS_SCORE', '<b>Stand  </b>');
define('ALGO_FS_FRAUD_LEVEL', '<b>Betrugs-Niveau  </b>');
define('ALGO_FS_BIN_MATCH', '<b>Sortierfach-Gleiches  </b>');
define('ALGO_FS_BANK_COUNTRY', '<b>Bank-Land  </b>');
define('ALGO_FS_ERR', '<b>Fehler  </b>');
define('ALGO_FS_PROXY_LEVEL', '<b>Proxy Level  </b>');
define('ALGO_FS_SPAM', '<b>Spam Level  </b>');
define('ALGO_FS_BANK_NAME', '<b>Bank Name  </b>');
define('ALGO_FS_BANK_NAME_MATCH', '<b>Bank Name stimmt &uuml;berein  </b>');
define('ALGO_FS_BANK_PHONE', '<b>Bank Telefon  </b>');
define('ALGO_FS_BANK_PHONE_MATCH', '<b>Bank Telefon &Uuml;bereinstimmung  </b>');
define('ALGO_FS_IP', '<b>IP Adresse  </b>');
define('ALGO_FS_IP_ISP', '<b>Provider  </b>');
define('ALGO_FS_IP_ISP_ORG', '<b>Provider Org  </b>');
define('ALGO_FS_IP_CITY', '<b>Stadt   </b>');
define('ALGO_FS_IP_REGION', '<b>Bundesland   </b>');
define('ALGO_FS_IP_LATITUDE', '<b>Breite   </b>');
define('ALGO_FS_IP_LONGITUDE', '<b>L&auml;nge   </b>');
define('ALGO_FS_ALGOZONE', '<b>*ACHTUNG:  Sie m&uuml;ssen beim Premium Service von Algonzone.com regisitriert sein f&uuml;r folgende Bereiche </b>');
define('ALGO_FS_HI_RISK', '<b>Risikoreiches Land  </b>');
define('ALGO_FS_CUST_PHONE', '<b>Telefon-Gleiches  </b>');
define('ALGO_FS_DETAILS', 'Sehen Sie <a href="http://www.algozone.com/" target="_blank"><u>AlgoZone.com</u></a> für Erkl&auml;rung der Felder');

define('ALGO_FS_BREQUEST', 'Überpr&uuml;fen Sie die Bank-Info'); 
define('ALGO_HELP_PREM_OPT', '*** - Verf&uuml;gbare Werte f&uuml;r diesen Bereich des Betrugsschutzes'); 

define('FS_HELP_DISTANCE', 'Distanz zwischen der IP Adresse und Bezahl Adresse in Meilen/Kilometer (Je gr&ouml;sser die Distanz == h&ouml;heres Risiko)');
define('FS_HELP_COUNTRY_MATCH', 'Ob Land von IP address Gebührenzählung Adresse Land zusammenbringt (Fehlanpassung == höhere Gefahr)');
define('FS_HELP_COUNTRY_CODE', 'Landeskennzahl der IP Adresse');
define('FS_HELP_EMAIL','Sollte eine Email von einem kostenlosen Provider stammen (free e-mail == hohes Risiko)');
define('FS_HELP_ANONYMOUS_IP','Stammt die IP Adresse von einem Anonymen Proxy? (Anonymer proxy == Sehr hohes Risiko)');
define('FS_HELP_BANK_COUNTRY','Landeskennzahl der Bank, die die Kreditkarte herausgab, gründete auf SORTIERFACH-Zahl');
define('FS_HELP_BIN_MATCH','&Uuml;berpr&uuml;fen ob der L&auml;nder Name der Bank mit der IBAn Nummer &uuml;bereinstimmt mit dem angegebenen L&auml;ndernamen');
define('FS_HELP_BANK_NAME_MATCH','Pr&uuml;fen ob der Name mit dem angegebenen Namen der Bank übereinstimmt. Bei einem R&uuml;ckgabewert von ja stimmt alles mit dem Besitzer &uuml;berein.');
define('FS_HELP_BANK_NAME','Pr&uuml;fen ob der Kartenbesitzer &uuml;bereinstimmt');
define('FS_HELP_BANK_PHONE_MATCH','Whether customer service phone number matches inputed binPhone. A return value of Yes provides a positive indication that cardholder is in possession of credit card.');
define('FS_HELP_BANK_PHONE','Customer service phone number listed on back of credit card');
define('FS_HELP_PHONE_IN_BILLING_LOC','Whether the customer phone number is in the billing location. A return value of Yes provides a positive indication that the phone number listed belongs to the cardholder. Currently we only support US Phone numbers, in the future we may support other countries.');
define('FS_HELP_PROXY_LEVEL','Likelihood of IP Address being an Open Proxy');
define('FS_HELP_SPAM_LEVEL','Likelihood of IP Address being an Spam Source');
define('FS_HELP_FRAUD_LEVEL','Overall Fraud Risk Factor based on outputs listed above');
define('FS_HELP_REGION','Estimated Region of the IP address, ISO-3166-2/FIPS 10-4 code');
define('FS_HELP_CITY','Estimated City of the IP address**');
define('FS_HELP_LATITUDE','Estimated Latitude of the IP address');
define('FS_HELP_LONGITUDE','Estimated Longitude of the IP address');
define('FS_HELP_IP','IP address of the customer. For US addresses, click on the ip address to see a map estimating where the customer is located.');
define('FS_HELP_ISP','ISP of the IP address');
define('FS_HELP_ORG','Organization of the IP address');
define('FS_HELP_IS_HI_RISK_COUNTRY','Whether IP address or billing address country is in Belarus, Colombia, Egypt, Indonesia, Lebanon, Macedonia, Malaysia, Nigeria, Pakistan, Ukraine, or Yugoslavia');
define('FS_HELP_REMAINING_QUERIES','Number of queries remaining in your account, can be used to alert you when you may need to add more queries to your account');
define('FS_HELP_DEFAULT','<i><b>To get field descriptions, place cursor on the field name<b></i>');


define('NO_IP_ADDRESS_RECORDED','*** NO IP ADDRESS RECORDED FOR THIS ORDER');
define('MAX_COMMENT_0','(Extremely Low risk)');
define('MAX_COMMENT_1','(Very Low risk)');
define('MAX_COMMENT_2','(Low risk)');
define('MAX_COMMENT_3','(Low risk)');
define('MAX_COMMENT_4','(Low-Medium risk)');
define('MAX_COMMENT_5','(Medium risk)');
define('MAX_COMMENT_6','(Medium-high risk)');
define('MAX_COMMENT_7','<font color=red>(High risk)</font>');
define('MAX_COMMENT_8','<font color=red>(Very High risk)</font>');
define('MAX_COMMENT_9','<font color=red>(Extremely High risk)</font>');
define('MAX_COMMENT_10','<font color=red>(HIGH PROBABILITY OF FRAUD)</font>');
define('ERROR','Error');
define('LAST_QUERIED_ON','Last Queried on :');
define('REMAINING_QUERIES_1','You have');
define('REMAINING_QUERIES_2','queries remaining');

// End AlgoZone - Algozone Fraud Screen Tool definitions
?>
