<?php
/*
  $Id: gv_faq.php,v 1.2 2004/03/15 12:13:02 ccwjr Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Vale del Regalo FAQ');
define('HEADING_TITLE', 'Vale del Regalo FAQ');

define('TEXT_INFORMATION', '<a name="Top"></a>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=1','NONSSL').'">Compra del Vale de Regalo</a><br>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=2','NONSSL').'">Como enviar los vales del Regalo</a><br>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=3','NONSSL').'">Compra con los vales del Regalo</a><br>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=4','NONSSL').'">Vales del Regalo el redimir</a><br>
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=5','NONSSL').'">Cuando ocurren los problems</a><br>
');
switch ($HTTP_GET_VARS['faq_item']) {
  case '1':
define('SUB_HEADING_TITLE','Compra de vales de Regalo.');
define('SUB_HEADING_TEXT','Los vales de regalo son comprados como cualquiera otro articulo in nuestra tienda. Usted puede pagar por ellos utilizando los metodos corrientes de la tienda. 
  Una vez que usted haya comprado el Vale de Regalo, el sera agregado automaticamente a su cuenta de Vales de Regalo. SI usted tiene fondos en la cuenta de Vales de Regalo, Usted notara la cantidad que aparecera en la cuenta de ahorros, tambien es proporsionado el acoplamiento a una pagine adonde usted puede enviar el vale de regalo a alguien via Email.');
  break;
  case '2':
define('SUB_HEADING_TITLE','Como enviar el Vale de Regalo.');
define('SUB_HEADING_TEXT','Para enviar un Vale de Regalo usted necesita ir a nuestra Pagina de Vales de Regalo. Usted puede encontrar el acoplamiento de esta pagina en la caja del carro de compras, en el las columnas del lado derecho de cada pagina. Cuando usted envie un Vale de Regalo, Usted necesita especificar la siguiente Informacion.
  El Nombre de la persona a quien usted esta enviando el Vale de Regalo, La direccion del Email a quien usted esta enviando el Vale de Regalo, La cantida que usted desea enviar.(Nota usted no tiene que mandar toda la candidad que es en su cuenta de vales de regalo.)
  A corto mensage que aparecera en el email.
  Pofavor verifique qu la informacion es correcta, ademas usted tendra la oportunidad de hacer todos los cambios que usted desea antes de enviar el email.');  
  break;
  case '3':
  define('SUB_HEADING_TITLE','Comprar con Vales de Regalos.');
  define('SUB_HEADING_TEXT','Si usted tiene fondos en la cuenta de vales de regalos, Usted puede utilizar esos fondos para comprar otros articulos en la tienda. En la etapa de Comprobacion, una addicional caja aparecera. En esta caja se applicaran los fondos en su cuenta de vales de regalo. 
  Porfavor tome nota que usted tiene que seleccionar otro medio de pago si no hay suficiente cantidad in su cuenta de vales de regalo que cubran el costo de las compras. 
  SI usted tiene fondos en su cuenta de Vales de Regalo, entonces el total de sus compras seran substraidas de la cuenta de vales de regalo y el balace sera mantenido en la cuenta para futuras compras.');
  break;
  case '4':
  define('SUB_HEADING_TITLE','Redimir Vales de Regalo.');
  define('SUB_HEADING_TEXT','Si usted recivio el vale de regalos por Email, el contendra la informacion de quien lo envio, tambien con un mensage corto. El Email tambien contiene el Numero del Vale de Regalo. Es recomendado que se imprima el email fara futuras referencias. Usted puede redimir este vale de regalo en dos formas.<br>
  1. Por Teclando el acoplamiento que contiene este Email. 
  Este lo llevara a la tienda\'s Redeem Voucher page. Se le pedira que Habra una cuenta antes que el vale de regalo sea validado y puesto en su Cuenta de Vale de Regalo y este lista para que usted comience a hacer sus compras.<br>
  2. Durante el proceso de la comprabacion en la misma pagina usted puede selecionar la forma de pago, habra una caja para que usted pueda entrar el code de dedimir. Entre el code aqui, y oprima el boton the redimir. El code sera validado y agregado a su cuenta de vale de regalo. Usted puede utilizar la cantidad para comprar cualquier articulo en nustra tienda');
  break;
  case '5':
  define('SUB_HEADING_TITLE','Cuando problemas occurren.');
  define('SUB_HEADING_TEXT','Para cualquier preguntas relationadas con los Vales de Regalos System, favor de contactar a la tienda 
  by email at '. STORE_OWNER_EMAIL_ADDRESS . '. Porfavor Conciorese de dar tanta informacion posible en el email. ');
  break;
  default:
  define('SUB_HEADING_TITLE','');
  define('SUB_HEADING_TEXT','Porvavor elija una de las preguntas de arriba.');

  }
?>