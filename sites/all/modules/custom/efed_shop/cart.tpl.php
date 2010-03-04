<?php
		
	if(count($cart)>0){
		$items = array();
		$shop = array();

		foreach($cart as $cid => $list){
			$c = efed_character_load($cid);
			
			foreach($list as $shop_id){
				$p = efed_shop_load($shop_id);
				$node = node_load($p->nid);
				$shop = '<div class="product">'.$node->title.'<br/>$'.number_format($node->price,2).'</div>';
				
				$price = $price + $node->price;
			}
			
			$items[] = '<div class="cart"><b>'.$c->name.'</b>'.$shop.'</div>';
			
			unset($shop);
		}
		
		$items[] = '<b>Total</b>: $'.number_format($price,2);
		
		print theme('item_list',$items);
		print drupal_get_form('efed_shop_cart_form',$cart);
		
	}else{
	?>
	<em>Cart empty</em>
	<?php
	}
	
?>