<?php
/*
  $Id: salemaker_info.php,v 1.2 2004/03/05 00:36:41 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('HEADING_TITLE', 'Vendeur');
define('SUBHEADING_TITLE', 'Conseil de vente du vendeur:');
define('INFO_TEXT', '<ul>
                      <li>
                        Utiliser toujours un \'.\' point pour les prix d&eacute;cimaux et les promotions.
                      </li>
                      <li>
                        Ecrivez les montants dans la m&ecirc;me monnaie que quand vous cr&eacute;ez ou &eacute;ditez un produit.
                      </li>
                      <li>
                        Dans les champs de r&eacute;duction vous pouvez entrer un montant ou un pourcentage,
                       ou remplacez le prix. (ex. d&eacute;duire 5.00 &euro; de tous les prix, d&eacute;duire  10% de tous les prix ou changer tous les prix &agrave; 25.00 &euro;)
                      </li>
                      <li>
                        L\'entr&eacute;e &agrave; une gamme de prix r&eacute;duit la gamme de produit qui sera affect&eacute;e. (Ex. Produits de 50.00 &euro; à 150.00 &euro;)
                      </li>
                      <li>
                        VOus devez choisir l\'action &agrave; prendre si un produit est sp&eacute;cial. <i>et</i> est sujet &agrave; cette vente:
            <ul>
                          <li>
                            Ignorer les prix sp&eacute;ciaux<br>
              La d&eacute;duction de vente sera appliqu&eacute;e au prix normal du produit.
 (Ex. Prix normal 10.00 &euro;, le prix r&eacute;duit est de 9.50 &euro;, la Condition de Vente est 10 %.
               Le prix final du produit sera de  9.00 &euro; &agrave; la  vente. Le prix r&eacute;duit est ignor&eacute;.)
                          </li>
                          <li>
                            Ignorer la condition de vente<br>
                            La d&eacute;duction sur la vente ne sera pas appliqu&eacute;e aux Promotions. Le prix de Promotion sera affich&eacute;
 Quand il n\'y a aucune vente d&eacute;finie. (Ex. Prix normal 10.00 &euro;, le prix r&eacute;duit est de 9.50 &euro;, la Condition de Vente est 10 %.
               Le prix final du produit sera de  9.00 &euro; &agrave; la  vente. Le prix r&eacute;duit est ignor&eacute;.)
                          </li>
                          <li>
                            Appliquer la condition de vente aux produits en promotion<br>
                            La d&eacute;duction sera appliqu&eacute;e aux produits en promotion. Un prix compos&eacute; sera affich&eacute;.
                            (ex: Prix normal 10.00, Le prix promotionnel sera de $9.50, La condition de Vente est de 10 %. Le prix final du produit sera de 8.55 &euro;. En compl&eacute;ment de 10 % du prix de Promotion
                          </li>
                        </ul>
                      </li>
                      <li>
                        Laisser la date de d&eacute;but vide entrainera la vente imm&eacute;diate du produit.
                      </li>
                      <li>
                        Laissez la date de fin vide si vous ne voulez pas que la vente expire.</li>
                      <li>
                        La s&eacute;lection d\'une cat&eacute;gorie inclut automatiquement les sous-cat&eacute;gories.
                      </li>
                    </ul>');
define('TEXT_CLOSE_WINDOW', '[ Fermer la fen&ecirc;tre ]');
?>