<?php

class ProductController extends Controller {
	
	public function actions(){
		
		return array(
				
				'index' => 'application.controllers.Product.IndexAction'
		);
	}
}

?>