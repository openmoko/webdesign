<?php
/*
  $Id: gv_faq.php,v 1.2 2004/03/05 00:36:42 ccwjr Exp $

  The Exchange Project - Community Made Shopping!
  http://www.theexchangeproject.org

  Gift Voucher System v1.0
  Copyright (c) 2001,2002 Ian C Wilson
  http://www.phesis.org

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'FAQ - Ch&egrave;ques cadeaux'); 
define('HEADING_TITLE', 'FAQ - Ch&egrave;ques cadeaux'); 

define('TEXT_INFORMATION', '<a name="Top"></a> 
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=1','NONSSL').'">1 - Pourquoi acheter des ch&egrave;ques cadeaux ?</a><br> 
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=2','NONSSL').'">2 - Comment envoyer des ch&egrave;ques cadeaux &agrave; vos proches ?</a><br> 
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=3','NONSSL').'">3 - Comment effectuer des achats &agrave; l\'aide de ch&egrave;que cadeau ?</a><br> 
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=4','NONSSL').'">4 - Comment valider un ch&egrave;que cadeau ?</a><br> 
  <a href="'.tep_href_link(FILENAME_GV_FAQ,'faq_item=5','NONSSL').'">5 - En cas de probl&egrave;mes !</a><br> 
'); 
switch ($HTTP_GET_VARS['faq_item']) { 
  case '1': 
define('SUB_HEADING_TITLE','<br>' . 'Pourquoi acheter des ch&egrave;ques cadeaux ?'); 
define('SUB_HEADING_TEXT','<br>' . 'Tr&egrave;s utile, les ch&egrave;ques cadeaux peuvent servir pour faire plaisir &agrave; l\'un de vos proches, pour qui vous ne savez pas 
quoi lui offrir. Ils s\'ach&egrave;tent sur le site comme un article.<br><br>Si vous avez actuellement des ch&egrave;ques cadeaux sur votre compte, une bo&icirc;te 
appara&icirc;tra dans la colonne de droite.<br><br>Cette bo&icirc;te indique le montant disponible en ch&egrave;que cadeau sur votre compte et elle vous permet d\'en 
faire b&eacute;nificier vos proches par simple email.'); 
  break; 
  case '2': 
define('SUB_HEADING_TITLE','<br>' . 'Pour envoyer un ch&egrave;que cadeau &agrave vos proches ?'); 
define('SUB_HEADING_TEXT','<br>' . 'Vous pouvez y acc&eacute;der par la bo&icirc;te correspondant au ch&egrave;que cadeau qui se trouve dans la colonne de  droite 
(Cette boite s\'affiche seulement si vous poss&eacute;dez des ch&egrave;ques cadeaux sur votre compte).<br><br>Pour faire beneficier un ch&egrave;que cadeau 
&agrave; un proche veuillez sp&eacute;cifier :<br>&nbsp;&nbsp;&nbsp;&nbsp;- Le nom de la personne.<br>&nbsp;&nbsp;&nbsp;&nbsp;- Son adresse e-mail. 
<br>&nbsp;&nbsp;&nbsp;&nbsp;- Le montant que vous desirez lui faire parvenir (Vous n\'&ecirc;tes pas obliger de mettre la totalit&eacute; du montant qui est 
dans votre compte.).<br>&nbsp;&nbsp;&nbsp;&nbsp;- Et si vous le d&eacute;sirez laisser lui un message qui appara&icirc;tra dans l\'email.<br><br>Veuillez-vous 
assurer que toutes les informations inscrites sont correctes, elles sont changeables autant que vous le d&eacute;sirez avant l\'envoie d&eacute;finitif des emails.'); 
  break; 
  case '3': 
  define('SUB_HEADING_TITLE','<br>' . 'Comment effectuer des achats &agrave; l\'aide de ch&egrave;que cadeau ?'); 
  define('SUB_HEADING_TEXT','<br>' . 'Librement faite vos achats sur le site et ensuite au moment de la commande utiliser vos ch&egrave;ques cadeaux comme un mode de paiement. 
  <br><br>Si l\'un  des articles choisi d&eacute;passe le montant du ch&egrave;que cadeau, vous devez choisir une m&eacute;thode de paiement suppl&eacute;mentaire pour 
  r&eacute;gler la diff&eacute;rence. En outre, si le montant des articles est &eacute;gal ou inf&eacute;rieur &agrave; la somme de vos ch&egrave;ques cadeaux, 
  le paiement suppl&eacute;mentaire sera ignor&eacute; et/ou le reste de la somme de vos ch&egrave;ques cadeaux sera libre pour effectuer vos futurs achats.'); 
  break; 
  case '4': 
  define('SUB_HEADING_TITLE','<br>' . 'Comment valider un ch&egrave;que cadeau ?'); 
  define('SUB_HEADING_TEXT','<br>' . 'Si vous recevez un ch&egrave;que cadeau par email, celui-ci contiendra des informations sur la personne qui vous l&agrave; fait parvenir, 
  ainsi qu\'un court message de sa part. Cet email indiquera aussi le code du ch&egrave;que cadeau, que vous pouvez imprimer.<br><br>Pour utiliser votre ch&egrave;que cadeau, 
   cliquer sur le lien fourni dans l\'email, cr&eacute;er votre compte qui est obligatoire, si vous n\'&ecirc;tes pas encore client. Apr&egrave;s validation de notre part, 
   vous pouvez effectuer vos achats sur le site. Un lien est disponible &agrave; tout moments pour valider votre ch&egrave;que cadeau dans la rubrique information se trouvant 
   dans la colonne de gauche.<br><br>Nous vous rappelons, pour la validation d\'un ch&egrave;que cadeau, vous &ecirc;tes dans l\'obligation d\'ouvrir un compte.'); 
  break; 
  case '5': 
  define('SUB_HEADING_TITLE','<br>' . 'En cas de probl&egrave;mes !'); 
  define('SUB_HEADING_TEXT','<br>' . 'Pour tous autres renseignements ou en cas de probl&egrave;mes avec les ch&egrave;ques cadeaux, n\'h&eacute;siter pas &agrave; prendre contact 
  avec nous par email root@localhost et assurez-vous que vous nous avez fournit le maximum d\'informations pour vous r&eacute;pondre et vous satisfaire dans les plus bref 
  d&eacute;lais.'); 
  break; 
  default: 
  define('SUB_HEADING_TITLE',''); 
  define('SUB_HEADING_TEXT','<br>' . 'Choisissez une question ci-dessus.'); 

  }
?>