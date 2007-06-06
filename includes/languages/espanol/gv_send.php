<?php
/*
  $Id: gv_send.php,v 1.2 2004/03/15 12:13:02 ccwjr Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Envie el Vale del Regalo');
define('NAVBAR_TITLE', 'Envie el Vale del Regalo');
define('EMAIL_SUBJECT', 'Investigue' . STORE_NAME);
define('HEADING_TEXT','<br>Entre por favor debajo de los detalles del vale del regalo que usted desea enviar. para mas informacion, por favor vea nuestro <a href="' . tep_href_link(FILENAME_GV_FAQ,'','NONSSL').'">'.GV_FAQ.'.</a><br>');
define('ENTRY_NAME', 'Nombre de los Recipientes:');
define('ENTRY_EMAIL', 'Recipientes E-Mail Address:');
define('ENTRY_MESSAGE', 'Mensaje para los Recipientes:');
define('ENTRY_AMOUNT', 'Cantidad de Vale del Regalo:');
define('ERROR_ENTRY_AMOUNT_CHECK', '&nbsp;&nbsp;<span class="errorText">Invalid Amount</span>');
define('ERROR_ENTRY_EMAIL_ADDRESS_CHECK', '&nbsp;&nbsp;<span class="errorText">Invalid Email Address</span>');
define('MAIN_MESSAGE', 'Usted ha decidido fijar un valor del vale de regalo %s to %s who\'s email address is %s<br><br>El texto que acompana el email dice<br><br>Dear %s<br><br>
                        Le han enviado un vale con valor de %s by %s');

define('PERSONAL_MESSAGE', '%s mensage');
define('TEXT_SUCCESS', 'Felicidades, su vale de regalo ha sido enviado con exito');


define('EMAIL_SEPARATOR', '----------------------------------------------------------------------------------------');
define('EMAIL_GV_TEXT_HEADER', 'Felicidas, Usted ha recivido un vale de regalo con valor de %s');
define('EMAIL_GV_TEXT_SUBJECT', 'El Regalo es de %s');
define('EMAIL_GV_FROM', 'Este vale de regalo ha sido enviado para usted de %s');
define('EMAIL_GV_MESSAGE', 'Con un refran del mensaje ');
define('EMAIL_GV_SEND_TO', 'Hola, %s');
define('EMAIL_GV_REDEEM', 'Para redimir este vale de regalo, chasque porfavor encendido el acoplamiento abajo. Porfavor tambien escriba el codigo de rescate is %s. (In caso que tenga problemas)');
define('EMAIL_GV_LINK', 'Para dedimir por favor chasque');
define('EMAIL_GV_VISIT', ' or visite ');
define('EMAIL_GV_ENTER', ' and entre el code ');
define('EMAIL_GV_FIXED_FOOTER', 'Si usted encuentra problemas que redime el vale del regalo usando el acoplamiento usado arriba, ' . "\n" .
                                'Usted puede tambien introducir el codigo del vale de regalo durante el processo de dela comprobacion en nuestra tienda.' . "\n\n");
define('EMAIL_GV_SHOP_FOOTER', '');
?>