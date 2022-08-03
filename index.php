<?php 
require_once 'function.php';
$products = new CProducts();
$array_result = $products->getArrayProducts(10, 'DATE_CREATE');
$products->closeConnection();
?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='utf-8'>
    <title>Страница с товарвми</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class='outer'>
		<p align="center" style="margin: 20px">
			<span class="minus" style="cursor: pointer">-</span>
				<input type="text" value="1" size="5" style="text-align: center" readonly/>
			<span class="plus" style="cursor: pointer">+</span>
		</p>
		<table cellpadding="0" cellspacing="0" border="1" class="table_s">
			<tr>
				<th>
				ID
				</th>
				<th>
				PRODUCT_ID
				</th>
				<th>
				PRODUCT_NAME
				</th>
				<th>
				PRODUCT_PRICE
				</th>
				<th>
				PRODUCT_ARTICLE
				</th>
				<th>
				PRODUCT_QUANTITY
				</th>
				<th>
				DATE_CREATE
				</th>
				<th>
				
				</th>
			</tr>
					<?php 
					foreach($array_result as $result){
						echo "<tr id='myblock".$result['ID']."'><td>".$result['ID']."</td>";
						echo "<td>".$result['PRODUCT_ID']."</td>";
						echo "<td>".$result['PRODUCT_NAME']."</td>";
						echo "<td>".$result['PRODUCT_PRICE']."</td>";
						echo "<td>".$result['PRODUCT_PRICE']."</td>";
						echo "<td>".$result['PRODUCT_QUANTITY']."</td>";
						echo "<td>".$result['DATE_CREATE']."</td>";
						echo "<td><button rel='".$result['ID']."'>Скрыть</button></td></tr>";
					}
					?>
		</table>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script>
	
	 $(document).ready(function() {
			 $("button").click(function(){
				var getvalue = $(this).attr('rel');
				$.post('server.php', {id: getvalue}).done(function(data){
				   if(data){
						$('#myblock' + getvalue).css("display", "none");
				   }
				});
			});
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();

				$.post('server.php', {limit: count}).done(function(data){
				   if(data){
					   //alert(data);
					   $(".table_s").empty()
					   $(".table_s").html(data);
				   }
				})

                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
				var count = parseInt($input.val()) + 1;
                $input.val(count);
                $input.change();
				$.post('server.php', {limit: count}).done(function(data){
				   if(data){
					   //alert(data);
					   $(".table_s").empty()
					   $(".table_s").html(data);
				   }
				})
                return false;
            });
        });
    </script>
</body>

</html>