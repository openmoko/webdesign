<?php
/*
  $Id: citibank.php,v 1.0 2003/03/11 05:03:10 hpdl Exp $


  Copyright (c) 2003 by PIGSTUY.COM

  Released under the GNU General Public License
*/

  class citibank {
    var $code, $title, $description, $enabled;
    var $allowed_types,$card_types;
    var $cc_data,$x_Card_Code;
    var $cart_id;
    var $response;
    	
   	// class constructor
    function citibank() {
    	$this->cc_data = array();
    	
		$this->code = 'citibank';
		
		$this->title = MODULE_PAYMENT_CITIBANK_TEXT_TITLE;
		$this->description = MODULE_PAYMENT_CITIBANK_TEXT_DESCRIPTION;
		$this->enabled = ((MODULE_PAYMENT_CITIBANK_STATUS == 'True') ? true : false);
		
		$this->email_footer = MODULE_PAYMENT_CITIBANK_TEXT_EMAIL_FOOTER;
      
		$this->allowed_types = array();
		
		// Define all supported CC types for transactions
	    $this->card_types = array(
	    	'VISA' => MODULE_PAYMENT_CITIBANK_TEXT_VISA,
	        'MASTER' => MODULE_PAYMENT_CITIBANK_TEXT_MASTER,
	        'JCB' => MODULE_PAYMENT_CITIBANK_TEXT_JCB,
	        'UCARD' => MODULE_PAYMENT_CITIBANK_TEXT_UCARD
	    );
		
        // Define allowed CC types for transactions (it gets them from MODULE_PAYMENT_CITIBANK_ACCEPTED_CC constant)
	    $cc_array = explode(',', MODULE_PAYMENT_CITIBANK_ACCEPTED_CC);
	    while (list($key, $value) = each($cc_array)) {
	    	$this->allowed_types[$value] = $this->card_types[$value];
	    }

    }

// class methods
    function javascript_validation() {
      return false;
    }

    function selection() {
		global $order;
		
		// prepare forms for data input
		
		$selection = array('id' => $this->code,
	    'module' => $this->title ,
	    'fields' => array(
	    
	    array('title' => MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_TYPE,
	    	  'field' => tep_draw_pull_down_menu('cc_type', $this->getAllowedCreditCards())),
	    	  
	    array('title' => MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_OWNER,
	    	  'field' => tep_draw_input_field('cc_owner', $order->billing['firstname'] . ' ' . $order->billing['lastname'])),
	    	  
	    array('title' => MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_NUMBER,
	          'field' => tep_draw_input_field('cc_number')),
	          
	    array('title' => MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_EXPIRES,
	    	  'field' => tep_draw_pull_down_menu('cc_expires_month', $this->getExpireMonths()) . '&nbsp;' . tep_draw_pull_down_menu('cc_expires_year', $this->getExpireYears())),
	    	  
	    array('title' => 'CVV number ' . ' ' .'<a href="javascript:CVVPopUpWindow(\'' . tep_href_link('cvv.html') . '\')">' . '<u><i>' . '(' . MODULE_PAYMENT_CITIBANK_TEXT_CVV_LINK . ')' . '</i></u></a>',
	      	  'field' => tep_draw_input_field('cc_cvv','',"SIZE=4, MAXLENGTH=4"))));
	      
		return $selection;
    }

    function pre_confirmation_check() {
		
		// include CC validation class and execute validation script
		include(DIR_WS_CLASSES . 'cc_validation.php');
		$cc_validation = new cc_validation();
		
		//$result = $cc_validation->validate($_POST['cc_number'], $_POST['cc_expires_month'], $_POST['cc_expires_year'], $_POST['cc_cvv'], $_POST['cc_type']);
		$result = $cc_validation->validate5($_POST['cc_number'], $_POST['cc_expires_month'], $_POST['cc_expires_year'], $_POST['cc_cvv'], $_POST['cc_type']);
      
		// if CC validation was unsuccessfull, we need to get error message
		$error = '';
		switch ($result) {
			case -1:
				$error = sprintf(TEXT_CCVAL_ERROR_UNKNOWN_CARD, substr($cc_validation->cc_number, 0, 4));
				break;
			case -2:
			case -3:
			case -4:
				$error = TEXT_CCVAL_ERROR_INVALID_DATE;
				break;
			case -5:
				$error = TEXT_CCVAL_ERROR_CARD_TYPE_MISMATCH;
				break;
			case -6;
				$error = TEXT_CCVAL_ERROR_CVV_LENGTH;
				break;
			case false:
				$error = TEXT_CCVAL_ERROR_INVALID_NUMBER;
				break;
		}
		
		// If validation fails redirect to the previous page and print validation error;
		if ( ($result == false) || ($result < 1) ) {
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&cc_owner=' . urlencode($_POST['cc_owner']) . '&cc_expires_month=' . $_POST['cc_expires_month'] . '&cc_expires_year=' . $_POST['cc_expires_year'];
			tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
		}

		// file object data with validated information and prepare for confirmation method
		$this->cc_data['type'] = $_POST['cc_type'];
		$this->cc_data['number'] = $cc_validation->cc_number;
		$this->cc_data['expiry_month'] = $cc_validation->cc_expiry_month;
		$this->cc_data['expiry_year'] = $cc_validation->cc_expiry_year;
		$this->cc_data['ccv'] = $_POST['cc_cvv'];
		$this->cc_data['owner'] = $_POST['cc_owner'];
    }
    
 	//prepare data for confirmation page
    function confirmation() {
       $confirmation = array('title' => $this->title . ': ' . $this->cc_data['type'],
                            'fields' => array(array('title' => 'CVV number',
                                                    'field' => $this->cc_data['ccv']),
                                                    array('title' => MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_OWNER,
                                                    'field' => $this->cc_data['owner']),
                                              array('title' => MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_NUMBER,
                                                    'field' => substr($this->cc_data['number'], 0, 4) . str_repeat('x', (strlen($this->cc_data['number']) - 8)) . substr($this->cc_data['number'], -4)),
                                              array('title' => MODULE_PAYMENT_CITIBANK_TEXT_CREDIT_CARD_EXPIRES,
                                                    'field' => strftime('%B, %Y', mktime(0,0,0,$this->cc_data['expiry_month'], 1, $this->cc_data['expiry_year'])))));
      return $confirmation;
    }

    // prepare data for final processing (store it into form or into session)
    function process_button() {
		$process_button_string = tep_draw_hidden_field('cc_data_ccv', $this->cc_data['ccv']);
		$process_button_string.= tep_draw_hidden_field('cc_data_type', $this->cc_data['type']);
		$process_button_string.= tep_draw_hidden_field('cc_data_number', $this->cc_data['number']);
		$process_button_string.= tep_draw_hidden_field('cc_data_owner',$this->cc_data['owner']);
		$process_button_string.= tep_draw_hidden_field('cc_data_exp_month',$this->cc_data['expiry_month']);
		$process_button_string.= tep_draw_hidden_field('cc_data_exp_year',$this->cc_data['expiry_year']);
		$process_button_string.= tep_draw_hidden_field('cc_data_exp_date', $this->cc_data['expiry_month'] . substr($this->cc_data['expiry_year'], -2));              
		return $process_button_string;
    }

    function before_process() {
    	global $order;
    	
		$this->cc_data['type'] = $_POST['cc_data_type'];
		$this->cc_data['number'] = $_POST['cc_data_number'];
		$this->cc_data['expiry_month'] = $_POST['cc_data_exp_month'];
		$this->cc_data['expiry_year'] = $_POST['cc_data_exp_year'];
		$this->cc_data['expiry_date'] = $_POST['cc_data_exp_date'];
		$this->cc_data['ccv'] = $_POST['cc_data_ccv'];
		$this->cc_data['owner'] = $_POST['cc_data_owner'];
		
		$error = null;

		if (
				!MODULE_PAYMENT_CITIBANK_AGENT_URL || (MODULE_PAYMENT_CITIBANK_AGENT_URL=='') ||
				!MODULE_PAYMENT_CITIBANK_ACCOUNT || (MODULE_PAYMENT_CITIBANK_ACCOUNT=='') || 
				!MODULE_PAYMENT_CITIBANK_CUSTOMER_ID || (MODULE_PAYMENT_CITIBANK_CUSTOMER_ID=='') || 
				!MODULE_PAYMENT_CITIBANK_AGREEMENT_ID || (MODULE_PAYMENT_CITIBANK_AGREEMENT_ID=='')
			) {
			$error = MODULE_PAYMENT_CITIBANK_TEXT_CONFIGURATION_ERROR;
		}
		
		if (
				!$this->cc_data['type'] || ($this->cc_data['type'] == '') ||
				!$this->cc_data['number'] || ($this->cc_data['number'] == '') ||
				!$this->cc_data['expiry_date'] || ($this->cc_data['expiry_date'] == '') ||
				!$this->cc_data['ccv'] || ($this->cc_data['ccv'] == '') ||
				!$this->cc_data['owner'] || ($this->cc_data['owner'] == '')
    	) {
    		$error = MODULE_PAYMENT_CITIBANK_TEXT_MISSING_FORM_DATA;
    	}
		
    	
    	$cart = new shoppingCart();
    	$cart = $_SESSION['cart'];
    	
    	if (!$order->info['total'] || $order->info['total']<=0 || $order->info['total']=="") {
    		$error = MODULE_PAYMENT_CITIBANK_TEXT_INVALID_PRICE;
    	}
    	
    	if ($error) {
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&cc_owner=' . urlencode($this->cc_data['owner']) . '&cc_expires_month=' .$this->cc_data['expiry_month'] . '&cc_expires_year=' . $this->cc_data['expiry_year'];
			tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
    	}
    	
		require_once(DIR_WS_INCLUDES.'nusoap.php');
			
		$soapclient = new soapclient(MODULE_PAYMENT_CITIBANK_AGENT_URL,true);
		$proxy = $soapclient->getProxy();		

		$params = array(
			'customerUserID' => MODULE_PAYMENT_CITIBANK_ACCOUNT, //ok
			'agreementID' => MODULE_PAYMENT_CITIBANK_AGREEMENT_ID, // ok
			'customerID' => MODULE_PAYMENT_CITIBANK_CUSTOMER_ID, // ok
			'cardType' => $this->cc_data['type'],
			'cardNo' => $this->cc_data['number'],
			'CVV' => $this->cc_data['ccv'],
			'expiredDate' => $this->cc_data['expiry_date'],
			'authAmnt' => $order->info['total'],
			'orderID' => $_SESSION['cart_address_id']
		);
		
		$this->cart_id = $_SESSION['cart_address_id'];
		
		// testing
		$result=$proxy->normalAuthorize($params);
		
		
		// processing
		//$result=$proxy->saleAuthorize($params);
		
		if (!$result) {
			$error=MODULE_PAYMENT_CITIBANK_TEXT_PROCESSING_ERROR;
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&cc_owner=' . urlencode($this->cc_data['owner']) . '&cc_expires_month=' .$this->cc_data['expiry_month'] . '&cc_expires_year=' . $this->cc_data['expiry_year'];
			tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
		}
		
		if ($result['errorMessage']!=null or $result['responseCode']!='00') {
			$error=MODULE_PAYMENT_CITIBANK_TEXT_DECLINED_TRANSACTION;
			$payment_error_return = 'payment_error=' . $this->code . '&error=' . urlencode($error) . '&cc_owner=' . urlencode($this->cc_data['owner']) . '&cc_expires_month=' .$this->cc_data['expiry_month'] . '&cc_expires_year=' . $this->cc_data['expiry_year'];
			tep_redirect(tep_href_link(FILENAME_CHECKOUT_PAYMENT, $payment_error_return, 'SSL', true, false));
		}
		
		$this->response = $result;
		
		return $result;
    }

    function after_process() {
    	global $insert_id, $order;
    	
    	$result = $this->response;
    	tep_db_query("insert into citibank_transaction_history (cart_id, approved_code, auth_amnt, bank_id, bank_name, bank_rrn, hub_rrn, terminal_id, trans_date, trans_time) values ('".$insert_id."','".$result['approveCode']."', '".$result['authAmnt']."', '".$result['bankID']."', '".$result['bankName']."', '".$result['bankRRN']."', '".$result['hubRRN']."', '".$result['terminalID']."', '".$result['transDate']."','".$result['transTime']."');");	
    	var_dump($this->response);
    	die();
    	
		return false;
    }

    function get_error() {
      return false;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_CITIBANK_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Citibank payment module', 'MODULE_PAYMENT_CITIBANK_STATUS', 'True', 'Enable citibank payment module', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now());");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Citibank agent URL', 'MODULE_PAYMENT_CITIBANK_AGENT_URL', 'http://220.130.23.177/epayment/services/EpayHubPhpSoap?wsdl', 'Url to Citibank\'s SOAP application (leave default if you don\'t know what it means)', '6', '1', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Citibank account', 'MODULE_PAYMENT_CITIBANK_ACCOUNT', '', 'Account name with citibank institution', '6', '1', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Customer ID', 'MODULE_PAYMENT_CITIBANK_CUSTOMER_ID', '', '', '6', '1', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Agreement ID', 'MODULE_PAYMENT_CITIBANK_AGREEMENT_ID', '', '', '6', '1', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_CITIBANK_STATUS'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_CITIBANK_ACCOUNT'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_CITIBANK_AGENT_URL'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_CITIBANK_CUSTOMER_ID'");
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_CITIBANK_AGREEMENT_ID'");
    }

    function keys() {
      return array('MODULE_PAYMENT_CITIBANK_STATUS','MODULE_PAYMENT_CITIBANK_AGENT_URL','MODULE_PAYMENT_CITIBANK_ACCOUNT','MODULE_PAYMENT_CITIBANK_CUSTOMER_ID','MODULE_PAYMENT_CITIBANK_AGREEMENT_ID');
    }
    
    /* ADDITIONAL FUNCTIONS */
    
    function getExpireMonths() {
		for ($i=1; $i<13; $i++) {
			$expires_month[] = array('id' => sprintf('%02d', $i), 'text' => strftime('%B',mktime(0,0,0,$i,1,2000)));
		}
		return $expires_month;
    }
	
    function getExpireYears() {
    	$today = getdate();
		for ($i=$today['year']; $i < $today['year']+10; $i++) {
			$expires_year[] = array('id' => strftime('%y',mktime(0,0,0,1,1,$i)), 'text' => strftime('%Y',mktime(0,0,0,1,1,$i)));
		}
		return $expires_year;
    }
    
    function getAllowedCreditCards() {
  		reset($this->allowed_types);
		while (list($key, $value) = each($this->allowed_types)) {
			$card_menu[] = array('id' => $key, 'text' => $value);
		}
		
		return $card_menu;
    }
    	
  }
?>