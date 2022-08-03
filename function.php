<?php 
class CProducts{
	const DB_HOST = 'localhost';
	const DB_USER = 'root';
	const DB_PASS = 'root';
	const DB_NAME = 'tmp';
	public function __construct()
	{
		 try {
			  $this->mysqli = new mysqli(self::DB_HOST, self::DB_USER, self::DB_PASS, self::DB_NAME );
			  $this->mysqli->set_charset( "utf8" );
		 } catch ( Exception $e ) {
			  die( $e );
		 }
	}
	function getArrayProducts($limit, $order='PRODUCT_NAME', $order_sort=false):array
	{
		$param = $order_sort ? 'ORDER BY `'.$order.'` ASC' : 'ORDER BY `'.$order.'` DESC';
		$param .= ' LIMIT '.$limit;		 
		$results_set = $this->mysqli->query("select * from `products` where `hide` = 0 $param");
		$row = [];
		while($tmp=$results_set->fetch_assoc())
		{
			$row[] = $tmp;
		}
		return $row;
	}
	
	function updateHiteProduct($id)
	{
		return $this->mysqli->query("update `products` set `hide` = 1 WHERE `ID` = $id");
	}
	
	function closeConnection()
	{
		$this->mysqli->close();
	}
}



?>