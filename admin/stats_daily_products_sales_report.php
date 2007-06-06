<?php
/*
  Written by Marc Sauton, September 2004
  Daily Product Report Contribution for the OsCommerce Community
  Released under the GNU General Public License
*/

  require('includes/application_top.php');

  require(DIR_WS_CLASSES . 'currencies.php');
  $currencies = new currencies();

  // start csv - bounce csv string back as file
  if (isset($_POST['csv'])) {
  if ($HTTP_POST_VARS['saveas']) {  // rebound posted csv as save file
      $savename= $HTTP_POST_VARS['saveas'] . ".csv";
      }
      else $savename='unknown.csv';
  $csv_string = '';
  if ($HTTP_POST_VARS['csv']) $csv_string=$HTTP_POST_VARS['csv'];
  if (strlen($csv_string)>0){
    header("Expires: Mon, 26 Nov 1962 00:00:00 GMT");
    header("Last-Modified: " . gmdate('D,d M Y H:i:s') . ' GMT');
    header("Cache-Control: no-cache, must-revalidate");
    header("Pragma: no-cache");
    header("Content-Type: Application/octet-stream");
    header("Content-Disposition: attachment; filename=$savename");
    echo $csv_string;
  }
  else echo "CSV string empty";
  exit;
  };
  //end csv

  if( $_REQUEST[ "date"] == "") {
     $date = date('Y-m-d'); #2003-09-07%
  } else {
      if(  ereg( "([0-9]{4})-([0-9]{1,2})-([0-9]{1,2})", $_REQUEST[ 'date'])) {
          $date = $_REQUEST[ "date"];
      } else {
          $date = date('Y-m-d'); #2003-09-07%
      }
  }
  if( $date == "") { $date = date('Y-m-d'); }
  $cal1maxdate = date("Y") . "," . date("m") . "," . date("d");

?>

<!doctype html public "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php echo HTML_PARAMS; ?>>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>">
<title><?php echo TITLE; ?></title>
<link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
<script language="javascript" src="includes/general.js"></script>
<script language="JavaScript" src="includes/javascript/spiffyCal/spiffyCal_v2_1.js"></script>
<link rel="stylesheet" type="text/css" href="includes/javascript/spiffyCal/spiffyCal_v2_1.css">
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<div id="spiffycalendar" class="text"></div>
<script language="javascript"><!--
  var cal1 = new ctlSpiffyCalendarBox("cal1", "dailyreportform", "reportdate","btnDate3","",scBTNMODE_CALBTN);
  cal1.readonly=true;
  cal1.displayLeft=true;
  // cal1.JStoRunOnSelect="document.dailyreportform.submit();";
  cal1.JStoRunOnSelect="document.dailyreportform.action='<?php echo basename($_SERVER['PHP_SELF'])?>?date='+document.dailyreportform.reportdate.value; document.dailyreportform.submit();";
  cal1.useDateRange=true;
  cal1.setMinDate(2004,1,1);
  cal1.setMaxDate( <?php echo $cal1maxdate; ?> );
//--></script>


<!-- body //-->
<table border="0" width="100%" cellspacing="2" cellpadding="2">
  <tr>
    <td width="<?php echo BOX_WIDTH; ?>" valign="top"><table border="0" width="<?php echo BOX_WIDTH; ?>" cellspacing="1" cellpadding="1" class="columnLeft">
<!-- left_navigation //-->
<?php require(DIR_WS_INCLUDES . 'column_left.php'); ?>
<!-- left_navigation_eof //-->
        </table></td>
<!-- body_text //-->
    <td width="100%" valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
          <tr>
            <td class="pageHeading"><?php echo HEADING_TITLE . " for " . $date; ?></td>
            <td class="pageHeading" align="right"><?php echo tep_draw_separator('pixel_trans.gif', HEADING_IMAGE_WIDTH, HEADING_IMAGE_HEIGHT); ?></td>
            <td class=main>
                <form method="post" action=" <?php echo basename($_SERVER['PHP_SELF']) . '?date=' . $date; ?>" name="dailyreportform">
                <!-- input type="hidden" name="action" value="dailyreportaction" -->
                <?php // <br>cal1 value:<script language="javascript">document.write( document.forms.dailyreportform.action);</script><br> ?>
                <?php echo DISPLAY_ANOTHER_REPORT_DATE;?>
                <script language="javascript">cal1.writeControl(); cal1.dateFormat="yyyy-MM-dd"; document.dailyreportform.reportdate.value="<?php echo $date; ?>"</script></td>
                </form>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
          <tr>
            <td valign="top"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr class="dataTableHeadingRow">
<?php
$csv_accum .= "";
?>
                <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_NUMBER; ?></td>
                <td class="dataTableHeadingContent"><?php mirror_out(TABLE_HEADING_ORDER_QUANTITY); ?></td>
                <td class="dataTableHeadingContent"><?php mirror_out(TABLE_HEADING_PRODUCT_NAME); ?></td>
                <td class="dataTableHeadingContent"><?php mirror_out(TABLE_HEADING_PRODUCT_MODEL); ?></td>
                <td class="dataTableHeadingContent"><?php mirror_out(TABLE_HEADING_UNITPRICE); ?></td>
                <td class="dataTableHeadingContent"><?php mirror_out(TABLE_HEADING_PRODUCT_QUANTITY); ?></td>
                <td class="dataTableHeadingContent" align="right"><?php mirror_out(TABLE_HEADING_TOTAL_PURCHASED); ?>&nbsp;</td>
              </tr>

<?php
// new line for CSV
$csv_accum .= "\n";
//

  if (isset($HTTP_GET_VARS['page']) && ($HTTP_GET_VARS['page'] > 1)) $rows = $HTTP_GET_VARS['page'] * MAX_DISPLAY_SEARCH_RESULTS - MAX_DISPLAY_SEARCH_RESULTS;
  $products_query_raw = "select ot.value, sum(ot.value) as dailyvalue, count(distinct o.orders_id) as howmany_orders, o.orders_id, count(distinct op.orders_products_id) as howmany_tickets, op.products_name, op.products_model, op.final_price as ticket_price, op.final_price * count(distinct op.orders_products_id) as howmuch from orders_total ot, orders o, orders_products op where o.date_purchased like \"$date%\" and o.orders_id = op.orders_id and ot.orders_id = op.orders_id and ot.class='ot_total' group by op.products_name";


  $customers_split = new splitPageResults($HTTP_GET_VARS['page'], MAX_DISPLAY_SEARCH_RESULTS, $products_query_raw, $products_query_numrows);
  $products_query_numrows = tep_db_query($products_query_raw);
  $products_query_numrows = tep_db_num_rows($products_query_numrows);

  $rows = 0;
  $products_query = tep_db_query($products_query_raw);
  while ($products = tep_db_fetch_array($products_query)) {
    $rows++;

    if (strlen($rows) < 2) {
      $rows = '0' . $rows;
    }
?>
              <tr class="dataTableRow" onmouseover="rowOverEffect(this)" onmouseout="rowOutEffect(this)" onclick="document.location.href='<?php //echo tep_href_link(FILENAME_CUSTOMERS, 'search=' . $products['products_name'], 'NONSSL'); ?>'">
                <td class="dataTableContent"><?php echo $rows; ?>.</td>
                <td class="dataTableContent"><?php mirror_out(number_format($products['howmany_orders'],0)) ?>.</td>
                <td class="dataTableContent"><?php mirror_out($products['products_name']) ?>.</td>
                <td class="dataTableContent"><?php mirror_out($products['products_model']) ?></td>
                <td class="dataTableContent"><?php mirror_out(number_format($products['ticket_price'],2)) ?>.</td>
                <td class="dataTableContent"><?php mirror_out(number_format($products['howmany_tickets'],0)) ?>.</td>
                <td class="dataTableContent" align="right"><?php mirror_out(number_format($products['howmuch'],2)); ?></td>
              </tr>
<?php
// new line for CSV
$csv_accum .= "\n";
//
  }
?>
            </table></td>
          </tr>
          <tr>
            <td class=main align=center>
<?php
  //$products_query_raw = "select sum(ot.value) as dailyvalue from orders_total ot,orders o where ot.orders_id = o.orders_id and ot.class = 'ot_total' and o.date_purchased like \"$date%\"";
  $products_query_raw = "select   sum(ot.value) as dailyvalue from orders_total ot, orders o, orders_products op where o.date_purchased like \"$date%\" and o.orders_id = op.orders_id and ot.orders_id = op.orders_id and ot.class='ot_total'";
  $products_query_numrows = tep_db_query($products_query_raw);
  $products_query_numrows = tep_db_num_rows($products_query_numrows);
  $rows = 0;
  $products_query = tep_db_query($products_query_raw);
  while ($products = tep_db_fetch_array($products_query)) {
    echo '<b>' . TABLE_DAILY_VALUE . $currencies->format($products['dailyvalue']) . '</b>';
  }
?>
          </tr>
          <tr>
            <td class="smallText" colspan="4"><form action="<?php echo $_SERVER['PHP_SELF']; ?>" method=post>
              <input type='hidden' name='csv' value='<?php echo $csv_accum; ?>'>
              <input type="hidden" name="saveas" value="daily_product_sales_report_<?php echo date('YmdHi'); ?>">
              <input type="submit" value="<?php echo TEXT_BUTTON_REPORT_SAVE ;?>"></form>
            </td>
          </tr>
          <tr>
            <td colspan="3"><table border="0" width="100%" cellspacing="0" cellpadding="2">
              <tr>
                <td class="smallText" valign="top"><?php echo $customers_split->display_count($products_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, $HTTP_GET_VARS['page'], TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
                <td class="smallText" align="right"><?php echo $customers_split->display_links($products_query_numrows, MAX_DISPLAY_SEARCH_RESULTS, MAX_DISPLAY_PAGE_LINKS, $HTTP_GET_VARS['page']); ?>&nbsp;</td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
<!-- body_text_eof //-->
  </tr>
</table>
<!-- body_eof //-->

<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); 

function mirror_out ($field) {
  global $csv_accum;
  echo $field;
  $field = strip_tags($field);
  $field = ereg_replace (",","",$field);
  if ($csv_accum=='') $csv_accum=$field; 
  else 
  {if (strrpos($csv_accum,chr(10)) == (strlen($csv_accum)-1)) $csv_accum .= $field;
    else $csv_accum .= "," . $field; };
  return;
}

?>