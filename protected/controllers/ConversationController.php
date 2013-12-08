<?php

class ConversationController extends Controller {
	
	public function actions(){
		
		return array(
				'index' => 'application.controllers.Conversation.IndexAction',
				'content' => 'application.controllers.Conversation.ContentAction',
				
		);
	}
	
}

?>