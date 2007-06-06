<?php
/*
  $Id: send_html_mail, v 5.0 2003/06/29 22:50:52 Gyakutsuki Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

 
define('STORE_LOGO', 'pixel_trans.gif');      //Image de votre logo. Cette image doit se situer dans votre repertoire catalog/images, si vous ne voulez pas de logo laisser le gif transparent.
define('EMAILCOM', '' . STORE_OWNER_EMAIL_ADDRESS . '');       //votre email de liaison

// Couleur du fonds et liens
define ('BODY','<BODY vLink="#006400" aLink="#006400" link="#006400" bgColor="#0066cc">');

// Introduction
define('EMAIL_TEXT_DEAR', '<STRONG> <FONT face=Arial>C </FONT> </STRONG> <FONT face=Arial><STRONG>her(e) client(e)</STRONG> </FONT>');        //texte devant le nom de la personne
define('EMAIL_TEXT_ORDER_NUMBER', 'Commande N° :');  //def en francais
define('EMAIL_TEXT_DATE','date(d/m/Y)');
define('EMAIL_TEXT_DATE_SHIPPING', 'Date de traitement :'); //def en francais
define('EMAIL_TEXT_INTRO_CUSTOMERS_SERVICE','Le service Client.<br>');

// Image
define('EMAIL_IMAGE_TITRE_ENVOI', '<IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'mail/titre_envoi.gif">'); 
define('EMAIL_IMAGE_VARLOGO', '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . '"><IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . STORE_LOGO .' " border=0></a> ');   
define('EMAIL_IMAGE_FOURMI','<IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'mail/fourmi_ar.jpg"  border=0> ');
define('EMAIL_IMAGE_COMMANDE', '<IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'mail/detail_cde.gif"  border=0>'); 
define('EMAIL_IMAGE_SVC','<A href="'. HTTP_SERVER . DIR_WS_CATALOG .'contact_us.php"><IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'mail/svc_1.gif"  border=0> ');
define('EMAIL_IMAGE_ST','<IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'mail/mail_st.gif" border=0>');

// Detail commande
define('EMAIL_TEXT_TITLE','Etat de votre commande sur ' . HTTP_SERVER .'');
define('EMAIL_TEXT_FOLLOW_ORDER', '<br><font color="#999999"><b>SUIVIE DE VOTRE COMMANDE...<br><br></b></font>');
define('EMAIL_TEXT_DATE_ORDERED', 'Date de votre commande : ');  //def en francais
define('EMAIL_TEXT_INVOICE_URL', '<br>Voir votre commande : ');  //def en francais
define('EMAIL_TEXT_STATUT','<b>Etat du Statut de la commande</b>');

// Tableau Contact / Mail / telephone
define('EMAIL_TEXT_CONTACT_SERVICE_CLIENT','Pour Contacter notre service clients au sujet d\'une commande');
define('EMAIL_TEXT_CONTACT_SERVICE_CLIENT_SHEET1','Par t&eacute;l&eacute;phone au :');
define('EMAIL_TEXT_CONTACT_SERVICE_CLIENT_SHEET_CONTENT1', '<div align="center"> <FONT face=Arial color=darkgreen size=2><B>0 800 800 800</B></FONT><br><br><FONT  color=#cc0000 size=1 face=Arial>Service payant :1€ 35 l\'appel puis 0,34€ la min </FONT>&nbsp; <br><B><FONT  face=Arial color=#003399 size=1>Du Lundi au Vendredi : 8h30-21h <b> Le Samedi : 9h-17h30</FONT></div>');
define('EMAIL_TEXT_CONTACT_SERVICE_CLIENT_SHEET2','Par Mail :');
define('EMAIL_TEXT_CONTACT_SERVICE_CLIENT_SHEET_CONTENT2','<div align="center"> <FONT face=Arial  color="#cc0000" size=2><B> '. STORE_OWNER_EMAIL_ADDRESS .'</B></FONT><br><br><FONT face=Arial color=#003399 size=1> R&eacute;ponses aux mails </div><br>Du Lundi au Vendredi : 9h-22h <br> Du Samedi au Dimanche : 9h-17h</FONT></div>');
define('EMAIL_TEXT_CONTACT_SERVICE_CLIENT_SHEET3','<STRONG>Par Courrier </STRONG> <SUP> <FONT color=white>(1) </FONT> </SUP> <STRONG>');
define('EMAIL_TEXT_CONTACT_SERVICE_CLIENT_SHEET_CONTENT3','<div align="center"><FONT face=Arial color=darkgreen size=2><B>Service-Clients</B></FONT><br><br><FONT face=Arial color=darkgreen size=1>'. STORE_NAME_ADDRESS.'</font></DIV> ');

// Contact
define('EMAIL_TEXT_CONTACT','Consultez et questionnez gratuitement votre service clients en ligne !!');
define('EMAIL_TEXT_CONTACT_CONTENT','Accessible depuis la home page de <A href="'. HTTP_SERVER . DIR_WS_CATALOG .'">'. STORE_NAME .'</a>, ou via la rubrique <A href="'. HTTP_SERVER . DIR_WS_CATALOG .'/contact_us.php">Contact</a>, vous pouvez nous poser une question sur le suivi de votre commande, une question sur le SAV, tout savoir sur les garanties, la livraison.... ');
define('EMAIL_TEXT_NOTE','(1) Afin d\'optimiser le traitement de votre r&eacute;ponse, il suffit simplement d\'ajouter le service auquel vous vous adressez : Suivi des commandes - R&egrave;glements - Remboursement-SAV/retours');
define('EMAIL_TEXT_END','Le service Client');

define('EMAIL_TEXT_NOHTML','Si vous ne voyez pas cet e mail, veuillez consulter votre compte sur  <A href="'. HTTP_SERVER . DIR_WS_CATALOG .'">'. STORE_NAME .'</a> afin de connaitre l\'Etat du traitemende votre commande');


// Statut = 1 la commande n\'est pas encore trait&eacute;e
define('EMAIL_IMAGE_ARGO','<IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'mail/ar_go.gif">');
define('EMAIL_TEXT_INTRO_CUSTOMERS','<b>Nous avons le plaisir de vous annoncer que nous avons commencer à traiter votre commande.</b><p> Vous trouverez ci-dessous tous les &eacute;l&eacute;ments concernant le d&eacute;tail de la gestion de votre commande</p>Merci de votre confiance, à tr&egrave;s bientôt sur <a href="' . HTTP_SERVER . '">' .STORE_OWNER . '</a>.<br><br>Cordialement,'); //def en francais
define('EMAIL_IMAGE_POSTE', '<A href="'. HTTP_SERVER . DIR_WS_CATALOG .'account.php"><IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . '/mail/ar_laposte.jpg"  border=0>'); 
define('EMAIL_TEXT_POST','<b>Pour suivre l\'&eacute;volution de votre commande, cliquez ici :</B>');
define('EMAIL_TEXT_DELAY','<B>Sur les d&eacute;lais de livraison :</B>');
define('EMAIL_TEXT_DELAY_CONTENT','Nous venons de remettre votre colis aux services de distribution de la Poste. Le d&eacute;lai moyen d\'acheminement peut varier en fonction de votre localisation de 2 à 5 jours ouvr&eacute;s . Si dans un d&eacute;lai de 7 jours ouvr&eacute;s à partir de notre date d\'exp&eacute;dition, vous ne recevez ni colis, ni avis de passage, nous vous recommandons de v&eacute;rifier aupr&egrave;s du bureau de Poste le plus proche de chez vous, si le colis n\'est pas en instance. Contactez votre service clients.');
define('EMAIL_TEXT_WARNING','<font face=Arial,Helvetica,Geneva,Swiss,SunSans-Regular color="#cc0000" size=2><B>Attention !</B></FONT> <font face=Arial,Helvetica,Geneva,Swiss,SunSans-Regular color="#ffffff" size=2><B> Si votre colis arrive en tr&egrave;s mauvais &eacute;tat : </B></font>');
define('EMAIL_TEXT_WARNING_CONTENT','Vous devez imp&eacute;rativement l\'ouvrir et le contrôler en pr&eacute;sence du livreur. Si les produits sont endommag&eacute;s, nous vous conseillons de refuser le colis en indiquant sur le bordereau de livraison la mention "colis refus&eacute; car endommag&eacute;". Si le colis pr&eacute;sente des traces &eacute;videntes d\'ouverture et qu\'il manque un ou plusieurs articles, vous devez &eacute;galement le refuser et faire un constat de spoliation aupr&egrave;s de la Poste, que vous nous renverrez afin que nous proc&eacute;dions au remboursement ou à l\'&eacute;change.');
define('EMAIL_TEXT_COMPOSE','Votre commande est compos&eacute;e de plusieurs articles : ');
define('EMAIL_TEXT_COMPOSE_CONTENT','Pour plus de commodit&eacute; et de s&eacute;curit&eacute;, nous pouvons scinder en plusieurs parties votre commande . Vous pouvez ainsi recevoir votre commande :<BR> - en colissimo (jusqu\'à 30 kg), <BR> - en Chronopost (si l\'un des produits est d\'une valeur sup&eacute;rieure ou &eacute;gale à 762.25 € et de moins de 30 kg)<BR> - Par transporteur si le produit fait plus de 30 kg');


// Statut = 2 la commande est en cours de traitement
define('EMAIL_IMAGE_ARGO1','<IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'mail/ar_go1.gif">');
define('EMAIL_TEXT_INTRO_CUSTOMERS1','<b>Nous avons le plaisir de vous annoncer que nous traitons votre commande.</b><p> Vous trouverez ci-dessous tous les &eacute;l&eacute;ments concernant le d&eacute;tail de la gestion de votre commande</p>Merci de votre confiance, à tr&egrave;s bientôt sur <a href="' . HTTP_SERVER . '">' .STORE_OWNER . '</a>.<br><br>Cordialement,'); //def en francais
define('EMAIL_IMAGE_POSTE1', '<A href="'. HTTP_SERVER . DIR_WS_CATALOG .'account.php"><IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . '/mail/ar_laposte1.jpg"  border=0>'); 
define('EMAIL_TEXT_POST1','<b>Pour suivre l\'&eacute;volution de l\'&eacute;tat de votre  commande, cliquez ici :</B>');
define('EMAIL_TEXT_DELAY1','<B>Sur les d&eacute;lais de livraison :</B>');
define('EMAIL_TEXT_DELAY_CONTENT1','Nous venons de remettre votre colis aux services de distribution de la Poste. Le d&eacute;lai moyen d\'acheminement peut varier en fonction de votre localisation de 2 à 5 jours ouvr&eacute;s . Si dans un d&eacute;lai de 7 jours ouvr&eacute;s à partir de notre date d\'exp&eacute;dition, vous ne recevez ni colis, ni avis de passage, nous vous recommandons de v&eacute;rifier aupr&egrave;s du bureau de Poste le plus proche de chez vous, si le colis n\'est pas en instance. Contactez votre service clients.');
define('EMAIL_TEXT_WARNING1','<font face=Arial,Helvetica,Geneva,Swiss,SunSans-Regular color="#cc0000" size=2><B>Attention !</B></FONT> <font face=Arial,Helvetica,Geneva,Swiss,SunSans-Regular color="#ffffff" size=2><B> Si votre colis arrive en tr&egrave;s mauvais &eacute;tat : </B></font>');
define('EMAIL_TEXT_WARNING_CONTENT1','Vous devez imp&eacute;rativement l\'ouvrir et le contrôler en pr&eacute;sence du livreur. Si les produits sont endommag&eacute;s, nous vous conseillons de refuser le colis en indiquant sur le bordereau de livraison la mention "colis refus&eacute; car endommag&eacute;". Si le colis pr&eacute;sente des traces &eacute;videntes d\'ouverture et qu\'il manque un ou plusieurs articles, vous devez &eacute;galement le refuser et faire un constat de spoliation aupr&egrave;s de la Poste, que vous nous renverrez afin que nous proc&eacute;dions au remboursement ou à l\'&eacute;change.');
define('EMAIL_TEXT_COMPOSE1','Votre commande est compos&eacute;e de plusieurs articles : ');
define('EMAIL_TEXT_COMPOSE_CONTENT1','Pour plus de commodit&eacute; et de s&eacute;curit&eacute;, nous pouvons scinder en plusieurs parties votre commande . Vous pouvez ainsi recevoir votre commande :<BR> - en colissimo (jusqu\'à 30 kg), <BR> - en Chronopost (si l\'un des produits est d\'une valeur sup&eacute;rieure ou &eacute;gale à 762.25 € et de moins de 30 kg)<BR> - Par transporteur si le produit fait plus de 30 kg');


// Statut = 3 la commande est envoy&eacute;e.
define('EMAIL_IMAGE_ARGO2','<IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . 'mail/ar_go2.gif">');
define('EMAIL_TEXT_INTRO_CUSTOMERS2','<b>Nous avons le plaisir de vous annoncer le d&eacute;part de votre commande de nos entrepôts.</b><p> Vous trouverez ci-dessous tous les &eacute;l&eacute;ments concernant le d&eacute;tail de la gestion de votre commande.</p>Merci de votre confiance, à tr&egrave;s bientôt sur <a href="' . HTTP_SERVER . '">' .STORE_OWNER . '</a>.<br><br>Cordialement,'); //def en francais
define('EMAIL_IMAGE_POSTE2', '<IMG src="'. HTTP_SERVER . DIR_WS_CATALOG . DIR_WS_IMAGES . '/mail/ar_laposte2.gif"  border=0>'); 
define('EMAIL_TEXT_POST2','<b>Pour suivre l\'&eacute;tat de votre colis en temps r&eacute;el, cliquez ici :</B><A href="http://www.coliposte.net/particulier/suivi_particulier.jsp?colispart='.$colispost.'">');
define('EMAIL_TEXT_DELAY2','<B>Sur les d&eacute;lais de livraison :</B>');
define('EMAIL_TEXT_DELAY_CONTENT2','Nous venons de remettre votre colis aux services de distribution de la Poste. Le d&eacute;lai moyen d\'acheminement peut varier en fonction de votre localisation de 2 à 5 jours ouvr&eacute;s . Si dans un d&eacute;lai de 7 jours ouvr&eacute;s à partir de notre date d\'exp&eacute;dition, vous ne recevez ni colis, ni avis de passage, nous vous recommandons de v&eacute;rifier aupr&egrave;s du bureau de Poste le plus proche de chez vous, si le colis n\'est pas en instance. Contactez votre service clients.');
define('EMAIL_TEXT_WARNING2','<font face=Arial,Helvetica,Geneva,Swiss,SunSans-Regular color="#cc0000" size=2><B>Attention !</B></FONT> <font face=Arial,Helvetica,Geneva,Swiss,SunSans-Regular color="#ffffff" size=2><B> Si votre colis arrive en tr&egrave;s mauvais &eacute;tat : </B></font>');
define('EMAIL_TEXT_WARNING_CONTENT2','Vous devez imp&eacute;rativement l\'ouvrir et le contrôler en pr&eacute;sence du livreur. Si les produits sont endommag&eacute;s, nous vous conseillons de refuser le colis en indiquant sur le bordereau de livraison la mention "colis refus&eacute; car endommag&eacute;". Si le colis pr&eacute;sente des traces &eacute;videntes d\'ouverture et qu\'il manque un ou plusieurs articles, vous devez &eacute;galement le refuser et faire un constat de spoliation aupr&egrave;s de la Poste, que vous nous renverrez afin que nous proc&eacute;dions au remboursement ou à l\'&eacute;change.');
define('EMAIL_TEXT_COMPOSE2','Votre commande est compos&eacute;e de plusieurs articles : ');
define('EMAIL_TEXT_COMPOSE_CONTENT2','Pour plus de commodit&eacute; et de s&eacute;curit&eacute;, nous pouvons scinder en plusieurs parties votre commande . Vous pouvez ainsi recevoir votre commande :<BR> - en colissimo (jusqu\'à 30 kg), <BR> - en Chronopost (si l\'un des produits est d\'une valeur sup&eacute;rieure ou &eacute;gale à 762.25 € et de moins de 30 kg)<BR> - Par transporteur si le produit fait plus de 30 kg');
define('EMAIL_TEXT_NOTE1','Conservez cette confirmation d\'envoi jusqu\'à&nbsp; r&eacute;ception de votre colis !');

//gestion des variables
define('VARSTYLE', '<link rel="stylesheet" type="text/css" href="' . HTTP_SERVER . DIR_WS_CATALOG .'mail_html_admin.css">');   //lien vers votre nouveau css de email
define('VARHTTP', '<base href="' . HTTP_SERVER . DIR_WS_CATALOG . '">');
   
?>