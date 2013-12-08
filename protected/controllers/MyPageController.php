<?php

class MyPageController extends Controller {
	
	public function actions(){
		
		return array(
				
				'index' => 'application.controllers.MyPage.IndexAction'
		);
	}
}

?>