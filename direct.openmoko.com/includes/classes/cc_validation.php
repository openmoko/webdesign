<?php
/*
  $Id: cc_validation.php,v 1.1.1.2 2004/03/04 23:40:42 ccwjr Exp $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com
  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License

  Update: March 12, 2004
  Added: CCV Card Specific Checking
  Author: Austin Renfroe (Austin519), Code Thanks to Dansken
  Email: Austin519 @ aol.com

Card Blacklist by Mark Evans 
additional cc validation by:  barry@mainframes.co.uk
switch between 3 and 5 item check by David Graham

*/

  class cc_validation {
    var $cc_number, $cc_expiry_month, $cc_expiry_year, $ccv, $cc_type ;

      // this method implements the overloading workaround
    function validate()
    {
        $vald = 'validate'.func_num_args();
        $args = func_get_args();
        $return1 = @ call_user_func_array(array(&$this, $vald), $args);
        return $return1;
    }

  function validate3($number, $expiry_m, $expiry_y) {
    $this->cc_number = ereg_replace('[^0-9]', '', $number);
      // 4 number and 6 number checks   
          $NumberLeft4 = substr($this->cc_number, 0, 4);
          $NumberLeft6 = substr($this->cc_number, 0, 6);
          $NumberLength = strlen($this->cc_number);
      //empty these variables just to be sure
          $ShouldLength2='';
          $ShouldLength3='';

      if (ereg('^4[0-9]{12}([0-9]{3})?$', $this->cc_number)) {
        $this->cc_type = 'Visa';
         $ShouldLength = 13;
         $ShouldLength2 = 16;
//visa
      } elseif (ereg('^5[1-5][0-9]{14}$', $this->cc_number)) {
        $this->cc_type = 'Mastercard';
         $ShouldLength = 16;
//Mastercard
      } elseif (ereg('^3[47][0-9]{13}$', $this->cc_number)) {
        $this->cc_type = 'Amex';
        $ShouldLength = 15;
// amex
      } elseif ( (($NumberLeft4 >= 3400) && ($NumberLeft4 <= 3499))
              || (($NumberLeft4 >= 3700) && ($NumberLeft4 <= 3799)) ) {
        $this->cc_type = 'American Express';
        $ShouldLength = 15;   
//American Express      
      } elseif (ereg('^6011[0-9]{12}$', $this->cc_number)) {
        $this->cc_type = 'Discover';
        $ShouldLength = 16;
//Discover        
      } elseif (ereg('^(3[0-9]{4}|2131|1800)[0-9]{11}$', $this->cc_number)) {
        $this->cc_type = 'JCB';
        $ShouldLength = 16;
        $ShouldLength2 = 15;
//JCB        
      } elseif ( (($NumberLeft6 >= 413733) && ($NumberLeft6 <= 413737))
            || (($NumberLeft6 >= 446200) && ($NumberLeft6 <= 446299))
            || (($NumberLeft6 >= 453978) && ($NumberLeft6 <= 453979))
            ||  ($NumberLeft6 == 454313)
            || (($NumberLeft6 >= 454432) && ($NumberLeft6 <= 454435))
            ||  ($NumberLeft6 == 454742)
            || (($NumberLeft6 >= 456725) && ($NumberLeft6 <= 456745))
            || (($NumberLeft6 >= 465830) && ($NumberLeft6 <= 465879))
            || (($NumberLeft6 >= 465901) && ($NumberLeft6 <= 465950))
            || (($NumberLeft6 >= 490960) && ($NumberLeft6 <= 490979))
            || (($NumberLeft6 >= 492181) && ($NumberLeft6 <= 492182))
            ||  ($NumberLeft6 == 498824) ) {
        $this->cc_type = 'Delta';
        $ShouldLength = 16;
// Delta        
      } elseif ( (($NumberLeft6 >= 490302) && ($NumberLeft6 <= 490309))
            || (($NumberLeft6 >= 490335) && ($NumberLeft6 <= 490339))
            || (($NumberLeft6 >= 491101) && ($NumberLeft6 <= 491102))
            || (($NumberLeft6 >= 491174) && ($NumberLeft6 <= 491182))
            || (($NumberLeft6 >= 493600) && ($NumberLeft6 <= 493699))
            ||  ($NumberLeft6 == 564182)
            || (($NumberLeft6 >= 633300) && ($NumberLeft6 <= 633349))
            || (($NumberLeft6 >= 675900) && ($NumberLeft6 <= 675999)) ) {
        $this->cc_type = 'UK Switch';
        $ShouldLength = 16;
        $ShouldLength2= 18;
        $ShouldLength3= 19;
// Switch        
      } elseif ( (($NumberLeft6 >= 633450) && ($NumberLeft6 <= 633499))
            || (($NumberLeft6 >= 676700) && ($NumberLeft6 <= 676799)) ) {
        $this->cc_type = 'Solo';
        $ShouldLength = 16;
        $ShouldLength2= 18;
        $ShouldLength3= 19;
// Solo       
    }  elseif (( ($NumberLeft6 == 450875)
                  || (($NumberLeft6 >= 484406) && ($NumberLeft6 <= 484408))
                  || (($NumberLeft6 >= 484411) && ($NumberLeft6 <= 484455))
                  || (($NumberLeft6 >= 491730) && ($NumberLeft6 <= 491759))
                  ||  ($NumberLeft6 == 491880)
        ) && (ereg('[0-9]{16}', $this->cc_number)) ) {
          $this->cc_type = "UK Electron";
           $ShouldLength = 16;
//UK Electron            
     } elseif (( (($NumberLeft6 >= 493698) && ($NumberLeft6 <= 493699))
             ||  ($NumberLeft6 == 490303)
               || (($NumberLeft6 >= 633302) && ($NumberLeft6 <= 633349))
               || (($NumberLeft6 >= 675900) && ($NumberLeft6 <= 675999))
               || (($NumberLeft6 >= 500000) && ($NumberLeft6 <= 509999))
               || (($NumberLeft6 >= 560000) && ($NumberLeft6 <= 589999))
               || (($NumberLeft6 >= 600000) && ($NumberLeft6 <= 699999))
                ) && (ereg('[0-9]{16}', $this->cc_number)) ) {
          $this->cc_type = "Maestro";
          $ShouldLength = 14;
          $ShouldLength2 = 18;
//Maestro        
 } elseif ( (($NumberLeft4 >= 3000) && ($NumberLeft4 <= 3059))
      || (($NumberLeft4 >= 3600) && ($NumberLeft4 <= 3699))
      || (($NumberLeft4 >= 3800) && ($NumberLeft4 <= 3889)) ) {
     $this->cc_type = 'Diners Club';
     $ShouldLength = 14;
// Diners Club     
      } elseif ( ($NumberLeft4 >= 3890) && ($NumberLeft4 <= 3899) ) {
        $this->cc_type = 'Carte Blanche';
        $ShouldLength = 14;
// Carte Blanche
      } elseif ( $NumberLeft4 == 5610 ) {
        $this->cc_type = 'Australian BankCard';
  $ShouldLength = 16;
// Australian Bankcard    
      } else {
        return -1;
      }
    
// function to check the number length
// Is the number the right length?
    
    if ( !( ($NumberLength == $ShouldLength)
          || ( !(empty($ShouldLength2)) && ($NumberLength == $ShouldLength2) )
          || ( !(empty($ShouldLength3)) && ($NumberLength == $ShouldLength3) ) ) ) {
          //return -6;
         }
//  } else {
//  $this->cc_type = 'CC';
//  }
if ( strtolower(CC_BLACK) == 'true' ) {      
// Blacklist check
    $card_info = tep_db_query("select c.blacklist_card_number from " . TABLE_BLACKLIST . " c where c.blacklist_card_number = '" . $this->cc_number . "'");
      if (tep_db_num_rows($card_info) != 0) { // card not found in database
        return -7;
      }
  }

      if (is_numeric($expiry_m) && ($expiry_m > 0) && ($expiry_m < 13)) {
        $this->cc_expiry_month = $expiry_m;
      } else {
        return -2;
      }

      $current_year = date('Y');
      $expiry_y = substr($current_year, 0, 2) . $expiry_y;
      if (is_numeric($expiry_y) && ($expiry_y >= $current_year) && ($expiry_y <= ($current_year + 10))) {
        $this->cc_expiry_year = $expiry_y;
      } else {
        return -3;
      }

      if ($expiry_y == $current_year) {
        if ($expiry_m < date('n')) {
          return -4;
        }
      }

      return $this->is_valid();
    }
    
        function validate5($number, $expiry_m, $expiry_y, $ccv, $cc_type ) {
  //  function validate5($cc_type, $number, $ccv, $expiry_m, $expiry_y) {
          $this->cc_number = ereg_replace('[^0-9]', '', $number);

      // 4 number and 6 number checks   
          $NumberLeft4 = substr($this->cc_number, 0, 4);
          $NumberLeft6 = substr($this->cc_number, 0, 6);
          $NumberLength = strlen($this->cc_number);
       //    $ShouldLength= '' ;
           $ShouldLength2= '' ;
           $ShouldLength3= '' ; 
 unset($ShouldLength) ;
 //     if ( strtolower(CC_VAL) == 'true' ) { 
      //empty these variables just to be sure
      

      if (ereg('^4[0-9]{12}([0-9]{3})?$', $this->cc_number)) {
        $this->cc_type = 'Visa';
         $ShouldLength = 13;
         $ShouldLength2 = 16;
//visa
      } elseif (ereg('^5[1-5][0-9]{14}$', $this->cc_number)) {
        $this->cc_type = 'Mastercard';
         $ShouldLength = 16;
//Mastercard
      } elseif (ereg('^3[47][0-9]{13}$', $this->cc_number)) {
        $this->cc_type = 'Amex';
        $ShouldLength = 15;
// amex
      } elseif ( (($NumberLeft4 >= 3400) && ($NumberLeft4 <= 3499))
              || (($NumberLeft4 >= 3700) && ($NumberLeft4 <= 3799)) ) {
        $this->cc_type = 'American Express';
        $ShouldLength = 15;   
//American Express      
      } elseif (ereg('^6011[0-9]{12}$', $this->cc_number)) {
        $this->cc_type = 'Discover';
        $ShouldLength = 16;
//Discover        
      } elseif (ereg('^(3[0-9]{4}|2131|1800)[0-9]{11}$', $this->cc_number)) {
        $this->cc_type = 'JCB';
        $ShouldLength = 16;
        $ShouldLength2 = 15;
//JCB        
      } elseif ( (($NumberLeft6 >= 413733) && ($NumberLeft6 <= 413737))
            || (($NumberLeft6 >= 446200) && ($NumberLeft6 <= 446299))
            || (($NumberLeft6 >= 453978) && ($NumberLeft6 <= 453979))
            ||  ($NumberLeft6 == 454313)
            || (($NumberLeft6 >= 454432) && ($NumberLeft6 <= 454435))
            ||  ($NumberLeft6 == 454742)
            || (($NumberLeft6 >= 456725) && ($NumberLeft6 <= 456745))
            || (($NumberLeft6 >= 465830) && ($NumberLeft6 <= 465879))
            || (($NumberLeft6 >= 465901) && ($NumberLeft6 <= 465950))
            || (($NumberLeft6 >= 490960) && ($NumberLeft6 <= 490979))
            || (($NumberLeft6 >= 492181) && ($NumberLeft6 <= 492182))
            ||  ($NumberLeft6 == 498824) ) {
        $this->cc_type = 'Delta';
        $ShouldLength = 16;
// Delta        
      } elseif ( (($NumberLeft6 >= 490302) && ($NumberLeft6 <= 490309))
            || (($NumberLeft6 >= 490335) && ($NumberLeft6 <= 490339))
            || (($NumberLeft6 >= 491101) && ($NumberLeft6 <= 491102))
            || (($NumberLeft6 >= 491174) && ($NumberLeft6 <= 491182))
            || (($NumberLeft6 >= 493600) && ($NumberLeft6 <= 493699))
            ||  ($NumberLeft6 == 564182)
            || (($NumberLeft6 >= 633300) && ($NumberLeft6 <= 633349))
            || (($NumberLeft6 >= 675900) && ($NumberLeft6 <= 675999)) ) {
        $this->cc_type = 'UK Switch';
        $ShouldLength = 16;
        $ShouldLength2= 18;
        $ShouldLength3= 19;
// Switch        
      } elseif ( (($NumberLeft6 >= 633450) && ($NumberLeft6 <= 633499))
            || (($NumberLeft6 >= 676700) && ($NumberLeft6 <= 676799)) ) {
        $this->cc_type = 'Solo';
        $ShouldLength = 16;
        $ShouldLength2= 18;
        $ShouldLength3= 19;
// Solo       
    }  elseif (( ($NumberLeft6 == 450875)
                  || (($NumberLeft6 >= 484406) && ($NumberLeft6 <= 484408))
                  || (($NumberLeft6 >= 484411) && ($NumberLeft6 <= 484455))
                  || (($NumberLeft6 >= 491730) && ($NumberLeft6 <= 491759))
                  ||  ($NumberLeft6 == 491880)
        ) && (ereg('[0-9]{16}', $this->cc_number)) ) {
          $this->cc_type = "UK Electron";
           $ShouldLength = 16;
//UK Electron            
     } elseif (( (($NumberLeft6 >= 493698) && ($NumberLeft6 <= 493699))
             ||  ($NumberLeft6 == 490303)
               || (($NumberLeft6 >= 633302) && ($NumberLeft6 <= 633349))
               || (($NumberLeft6 >= 675900) && ($NumberLeft6 <= 675999))
               || (($NumberLeft6 >= 500000) && ($NumberLeft6 <= 509999))
               || (($NumberLeft6 >= 560000) && ($NumberLeft6 <= 589999))
               || (($NumberLeft6 >= 600000) && ($NumberLeft6 <= 699999))
                ) && (ereg('[0-9]{16}', $this->cc_number)) ) {
          $this->cc_type = "Maestro";
          $ShouldLength = 14;
          $ShouldLength2 = 18;
//Maestro        
 } elseif ( (($NumberLeft4 >= 3000) && ($NumberLeft4 <= 3059))
      || (($NumberLeft4 >= 3600) && ($NumberLeft4 <= 3699))
      || (($NumberLeft4 >= 3800) && ($NumberLeft4 <= 3889)) ) {
     $this->cc_type = 'Diners Club';
     $ShouldLength = 14;
// Diners Club     
      } elseif ( ($NumberLeft4 >= 3890) && ($NumberLeft4 <= 3899) ) {
        $this->cc_type = 'Carte Blanche';
        $ShouldLength = 14;
// Carte Blanche
      } elseif ( $NumberLeft4 == 5610 ) {
        $this->cc_type = 'Australian BankCard';
  $ShouldLength = 16;
// Australian Bankcard    
      } else {
        return -1;
      }
    
// function to check the number length
// Is the number the right length?
    
//    if  ( !($NumberLength == $ShouldLength) || ( !(empty($ShouldLength2)) && !($NumberLength == $ShouldLength2) ) || (!(empty($ShouldLength3)) && !($NumberLength == $ShouldLength3)) )  {
if ( ($NumberLength == $ShouldLength)|| ( !(empty($ShouldLength2)) && ($NumberLength == $ShouldLength2) ) || (!(empty($ShouldLength3)) && ($NumberLength == $ShouldLength3))) { 
   // return ;
    } else { 
         return -6;
         }


if ( strtolower(CC_BLACK) == 'true' ) {      
// Blacklist check
    $card_info = tep_db_query("select c.blacklist_card_number from " . TABLE_BLACKLIST . " c where c.blacklist_card_number = '" . $this->cc_number . "'");
      if (tep_db_num_rows($card_info) != 0) { // card not found in database
        return -7;
      }
  }

      if (is_numeric($expiry_m) && ($expiry_m > 0) && ($expiry_m < 13)) {
        $this->cc_expiry_month = $expiry_m;
      }
      else {
        return -2;
      }

      $current_year = date('Y');
      $expiry_y = substr($current_year, 0, 2) . $expiry_y;
      if (is_numeric($expiry_y) && ($expiry_y >= $current_year) && ($expiry_y <= ($current_year + 10))) {
        $this->cc_expiry_year = $expiry_y;
      } else {
        return -3;
      }

      if ($expiry_y == $current_year) {
        if ($expiry_m < date('n')) {
          return -4;
        }
      }

    
if($ccv != '') {
  $l = strlen($ccv);
  
//This sets length if select card type is not used

If ($this->cc_type != ''){
 if (($this->cc_type == 'Amex') || ($this->cc_type == 'American Express') ){
            $len = 4;
  }else{
    $len = 3;  
    }
    if ($len != $l) {
  return -8;
   }
//This sets length if select card type is used Delta, UK Switch, Solo, UK Electron,Maestro  not checked
If ($this->cr_card_type != '')
  if (($this->cc_type == 'Amex') || ($this->cc_type == 'American Express') ){
     $len = 4;
      }else{
    $len = 3;  
    }
  }  
//this check the card type length to the length entered
     if ($ccv == '') {
        $l = $len;
     }
     
    if ($len != $l) {
        return -8;
    }
  
     return $this->is_valid();
    }
  }
//luen10 checking 
    function is_valid() {
      $cardNumber = strrev($this->cc_number);
      $numSum = 0;

      for ($i=0; $i<strlen($cardNumber); $i++) {
        $currentNum = substr($cardNumber, $i, 1);

// Double every second digit
        if ($i % 2 == 1) {
          $currentNum *= 2;
        }

// Add digits of 2-digit numbers together
        if ($currentNum > 9) {
          $firstNum = $currentNum % 10;
          $secondNum = ($currentNum - $firstNum) / 10;
          $currentNum = $firstNum + $secondNum;
        }

        $numSum += $currentNum;
      }

// If the total has no remainder it's OK
      return ($numSum % 10 == 0);
    }
  
 } 
?>
