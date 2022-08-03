<?php 
require_once "function.php";
$id = $_POST['id'] ?? false;
$limit = $_POST['limit'] ?? false;
if(is_numeric($limit) && $limit != false){
	$data = new CProducts();
	$result = $data->getArrayProducts($limit);
	$data->closeConnection();
	$str = '';
	
$str .= "<tr><th>ID</th><th>PRODUCT_ID</th><th>PRODUCT_NAME</th><th>PRODUCT_PRICE</th><th>PRODUCT_ARTICLE</th><th>PRODUCT_QUANTITY</th><th>DATE_CREATE</th><th></th></tr>";
				foreach($result as $res){
					$str .= "<tr id='myblock".$res['ID']."'><td>".$res['ID']."</td>";
					$str .= "<td>".$res['PRODUCT_ID']."</td>";
					$str .= "<td>".$res['PRODUCT_NAME']."</td>";
					$str .= "<td>".$res['PRODUCT_PRICE']."</td>";
					$str .= "<td>".$res['PRODUCT_PRICE']."</td>";
					$str .= "<td>".$res['PRODUCT_QUANTITY']."</td>";
					$str .= "<td>".$res['DATE_CREATE']."</td>";
					$str .= "<td><button rel='".$res['ID']."'>Скрыть</button></td></tr>";
				}
	echo $str;
}
if (is_numeric($id) && $id != false){
	$dataUpdate = new CProducts();
	$result = $dataUpdate->updateHiteProduct($id);
	$dataUpdate->closeConnection();
	echo $result;
}
else{
	echo false;
}
?>