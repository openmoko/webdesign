<?php
    $products_attributes_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_ATTRIBUTES . " where products_id='" . (int)$HTTP_GET_VARS['products_id'] . "' ");
    $products_attributes = tep_db_fetch_array($products_attributes_query);
    if ($products_attributes['total'] > 0) {
?>
            <table width="100%" border="0" cellspacing="0" cellpadding="2">
              <tr>
                <td class="main" colspan="2"><strong><?php echo TEXT_PRODUCT_OPTIONS; ?></strong></td>
              </tr>
              <?php
      $products_options_query = tep_db_query("select pa.options_id, pa.options_values_id, pa.options_values_price, pa.price_prefix, po.options_type, po.options_length, pot.products_options_name, pot.products_options_instruct from
           " . TABLE_PRODUCTS_ATTRIBUTES  . " AS pa, 
           " . TABLE_PRODUCTS_OPTIONS  . " AS po,
           " . TABLE_PRODUCTS_OPTIONS_TEXT  . " AS pot
           where pa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'
             and pa.options_id = po.products_options_id
             and po.products_options_id = pot.products_options_text_id and pot.language_id = '" . (int)$languages_id . "'
           order by pa.products_options_sort_order
           ");
      
      // Store the information from the tables in arrays for easy of processing
      $options = array();
      $options_values = array();
      while ($po = tep_db_fetch_array($products_options_query)) {
        //  we need to find the values name 
        if ( $po['options_type'] != 1  && $po['options_type'] != 4 ) {
          $ov['products_options_values_name'] = array();
          $options_values_query = tep_db_query("select pov.products_options_values_name from " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov, " . TABLE_PRODUCTS_OPTIONS_VALUES_TO_PRODUCTS_OPTIONS . " pov2po where pov.products_options_values_id = pov2po.products_options_values_id and pov2po.products_options_id = '". $po['options_id'] . "' and pov.language_id = '" . (int)$languages_id . "'");
          while ($ov_name = tep_db_fetch_array($options_values_query)) {
            $ov['products_options_values_name'][] = stripslashes($ov_name['products_options_values_name']);
          }
        } else {
          $ov['products_options_values_name'] = '';
        }
        $options[$po['options_id']] = array('name' => $po['products_options_name'], 'type' => $po['options_type'], 'length' => $po['options_length'], 'instructions' => $po['products_options_instruct']);
        $options_values[$po['options_id']][$po['options_values_id']] =  array('name' => $ov['products_options_values_name'], 'price' => $po['options_values_price'], 'prefix' => $po['price_prefix']);
      }
      
      foreach ($options as $oID => $op_data) {
        switch ($op_data['type']) {
            
          case 1:
            $maxlength = ( $op_data['length'] > 0 ? ' maxlength="' . $op_data['length'] . '"' : '' );
            $tmp_html = '<input type="text" name="id[' . $oID . '][t]"' . $maxlength . ' />'; 
?>
              <tr>
                <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
                <td class="main"><?php echo $tmp_html;  ?></td>
              </tr>
              <?php
            break;
      
          case 4:
            $text_area_array = explode(';',$op_data['length']);
            $cols = $text_area_array[0];
            if ( $cols == '' ) $cols = '100%';
            $rows = $text_area_array[1];
            $tmp_html = '<textarea name="id[' . $oID . '][t]" rows="'.$rows.'" cols="'.$cols.'" wrap="virtual"></textarea>'; 
?>
              <tr>
                <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
                <td class="main"><?php echo $tmp_html;  ?></td>
              </tr>
              <?php
            break;
      
          case 2:
            $tmp_html = '';
            $i = 0;
            foreach ( $options_values[$oID] as $vID => $ov_data ) {
              if ( (int)$ov_data['price'] == 0 ) {
                  $price = '&nbsp;';
              } else {
                  $price = '(&nbsp;' . $ov_data['prefix'] . '&nbsp;' . $currencies->display_price($ov_data['price'], $tax_rate) . '&nbsp;)';
              }
              $tmp_html .= '<input type="radio" name="id[' . $oID . ']" value="' . $vID . '">' . $ov_data['name'][$i] . '&nbsp;' . $price . '<br />';
              $i++;
            } // End of the for loop on the option value
?>
              <tr>
                <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
                <td class="main"><?php echo $tmp_html;  ?></td>
              </tr>
              <?php
            break;
          
          case 3:
            $tmp_html = '';
            $i = 0;
            foreach ( $options_values[$oID] as $vID => $ov_data ) {
              if ( (int)$ov_data['price'] == 0 ) {
                $price = '&nbsp;';
              } else {
                $price = '(&nbsp;'.$ov_data['prefix'] . '&nbsp;' . $currencies->display_price($ov_data['price'], $tax_rate).'&nbsp;)';
              }
              $tmp_html .= '<input type="checkbox" name="id[' . $oID . '][c][' . $i . ']" value="' . $vID . '">' . $ov_data['name'][$i] . '&nbsp;' . $price . '<br />';
              $i++;
            }
?>
              <tr>
                <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
                <td class="main"><?php echo $tmp_html;  ?></td>
              </tr>
              <?php
            break;
            
          case 0:
            $tmp_html = '<select name="id[' . $oID . ']">';
            $i = 0;
            foreach ( $options_values[$oID] as $vID => $ov_data ) {
              if ( (int)$ov_data['price'] == 0 ) {
                $price = '&nbsp;';
              } else {
                $price = '(&nbsp; '.$ov_data['prefix'] . '&nbsp;' . $currencies->display_price($ov_data['price'], $tax_rate).'&nbsp;)';
              }
              $tmp_html .= '<option value="' . $vID . '">' . $ov_data['name'][$i] . '&nbsp;' . $price .'</option>';
              $i++;
            } // End of the for loop on the option values
            $tmp_html .= '</select>';
?>
              <tr>
                <td class="main"><?php echo $op_data['name'] . ':' . ($op_data['instructions'] != '' ? '<br /><span class="smallText">' . $op_data['instructions'] . '</span>' : '' ); ?></td>
                <td class="main"><?php echo $tmp_html;  ?></td>
              </tr>
              <?php
            break;
        }  //end of switch
      } //end of while
?>
            </table>
            <?php
    } // end of ($products_attributes['total'] > 0)
?>