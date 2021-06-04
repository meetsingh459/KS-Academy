<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application’s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {

	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<div style='display:grid; justify-content:center; text-align:center; margin-top:100px;'>";
		echo "<b style='font-size:40px;' >Transaction status is success</b>" . "<br/>";
		echo "<b style='font-size:25px;'>Please do not refresh this page</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.
		echo "<a  href='http://localhost/KS_Academy/user.php?id=".$_POST['ORDERID']."'>click here to complete your transaction </a> ";
		echo "</div>";
 	}
	else {
		echo "<div style='display:grid; justify-content:center; text-align:center; margin-top:100px;'>";
		echo "<b style='font-size:40px;'>Transaction status is failure</b>" . "<br/>";
		echo "<b style='font-size:25px;'>Please Try again</b>" . "<br/>";
		echo "<a  href='http://localhost/KS_Academy/notes.php'>Go Back </a> ";
		echo "</div>";
	}

	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>