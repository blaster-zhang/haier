<?php

class IndexAction extends Action{
	
	public function run(){
		
		$this->getController()->render('index');
	}
}

?>