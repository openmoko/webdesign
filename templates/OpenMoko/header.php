<?php
/*
  $Id: header.php,v 1.1.1.1 2004/03/04 23:42:24 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
define('DIR_WS_TEMPLATE_IMAGES', 'templates/OpenMoko/images/');

// WebMakers.com Added: Down for Maintenance
// Hide header if not to show
if (DOWN_FOR_MAINTENANCE_HEADER_OFF =='false') {
?>
	<div id="wrapper">

	<div class="top_tabs_container">
		<?php
			if (tep_session_is_registered('customer_id')) {
		?>
	
		<div class="toptab"><div class="inner">
			<?php
				echo '<a href="' . tep_href_link(FILENAME_SHOPPING_CART, '', 'SSL') . '">'.HEADER_TITLE_CART_CONTENTS.'</a>';
				echo '<a href="' . tep_href_link(FILENAME_CHECKOUT_SHIPPING, '', 'SSL') . '">'.HEADER_TITLE_CHECKOUT.'</a>';
			?>
		</div></div>
		
		<div class="toptab"><div class="inner">
			<?php
				define(FILENAME_WISHLIST_SCRIPT, dirname(FILENAME_CHECKOUT_SHIPPING).'/wishlist.php');
				echo '<a href="' . tep_href_link(FILENAME_WISHLIST_SCRIPT, '', 'SSL') . '">'.BOX_HEADING_CUSTOMER_WISHLIST.'</a>';
			?>
		</div></div>
		
		<?php } ?>
		
		<div class="toptab"><div class="inner">
		<?php
		if (!tep_session_is_registered('noaccount')) {// DDB - PWA - 040622 - no display of logoff for PWA customers
			if (!tep_session_is_registered('customer_id')) {
				echo ' <a class="headerNavigation" href="' . tep_href_link(FILENAME_LOGIN, "", "SSL") . '">' . HEADER_TITLE_LOGIN . '</a>';
				echo ' <a class="headerNavigation" href="' . tep_href_link(FILENAME_CREATE_ACCOUNT, "", "SSL") . '">' . HEADER_TITLE_CREATE_ACCOUNT . '</a>';
			} else {
				echo '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">'.HEADER_TITLE_MY_ACCOUNT.'</a>';
				echo ' <a class="headerNavigation" href="' . tep_href_link(FILENAME_LOGOFF, "", "SSL") . '">' . HEADER_TITLE_LOGOFF . ' </a>';
			}
		}
		
		if (tep_session_is_registered('noaccount')) { // DDB - PWA - 040622 - no display of account for PWA customers
			if (!tep_session_is_registered('customer_id')) {
				echo ' <a class="headerNavigation" href="' . tep_href_link(FILENAME_LOGIN, "", "SSL") . '">' . HEADER_TITLE_LOGIN . ' </a>';
				echo ' <a class="headerNavigation" href="' . tep_href_link(FILENAME_CREATE_ACCOUNT, "", "SSL") . '">' . HEADER_TITLE_CREATE_ACCOUNT . ' </a>';
			}else{
				echo '<a href="' . tep_href_link(FILENAME_ACCOUNT, '', 'SSL') . '">'.HEADER_TITLE_MY_ACCOUNT.'</a>';
				echo ' <a class="headerNavigation" href="' . tep_href_link(FILENAME_LOGOFF, "", "SSL") . '">' . HEADER_TITLE_LOGOFF . ' </a>';
			}
		}
		?>
		</div></div>
	</div>

	<div id="header">
		<a href="#" id="site_logo"><img src="http://<?php echo OPENMOKO_WEB_HOST.OPENMOKO_WEB_WS_PATH; ?>/images/openmoko_logo.png" alt="openmoko.com" /></a>
		<div id="main_navigation">
			<ul>
				<li><a href="<?php echo om_href_link( OPENMOKO_WEB_HOST, OPENMOKO_WEB_WS_PATH ); ?>/" class="nav_home"><span>Home</span></a></li>
				<li><a href="<?php echo om_href_link( OPENMOKO_WEB_HOST, OPENMOKO_WEB_WS_PATH ); ?>/about" class="nav_about"><span>About</span></a></li>
				<li><a href="<?php echo om_href_link( OPENMOKO_WEB_HOST, OPENMOKO_WEB_WS_PATH ); ?>/products" class="nav_products"><span>Products</span></a></li>
				<li><a href="<?php /* FIXME */ echo 'https://' . OPENMOKO_SHOP_HOST . OPENMOKO_SHOP_WS_PATH; ?>/" class="nav_shop selected"><span>Shop</span></a></li>
				<li><a href="<?php echo om_href_link( OPENMOKO_WEB_HOST, OPENMOKO_WEB_WS_PATH ); ?>/developers" class="nav_developers"><span>Developers</span></a></li>
				<li><a href="<?php echo om_href_link( OPENMOKO_WEB_HOST, OPENMOKO_WEB_WS_PATH ); ?>/press" class="nav_press"><span>Press</span></a></li>
				<li><a href="<?php echo om_href_link( OPENMOKO_WEB_HOST, OPENMOKO_WEB_WS_PATH ); ?>/careers" class="nav_careers"><span>Careers</span></a></li>
				<li><a href="<?php echo om_href_link( OPENMOKO_WEB_HOST, OPENMOKO_WEB_WS_PATH ); ?>/contact" class="nav_contact"><span>Contact</span></a></li>
			</ul>

		</div>
	</div>



<?php
}
?>
<!-- header_eof //-->
