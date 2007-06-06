<?php
/*
  $Id: events_calendar v2.00 2003/06/16 18:09:20 ip chilipepper.it Exp $
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2003 osCommerce
  Released under the GNU General Public License
*/

  require('includes/application_top.php');
  require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_EVENTS_CALENDAR);
  
  $breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_EVENTS_CALENDAR, '', 'NONSSL'));
  $i =1;
  $cal = new Calendar;
  $cal->setStartDay(FIRST_DAY_OF_WEEK);
  $this_month = date('m');
  $this_year = date('Y');

  if ($HTTP_GET_VARS['_month']) {
  $month = $_month;
  $year = $_year;
  $a = $cal->adjustDate($month, $year);
  $month_ = $a[0];
  $year_= $a[1];
  }else{
  $year = date('Y');
  $month = date('m');
  $yeventear_= $year;
  $month_= $month;
  }
  
  if($HTTP_GET_VARS['_day']){
  $ev_query = tep_db_query("select event_id from ". TABLE_EVENTS_CALENDAR ." where DAYOFMONTH(start_date)= '". $_day ."' and MONTH(start_date) = '". $_month ."' and YEAR(start_date) = '". $_year ."' AND language_id = '". (int)$languages_id ."'");
   if (tep_db_num_rows($ev_query) < 2){
    $ev = tep_db_fetch_array($ev_query);
    $single_event = true;
    $select_event = $ev['event_id'];
    }
  }
  
  $content = CONTENT_EVENTS_CALENDAR;
  require(DIR_WS_TEMPLATES . TEMPLATE_NAME . '/' . TEMPLATENAME_MAIN_PAGE);
  require(DIR_WS_INCLUDES . 'application_bottom.php');
?>
