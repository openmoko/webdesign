<?php
/*
  $Id: googlead.php, v 1.1 2004/05/30 Tom O'Neill (zip1)

  Released under the GNU General Public License
 based on banner in a box by aubrey@mycon.co.za

  IMPORTANT NOTE:

  This script is not part of the official osC distribution
  but an add-on contributed to the osC community. Please
  read the README and  INSTALL documents that are provided
  with this file for further information and installation notes.

  CRE Loaded , Open Source E-Commerce Solutions
  http://www.creloaded.com
 
  Chain Reaction Works, Inc
 Copyright &copy; 2005 - 2006 Chain Reaction Works, Inc.
  
  Last Modified by $Author$
  Last Modifed on : $Date$
  Latest Revision : $Revision: 1075 $


*/
?>
<!-- google-banner-ad-in-a-box //-->
<?php
  if (!(getenv('HTTPS')=='on')){
  if ($banner = tep_banner_exists('dynamic', 'googlebox')) {
?>
          <tr>
            <td>

<?php
    $bannerstring = tep_display_banner('static', $banner);

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'left',
                                 'text'  => '<font color="' . $font_color . '">' . BOX_GOOGLE_AD_BANNER_HEADING . '</font>'
                                );
    new infoBoxHeading($info_box_contents, false, false);

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                                 'text'  => $bannerstring
                                );
    new infoBox($info_box_contents);
?>
            </td>
          </tr>
<?php
  }
  }
?>
<!-- google-banner-ad-in-a-box_eof //-->
