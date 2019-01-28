<?php
	require_once "model/Entity.class.php";
	
	class Word extends Entity{
		
		private $id;
		private $name;
		
		public function __construct($donnees){
			
			parent::hydrate($donnees);
		}

		
		public function getId(){
			return $this->id;
		}
		
		public function getName(){
			return $this->name;
		}
		
		protected function setId($value){
			$this->id = $value;
		}
		
		protected function setName($value){
			$this->name = $value;
		}
		
	}
	