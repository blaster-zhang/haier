<?php

class KnowledgeController extends Controller {
	
	public function actions(){
		
		return array(
				
				'index' => 'application.controllers.Knowledge.IndexAction',
				'parenting' => 'application.controllers.Knowledge.ParentingAction',
				'rumour' => 'application.controllers.Knowledge.RumourAction',
				'picshow' => 'application.controllers.Knowledge.PicShowAction',
				
		);
	}
}

?>