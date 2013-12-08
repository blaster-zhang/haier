<?php

class DietController extends Controller {
	
	public function actions(){
		
		return array(
				
				'index' => 'application.controllers.Diet.IndexAction',
				'content' => 'application.controllers.Diet.ContentAction'
				
		);
	}
}

?>