<?php
require_once ('function.php');
require_once ('log.php');
$cart=&$_SESSION['order'];

if(isset($_POST['del'])){
	unset($cart[$_POST['del']]);
	die('ok');
}
if(isset($_POST['dell_order']) && isset($_POST['id'])){
	$id = $_POST['id'];
	foreach ($_SESSION['my_order'] as $key => $value) {
		if ($id==$value) {
            $Product->remove_order_by_id($id);
			unset($_SESSION['my_order'][$key]);
			die('ok');
		}
	}
	die('error');
	
}
if(isset($_POST['get_orders'])){
	if(!empty($cart)){
		$str=[];
		foreach ($cart as $key => $value) {

            $data = $Product->get_product_by_id($key);


            $a=array('id'=>$key,'title'=>$data['title'],'quantity'=>$value,'price'=>$data['price']);
			$str[]=$a;
		}
		die(json_encode($str));
	}else{
		die('empty');
	}
}
if(isset($_POST['update'])&&isset($_POST['data'])){
	$arr = json_decode($_POST['data']);
	$cart=[];
	foreach ($arr as $key => $value) {
		$cart[$key]=$value;
	}
	die('ok');
}
if(isset($_POST['dell_from_cart'])&&isset($_POST['id'])){
	unset($cart[$_POST['id']]);
	die('ok');
}



if(isset($_POST['id'])&&isset($_POST['quantity'])){
	$id = $_POST['id'];
	$quantity= $_POST['quantity'];
	if(isset($cart[$id])){
		$cart[$id] += $quantity;
		die('ok');
	}else{
		$cart[$id]=$quantity;
		die('ok');
	}
}



?>