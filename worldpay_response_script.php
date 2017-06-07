<?php
//get vars from POST and sanitize
$wpDesc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_SPECIAL_CHARS);
$wpAmount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_SPECIAL_CHARS);
$wpEmail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$wpName = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);

//build associative array from clean vars
$wpVars = array('wpdesc' => $wpDesc,
				'wpamount' => $wpAmount,
				'wpemail' => $wpEmail,
				'wpname' => $wpName);

//build redirection URL
$host = $_SERVER['HTTP_HOST']; //get the host
$path = "/success/";//url to redirect to
//build full URL including GET vars that can be read on success page
$url = 'http://'.$host.$path.'?'.http_build_query($wpVars); 

//redirect
echo "<meta http-equiv='Refresh' content='1; Url=\"$url\"'>";

/********************************
* Access GET vars on success page
********************************/
$wpDesc = filter_input(INPUT_GET, 'wpdesc', FILTER_SANITIZE_SPECIAL_CHARS);
$wpAmount = filter_input(INPUT_GET, 'wpamount', FILTER_SANITIZE_SPECIAL_CHARS);
$wpEmail = filter_input(INPUT_GET, 'wpemail', FILTER_SANITIZE_EMAIL);
$wpName = filter_input(INPUT_GET, 'wpname', FILTER_SANITIZE_SPECIAL_CHARS);

/********************************
* Example response from Worldpay
********************************/
/*Array
(
    [msgType] => authResult
    [installation] => 314170
    [country] => GB
    [authCost] => 300.00
    [routeKey] => VISA-SSL
    [transId] => 3070878283
    [countryMatch] => S
    [rawAuthMessage] => cardbe.msg.authorised
    [authCurrency] => GBP
    [charenc] => UTF-8
    [compName] => Native Eye Travel
    [rawAuthCode] => A
    [amountString] => &#163;300.00
    [currency] => GBP
    [tel] => 0321654987
    [fax] => 01234596789
    [lang] => en
    [countryString] => United Kingdom
    [email] => aaron.sly@essentialcommerce.co.uk
    [transStatus] => Y
    [_SP_charEnc] => UTF-8
    [amount] => 300.00
    [address] => address line 1
address line 2
address line 3
Colchester
Essex
    [transTime] => 1496825279469
    [cost] => 300.00
    [town] => Colchester
    [address3] => address line 3
    [address2] => address line 2
    [address1] => address line 1
    [cartId] => Holiday Deposit
    [postcode] => CO4 9TG
    [ipAddress] => 94.197.120.94
    [cardType] => Visa
    [authAmount] => 300.00
    [authMode] => A
    [instId] => 314170
    [displayAddress] => address line 1
address line 2
address line 3
Colchester
Essex
    [AAV] => 00000
    [testMode] => 100
    [name] => aaron test
    [callbackPW] => 
    [region] => Essex
    [AVS] => 1111
    [desc] => Deposit for Expedition to Angola
    [authAmountString] => &#163;300.00
)*/

?>