<?php
require_once ('function.php');
require_once ('log.php');
if(!isset($_SESSION['order'])){
	die('Your order is empty');
}
if(isset($_SESSION['balance'])){
	$balance = &$_SESSION['balance'];

	$payment = 0;
	foreach ($_SESSION['order'] as $key => $value) {

        $price = (int)$Product->get_product_by_id($key)['price'];
		$q = (int)$value;
		if($price>0 && $q>0){
			$payment += (int)($price*$q);
		}else{
			unset($_SESSION['oreder'][$key]);
		}

	}

	
		if (!isset($_POST['dstAccountId'])) {
			$_POST['dstAccountId']='';
		}
		if (!isset($_POST['srcAccountId'])) {
			$_POST['srcAccountId']='';
		}

	$sAI = $_POST['srcAccountId'];
	$Ad = $_POST['dstAccountId'];
	$Adem = $_POST['amonAcsdId'];

	$newBalance = $balance - (int)$payment;
	if ($newBalance >= 0) {
		$balance = $newBalance;
		$order_id =  SendMoney($sAI, $Ad,$Adem, $_SESSION['order'],$balance);
        $_SESSION['my_order'][]=$order_id;
		echo " Your order is accepted  <br>#{$order_id}<hr>";
		echo $Product->print_report($_SESSION['order']);
		echo "<hr>Money send(\$$payment), new balance \$$balance ";

	}
	else {
		echo "You need \$$payment, you have \$$balance";
	}
}else{
	die('You\'re a suspicious user!');
}

unset($_SESSION['order']);
// отчистить товары в сессии 









?>