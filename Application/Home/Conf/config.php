<?php
return array(
	//'配置项'=>'配置值'
	'URL_ROUTER_ON'   	=> true, 
    'URL_ROUTE_RULES'	=>array(
  							  ':post\d' => 'Article/index',
							  ':cate\w$' => 'Category/index',    								
								),
);