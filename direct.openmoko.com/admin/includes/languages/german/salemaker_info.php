<?php
/*
  $Id: salemaker_info.php,v 1.2 2004/03/15 12:13:02 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE','Abverkaufsmanager');
define('SUBHEADING_TITLE','Verwendungstipps f&uuml;r den Abverkaufsmanager:');
define('INFO_TEXT', '<ul>
                      <li>
                        Verwenden Sie immer einen \'.\' als Dezimalpunkt bei Nachlass und Preisspanne.
                      </li>
                      <li>
                        Geben Sie Werte in gleicher W&auml;hrung an, so als w&uuml;rden Sie einen Produkt neu einstellen/editieren.
                      </li>
                      <li>
                        In den Nachlassfeldern k&ouml;nnen Sie entweder einen absoluten Wert oder einen Prozentsatz eingeben, welcher abgezogen werden soll,
                        oder einen neuen Preis, der den alten Preis ersetzt. (zB. lasse &euro;5.00 von allen Preisen nach oder lasse 10% von
                        allen Preisen nach oder &auml;ndere alle Preise auf &euro;25.00)
                      </li>
                      <li>
                        Eine Preisspanne einzugeben w&uuml;rde die betroffene Produktauswahl schm&auml;lern. (zB.
                        Produkt von &euro;50.00 bis &euro;150.00)
                      </li>
                      <li>
                        Sie m&uuml;ssen eine Aktion ausw&auml;hlen f&uuml;r den Fall, dass ein Produkt ein Angebot ist <i>und</i> es in den Abverkauf soll:
            <ul>
                          <li>
                            Angebots-Preis ignorieren<br>
                            Der Abverkaufsnachlass  wird am regul&auml;ren Preis des Produkts angewandt.
                            (zB. regul&auml;rer Preis &euro;10.00, Angebotspreis &euro;9.50. Abverkaufs-Kondition ist 10%.
                            Der Endpreis des Produkts wird als &euro;9.00 im Abverkauf angezeigt. Der Angebots-Preis wird ignoriert.)
                          </li>
                          <li>
                            Abverkaufs-Kondition ignorieren<br>
                            Die Abverkaufs-Konditionwird nicht am Angebot angewandt. Der Angebots-Preis wird genauso angezeigt,
                            als ob gar kein Abverkauf definiert ist. (zB. regul&auml;rer Preis &euro;10.00, Angebots-Preis &euro;9.50.
                            Abverkaufs-Kondition ist 10%. Der Endpreis des Produkts wird als &euro;9.00 im Abverkauf angezeigt.
                            Die Abverkaufs-Kondition wird ignoriert)
                          </li>
                          <li>
                            Abverkaufsnachlass an Angebots-Preis anwenden<br>
                            Der Abverkaufsnachlass wird am Angebotspreis angewandt. Ein gemischter Preis wird angezeigt.
                            (zB. regul&auml;rer Preis &euro;10.00, Angebots-Preis &euro;9.50. Abverkaufs-Kondition ist 10%.
                            Der Endpreis des Produkts wird als &euro;8.55 angezeigt - das sind zus&auml;tzliche 10% vom Angebots-Preis.)
                          </li>
                        </ul>
                      </li>
                      <li>
                        Wenn Sie kein Startdatum angeben, wird der Abverkauf sofort gestartet
                      </li>
                      <li>
                        Geben Sie kein Enddatum an, wenn Sie nicht wollen, daﬂ der Abverkauf ausl&auml;uft.
                      </li>
                      <li>
                        Eine Kategorie auszuw‰hlen schliesst automatisch auch die Subkategorien mit ein.
                      </li>
                    </ul>');
define('TEXT_CLOSE_WINDOW', '[ Fenster schliessen ]');
?>