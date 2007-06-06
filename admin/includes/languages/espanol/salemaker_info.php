<?php
/*
  $Id: salemaker_info.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $
  Translated by: jparis v1.0
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2005 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Generador de rebajas');
define('SUBHEADING_TITLE', 'Consejos para el uso del generador de rebajas:');
define('INFO_TEXT', '<ul>
                      <li>
                        Use siempre un \'.\' como punto decimal en las deducciones y en el rango de precios.
                      </li>
                      <li>
                        Introduzca las cantidades en la misma moneda con que lo har�a al crear o editar un producto.
                      </li>
                      <li>
                        En los campos de deducci�n, puede introducir la cantidad o el porcentaje a deducir,
                        o un precio nuevo para reemplazar el existente. (p.e. deducir 5.00� de todos los precios, deduccir un 10% de
                        todos los precios o cambiar todos los precios a 25.00�)
                      </li>
                      <li>
                        Introduciendo un rango de precios se estrecha el rango de productos que resultar�n afectados. (p.e.
                        productos desde 50.00� a 150.00�)
                      </li>
                      <li>
                        Debe escoger la acci�n a tomar si el producto est� en oferta <i>y</i> es objeto de esta rebaja:
            <ul>
                          <li>
                            Ignorar el precio de oferta<br>
              La deducci�n por rebaja ser� aplicada al precio original del producto.
                            (p.e. Precio original 10.00�, Precio en oferta 9.50�, condici�n de rebaja de 10%.
              El precio final del producto mostrar� 9.00� en rebaja. El precio de oferta se ignora.)
                          </li>
                          <li>
                            Ignorar condici�n de rebaja<br>
                            La condici�n de rebaja no se aplicar� a los productos en oferta. El precio de los productos en oferta se mostrar�
                            como cuando no hay ninguna rebaja. (p.e. Precio original 10.00�, precio de oferta 9.50�,
                            condici�n de rebaja de 10%. El precio final del producto mostrar� 9.50� en rebaja.
                            Se ignora la condici�n de rebaja.)
                          </li>
                          <li>
                            Aplicar la condici�n de rebaja al precio en oferta<br>
                            La deducci�n por rebaja se aplicar� al precio de los productos en oferta. Se mostrar� el precio combinado.
                            (p.e. Precio original 10.00�, precio en oferta 9.50�, condici�n de rebaja de 10%. El precio final del 
                            del producto mostrar� 8.55�. Un 10% m�s de descuento sobre el precio de oferta.)
                          </li>
                        </ul>
                      </li>
                      <li>
                        Dejar la fecha de inicio vac�a har� que la oferta empiece inmediatamente.
                      </li>
                      <li>
                        Dejar la fecha de remate vac�a har� que la oferta dure indefinidamente.
                      </li>
                      <li>
                        Marcar una categor�a autom�ticamente incluye las sub-categor�as.
                      </li>
                    </ul>');
define('TEXT_CLOSE_WINDOW', '[ Cerrar ventana ]');
?>
