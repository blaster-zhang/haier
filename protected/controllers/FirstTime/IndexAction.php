<?php

class IndexAction extends Action{
	
	public function run(){
		exit(2);
		$this->getController()->render();
	}
}

?>